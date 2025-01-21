<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Arabic Language Resources</title>
    <link href="https://fonts.googleapis.com/css2?family=Amiri&display=swap" rel="stylesheet">
    <style>
        /* General Styling */
        body {
            font-family: 'Amiri', serif;
            background: linear-gradient(to right, #d3c4e1, #f7f7f7);
            color: #333;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            height: 100vh;
        }

        /* Header Styling */
        h1 {
            background-color: #2f4f4f;
            color: #fff;
            padding: 20px;
            margin: 0;
            font-size: 36px;
            text-transform: uppercase;
            letter-spacing: 3px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        /* Main Container (for centering content vertically) */
        .main-container {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
            flex-direction: column;
        }

        /* Button Container */
        .button-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
            margin-top: 50px;
            padding: 0 20px;
        }

        /* Button Styling */
        .button-container a {
            text-decoration: none;
            background: linear-gradient(145deg, #4CAF50, #45a049);
            color: white;
            padding: 15px 30px;
            font-size: 18px;
            font-weight: bold;
            border-radius: 50px;
            transition: all 0.3s ease;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .button-container a:hover {
            background: linear-gradient(145deg, #45a049, #4CAF50);
            transform: translateY(-2px);
            box-shadow: 0 6px 18px rgba(0, 0, 0, 0.15);
        }

        .button-container a:active {
            background: linear-gradient(145deg, #3c8e3c, #3b8e3b);
            transform: translateY(2px);
        }

        /* Footer Styling */
        .footer {
            text-align: center;
            margin-top: 50px;
            font-size: 14px;
            color: #777;
            padding: 20px;
            background-color: #333;
            color: #fff;
            position: absolute;
            bottom: 0;
            width: 100%;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .button-container {
                flex-direction: column;
                gap: 15px;
            }
        }
    </style>
</head>
<body>

    <h1>Arabic Language Resources</h1>

    <div class="main-container">
        <div class="button-container">
            <a href="{{ url('/arabic-letters') }}">الاحرف العربية</a>
            <a href="{{ url('/arabic-diacritics') }}">الحركات</a>
            <a href="{{ url('/phonemes') }}">الصوتيات</a>
            <a href="{{ url('/emphatic-arabic-letters') }}">أحرف القلقلة</a>
            <a href="{{ url('/three-letter-combinations') }}">الكلمات الثلاثية</a>
            <a href="{{ url('/four-letter-combinations') }}">الكلمات الرباعية</a>
            <a href="{{ url('/prefixes-suffixes') }}">السوابق واللواحق</a>
            <a href="{{ url('/root-words') }}"> الجذور الثلاثية د. حسين </a>
            <a href="{{ url('/root-words-view2') }}"> الجذور الثلاثية مع سوابقها ولواحقها</a>
            <a href="{{ url('/roots') }}">الجذور الثلاثة 2 - د حسين</a>
            <a href="{{ url('/words') }}">الجذور الثلاثية مع سوابقها ولواحقها 2</a>
        </div>
    </div>

    <div class="footer">
        <p>&copy; 2025 Arabic Language Resources. All rights reserved.</p>
    </div>

</body>
</html>
