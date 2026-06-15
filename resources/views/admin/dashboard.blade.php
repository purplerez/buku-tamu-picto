<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Buku Tamu</title>
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

        .logout-btn {
            background: rgba(239, 68, 68, 0.1);
            color: #ef4444;
            border: 1px solid rgba(239, 68, 68, 0.3);
            padding: 0.5rem 1rem;
            border-radius: 0.5rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.2s ease;
        }

        .logout-btn:hover {
            background: rgba(239, 68, 68, 0.2);
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

        .btn-action {
            display: inline-block;
            background: rgba(245, 158, 11, 0.1);
            color: #fde047;
            padding: 0.4rem 0.8rem;
            border-radius: 0.3rem;
            text-decoration: none;
            font-size: 0.85rem;
            border: 1px solid rgba(245, 158, 11, 0.3);
            transition: all 0.2s ease;
            margin-right: 0.5rem;
        }

        .btn-action:hover {
            background: rgba(245, 158, 11, 0.2);
        }

        .btn-action.pdf {
            background: rgba(239, 68, 68, 0.1);
            color: #fca5a5;
            border-color: rgba(239, 68, 68, 0.3);
        }

        .btn-action.pdf:hover {
            background: rgba(239, 68, 68, 0.2);
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

        .total-badge {
            background: rgba(245, 158, 11, 0.2);
            color: #fde047;
            padding: 0.25rem 0.75rem;
            border-radius: 1rem;
            font-weight: 600;
            font-size: 0.9rem;
            border: 1px solid rgba(245, 158, 11, 0.3);
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
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="logout-btn">Logout</button>
        </form>
    </nav>

    <div class="container">
        <div class="glass-panel">
            <div class="panel-header">
                <h2>Rekapitulasi Buku Tamu Harian</h2>
            </div>

            @if(count($dailyRecaps) > 0)
                <table>
                    <thead>
                        <tr>
                            <th>Tanggal</th>
                            <th>Total Pengunjung</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($dailyRecaps as $recap)
                            <tr>
                                <td>{{ \Carbon\Carbon::parse($recap->date)->translatedFormat('l, d F Y') }}</td>
                                <td><span class="total-badge">{{ $recap->total }} Orang</span></td>
                                <td>
                                    <a href="{{ route('admin.detail', $recap->date) }}" class="btn-action">Lihat Detail</a>
                                    <a href="{{ route('admin.exportPdf', $recap->date) }}" class="btn-action pdf">Export PDF</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <div class="empty-state">
                    Belum ada data rekapitulasi buku tamu.
                </div>
            @endif
        </div>
    </div>
</body>
</html>
