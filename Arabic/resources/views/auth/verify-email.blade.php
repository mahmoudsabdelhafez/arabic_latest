<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }} - Verify Email</title>
    
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Amiri:wght@400;700&family=Aref+Ruqaa:wght@400;700&display=swap" rel="stylesheet">
    
    <style>
        :root {
            --primary-color: #234B6E;
            --secondary-color: #3A7E71;
            --text-color: #2b2b2b;
            --white: #ffffff;
            --gradient-start: #234B6E;
            --gradient-end: #3A7E71;
            --success-color: #059669;
            --success-bg: #def7ec;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Amiri', serif;
            min-height: 100vh;
            background: linear-gradient(135deg, #f5f7fa 0%, #e4e9f2 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--text-color);
            padding: 2rem;
        }

        .verification-container {
            width: 100%;
            max-width: 440px;
            animation: fadeIn 0.5s ease-out;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .header {
            background: linear-gradient(45deg, var(--gradient-start), var(--gradient-end));
            padding: 2rem;
            border-radius: 1rem 1rem 0 0;
            position: relative;
            overflow: hidden;
            text-align: center;
        }

        .header::before {
            content: '';
            position: absolute;
            top: 0;
            right: 0;
            left: 0;
            bottom: 0;
            background: radial-gradient(circle at 50% 50%, rgba(255, 255, 255, 0.1) 0%, transparent 60%);
            opacity: 0.2;
        }

        .header h1 {
            color: var(--white);
            font-size: 2rem;
            font-family: 'Aref Ruqaa', serif;
            position: relative;
            margin: 0;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .content-container {
            background: var(--white);
            padding: 2rem;
            border-radius: 0 0 1rem 1rem;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }

        .message {
            color: var(--text-color);
            line-height: 1.6;
            margin-bottom: 1.5rem;
        }

        .success-message {
            background-color: var(--success-bg);
            color: var(--success-color);
            padding: 1rem;
            border-radius: 0.5rem;
            margin-bottom: 1.5rem;
            font-weight: 500;
        }

        .button-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 2rem;
        }

        .resend-button {
            padding: 0.75rem 1.5rem;
            background: linear-gradient(45deg, var(--gradient-start), var(--gradient-end));
            color: var(--white);
            border: none;
            border-radius: 0.5rem;
            font-size: 0.875rem;
            font-weight: bold;
            cursor: pointer;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .resend-button::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(45deg, transparent, rgba(255, 255, 255, 0.1), transparent);
            transform: translateX(-100%);
            transition: transform 0.5s ease;
        }

        .resend-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(35, 75, 110, 0.2);
        }

        .resend-button:hover::after {
            transform: translateX(100%);
        }

        .logout-button {
            background: none;
            border: none;
            color: var(--text-color);
            font-size: 0.875rem;
            text-decoration: underline;
            cursor: pointer;
            transition: color 0.3s ease;
            padding: 0.5rem;
            border-radius: 0.375rem;
        }

        .logout-button:hover {
            color: var(--primary-color);
        }

        .logout-button:focus {
            outline: none;
            box-shadow: 0 0 0 2px var(--primary-color);
        }

        @media (max-width: 640px) {
            body {
                padding: 1rem;
            }

            .header {
                padding: 1.5rem;
            }

            .content-container {
                padding: 1.5rem;
            }

            .button-container {
                flex-direction: column;
                gap: 1rem;
            }

            .resend-button {
                width: 100%;
                text-align: center;
            }

            .logout-button {
                width: 100%;
                text-align: center;
                margin-top: 0.5rem;
            }
        }
    </style>
</head>
<body>
    <div class="verification-container">
        <div class="header">
            <h1>Verify Email</h1>
        </div>

        <div class="content-container">
            <div class="message">
                {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
            </div>

            @if (session('status') == 'verification-link-sent')
                <div class="success-message">
                    {{ __('A new verification link has been sent to the email address you provided during registration.') }}
                </div>
            @endif

            <div class="button-container">
                <form method="POST" action="{{ route('verification.send') }}">
                    @csrf
                    <button type="submit" class="resend-button">
                        {{ __('Resend Verification Email') }}
                    </button>
                </form>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="logout-button">
                        {{ __('Log Out') }}
                    </button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>