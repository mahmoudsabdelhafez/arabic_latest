<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $category->name }}</title>
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
        }

        header {
            background: linear-gradient(45deg, var(--gradient-start), var(--gradient-end));
            padding: 2.5rem;
            position: relative;
            overflow: hidden;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
            text-align: center;
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
            animation: backgroundMove 20s linear infinite;
        }

        @keyframes backgroundMove {
            0% { background-position: 0 0; }
            100% { background-position: 60px 60px; }
        }

        header h1 {
            color: var(--white);
            font-size: 2.5rem;
            font-family: 'Aref Ruqaa', serif;
            position: relative;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.2);
        }

        .container {
            max-width: 1000px;
            margin: 40px auto;
            padding: 20px;
            text-align: center; /* Center the content inside the container */

        }

        .rules-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 20px;
            padding: 20px;
        }

        .rule-card {
            background: var(--white);
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            transition: all 0.3s ease;
            cursor: pointer;
            position: relative;
        }

        .rule-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(45deg, var(--gradient-start), var(--gradient-end));
            opacity: 0;
            transition: opacity 0.3s ease;
            z-index: 1;
        }

        .rule-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 15px rgba(0,0,0,0.2);
        }

        .rule-card:hover::before {
            opacity: 0.1;
        }

        .rule-content {
            padding: 20px;
            text-align: center;
            position: relative;
            z-index: 2;
        }

        .rule-name {
            font-size: 1.3rem;
            color: var(--primary-color);
            margin-bottom: 10px;
            font-weight: bold;
            font-family: 'Aref Ruqaa', serif;
        }

        .view-details {
            color: var(--secondary-color);
            text-decoration: none;
            font-weight: bold;
            display: inline-block;
            padding: 8px 16px;
            border-radius: 20px;
            background: rgba(42, 157, 143, 0.1);
            transition: all 0.3s ease;
        }

        .view-details:hover {
            background: var(--secondary-color);
            color: var(--white);
        }

        .category-description {
            text-align: center;
            margin: 20px 0;
            padding: 20px;
            background: rgba(255, 255, 255, 0.9);
            border-radius: 10px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.05);
        }

        .footer {
            background: linear-gradient(45deg, var(--gradient-start), var(--gradient-end));
            color: var(--white);
            text-align: center;
            padding: 1.5rem;
            margin-top: auto;
            position: relative;
            overflow: hidden;
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

        @media (max-width: 768px) {
            .container {
                padding: 10px;
            }

            header h1 {
                font-size: 2rem;
            }

            .rules-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <header>
        <h1>{{ $category->name }}</h1>
        
    </header>

    <div class="container">
    <a href="{{ url('/tajweedcategories') }}" class="back-button"> العودة الى القائمة الرئيسية</a>

        
        @if($category->description)
            <div class="category-description">
                <p>{{ $category->description }}</p>
            </div>
        @endif

        
        <div class="rules-grid">
            @foreach($rules as $rule)
                <div class="rule-card">
                    <div class="rule-content">
                        <h2 class="rule-name">{{ $rule->ruling_name }}</h2>
                        <a href="{{ route('tajweed.rule', $rule->id) }}" class="view-details">عرض التفاصيل</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    

    <footer class="footer">
        <p>&copy; 2024 جميع الحقوق محفوظة</p>
    </footer>
</body>
</html>