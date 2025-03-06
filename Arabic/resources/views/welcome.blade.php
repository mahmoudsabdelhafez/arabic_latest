<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>موارد اللغة العربية</title>
    <link href="https://fonts.googleapis.com/css2?family=Amiri:wght@400;700&family=Aref+Ruqaa:wght@400;700&display=swap"
        rel="stylesheet">
    <style>
    :root {
        --primary-color: #234B6E;
        --secondary-color: #3A7E71;
        --accent-color: #C17B3F;
        --text-color: #2b2b2b;
        --white: #ffffff;
        --gradient-start: #234B6E;
        --gradient-end: #3A7E71;
        --sidebar-width: 280px;
    }

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    .body {
        font-family: 'Amiri', serif;
        display: flex;
        min-height: 82vh;
        background: linear-gradient(135deg, #f5f7fa 0%, #e4e9f2 100%);
        color: var(--text-color);
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

    /* Sidebar Styles */
    .sidebar {
        width: var(--sidebar-width);
        background: var(--white);
        /* height: 100vh; */
        position: static;
        right: 0;
        overflow-y: auto;
        border-left: 1px solid rgba(0, 0, 0, 0.1);
        box-shadow: -4px 0 15px rgba(0, 0, 0, 0.1);
    }

    .sidebar-header {
        background: linear-gradient(45deg, var(--gradient-start), var(--gradient-end));
        padding: 2rem 1.5rem;
        position: relative;
        overflow: hidden;
    }

    .sidebar-header::before {
        content: '';
        position: absolute;
        top: 0;
        right: 0;
        left: 0;
        bottom: 0;
        background: radial-gradient(circle at 50% 50%, rgba(255, 255, 255, 0.1) 0%, transparent 60%);
        opacity: 0.2;
    }

    .sidebar h1 {
        color: var(--white);
        font-size: 1.5rem;
        font-family: 'Aref Ruqaa', serif;
        position: relative;
        text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.2);
    }

    .sidebar h2 {
        padding: 1rem 1.5rem;
        cursor: pointer;
        color: var(--text-color);
        font-size: 1.1rem;
        transition: all 0.3s ease;
        border-radius: 0.5rem;
        margin: 0.5rem 0.75rem;
        font-family: 'Amiri', serif;
    }

    .sidebar h2:hover {
        background-color: rgba(35, 75, 110, 0.1);
        color: var(--primary-color);
    }

    .sidebar h2.active {
        background: linear-gradient(45deg, var(--gradient-start), var(--gradient-end));
        color: var(--white);
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    }

    /* Main Content Styles */
    .main-content {
        flex: 1;
        /* margin-right: var(--sidebar-width); */
        padding: 2rem;
        max-width: 1200px;
    }

    .section {
        background: var(--white);
        border-radius: 20px;
        padding: 2rem;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        margin-bottom: 2rem;
        display: none;
        animation: fadeIn 0.3s ease;
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(10px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .section.active {
        display: block;
    }

    .section h2 {
        color: var(--primary-color);
        margin-bottom: 2rem;
        font-size: 1.8rem;
        font-family: 'Aref Ruqaa', serif;
        position: relative;
        padding-bottom: 0.75rem;
    }

    .section h2::after {
        content: '';
        position: absolute;
        bottom: 0;
        right: 0;
        width: 60px;
        height: 4px;
        background: linear-gradient(45deg, var(--gradient-start), var(--gradient-end));
        border-radius: 2px;
    }

    .button-container {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
        gap: 1.5rem;
        padding: 0.5rem;
    }

    .button {
        display: flex;
        align-items: center;
        justify-content: center;
        text-decoration: none;
        background: var(--white);
        color: var(--text-color);
        padding: 1.5rem;
        font-size: 1.1rem;
        border-radius: 12px;
        transition: all 0.3s ease;
        border: 1px solid rgba(0, 0, 0, 0.1);
        text-align: center;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    }

    .button:hover {
        transform: translateY(-3px);
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
        background: linear-gradient(45deg, var(--gradient-start), var(--gradient-end));
        color: var(--white);
        border-color: transparent;
    }

    .menu-toggle {
        position: fixed;
        right: 1rem;
        top: 1rem;
        z-index: 1001;
        background: linear-gradient(45deg, var(--gradient-start), var(--gradient-end));
        color: var(--white);
        border: none;
        padding: 0.75rem 1.5rem;
        border-radius: 8px;
        cursor: pointer;
        display: none;
        font-family: 'Amiri', serif;
        font-size: 1.1rem;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);

    }

    @media (max-width: 768px) {
        .sidebar {
            display: none;
            transform: translateX(100%);
            transition: transform 0.3s ease;
            z-index: 1000;
        }

        .sidebar.active {
            display: block;
            transform: translateX(0);
        }


        .main-content {
            margin-right: 0;
            padding: 1rem;
            width: 90%;
        }

        .menu-toggle {
            display: block;
        }

        .button-container {
            grid-template-columns: 1fr;
        }
    }



    .menu-toggle:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(0, 0, 0, 0.15);
    }

    .overlay {
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: rgba(0, 0, 0, 0.5);
        display: none;
        z-index: 999;
        backdrop-filter: blur(4px);
    }

    a {
        text-decoration: none;
    }

    .overlay.active {
        display: block;
    }

    .content-section {
        margin: 2rem 0;
        padding: 2rem;
        background: #fff;
        border-radius: 12px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    }

    .content-title {
        color: #234B6E;
        font-size: 1.8rem;
        margin-bottom: 1rem;
        font-family: 'Aref Ruqaa', serif;
        border-bottom: 3px solid #3A7E71;
        padding-bottom: 0.5rem;
    }

    .content-text {
        font-size: 1.1rem;
        line-height: 1.8;
        color: #2b2b2b;
        margin-bottom: 1.5rem;
    }

    .button-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 1.5rem;
        margin-top: 2rem;
    }

    .nav-button {
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 1.2rem 1.5rem;
        background: #fff;
        color: #234B6E;
        text-decoration: none;
        border-radius: 8px;
        border: 2px solid #234B6E;
        font-size: 1.2rem;
        font-weight: bold;
        transition: all 0.3s ease;
        text-align: center;
    }

    .nav-button:hover {
        background: linear-gradient(45deg, #234B6E, #3A7E71);
        color: #fff;
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(35, 75, 110, 0.2);
    }

    .section-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 2rem;
    }

    .section-header h2 {
        margin: 0;
        color: #234B6E;
        font-size: 2rem;
        font-family: 'Aref Ruqaa', serif;
    }

    @media (max-width: 768px) {
        .content-section {
            padding: 1.5rem;
        }

        .button-grid {
            grid-template-columns: 1fr;
        }
    }
    </style>
    <style>
    .harf-section {
        background-color: #f9f9fc;
        border-radius: 12px;
        padding: 2rem;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
    }

    .section-title {
        color: #234B6E;
        font-size: 2.2rem;
        margin-bottom: 1.5rem;
        /* border-bottom: 3px solid #3A7E71; */
        padding-bottom: 0.5rem;
    }

    .content-card {
        background-color: white;
        border-radius: 10px;
        padding: 1.5rem;
        margin-bottom: 1.5rem;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);
    }

    .main-description {
        color: #2b2b2b;
        font-size: 1.2rem;
        line-height: 1.8;
        margin-bottom: 1rem;
    }

    .examples-section {
        background-color: #f0f4f8;
        border-radius: 8px;
        padding: 1rem;
    }

    .examples-title {
        color: #3A7E71;
        font-size: 1.3rem;
        margin-bottom: 0.8rem;
    }

    .examples-list {
        list-style-type: none;
        padding-right: 1rem;
    }

    .example-item {
        margin-bottom: 0.5rem;
        position: relative;
        padding-right: 1rem;
    }

    .example-item::before {
        content: '•';
        color: #234B6E;
        position: absolute;
        right: 0;
        top: 0;
    }

    .example-text {
        color: #2b2b2b;
        font-size: 1.1rem;
    }

    .no-content-message {
        text-align: center;
        color: #888;
        padding: 2rem;
        background-color: #f8f9fa;
        border-radius: 10px;
    }

    .tools-section {
        margin-top: 2rem;
    }

    .tools-title {
        color: #234B6E;
        font-size: 1.6rem;
        margin-bottom: 1rem;
        border-bottom: 2px solid #3A7E71;
        padding-bottom: 0.3rem;
    }

    .button-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 1rem;
    }

    .tool-button {
        display: flex;
        align-items: center;
        justify-content: center;
        background-color: white;
        color: #234B6E;
        border: 2px solid #234B6E;
        padding: 1rem;
        border-radius: 8px;
        text-decoration: none;
        transition: all 0.3s ease;
        font-size: 1.1rem;
    }

    .tool-button:hover {
        background-color: #234B6E;
        color: white;
        transform: translateY(-3px);
        box-shadow: 0 4px 10px rgba(35, 75, 110, 0.2);
    }

    .tool-icon {
        margin-left: 0.5rem;
    }

    @media (max-width: 768px) {
        .harf-section {
            padding: 1rem;
        }

        .section-title {
            font-size: 1.8rem;
        }

        .button-grid {
            grid-template-columns: 1fr;
        }
    }

    .back-button {
        display: inline-block;
        padding: 0.75rem 1.5rem;
        background: linear-gradient(45deg, var(--primary-color), var(--secondary-color));
        color: var(--white);
        text-decoration: none;
        border-radius: 8px;
        margin-bottom: 2rem;
        transition: transform 0.3s ease;
    }

    .back-button:hover {
        transform: translateX(-5px);
    }
    </style>
    <style>
    :root {
        --primary-color: #234B6E;
        --secondary-color: #3A7E71;
        --accent-color: #C17B3F;
        --text-color: #2b2b2b;
        --white: #ffffff;
        --gradient-start: #234B6E;
        --gradient-end: #3A7E71;
        --sidebar-width: 280px;
        --transition-speed: 0.3s;
        --border-radius: 12px;
        --shadow-sm: 0 4px 6px rgba(0, 0, 0, 0.1);
        --shadow-md: 0 4px 12px rgba(0, 0, 0, 0.15);
        --shadow-lg: 0 8px 24px rgba(0, 0, 0, 0.2);
    }

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        font-family: 'Amiri', serif;
        line-height: 1.6;
        color: var(--text-color);
        background: #f5f7fa;
    }

    .page-wrapper {
        display: flex;
        min-height: 100vh;
        flex-direction: column;
    }

    header {
        background: linear-gradient(45deg, var(--gradient-start), var(--gradient-end));
        padding: 2rem;
        text-align: center;
        position: relative;
        box-shadow: var(--shadow-md);
    }

    header h1 {
        color: var(--white);
        font-size: 2.5rem;
        font-family: 'Aref Ruqaa', serif;
        text-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
    }

    .main-container {
        display: flex;
        flex: 1;
    }

    .sidebar {
        width: var(--sidebar-width);
        background: var(--white);
        box-shadow: var(--shadow-sm);
        padding: 1rem 0;
    }

    .nav-item {
        padding: 0.75rem 1.5rem;
        cursor: pointer;
        color: var(--text-color);
        transition: all var(--transition-speed);
        margin: 0.25rem 1rem;
        border-radius: var(--border-radius);
    }

    .nav-item:hover {
        background: rgba(35, 75, 110, 0.1);
        color: var(--primary-color);
    }

    .nav-item.active {
        background: linear-gradient(45deg, var(--gradient-start), var(--gradient-end));
        color: var(--white);
        box-shadow: var(--shadow-sm);
    }

    .main-content {
        flex: 1;
        padding: 2rem;
        max-width: 1200px;
        margin: 0 auto;
    }

    .section {
        background: var(--white);
        border-radius: var(--border-radius);
        padding: 2rem;
        margin-bottom: 2rem;
        box-shadow: var(--shadow-md);
        display: none;
    }

    .section.active {
        display: block;
        animation: fadeIn 0.3s ease;
    }

    .button-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 1.5rem;
        margin-top: 1.5rem;
    }

    .resource-button {
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 1rem;
        background: var(--white);
        color: var(--primary-color);
        text-decoration: none;
        border-radius: var(--border-radius);
        border: 2px solid var(--primary-color);
        transition: all var(--transition-speed);
        font-weight: bold;
        text-align: center;
    }

    .resource-button:hover {
        background: linear-gradient(45deg, var(--gradient-start), var(--gradient-end));
        color: var(--white);
        transform: translateY(-2px);
        box-shadow: var(--shadow-md);
    }

    @media (max-width: 768px) {
        .sidebar {
            position: fixed;
            right: -280px;
            top: 0;
            height: 100vh;
            z-index: 1000;
            transition: transform var(--transition-speed);
        }

        .sidebar.active {
            transform: translateX(-280px);
        }

        .main-content {
            margin-right: 0;
        }

        .button-grid {
            grid-template-columns: 1fr;
        }
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(10px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    </style>
    <style>
    .content-card {
        background-color: #f9f9fc;
        border-radius: 12px;
        padding: 1.5rem;
        margin-bottom: 1.5rem;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
    }

    .section-title {
        color: #234B6E;
        font-size: 2.2rem;
        margin-bottom: 1.5rem;
        padding-bottom: 0.5rem;
    }

    .examples-section {
        background-color: #f0f4f8;
        border-radius: 8px;
        padding: 1.5rem;
    }

    .examples-title {
        color: #3A7E71;
        font-size: 1.3rem;
        margin-bottom: 1rem;
        font-weight: 600;
    }

    .main-description {
        color: #2b2b2b;
        font-size: 1.2rem;
        line-height: 1.8;
        margin-bottom: 1rem;
        padding: 0.5rem 0;
    }

    .examples-list {
        padding: 0.5rem 1rem;
    }

    .example-item:hover {
        transform: translateX(5px);
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    @media (max-width: 768px) {
        .content-card {
            padding: 1rem;
        }

        .section-title {
            font-size: 1.8rem;
        }

        .examples-title {
            font-size: 1.2rem;
        }

        .main-description {
            font-size: 1.1rem;
        }
    }
    </style>
</head>

<body>
    <header>
        <h1>موارد اللغة العربية</h1>
    </header>
    <div class="body">
        <div class="overlay" onclick="toggleSidebar()"></div>
        <button class="menu-toggle" onclick="toggleSidebar()">القائمة</button>
        <div class="main-container">
            <aside class="sidebar">
                <div class="nav-item active" onclick="showSection('basics')"> <span class="nav-icon">📚 </span> اللغة
                    العربية</div>
                <div class="nav-item" onclick="showSection('tajweed')"> <span class="nav-icon">📖</span> القرآن الكريم
                </div>
                <div class="nav-item" onclick="showSection('phoneme')"> <span class="nav-icon">🔊</span> الصوتيات</div>
                <div class="nav-item" onclick="showSection('words')"><span class="nav-icon">📝</span> تركيب الكلمات
                </div>
                <a href="/connective_categories">
                    <div class="nav-item"><span class="nav-icon">📝</span> الأدوات في اللغة العربية</div>
                </a>
                <div class="nav-item" onclick="showSection('roots')"><span class="nav-icon">🌱</span> الجذور</div>
                <div class="nav-item" onclick="showSection('affixes')"><span class="nav-icon">🔄</span> السوابق واللواحق
                </div>
                <a href="/tree">
                    <div class="nav-item"><span class="nav-icon">🌳</span> الخطة الشجرية</div>
                </a>
                <div class="nav-item" onclick="showSection('mekdad')"><span class="nav-icon">🔄</span> جدوال مقداد</div>
                <div class="nav-item" onclick="showSection('arabic-letters')"><span class="nav-icon">📚</span>الأحرف
                    العربية</div>
                <div class="nav-item" onclick="showSection('analysis')"><span class="nav-icon">🔄</span>المحلل الصرفي
                </div>


                @if (auth()->check())
                <div class="nav-item" onclick="showSection('admin')">إدارة المحتوى</div>
                <form id="logoutForm" method="POST" action="{{ route('logout') }}">
                    @csrf
                    <div class="nav-item" onclick="document.getElementById('logoutForm').submit();">
                        تسجيل الخروج
                    </div>
                </form>

                @else
                <a href="/login" style="text-decoration: none;">
                    <div class="nav-item"><span class="nav-icon">👤</span> تسجيل الدخول</div>
                </a>
                @endif
            </aside>

            <main class="main-content">
                <section id="basics" class="section active">
                    <div class="section-header">
                        <h2>اللغة العربية</h2>
                    </div>

                    @if(isset($languageContents) && count($languageContents) > 0)
                    @foreach($languageContents as $content)
                    <div class="content-section">
                        <h3 class="content-title">{{ $content->section }}</h3>
                        <p class="content-text">{{ $content->content }}</p>
                        @if ($content->id == 2)
                        <div class="button-grid">
                            <a onclick="showSection('name')" class="nav-button">
                                اسم
                            </a>
                            <a onclick="showSection('verb')" class="nav-button">
                                فعل
                            </a>
                            <!-- <h2 onclick="showSection('harf')">حرف</h2> -->

                            <a onclick="showSection('harf')" class="nav-button">
                                حرف
                            </a>
                        </div>
                        @endif
                        @if ($content->id == 3)


                        @foreach ($sentences as $sentence)
                        <div class="content-card" style="border-right: 3px solid #234B6E; margin: 1.5rem 0;">
                            <h4 class="examples-title">{{ $sentence->name }}</h4>

                            <div class="main-description">
                                {{ $sentence->description }}
                            </div>

                            <div class="examples-list">
                                @foreach ($sentences_parts as $parts)
                                @if ($parts->sentence_id == $sentence->id)
                                <div class="example-item"
                                    style="background: white; padding: 1rem; border-radius: 8px; margin: 0.75rem 0; box-shadow: 0 2px 4px rgba(0,0,0,0.05); transition: all 0.3s ease;">
                                    <div style="display: flex; align-items: flex-start;">
                                        <span style="color: #234B6E; font-weight: 600; min-width: 120px;">
                                            {{ $parts->name }}:
                                        </span>
                                        <span style="color: #2b2b2b;">
                                            {{$parts->description}}
                                        </span>
                                    </div>
                                </div>
                                @endif
                                @endforeach
                            </div>
                        </div>
                        @endforeach
                        @endif

                        @if ($content->id == 5)

                        <div class="examples-section">
                            <ul class="examples-list">
                                @foreach ($beautyOfLanguage as $beauty)
                                <li class="example-item">
                                    <span class="examples-title">{{ $beauty->description }}</span>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        @if ($content->id == 4)

                        <div class="examples-section">
                            <ul class="examples-list">
                                @foreach ($grammarRules as $rule)
                                <li class="example-item">
                                    <span class="examples-title">{{ $rule->rule_name }}</span>
                                    <ul>
                                        <li>
                                            <span class="examples-text">{{ $rule->description }}</span>
                                        </li>
                                    </ul>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                    </div>
                    @endforeach
                    @else
                    <div class="content-section">
                        <p class="content-text">لا يوجد محتوى متاح حالياً</p>
                    </div>
                    @endif

                    <div class="content-title">
                        <br>
                    </div>
                    <br>
                    <h2>أساسيات اللغة العربية</h2>
                    <div class="button-container">
                        <a href="{{ url('/arabic-letters') }}" class="button">الأحرف العربية</a>
                        <a href="{{ url('/arabic-diacritics') }}" class="button">الحركات</a>
                    </div>
                </section>

                <section id="words" class="section">
                    <h2>تركيب الكلمات</h2>
                    <div class="button-container">
                        <a href="{{ url('/three-letter-combinations') }}" class="button">الكلمات الثلاثية</a>
                        <a href="{{ url('/four-letter-combinations') }}" class="button">الكلمات الرباعية</a>
                        <a href="{{ url('/pronouns') }}" class="button">الضمائر</a>
                    </div>
                </section>

                <section id="harf" class="section harf-section">
                    <div class="section-header">
                        <h2 class="section-title">الحرف في اللغة العربية</h2>
                        <a href="/" class="back-button">الرئيسية ←</a>

                    </div>

                    <div class="harf-description">
                        @if(isset($wordType) && count($wordType) > 0)
                        @foreach($wordType as $content)
                        @if ($content->type_name == 'الحرف')
                        <div class="content-card">
                            <div class="content-description">
                                <p class="main-description">{{ $content->description }}</p>

                                @if(isset($examples) && count($examples) > 0)
                                <div class="examples-section">
                                    <h3 class="examples-title">أمثلة توضيحية</h3>
                                    <ul class="examples-list">
                                        @foreach ($examples as $example)
                                        @if ($example->word_type_id == $content->id)
                                        <li class="example-item">
                                            <span class="example-text">{{ $example->example_text }}</span>
                                        </li>
                                        @endif
                                        @endforeach
                                    </ul>
                                </div>
                                @endif
                                <br>
                                @if (isset($features) && count($features) > 0)
                                <div class="examples-section">
                                    <h3 class="examples-title">مميزات الحرف :</h3>
                                    <ul class="examples-list">
                                        @foreach ($features as $feature)
                                        @if ($feature->word_type_id == $content->id)
                                        <li class="example-item">
                                            <span class="example-text">{{ $feature->example_text }}</span>
                                        </li>
                                        @endif
                                        @endforeach
                                    </ul>
                                </div>
                                @endif
                            </div>
                        </div>
                        @endif
                        @endforeach
                        @else
                        <div class="no-content-message">
                            <p>لا يوجد محتوى متاح حالياً للحرف</p>
                        </div>
                        @endif
                    </div>

                    <div class="tools-section">
                        <h3 class="tools-title">أدوات الربط في اللغة العربية</h3>
                        <div class="button-grid">
                            @foreach ($tools as $tool)
                            <a href="{{ url('/harf/' . $tool->id) }}" class="tool-button">
                                <span class="tool-icon">🔍</span>
                                {{ $tool->arabic_name }}
                            </a>
                            @endforeach
                        </div>
                    </div>
                </section>

                <section id="name" class="section harf-section">
                    <div class="section-header">
                        <h2 class="section-title">الاسم في اللغة العربية</h2>
                        <a href="/" class="back-button">الرئيسية ←</a>
                    </div>

                    <div class="harf-description">
                        @if(isset($wordType) && count($wordType) > 0)
                        @foreach($wordType as $content)
                        @if ($content->type_name == 'الاسم')
                        <div class="content-card">
                            <div class="content-description">
                                <p class="main-description">{{ $content->description }}</p>

                                @if(isset($examples) && count($examples) > 0)
                                <div class="examples-section">
                                    <h3 class="examples-title">أمثلة توضيحية</h3>
                                    <ul class="examples-list">
                                        @foreach ($examples as $example)
                                        @if ($example->word_type_id == $content->id)
                                        <li class="example-item">
                                            <span class="example-text">{{ $example->example_text }}</span>
                                        </li>
                                        @endif
                                        @endforeach
                                    </ul>
                                </div>
                                @endif
                                <br>
                                @if (isset($features) && count($features) > 0)
                                <div class="examples-section">
                                    <h3 class="examples-title">مميزات الاسم :</h3>
                                    <ul class="examples-list">
                                        @foreach ($features as $feature)
                                        @if ($feature->word_type_id == $content->id)
                                        <li class="example-item">
                                            <span class="example-text">{{ $feature->example_text }}</span>
                                        </li>
                                        @endif
                                        @endforeach
                                    </ul>
                                </div>
                                @endif
                            </div>
                        </div>
                        @endif
                        @endforeach
                        @else
                        <div class="no-content-message">
                            <p>لا يوجد محتوى متاح حالياً للحرف</p>
                        </div>
                        @endif
                    </div>

                    <div class="tools-section">

                    </div>
                </section>
                <section id="verb" class="section harf-section">
                    <div class="section-header">
                        <h2 class="section-title">الفعل في اللغة العربية</h2>
                        <a href="/" class="back-button">الرئيسية ←</a>
                    </div>

                    <div class="harf-description">
                        @if(isset($wordType) && count($wordType) > 0)
                        @foreach($wordType as $content)
                        @if ($content->type_name == 'الفعل')
                        <div class="content-card">
                            <div class="content-description">
                                <p class="main-description">{{ $content->description }}</p>

                                @if(isset($examples) && count($examples) > 0)
                                <div class="examples-section">
                                    <h3 class="examples-title">أمثلة توضيحية</h3>
                                    <ul class="examples-list">
                                        @foreach ($examples as $example)
                                        @if ($example->word_type_id == $content->id)
                                        <li class="example-item">
                                            <span class="example-text">{{ $example->example_text }}</span>
                                        </li>
                                        @endif
                                        @endforeach
                                    </ul>
                                </div>
                                @endif
                                <br>
                                @if (isset($features) && count($features) > 0)
                                <div class="examples-section">
                                    <h3 class="examples-title">مميزات الفعل :</h3>
                                    <ul class="examples-list">
                                        @foreach ($features as $feature)
                                        @if ($feature->word_type_id == $content->id)
                                        <li class="example-item">
                                            <span class="example-text">{{ $feature->example_text }}</span>
                                        </li>
                                        @endif
                                        @endforeach
                                    </ul>
                                </div>
                                @endif
                            </div>
                        </div>
                        @endif
                        @endforeach
                        @else
                        <div class="no-content-message">
                            <p>لا يوجد محتوى متاح حالياً للحرف</p>
                        </div>
                        @endif
                    </div>

                    <div class="tools-section">

                    </div>
                </section>


                <section id="roots" class="section">
                    <h2>الجذور</h2>
                    <div class="button-container">
                        <a href="{{ url('/root-words') }}" class="button">الجذور الثلاثية د. حسين</a>
                        <a href="{{ url('/roots') }}" class="button">الجذور الثلاثة 2 - د حسين</a>
                        <a href="{{ url('/roots/tree') }}" class="button">الخطة الشجريةللجذور</a>
                    </div>
                </section>

                <section id="affixes" class="section">
                    <h2>السوابق واللواحق</h2>
                    <div class="button-container">
                        <a href="{{ url('/prefixes-suffixes') }}" class="button">السوابق واللواحق</a>
                        <a href="{{ url('/root-words-view2') }}" class="button">الجذور الثلاثية مع سوابقها ولواحقها</a>
                        <a href="{{ url('/words') }}" class="button">الجذور الثلاثية مع سوابقها ولواحقها 2</a>
                        <a href="{{ url('/verb-suffix') }}" class="button">اضافة الفعل إلى الضمائر</a>
                    </div>
                </section>

                <section id="tajweed" class="section">
                    <h2>التجويد والصوتيات</h2>
                    <div class="button-container">
                        <a href="{{ url('/refuge-basmala') }}" class="button">الاستعاذة والبسملة</a>
                        <a href="{{ url('/tajweed-concept') }}" class="button">مفهوم التجويد</a>
                        <a href="{{ url('/tajweedcategories') }}" class="button">أحكام التجويد كاملة</a>
                        <a href="{{ url('/tajweeds') }}" class="button">أحرف التجويد</a>
                        <a href="{{ url('/ayah') }}" class="button">احكام التجويد في الاية</a>
                        <!-- <a href="{{ url('/quran') }}" class="button">البحث في المصحف</a> -->

                        <!-- <a href="{{ url('/tajweeds') }}" class="button">أحكام التجويد</a> -->
                        <!-- <a href="{{ url('/ayah') }}" class="button">مثال على أحكام التجويد</a> -->
                        <!-- <a href="{{ url('/phonemes-menu') }}" class="button">الصوتيات</a>
                    <a href="{{ url('/emphatic-arabic-letters') }}" class="button">أحرف القلقلة</a> -->
                    </div>
                </section>
                <section id="arabic-letters" class="section">
                    <div class="section-header">
                        <h2>الأحرف العربية</h2>
                    </div>
                    <div class="content-section">
                        <h3 class="content-title">معلومات عن الأحرف العربية</h3>
                        <p class="content-text">
                            اللغة العربية تتكون من 28 حرفًا أبجديًا. كل حرف له مخرج صوتي وخصائص فريدة. يمكنك النقر على
                            أي حرف للتعرف على تفاصيله الدقيقة.
                        </p>
                    </div>
                    <div class="button-container">
                        @foreach($arabicLetters as $letter)
                        <a href="{{ url('/phonemes/' . $letter->id) }}" class="button">
                            {{ $letter->letter }}
                            <span style="margin-right: 10px; font-size: 0.9em;">{{ $letter->transliteration }}</span>
                        </a>
                        @endforeach
                    </div>


                </section>

                <section id="mekdad" class="section">
                    <h2>Mekdad Phonemes Tables</h2>
                    <div class="button-container">
                        <a href="{{ url('/phoneme-syllabic-changes') }}" class="button">phoneme_syllabic_changes</a>
                        <a href="{{ url('/phoneme-substitutions') }}" class="button">phoneme_substitutions</a>
                        <a href="{{ url('/phoneme-structural-roles') }}" class="button">phoneme_structural_roles</a>
                        <a href="{{ url('/phoneme-semantic-features') }}" class="button">phoneme_semantic_features</a>
                        <a href="{{ url('/phoneme-root-effects') }}" class="button">phoneme_root_effects</a>
                        <a href="{{ url('/phoneme-replacements') }}" class="button">phoneme_replacements</a>
                        <a href="{{ url('/phoneme-phonetic-features') }}" class="button">phoneme_phonetic_features</a>
                        <a href="{{ url('/phoneme-origins') }}" class="button">phoneme_origins</a>
                        <a href="{{ url('/phoneme-natures') }}" class="button">phoneme_natures</a>
                        <a href="{{ url('/phoneme-morphemes') }}" class="button">phoneme_morphemes</a>
                        <a href="{{ url('/phoneme-harakats') }}" class="button">phoneme_harakats</a>
                        <a href="{{ url('/phoneme-grammatical-roles') }}" class="button">phoneme_grammatical_roles</a>
                        <a href="{{ url('/phoneme-functions') }}" class="button">phoneme_functions</a>
                        <a href="{{ url('/phoneme-embeddings') }}" class="button">phoneme_embeddings</a>
                        <a href="{{ url('/phoneme-deletions') }}" class="button">phoneme_deletions</a>
                        <a href="{{ url('/phoneme-contextual-features') }}"
                            class="button">phoneme_contextual_features</a>
                        <a href="{{ url('/phoneme-characteristics') }}" class="button">phoneme_characteristics</a>
                        <a href="{{ url('/phoneme-activities') }}" class="button">phoneme_activities</a>
                    </div>
                </section>



                <section id="analysis" class="section">
                    <h2>التجويد والصوتيات</h2>
                    <div class="button-container">
                        <a href="{{ url('/quran') }}" class="button">البحث في المصحف</a>

                    </div>
                </section>





                <section id="phoneme" class="section">
                    <h2>الصوتيات</h2>
                    <div class="button-container">
                        <a href="{{ url('/phonemes-menu') }}" class="button">الصوتيات</a>
                    </div>
                </section>
                @if (auth()->check() )
                <section id="admin" class="section">
                    <h2>إدارة المحتوى</h2>
                    <div class="button-container">
                        <a href="/phonemecategories" class="button">إضافة مخرج حروف رئيسي</a>
                        <a href="/upload" class="button">إضافة صورة مخرج</a>
                        <a href="/examples" class="button">إضافة أمثلة ل(الحرف ، الاسم ، الفعل )</a>
                        <a href="/grammar-rules" class="button">إضافة قواعد اساسية</a>
                        <a href="/beauty-of-language" class="button">إضافة جماليات اللغة العربية</a>
                        <a href="/arabic-features" class="button">إضافة مميزات ل(الاسم ، الفعل ، الحرف)</a>
                        <a href="/syntactic-effects/create" class="button">إضافة وظيفة نحوية</a>
                        <a href="/semantic-logical-effects/create" class="button">إضافة وظيفة دلالية</a>
                    </div>
                </section>
                @endif

        </div>
        </main>
    </div>
    <script>
    function showSection(sectionId) {
        document.querySelectorAll('.section').forEach(section => {
            section.classList.remove('active');
        });

        document.querySelectorAll('.sidebar h2').forEach(item => {
            item.classList.remove('active');
        });

        document.getElementById(sectionId).classList.add('active');
        event.target.classList.add('active');

        if (window.innerWidth <= 768) {
            toggleSidebar();
        }
    }

    function toggleSidebar() {
        document.querySelector('.sidebar').classList.toggle('active');
        document.querySelector('.overlay').classList.toggle('active');
    }
    </script>
    <script>
    function showSection(sectionId) {
        document.querySelectorAll('.section').forEach(section => {
            section.classList.remove('active');
        });
        document.querySelectorAll('.nav-item').forEach(item => {
            item.classList.remove('active');
        });
        document.getElementById(sectionId).classList.add('active');
        event.target.classList.add('active');
    }
    </script>
</body>

</html>