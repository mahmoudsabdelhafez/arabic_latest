<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>الحركات العربية</title>
    <link href="https://fonts.googleapis.com/css2?family=Amiri:wght@400;700&family=Aref+Ruqaa:wght@400;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-color: #234B6E;
            --secondary-color: #3A7E71;
            --accent-color: #C17B3F;
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
            align-items: center;
            justify-content: center;
            line-height: 1.8;
        }

        header {
            background: linear-gradient(45deg, var(--primary-color), var(--secondary-color));
            padding: 2rem;
            text-align: center;
            width: 100%;
            color: var(--white);
            font-family: 'Aref Ruqaa', serif;
            font-size: 2.5rem;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.2);
        }

        .container {
            width: 60%;
            margin: 40px auto;
            padding: 20px;
            display: flex;
            justify-content: center;
        }

        .table-container {
            width: 100%;
            background: var(--white);
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 5px 20px rgba(0,0,0,0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
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

        .footer {
            background: linear-gradient(45deg, var(--primary-color), var(--secondary-color));
            color: var(--white);
            text-align: center;
            padding: 2rem;
            width: 100%;
            margin-top: auto;
            font-family: 'Aref Ruqaa', serif;
        }

        @media (max-width: 768px) {
            .container {
                width: 80%;
            }

            header {
                font-size: 2rem;
            }

            .table-header {
                font-size: 1.3rem;
                padding: 15px;
            }

            th, td {
                padding: 12px;
                font-size: 1.1rem;
            }
        }

        @media (max-width: 480px) {
            .container {
                width: 95%;
            }

            header {
                font-size: 1.8rem;
            }

            .table-header {
                font-size: 1.2rem;
                padding: 12px;
            }

            th, td {
                padding: 10px;
                font-size: 1rem;
            }
        }
    </style>
</head>
<body>
    <header>
        <h1>الحركات العربية</h1>
    </header>

    <div class="container">
        <div class="table-container">
            <div class="table-header">Diacritics Table</div>
            <table>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Diacritic</th>
                    <th>Unicode Value</th>
                    <th>Effect</th>
                    <th>Description</th>
                </tr>
                @foreach ($diacritics as $diacritic)
                    <tr>
                        <td>{{ $diacritic->id }}</td>
                        <td>{{ $diacritic->name }}</td>
                        <td>{{ $diacritic->diacritic }}</td>
                        <td>{{ $diacritic->unicode_value }}</td>
                        <td>{{ $diacritic->effect }}</td>
                        <td>{{ $diacritic->description }}</td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>

    <footer class="footer">
        <p>&copy; 2025 موارد اللغة العربية. جميع الحقوق محفوظة.</p>
    </footer>
</body>
</html>
