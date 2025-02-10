<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تحليل الآية</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            direction: rtl;
            text-align: right;
            background-color: #f8f8f8;
            padding: 20px;
        }
        .container {
            max-width: 700px;
            margin: auto;
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            color: #333;
            text-align: center;
        }
        .ayah {
            font-size: 18px;
            font-weight: bold;
            text-align: center;
            background: #eee;
            padding: 10px;
            border-radius: 5px;
        }
        .result-box {
            background: #fff;
            padding: 15px;
            border: 1px solid #ddd;
            margin-top: 15px;
            border-radius: 5px;
        }
        .result-box h4 {
            color: #007bff;
            margin-bottom: 8px;
        }
        .result-box ul {
            list-style: none;
            padding: 0;
        }
        .result-box ul li {
            padding: 5px;
            border-bottom: 1px solid #ddd;
        }
        .result-box ul li:last-child {
            border-bottom: none;
        }
        .no-results {
            text-align: center;
            color: red;
            font-size: 16px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>نتائج تحليل الآية</h2>
        
        <div class="ayah">
            <p>{{ $ayah->text }}</p>
        </div>

        @if(count($results) > 0)
            @foreach($results as $result)
                <div class="result-box">
                    <h4>الكلمة: {{ $result['word'] }}</h4>
                    <p><strong>البداية:</strong> {{ $result['prefix'] }}</p>
                    <ul>
                        @foreach($result['matches'] as $tableName => $matches)
                            <li>
                                <strong>{{ $tableName }}:</strong>
                                <ul>
                                    @foreach($matches as $match)
                                        <li>✅ {{ $match->name }}</li>
                                    @endforeach
                                </ul>
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endforeach
        @else
            <p class="no-results">❌ لا توجد نتائج للتحليل</p>
        @endif
    </div>
</body>
</html>
