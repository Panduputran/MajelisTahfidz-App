<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <style>
        /* CSS agar tabel rapi saat dibuka di Excel */
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid #000000;
            /* Garis Hitam Tegas */
            padding: 8px;
            vertical-align: middle;
        }

        th {
            background-color: #4f81bd;
            /* Warna Header Biru Excel */
            color: #ffffff;
            font-weight: bold;
            text-align: center;
            height: 40px;
        }

        .text-center {
            text-align: center;
        }

        .text-right {
            text-align: right;
        }
    </style>
</head>

<body>

    <table>
        <thead>
            <tr>
                <th colspan="12"
                    style="font-size: 16px; height: 50px; background-color: #ffffff; color: #000; border: none; text-align: left;">
                    DATA DAFTAR ULANG SANTRI LAMA
                </th>
            </tr>
            <tr>
                {{-- Atur Lebar Kolom di sini (width dalam pixel) --}}
                <th style="width: 200px;">Nama Santri</th>
                <th style="width: 100px;">NIS</th>
                <th style="width: 50px;">L/P</th>
                <th style="width: 150px;">Nama Wali</th>
                <th style="width: 120px;">No HP Wali</th>
                <th style="width: 250px;">Alamat</th>
                <th style="width: 120px;">Program</th>
                <th style="width: 100px;">Thn Ajaran</th>
                <th style="width: 100px;">Kelas Lama</th>
                <th style="width: 100px;">Naik Ke</th>
                <th style="width: 100px;">Status</th>
                <th style="width: 150px;">Tanggal Input</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $item)
                <tr>
                    <td>{{ $item->nama_lengkap }}</td>
                    <td class="text-center">{{ $item->nis ?? '-' }}</td>
                    <td class="text-center">{{ $item->jenis_kelamin }}</td>
                    <td>{{ $item->nama_wali }}</td>
                    {{-- Tambah tanda kutip satu (') agar Excel baca angka telp sebagai teks (08xx tidak hilang 0 nya) --}}
                    <td>'{{ $item->no_hp_wali }}</td>
                    <td>{{ $item->alamat }}</td>

                    {{-- Data Akademik --}}
                    <td>{{ $item->program_sebelumnya }}</td>
                    <td class="text-center">{{ $item->tahun_ajaran }}</td>
                    <td class="text-center">{{ $item->kelas_sebelumnya }}</td>
                    <td class="text-center" style="font-weight: bold;">{{ $item->naik_ke_kelas }}</td>

                    {{-- Status dengan Warna --}}
                    <td class="text-center"
                        style="background-color: {{ $item->status == 'verified' ? '#c6efce' : ($item->status == 'pending' ? '#ffeb9c' : '#ffc7ce') }}; 
                                   color: {{ $item->status == 'verified' ? '#006100' : ($item->status == 'pending' ? '#9c5700' : '#9c0006') }};">
                        {{ ucfirst($item->status) }}
                    </td>

                    <td class="text-center">{{ $item->created_at->format('d/m/Y H:i') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>

</html>