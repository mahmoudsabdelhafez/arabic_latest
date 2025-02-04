<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>مفهوم التجويد</title>
    <link href="https://fonts.googleapis.com/css2?family=Amiri:wght@400;700&family=Aref+Ruqaa:wght@400;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-color: #234B6E;
            --secondary-color: #3A7E71;
            --text-color: #2b2b2b;
            --text-light: #526475;
            --white: #ffffff;
            --gradient-start: #234B6E;
            --gradient-end: #3A7E71;
            --bg-light: #f8fafc;
            --border-color: #e5e9f0;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Amiri', serif;
            background: var(--bg-light);
            color: var(--text-color);
            line-height: 1.8;
        }

        header {
            background: linear-gradient(45deg, var(--gradient-start), var(--gradient-end));
            padding: 3.5rem 2rem;
            position: relative;
            overflow: hidden;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
            margin-bottom: 2rem;
        }

        header::before {
            content: '';
            position: absolute;
            top: 0;
            right: 0;
            left: 0;
            bottom: 0;
            background: 
                radial-gradient(circle at 50% 50%, rgba(255,255,255,0.1) 0%, transparent 60%),
                linear-gradient(45deg, rgba(255,255,255,0.1) 25%, transparent 25%);
            background-size: 100% 100%, 60px 60px;
            opacity: 0.2;
            animation: backgroundMove 30s linear infinite;
        }

        @keyframes backgroundMove {
            0% { background-position: center, 0 0; }
            100% { background-position: center, 60px 60px; }
        }

        header h1 {
            color: var(--white);
            font-size: 3rem;
            text-align: center;
            font-family: 'Aref Ruqaa', serif;
            position: relative;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.2);
        }

        .main-content {
            max-width: 800px;
            margin: 0 auto;
            padding: 2rem;
            background: var(--white);
            border-radius: 20px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.05);
            margin-bottom: 3rem;
        }

        .tajweed-details {
            padding: 1rem;
        }

        .tajweed-details h2 {
            color: var(--primary-color);
            font-family: 'Aref Ruqaa', serif;
            font-size: 2.2rem;
            margin-bottom: 1.5rem;
            padding-bottom: 1rem;
            border-bottom: 3px solid var(--border-color);
            position: relative;
        }

        .tajweed-details h2::after {
            content: '';
            position: absolute;
            bottom: -3px;
            right: 0;
            width: 100px;
            height: 3px;
            background: linear-gradient(to left, var(--primary-color), var(--secondary-color));
        }

        .tajweed-details h3 {
            color: var(--secondary-color);
            font-family: 'Aref Ruqaa', serif;
            font-size: 1.5rem;
            margin: 2rem 0 1rem;
            position: relative;
            padding-right: 1rem;
        }

        .tajweed-details h3::before {
            content: '';
            position: absolute;
            right: 0;
            top: 50%;
            transform: translateY(-50%);
            width: 4px;
            height: 20px;
            background: linear-gradient(to bottom, var(--primary-color), var(--secondary-color));
            border-radius: 2px;
        }

        .tajweed-details p {
            color: var(--text-color);
            font-size: 1.2rem;
            line-height: 2;
            margin-bottom: 1.5rem;
            padding: 0 1rem;
            text-align: justify;
        }

        section {
            background: var(--white);
            padding: 2rem;
            margin-bottom: 2rem;
            border-radius: 10px;
            transition: transform 0.3s ease;
        }

        section:hover {
            transform: translateY(-3px);
        }

        footer {
            background: linear-gradient(45deg, var(--gradient-start), var(--gradient-end));
            color: var(--white);
            text-align: center;
            padding: 2rem;
            position: relative;
            overflow: hidden;
            font-family: 'Aref Ruqaa', serif;
        }

        footer::before {
            content: '';
            position: absolute;
            top: 0;
            right: 0;
            left: 0;
            bottom: 0;
            background: linear-gradient(45deg, rgba(255,255,255,0.1) 25%, transparent 25%);
            background-size: 60px 60px;
            opacity: 0.1;
        }

        @media (max-width: 768px) {
            header h1 {
                font-size: 2.2rem;
            }

            .main-content {
                padding: 1rem;
                margin: 1rem;
                border-radius: 15px;
            }

            .tajweed-details h2 {
                font-size: 1.8rem;
            }

            .tajweed-details h3 {
                font-size: 1.3rem;
            }

            .tajweed-details p {
                font-size: 1.1rem;
                padding: 0 0.5rem;
            }
        }
    </style>
</head>
<body>
    <header>
        <h1>مفهوم التجويد</h1>
    </header>

    <main class="main-content">
        <div class="tajweed-details">
            <h2>تعريف التجويد</h2>
            <p>{{ $tajweedConcept->definition }}</p>

            <h3>دليل من القرآن</h3>
            <p>{{ $tajweedConcept->evidence_from_quran }}</p>

            <h3>المعنى اللغوي</h3>
            <p>{{ $tajweedConcept->linguistic_meaning }}</p>

            <h3>المعنى الاصطلاحي</h3>
            <p>{{ $tajweedConcept->terminological_meaning }}</p>

            <h3>الحكم</h3>
            <p>{{ $tajweedConcept->ruling }}</p>

            <h3>الفضيلة</h3>
            <p>{{ $tajweedConcept->virtue }}</p>

            <h3>الغرض</h3>
            <p>{{ $tajweedConcept->purpose }}</p>

            <h3>طريقة تعلم التجويد</h3>
            <p>{{ $tajweedConcept->method_of_learning_tajweed }}</p>
        </div>
    </main>

    <footer>
        <p>جميع الحقوق محفوظة © ٢٠٢٤ التجويد</p>
    </footer>
</body>
</html>