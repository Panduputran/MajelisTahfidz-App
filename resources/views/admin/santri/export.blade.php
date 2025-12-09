<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <title>Data Pendaftar Santri Baru</title>
    <style>
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid #000000; padding: 8px; vertical-align: middle; font-family: Arial, sans-serif; }
        th { background-color: #4f81bd; color: #ffffff; font-weight: bold; text-align: center; height: 35px; }
        tr:nth-child(even) { background-color: #f2f2f2; }
        .text-center { text-align: center; }
        
        /* Warna Status */
        .bg-pending { background-color: #ffeb9c; color: #9c5700; }
        .bg-diterima { background-color: #c6efce; color: #006100; }
        .bg-aktif { background-color: #bdd7ee; color: #1f4e78; }
        .bg-ditolak { background-color: #ffc7ce; color: #9c0006; }
    </style>
</head>
<body>
    <table>
        <thead>
            <tr>
                <th colspan="10" style="font-size: 16px; height: 50px; background-color: #ffffff; color: #000; border: none; text-align: left;">
                    DATA PENDAFTAR SANTRI BARU
                </th>
            </tr>
            <tr>
                <th style="width: 200px;">Nama Lengkap</th>
                <th style="width: 50px;">L/P</th>
                <th style="width: 150px;">Program Minat</th>
                <th style="width: 150px;">Nama Wali</th>
                <th style="width: 120px;">No HP Wali</th>
                <th style="width: 200px;">Asal Sekolah</th>
                <th style="width: 300px;">Alamat</th>
                <th style="width: 150px;">Email</th>
                <th style="width: 100px;">Status</th>
                <th style="width: 150px;">Tgl Daftar</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $item)
                <tr>
                    <td>{{ $item->nama_lengkap }}</td>
                    <td class="text-center">{{ $item->jenis_kelamin }}</td>
                    <td>{{ $item->program_minat }}</td>
                    <td>{{ $item->nama_wali }}</td>
                    {{-- Kutip satu (') agar excel membaca angka 0 di depan --}}
                    <td>'{{ $item->no_hp_wali }}</td>
                    <td>{{ $item->asal_sekolah }}</td>
                    <td>{{ $item->alamat }}</td>
                    <td>{{ $item->email }}</td>
                    
                    <td class="text-center bg-{{ $item->status }}">
                        {{ ucfirst($item->status) }}
                    </td>
                    
                    <td class="text-center">{{ $item->created_at->format('d/m/Y H:i') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>