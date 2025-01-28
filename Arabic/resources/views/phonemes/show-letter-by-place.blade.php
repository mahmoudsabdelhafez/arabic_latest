<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Letters by Place of Articulation</title>
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

        ul {
            list-style-type: none;
            padding: 0;
            text-align: center;
        }

        li {
            display: inline-block;
            background-color: var(--white);
            margin: 10px;
            padding: 15px;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            font-size: 18px;
            transition: transform 0.2s, background-color 0.2s;
            cursor: pointer;
            width: 100%;
            text-align: left;
        }

        li:hover {
            background-color: var(--accent-color);
            transform: scale(1.05);
        }

        li p {
            margin: 8px 0;
        }

        a {
            text-decoration: none;
            color: var(--primary-color);
            display: inline-block;
            margin-top: 20px;
            font-size: 18px;
        }

        a:hover {
            color: var(--text-color);
        }

        .footer {
            background: var(--primary-color);
            color: var(--white);
            text-align: center;
            padding: 1.5rem;
            margin-top: auto;
        }

        @media (max-width: 1024px) {
            li {
                font-size: 16px;
                padding: 12px;
            }
        }

        @media (max-width: 768px) {
            h1 {
                font-size: 2rem;
            }

            li {
                font-size: 14px;
                padding: 10px;
            }
        }
    </style>
</head>
<body>

    <header>
        <h1>Letters for: {{ $place }}</h1>
    </header>

    <div class="container">
        <ul>
            @foreach ($letters as $letter)
                <li>
                    <p><strong>Letter:</strong> {{ $letter->arabicLetter->letter }}</p>
                    <p><strong>IPA:</strong> {{ $letter->ipa }}</p>
                    <p><strong>Type:</strong> {{ $letter->type }}</p>
                    <p><strong>Manner of Articulation:</strong> {{ $letter->manner_of_articulation }}</p>
                    <p><strong>Voicing:</strong> {{ $letter->voicing }}</p>
                    <p><strong>Sound Effects:</strong> {{ $letter->sound_effects }}</p>
                    <p><strong>Notes:</strong> {{ $letter->notes ?? 'N/A' }}</p>
                </li>
            @endforeach
        </ul>

        <a href="{{ url('/phonemes') }}">Back to All Phonemes</a>
    </div>

    <div class="footer">
        <p>&copy; 2025 Letters by Place of Articulation. All rights reserved.</p>
    </div>

</body>
</html>
