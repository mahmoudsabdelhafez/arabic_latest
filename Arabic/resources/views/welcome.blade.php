<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>موارد اللغة العربية</title>
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
        a {
            background: linear-gradient(135deg, #f5f7fa 0%, #e4e9f2 100%);

        }

        h1, h2 {
            font-family: 'Aref Ruqaa', serif;
            color: var(--white);
            text-align: center;
            position: relative;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.2);
        }

        h1 { font-size: 2.5rem; }
        h2 { 
            color: var(--primary-color);
            margin: 2rem 0 1rem;
            font-size: 1.8rem;
        }

        .main-container {
            flex: 1;
            padding: 3rem 1rem;
            max-width: 1200px;
            margin: 0 auto;
        }

        .section {
            margin-bottom: 3rem;
            background: var(--white);
            border-radius: 15px;
            padding: 1.5rem;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }

        .button-container {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 1.5rem;
            padding: 1rem;
        }

        .button {
            display: flex;
            align-items: center;
            justify-content: center;
            text-decoration: none;
            background: linear-gradient(135deg, #f5f7fa 0%, #e4e9f2 100%);
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
            text-align: center;
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
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 768px) {
            .button-container {
                grid-template-columns: 1fr;
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
        <h1>موارد اللغة العربية</h1>
    </header>

    <div class="main-container">
        <!-- القسم الأول: أساسيات اللغة -->
        <section class="section">
            <h2>أساسيات اللغة العربية</h2>
            <div class="button-container">
                <a href="{{ url('/arabic-letters') }}" class="button">الأحرف العربية</a>
                <a href="{{ url('/arabic-diacritics') }}" class="button">الحركات</a>
            </div>
        </section>

        <section class="section">
            <h2>التجويد والصوتيات</h2>
            <div class="button-container">
                <a href="{{ url('/tajweeds') }}" class="button">أحكام التجويد</a>
                <a href="{{ url('/ayah') }}" class="button">مثال على أحكام التجويد</a>
                <a href="{{ url('/phonemes-menu') }}" class="button">الصوتيات</a>
                <a href="{{ url('/emphatic-arabic-letters') }}" class="button">أحرف القلقلة</a>
                <a href="{{ url('/quran') }}" class="button">البحث في المصحف</a>
            </div>
        </section>
        <!-- القسم الثاني: تركيب الكلمات -->
        <section class="section">
            <h2>تركيب الكلمات</h2>
            <div class="button-container">
                <a href="{{ url('/three-letter-combinations') }}" class="button">الكلمات الثلاثية</a>
                <a href="{{ url('/four-letter-combinations') }}" class="button">الكلمات الرباعية</a>
                <a href="{{ url('/pronouns') }}" class="button">الضمائر</a>
            </div>
        </section>

        <!-- القسم الثالث: الجذور -->
        <section class="section">
            <h2>الجذور</h2>
            <div class="button-container">
                <a href="{{ url('/root-words') }}" class="button">الجذور الثلاثية د. حسين</a>
                <a href="{{ url('/roots') }}" class="button">الجذور الثلاثة 2 - د حسين</a>
            </div>
        </section>

        <section class="section">
            <h2>السوابق واللواحق</h2>
            <div class="button-container">
                <a href="{{ url('/prefixes-suffixes') }}" class="button">السوابق واللواحق</a>
                <a href="{{ url('/root-words-view2') }}" class="button">الجذور الثلاثية مع سوابقها ولواحقها</a>
                <a href="{{ url('/words') }}" class="button">الجذور الثلاثية مع سوابقها ولواحقها 2</a>
                <a href="{{ url('/verb-suffix') }}" class="button">اضافة الفعل إلى الضمائر</a>
            </div>
        </section>

        <!-- القسم الرابع: التجويد والصوتيات -->
        <section class="section">
            <h2>التجويد والصوتيات</h2>
            <div class="button-container">
                <a href="{{ url('/tajweeds') }}" class="button">أحكام التجويد</a>
                <a href="{{ url('/ayah') }}" class="button">مثال على أحكام التجويد</a>
                <a href="{{ url('/phonemes-menu') }}" class="button">الصوتيات</a>
                <a href="{{ url('/emphatic-arabic-letters') }}" class="button">أحرف القلقلة</a>
            </div>
        </section>

        <!-- القسم الخامس: الإدارة -->
        <section class="section">
            <h2>إدارة المحتوى</h2>
            <div class="button-container">
                <a href="/phonemecategories" class="button">إضافة مخرج حروف رئيسي</a>
                <a href="/upload" class="button">إضافة صورة مخرج</a>
            </div>
        </section>
    </div>

    <footer class="footer">
        <p>&copy; 2025 موارد اللغة العربية. جميع الحقوق محفوظة.</p>
    </footer>
</body>
</html>