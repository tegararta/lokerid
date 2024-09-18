<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Presensi PDF</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 10px;
            text-align: center;
        }
        th {
            background-color: #f2f2f2;
        }
        .footer {
            text-align: right;
            font-size: 12px;
            margin-top: 20px;
            color: #555;
        }
    </style>
</head>
<body>
    <div class="mt-4 mb-4">
        <h2>{{$absensi->pelatihan->nama}}</h2>
    </div>
    <h2>Daftar Absensi Pelatihan</h2>
    
    <table class="mt-4">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Member</th>
                <th>Pelatihan</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($absensi->pelatihan->daftarpelatihan as $index => $item)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $item->nama ?? 'Tidak Ada Nama' }}</td>
                    <td>{{ $item->pelatihan->pelatihan ?? 'Tidak Ada Pelatihan' }}</td>
                    <td>{{ $item->member->absensi->first()->status ?? 'Tidak Ada Status' }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">Belum ada mahasiswa untuk di presensi.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    {{-- Footer untuk menampilkan tanggal dan hari --}}
    <div class="footer">
        Dicetak pada: {{ \Carbon\Carbon::now()->locale('id')->translatedFormat('l, d F Y') }} oleh Instruktur {{ $absensi->nama}}
    </div>
</body>
</html>
