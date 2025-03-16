<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>محلّل الأفعال العربية</title>
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
        padding: 2rem;
        max-width: 1200px;
    }

    .section {
        background: var(--white);
        border-radius: 20px;
        padding: 2rem;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        margin-bottom: 2rem;
        animation: fadeIn 0.3s ease;
        display: none;
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

    .content-card {
        background-color: #f9f9fc;
        border-radius: 12px;
        padding: 1.5rem;
        margin-bottom: 1.5rem;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
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

    .example-item {
        margin-bottom: 0.5rem;
        position: relative;
        padding-right: 1rem;
        transition: all 0.3s ease;
    }

    .example-item:hover {
        transform: translateX(5px);
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .example-item::before {
        content: '•';
        color: #234B6E;
        position: absolute;
        right: 0;
        top: 0;
    }

    .form-group {
        margin-bottom: 1.5rem;
    }

    .form-control {
        width: 100%;
        padding: 0.75rem;
        border: 1px solid #ddd;
        border-radius: 8px;
        font-size: 1.1rem;
        font-family: 'Amiri', serif;
        transition: border-color 0.3s ease;
    }

    .form-control:focus {
        border-color: var(--primary-color);
        outline: none;
        box-shadow: 0 0 0 3px rgba(35, 75, 110, 0.1);
    }

    .btn {
        background: linear-gradient(45deg, var(--gradient-start), var(--gradient-end));
        color: white;
        border: none;
        padding: 0.75rem 1.5rem;
        border-radius: 8px;
        cursor: pointer;
        font-size: 1.1rem;
        font-family: 'Amiri', serif;
        transition: all 0.3s ease;
    }

    .btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(35, 75, 110, 0.2);
    }

    .result-card {
        margin-top: 2rem;
        background: white;
        border-radius: 12px;
        padding: 1.5rem;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
    }

    .result-title {
        color: var(--primary-color);
        font-size: 1.5rem;
        margin-bottom: 1rem;
        font-family: 'Aref Ruqaa', serif;
    }

    .result-item {
        display: flex;
        justify-content: space-between;
        padding: 0.75rem 0;
        border-bottom: 1px solid #eee;
    }

    .result-label {
        font-weight: bold;
        color: var(--secondary-color);
    }

    .verb-forms-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 1rem;
        margin-top: 1.5rem;
    }

    .verb-form-card {
        background: #f9f9fc;
        border-radius: 8px;
        padding: 1rem;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
        transition: all 0.3s ease;
    }

    .verb-form-card:hover {
        transform: translateY(-3px);
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    }

    .verb-form-title {
        color: var(--primary-color);
        font-size: 1.1rem;
        margin-bottom: 0.5rem;
        font-weight: bold;
    }

    .verb-form-value {
        font-size: 1.3rem;
        color: var(--text-color);
        direction: rtl;
    }

    .overlay {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: rgba(0, 0, 0, 0.5);
        z-index: 999;
    }

    .overlay.active {
        display: block;
    }

    @media (max-width: 768px) {
        .sidebar {
            display: none;
            transform: translateX(100%);
            transition: transform 0.3s ease;
            z-index: 1000;
            position: fixed;
            height: 100vh;
        }

        .sidebar.active {
            display: block;
            transform: translateX(0);
        }

        .main-content {
            margin-right: 0;
            padding: 1rem;
            width: 100%;
        }

        .menu-toggle {
            display: block;
        }

        .button-container {
            grid-template-columns: 1fr;
        }

        .verb-forms-grid {
            grid-template-columns: 1fr;
        }
    }
    </style>
    <style>
        /* Enhanced Derive Form Section Styles */
.section#verb-forms {
    animation: fadeIn 0.5s ease;
}

.card-header {
    display: flex;
    align-items: center;
    margin-bottom: 1.5rem;
    gap: 0.75rem;
}

.icon-wrapper {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 42px;
    height: 42px;
    background: rgba(58, 126, 113, 0.1);
    border-radius: 50%;
    padding: 8px;
}

.card-title {
    color: var(--primary-color);
    font-size: 1.4rem;
    font-family: 'Aref Ruqaa', serif;
    margin: 0;
}

.derive-form {
    background: #f9f9fc;
    border-radius: 12px;
    padding: 1.5rem;
    margin-top: 1rem;
    border: 1px solid rgba(0, 0, 0, 0.05);
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.03);
}

