<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تحليل الحروف العربية</title>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Naskh+Arabic:wght@400;500;600;700&display=swap"
        rel="stylesheet">
    <style>
    :root {
            --accent-color: #e6d5b8;
            --white: #ffffff;
            --primary-color: #1a5f7a;
            --primary-light: #e8f0fe;
        --secondary-color: #c7b7a3;
        --text-color: #2b2b2b;
        --border-color: #e0e7ff;
        --success-color: #34d399;
        --error-color: #ef4444;
        --gradient-start: #f8fafc;
        --gradient-end: #e2e8f0;
    }

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        font-family: 'Noto Naskh Arabic', serif;
        background: linear-gradient(135deg, var(--gradient-start) 0%, var(--gradient-end) 100%);
        color: var(--text-color);
        line-height: 1.6;
        min-height: 100vh;
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
        background: linear-gradient(45deg, rgba(255, 255, 255, 0.1) 25%, transparent 25%),
            linear-gradient(-45deg, rgba(255, 255, 255, 0.1) 25%, transparent 25%);
        background-size: 60px 60px;
        opacity: 0.1;
    }
    h1, h2 {
            font-family: 'Aref Ruqaa', serif;
            color: #ffffff;
            text-align: center;
            position: relative;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.2);
        }
    .container {
        max-width: 1000px;
        margin: 0 auto;
        padding: 2rem;
    }

    .header {
        text-align: center;
        margin-bottom: 3rem;
    }

    .header h1 {
        color: var(--primary-color);
        font-size: 2.5rem;
        margin-bottom: 1rem;
    }

    .header p {
        color: #666;
        font-size: 1.1rem;
    }

    .main-content {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 2rem;
        margin-top: 2rem;
    }

    .input-section,
    .result-section {
        background: white;
        border-radius: 16px;
        padding: 2rem;
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1),
            0 2px 4px -1px rgba(0, 0, 0, 0.06);
    }

    .form-group {
        margin-bottom: 1.5rem;
    }

    label {
        display: block;
        color: var(--primary-color);
        font-weight: 600;
        margin-bottom: 0.5rem;
        font-size: 1.1rem;
    }

    input[type="text"] {
        width: 100%;
        padding: 1rem;
        border: 2px solid var(--border-color);
        border-radius: 8px;
        font-size: 1.1rem;
        font-family: inherit;
        transition: all 0.3s ease;
        background-color: var(--primary-light);
    }

    input[type="text"]:focus {
        outline: none;
        border-color: var(--primary-color);
        box-shadow: 0 0 0 3px rgba(44, 76, 124, 0.1);
    }

    .btn-submit {
        width: 100%;
        padding: 1rem 2rem;
        background-color: var(--primary-color);
        color: white;
        border: none;
        border-radius: 8px;
        font-size: 1.1rem;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
        font-family: inherit;
    }

    .btn-submit:hover {
        background-color: #1a365d;
        transform: translateY(-2px);
    }

    .tool-info {
        background-color: var(--primary-light);
        border-radius: 12px;
        padding: 1.5rem;
        margin-top: 2rem;
    }

    .tool-info h3 {
        color: var(--primary-color);
        margin-bottom: 1rem;
        font-size: 1.3rem;
    }

    .tool-info p {
        margin-bottom: 0.75rem;
        padding: 0.5rem;
        border-radius: 6px;
        background-color: white;
    }

    .tool-info strong {
        color: var(--primary-color);
        margin-left: 0.5rem;
    }

    .error-message {
        background-color: #fee2e2;
        color: var(--error-color);
        padding: 1rem;
        border-radius: 8px;
        margin-top: 1rem;
        text-align: center;
        font-weight: 500;
    }

    @media (max-width: 768px) {
        .main-content {
            grid-template-columns: 1fr;
        }

        .container {
            padding: 1rem;
        }

        .header h1 {
            font-size: 2rem;
        }
    }

    /* Animation for success feedback */
    @keyframes successPulse {
        0% {
            transform: scale(1);
        }

        50% {
            transform: scale(1.02);
        }

        100% {
            transform: scale(1);
        }
    }

    .success {
        animation: successPulse 0.3s ease-in-out;
    }
    </style>
</head>

<body>
    <header>
        <h1>تحليل الحروف العربية</h1>
    </header>
    <div class="container">

        <div class="header">
            <h1>أدخل الكلمة للتحقق من خصائص حروفها</h1>
</div>

        <main class="main-content">
            <section class="input-section">
                <form method="POST" action="{{ route('check.phoneme') }}">
                    @csrf
                    <div class="form-group">
                        <label for="word">أدخل الكلمة:</label>
                        <input type="text" name="word" id="word" required placeholder="اكتب الكلمة هنا..."
                            autocomplete="off">
                    </div>
                    <button type="submit" class="btn-submit">تحليل الكلمة</button>
                </form>
            </section>

            <section class="result-section">
                @if(isset($tool))
                <div class="tool-info">
                    <h3>تحليل الحرف الأول: {{ $firstLetter }}</h3>
                    <p><strong>الأداة:</strong> {{ $tool->name }}</p>
                    <p><strong>التأثير:</strong> {{ $tool->pivot->effect }}</p>

                </div>
                @elseif(isset($error))
                <div class="error-message">
                    <p>{{ $error }}</p>
                </div>
                @else
                <div class="tool-info" style="text-align: center; color: #666;">
                    <p>النتائج ستظهر هنا</p>
                </div>
                @endif
                @if(isset($note))
                <div class="tool-info">
                    <p><strong>تصاريف أخرى:</strong> {{ $note }}</p>
                </div>

                @endif
                @if(isset($pre))
                @foreach($pre as $prefix)
                <div class="tool-info">
                    <p><strong>ملاحظة:</strong> {{ $prefix->type }}</p>
                </div>
                @endforeach
                @endif
            </section>
        </main>
    </div>
</body>

</html>