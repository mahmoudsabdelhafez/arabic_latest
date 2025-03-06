<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>جميع البادئات واللواحق</title>
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

        /* Tab Styles */
        .tabs {
            display: flex;
            justify-content: center;
            gap: 1rem;
            margin-bottom: 2rem;
        }

        .tab-button {
            padding: 1rem 2rem;
            font-size: 1.2rem;
            font-family: 'Aref Ruqaa', serif;
            background-color: var(--secondary-color);
            border: none;
            border-radius: 5px;
            color: var(--text-color);
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .tab-button.active {
            background-color: var(--primary-color);
            color: var(--white);
        }

        .tab-content {
            display: none;
        }

        .tab-content.active {
            display: block;
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

        .footer {
            background: var(--primary-color);
            color: var(--white);
            text-align: center;
            padding: 1.5rem;
            margin-top: auto;
        }

        @media (max-width: 768px) {
            .tabs {
                flex-direction: column;
                align-items: center;
            }

            .tab-button {
                width: 100%;
                max-width: 300px;
            }
        }
    </style>
</head>
<body>
    <header>
        <h1>جميع البادئات واللواحق</h1>
    </header>

    <div class="container">
        <div class="tabs">
            <button class="tab-button active" onclick="showTab('prefixes')">السوابق (Prefixes)</button>
            <button class="tab-button" onclick="showTab('suffixes')">اللواحق (Suffixes)</button>
        </div>

        <div id="prefixes" class="tab-content active">
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
        </div>

        <div id="suffixes" class="tab-content">
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
                        <td>{{ $suffix->name }}</td>
                        <td>{{ $suffix->usage_meaning }}</td>
                        <td>{{ $suffix->examples_from_quran }}</td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>

    <div class="footer">
        <p>&copy; 2025 Prefixes and Suffixes. All rights reserved.</p>
    </div>

    <script>
        function showTab(tabName) {
            // Hide all tab contents
            const tabContents = document.getElementsByClassName('tab-content');
            for (let content of tabContents) {
                content.classList.remove('active');
            }

            // Remove active class from all buttons
            const tabButtons = document.getElementsByClassName('tab-button');
            for (let button of tabButtons) {
                button.classList.remove('active');
            }

            // Show selected tab content and activate button
            document.getElementById(tabName).classList.add('active');
            event.target.classList.add('active');
        }
    </script>
</body>
</html>