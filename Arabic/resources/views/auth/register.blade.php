<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }} - Register</title>
    
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
            --error-color: #e53e3e;
            --input-border: #e2e8f0;
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

        .register-container {
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

        .form-container {
            background: var(--white);
            padding: 2rem;
            border-radius: 0 0 1rem 1rem;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }

        .form-group {
            margin-bottom: 1.5rem;
            position: relative;
        }

        .form-label {
            display: block;
            margin-bottom: 0.5rem;
            color: var(--text-color);
            font-weight: bold;
        }

        .form-input {
            width: 100%;
            padding: 0.75rem 1rem;
            border: 1px solid var(--input-border);
            border-radius: 0.5rem;
            font-size: 1rem;
            transition: all 0.3s ease;
        }

        .form-input:focus {
            outline: none;
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(35, 75, 110, 0.1);
        }

        .password-container {
            position: relative;
        }

        .toggle-password {
            position: absolute;
            right: 1rem;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            cursor: pointer;
            color: var(--text-color);
            opacity: 0.6;
            transition: opacity 0.3s ease;
            padding: 0.25rem;
        }

        .toggle-password:hover {
            opacity: 1;
        }

        .toggle-password svg {
            width: 1.25rem;
            height: 1.25rem;
        }

        .register-button {
            width: 100%;
            padding: 0.75rem;
            background: linear-gradient(45deg, var(--gradient-start), var(--gradient-end));
            color: var(--white);
            border: none;
            border-radius: 0.5rem;
            font-size: 1rem;
            font-weight: bold;
            cursor: pointer;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .register-button::after {
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

        .register-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(35, 75, 110, 0.2);
        }

        .register-button:hover::after {
            transform: translateX(100%);
        }

        .login-link {
            text-align: right;
            margin-top: 1.5rem;
            display: flex;
            justify-content: flex-end;
            align-items: center;
            gap: 1rem;
        }

        .login-link a {
            color: var(--primary-color);
            text-decoration: none;
            font-size: 0.875rem;
            transition: color 0.3s ease;
        }

        .login-link a:hover {
            color: var(--secondary-color);
        }

        .error-message {
            color: var(--error-color);
            font-size: 0.875rem;
            margin-top: 0.5rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .error-message::before {
            content: '⚠';
        }

        @media (max-width: 640px) {
            body {
                padding: 1rem;
            }

            .header {
                padding: 1.5rem;
            }

            .form-container {
                padding: 1.5rem;
            }

            .login-link {
                flex-direction: column;
                align-items: center;
                gap: 0.5rem;
            }
        }
    </style>
</head>
<body>
    <div class="register-container">
        <div class="header">
            <h1>Create Account</h1>
        </div>

        <div class="form-container">
            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="form-group">
                    <label for="name" class="form-label">{{ __('Name') }}</label>
                    <input 
                        type="text" 
                        id="name" 
                        name="name" 
                        class="form-input" 
                        value="{{ old('name') }}" 
                        required 
                        autofocus 
                        autocomplete="name"
                    >
                    @error('name')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="email" class="form-label">{{ __('Email') }}</label>
                    <input 
                        type="email" 
                        id="email" 
                        name="email" 
                        class="form-input" 
                        value="{{ old('email') }}" 
                        required 
                        autocomplete="username"
                    >
                    @error('email')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password" class="form-label">{{ __('Password') }}</label>
                    <div class="password-container">
                        <input 
                            type="password" 
                            id="password" 
                            name="password" 
                            class="form-input" 
                            required 
                            autocomplete="new-password"
                        >
                        <button 
                            type="button" 
                            class="toggle-password" 
                            onclick="togglePasswordVisibility('password')"
                            aria-label="Toggle password visibility"
                        >
                            <svg class="eye-icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                <circle cx="12" cy="12" r="3"></circle>
                            </svg>
                            <svg class="eye-off-icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="display: none;">
                                <path d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19m-6.72-1.07a3 3 0 1 1-4.24-4.24"></path>
                                <line x1="1" y1="1" x2="23" y2="23"></line>
                            </svg>
                        </button>
                    </div>
                    @error('password')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password_confirmation" class="form-label">{{ __('Confirm Password') }}</label>
                    <div class="password-container">
                        <input 
                            type="password" 
                            id="password_confirmation" 
                            name="password_confirmation" 
                            class="form-input" 
                            required 
                            autocomplete="new-password"
                        >
                        <button 
                            type="button" 
                            class="toggle-password" 
                            onclick="togglePasswordVisibility('password_confirmation')"
                            aria-label="Toggle password confirmation visibility"
                        >
                            <svg class="eye-icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                <circle cx="12" cy="12" r="3"></circle>
                            </svg>
                            <svg class="eye-off-icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="display: none;">
                                <path d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19m-6.72-1.07a3 3 0 1 1-4.24-4.24"></path>
                                <line x1="1" y1="1" x2="23" y2="23"></line>
                            </svg>
                        </button>
                    </div>
                    @error('password_confirmation')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>

                <div class="login-link">
                    <a href="{{ route('login') }}" class="text-sm">
                        {{ __('Already registered?') }}
                    </a>
                    <button type="submit" class="register-button">
                        {{ __('Register') }}
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function togglePasswordVisibility(inputId) {
            const passwordInput = document.getElementById(inputId);
            const container = passwordInput.parentElement;
            const eyeIcon = container.querySelector('.eye-icon');
            const eyeOffIcon = container.querySelector('.eye-off-icon');
            
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                eyeIcon.style.display = 'none';
                eyeOffIcon.style.display = 'block';
            } else {
                passwordInput.type = 'password';
                eyeIcon.style.display = 'block';
                eyeOffIcon.style.display = 'none';
            }
        }
    </script>
</body>
</html>