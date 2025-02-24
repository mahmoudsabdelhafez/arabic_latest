<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'لوحة التحكم')</title>
    <link href="https://fonts.googleapis.com/css2?family=Amiri:wght@400;700&family=Aref+Ruqaa:wght@400;700&display=swap" rel="stylesheet">
    <style>
    :root {
        --primary-color: #234B6E;
        --secondary-color: #3A7E71;
        --accent-color: #C17B3F;
        --text-color: #2b2b2b;
        --white: #ffffff;
        --gradient-start: #234B6E;
        --gradient-end: #3A7E71;
    }

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        font-family: 'Amiri', serif;
        background: linear-gradient(135deg, #f5f7fa 0%, #e4e9f2 100%);
        min-height: 100vh;
        line-height: 1.8;
    }

    .page-wrapper {
        display: flex;
        min-height: 100vh;
        flex-direction: column;
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
        0% { background-position: center, 0 0; }
        100% { background-position: center, 60px 60px; }
    }

    header h1 {
        color: var(--white);
        font-size: 2.5rem;
        text-align: center;
        font-family: 'Aref Ruqaa', serif;
        position: relative;
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2);
    }

    .content-wrapper {
        width: 80%;
        max-width: 1200px;
        margin: 2rem auto;
        padding: 0 2rem;
    }

    .content-card {
        background: var(--white);
        border-radius: 12px;
        padding: 2rem;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
    }

    .btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        padding: 0.75rem 1.5rem;
        border-radius: 8px;
        font-family: 'Amiri', serif;
        cursor: pointer;
        transition: all 0.3s ease;
        text-decoration: none;
        font-size: 1.1rem;
    }

    .btn-primary {
        background: linear-gradient(45deg, var(--gradient-start), var(--gradient-end));
        color: var(--white);
        border: none;
        margin-bottom: 2rem;
    }

    .btn-warning {
        background: var(--accent-color);
        color: var(--white);
        border: none;
        margin: 0 0.5rem;
    }

    .btn-danger {
        background: #dc3545;
        color: var(--white);
        border: none;
    }

    .btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.15);
    }

    .table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 1rem;
    }

    .table th,
    .table td {
        padding: 1.2rem;
        text-align: right;
        border-bottom: 1px solid rgba(0, 0, 0, 0.1);
    }

    .table th {
        background: linear-gradient(45deg, var(--gradient-start), var(--gradient-end));
        color: var(--white);
        font-family: 'Aref Ruqaa', serif;
        font-weight: normal;
    }

    .table tr {
        transition: all 0.3s ease;
    }

    .table tr:hover {
        background: rgba(35, 75, 110, 0.05);
        transform: translateX(-5px);
    }

    @media (max-width: 768px) {
        .content-wrapper {
            width: 95%;
            padding: 1rem;
        }

        .content-card {
            padding: 1rem;
        }

        .table {
            display: block;
            overflow-x: auto;
        }

        .btn {
            display: block;
            width: 100%;
            margin: 0.5rem 0;
            text-align: center;
        }

        header {
            padding: 2rem;
        }

        header h1 {
            font-size: 2rem;
        }
    }
    /* Form specific styles */
.form-group {
    margin-bottom: 1.5rem;
}

.form-group label {
    display: block;
    margin-bottom: 0.5rem;
    font-family: 'Aref Ruqaa', serif;
    font-size: 1.2rem;
    color: var(--text-color);
}

.form-control {
    width: 100%;
    padding: 0.75rem;
    border: 1px solid rgba(0, 0, 0, 0.1);
    border-radius: 8px;
    font-family: 'Amiri', serif;
    font-size: 1.1rem;
    transition: all 0.3s ease;
}

.form-control:focus {
    outline: none;
    border-color: var(--primary-color);
    box-shadow: 0 0 0 2px rgba(35, 75, 110, 0.2);
}

/* Container modifications */
.container {
    width: 80%;
    max-width: 1200px;
    margin: 2rem auto;
    padding: 0 2rem;
}

/* Media query additions */
@media (max-width: 768px) {
    .container {
        width: 95%;
        padding: 1rem;
    }
    
    .form-control {
        font-size: 1rem;
        padding: 0.5rem;
    }
    
    .form-group label {
        font-size: 1.1rem;
    }
}

.mb-3{
    margin-bottom: 15px;
}
</style>
    @yield('styles')
</head>
<body>
    <div class="page-wrapper">
    <header>
    <h1>@yield('header', 'لوحة التحكم')</h1>
</header>


        <div class="content-wrapper">
            <div class="content-card">
                @yield('content')
            </div>
        </div>
    </div>
    @yield('scripts')
</body>
</html>


