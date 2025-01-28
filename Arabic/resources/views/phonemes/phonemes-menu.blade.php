<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Phonemes Resources</title>
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
            text-align: center;
        }

        .button-container {
            display: flex;
            justify-content: center;
            gap: 20px;
            padding: 0 20px;
        }

        .button {
            text-decoration: none;
            background: linear-gradient(145deg, #4CAF50, #45a049);
            color: var(--white);
            padding: 15px 30px;
            font-size: 18px;
            font-weight: bold;
            border-radius: 50px;
            transition: all 0.3s ease;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            cursor: pointer;
        }

        .button:hover {
            background: linear-gradient(145deg, #45a049, #4CAF50);
            transform: translateY(-2px);
            box-shadow: 0 6px 18px rgba(0, 0, 0, 0.15);
        }

        .footer {
            background: var(--primary-color);
            color: var(--white);
            text-align: center;
            padding: 1.5rem;
            margin-top: auto;
        }

        @media (max-width: 768px) {
            h1 {
                font-size: 2rem;
            }

            .button {
                padding: 12px 24px;
                font-size: 16px;
            }
        }

    </style>
</head>
<body>

    <header>
        <h1>Phonemes Resources</h1>
    </header>

    <div class="container">
        <div class="button-container">
            <a href="{{ url('/phonemes') }}" class="button">All Phonemes</a>
            <a href="{{ url('/phonemes/place-of-articulation') }}" class="button">Place of Articulation</a>
        </div>
    </div>

    <div class="footer">
        <p>&copy; 2025 Phonemes Resources. All rights reserved.</p>
    </div>

</body>
</html>
