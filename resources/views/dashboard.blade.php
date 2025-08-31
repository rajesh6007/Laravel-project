<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" @class(['dark' => ($appearance ?? 'system') == 'dark'])>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- Inline script to detect system dark mode preference and apply it immediately --}}
    <script>
        (function () {
            const appearance = '{{ $appearance ?? "system" }}';

            if (appearance === 'system') {
                const prefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;

                if (prefersDark) {
                    document.documentElement.classList.add('dark');
                }
            }
        })();
    </script>

    {{-- Updated CSS for modern responsive design --}}
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Instrument Sans', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .container {
            width: 100%;
            max-width: 420px;
            background: white;
            padding: 40px;
            border-radius: 16px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
            backdrop-filter: blur(10px);
        }

        .header {
            text-align: center;
            margin-bottom: 32px;
        }

        .header h2 {
            font-size: 28px;
            font-weight: 600;
            color: #1a202c;
            margin-bottom: 8px;
        }

        .header p {
            color: #718096;
            font-size: 16px;
        }

        .form-group {
            margin-bottom: 24px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
            color: #374151;
            font-size: 14px;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 14px 16px;
            border: 2px solid #e5e7eb;
            border-radius: 12px;
            font-size: 16px;
            transition: all 0.3s ease;
            background-color: #f9fafb;
        }

        input[type="text"]:focus,
        input[type="email"]:focus,
        input[type="password"]:focus {
            border-color: #667eea;
            background-color: white;
            outline: none;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
        }

        .error-message {
            color: #ef4444;
            font-size: 14px;
            margin-top: 8px;
            padding: 12px;
            background-color: #fef2f2;
            border-radius: 8px;
            border-left: 4px solid #ef4444;
        }

        .success-message {
            color: #059669;
            font-size: 14px;
            margin-bottom: 20px;
            padding: 12px;
            background-color: #ecfdf5;
            border-radius: 8px;
            border-left: 4px solid #059669;
        }

        button {
            width: 100%;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 16px 0;
            border: none;
            border-radius: 12px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            margin-top: 8px;
        }

        button:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(102, 126, 234, 0.3);
        }

        button:active {
            transform: translateY(0);
        }

        .login-link {
            text-align: center;
            margin-top: 24px;
            color: #718096;
            font-size: 14px;
        }

        .login-link a {
            color: #667eea;
            text-decoration: none;
            font-weight: 500;
        }

        .login-link a:hover {
            text-decoration: underline;
        }

        /* Dark mode styles */
        .dark body {
            background: linear-gradient(135deg, #1a202c 0%, #2d3748 100%);
        }

        .dark .container {
            background: #2d3748;
            color: white;
        }

        .dark .header h2 {
            color: white;
        }

        .dark input[type="text"],
        .dark input[type="email"],
        .dark input[type="password"] {
            background-color: #4a5568;
            border-color: #4a5568;
            color: white;
        }

        .dark input[type="text"]:focus,
        .dark input[type="email"]:focus,
        .dark input[type="password"]:focus {
            background-color: #2d3748;
            border-color: #667eea;
        }

        /* Responsive design */
        @media (max-width: 480px) {
            .container {
                padding: 24px;
                margin: 16px;
            }

            .header h2 {
                font-size: 24px;
            }

            input[type="text"],
            input[type="email"],
            input[type="password"] {
                padding: 12px 14px;
                font-size: 16px;
            }

            button {
                padding: 14px 0;
            }
        }
    </style>

    <title>{{ config('app.name', 'Laravel') }} - Register</title>

    <link rel="icon" href="/favicon.ico" sizes="any">
    <link rel="icon" href="/favicon.svg" type="image/svg+xml">
    <link rel="apple-touch-icon" href="/apple-touch-icon.png">

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
</head>

<body>
    <div class="container">
        <div class="header">
            <h2>Create Account</h2>
            <p>Join us today and get started</p>
        </div>

        {{-- Added success/error message handling --}}
        @if (session()->has('success'))
            <div class="success-message">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="error-message">
                <ul style="margin: 0; padding-left: 20px;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form id="registrationForm" action="{{ route('customeregister.store') }}" method="post">
            @csrf

            <div class="form-group">
                <label for="name">Full Name</label>
                <input type="text" id="name" name="name" placeholder="Enter your full name" value="{{ old('name') }}"
                    required />
            </div>

            <div class="form-group">
                <label for="email">Email Address</label>
                <input type="email" id="email" name="email" placeholder="Enter your email" value="{{ old('email') }}"
                    required />
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Create a secure password" required />
            </div>

            <div class="form-group">
                <label for="password_confirmation">Confirm Password</label>
                <input type="password" id="password_confirmation" name="password_confirmation"
                    placeholder="Confirm your password" required />
            </div>

            <button type="submit">Create Account</button>
        </form>

        <div class="login-link">
            Already have an account? <a href="{{ route('login') }}">Sign in here</a>
        </div>
    </div>
</body>

</html>