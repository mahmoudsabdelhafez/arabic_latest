<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/welcome.css') }}">
</head>
<body>

    <header><h1>@yield('header')</h1></header>

    <div class="container">
        @yield('content')
    </div>

    <footer class="footer">
        <p>جميع الحقوق محفوظة © ٢٠٢٥ موارد اللغة العربية</p>
    </footer>

    <script src="{{ asset('js/script.js') }}"></script>
</body>
</html>
