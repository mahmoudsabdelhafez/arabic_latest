<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tajweeds Table</title>
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

        h1 {
            font-family: 'Aref Ruqaa', serif;
            color: var(--white);
            text-align: center;
            font-size: 2.5rem;
            position: relative;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.2);
        }

        .container {
            flex: 1;
            padding: 3rem 1rem;
            width: 100%;
            max-width: 1200px;
            margin: 0 auto;
        }

        table {
            width: 100%;
            margin: 30px auto;
            border-collapse: collapse;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            background-color: var(--white);
        }

        th, td {
            padding: 15px;
            text-align: center;
        }

        th {
            background-color: var(--primary-color);
            color: var(--white);
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

        .btn-add-rule {
            display: inline-block;
            width: 200px;
            margin: 10px;
            background-color: #2F4F4F;
            color: white;
            padding: 10px;
            font-size: 18px;
            text-align: center;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .btn-add-rule:hover {
            background-color: #4a148c;
        }

        .action-buttons {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 10px;
            flex-wrap: wrap;
        }

        .btn-edit, .btn-delete {
            display: inline-block;
            width: 80px;
            padding: 5px;
            margin: 2px 0;
            font-size: 14px;
            text-align: center;
            text-decoration: none;
            border-radius: 5px;
            color: white;
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

        .footer {
            background: var(--primary-color);
            color: var(--white);
            text-align: center;
            padding: 1.5rem;
            margin-top: auto;
        }

        @media (max-width: 1024px) {
            table {
                width: 95%;
            }
        }

        @media (max-width: 768px) {
            h1 {
                font-size: 2rem;
            }

            table {
                width: 100%;
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

        <!-- Add Rule and Back Buttons (side by side) -->
        <div style="text-align: center; margin: 20px 0;">
            <a href="{{ route('add-rule') }}" class="btn-add-rule">Add Rule</a>
            <a href="{{ url('/') }}" class="btn-add-rule" style="background-color: #4CAF50;">Back</a>
        </div>

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
                                <a href="{{ route('edit-rule', $tajweed->id) }}" class="btn-edit">Edit</a>
                                <a href="{{ route('delete-rule', $tajweed->id) }}" class="btn-delete" onclick="return confirm('Are you sure you want to delete this rule?')">Delete</a>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="footer">
        <p>&copy; 2025 Tajweeds. All rights reserved.</p>
    </div>

</body>
</html>
