<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>نتائج تصريف الفعل</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: center;
        }
        th {
            background-color: #f2f2f2;
        }
        td {
            background-color: #fafafa;
        }
    </style>
</head>
<body>
    <h1>نتائج تصريف الفعل: {{ $verb }}</h1>

    <table dir="rtl">
        <thead>
            <tr>
                <th>الضمير</th>
                <th>الماضي</th>
                <th>المضارع</th>
                <th>المضارع المجزوم</th>
                <th>المضارع المنصوب</th>
                <th>الأمر</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pronouns as $pronoun => $conjugations)
                <tr>
                    <td>{{ $pronoun }}</td>
                    <td>{{ $conjugations[0] }}</td> <!-- الماضي المعلوم -->
                    <td>{{ $conjugations[1] }}</td> <!-- المضارع المعلوم -->
                    <td>{{ $conjugations[2] }}</td> <!-- المضارع المجزوم -->
                    <td>{{ $conjugations[3] }}</td> <!-- المضارع المنصوب -->
                    <td>{{ $conjugations[4] }}</td> <!-- الأمر -->
            @endforeach
        </tbody>
    </table>
</body>
</html>
