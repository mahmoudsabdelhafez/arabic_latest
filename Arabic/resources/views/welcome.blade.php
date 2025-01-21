<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Arabic Language Resources</title>
    <link href="https://fonts.googleapis.com/css2?family=Amiri&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Amiri', serif;
            background-color: #f7f7f7;
            color: #333;
            text-align: center;
            margin: 0;
            padding: 0;
        }

        h1 {
            background-color: #2f4f4f;
            color: #fff;
            padding: 20px;
            margin: 0;
            font-size: 36px;
        }

        .button-container {
            display: flex;
            justify-content: center;
            gap: 15px;
            flex-wrap: wrap;
            margin-top: 30px;
        }

        .button-container a {
            text-decoration: none;
            background-color: #4CAF50;
            color: white;
            padding: 15px 30px;
            font-size: 18px;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .button-container a:hover {
            background-color: #45a049;
        }

        .button-container a:active {
            background-color: #3c8e3c;
        }

        .footer {
            margin-top: 50px;
            font-size: 14px;
            color: #777;
        }
    </style>
</head>
<body>

    <h1>Arabic Language Resources</h1>

    <div class="button-container">
 
        <a href="{{ url('/arabic-letters') }}">الاحرف العربية</a>
        <a href="{{ url('/arabic-diacritics') }}">التشكيلات</a>
        <a href="{{ url('/phonemes') }}">الصوتيات</a>
        <a href="{{ url('/emphatic-arabic-letters') }}">أحرف القلقلة</a>
        <a href="{{ url('/three-letter-combinations') }}">الكلمات الثلاثية</a>
        <a href="{{ url('/four-letter-combinations') }}">الكلمات الرباعية</a>
        <a href="{{ url('/prefixes-suffixes') }}">السوابق واللواحق</a>
        <a href="{{ url('/root-words') }}"> الجذور الثلاثية د. حسين </a>
        <a href="{{ url('/root-words-view2') }}"> الكلمات مع سوابقها ولواحقها</a>
    </div>

    <div class="footer">
        <p>&copy; 2025 Arabic Language Resources. All rights reserved.</p>
    </div>

</body>
</html>
