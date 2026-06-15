<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Rekapitulasi Buku Tamu</title>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            color: #333;
            line-height: 1.6;
        }
        .header {
            text-align: center;
            margin-bottom: 30px;
            border-bottom: 2px solid #8b0000;
            padding-bottom: 10px;
        }
        .header h1 {
            color: #8b0000;
            margin: 0;
            font-size: 24px;
        }
        .header p {
            margin: 5px 0 0;
            color: #666;
            font-size: 14px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 12px 8px;
            text-align: left;
        }
        th {
            background-color: #8b0000;
            color: white;
            font-weight: bold;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        .total-cell {
            font-weight: bold;
            text-align: right;
        }
        .footer {
            margin-top: 50px;
            text-align: right;
            font-size: 12px;
            color: #777;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>Pictografest - Laporan Buku Tamu</h1>
        <p>Daftar Pengunjung pada Tanggal: <strong>{{ \Carbon\Carbon::parse($date)->translatedFormat('l, d F Y') }}</strong></p>
    </div>

    <table>
        <thead>
            <tr>
                <th width="5%">No</th>
                <th width="30%">Nama Lengkap</th>
                <th width="25%">Asal Sekolah / Unit Kerja</th>
                <th width="40%">Alamat</th>
            </tr>
        </thead>
        <tbody>
            @foreach($guests as $index => $guest)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $guest->nama }}</td>
                    <td>{{ $guest->asal_sekolah }}</td>
                    <td>{{ $guest->alamat }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="footer">
        Total Pengunjung: {{ count($guests) }} Orang | Dicetak pada: {{ \Carbon\Carbon::now()->translatedFormat('d F Y H:i:s') }}
    </div>
</body>
</html>
