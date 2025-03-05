<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'الضمائر')</title>
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
        line-height: 1.8;
    }

    header {
        background: linear-gradient(45deg, var(--gradient-start), var(--gradient-end));
        padding: 3rem;
        position: relative;
        overflow: hidden;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        z-index: 900;

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

    header h1 {
        color: var(--white);
        font-size: 3rem;
        text-align: center;
        font-family: 'Aref Ruqaa', serif;
        position: relative;
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2);
    }

    .main-content {
        max-width: 1200px;
        margin: 40px auto;
        padding: 0 20px;
        grid-template-columns: repeat(2, 1fr);
    }

    .section-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 2rem;
    }

    .content-card {
        background: var(--white);
        border-radius: 15px;
        padding: 2rem;
        margin-bottom: 2rem;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
        transition: all 0.3s ease;
    }

    /* .content-card:hover {
        transform: translateY(-3px);
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.12);
    } */

    .effect-section {
        background: #f8fafc;
        border-radius: 12px;
        padding: 1.5rem;
        margin-top: 1.5rem;
        border: 1px solid rgba(35, 75, 110, 0.1);
    }

    .effect-title {
        color: var(--primary-color);
        font-family: 'Aref Ruqaa', serif;
        font-size: 1.3rem;
        margin-bottom: 1rem;
        padding-bottom: 0.5rem;
        border-bottom: 2px solid var(--secondary-color);
    }

    .effect-content {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 1.5rem;
    }

    .effect-item {
        background: var(--white);
        padding: 1rem;
        border-radius: 8px;
        border-right: 4px solid var(--primary-color);
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
    }

    .pronoun-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        /* Add other styling properties as needed */
    }

    .btn {
        padding: 0.8rem 1.5rem;
        border-radius: 10px;
        border: none;
        cursor: pointer;
        font-family: 'Amiri', serif;
        font-size: 1.1rem;
        transition: all 0.3s ease;
    }

    .btn-edit {
        background: linear-gradient(45deg, var(--gradient-start), var(--gradient-end));
        color: var(--white);
    }

    .btn-delete {
        background: #dc3545;
        color: var(--white);
    }

    .modal {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: rgba(0, 0, 0, 0.6);
        backdrop-filter: blur(5px);
        z-index: 1000;
    }

    .modal-content {
        background: var(--white);
        width: 90%;
        max-width: 800px;
        margin: 2rem auto;
        padding: 2.5rem;
        border-radius: 15px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
    }

    .form-group {
        margin-bottom: 1.5rem;
    }

    .form-control {
        width: 100%;
        padding: 1rem;
        border: 2px solid rgba(35, 75, 110, 0.2);
        border-radius: 10px;
        font-family: 'Amiri', serif;
        font-size: 1.1rem;
        transition: all 0.3s ease;
    }

    .form-control:focus {
        border-color: var(--primary-color);
        box-shadow: 0 0 0 3px rgba(35, 75, 110, 0.1);
        outline: none;
    }

    @media (max-width: 768px) {
        header h1 {
            font-size: 2.2rem;
        }

        h3 {
            font-size: medium;
        }

        .effect-content {
            grid-template-columns: 1fr;
        }

        .modal-content {
            width: 95%;
            padding: 1.5rem;
            margin: 1rem auto;
        }

        .btn {
            padding: 0.5rem 0.6rem;
            border-radius: 10px;
            border: none;
            cursor: pointer;
            font-family: 'Amiri', serif;
            font-size: 0.8rem;
            transition: all 0.3s ease;
        }
    }

    @keyframes backgroundMove {
        0% {
            background-position: center, 0 0;
        }

        100% {
            background-position: center, 60px 60px;
        }
    }

    .filter-section {
        background: var(--white);
        border-radius: 15px;
        padding: 1.5rem;
        margin: 2rem auto;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
        max-width: 1200px;
    }

    .filter-title {
        color: var(--primary-color);
        font-family: 'Aref Ruqaa', serif;
        font-size: 1.5rem;
        margin-bottom: 1rem;
    }

    .filter-options {
        display: flex;
        flex-wrap: wrap;
        gap: 1rem;
        margin-bottom: 1rem;
    }

    .filter-category {
        padding: 0.8rem 1.5rem;
        border-radius: 25px;
        border: 2px solid var(--primary-color);
        background: transparent;
        color: var(--primary-color);
        cursor: pointer;
        font-family: 'Amiri', serif;
        font-size: 1.1rem;
        transition: all 0.3s ease;
    }

    .filter-category:hover {
        background: rgba(35, 75, 110, 0.1);
    }

    .filter-category.active {
        background: linear-gradient(45deg, var(--gradient-start), var(--gradient-end));
        color: var(--white);
        border: none;
    }

    .search-box {
        width: 100%;
        padding: 1rem;
        border: 2px solid rgba(35, 75, 110, 0.2);
        border-radius: 10px;
        font-family: 'Amiri', serif;
        font-size: 1.1rem;
        margin-top: 1rem;
        transition: all 0.3s ease;
    }

    .search-box:focus {
        border-color: var(--primary-color);
        box-shadow: 0 0 0 3px rgba(35, 75, 110, 0.1);
        outline: none;
    }

    .filter-tag {
        display: inline-block;
        padding: 0.5rem 1rem;
        background: var(--secondary-color);
        color: var(--white);
        border-radius: 15px;
        margin: 0.25rem;
        font-size: 0.9rem;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .filter-tag:hover {
        background: var(--primary-color);
    }

    .active-filters {
        display: flex;
        flex-wrap: wrap;
        gap: 0.5rem;
        margin-top: 1rem;
        padding: 1rem;
        background: rgba(35, 75, 110, 0.05);
        border-radius: 10px;
    }

    /* Responsive adjustments */
    @media (max-width: 768px) {
        .filter-options {
            flex-direction: column;
        }

        .filter-category {
            width: 100%;
            text-align: center;
        }
    }
    </style>

    <style>
    /* Modal Styles */
    .modal {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: rgba(0, 0, 0, 0.6);
        backdrop-filter: blur(5px);
        z-index: 1000;
        overflow-y: auto;
        padding: 2rem 1rem;
    }

    .modal-content {
        background: var(--white);
        width: 90%;
        max-width: 800px;
        margin: 0 auto;
        padding: 2rem;
        border-radius: 15px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
    }

    .modal-title {
        color: var(--primary-color);
        font-family: 'Aref Ruqaa', serif;
        font-size: 1.8rem;
        margin-bottom: 2rem;
        text-align: center;
        border-bottom: 2px solid var(--secondary-color);
        padding-bottom: 1rem;
    }

    /* Form Section Styles */
    .form-section {
        background: #f8fafc;
        border-radius: 12px;
        padding: 1.5rem;
        margin-bottom: 2rem;
        border: 1px solid rgba(35, 75, 110, 0.1);
    }

    .form-section-title {
        color: var(--primary-color);
        font-family: 'Aref Ruqaa', serif;
        font-size: 1.3rem;
        margin-bottom: 1.5rem;
    }

    .form-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 1.5rem;
    }

    .form-group {
        margin-bottom: 1.5rem;
    }

    .form-group.full-width {
        grid-column: 1 / -1;
    }

    /* Form Controls */
    .form-control {
        width: 100%;
        padding: 0.8rem 1rem;
        border: 2px solid rgba(35, 75, 110, 0.2);
        border-radius: 8px;
        font-family: 'Amiri', serif;
        font-size: 1rem;
        transition: all 0.3s ease;
        background: white;
    }

    .form-control:focus {
        border-color: var(--primary-color);
        box-shadow: 0 0 0 3px rgba(35, 75, 110, 0.1);
        outline: none;
    }

    textarea.form-control {
        resize: vertical;
        min-height: 80px;
    }

    label {
        display: block;
        margin-bottom: 0.5rem;
        color: var(--text-color);
        font-weight: bold;
    }

    /* Form Actions */
    .form-actions {
        display: flex;
        justify-content: flex-end;
        gap: 1rem;
        margin-top: 2rem;
        padding-top: 1rem;
        border-top: 1px solid rgba(35, 75, 110, 0.1);
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .modal-content {
            width: 95%;
            padding: 1.5rem;
        }

        .form-grid {
            grid-template-columns: 1fr;
        }

        .form-actions {
            flex-direction: column;
        }

        .form-actions .btn {
            width: 100%;
        }
    }

    /* Scrollbar Styling */
    .modal-content {
        max-height: 90vh;
        overflow-y: auto;
        scrollbar-width: thin;
        scrollbar-color: var(--secondary-color) #f0f0f0;
    }

    .modal-content::-webkit-scrollbar {
        width: 8px;
    }

    .modal-content::-webkit-scrollbar-track {
        background: #f0f0f0;
        border-radius: 4px;
    }

    .modal-content::-webkit-scrollbar-thumb {
        background: var(--secondary-color);
        border-radius: 4px;
    }
    </style>
    <style>
    .all-connectives-list {
        margin: 10px 0;
        text-align: right;
        display: flex;
        flex-wrap: wrap;
        justify-content: flex-start;
        gap: 8px;
    }

    .connective-tag {
        background: linear-gradient(45deg, var(--gradient-start), var(--gradient-end));
        border-radius: 15px;
        padding: 5px 10px;
        font-size: 14px;
        cursor: pointer;
        color: var(--white);
        transition: background-color 0.3s;
    }

    .connective-tag:hover {
        background-color: #e0e0e0;
    }

    .select-or-add {
        margin-bottom: 8px;
    }

    .mt-2 {
        margin-top: 8px;
    }

    .mb-2 {
        margin-bottom: 8px;
    }

    #parsing_add_container,
    #syntactic_add_container,
    #semantic_add_container {
        background-color: #f9f9f9;
        padding: 10px;
        border-radius: 4px;
        border: 1px solid #e0e0e0;
    }
    </style>

    @yield('styles')
</head>

<body>
    <div class="page-wrapper">
        <header>
            <h1>@yield('header', 'الضمائر')</h1>
        </header>


        <div class="content-wrapper">
            <div class="content-card">
                @yield('content')
            </div>
        </div>
    </div>
    @yield('scripts')
</body>

</html>