.form-label {
    display: block;
    font-weight: bold;
    color: var(--secondary-color);
    margin-bottom: 0.5rem;
}

.input-wrapper {
    position: relative;
}

.form-control {
    width: 100%;
    padding: 0.85rem;
    border: 2px solid rgba(35, 75, 110, 0.2);
    border-radius: 10px;
    font-size: 1.2rem;
    font-family: 'Amiri', serif;
    transition: all 0.3s ease;
    background-color: white;
}

.form-control:focus {
    border-color: var(--primary-color);
    outline: none;
    box-shadow: 0 0 0 3px rgba(35, 75, 110, 0.1);
    transform: translateY(-2px);
}

.input-info {
    position: absolute;
    left: 0;
    bottom: -20px;
    font-size: 0.8rem;
    color: #666;
}

.form-options {
    margin: 1.5rem 0;
}

.option-group {
    display: flex;
    gap: 1rem;
}

.option-label {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    cursor: pointer;
    user-select: none;
}

.option-label input[type="checkbox"] {
    width: 18px;
    height: 18px;
    accent-color: var(--secondary-color);
}

.form-actions {
    display: flex;
    gap: 1rem;
    margin-top: 1.5rem;
}

.btn-derive {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    background: linear-gradient(45deg, var(--primary-color), var(--secondary-color));
    color: white;
    padding: 0.85rem 1.8rem;
    border-radius: 10px;
    border: none;
    font-size: 1.1rem;
    font-family: 'Amiri', serif;
    cursor: pointer;
    transition: all 0.3s ease;
    box-shadow: 0 4px 15px rgba(35, 75, 110, 0.2);
    flex: 1;
    justify-content: center;
}

.btn-derive:hover {
    transform: translateY(-3px);
    box-shadow: 0 6px 20px rgba(35, 75, 110, 0.3);
}

.btn-icon {
    display: flex;
    transform: rotate(180deg); /* Adjust for RTL */
}

.btn-reset {
    background: transparent;
    color: var(--text-color);
    border: 1px solid rgba(0, 0, 0, 0.2);
    padding: 0.85rem 1.5rem;
    border-radius: 10px;
    font-size: 1.1rem;
    font-family: 'Amiri', serif;
    cursor: pointer;
    transition: all 0.3s ease;
}

.btn-reset:hover {
    background-color: rgba(0, 0, 0, 0.05);
}

.examples-chips {
    display: flex;
    flex-wrap: wrap;
    gap: 0.5rem;
    margin-top: 1.5rem;
    align-items: center;
}

.examples-label {
    font-weight: bold;
    color: var(--secondary-color);
    margin-left: 0.5rem;
}

.chip {
    background-color: rgba(35, 75, 110, 0.08);
    color: var(--primary-color);
    padding: 0.4rem 1rem;
    border-radius: 100px;
    font-size: 0.9rem;
    cursor: pointer;
    transition: all 0.3s ease;
    border: 1px solid transparent;
}

.chip:hover {
    background-color: rgba(35, 75, 110, 0.15);
    transform: translateY(-2px);
}

.chip:active {
    transform: translateY(0);
}

.result-card {
    margin-top: 2rem;
    background: white;
    border-radius: 15px;
    padding: 0;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
    overflow: hidden;
    animation: slideUp 0.5s ease;
}

@keyframes slideUp {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.result-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 1.5rem 2rem;
    background: linear-gradient(45deg, rgba(35, 75, 110, 0.08), rgba(58, 126, 113, 0.08));
    border-bottom: 1px solid rgba(0, 0, 0, 0.05);
}

.result-title {
    color: var(--primary-color);
    font-size: 1.4rem;
    margin: 0;
    font-family: 'Aref Ruqaa', serif;
}

.root-highlight {
    color: var(--accent-color);
    font-weight: bold;
}

.result-actions {
    display: flex;
    gap: 0.5rem;
}

.action-btn {
    background: white;
    border: none;
    width: 36px;
    height: 36px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    transition: all 0.3s ease;
    color: var(--primary-color);
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
}

.action-btn:hover {
    background-color: var(--primary-color);
    color: white;
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
}

.tabs-container {
    padding: 0 2rem;
    border-bottom: 1px solid rgba(0, 0, 0, 0.05);
}

