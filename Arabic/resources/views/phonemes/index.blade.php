<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Phonemes</title>
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

        .btn-edit, .btn-delete ,.btn-viwe{
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

        .btn-viwe {
            background-color:  var(--primary-color);
            margin-left: 10px;
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

        @media (prefers-reduced-motion: reduce) {
            .button::before {
                display: none;
            }
        }
    </style>
</head>
<body>

    <header>
        <h1>Phonemes</h1>
    </header>

    <div class="container">
        <table>
            <tr>
                <th>ID</th>
                <th>Letter</th>
                <th>ipa</th>
                <th>unicode_hex</th>
                <th>Unicode Decimal</th>
                <th>Type</th>
                <th>Place of Articulation</th>
                <th>Manner of Articulation</th>
                <th>Voicing</th>
                <th>Sound Effects</th>
                <th>Notes</th>
                <th>With Haraka</th>
                <th>Rules</th>
            </tr>
            @foreach ($phonemes as $phoneme)
                <tr>
                    <td>{{ $phoneme->id }}</td>
                    <td>{{ $phoneme->arabicLetter->letter }}</td>
                    <td>{{ $phoneme->ipa }}</td>
                    <td>{{ $phoneme->arabicLetter->unicode_hex }}</td>
                    <td>{{ $phoneme->arabicLetter->unicode_decimal }}</td>
                    <td>{{ $phoneme->type }}</td>
                    <td>{{ $phoneme->place_of_articulation }}</td>
                    <td>{{ $phoneme->manner_of_articulation }}</td>
                    <td>{{ $phoneme->voicing }}</td>
                    <td>{{ $phoneme->sound_effects }}</td>
                    <td>{{ $phoneme->notes }}</td>
                    <td>
                        <div class="action-buttons">
                            <a href="{{ route('phonemes-diacritics', $phoneme->id) }}" class="btn-edit">View</a>
                        </div>
                    </td><td>
                        <div class="action-buttons">
                        <a href="{{ route('phoneme.rules.show', $phoneme->id) }}" class="btn-viwe">View</a>
                       </div>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>

    <div class="footer">
        <p>&copy; 2025 Phonemes. All rights reserved.</p>
    </div>

</body>
</html>
