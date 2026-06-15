<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - Buku Tamu</title>
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
            --error: #ef4444;
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
            justify-content: center;
            align-items: center;
            padding: 1rem;
        }

        .login-card {
            background: var(--card-bg);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border: 1px solid var(--border-color);
            border-radius: 1rem;
            padding: 3rem 2rem;
            width: 100%;
            max-width: 400px;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5);
            animation: slideIn 0.4s ease-out;
        }

        h1 {
            font-size: 2rem;
            font-weight: 700;
            text-align: center;
            background: linear-gradient(to right, #fde047, #f59e0b);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            margin-bottom: 0.5rem;
        }

        p.subtitle {
            text-align: center;
            color: #fde68a;
            margin-bottom: 2rem;
            font-size: 0.95rem;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 500;
            color: #fde68a;
            font-size: 0.9rem;
        }

        input {
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

        input:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(245, 158, 11, 0.2);
        }

        .error-message {
            color: var(--error);
            font-size: 0.8rem;
            margin-top: 0.25rem;
            display: block;
        }

        button {
            width: 100%;
            padding: 0.875rem;
            background: linear-gradient(135deg, #fde047 0%, var(--primary) 100%);
            color: #450a0a;
            border: none;
            border-radius: 0.5rem;
            font-weight: 700;
            font-size: 1rem;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 4px 14px 0 rgba(245, 158, 11, 0.39);
            margin-top: 1rem;
        }

        button:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(245, 158, 11, 0.4);
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-hover) 100%);
        }

        .back-link {
            display: block;
            text-align: center;
            margin-top: 1.5rem;
            color: #fde68a;
            text-decoration: none;
            font-size: 0.9rem;
            transition: color 0.2s;
        }

        .back-link:hover {
            color: #fff;
        }

        @keyframes slideIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>
</head>
<body>
    <div class="login-card">
        <h1>Admin Login</h1>
        <p class="subtitle">Masuk untuk melihat rekapitulasi data tamu</p>

        <form action="{{ route('login') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" required autofocus placeholder="admin@admin.com">
                @error('email')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required placeholder="••••••••">
                @error('password')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>

            <button type="submit">Masuk ke Dashboard</button>
        </form>

        <a href="{{ route('guestbook.index') }}" class="back-link">← Kembali ke Halaman Buku Tamu</a>
    </div>
</body>
</html>
