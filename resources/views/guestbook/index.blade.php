<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buku Tamu Digital</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary: #4f46e5;
            --primary-hover: #4338ca;
            --bg-color: #0f172a;
            --text-color: #f8fafc;
            --card-bg: rgba(30, 41, 59, 0.7);
            --border-color: rgba(255, 255, 255, 0.1);
            --input-bg: rgba(15, 23, 42, 0.6);
            --input-border: rgba(255, 255, 255, 0.2);
            --success: #10b981;
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(135deg, var(--bg-color) 0%, #1e1b4b 100%);
            color: var(--text-color);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 2rem 1rem;
        }

        .container {
            width: 100%;
            max-width: 1000px;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 2rem;
            margin-top: 2rem;
        }

        @media (max-width: 768px) {
            .container {
                grid-template-columns: 1fr;
            }
        }

        .glass-panel {
            background: var(--card-bg);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border: 1px solid var(--border-color);
            border-radius: 1rem;
            padding: 2rem;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .glass-panel:hover {
            transform: translateY(-5px);
            box-shadow: 0 30px 60px -15px rgba(0, 0, 0, 0.6);
        }

        h1 {
            font-size: 2.5rem;
            font-weight: 700;
            text-align: center;
            background: linear-gradient(to right, #818cf8, #c084fc);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            margin-bottom: 0.5rem;
        }

        .subtitle {
            text-align: center;
            color: #94a3b8;
            margin-bottom: 2rem;
        }

        h2 {
            font-size: 1.5rem;
            margin-bottom: 1.5rem;
            color: #e2e8f0;
            border-bottom: 1px solid var(--border-color);
            padding-bottom: 0.5rem;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 500;
            color: #cbd5e1;
            font-size: 0.9rem;
        }

        input, textarea {
            width: 100%;
            padding: 0.75rem 1rem;
            background: var(--input-bg);
            border: 1px solid var(--input-border);
            border-radius: 0.5rem;
            color: white;
            font-family: inherit;
            font-size: 1rem;
            transition: all 0.3s ease;
            outline: none;
        }

        input:focus, textarea:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(79, 70, 229, 0.2);
        }

        button {
            width: 100%;
            padding: 0.875rem;
            background: linear-gradient(135deg, var(--primary) 0%, #6366f1 100%);
            color: white;
            border: none;
            border-radius: 0.5rem;
            font-weight: 600;
            font-size: 1rem;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 4px 14px 0 rgba(79, 70, 229, 0.39);
        }

        button:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(79, 70, 229, 0.4);
            background: linear-gradient(135deg, var(--primary-hover) 0%, #4f46e5 100%);
        }

        .alert-success {
            background-color: rgba(16, 185, 129, 0.2);
            border: 1px solid var(--success);
            color: #34d399;
            padding: 1rem;
            border-radius: 0.5rem;
            margin-bottom: 1.5rem;
            text-align: center;
            font-weight: 500;
            animation: fadeIn 0.5s ease-out;
        }

        .guest-list {
            display: flex;
            flex-direction: column;
            gap: 1rem;
            max-height: 500px;
            overflow-y: auto;
            padding-right: 0.5rem;
        }

        /* Custom Scrollbar */
        .guest-list::-webkit-scrollbar {
            width: 6px;
        }
        .guest-list::-webkit-scrollbar-track {
            background: rgba(255, 255, 255, 0.05);
            border-radius: 10px;
        }
        .guest-list::-webkit-scrollbar-thumb {
            background: rgba(255, 255, 255, 0.2);
            border-radius: 10px;
        }
        .guest-list::-webkit-scrollbar-thumb:hover {
            background: rgba(255, 255, 255, 0.3);
        }

        .guest-card {
            background: rgba(255, 255, 255, 0.03);
            border: 1px solid rgba(255, 255, 255, 0.05);
            border-radius: 0.75rem;
            padding: 1rem;
            transition: all 0.2s ease;
            animation: slideIn 0.4s ease-out forwards;
            opacity: 0;
            transform: translateY(10px);
        }

        .guest-card:hover {
            background: rgba(255, 255, 255, 0.06);
            border-color: rgba(255, 255, 255, 0.1);
        }

        .guest-card h3 {
            font-size: 1.1rem;
            color: #f8fafc;
            margin-bottom: 0.25rem;
        }

        .guest-card .meta {
            font-size: 0.85rem;
            color: #94a3b8;
            margin-bottom: 0.5rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .guest-card .address {
            font-size: 0.95rem;
            color: #cbd5e1;
            line-height: 1.4;
        }

        .empty-state {
            text-align: center;
            color: #64748b;
            padding: 2rem 0;
            font-style: italic;
        }

        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        @keyframes slideIn {
            to { opacity: 1; transform: translateY(0); }
        }

        /* Stagger animation for guest cards */
        .guest-card:nth-child(1) { animation-delay: 0.1s; }
        .guest-card:nth-child(2) { animation-delay: 0.2s; }
        .guest-card:nth-child(3) { animation-delay: 0.3s; }
        .guest-card:nth-child(4) { animation-delay: 0.4s; }
        .guest-card:nth-child(5) { animation-delay: 0.5s; }
    </style>
</head>
<body>
    <header>
        <h1>Buku Tamu Digital</h1>
        <p class="subtitle">Silakan isi data diri Anda untuk mengisi buku tamu</p>
    </header>

    <div class="container">
        <!-- Form Section -->
        <div class="glass-panel">
            <h2>Isi Buku Tamu</h2>
            
            @if(session('success'))
                <div class="alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('guestbook.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="nama">Nama Lengkap</label>
                    <input type="text" id="nama" name="nama" required placeholder="Masukkan nama lengkap Anda" value="{{ old('nama') }}">
                    @error('nama')
                        <span style="color: #ef4444; font-size: 0.8rem; margin-top: 0.25rem; display: block;">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="asal_sekolah">Asal Sekolah / Unit Kerja</label>
                    <input type="text" id="asal_sekolah" name="asal_sekolah" required placeholder="Contoh: SMA Negeri 1 / PT. Maju Jaya" value="{{ old('asal_sekolah') }}">
                    @error('asal_sekolah')
                        <span style="color: #ef4444; font-size: 0.8rem; margin-top: 0.25rem; display: block;">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <textarea id="alamat" name="alamat" rows="4" required placeholder="Masukkan alamat lengkap Anda">{{ old('alamat') }}</textarea>
                    @error('alamat')
                        <span style="color: #ef4444; font-size: 0.8rem; margin-top: 0.25rem; display: block;">{{ $message }}</span>
                    @enderror
                </div>

                <button type="submit">Kirim Data</button>
            </form>
        </div>

        <!-- List Section -->
        <div class="glass-panel">
            <h2>Daftar Tamu Terbaru</h2>
            <div class="guest-list">
                @forelse($guestbooks as $guest)
                    <div class="guest-card">
                        <h3>{{ $guest->nama }}</h3>
                        <div class="meta">
                            <span>🏢 {{ $guest->asal_sekolah }}</span>
                            <span>•</span>
                            <span>🕒 {{ $guest->created_at->diffForHumans() }}</span>
                        </div>
                        <p class="address">📍 {{ $guest->alamat }}</p>
                    </div>
                @empty
                    <div class="empty-state">
                        Belum ada data tamu yang mengisi. Jadilah yang pertama!
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</body>
</html>
