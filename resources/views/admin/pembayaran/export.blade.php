<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <title>Data Pembayaran Santri Baru</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid #000000;
            padding: 8px;
            vertical-align: middle;
        }

        th {
            background-color: #4f81bd;
            color: #ffffff;
            font-weight: bold;
            text-align: center;
            height: 35px;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .text-center {
            text-align: center;
        }

        .font-bold {
            font-weight: bold;
        }

        /* Warna Status */
        .bg-pending {
            background-color: #ffeb9c;
            color: #9c5700;
        }

        .bg-verified {
            background-color: #c6efce;
            color: #006100;
        }

        .bg-rejected {
            background-color: #ffc7ce;
            color: #9c0006;
        }
    </style>
</head>

<body>
    <table>
        <thead>
            <tr>
                <th colspan="9"
                    style="font-size: 16px; height: 50px; background-color: #ffffff; color: #000; border: none; text-align: left;">
                    DATA VERIFIKASI PEMBAYARAN SANTRI BARU
                </th>
            </tr>
            <tr>
                <th style="width: 200px;">Nama Santri</th>
                <th style="width: 150px;">Program</th>
                <th style="width: 150px;">Nama Pengirim</th>
                <th style="width: 100px;">Bank Asal</th>
                <th style="width: 120px;">Nominal</th>
                <th style="width: 120px;">Tgl Transfer</th>
                <th style="width: 100px;">Status</th>
                <th style="width: 200px;">Catatan Admin</th>
                <th style="width: 150px;">Waktu Upload</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $item)
                <tr>
                    <td>{{ $item->santri->nama_lengkap ?? 'Hapus' }}</td>
                    <td>{{ $item->santri->program_minat ?? '-' }}</td>
                    <td>{{ $item->nama_pengirim }}</td>
                    <td>{{ $item->bank_asal ?? '-' }}</td>
                    <td class="text-center font-bold">{{ $item->nominal }}</td>
                    <td class="text-center">{{ \Carbon\Carbon::parse($item->tanggal_transfer)->format('d/m/Y') }}</td>

                    <td
                        class="text-center {{ $item->status == 'verified' ? 'bg-verified' : ($item->status == 'pending' ? 'bg-pending' : 'bg-rejected') }}">
                        {{ ucfirst($item->status) }}
                    </td>

                    <td>{{ $item->catatan_admin ?? '-' }}</td>
                    <td class="text-center">{{ $item->created_at->format('d/m/Y H:i') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>