.tabs {
    display: flex;
    gap: 1rem;
    overflow-x: auto;
    padding-bottom: 1px;
    margin-bottom: -1px;
}

.tab {
    padding: 1rem 1.5rem;
    cursor: pointer;
    position: relative;
    white-space: nowrap;
    color: #666;
    transition: all 0.3s ease;
}

.tab.active {
    color: var(--primary-color);
    font-weight: bold;
}

.tab.active::after {
    content: '';
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    height: 3px;
    background: var(--primary-color);
    border-radius: 3px 3px 0 0;
}

.verb-forms-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(230px, 1fr));
    gap: 1.5rem;
    padding: 2rem;
}

.verb-form-card {
    background: #f9f9fc;
    border-radius: 12px;
    padding: 1.2rem;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
    transition: all 0.3s ease;
    border: 1px solid rgba(0, 0, 0, 0.05);
    position: relative;
    overflow: hidden;
}

.verb-form-card::before {
    content: '';
    position: absolute;
    top: 0;
    right: 0;
    width: 6px;
    height: 100%;
    background: linear-gradient(to bottom, var(--gradient-start), var(--gradient-end));
    opacity: 0.5;
    border-radius: 0 12px 12px 0;
}

.verb-form-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.08);
}

.verb-form-card.primary {
    background: linear-gradient(45deg, rgba(35, 75, 110, 0.08), rgba(58, 126, 113, 0.08));
    border: 1px solid rgba(35, 75, 110, 0.1);
}

.verb-form-title {
    color: var(--primary-color);
    font-size: 1.1rem;
    margin-bottom: 0.75rem;
    font-weight: bold;
}

.verb-form-value {
    font-size: 1.5rem;
    color: var(--text-color);
    direction: rtl;
    margin-bottom: 0.5rem;
    font-weight: bold;
    font-family: 'Amiri', serif;
}

.verb-form-meaning {
    color: #666;
    font-size: 0.9rem;
    margin-top: 0.5rem;
}

@media (max-width: 768px) {
    .form-actions {
        flex-direction: column;
    }
    
    .verb-forms-grid {
        grid-template-columns: 1fr;
        padding: 1.5rem;
    }
    
    .tabs {
        gap: 0.5rem;
    }
    
    .tab {
        padding: 0.75rem 1rem;
        font-size: 0.9rem;
    }
    
    .result-header {
        padding: 1rem 1.5rem;
        flex-direction: column;
        align-items: flex-start;
        gap: 1rem;
    }
    
    .result-actions {
        align-self: flex-end;
    }
}
    </style>
</head>

