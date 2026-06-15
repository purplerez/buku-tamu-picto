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
        <p>Rekapitulasi Pengunjung Harian</p>
    </div>

    <table>
        <thead>
            <tr>
                <th width="10%">No</th>
                <th width="60%">Tanggal</th>
                <th width="30%">Jumlah Pengunjung</th>
            </tr>
        </thead>
        <tbody>
            @php $grandTotal = 0; @endphp
            @foreach($dailyRecaps as $index => $recap)
                @php $grandTotal += $recap->total; @endphp
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ \Carbon\Carbon::parse($recap->date)->translatedFormat('l, d F Y') }}</td>
                    <td>{{ $recap->total }} Orang</td>
                </tr>
            @endforeach
            <tr>
                <td colspan="2" class="total-cell">Total Keseluruhan</td>
                <td><strong>{{ $grandTotal }} Orang</strong></td>
            </tr>
        </tbody>
    </table>

    <div class="footer">
        Dicetak pada: {{ \Carbon\Carbon::now()->translatedFormat('d F Y H:i:s') }}
    </div>
</body>
</html>
