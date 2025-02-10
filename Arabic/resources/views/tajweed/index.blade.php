<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تطبيقات قواعد التجويد</title>
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Amiri:wght@400;700&family=Aref+Ruqaa:wght@400;700&display=swap" rel="stylesheet">

    <!-- External CSS (Move to tables.css later) -->
    <!-- <link rel="stylesheet" href="tables.css"> -->

    <style>
        :root {
            --primary-color: #1a5f7a;
            --secondary-color: #c7b7a3;
            --accent-color: #e6d5b8;
            --text-color: #2b2b2b;
            --white: #ffffff;
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
            text-align: center;
            color: var(--white);
        }

        .container {
            flex: 1;
            padding: 2rem;
            max-width: 1200px;
            margin: 0 auto;
        }

        /* Table Styling */
        .table-container {
            width: 100%;
            background: var(--white);
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 5px 20px rgba(0,0,0,0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            margin: 30px auto;
        }

        .table-container:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 30px rgba(0,0,0,0.15);
        }

        .table-header {
            background: linear-gradient(45deg, var(--primary-color), var(--secondary-color));
            color: var(--white);
            padding: 20px;
            font-size: 1.5rem;
            font-weight: bold;
            text-align: center;
            font-family: 'Aref Ruqaa', serif;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background: var(--white);
        }

        th, td {
            padding: 15px;
            text-align: center;
            font-size: 1.3rem;
            border-bottom: 1px solid rgba(0,0,0,0.1);
        }

        th {
            background: rgba(242, 242, 242, 0.9);
            font-family: 'Aref Ruqaa', serif;
        }

        tr:hover {
            background: rgba(58, 126, 113, 0.15);
        }

        tr:hover td {
            border-right: 3px solid var(--secondary-color);
        }

        /* Buttons */
        .btn {
            display: inline-block;
            padding: 10px 15px;
            font-size: 1.2rem;
            text-align: center;
            border-radius: 5px;
            color: var(--white);
            text-decoration: none;
            transition: 0.3s ease;
        }

        .btn-add {
            background-color: #2F4F4F;
        }

        .btn-add:hover {
            background-color: #4a148c;
        }

        .btn-back {
            background-color: #4CAF50;
        }

        .btn-back:hover {
            background-color: #388e3c;
        }

        .btn-edit {
            background-color: #4CAF50;
        }

        .btn-edit:hover {
            background-color: #388e3c;
        }

        .btn-delete {
            background-color: #f44336;
        }

        .btn-delete:hover {
            background-color: #d32f2f;
        }

        .action-buttons {
            display: flex;
            justify-content: center;
            gap: 10px;
            flex-wrap: wrap;
        }

        /* Footer */
        .footer {
            background: var(--primary-color);
            color: var(--white);
            text-align: center;
            padding: 1.5rem;
            margin-top: auto;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .container {
                width: 95%;
                padding: 1rem;
            }

            th, td {
                padding: 12px;
                font-size: 1.1rem;
            }
        }

        @media (max-width: 480px) {
            th, td {
                padding: 10px;
                font-size: 1rem;
            }

            .btn {
                font-size: 1rem;
                padding: 8px 12px;
            }
        }
    </style>
</head>
<body>

    <header>
        <h1>تطبيقات قواعد التجويد</h1>
    </header>

    <div class="container">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <!-- Add Rule and Back Buttons -->
        <div style="text-align: center; margin: 20px 0;">
            <a href="{{ route('add-rule') }}" class="btn btn-add">إضافة قاعدة</a>
            <a href="{{ url('/') }}" class="btn btn-back">العودة</a>
        </div>

        <div class="table-container">
            <div class="table-header">جدول قواعد التجويد</div>
            <table>
                <thead>
                    <tr>
                        <th>الوصف</th>
                        <th>الآية المثال</th>
                        <th>الحروف</th>
                        <th>اسم القاعدة</th>
                        <th>الإجراءات</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($tajweeds as $tajweed)
                        <tr>
                            <td>{{ $tajweed->description }}</td>
                            <td>{{ $tajweed->example_ayah }}</td>
                            <td>{{ $tajweed->expression }}</td>
                            <td>{{ $tajweed->rule_name }}</td>
                            <td>
                                <div class="action-buttons">
                                    <a href="{{ route('edit-rule', $tajweed->id) }}" class="btn btn-edit">تعديل</a>
                                    <a href="{{ route('delete-rule', $tajweed->id) }}" class="btn btn-delete" onclick="return confirm('هل أنت متأكد أنك تريد حذف هذه القاعدة؟')">حذف</a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="footer">
        <p>&copy; 2025 Tajweeds. جميع الحقوق محفوظة.</p>
    </div>

</body>
</html>
