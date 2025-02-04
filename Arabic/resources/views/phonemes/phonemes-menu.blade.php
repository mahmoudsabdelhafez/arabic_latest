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
        a {
            background: linear-gradient(135deg, #f5f7fa 0%, #e4e9f2 100%);

        }

        h1, h2 {
            font-family: 'Aref Ruqaa', serif;
            color: var(--white);
            text-align: center;
            position: relative;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.2);
        }

        h1 { font-size: 2.5rem; }
        h2 { 
            color: var(--primary-color);
            margin: 2rem 0 1rem;
            font-size: 1.8rem;
        }

        .main-container {
            flex: 1;
            padding: 3rem 1rem;
            max-width: 1200px;
            margin: 0 auto;
        }

        .section {
            margin-bottom: 3rem;
            background: var(--white);
            border-radius: 15px;
            padding: 1.5rem;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }

        .button-container {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 1.5rem;
            padding: 1rem;
        }

        .button {
            display: flex;
            align-items: center;
            justify-content: center;
            text-decoration: none;
            background: linear-gradient(135deg, #f5f7fa 0%, #e4e9f2 100%);
            color: var(--primary-color);
            padding: 1.2rem 1.5rem;
            font-size: 1.1rem;
            font-weight: bold;
            border-radius: 12px;
            transition: all 0.3s ease;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            position: relative;
            overflow: hidden;
            border: 2px solid transparent;
            text-align: center;
        }

        .button::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(
                120deg,
                transparent,
                rgba(255,255,255,0.3),
                transparent
            );
            transition: 0.5s;
        }

        .button:hover {
            transform: translateY(-3px);
            box-shadow: 0 6px 12px rgba(0,0,0,0.15);
            border-color: var(--primary-color);
            background: var(--primary-color);
            color: var(--white);
        }

        .button:hover::before {
            left: 100%;
        }

        .footer {
            background: var(--primary-color);
            color: var(--white);
            text-align: center;
            padding: 1.5rem;
            margin-top: auto;
        }

      
    </style>
</head>
<body>

    <header>
        <h1>Phonemes Resources</h1>
    </header>
    <div class="main-container">
    <section class="section">
    <div class="container">
        <div class="button-container">
            <a href="{{ url('/phonemes') }}" class="button">All Phonemes</a>
            <a href="{{ url('/phonemes/place-of-articulation') }}" class="button">Place of Articulation</a>
        </div>
    </div>
    </section>
    </div>
    <div class="footer">
        <p>&copy; 2025 Phonemes Resources. All rights reserved.</p>
    </div>

</body>
</html>
