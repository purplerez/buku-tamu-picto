<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Pengunjung - Buku Tamu</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary: #f59e0b;
            --primary-hover: #d97706;
            --bg-color: #7f1d1d;
            --text-color: #fef3c7;
            --card-bg: rgba(69, 10, 10, 0.7);
            --border-color: rgba(253, 230, 138, 0.2);
            --input-bg: rgba(69, 10, 10, 0.6);
            --input-border: rgba(253, 230, 138, 0.3);
            --success: #10b981;
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(135deg, var(--bg-color) 0%, #450a0a 100%);
            color: var(--text-color);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 2rem 1rem;
        }

        .navbar {
            width: 100%;
            max-width: 1000px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1rem 2rem;
            background: var(--card-bg);
            backdrop-filter: blur(12px);
            border: 1px solid var(--border-color);
            border-radius: 1rem;
            margin-bottom: 2rem;
            box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.3);
        }

        .navbar-brand {
            font-size: 1.5rem;
            font-weight: 700;
            background: linear-gradient(to right, #fde047, #f59e0b);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .container {
            width: 100%;
            max-width: 1000px;
        }

        .glass-panel {
            background: var(--card-bg);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border: 1px solid var(--border-color);
            border-radius: 1rem;
            padding: 2rem;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5);
        }

        .panel-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.5rem;
            border-bottom: 1px solid var(--border-color);
            padding-bottom: 1rem;
        }

        .panel-header h2 {
            font-size: 1.5rem;
            color: #fef3c7;
        }

        .panel-header h2 span {
            color: #f59e0b;
        }

        .btn-back {
            display: inline-block;
            background: rgba(255, 255, 255, 0.1);
            color: #fef3c7;
            padding: 0.5rem 1rem;
            border-radius: 0.5rem;
            text-decoration: none;
            font-weight: 500;
            transition: all 0.2s ease;
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .btn-back:hover {
            background: rgba(255, 255, 255, 0.2);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 1rem;
        }

        th, td {
            padding: 1rem;
            text-align: left;
            border-bottom: 1px solid rgba(253, 230, 138, 0.1);
        }

        th {
            font-weight: 600;
            color: #fde68a;
            background: rgba(0, 0, 0, 0.2);
        }

        tr:hover td {
            background: rgba(255, 255, 255, 0.05);
        }

        td {
            color: #f8fafc;
        }

        .empty-state {
            text-align: center;
            padding: 3rem;
            color: #fcd34d;
            font-style: italic;
        }
    </style>
</head>
<body>
    <nav class="navbar">
        <div class="navbar-brand">Pictografest Admin</div>
        <a href="{{ route('admin.dashboard') }}" class="btn-back">← Kembali</a>
    </nav>

    <div class="container">
        <div class="glass-panel">
            <div class="panel-header">
                <h2>Daftar Tamu: <span>{{ \Carbon\Carbon::parse($date)->translatedFormat('l, d F Y') }}</span></h2>
                <a href="{{ route('admin.exportPdf', $date) }}" class="btn-back" style="background: rgba(239, 68, 68, 0.2); border-color: rgba(239, 68, 68, 0.4); color: #fca5a5;">📄 Export PDF</a>
            </div>

            @if(count($guests) > 0)
                <table>
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Lengkap</th>
                            <th>Asal Sekolah / Unit Kerja</th>
                            <th>Alamat</th>
                            <th>Waktu Isi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($guests as $index => $guest)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td style="font-weight: 600; color: #fde047;">{{ $guest->nama }}</td>
                                <td>{{ $guest->asal_sekolah }}</td>
                                <td>{{ $guest->alamat }}</td>
                                <td style="font-size: 0.9em; color: #cbd5e1;">{{ $guest->created_at->format('H:i') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <div class="empty-state">
                    Tidak ada data tamu pada hari ini.
                </div>
            @endif
        </div>
    </div>
</body>
</html>
