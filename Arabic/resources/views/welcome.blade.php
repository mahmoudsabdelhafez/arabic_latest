<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Arabic Language Resources</title>
    <link href="https://fonts.googleapis.com/css2?family=Amiri:wght@400;700&family=Aref+Ruqaa:wght@400;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-color: #1a5f7a;
            --secondary-color: #c7b7a3;
            --accent-color: #e6d5b8;
            --text-color: #2b2b2b;
            --white: #ffffff;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Amiri', serif;
            background: linear-gradient(135deg, #f5f7fa 0%, #e4e9f2 100%);
            color: var(--text-color);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        header {
            background: var(--primary-color);
            padding: 2rem;
            position: relative;
            overflow: hidden;
        }

        header::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(45deg, rgba(255,255,255,0.1) 25%, transparent 25%),
                        linear-gradient(-45deg, rgba(255,255,255,0.1) 25%, transparent 25%);
            background-size: 60px 60px;
            opacity: 0.1;
        }

        h1 {
            font-family: 'Aref Ruqaa', serif;
            color: var(--white);
            text-align: center;
            font-size: 2.5rem;
            position: relative;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.2);
        }

        .main-container {
            flex: 1;
            padding: 3rem 1rem;
            max-width: 1200px;
            margin: 0 auto;
        }

        .button-container {
            display: grid;
            grid-template-columns: repeat(3, 1fr); /* 3 columns */
            gap: 1.5rem;
            padding: 1rem;
        }

        .button {
            display: flex;
            align-items: center;
            justify-content: center;
            text-decoration: none;
            background: var(--white);
            color: var(--primary-color);
            padding: 1.2rem 1.5rem;
            font-size: 1.1rem;
            font-weight: bold;
            border-radius: 12px;
            transition: all 0.3s ease;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            position: relative;
            overflow: hidden;
            border: 2px solid transparent;
        }

        .button::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(
                120deg,
                transparent,
                rgba(255,255,255,0.3),
                transparent
            );
            transition: 0.5s;
        }

        .button:hover {
            transform: translateY(-3px);
            box-shadow: 0 6px 12px rgba(0,0,0,0.15);
            border-color: var(--primary-color);
            background: var(--primary-color);
            color: var(--white);
        }

        .button:hover::before {
            left: 100%;
        }

        .footer {
            background: var(--primary-color);
            color: var(--white);
            text-align: center;
            padding: 1.5rem;
            margin-top: auto;
        }

        @media (max-width: 1024px) {
            .button-container {
                grid-template-columns: repeat(2, 1fr); /* 2 columns for medium screens */
            }
        }

        @media (max-width: 768px) {
            .button-container {
                grid-template-columns: 1fr; /* 1 column for smaller screens */
            }
        }

        @media (prefers-reduced-motion: reduce) {
            .button::before {
                display: none;
            }
        }
    </style>
</head>
<body>
    <header>
        <h1>Arabic Language Resources</h1>
    </header>

    <div class="main-container">
        <div class="button-container">
            <a href="{{ url('/arabic-letters') }}" class="button">الاحرف العربية</a>
            <a href="{{ url('/arabic-diacritics') }}" class="button">الحركات</a>
            <a href="{{ url('/emphatic-arabic-letters') }}" class="button">أحرف القلقلة</a>
            <a href="{{ url('/three-letter-combinations') }}" class="button">الكلمات الثلاثية</a>
            <a href="{{ url('/four-letter-combinations') }}" class="button">الكلمات الرباعية</a>
            <a href="{{ url('/prefixes-suffixes') }}" class="button">السوابق واللواحق</a>
            <a href="{{ url('/root-words') }}" class="button">الجذور الثلاثية د. حسين</a>
            <a href="{{ url('/root-words-view2') }}" class="button">الجذور الثلاثية مع سوابقها ولواحقها</a>
            <a href="{{ url('/roots') }}" class="button">الجذور الثلاثة 2 - د حسين</a>
            <a href="{{ url('/words') }}" class="button">الجذور الثلاثية مع سوابقها ولواحقها 2</a>
            <a href="{{ url('/tajweeds') }}" class="button">أحكام التجويد</a>

            <a href="/phonemecategories" class="button">إضافة مخرج حروف رئيسي</a>
            <a href="/upload" class="button">إضافة صورة مخرج</a>
            

            <a href="{{ url('/ayah') }}" class="button">مثال على احكام التجويد</a>
            <a href="{{ url('/phonemes-menu') }}" class="button">الصوتيات</a>
        </div>
    </div>

    <footer class="footer">
        <p>&copy; 2025 Arabic Language Resources. All rights reserved.</p>
    </footer>
</body>
</html>
