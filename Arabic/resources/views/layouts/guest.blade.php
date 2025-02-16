<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <!-- <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" /> -->

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <style>
    :root {
        --primary-color: #234B6E;
        --secondary-color: #3A7E71;
        --accent-color: #C17B3F;
        --text-color: #2b2b2b;
        --white: #ffffff;
        --gradient-start: #234B6E;
        --gradient-end: #3A7E71;
        --sidebar-width: 280px;
    }

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    .body {
        font-family: 'Amiri', serif;
        display: flex;
        min-height: 82vh;
        background: linear-gradient(135deg, #f5f7fa 0%, #e4e9f2 100%);
        color: var(--text-color);
    }

    header {
        background: linear-gradient(45deg, var(--gradient-start), var(--gradient-end));
        padding: 3rem;
        position: relative;
        overflow: hidden;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
    }

    header::before {
        content: '';
        position: absolute;
        top: 0;
        right: 0;
        left: 0;
        bottom: 0;
        background:
            radial-gradient(circle at 50% 50%, rgba(255, 255, 255, 0.1) 0%, transparent 60%),
            linear-gradient(45deg, rgba(255, 255, 255, 0.1) 25%, transparent 25%);
        background-size: 100% 100%, 60px 60px;
        opacity: 0.2;
        animation: backgroundMove 30s linear infinite;
    }

    @keyframes backgroundMove {
        0% {
            background-position: center, 0 0;
        }

        100% {
            background-position: center, 60px 60px;
        }
    }

    header h1 {
        color: var(--white);
        font-size: 3rem;
        text-align: center;
        font-family: 'Aref Ruqaa', serif;
        position: relative;
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2);
    }

    /* Sidebar Styles */
    .sidebar {
        width: var(--sidebar-width);
        background: var(--white);
        /* height: 100vh; */
        position: static;
        right: 0;
        overflow-y: auto;
        border-left: 1px solid rgba(0, 0, 0, 0.1);
        box-shadow: -4px 0 15px rgba(0, 0, 0, 0.1);
    }

    .sidebar-header {
        background: linear-gradient(45deg, var(--gradient-start), var(--gradient-end));
        padding: 2rem 1.5rem;
        position: relative;
        overflow: hidden;
    }

    .sidebar-header::before {
        content: '';
        position: absolute;
        top: 0;
        right: 0;
        left: 0;
        bottom: 0;
        background: radial-gradient(circle at 50% 50%, rgba(255, 255, 255, 0.1) 0%, transparent 60%);
        opacity: 0.2;
    }

    .sidebar h1 {
        color: var(--white);
        font-size: 1.5rem;
        font-family: 'Aref Ruqaa', serif;
        position: relative;
        text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.2);
    }

    .sidebar h2 {
        padding: 1rem 1.5rem;
        cursor: pointer;
        color: var(--text-color);
        font-size: 1.1rem;
        transition: all 0.3s ease;
        border-radius: 0.5rem;
        margin: 0.5rem 0.75rem;
        font-family: 'Amiri', serif;
    }

    .sidebar h2:hover {
        background-color: rgba(35, 75, 110, 0.1);
        color: var(--primary-color);
    }

    .sidebar h2.active {
        background: linear-gradient(45deg, var(--gradient-start), var(--gradient-end));
        color: var(--white);
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    }

    /* Main Content Styles */
    .main-content {
        flex: 1;
        /* margin-right: var(--sidebar-width); */
        padding: 2rem;
        max-width: 1200px;
    }

    .section {
        background: var(--white);
        border-radius: 20px;
        padding: 2rem;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        margin-bottom: 2rem;
        display: none;
        animation: fadeIn 0.3s ease;
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(10px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .section.active {
        display: block;
    }

    .section h2 {
        color: var(--primary-color);
        margin-bottom: 2rem;
        font-size: 1.8rem;
        font-family: 'Aref Ruqaa', serif;
        position: relative;
        padding-bottom: 0.75rem;
    }

    .section h2::after {
        content: '';
        position: absolute;
        bottom: 0;
        right: 0;
        width: 60px;
        height: 4px;
        background: linear-gradient(45deg, var(--gradient-start), var(--gradient-end));
        border-radius: 2px;
    }

    .button-container {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
        gap: 1.5rem;
        padding: 0.5rem;
    }

    .button {
        display: flex;
        align-items: center;
        justify-content: center;
        text-decoration: none;
        background: var(--white);
        color: var(--text-color);
        padding: 1.5rem;
        font-size: 1.1rem;
        border-radius: 12px;
        transition: all 0.3s ease;
        border: 1px solid rgba(0, 0, 0, 0.1);
        text-align: center;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    }

    .button:hover {
        transform: translateY(-3px);
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
        background: linear-gradient(45deg, var(--gradient-start), var(--gradient-end));
        color: var(--white);
        border-color: transparent;
    }

    .menu-toggle {
        position: fixed;
        right: 1rem;
        top: 1rem;
        z-index: 1001;
        background: linear-gradient(45deg, var(--gradient-start), var(--gradient-end));
        color: var(--white);
        border: none;
        padding: 0.75rem 1.5rem;
        border-radius: 8px;
        cursor: pointer;
        display: none;
        font-family: 'Amiri', serif;
        font-size: 1.1rem;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    }

    @media (max-width: 768px) {
        .sidebar {
            display: none;
            transform: translateX(100%);
            transition: transform 0.3s ease;
            z-index: 1000;
        }

        .sidebar.active {
            display: block;
            transform: translateX(0);
        }


        .main-content {
            margin-right: 0;
            padding: 1rem;
            width: 90%;
        }

        .menu-toggle {
            display: block;
        }

        .button-container {
            grid-template-columns: 1fr;
        }
    }



    .menu-toggle:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(0, 0, 0, 0.15);
    }

    .overlay {
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: rgba(0, 0, 0, 0.5);
        display: none;
        z-index: 999;
        backdrop-filter: blur(4px);
    }

    .overlay.active {
        display: block;
    }

    .content-section {
        margin: 2rem 0;
        padding: 2rem;
        background: #fff;
        border-radius: 12px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    }

    .content-title {
        color: #234B6E;
        font-size: 1.8rem;
        margin-bottom: 1rem;
        font-family: 'Aref Ruqaa', serif;
        border-bottom: 3px solid #3A7E71;
        padding-bottom: 0.5rem;
    }

    .content-text {
        font-size: 1.1rem;
        line-height: 1.8;
        color: #2b2b2b;
        margin-bottom: 1.5rem;
    }

    .button-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 1.5rem;
        margin-top: 2rem;
    }

    .nav-button {
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 1.2rem 1.5rem;
        background: #fff;
        color: #234B6E;
        text-decoration: none;
        border-radius: 8px;
        border: 2px solid #234B6E;
        font-size: 1.2rem;
        font-weight: bold;
        transition: all 0.3s ease;
        text-align: center;
    }

    .nav-button:hover {
        background: linear-gradient(45deg, #234B6E, #3A7E71);
        color: #fff;
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(35, 75, 110, 0.2);
    }

    .section-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 2rem;
    }

    .section-header h2 {
        margin: 0;
        color: #234B6E;
        font-size: 2rem;
        font-family: 'Aref Ruqaa', serif;
    }

    @media (max-width: 768px) {
        .content-section {
            padding: 1.5rem;
        }

        .button-grid {
            grid-template-columns: 1fr;
        }
    }
    </style>
    <style>
    .harf-section {
        background-color: #f9f9fc;
        border-radius: 12px;
        padding: 2rem;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
    }

    .section-title {
        color: #234B6E;
        font-size: 2.2rem;
        margin-bottom: 1.5rem;
        /* border-bottom: 3px solid #3A7E71; */
        padding-bottom: 0.5rem;
    }

    .content-card {
        background-color: white;
        border-radius: 10px;
        padding: 1.5rem;
        margin-bottom: 1.5rem;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);
    }

    .main-description {
        color: #2b2b2b;
        font-size: 1.2rem;
        line-height: 1.8;
        margin-bottom: 1rem;
    }

    .examples-section {
        background-color: #f0f4f8;
        border-radius: 8px;
        padding: 1rem;
    }

    .examples-title {
        color: #3A7E71;
        font-size: 1.3rem;
        margin-bottom: 0.8rem;
    }

    .examples-list {
        list-style-type: none;
        padding-right: 1rem;
    }

    .example-item {
        margin-bottom: 0.5rem;
        position: relative;
        padding-right: 1rem;
    }

    .example-item::before {
        content: '•';
        color: #234B6E;
        position: absolute;
        right: 0;
        top: 0;
    }

    .example-text {
        color: #2b2b2b;
        font-size: 1.1rem;
    }

    .no-content-message {
        text-align: center;
        color: #888;
        padding: 2rem;
        background-color: #f8f9fa;
        border-radius: 10px;
    }

    .tools-section {
        margin-top: 2rem;
    }

    .tools-title {
        color: #234B6E;
        font-size: 1.6rem;
        margin-bottom: 1rem;
        border-bottom: 2px solid #3A7E71;
        padding-bottom: 0.3rem;
    }

    .button-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 1rem;
    }

    .tool-button {
        display: flex;
        align-items: center;
        justify-content: center;
        background-color: white;
        color: #234B6E;
        border: 2px solid #234B6E;
        padding: 1rem;
        border-radius: 8px;
        text-decoration: none;
        transition: all 0.3s ease;
        font-size: 1.1rem;
    }

    .tool-button:hover {
        background-color: #234B6E;
        color: white;
        transform: translateY(-3px);
        box-shadow: 0 4px 10px rgba(35, 75, 110, 0.2);
    }

    .tool-icon {
        margin-left: 0.5rem;
    }

    @media (max-width: 768px) {
        .harf-section {
            padding: 1rem;
        }

        .section-title {
            font-size: 1.8rem;
        }

        .button-grid {
            grid-template-columns: 1fr;
        }
    }
    </style>
    </head>
    <body class="font-sans text-gray-900 antialiased">
        <!-- <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100 dark:bg-gray-900">
            <div>
                <a href="/">
                    <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
                </a>
            </div> -->

            <!-- <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg"> -->
                {{ $slot }}
            <!-- </div> -->
        </div>
    </body>
</html>
