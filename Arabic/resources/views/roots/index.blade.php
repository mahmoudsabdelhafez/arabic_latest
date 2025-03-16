<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Root Words List</title>
    <link href="https://fonts.googleapis.com/css2?family=Amiri:wght@400;700&family=Aref+Ruqaa:wght@400;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-color: #234B6E;
            --secondary-color: #3A7E71;
            --accent-color: #C17B3F;
            --background-color: #f5f7fa;
            --text-color: #2b2b2b;
            --white: #ffffff;
            --border-radius: 10px;
            --box-shadow: 0 5px 20px rgba(0,0,0,0.1);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Amiri', serif;
            background: linear-gradient(135deg, var(--background-color) 0%, #e4e9f2 100%);
            color: var(--text-color);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        header {
            background: linear-gradient(45deg, var(--primary-color), var(--secondary-color));
            padding: 1.5rem;
            text-align: center;
            width: 100%;
            color: var(--white);
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }

        header h1 {
            font-family: 'Aref Ruqaa', serif;
            font-size: 2.5rem;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.2);
            letter-spacing: 1px;
        }

        .container {
            max-width: 1200px;
            /* width: 98%; */
            margin: 40px 20px;
            padding: 0;
        }

        .table-container {
            width: 140%;
            background: var(--white);
            border-radius: var(--border-radius);
            overflow: hidden;
            box-shadow: var(--box-shadow);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            margin-bottom: 20px;
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
            padding: 12px 15px;
            text-align: center;
            font-size: 1.2rem;
            border-bottom: 1px solid rgba(0,0,0,0.1);
        }

        th {
            background: rgba(242, 242, 242, 0.9);
            font-family: 'Aref Ruqaa', serif;
            color: var(--primary-color);
            font-weight: bold;
        }

        tr:nth-child(even) {
            background-color: rgba(245, 247, 250, 0.5);
        }

        tr:hover {
            background: rgba(58, 126, 113, 0.15);
        }

        .pagination {
            display: flex;
            justify-content: center;
            margin: 20px 0;
            list-style: none;
        }

        .pagination li {
            margin: 0 5px;
        }

        .pagination a, .pagination span {
            display: inline-block;
            padding: 8px 15px;
            background: var(--white);
            color: var(--primary-color);
            border-radius: var(--border-radius);
            text-decoration: none;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            transition: all 0.3s ease;
        }

        .pagination a:hover {
            background: var(--secondary-color);
            color: var(--white);
            transform: translateY(-2px);
        }

        .pagination .active span {
            background: var(--primary-color);
            color: var(--white);
        }

        .footer {
            background: linear-gradient(45deg, var(--primary-color), var(--secondary-color));
            color: var(--white);
            text-align: center;
            padding: 1.5rem;
            width: 100%;
            margin-top: auto;
            font-family: 'Aref Ruqaa', serif;
        }

        @media (max-width: 768px) {
            .container {
                width: 95%;
            }

            header h1 {
                font-size: 2rem;
            }

            .table-header {
                font-size: 1.3rem;
                padding: 15px;
            }

            th, td {
                padding: 10px;
                font-size: 1.1rem;
            }
        }

        @media (max-width: 480px) {
            .container {
                width: 98%;
            }

            header h1 {
                font-size: 1.8rem;
            }

            .table-header {
                font-size: 1.2rem;
                padding: 12px;
            }

            th, td {
                padding: 8px;
                font-size: 1rem;
            }
        }
    </style>
</head>
<body>
    <header>
        <h1>Root Words List</h1>
    </header>

    <div class="container">
        <div class="table-container">
            <div class="table-header">الكلمات الجذرية</div>
            <table dir="rtl">
                <thead>
                    <tr><td></td>
                        @foreach ($suffixes as $suffix)
                            <th>{{ $suffix->name }}</th>
                        @endforeach
                    </tr>
                    <tr><td>الجذر</td>
                        <!-- @foreach ($suffixes as $suffix)
                            <th>{{ $suffix->usage_meaning }}</th>
                        @endforeach -->
                        @foreach ($connectives as $connective)
                                <td>{{ $connective->name }}</td>
                            @endforeach
                    </tr>
                </thead>
                <tbody>
                    @foreach ($roots as $root)
                        <tr>
                            <td>{{ $root->root}}</td>
                            <!-- @foreach ($suffixes as $suffix)
                                <td>{{ $root->root }}{{ $suffix->name }}</td>
                            @endforeach -->
                            @foreach ($connectives as $connective)
                                <td>{{ $connective->name }}{{ $root->root }}</td>
                            @endforeach
                            <!-- @foreach ($prefixes as $prefixe)
                            @if($prefixe->can_concatenate)
                                <td>{{ $root->root }}{{ $prefixe->can_concatenate?$prefixe->formula: ' '.$prefixe->formula }}</td>
                                @endif 
                            @endforeach -->
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        
        <div class="pagination">
            {{ $roots->links() }}
        </div>
    </div>

    <div class="footer">
        <p>&copy; 2025 Root Words. All rights reserved.</p>
    </div>
</body>
</html>