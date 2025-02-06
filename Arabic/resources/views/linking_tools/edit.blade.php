<html dir="rtl" lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تعديل الأداة</title>
    <link href="https://fonts.googleapis.com/css2?family=Amiri&family=Aref+Ruqaa&display=swap" rel="stylesheet">
 <style>
    :root {
        --primary-color: #234B6E;
        --secondary-color: #3A7E71;
        --accent-color: #C17B3F;
        --text-color: #2b2b2b;
        --white: #ffffff;
        --gradient-start: #234B6E;
        --gradient-end: #3A7E71;
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
        line-height: 1.8;
    }

    header {
        background: linear-gradient(45deg, var(--gradient-start), var(--gradient-end));
        padding: 3rem;
        position: relative;
        overflow: hidden;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
    }

    header::before {
        content: '';
        position: absolute;
        top: 0;
        right: 0;
        left: 0;
        bottom: 0;
        background:
            radial-gradient(circle at 50% 50%, rgba(255, 255, 255, 0.1) 0%, transparent 60%),
            linear-gradient(45deg, rgba(255, 255, 255, 0.1) 25%, transparent 25%);
        background-size: 100% 100%, 60px 60px;
        opacity: 0.2;
        animation: backgroundMove 30s linear infinite;
    }

    @keyframes backgroundMove {
        0% {
            background-position: center, 0 0;
        }

        100% {
            background-position: center, 60px 60px;
        }
    }

    header h1 {
        color: var(--white);
        font-size: 3rem;
        text-align: center;
        font-family: 'Aref Ruqaa', serif;
        position: relative;
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2);
    }

    .container {
        max-width: 1000px;
        margin: 40px auto;
        padding: 20px;
    }

    .search-container {
        background: var(--white);
        border-radius: 20px;
        padding: 25px;
        margin-bottom: 25px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    }

    #search {
        width: 100%;
        padding: 15px 20px;
        font-size: 1.2rem;
        border: 2px solid rgba(35, 75, 110, 0.2);
        border-radius: 12px;
        font-family: 'Amiri', serif;
        transition: all 0.3s ease;
        outline: none;
    }

    #search:focus {
        border-color: var(--primary-color);
        box-shadow: 0 0 0 3px rgba(35, 75, 110, 0.1);
    }

    .loader {
        display: none;
        text-align: center;
        padding: 1rem;
    }

    .loader::after {
        content: "";
        display: inline-block;
        width: 30px;
        height: 30px;
        border: 3px solid #f3f3f3;
        border-top: 3px solid var(--primary-color);
        border-radius: 50%;
        animation: spin 1s linear infinite;
    }

    @keyframes spin {
        0% {
            transform: rotate(0deg);
        }

        100% {
            transform: rotate(360deg);
        }
    }

    #results {
        list-style: none;
    }

    #results li {
        background: var(--white);
        margin-bottom: 15px;
        padding: 20px 25px;
        border-radius: 12px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    #results li:hover {
        transform: translateY(-3px);
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
    }

    .sura-name {
        color: var(--primary-color);
        font-weight: bold;
        font-size: 1.2rem;
        font-family: 'Aref Ruqaa', serif;
    }

    .aya-number {
        color: var(--secondary-color);
        font-size: 1rem;
    }

    .aya-text {
        margin-top: 0.8rem;
        line-height: 2;
        font-size: 1.15rem;
    }

    .highlight {
        background-color: rgba(193, 123, 63, 0.2);
        color: var(--accent-color);
        padding: 0 4px;
        border-radius: 4px;
    }

    #pagination {
        margin-top: 2rem;
        text-align: center;
    }

    .pagination-btn {
        padding: 0.8rem 1.5rem;
        margin: 0 0.5rem;
        border: none;
        background: linear-gradient(45deg, var(--gradient-start), var(--gradient-end));
        color: var(--white);
        border-radius: 8px;
        cursor: pointer;
        transition: all 0.3s ease;
        font-family: 'Amiri', serif;
        font-size: 1.1rem;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    }

    .pagination-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(0, 0, 0, 0.15);
    }

    .pagination-btn:disabled {
        background: #bdc3c7;
        cursor: not-allowed;
        transform: none;
    }

    .no-results {
        text-align: center;
        padding: 2rem;
        color: var(--text-color);
        font-size: 1.2rem;
    }

    .footer {
        background: linear-gradient(45deg, var(--gradient-start), var(--gradient-end));
        color: var(--white);
        text-align: center;
        padding: 2rem;
        margin-top: auto;
        position: relative;
        overflow: hidden;
        font-family: 'Aref Ruqaa', serif;
    }

    @media (max-width: 768px) {
        .container {
            padding: 15px;
            margin: 20px auto;
        }

        header h1 {
            font-size: 2.2rem;
        }

        #search {
            font-size: 1rem;
            padding: 12px 15px;
        }
    }
    .form-group {
        margin-bottom: 1rem;
    }

    .form-group label {
        display: block;
        margin-bottom: 0.5rem;
        font-weight: bold;
        color: var(--text-color);
    }

    .form-group select,
    .form-group input[type="text"],
    .form-group textarea {
        width: 100%;
        padding: 0.8rem;
        border: 1px solid #e4e9f2;
        border-radius: 8px;
        font-size: 1rem;
        transition: all 0.3s ease;
    }

    .form-group select:focus,
    .form-group input[type="text"]:focus,
    .form-group textarea:focus {
        outline: none;
        border-color: var(--primary-color);
        box-shadow: 0 0 0 2px rgba(26, 95, 122, 0.1);
    }

    .button {
        display: inline-block;
        text-decoration: none;
        background: linear-gradient(135deg, #f5f7fa 0%, #e4e9f2 100%);
        color: var(--primary-color);
        padding: 0.8rem 1.2rem;
        font-size: 1rem;
        font-weight: bold;
        border-radius: 8px;
        transition: all 0.3s ease;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        border: 2px solid transparent;
        cursor: pointer;
    }

    .button:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.15);
        border-color: var(--primary-color);
        background: var(--primary-color);
        color: var(--white);
    }

    .button-primary {
        background: var(--primary-color);
        color: var(--white);
    }

    </style></head>
<body>
    <header>
        <h1>تعديل الأداة</h1>
    </header>

    <div class="container">
        <div class="search-container">
            @if($errors->any())
                <div style="background-color: #f8d7da; color: #721c24; padding: 10px; margin-bottom: 20px; border-radius: 8px;">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('linkingtool.update', $linkingtool) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" 
                           id="name" 
                           name="name" 
                           value="{{ old('name', $linkingtool->name) }}"
                           required>
                </div>

                <div class="form-group">
                    <label for="arabic_name">الاسم بالعربية:</label>
                    <input type="text" 
                           id="arabic_name" 
                           name="arabic_name"
                           value="{{ old('arabic_name', $linkingtool->arabic_name) }}"
                           required>
                </div>

                <div style="display: flex; justify-content: space-between; margin-top: 20px;">
                    <button type="submit" class="button button-primary">تحديث</button>
                    <a href="{{ route('linkingtool.index') }}" class="button">إلغاء</a>
                </div>
            </form>
        </div>
    </div>

    <div class="footer">
        <p>جميع الحقوق محفوظة © 2025</p>
    </div>
</body>
</html>