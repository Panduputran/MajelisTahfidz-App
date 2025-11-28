<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use GuzzleHttp\Client;


class IslamicController extends Controller
{
    protected $client;

    public function __construct()
    {
        $this->client = new Client();
    }

    /**
     * Get daily Quran verse
     */
    public function getDailyVerse()
    {
        return Cache::remember('daily_quran_verse', 1440, function () { // Cache for 24 hours
            try {
                // Get random surah and ayah
                $surah = rand(1, 114);
                $ayah = rand(1, 7); // Limit to first 7 ayahs for shorter verses

                $response = $this->client->get("https://api.alquran.cloud/v1/ayah/{$surah}:{$ayah}/en.asad");
                $data = json_decode($response->getBody(), true);

                if ($data['code'] == 200) {
                    return [
                        'text' => $data['data']['text'],
                        'surah' => $data['data']['surah']['englishName'],
                        'number' => $data['data']['numberInSurah'],
                        'translation' => $data['data']['surah']['name']
                    ];
                }
            } catch (\Exception $e) {
                // Fallback verse
                return [
                    'text' => 'Indeed, with hardship [will be] ease.',
                    'surah' => 'Ash-Sharh',
                    'number' => 5,
                    'translation' => 'الشرح'
                ];
            }
        });
    }

    /**
     * Get prayer times for Jakarta
     */
    public function getPrayerTimes()
    {
        return Cache::remember('prayer_times', 60, function () { // Cache for 1 hour
            try {
                $response = $this->client->get('https://api.aladhan.com/v1/timingsByCity', [
                    'query' => [
                        'city' => 'Jakarta',
                        'country' => 'Indonesia',
                        'method' => 2 // Islamic Society of North America
                    ]
                ]);

                $data = json_decode($response->getBody(), true);

                if ($data['code'] == 200) {
                    $timings = $data['data']['timings'];
                    return [
                        'fajr' => $timings['Fajr'],
                        'dhuhr' => $timings['Dhuhr'],
                        'asr' => $timings['Asr'],
                        'maghrib' => $timings['Maghrib'],
                        'isha' => $timings['Isha'],
                        'date' => $data['data']['date']['readable']
                    ];
                }
            } catch (\Exception $e) {
                // Fallback times
                return [
                    'fajr' => '04:30',
                    'dhuhr' => '12:00',
                    'asr' => '15:30',
                    'maghrib' => '18:15',
                    'isha' => '19:45',
                    'date' => date('d M Y')
                ];
            }
        });
    }

    /**
     * Get Hijri date
     */
    public function getHijriDate()
    {
        return Cache::remember('hijri_date', 1440, function () { // Cache for 24 hours
            try {
                // Use a simple calculation for Hijri date since CMC\Hijri is not available
                $gregorian = now();
                $hijriYear = 1446; // Approximate current Hijri year
                $hijriMonths = [
                    'Muharram', 'Safar', 'Rabi\' al-awwal', 'Rabi\' al-thani',
                    'Jumada al-awwal', 'Jumada al-thani', 'Rajab', 'Sha\'ban',
                    'Ramadan', 'Shawwal', 'Dhu al-Qi\'dah', 'Dhu al-Hijjah'
                ];

                // Simple approximation - in a real app you'd use a proper Hijri library
                $monthIndex = (int) (($gregorian->month - 1) * 0.97) % 12;
                $day = $gregorian->day;

                return [
                    'day' => $day,
                    'month' => $monthIndex + 1,
                    'year' => $hijriYear,
                    'month_name' => $hijriMonths[$monthIndex]
                ];
            } catch (\Exception $e) {
                return [
                    'day' => 1,
                    'month' => 1,
                    'year' => 1446,
                    'month_name' => 'Muharram'
                ];
            }
        });
    }

    /**
     * Get Hijri month name
     */
    private function getHijriMonthName($month)
    {
        $months = [
            1 => 'Muharram',
            2 => 'Safar',
            3 => 'Rabi\' al-awwal',
            4 => 'Rabi\' al-thani',
            5 => 'Jumada al-awwal',
            6 => 'Jumada al-thani',
            7 => 'Rajab',
            8 => 'Sha\'ban',
            9 => 'Ramadan',
            10 => 'Shawwal',
            11 => 'Dhu al-Qi\'dah',
            12 => 'Dhu al-Hijjah'
        ];

        return $months[$month] ?? 'Muharram';
    }

    /**
     * Get all Islamic data for homepage
     */
    public function getIslamicData()
    {
        return response()->json([
            'verse' => $this->getDailyVerse(),
            'prayer_times' => $this->getPrayerTimes(),
            'hijri_date' => $this->getHijriDate()
        ]);
    }
}
