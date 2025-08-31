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

    {{-- Inline style to set the HTML background color based on our theme in app.css --}}
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f7f8;
            margin: 20px;
        }

        .container {
            max-width: 400px;
            background: white;
            padding: 30px 40px;
            margin: auto;
            border-radius: 8px;
            box-shadow: 0 2px 6px #ccc;
        }

        h2 {
            text-align: center;
            margin-bottom: 25px;
            color: #333;
        }

        label {
            display: block;
            margin-bottom: 6px;
            font-weight: bold;
            color: #555;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 10px 12px;
            margin-bottom: 18px;
            border: 1px solid #bbb;
            border-radius: 5px;
            box-sizing: border-box;
            transition: border-color 0.3s;
        }

        input[type="text"]:focus,
        input[type="email"]:focus,
        input[type="password"]:focus {
            border-color: #0066cc;
            outline: none;
        }

        .error-message {
            color: #d93025;
            font-size: 0.9em;
            margin-bottom: 15px;
            display: none;
        }

        button {
            width: 100%;
            background-color: #0066cc;
            color: white;
            padding: 12px 0;
            border: none;
            border-radius: 5px;
            font-size: 1.1em;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #004999;
        }
    </style>
    <title inertia>{{ config('app.name', 'Laravel') }}</title>

    <link rel="icon" href="/favicon.ico" sizes="any">
    <link rel="icon" href="/favicon.svg" type="image/svg+xml">
    <link rel="apple-touch-icon" href="/apple-touch-icon.png">

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />


</head>


<div class="container">
    <h2>LogIn</h2>
    <form id="myForm" novalidate action="{{ route('cuslogin.login') }}" method="post">
        @csrf
        <!--This is a Laravel security directive that generates a hidden input field with a CSRF token. 
            It's required for all POST forms to protect against cross-site request forgery attacks.-->
        <label for="email">Email</label>
        <input type="email" id="email" name="email" placeholder="example@mail.com" required />

        <label for="password">Password</label>
        <input type="password" id="password" name="password" placeholder="Create a password" required />

        <p id="error" class="error-message"></p>

        <button type="submit">Submit</button>

    </form>
    @if (session()->has('success'))
        <div
            style="background-color: #d4edda; color: #155724; border: 1px solid #c3e6cb; padding: 15px; margin-bottom: 20px; border-radius: 5px;">
            {{ session('success') }}
        </div>
    @else
        <div
            style="background-color:brown; color: #155724; border: 1px solid #c3e6cb; padding: 15px; margin-bottom: 20px; border-radius: 5px;">
            <p>Unsuccessful</p>
        </div>
    @endif
</div>

</html>