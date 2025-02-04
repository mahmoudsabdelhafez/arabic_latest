<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $rule->ruling_name }}</title>
    <link href="https://fonts.googleapis.com/css2?family=Amiri:wght@400;700&family=Aref+Ruqaa:wght@400;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-color: #1e4d6b;
            --secondary-color: #2a9d8f;
            --accent-color: #f4a261;
            --text-color: #2b2b2b;
            --white: #ffffff;
            --gradient-start: #1e4d6b;
            --gradient-end: #2a9d8f;
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
            text-align: right;
        }

        header {
            background: linear-gradient(45deg, var(--gradient-start), var(--gradient-end));
            padding: 2.5rem;
            position: relative;
            overflow: hidden;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        }

        header h1 {
            color: var(--white);
            font-size: 2.5rem;
            text-align: center;
            font-family: 'Aref Ruqaa', serif;
            position: relative;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.2);
        }

        .container {
            max-width: 800px;
            margin: 40px auto;
            padding: 20px;
        }

        .rule-details {
            background: var(--white);
            border-radius: 15px;
            padding: 30px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }

        .detail-section {
            margin-bottom: 30px;
            padding: 20px;
            background: rgba(42, 157, 143, 0.05);
            border-radius: 10px;
            border-right: 4px solid var(--secondary-color);
        }

        .detail-title {
            color: var(--primary-color);
            font-size: 1.2rem;
            margin-bottom: 10px;
            font-weight: bold;
            font-family: 'Aref Ruqaa', serif;
        }

        .detail-content {
            font-size: 1.1rem;
            line-height: 1.6;
        }

        .example-box {
            background: rgba(244, 162, 97, 0.1);
            padding: 20px;
            border-radius: 10px;
            margin-top: 10px;
        }

        .back-button {
            display: inline-block;
            padding: 10px 20px;
            background: var(--primary-color);
            color: var(--white);
            text-decoration: none;
            border-radius: 25px;
            margin-bottom: 20px;
            transition: all 0.3s ease;
        }

        .back-button:hover {
            background: var(--secondary-color);
            transform: translateY(-2px);
        }

        .footer {
            background: linear-gradient(45deg, var(--gradient-start), var(--gradient-end));
            color: var(--white);
            text-align: center;
            padding: 1.5rem;
            margin-top: auto;
        }

        @media (max-width: 768px) {
            .container {
                padding: 15px;
            }

            header h1 {
                font-size: 2rem;
            }

            .detail-section {
                padding: 15px;
            }
        }
    </style>
</head>
<body>
    <header>
        <h1>{{ $rule->ruling_name }}</h1>
    </header>

    <div class="container">
        <a href="{{ url()->previous() }}" class="back-button">← الرجوع</a>
        <a href="{{ url('/tajweedcategories') }}" class="back-button"> العودة الى القائمة الرئيسية</a>

        <div class="rule-details">
            @if($rule->ruling_description)
            <div class="detail-section">
                <h2 class="detail-title">الوصف</h2>
                <div class="detail-content">{{ $rule->ruling_description }}</div>
            </div>
            @endif

            @if($rule->ruling_letters)
            <div class="detail-section">
                <h2 class="detail-title">حروف الحكم</h2>
                <div class="detail-content">{{ $rule->ruling_letters }}</div>
            </div>
            @endif

            @if($rule->pronunciation_method)
            <div class="detail-section">
                <h2 class="detail-title">طريقة النطق</h2>
                <div class="detail-content">{{ $rule->pronunciation_method }}</div>
            </div>
            @endif

            @if($rule->example)
            <div class="detail-section">
                <h2 class="detail-title">أمثلة</h2>
                <div class="detail-content">
                    <div class="example-box">{{ $rule->example }}</div>
                </div>
            </div>
            @endif

            @if($rule->note)
            <div class="detail-section">
                <h2 class="detail-title">ملاحظات</h2>
                <div class="detail-content">{{ $rule->note }}</div>
            </div>
            @endif
        </div>
    </div>

    <footer class="footer">
        <p>&copy; 2024 جميع الحقوق محفوظة</p>
    </footer>
</body>
</html>
