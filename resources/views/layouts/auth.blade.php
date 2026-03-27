<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Nabung Bareng') 💕</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,600;1,400&family=DM+Sans:wght@300;400;500&display=swap" rel="stylesheet">
    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        :root {
            --rose:    #e8637a;
            --rose-d:  #c94760;
            --blush:   #fce8ec;
            --cream:   #fdf6f0;
            --warm:    #f7ede8;
            --text:    #2d1f24;
            --muted:   #9e7e87;
            --white:   #ffffff;
            --shadow:  0 8px 40px rgba(232, 99, 122, 0.15);
            --shadow2: 0 2px 12px rgba(0,0,0,0.07);
        }

        body {
            font-family: 'DM Sans', sans-serif;
            background-color: var(--cream);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 24px;
            position: relative;
            overflow: hidden;
        }

        /* Decorative blobs */
        body::before, body::after {
            content: '';
            position: fixed;
            border-radius: 50%;
            pointer-events: none;
        }
        body::before {
            width: 500px; height: 500px;
            background: radial-gradient(circle, rgba(232,99,122,0.12) 0%, transparent 70%);
            top: -150px; right: -150px;
        }
        body::after {
            width: 400px; height: 400px;
            background: radial-gradient(circle, rgba(252,232,236,0.6) 0%, transparent 70%);
            bottom: -100px; left: -100px;
        }

        /* Floating hearts */
        .hearts {
            position: fixed;
            inset: 0;
            pointer-events: none;
            overflow: hidden;
            z-index: 0;
        }
        .heart {
            position: absolute;
            font-size: 1rem;
            opacity: 0;
            animation: floatUp 8s infinite ease-in;
        }
        .heart:nth-child(1)  { left: 10%; animation-delay: 0s;   font-size: 0.7rem; }
        .heart:nth-child(2)  { left: 25%; animation-delay: 1.5s; font-size: 1rem; }
        .heart:nth-child(3)  { left: 40%; animation-delay: 3s;   font-size: 0.6rem; }
        .heart:nth-child(4)  { left: 60%; animation-delay: 0.8s; font-size: 0.9rem; }
        .heart:nth-child(5)  { left: 75%; animation-delay: 2.2s; font-size: 0.7rem; }
        .heart:nth-child(6)  { left: 88%; animation-delay: 4s;   font-size: 1.1rem; }
        @keyframes floatUp {
            0%   { bottom: -50px; opacity: 0; transform: translateX(0) rotate(0deg); }
            10%  { opacity: 0.4; }
            90%  { opacity: 0.2; }
            100% { bottom: 110%; opacity: 0; transform: translateX(30px) rotate(20deg); }
        }

        /* Card */
        .card {
            position: relative;
            z-index: 1;
            background: var(--white);
            border-radius: 24px;
            padding: 48px 44px;
            width: 100%;
            max-width: 420px;
            box-shadow: var(--shadow), var(--shadow2);
            animation: slideUp 0.5s cubic-bezier(0.22, 1, 0.36, 1) both;
        }
        @keyframes slideUp {
            from { opacity: 0; transform: translateY(24px); }
            to   { opacity: 1; transform: translateY(0); }
        }

        /* Brand */
        .brand {
            text-align: center;
            margin-bottom: 36px;
        }
        .brand-icon {
            display: inline-block;
            font-size: 2.2rem;
            margin-bottom: 10px;
            animation: pulse 2s ease-in-out infinite;
        }
        @keyframes pulse {
            0%, 100% { transform: scale(1); }
            50%       { transform: scale(1.1); }
        }
        .brand h1 {
            font-family: 'Playfair Display', serif;
            font-size: 1.75rem;
            color: var(--text);
            line-height: 1.2;
        }
        .brand p {
            font-size: 0.85rem;
            color: var(--muted);
            margin-top: 6px;
        }

        /* Alert */
        .alert {
            padding: 12px 16px;
            border-radius: 12px;
            font-size: 0.85rem;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 8px;
        }
        .alert-error   { background: #fef2f4; color: #c94760; border: 1px solid #fbc9d2; }
        .alert-success { background: #f0fdf4; color: #16a34a; border: 1px solid #bbf7d0; }

        /* Form */
        .form-group {
            margin-bottom: 18px;
        }
        label {
            display: block;
            font-size: 0.8rem;
            font-weight: 500;
            color: var(--muted);
            text-transform: uppercase;
            letter-spacing: 0.08em;
            margin-bottom: 7px;
        }
        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 13px 16px;
            border: 1.5px solid #f0dde3;
            border-radius: 12px;
            font-family: 'DM Sans', sans-serif;
            font-size: 0.95rem;
            color: var(--text);
            background: var(--warm);
            transition: border-color 0.2s, box-shadow 0.2s, background 0.2s;
            outline: none;
        }
        input:focus {
            border-color: var(--rose);
            background: var(--white);
            box-shadow: 0 0 0 3px rgba(232, 99, 122, 0.12);
        }
        .field-error {
            font-size: 0.78rem;
            color: var(--rose-d);
            margin-top: 5px;
            display: flex;
            align-items: center;
            gap: 4px;
        }
        input.is-invalid {
            border-color: var(--rose);
        }

        /* Button */
        .btn-primary {
            width: 100%;
            padding: 14px;
            background: linear-gradient(135deg, var(--rose) 0%, var(--rose-d) 100%);
            color: var(--white);
            border: none;
            border-radius: 12px;
            font-family: 'DM Sans', sans-serif;
            font-size: 1rem;
            font-weight: 500;
            cursor: pointer;
            margin-top: 8px;
            transition: transform 0.15s, box-shadow 0.15s, opacity 0.15s;
            box-shadow: 0 4px 16px rgba(232, 99, 122, 0.35);
            letter-spacing: 0.02em;
        }
        .btn-primary:hover {
            transform: translateY(-1px);
            box-shadow: 0 6px 20px rgba(232, 99, 122, 0.45);
        }
        .btn-primary:active {
            transform: translateY(0);
        }

        /* Divider */
        .divider {
            display: flex;
            align-items: center;
            gap: 12px;
            margin: 24px 0 20px;
        }
        .divider::before, .divider::after {
            content: '';
            flex: 1;
            height: 1px;
            background: #f0dde3;
        }
        .divider span {
            font-size: 0.78rem;
            color: var(--muted);
        }

        /* Switch link */
        .switch-link {
            text-align: center;
            font-size: 0.88rem;
            color: var(--muted);
        }
        .switch-link a {
            color: var(--rose);
            font-weight: 500;
            text-decoration: none;
            transition: color 0.2s;
        }
        .switch-link a:hover {
            color: var(--rose-d);
        }

        /* Remember me */
        .remember {
            display: flex;
            align-items: center;
            gap: 8px;
            margin-bottom: 18px;
        }
        .remember input[type="checkbox"] {
            width: 16px; height: 16px;
            accent-color: var(--rose);
            cursor: pointer;
        }
        .remember label {
            font-size: 0.85rem;
            color: var(--muted);
            text-transform: none;
            letter-spacing: 0;
            margin: 0;
            cursor: pointer;
        }

        /* Password hint */
        .hint {
            font-size: 0.76rem;
            color: var(--muted);
            margin-top: 5px;
        }
    </style>
    @stack('styles')
</head>
<body>
    <div class="hearts">
        <span class="heart">💕</span>
        <span class="heart">🩷</span>
        <span class="heart">💗</span>
        <span class="heart">💕</span>
        <span class="heart">🩷</span>
        <span class="heart">💗</span>
    </div>

    <div class="card">
        @yield('content')
    </div>
</body>
</html>