<body>
    <div class="page-wrapper" dir="rtl">
        <header>
            <h1>محلّل الأفعال العربية</h1>
        </header>

        <button class="menu-toggle" id="menuToggle">القائمة</button>
        <div class="overlay" id="overlay"></div>

        <div class="body">
            <div class="sidebar" id="sidebar">
                <h2 class="active" data-section="verb-forms">أشكال الأفعال</h2>
                <h2 data-section="verb-analyzer">محلّل الأفعال</h2>
                <h2 data-section="patterns">الأوزان الصرفية</h2>
                <h2 data-section="examples">أمثلة</h2>
            </div>

            <div class="main-content">
                <div class="section" id="verb-analyzer">
                    <h2>محلّل الأفعال العربية</h2>

                    <div class="content-card">
                        <p class="main-description">
                            أدخل فعلاً عربياً لتحليله وتحديد وزنه الصرفي ومعلومات أخرى عنه.
                        </p>

                        <form action="{{ route('verb.analyze') }}" method="POST" id="analyzeForm">
                            @csrf
                            <div class="form-group">
                                <label for="verb">الفعل:</label>
                                <input type="text" name="verb" id="verb" class="form-control" required
                                    placeholder="مثال: كَتَبَ، فَهِمَ، حَسُنَ" dir="rtl">
                            </div>
                            <button type="submit" class="btn">تحليل الفعل</button>
                        </form>
                    </div>

                    @if(isset($result))
                    <div class="result-card">
                        <h3 class="result-title">نتائج التحليل</h3>
                        <div class="result-item">
                            <span class="result-label">الفعل:</span>
                            <span dir="rtl">{{ $verb }}</span>
                        </div>
                        <div class="result-item">
                            <span class="result-label">الوزن الصرفي:</span>
                            <span dir="rtl">{{ $pattern }}</span>
                        </div>
                    </div>
                    @endif

                    <div class="examples-section">
                        <h3 class="examples-title">أمثلة على الأفعال</h3>
                        <ul class="examples-list">
                            <li class="example-item"><span class="example-text">كَتَبَ (فَعَلَ)</span></li>
                            <li class="example-item"><span class="example-text">فَهِمَ (فَعِلَ)</span></li>
                            <li class="example-item"><span class="example-text">كَرُمَ (فَعُلَ)</span></li>
                            <li class="example-item"><span class="example-text">عَلَّمَ (فَعَّلَ)</span></li>
                            <li class="example-item"><span class="example-text">أَكْرَمَ (أَفْعَلَ)</span></li>
                        </ul>
                    </div>
                </div>

                <div class="section active" id="verb-forms">
                    <h2>اشتقاق أشكال الفعل</h2>

                    <div class="content-card">
                        <div class="card-header">
                            <div class="icon-wrapper">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"
                                    fill="none" stroke="#3A7E71" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"></path>
                                </svg>
                            </div>
                            <h3 class="card-title">الاشتقاق من الجذر</h3>
                        </div>

                        <p class="main-description">
                            أدخل الجذر الثلاثي للفعل لاشتقاق مختلف الصيغ والأشكال الصرفية. يمكنك استخدام جذور مثل "كتب"،
                            "قرأ"، "فتح" وغيرها.
                        </p>

                        <form action="{{ route('verb.derive') }}" method="POST" id="deriveForm" class="derive-form">
                            @csrf
                            <div class="form-group">
                                <label for="root" class="form-label">جذر الفعل (ثلاثي):</label>
                                <div class="input-wrapper">
                                    <input type="text" name="root" id="root" class="form-control" required
                                        placeholder="مثال: كتب، فهم، حسن" dir="rtl">
                                    <div class="input-info">أدخل الأحرف الثلاثة فقط</div>
                                </div>
                            </div>

                            <div class="form-options">
                                <div class="option-group">
                                    <label class="option-label">
                                        <input type="checkbox" name="include_all" checked>
                                        <span>اشتقاق كل الأشكال</span>
                                    </label>
                                </div>
                            </div>

                            <div class="form-actions">
                                <button type="submit" class="btn btn-derive">
                                    <span class="btn-icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="18"
                                            height="18" fill="none" stroke="currentColor" stroke-width="2">
                                            <path d="M9 18l6-6-6-6"></path>
                                        </svg>
                                    </span>
                                    <span class="btn-text">اشتقاق الأشكال</span>
                                </button>
                                <button type="reset" class="btn btn-reset" onclick="reset()">إعادة تعيين</button>
                            </div>
                        </form>

                        <div class="examples-chips">
                            <div class="examples-label">أمثلة:</div>
                            <div class="chip" data-root="كتب">كَتَبَ</div>
                            <div class="chip" data-root="فهم">فَهِمَ</div>
                            <div class="chip" data-root="عظم">عَظُمَ</div>
                        </div>
                    </div>

                    <div class="result-card">
                        
                    </div>
                </div>

                <div class="section" id="patterns">
                    <h2>الأوزان الصرفية</h2>

                    <div class="content-card">
                        <p class="main-description">
                            الأوزان الصرفية هي قوالب تصريفية للأفعال في اللغة العربية تساعد في فهم معاني الأفعال
                            وعلاقاتها.
                        </p>

                        <div class="verb-forms-grid">
                            <div class="verb-form-card">
                                <div class="verb-form-title">فَعَلَ</div>
                                <div class="verb-form-value">مثل: كَتَبَ، ذَهَبَ</div>
                            </div>
                            <div class="verb-form-card">
                                <div class="verb-form-title">فَعِلَ</div>
                                <div class="verb-form-value">مثل: فَهِمَ، عَلِمَ</div>
                            </div>
                            <div class="verb-form-card">
                                <div class="verb-form-title">فَعُلَ</div>
                                <div class="verb-form-value">مثل: كَرُمَ، حَسُنَ</div>
                            </div>
                            <div class="verb-form-card">
                                <div class="verb-form-title">فَعَّلَ</div>
                                <div class="verb-form-value">مثل: عَلَّمَ، قَدَّمَ</div>
                            </div>
                            <div class="verb-form-card">
                                <div class="verb-form-title">أَفْعَلَ</div>
                                <div class="verb-form-value">مثل: أَكْرَمَ، أَحْسَنَ</div>
                            </div>
                            <div class="verb-form-card">
                                <div class="verb-form-title">فَاعَلَ</div>
                                <div class="verb-form-value">مثل: قَاتَلَ، جَادَلَ</div>
                            </div>
                            <div class="verb-form-card">
                                <div class="verb-form-title">تَفَعَّلَ</div>
                                <div class="verb-form-value">مثل: تَكَلَّمَ، تَعَلَّمَ</div>
                            </div>
                            <div class="verb-form-card">
                                <div class="verb-form-title">تَفَاعَلَ</div>
                                <div class="verb-form-value">مثل: تَعَاوَنَ، تَشَارَكَ</div>
                            </div>
                            <div class="verb-form-card">
                                <div class="verb-form-title">انْفَعَلَ</div>
                                <div class="verb-form-value">مثل: انْطَلَقَ، انْكَسَرَ</div>
                            </div>
                            <div class="verb-form-card">
                                <div class="verb-form-title">افْتَعَلَ</div>
                                <div class="verb-form-value">مثل: اجْتَمَعَ، اخْتَلَفَ</div>
                            </div>
                            <div class="verb-form-card">
                                <div class="verb-form-title">اسْتَفْعَلَ</div>
                                <div class="verb-form-value">مثل: اسْتَخْرَجَ، اسْتَقْبَلَ</div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="section" id="examples">
                    <h2>أمثلة على تحليل الأفعال</h2>

                    <div class="content-card">
                        <p class="main-description">
                            إليك بعض الأمثلة على تحليل الأفعال العربية واشتقاقاتها.
                        </p>

                        <div class="examples-section">
                            <h3 class="examples-title">أفعال ثلاثية مجردة</h3>
                            <ul class="examples-list">
                                <li class="example-item">
                                    <span class="example-text">كَتَبَ: فعل ثلاثي مجرد على وزن فَعَلَ</span>
                                </li>
                                <li class="example-item">
                                    <span class="example-text">شَرِبَ: فعل ثلاثي مجرد على وزن فَعِلَ</span>
                                </li>
                                <li class="example-item">
                                    <span class="example-text">كَبُرَ: فعل ثلاثي مجرد على وزن فَعُلَ</span>
                                </li>
                            </ul>
                        </div>

                        <div class="examples-section">
                            <h3 class="examples-title">أفعال مزيدة</h3>
                            <ul class="examples-list">
                                <li class="example-item">
                                    <span class="example-text">أَكْرَمَ: فعل رباعي مزيد بحرف على وزن أَفْعَلَ</span>
                                </li>
                                <li class="example-item">
                                    <span class="example-text">عَلَّمَ: فعل ثلاثي مزيد بحرف على وزن فَعَّلَ</span>
                                </li>
                                <li class="example-item">
                                    <span class="example-text">انْطَلَقَ: فعل خماسي مزيد بحرفين على وزن انْفَعَلَ</span>
                                </li>
                                <li class="example-item">
                                    <span class="example-text">اسْتَخْرَجَ: فعل سداسي مزيد بثلاثة أحرف على وزن
                                        اسْتَفْعَلَ</span>
                                </li>
                            </ul>
                        </div>

                        <div class="examples-section">
                            <h3 class="examples-title">استخدام الأشكال المشتقة</h3>
                            <ul class="examples-list">
                                <li class="example-item">
                                    <span class="example-text">كَتَبَ ➜ كَاتِب (اسم الفاعل) ➜ مَكْتُوب (اسم
                                        المفعول)</span>
                                </li>
                                <li class="example-item">
                                    <span class="example-text">دَرَسَ ➜ دَارِس (اسم الفاعل) ➜ مَدْرُوس (اسم المفعول) ➜
                                        مَدْرَسَة (اسم المكان)</span>
                                </li>
                                <li class="example-item">
                                    <span class="example-text">عَلِمَ ➜ عَالِم (اسم الفاعل) ➜ مَعْلُوم (اسم المفعول) ➜
                                        عِلْم (المصدر)</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
         const chips = document.querySelectorAll('.chip');
    const analyzeForm = document.getElementById('deriveForm');
    
    // Add click event to each chip
    chips.forEach(chip => {
        chip.addEventListener('click', function() {
            const rootValue = chip.getAttribute('data-root');
            console.log('Clicked on:', rootValue); // You can use this value to process further logic
            document.getElementById('root').value = rootValue;
            // Here, you can trigger form submission
            
            // Trigger the form submission or any other actions needed
        });
    });
    document.addEventListener('DOMContentLoaded', function() {
        // Section switching
        const sidebarItems = document.querySelectorAll('.sidebar h2');
        const sections = document.querySelectorAll('.section');
        const menuToggle = document.getElementById('menuToggle');
        const sidebar = document.getElementById('sidebar');
        const overlay = document.getElementById('overlay');

        sidebarItems.forEach(item => {
            item.addEventListener('click', function() {
                const sectionId = this.getAttribute('data-section');

                // Update active class for sidebar items
                sidebarItems.forEach(i => i.classList.remove('active'));
                this.classList.add('active');

                // Show the selected section
                sections.forEach(section => {
                    section.classList.remove('active');
                    if (section.id === sectionId) {
                        section.classList.add('active');
                    }
                });

                // On mobile, close the sidebar after selection
                if (window.innerWidth <= 768) {
                    sidebar.classList.remove('active');
                    overlay.classList.remove('active');
                }
            });
        });

        // Mobile menu toggle
        menuToggle.addEventListener('click', function() {
            sidebar.classList.toggle('active');
            overlay.classList.toggle('active');
        });

        // Close sidebar when clicking on overlay
        overlay.addEventListener('click', function() {
            sidebar.classList.remove('active');
            overlay.classList.remove('active');
        });

        // Handle form submissions with AJAX
        const analyzeForm = document.getElementById('analyzeForm');
        const deriveForm = document.getElementById('deriveForm');

        if (analyzeForm) {
            analyzeForm.addEventListener('submit', function(e) {
                e.preventDefault();

                const formData = new FormData(this);

                fetch(this.getAttribute('action'), {
                        method: 'POST',
                        body: formData,
                        headers: {
                            'X-Requested-With': 'XMLHttpRequest',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')
                                .getAttribute('content')
                        }
                    })
                    .then(response => response.json())
                    .then(data => {
                        // Create result card
                        let resultHTML = `
                            <div class="result-card">
                                <h3 class="result-title">نتائج التحليل</h3>
                                <div class="result-item">
                                    <span class="result-label">الفعل:</span>
                                    <span dir="rtl">${data.verb}</span>
                                </div>
                                <div class="result-item">
                                    <span class="result-label">الوزن الصرفي:</span>
                                    <span dir="rtl">${data.pattern}</span>
                                </div>
                            </div>
                        `;

                        // Check if result card already exists
                        const existingResult = document.querySelector(
                            '#verb-analyzer .result-card');
                        if (existingResult) {
                            existingResult.outerHTML = resultHTML;
                        } else {
                            analyzeForm.closest('.content-card').insertAdjacentHTML('afterend',
                                resultHTML);
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                    });
            });
        }

        if (deriveForm) {
    deriveForm.addEventListener('submit', function(e) {
        e.preventDefault();

        const formData = new FormData(this);

        fetch(this.getAttribute('action'), {
                method: 'POST',
                body: formData,
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')
                        .getAttribute('content')
                }
            })
            .then(response => response.json())
            .then(data => {
                // Create table layout as requested
                let resultHTML = `
                    <div class="result-card" style="padding:20px">
                        <h3 class="result-title">الأشكال المشتقة من الجذر: ${data.root}</h3>
                        <div class="table-responsive">
                            <table class="verb-forms-table">
                                <thead>
                                    <tr>
                                        <th>الوزن الصرفي</th>
                                        <th>فاء الفعل</th>
                                        <th>عين الفعل</th>
                                        <th>لام الفعل</th>
                                        <th>الحروف المزيدة</th>
                                        <th>النتيجة</th>
                                        <th>المصدر</th>
                                    </tr>
                                </thead>
                                <tbody>
                `;

                // Create table rows for each derived form
                for (const [title, form] of Object.entries(data.derivedForms)) {
                    let parts1 =form.result.split(":")[0];
                    let parts2 =form.result.split(":")[1];
                    let separated =form.extraLetters.split(":")[1];
                    let separated2 = separated.split('').join(' ');
                    resultHTML += `
                        <tr>
                            <td class="pattern-cell">${ parts1}</td>
                            <td class="root-letter-cell">${data.fa}</td>
                            <td class="root-letter-cell">${data.ain}</td>
                            <td class="root-letter-cell">${data.lam}</td>
                            <td class="extra-letters-cell">${separated2 || '-'}</td>
                            <td class="result-cell">${parts2}</td>
                            <td class="masdar-cell">${title}</td>
                        </tr>
                    `;
                }

                resultHTML += `
                                </tbody>
                            </table>
                        </div>
                    </div>
                `;

                // Add CSS for the enhanced table
                const styleElement = document.createElement('style');
                styleElement.textContent = `
                    .table-responsive {
                        overflow-x: auto;
                        margin: 1rem 0;
                        border-radius: 12px;
                        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
                    }
                    
                    .verb-forms-table {
                        width: 100%;
                        border-collapse: separate;
                        border-spacing: 0;
                        background-color: white;
                        border-radius: 12px;
                    }
                    
                    .verb-forms-table th, 
                    .verb-forms-table td {
                        padding: 1rem;
                        text-align: center;
                        border-bottom: 1px solid #eee;
                    }
                    
                    .verb-forms-table thead th {
                        background: linear-gradient(45deg, var(--gradient-start), var(--gradient-end));
                        color: white;
                        font-weight: bold;
                        position: sticky;
                        top: 0;
                    }
                    
                    .verb-forms-table thead th:first-child {
                        border-top-right-radius: 12px;
                    }
                    
                    .verb-forms-table thead th:last-child {
                        border-top-left-radius: 12px;
                    }
                    
                    .verb-forms-table tbody tr:last-child td:first-child {
                        border-bottom-right-radius: 12px;
                    }
                    
                    .verb-forms-table tbody tr:last-child td:last-child {
                        border-bottom-left-radius: 12px;
                    }
                    
                    .verb-forms-table tbody tr:hover {
                        background-color: #f5f7fa;
                    }
                    
                    .pattern-cell {
                        font-weight: bold;
                        color: var(--primary-color);
                        border-right: 4px solid var(--primary-color);
                    }
                    
                    .root-letter-cell {
                        color: var(--primary-color);
                        font-weight: bold;
                        font-size: 1.1rem;
                    }
                    
                    .extra-letters-cell {
                        color: var(--accent-color);
                        font-weight: bold;
                    }
                    
                    .result-cell {
                        font-size: 1.2rem;
                        font-weight: bold;
                    }
                    
                    .masdar-cell {
                        color: var(--secondary-color);
                        font-style: italic;
                    }
                    
                    /* Animation for new results */
                    .result-card {
                        animation: fadeIn 0.5s ease-out;
                    }
                    
                    @keyframes fadeIn {
                        from {
                            opacity: 0;
                        }
                        to {
                            opacity: 1;
                        }
                    }
                    
                    /* Zebra striping for rows */
                    .verb-forms-table tbody tr:nth-child(even) {
                        background-color: #f9f9fc;
                    }
                    
                    /* Responsive adjustments */
                    @media (max-width: 768px) {
                        .verb-forms-table th, 
                        .verb-forms-table td {
                            padding: 0.75rem 0.5rem;
                            font-size: 0.9rem;
                        }
                    }
                `;
                
                document.head.appendChild(styleElement);

                // Replace existing result or insert new one
                const existingResult = document.querySelector('#verb-forms .result-card');
                if (existingResult) {
                    existingResult.outerHTML = resultHTML;
                } else {
                    deriveForm.closest('.content-card').insertAdjacentHTML('afterend', resultHTML);
                }
            })
            .catch(error => {
                console.error('Error:', error);
                // Show error message to user
                deriveForm.closest('.content-card').insertAdjacentHTML('afterend', `
                    <div class="result-card error">
                        <h3 class="result-title">حدث خطأ</h3>
                        <p>لم نتمكن من معالجة طلبك. يرجى المحاولة مرة أخرى.</p>
                    </div>
                `);
            });
    });
}

    });
    function reset(){
        document.querySelector('#verb-forms .result-card').innerHTML ="";  }
    </script>
</body>

</html>