<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>البحث في القرآن الكريم</title>
    <link href="https://fonts.googleapis.com/css2?family=Amiri:wght@400;700&family=Aref+Ruqaa:wght@400;700&display=swap"
        rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <style>
    /* Base Styles */
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

    /* Responsive typography */
    html {
        font-size: 16px;
    }

    body {
        font-family: 'Amiri', serif;
        background: linear-gradient(135deg, #f5f7fa 0%, #e4e9f2 100%);
        color: var(--text-color);
        min-height: 100vh;
        line-height: 1.8;
        padding-top: 80px;
        overflow-x: hidden;
    }

    /* Layout Structure */
    .page-wrapper {
        display: flex;
        min-height: 100vh;
        flex-direction: column;
        overflow-x: hidden;
    }

    .content-wrapper {
        display: flex;
        flex: 1;
        position: relative;
    }

    .main-content {
        flex: 1;
        margin-right: var(--sidebar-width);
        padding: 0 2rem;
        width: calc(100% - var(--sidebar-width));
        overflow-x: hidden;
    }

    /* Main Layout Structure */
    .page-wrapper {
        display: flex;
        min-height: 100vh;
        flex-direction: column;
    }

    header {
        background: linear-gradient(45deg, var(--gradient-start), var(--gradient-end));
        padding: 2rem;
        text-align: center;
        position: fixed;
        width: 100%;
        z-index: 100;
        box-shadow: var(--shadow-md);
        top: 0;
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
        padding-top: 80px;
        /* transition: margin-right var(--transition-speed); */
    }

    /* Improved Sidebar Styles */
    .sidebar {
        width: var(--sidebar-width);
        background: var(--white);
        box-shadow: var(--shadow-sm);
        position: fixed;
        right: 0;
        top: 14%;
        height: calc(100vh - 80px);
        overflow-y: auto;
        overflow-x: hidden;
        z-index: 90;
        transition: transform var(--transition-speed);
        scrollbar-width: thin;
        scrollbar-color: var(--secondary-color) #f1f1f1;
    }

    .sidebar::-webkit-scrollbar {
        width: 6px;
    }

    .sidebar::-webkit-scrollbar-track {
        background: #f1f1f1;
    }

    .sidebar::-webkit-scrollbar-thumb {
        background: var(--secondary-color);
        border-radius: 10px;
    }

    /* Nav Items */
    .nav-item {
        padding: 0.85rem 1.5rem;
        cursor: pointer;
        color: var(--text-color);
        /* transition: all var(--transition-speed); */
        margin: 0.5rem 1rem;
        border-radius: var(--border-radius);
        display: flex;
        align-items: center;
        position: relative;
        overflow: hidden;
    }

    .nav-item:before {
        content: '';
        position: absolute;
        right: 0;
        top: 0;
        height: 100%;
        width: 3px;
        background: var(--primary-color);
        transform: scaleY(0);
        transition: transform 0.2s;
    }

    .nav-item:hover {
        background: rgba(35, 75, 110, 0.1);
        color: var(--primary-color);
    }

    .nav-item:hover:before {
        transform: scaleY(1);
    }

    .nav-item.active {
        background: linear-gradient(45deg, var(--gradient-start), var(--gradient-end));
        color: var(--white);
        box-shadow: var(--shadow-sm);
    }

    .nav-icon {
        margin-left: 10px;
        font-size: 1.1rem;
    }

    /* Responsive Design - Original */
    .menu-toggle {
        display: none;
        position: fixed;
        left: 20px;
        top: 20px;
        z-index: 200;
        background: var(--primary-color);
        color: white;
        border: none;
        padding: 10px 15px;
        border-radius: var(--border-radius);
        cursor: pointer;
        font-family: 'Amiri', serif;
        box-shadow: var(--shadow-sm);
    }

    .overlay {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: rgba(0, 0, 0, 0.5);
        z-index: 89;
    }

    /* Search Container Styles */
    .search-container {
        background: var(--white);
        border-radius: 20px;
        padding: 25px;
        margin-top: 80px;
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
    }

    /* Analysis Button Styles */
    #analysis-btn {
        padding: 12px 30px;
        background: linear-gradient(45deg, var(--gradient-start), var(--gradient-end));
        color: var(--white);
        font-family: serif;
        font-size: 1.2rem;
        border: none;
        border-radius: 12px;
        cursor: pointer;
        margin: 20px 0;
        transition: all 0.3s ease;
    }

    #analysis-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(0, 0, 0, 0.15);
    }

    /* Toggle Buttons Styles */
    .toggle-buttons {
        display: flex;
        gap: 10px;
        margin: 20px 0;
    }

    .toggle-btn {
        padding: 10px 20px;
        border: none;
        background-color: var(--white);
        cursor: pointer;
        border-radius: 8px;
        font-family: 'Amiri', serif;
        transition: all 0.3s ease;
        flex: 1;
    }

    .toggle-btn.active {
        background: var(--primary-color);
        color: var(--white);
        box-shadow: 0 4px 10px rgba(35, 75, 110, 0.2);
    }

    /* Checkbox Styles */
    .checkbox-group {
        display: flex;
        align-items: center;
        gap: 12px;
        flex-direction: row-reverse;
        justify-content: flex-end;
        padding: 12px 0;
        transition: all 0.3s ease;
    }

    .checkbox-group:hover {
        background: rgba(35, 75, 110, 0.05);
        border-radius: 8px;
        padding-right: 8px;
    }

    .custom-checkbox {
        appearance: none;
        width: 22px;
        height: 22px;
        border: 2px solid var(--primary-color);
        border-radius: 6px;
        cursor: pointer;
        position: relative;
        transition: all 0.3s ease;
        background: var(--white);
    }

    .custom-checkbox:checked {
        background: var(--primary-color);
    }

    .custom-checkbox:checked::after {
        content: '✓';
        position: absolute;
        color: white;
        font-size: 14px;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
    }

    /* Results Styles */
    #results {
        list-style: none;
        display: flex;
        flex-direction: column;
        gap: 20px;
        padding: 10px 0;
    }

    #results li {
        background: linear-gradient(to right, rgba(255, 255, 255, 0.95), rgba(255, 255, 255, 0.98));
        margin-bottom: 15px;
        padding: 20px;
        border-radius: 12px;
        /* transition: transform 0.3s ease; */
    }

    #results li:hover {
        /* transform: translateY(-3px); */
        box-shadow: 0 8px 30px rgba(35, 75, 110, 0.12);
    }

    /* Sura Name Styling */
    .sura-name {
        color: var(--primary-color);
        font-family: 'Aref Ruqaa', serif;
        font-size: 1.4rem;
        margin-bottom: 10px;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .sura-name::before {
        content: '◈';
        color: var(--accent-color);
        font-size: 1.2rem;
    }

    /* Aya Number */
    .aya-number {
        background: var(--primary-color);
        color: white;
        padding: 4px 12px;
        border-radius: 20px;
        font-size: 0.9rem;
        display: inline-block;
        margin-bottom: 15px;
        box-shadow: 0 2px 8px rgba(35, 75, 110, 0.2);
    }

    /* Aya Text */
    .aya-text {
        font-size: 1.25rem;
        line-height: 2.2;
        padding: 15px;
        background: rgba(255, 255, 255, 0.7);
        border-radius: 12px;
        border-right: 4px solid var(--secondary-color);
        margin: 15px 0;
    }

    /* Highlighted Text */
    .highlight {
        background: linear-gradient(120deg, rgba(193, 123, 63, 0.2) 0%, rgba(193, 123, 63, 0.1) 100%);
        color: var(--accent-color);
        padding: 2px 5px;
        border-radius: 4px;
        font-weight: bold;
    }

    .pagination-btn {
        background: var(--secondary-color);
        color: white;
        padding: 8px 20px;
        border: none;
        border-radius: 8px;
        cursor: pointer;
        font-family: 'Amiri', serif;
        font-size: 1rem;
        margin-top: 10px;
        transition: all 0.3s ease;
    }

    .pagination-btn:hover {
        background: var(--primary-color);
        transform: translateY(-2px);
    }

    /* Analysis Button */
    .ayah-analysis-btn {
        background: linear-gradient(45deg, var(--primary-color), var(--secondary-color));
        color: white;
        padding: 10px 25px;
        border: none;
        border-radius: 10px;
        cursor: pointer;
        font-family: serif;
        font-size: 1.1rem;
        /* transition: all 0.3s ease; */
        margin-top: 15px;
        box-shadow: 0 4px 15px rgba(35, 75, 110, 0.15);
    }

    .ayah-analysis-btn:hover {
        /* transform: translateY(-2px); */
        box-shadow: 0 6px 20px rgba(35, 75, 110, 0.2);
    }

    /* Analysis Results */
    .analysis-result {
        margin-top: 20px;
        padding: 20px;
        background: rgba(248, 249, 250, 0.9);
        border-radius: 12px;
        display: none;
    }

    .analysis-result>div {
        border-right: 4px solid var(--primary-color);
        margin-bottom: 20px;
        padding: 15px;
        background: white;
        border-radius: 0 10px 10px 0;
        /* transition: all 0.3s ease; */
    }

    .analysis-result>div:hover {
        /* transform: translateX(-5px); */
        box-shadow: 0 4px 15px rgba(35, 75, 110, 0.1);
    }

    .analysis-result h4 {
        color: var(--primary-color);
        font-family: serif;
        font-size: 1.2rem;
        margin-bottom: 15px;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    /* Phoneme Details Button */
    .phoneme-details-btn {
        background: var(--secondary-color);
        color: white;
        padding: 8px 20px;
        border: none;
        border-radius: 8px;
        cursor: pointer;
        font-family: 'Amiri', serif;
        font-size: 1rem;
        margin-top: 10px;
        /* transition: all 0.3s ease; */
    }

    .phoneme-details-btn:hover {
        background: var(--primary-color);
        transform: translateY(-2px);
    }

    /* Phoneme Details Container */
    .phoneme-details-container {
        margin-top: 15px;
        padding: 15px;
        background: rgba(255, 255, 255, 0.8);
        border-radius: 10px;
        display: none;
    }

    .phoneme-details-container>div {
        padding: 15px;
        border-bottom: 1px solid rgba(35, 75, 110, 0.1);
    }

    .phoneme-details-container>div:last-child {
        border-bottom: none;
    }

    .phoneme-details-container h5 {
        color: var(--primary-color);
        font-size: 1.1rem;
        margin-bottom: 10px;
    }

    /* No Results Message */
    .no-results {
        text-align: center;
        padding: 40px;
        color: var(--text-color);
        font-size: 1.2rem;
        background: white;
        border-radius: 15px;
        box-shadow: 0 4px 15px rgba(35, 75, 110, 0.1);
    }

    /* Loading Animation */
    .loader {
        display: none;
        margin: 20px auto;
        width: 50px;
        height: 50px;
        border: 3px solid rgba(35, 75, 110, 0.1);
        border-radius: 50%;
        border-top-color: var(--primary-color);
        animation: spin 1s linear infinite;
    }

    @keyframes spin {
        to {
            transform: rotate(360deg);
        }
    }

    /* Analysis Tree Styles */
    .analysis-tree {
        display: flex;
        justify-content: center;
        padding: 2rem;
        max-width: 1200px;
        margin: 0 auto;
        direction: rtl;
        font-family: 'Amiri', 'Segoe UI', Tahoma, serif;
    }

    .tree-root {
        display: flex;
        flex-direction: column;
        align-items: center;
        width: 100%;
        list-style-type: none;
        padding: 0;
        margin: 0;
    }

    .analysis-tree ul {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        padding: 20px 0;
        position: relative;
        /* transition: all 0.3s; */
        list-style-type: none;
        margin: 0;
    }

    .analysis-tree li {
        display: flex;
        flex-direction: column;
        align-items: center;
        position: relative;
        padding: 0 20px;
        margin: 0;
    }

    .analysis-tree li::before,
    .analysis-tree li::after {
        content: '';
        position: absolute;
        background: linear-gradient(to bottom, var(--gradient-start), var(--gradient-end));
    }

    .analysis-tree li::before {
        top: -20px;
        height: 20px;
        width: 2px;
    }

    .analysis-tree ul>li::after {
        top: -40px;
        width: 100%;
        height: 2px;
    }

    .analysis-tree li::after {
        margin-top: 20px;
        content: '';
        position: absolute;
        top: 20px;
        width: 50%;
        height: 2px;
        background: linear-gradient(to bottom, var(--gradient-start), var(--gradient-end));
        right: 0;
    }

    .analysis-tree li:first-child::after {
        right: 50%;
        width: 50%;
    }

    .analysis-tree li:last-child::after {
        left: 50%;
        width: 50%;
    }

    .analysis-tree li:only-child::after {
        display: none;
    }

    .branch {
        display: inline-block;
        padding: 1rem 1.5rem;
        border-radius: var(--border-radius);
        background: var(--white);
        box-shadow: var(--shadow-sm);
        cursor: pointer;
        /* transition: all 0.3s ease; */
        border: 2px solid var(--primary-color);
        min-width: 150px;
        text-align: center;
        margin: 16px 0;
        position: relative;
        text-decoration: none;
        color: var(--text-color);
    }

    .branch:hover {
        background: linear-gradient(45deg, var(--gradient-start), var(--gradient-end));
        color: var(--white);
        transform: translateY(-2px);
        box-shadow: var(--shadow-lg);
    }

    .branch-tooltip {
        position: absolute;
        bottom: 100%;
        left: 50%;
        transform: translateX(-50%);
        background: rgba(0, 0, 0, 0.8);
        color: var(--white);
        padding: 0.5rem 1rem;
        border-radius: var(--border-radius);
        font-size: 0.9rem;
        opacity: 0;
        visibility: hidden;
        /* transition: all var(--transition-speed); */
        white-space: nowrap;
        z-index: 10;
    }

    .branch:hover .branch-tooltip {
        opacity: 1;
        visibility: visible;
        transform: translateX(-50%) translateY(-5px);
    }

    .result-detail {
        padding: 1rem;
        background: var(--white);
        border-radius: var(--border-radius);
        box-shadow: var(--shadow-sm);
        margin: 0.5rem 0;
        border-right: 3px solid var(--accent-color);
        width: 100%;
        min-width: 300px;
    }

    @keyframes branchAppear {
        from {
            opacity: 0;
            transform: translateY(-20px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .new-branch {
        animation: branchAppear 0.5s ease forwards;
    }

    /* Initially hide all child branches */
    .branch-children {
        display: none;
    }

    /* Toast notification styles */
    .alert {
        position: fixed;
        top: 20px;
        right: 20px;
        padding: 12px 16px;
        border-radius: 8px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        display: flex;
        align-items: center;
        z-index: 1000;
        max-width: 350px;
    }

    .alert-success {
        background-color: #d4edda;
        color: #155724;
        border-left: 4px solid #28a745;
    }

    .alert-error {
        background-color: #f8d7da;
        color: #721c24;
        border-left: 4px solid #dc3545;
    }

    .alert-icon {
        margin-right: 10px;
    }

    /* Make images responsive */
    img {
        max-width: 100%;
        height: auto;
    }

    /* ENHANCED RESPONSIVE STYLES */

    @media (max-width: 1200px) {
        html {
            font-size: 15px;
        }

        :root {
            --sidebar-width: 250px;
        }

        .main-content {
            padding: 1.5rem;
        }
    }

    @media (max-width: 992px) {
        html {
            font-size: 14px;
        }

        .analysis-tree {
            padding: 1.5rem 1rem;
        }

        .branch {
            min-width: 130px;
            padding: 0.8rem 1.2rem;
            font-size: 0.9rem;
        }
    }

    @media (max-width: 768px) {
        .menu-toggle {
            display: block;
            font-size: 1.2rem;
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            top: 25px;
        }

        .overlay.active {
            display: block;
        }

        .sidebar {
            transform: translateX(calc(var(--sidebar-width)));
            right: calc(-1 * var(--sidebar-width));
            width: 240px;
        }

        .sidebar.active {
            transform: translateX(0);
        }

        .main-content {
            margin-right: 0;
            width: 100%;
            padding: 1rem;
        }

        header h1 {
            font-size: 1.8rem;
        }

        .nav-item {
            padding: 0.7rem 1.2rem;
            margin: 0.4rem 0.8rem;
        }

        .search-container {
            margin-top: 10px;
            padding: 20px;
        }

        #search {
            padding: 12px 15px;
            font-size: 1.1rem;
        }

        .toggle-buttons {
            flex-wrap: wrap;
            gap: 8px;
        }

        .toggle-btn {
            padding: 8px 16px;
            font-size: 0.9rem;
            flex: 1 1 calc(50% - 8px);
        }

        /* Fix the main container when sidebar is active on mobile */
        .main-container {
            transition: margin-right var(--transition-speed);
        }

        .sidebar.active+.main-container {
            margin-right: 0;
        }

        .content-wrapper {
            flex-direction: column;
        }

        /* Fix the fixed header for better mobile experience */
        header {
            padding: 1.5rem;
        }

        .page-wrapper {
            padding-top: 70px;
        }

        /* Mobile styles for analysis options */
        .analysis-options-title {
            padding: 12px;
            background: var(--primary-color);
            color: white;
            border-radius: 8px;
            cursor: pointer;
            position: relative;
            margin-bottom: 0;
        }

        .analysis-options-title::after {
            content: '▼';
            position: absolute;
            left: 12px;
            transition: transform 0.3s ease;
        }

        .analysis-options.active .analysis-options-title::after {
            transform: rotate(180deg);
        }

        .checkbox-container {
            display: none;
            background: white;
            border: 1px solid #eee;
            border-radius: 8px;
            margin-top: 8px;
            padding: 8px 0;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .analysis-options.active .checkbox-container {
            display: block;
        }

        .checkbox-group {
            padding: 12px 16px;
        }

        .checkbox-group:not(:last-child) {
            border-bottom: 1px solid #eee;
        }
    }

    @media (max-width: 576px) {
        html {
            font-size: 13px;
        }

        body {
            padding-top: 70px;
        }

        .search-container {
            margin-top: 10px;
            padding: 15px;
        }

        .sura-name {
            font-size: 1.2rem;
        }

        .aya-text {
            font-size: 1.1rem;
            line-height: 1.8;
            padding: 10px;
        }

        .analysis-result {
            padding: 12px;
        }

        .analysis-result>div {
            padding: 10px;
        }

        #analysis-btn,
        .ayah-analysis-btn {
            padding: 10px 20px;
            font-size: 1rem;
        }

        .aya-number {
            padding: 3px 10px;
            font-size: 0.8rem;
        }

        #results li {
            padding: 15px;
        }

        .checkbox-group {
            padding: 10px 0;
        }

        /* Handle sidebar better on mobile */
        .sidebar {
            width: 75%;
            right: -75%;
        }

        .sidebar.active {
            transform: translateX(-100%);
        }

        .menu-toggle {
            width: 36px;
            height: 36px;
            top: 15px;
            left: 15px;
            padding: 8px 12px;
        }

        .analysis-tree {
            padding: 1rem 0.5rem;
        }

        .branch {
            min-width: 100px;
            padding: 0.7rem 1rem;
            font-size: 0.85rem;
            margin: 12px 0;
        }

        .analysis-tree li {
            padding: 0 10px;
        }

        .result-detail {
            min-width: 250px;
            padding: 0.8rem;
        }
    }

    /* Add a touch-friendly hover state for mobile */
    @media (hover: none) {

        .nav-item:hover,
        .toggle-btn:hover,
        .branch:hover,
        #analysis-btn:hover,
        .ayah-analysis-btn:hover,
        .pagination-btn:hover,
        .phoneme-details-btn:hover {
            transform: none;
        }

        .nav-item:active,
        .toggle-btn:active,
        .branch:active,
        #analysis-btn:active,
        .ayah-analysis-btn:active,
        .pagination-btn:active,
        .phoneme-details-btn:active {
            transform: scale(0.98);
        }
    }

    /* Improve the scrollbar on mobile */
    ::-webkit-scrollbar {
        width: 4px;
    }

    /* JavaScript Helper Classes */
    .js-hidden {
        display: none !important;
    }

    .js-visible {
        display: block !important;
    }

    .js-flex {
        display: flex !important;
    }
    </style>
</head>

<body>
    <div class="page-wrapper">
        <header>
            <h1>البحث في القرآن الكريم</h1>
        </header>

        <div class="content-wrapper">

            <aside class="sidebar">
                <div class="analysis-options" style="padding-top: 20px; padding-right: 20px;">
                    <h3 class="analysis-options-title">خيارات التحليل</h3>
                    <div class="checkbox-container">
                        <div class="checkbox-group" id="select-all-group">
                            <label for="select-all">جميع الأدوات</label>
                            <input type="checkbox" id="select-all" class="custom-checkbox">
                        </div>

                        @foreach ($categories as $category)
                        <div class="checkbox-group">
                            <label for="category-{{ $category->id }}">{{ $category->arabic_name }}</label>
                            <input type="checkbox" id="category-{{ $category->id }}"
                                class="custom-checkbox category-checkbox" data-category-id="{{ $category->id }}">
                        </div>
                        @endforeach
                    </div>
                </div>
            </aside>

            <main class="main-content">
               

                <div class="search-container">
                    <input type="text" id="search" placeholder="ابحث عن كلمة أو آية..." autocomplete="off">
                </div>

                <button id="analysis-btn">تحليل</button>
                <div id="analysis-text-container" class="analysis-text-container"></div>

                <div class="toggle-buttons">
                    <button id="quran-btn" class="toggle-btn active">عرض الايات مع تشكيل</button>
                    <button id="quran-text-clean-btn" class="toggle-btn">عرض الايات بدون تشكيل</button>
                </div>

                <div class="loader" id="loader"></div>
                <div id="result-count"></div> <!-- This will display the number of results -->
                <div id="ayah-analyze-results"></div>
                <ul id="results"></ul>
                <div id="pagination"></div>
            </main>
        </div>
    </div>

    <footer class="footer">
        <p>© جميع الحقوق محفوظة للقرآن الكريم</p>
    </footer>
</body>

</html>

<script>
/* Add this JavaScript to make the mobile menu work */
function toggleSidebar() {
    document.querySelector('.sidebar').classList.toggle('active');
    document.querySelector('.overlay').classList.toggle('active');
}

function showSection(sectionId) {
    // Hide all sections
    document.querySelectorAll('.section').forEach(section => {
        section.classList.remove('active');
    });

    // Show selected section
    document.getElementById(sectionId).classList.add('active');

    // Update active nav item
    document.querySelectorAll('.nav-item').forEach(item => {
        item.classList.remove('active');
    });

    // Find and activate the clicked nav item
    event.currentTarget.classList.add('active');

    // Close sidebar on mobile after selection
    if (window.innerWidth <= 768) {
        toggleSidebar();
    }
}

document.addEventListener('DOMContentLoaded', function() {
    const analysisOptions = document.querySelector('.analysis-options');
    const title = document.querySelector('.analysis-options-title');

    // Only add click handler on mobile devices
    if (window.innerWidth <= 768) {
        title.addEventListener('click', function() {
            analysisOptions.classList.toggle('active');
        });
    }
});




let searchTimeout;
let currentQuery = '';
let searchResults = []; // Store the original search results


function highlightText(text, query) {
    if (!query) return text;
    const regex = new RegExp(`(${query})`, 'gi');
    return text.replace(regex, '<span class="highlight">$1</span>');
}

// =================== highlightText ====================



// =================== applyAnalysis ====================
function applyAnalysis(results) {
    // Replace 'ب' with 'ا'
    let modifiedResults = results.map(aya => {

        let modifiedText = aya.text.replace(/ىٰ/g, 'ا');

        modifiedText = modifiedText.replace(/ٰ/g, 'ا');

        // Replace characters with shadda and diacritic
        modifiedText = replaceShadda(modifiedText);


        modifiedText = replaceFirstAlifWithHamza(modifiedText);


        modifiedText = removeAlifFromWords(modifiedText);


        modifiedText = replaceHamzaWithMadd(modifiedText);


        modifiedText = removeAlifBeforeSukoon(modifiedText);


        // Add sukoon to letters that do not have any diacritic
        modifiedText = addSukoonToBareLetters(modifiedText);



        // Remove all sukoons from the text
        // modifiedText = removeSukoon(modifiedText);


        return {
            ...aya,
            text: modifiedText
        };
    });

    return modifiedResults;
}


// Function to add sukoon to letters that don't have a diacritic
function addSukoonToBareLetters(text) {
    return text.replace(/([\u0621-\u064A])(?=\s|$|[\u0621-\u064A])/g, (match, letter) => {
        // Check if the letter is followed by a diacritic
        return letter + 'ْ';
    });
}

function replaceShadda(text) {
    return text.replace(/([^\s])ّ/g, (match, p1) => {
        // Duplicate the consonant and add the diacritic (vowel)
        // Example: "دُّ" -> "ددُ"
        return p1 + p1 + match.slice(2); // p1 is the consonant, match.slice(1) is the diacritic
    });
}


function removeSukoon(text) {

    return text.replace(/ْ/g, '');
}


// Function to process the first word based on conditions
function replaceFirstAlifWithHamza(text) {
    let words = text.split(' '); // Split text into words
    if (words.length === 0) return text; // Return if empty

    let firstWord = words[0];

    // Case 1: If first word starts with "الْ" (with sukoon), replace "ا" with "ءَ"
    if (firstWord.startsWith('ال')) {
        words[0] = 'ءَ' + firstWord.slice(1);
    }
    // Case 2: If first word starts with "ال" (without sukoon), remove "ال"
    // else if (firstWord.startsWith('ال')) {
    //     words[0] = firstWord.slice(2);
    // }

    return words.join(' '); // Join words back into a single string
}


// Function to remove the first "ا" from each word except the first word
// Function to process words by removing "ال" or modifying "ألْ"
function removeAlifFromWords(text) {
    // Split the ayah into words
    let words = text.split(' ');

    // Loop through each word, starting from the second word
    for (let i = 1; i < words.length; i++) {
        let word = words[i];

        // Case 1: If word starts with "ألْ" (with sukoon), remove only "ا"
        if (word.startsWith('الْ')) {
            words[i] = 'لْ' + word.slice(2);
        }
        // Case 2: If word starts with "ال" (without sukoon), remove "ال" completely
        else if (word.startsWith('ال')) {
            words[i] = word.slice(2);
        }
    }

    // Join the words back into a string and return it
    return words.join(' ');
}


function replaceHamzaWithMadd(text) {
    return text.replace(/أَ/g, 'ءَ').replace(/أُ/g, 'ءُ').replace(/إِِ/g, 'ءِ');
}

function removeAlifBeforeSukoon(text) {
    return text.replace(/ا([^\s])ْ/g, '$1ْ');
}




function replaceMaqsouraWithAlef(text) {
    return text.replace(/ٰ/g, 'ا');
}



// =================== applyAnalysis ====================


// ===================== Fetch Results =======================
function fetchResults(query, page = 1) {
    if (query === '') return;

    $('#loader').show();
    $('#results, #pagination, #result-count').empty();

    $.ajax({
        url: '/search',
        type: 'GET',
        data: {
            query: query,
            page: page
        },
        success: function(response) {
            $('#loader').hide();
            searchResults = response.data; // Store the original search results
            searchResultsTextClean = response.clean_data; // Store clean search results

            // Save the results in both formats
            currentSearchResults = searchResults; // Store original results
            currentSearchResultsClean = searchResultsTextClean; // Store clean results

            // Display total number of search results
            $('#result-count').html(`
                <p>عدد النتائج في القران الكريم المشكّل: <strong>${response.total_results_count}</strong></p>
                <p>عدد النتائج في القران الكريم غير المشكّل: <strong>${response.total_clean_results_count}</strong></p>
            `);



            if (searchResults.length === 0) {
                $('#results').html('<div class="no-results">لا توجد نتائج</div>');
                return;
            }

            // Display the correct results based on the toggle state
            displayResults(isCleanText ? currentSearchResultsClean : currentSearchResults);

            // Handle pagination
            $('#pagination').empty();

            if (response.current_page > 1) {
                $('#pagination').append(`
                    <button id="prev-page"  data-page="${response.current_page - 1}" class="pagination-btn">
                        السابق
                    </button>
                `);
            }

            if (response.current_page < response.last_page) {
                $('#pagination').append(`
                    <button id="next-page" data-page="${response.current_page + 1}" class="pagination-btn">
                        التالي
                    </button>
                `);
            }
        },
        error: function() {
            $('#loader').hide();
            $('#results').html('<div class="no-results">حدث خطأ في البحث</div>');
        }
    });
}
// ===================== Fetch Results =======================





// ========================= Display Results =========================
function displayResults(results) {
    $('#results').empty();

    results.forEach(aya => {
        const highlightedText = highlightText(aya.text, currentQuery);
        $('#results').append(`
            <li>
                <div class="sura-name">${aya.sura_name}</div>
                <span class="aya-number">آية ${aya.aya}</span>
                <div class="aya-text">${highlightedText}</div>
                <button class="ayah-analysis-btn" data-query="${aya.text}" data-aya-id="${aya.index}">تحليل الاية</button>
                <div class="analysis-result" id="analysis-result-${aya.index}"></div>
            </li>
        `);
    });
}
let isCleanText = false; // Track whether clean text is being displayed
let currentSearchResults = []; // To store the current search results in original format
let currentSearchResultsClean = []; // To store the current search results in clean format

$(document).ready(function() {
    // Handle search input
    $('#search').on('input', function() {
        const query = $(this).val().trim();

        clearTimeout(searchTimeout);

        if (query === currentQuery) return;
        currentQuery = query;

        if (query.length === 0) {
            $('#results, #pagination').empty();
            return;
        }

        searchTimeout = setTimeout(() => {
            fetchResults(query);
        }, 300);
    });

    // Handle the "تحليل" button click
    $('#analysis-btn').on('click', function() {
        if (searchResults.length === 0) return;

        // Show the analysis text container with a smooth animation
        $('#analysis-text-container').addClass('show').html(`
            <h3>تحليل نتائج البحث</h3>
        <ul class="list-group">
        <li class="list-group-item">✅ تم استبدال الألف الخنجرية بالألف العادية</li>
        <li class="list-group-item">✅ تم استبدال الشدة وحركتها بحرف ساكن وحرف متحرك</li>
        <li class="list-group-item">✅ تمت اضافة السكون على جميع الاحرف غير المتحركة</li>
        <li class="list-group-item">✅ تم استبدال همزء القطع بهمزة بهمزة نبرة وازالة همزات الوصل بما يتناسب مع اللفظ</li>
        </ul>
        `);

        const modifiedResults = applyAnalysis(
            searchResults); // Apply analysis (replace ب with ا and shadda transformation)
        currentSearchResults = modifiedResults; // Save modified results
        displayResults(modifiedResults); // Display the modified results
    });

    // Handle the toggle button click for Quran text
    $('#quran-btn').on('click', function() {
        if (!isCleanText) return; // If already showing original text, do nothing
        isCleanText = false;
        displayResults(currentSearchResults); // Display the original search results
        $(this).addClass('active');
        $('#quran-text-clean-btn').removeClass('active');
    });

    // Handle the toggle button click for Quran clean text
    $('#quran-text-clean-btn').on('click', function() {
        if (isCleanText) return; // If already showing clean text, do nothing
        isCleanText = true;
        displayResults(currentSearchResultsClean); // Display the clean text search results
        $(this).addClass('active');
        $('#quran-btn').removeClass('active');
    });

    // Handle pagination
    $(document).on('click', '#next-page', function() {
        let nextPage = $(this).data('page');
        fetchResults(currentQuery, nextPage);
    });

    $(document).on('click', '#prev-page', function() {
        let prevPage = $(this).data('page');
        fetchResults(currentQuery, prevPage);
    });
});
// ========================= Display Results =========================


// ============ Select all from ceckboxes ============
document.addEventListener("DOMContentLoaded", function() {
    const selectAllCheckbox = document.getElementById("select-all");
    const categoryCheckboxes = document.querySelectorAll(".category-checkbox");

    selectAllCheckbox.addEventListener("change", function() {
        categoryCheckboxes.forEach(checkbox => {
            checkbox.checked = selectAllCheckbox.checked;
        });
    });

    categoryCheckboxes.forEach(checkbox => {
        checkbox.addEventListener("change", function() {
            if (!this.checked) {
                selectAllCheckbox.checked =
                    false; // Uncheck "جميع الأدوات" if any checkbox is unchecked
            } else if (Array.from(categoryCheckboxes).every(cb => cb.checked)) {
                selectAllCheckbox.checked = true; // Check "جميع الأدوات" if all are checked
            }
        });
    });
});
// ============ Select all from ceckboxes ============

// =========== ayah analysis button handling ===========
$(document).ready(function() {
    // Track which branches are currently open
    const openBranches = new Set();

    // Prevent event handlers from being attached multiple times
    $(document).off('click', '.branch');
    $(document).off('click', '.phoneme-details-btn');

    // Select all checkbox functionality
    $('#select-all').change(function() {
        $('.category-checkbox').prop('checked', $(this).prop('checked'));
    });

    // Ayah analysis button click handler
    $(document).on('click', '.ayah-analysis-btn', function() {
        const query = $(this).data('query');
        const ayaId = $(this).data('aya-id');

        // Capture selected categories
        const selectedCategories = [];
        $('.checkbox-container input:checked').each(function() {
            if ($(this).data('category-id')) {
                selectedCategories.push($(this).data('category-id'));
            }
        });

        $('#loader').show();
        $('#analysis-result-' + ayaId).empty();

        $.ajax({
            url: '/analyze-ayah-results/' + ayaId,
            type: 'GET',
            data: {
                query: query,
                aya_id: ayaId,
                categories: selectedCategories
            },
            success: function(response) {
                $('#loader').hide();
                const analysisContainer = $('#analysis-result-' + ayaId);
                console.log(response); // عرض الاستجابة في الكونسول لفحص الهيكلة الجديدة

                const results = response.results || {}; // تأكد من أن النتائج ليست فارغة

                if (Object.keys(results).length === 0) {
                    showToast('لا توجد نتائج للتحليل.','error');
                    analysisContainer.html('<p>لا توجد نتائج للتحليل.</p>');
                } else {
                    // Create tree structure with unique IDs
                    let resultHtml =
                        '<div class="analysis-tree"><ul class="tree-root"><li>';
                    resultHtml += '<span class="branch" data-branch-id="root-branch-' +
                        ayaId + '">نتائج التحليل</span>';
                    resultHtml += '<ul class="branch-children" id="root-branch-' + ayaId +
                        '">';

                    // Add each category as a branch
                    let categoryIndex = 0;
                    for (const category in results) {
                        const categoryId = 'category-' + ayaId + '-' + categoryIndex;

                        resultHtml += `<li class="new-branch">
                                    <span class="branch" data-branch-id="${categoryId}">
                                        ${category}
                                        <div class="branch-tooltip">انقر للتوسيع</div>
                                    </span>
                                    <ul class="branch-children" id="${categoryId}">`;

                        // Add results as child branches
                        results[category].forEach((result, resultIndex) => {
                            const resultId =
                                `result-${ayaId}-${categoryIndex}-${resultIndex}`;
                            const matchedWords = result.matched_words ? result
                                .matched_words.join('، ') : '';

                            resultHtml += `<li class="new-branch">
                                        <span class="branch" data-branch-id="${resultId}">
                                            ${result.name}
                                            <div class="branch-tooltip">في كلمات: ${matchedWords}</div>
                                        </span>
                                        <ul class="branch-children" id="${resultId}">`;

                            // Add definition and matched words details
                            if (result.definition) {
                                resultHtml += `<li><div class="result-detail">
                                            <strong>التعريف:</strong> ${result.definition}
                                        </div></li>`;
                            }

                            if (matchedWords) {
                                resultHtml += `<li><div class="result-detail">
                                            <strong>الكلمات المطابقة:</strong> ${matchedWords}
                                        </div></li>`;
                            }

                            resultHtml += `<li><div class="result-detail">
                                        <button class="phoneme-details-btn" data-matched-words="${result.name}" data-detail-id="phoneme-${ayaId}-${categoryIndex}-${resultIndex}">تفاصيل الحرف</button>
                                        <div class="phoneme-details-container" id="phoneme-${ayaId}-${categoryIndex}-${resultIndex}"></div>
                                    </div></li>`;

                            resultHtml += `</ul></li>`;
                        });

                        resultHtml += `</ul></li>`;
                        categoryIndex++;
                    }

                    resultHtml += '</ul></li></ul></div>';
                    analysisContainer.html(resultHtml);

                    // Initially ensure all branch children are hidden
                    $('.branch-children').hide();

                    // Show the main results container
                    analysisContainer.fadeIn();

                    // Initialize the event handlers
                    initBranchHandlers();
                }
            },
            error: function(response) {
                console.log(response);
                $('#loader').hide();
                showToast('حدث خطأ أثناء تحليل الآية', 'error');
            }
        });
    });

    // Initialize branch click handlers
    function initBranchHandlers() {
        // Branch toggle functionality - separate from document event handler
        $('.branch').off('click').on('click', function(e) {
            e.stopPropagation(); // Stop event bubbling

            const branchId = $(this).data('branch-id');
            if (branchId) {
                const childrenContainer = $('#' + branchId);

                if (childrenContainer.is(':visible')) {
                    childrenContainer.slideUp(300);
                    openBranches.delete(branchId);
                } else {
                    childrenContainer.slideDown(300);
                    openBranches.add(branchId);
                }
            }
        });

        // Phoneme details button click handler
        $(document).on('click', '.phoneme-details-btn', function() {
            const matchedWords = $(this).data('matched-words');
            const detailsContainer = $(this).next('.phoneme-details-container');

            // Hide details if already shown
            if (detailsContainer.is(':visible')) {
                detailsContainer.empty().hide();
                return;
            }

            // Show loader while fetching data
            detailsContainer.html('<div class="loading-indicator">جاري تحميل التفاصيل...</div>').show();

            // Loop through the matched words (e.g., "بس") and split into individual Arabic letters
            // const arabicText = matchedWords.replace(/[^ء-ي]/g, ''); // Only Arabic letters
            const letters = matchedWords.split(''); // Split the matched words into letters

            // Loop through each letter to fetch phoneme details
            const phonemeDetailsPromises = letters
                .filter(letter => /^[ء-ي]$/.test(letter)) // التأكد من أن الحرف عربي فقط
                .map(letter => getPhonemeDetailsForLetter(letter));


            // Wait for all AJAX requests to complete
            Promise.all(phonemeDetailsPromises)
                .then(results => {
                    // Render the phoneme details
                    const phonemeHtml = results.map(phoneme => {
                        return `
                <div class="phoneme-detail-card">
                    <div class="phoneme-header">
                        <span class="phoneme-letter">${phoneme.letter}</span>
                        <div class="phoneme-basic-info">
                            <div class="info-row"><span class="info-label">IPA:</span> ${phoneme.ipa}</div>
                            <div class="info-row"><span class="info-label">النوع:</span> ${phoneme.type}</div>
                            <div class="info-row"><span class="info-label">مكان النطق:</span> ${phoneme.place_of_articulation}</div>
                        </div>
                    </div>
                    <div class="phoneme-details">
                        <div class="info-row"><span class="info-label">طريقة النطق:</span> ${phoneme.manner_of_articulation}</div>
                        <div class="info-row"><span class="info-label">التأثيرات الصوتية:</span> ${phoneme.sound_effects}</div>
                        <div class="info-row"><span class="info-label">التعريف:</span> ${phoneme.notes}</div>
                        <div class="info-row"><span class="info-label">التصنيف:</span> ${phoneme.articulation_arabic_name}</div>
                    </div>
                </div>
                `;
                    }).join('');

                    detailsContainer.html(phonemeHtml);
                })
                .catch(error => {
                    detailsContainer.html(
                        '<div class="error-message">حدث خطأ أثناء تحميل التفاصيل.</div>');
                });
        });
    }

    // Show toast notification function
    function showToast(message, type = 'success') {
        const toast = document.createElement('div');
        toast.className = `alert alert-${type}`;
        toast.innerHTML = `
                    <span class="alert-icon">${type === 'success' ? '✔️' : '❌'}</span>
                    <span>${message}</span>
                `;

        const container = document.body;
        container.appendChild(toast);

        setTimeout(() => {
            toast.remove();
        }, 6000);
    }
});
// // Phoneme details button click handler
// $(document).on('click', '.phoneme-details-btn', function() {
//     const matchedWords = $(this).data('matched-words');
//     const detailsContainer = $(this).next('.phoneme-details-container');

//     // Hide details if already shown
//     if (detailsContainer.is(':visible')) {
//         detailsContainer.empty().hide();
//         return;
//     }

//     // Show loader while fetching data
//     detailsContainer.html('<p>جاري تحميل التفاصيل...</p>').show();

//     // Loop through the matched words (e.g., "بس") and split into individual Arabic letters
//     // const arabicText = matchedWords.replace(/[^ء-ي]/g, ''); // Only Arabic letters
//     const letters = matchedWords.split(''); // Split the matched words into letters

//     // Loop through each letter to fetch phoneme details
//     const phonemeDetailsPromises = letters.map(letter => {
//         return getPhonemeDetailsForLetter(letter);
//    t

//     // Wait for all AJAX requests to complete
//     Promise.all(phonemeDetailsPromises)
//         .then(results => {
//             // Render the phoneme details
//             const phonemeHtml = results.map(phoneme => {
//                 return `
//                    <div class="tree">
//         <ul>
//             <li>
//                 <span class="branch">
//                     الحرف: ${phoneme.letter}
//                 </span>
//                 <ul>
//                     <li>
//                         <span class="branch">
//                             IPA: ${phoneme.ipa}
//                         </span>
//                     </li>
//                     <li>
//                         <span class="branch">
//                             النوع: ${phoneme.type}
//                         </span>
//                     </li>
//                     <li>
//                         <span class="branch">
//                             مكان النطق: ${phoneme.place_of_articulation}
//                         </span>
//                     </li>
//                 </ul>
//             </li>
//         </ul>
//         <ul>
//             <li>
//                 <span class="branch">
//                     طريقة النطق: ${phoneme.manner_of_articulation}
//                 </span>
//             </li>
//             <li>
//                 <span class="branch">
//                     التأثيرات الصوتية: ${phoneme.sound_effects}
//                 </span>
//             </li>
//             <li>
//                 <span class="branch">
//                     التعريف: ${phoneme.notes}
//                 </span>
//             </li>
//             <li>
//                 <span class="branch">
//                     التصنيف: ${phoneme.articulation_arabic_name}
//                 </span>
//             </li>
//         </ul>
//     </div>
//                 `;
//             }).join('');

//             detailsContainer.html(phonemeHtml);
//         })
//         .catch(error => {
//             detailsContainer.html('<p>حدث خطأ أثناء تحميل التفاصيل.</p>');
//         });
// });

// Helper function to get phoneme details for each letter
function getPhonemeDetailsForLetter(letter) {
    return new Promise((resolve, reject) => {
        // alert(resolve);
        // Send AJAX request to fetch the Arabic letter ID from the arabic_letters table
        $.ajax({
            url: '/get-arabic-letter-id', // Endpoint to get the Arabic letter ID
            type: 'GET',
            data: {
                letter: letter
            },
            success: function(response) {
                console.log('response => '); // Log the response to confirm the structure
                console.log(response); // Log the response to confirm the structure
                if (response.error) {
                    reject('لم يتم العثور على تفاصيل الحرف');
                } else {
                    // Now, send another request to get the phoneme details using the Arabic letter ID
                    const letterId = response.letter_id;
                    // alert('121212121212121');
                    $.ajax({
                        url: '/get-phoneme-details', // Endpoint to get phoneme details by letter ID
                        type: 'GET',
                        data: {
                            letter_id: letterId
                        },
                        success: function(phonemeResponse) {
                            // alert(phonemeResponse);
                            console.log(
                                'phonemeResponse =>  '
                                ); // Log the response to confirm the structure
                            console.log(
                                phonemeResponse
                                ); // Log the response to confirm the structure

                            if (phonemeResponse.error) {
                                alert('Erorr 1');
                                reject('لم يتم العثور على تفاصيل الحرف');
                            } else {
                                // Assuming phonemeResponse is an array or an object of phoneme details
                                const firstLetter = phonemeResponse[0] ||
                                    phonemeResponse; // Retrieve the first element if it's an array

                                // Now, check if the first letter exists and has the required properties
                                const phoneme = firstLetter;
                                console.log("phoneme => ");
                                console.log(phoneme);
                                resolve({
                                    letter: phoneme.letter || 'N/A',
                                    ipa: phoneme.ipa || 'N/A',
                                    type: phoneme.type || 'N/A',
                                    place_of_articulation: phoneme
                                        .place_of_articulation || 'N/A',
                                    manner_of_articulation: phoneme
                                        .manner_of_articulation || 'N/A',
                                    sound_effects: phoneme.sound_effects ||
                                        'N/A',
                                    notes: phoneme.notes || 'N/A',
                                    articulation_arabic_name: phoneme
                                        .articulation_arabic_name || 'N/A'
                                });
                            }
                        },
                        error: function() {
                            alert('Erorr 2');
                            reject('حدث خطأ أثناء تحميل التفاصيل');
                        }
                    });


                }
            },
            error: function() {
                alert('Erorr 3');
                reject('حدث خطأ أثناء تحميل التفاصيل');
            }
        });
    });
}
</script>
</body>

</html>