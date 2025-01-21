<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>جميع البادئات واللواحق</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f9;
            color: #333;
            margin: 0;
            padding: 0;
        }

        h1 {
            background-color: #2f4f4f;
            color: white;
            padding: 20px;
            margin: 0;
            font-size: 36px;
            text-align: center;
        }

        h2 {
            color: #333;
            font-size: 28px;
            margin-top: 40px;
            text-align: center;
        }

        table {
            width: 80%;
            margin: 30px auto;
            border-collapse: collapse;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            background-color: white;
        }

        th, td {
            padding: 15px;
            text-align: center;
        }

        th {
            background-color: #4CAF50;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        td {
            font-size: 16px;
            color: #555;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        .container {
            padding: 20px;
        }

        .footer {
            text-align: center;
            margin-top: 40px;
            color: #777;
        }
    </style>
</head>
<body>

    <div class="container">
        <h1> السوابق واللواحق</h1>

        <h2>السوابق (Prefixes)</h2>

        <!-- Prefixes Table -->
        <table>
            <tr>
                <th>ID</th>
                <th>الصيغة</th>
                <th>المعنى/ألاستخدام</th>
                <th>مثال من القران الكريم</th>
            </tr>
            @foreach ($prefixes as $prefix)
                <tr>
                    <td>{{ $prefix->id }}</td>
                    <td>{{ $prefix->formula }}</td>
                    <td>{{ $prefix->usage_meaning }}</td>
                    <td>{{ $prefix->examples_from_quran }}</td>
                </tr>
            @endforeach
        </table>

        <h2> اللواحق (Suffixes)</h2>

        <!-- Suffixes Table -->
        <table>
            <tr>
            <th>ID</th>
                <th>الصيغة</th>
                <th>المعنى/ألاستخدام</th>
                <th>مثال من القران الكريم</th>
            </tr>
            @foreach ($suffixes as $suffix)
                <tr>
                    <td>{{ $suffix->id }}</td>
                    <td>{{ $suffix->formula }}</td>
                    <td>{{ $suffix->usage_meaning }}</td>
                    <td>{{ $suffix->examples_from_quran }}</td>
                </tr>
            @endforeach
        </table>
    </div>

    <div class="footer">
        <p>&copy; 2025 Prefixes and Suffixes. All rights reserved.</p>
    </div>

</body>
</html>
