<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>الكلمات الصحيحة التي تتكون من ثلاث حروف</title>
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

        /* Optional: Add a little padding around the page content */
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
        <h1>الكلمات الصحيحة التي تتكون من ثلاث حروف</h1>

        <table>
            <tr>
                <th>Roots</th>
            </tr>
            @foreach ($rootWords as $root)
                <tr>
                    <td>{{ $root->root }}</td>
                </tr>
            @endforeach
        </table>
    </div>

    <div class="footer">
        <p>&copy; 2025 3-Letter Arabic Combinations. All rights reserved.</p>
    </div>

</body>
</html>
