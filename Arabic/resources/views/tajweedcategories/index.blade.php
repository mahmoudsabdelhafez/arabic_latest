<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>فئات التجويد</title>
    <link href="https://fonts.googleapis.com/css2?family=Amiri:wght@400;700&family=Aref+Ruqaa:wght@400;700&display=swap" rel="stylesheet">
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
            box-shadow: 0 4px 12px rgba(0,0,0,0.15);
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

        .container {
            max-width: 1000px;
            margin: 40px auto;
            padding: 20px;
        }

        .category {
            background: var(--white);
            margin-bottom: 25px;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .category:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(0,0,0,0.15);
        }

        .category-header {
            background: linear-gradient(45deg, var(--primary-color), var(--secondary-color));
            color: var(--white);
            padding: 25px 30px;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: space-between;
            font-size: 1.4rem;
            font-weight: bold;
            position: relative;
            overflow: hidden;
        }

        .category-header::after {
            content: '▼';
            font-size: 0.8em;
            transition: transform 0.3s ease;
        }

        .category.active .category-header::after {
            transform: rotate(180deg);
        }

        .category-header::before {
            content: '';
            position: absolute;
            top: 0;
            right: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(120deg, transparent, rgba(255,255,255,0.3), transparent);
            transition: 0.5s;
        }

        .category-header:hover::before {
            right: 100%;
        }

        .subcategories {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.6s ease-in-out;
            background: var(--white);
        }

        .subcategory {
            padding: 20px 30px;
            margin: 15px;
            background: rgba(242, 242, 242, 0.8);
            border-radius: 12px;
            transition: all 0.3s ease;
            border-right: 4px solid transparent;
        }

        .subcategory:hover {
            background: rgba(58, 126, 113, 0.1);
            border-right-color: var(--secondary-color);
            padding-right: 35px;
        }

        .subcategory a {
            text-decoration: none;
            color: var(--text-color);
            display: block;
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

        .footer::before {
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
            .container {
                padding: 15px;
                margin: 20px auto;
            }

            header h1 {
                font-size: 2.2rem;
            }

            .category-header {
                font-size: 1.2rem;
                padding: 20px 25px;
            }
        }
    </style>
</head>
<body>
    <header>
        <h1>فئات التجويد</h1>
    </header>

    <div class="container">
        @foreach($categories as $categoryName => $subcategories)
            <div class="category">
                <div class="category-header" onclick="toggleCategory(this)">
                    {{ $categoryName }}
                </div>
                <div class="subcategories">
                    @foreach($subcategories as $subcategory)
                        <div class="subcategory">
                            <a href="{{ route('tajweedcategories.show', $subcategory->id) }}">
                                {{ $subcategory->name }}
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        @endforeach
    </div>

    <footer class="footer">
        <p>جميع الحقوق محفوظة © ٢٠٢٤ فئات التجويد</p>
    </footer>

    <script>
        function toggleCategory(element) {
            const category = element.parentElement;
            const subcategories = element.nextElementSibling;
            const isOpen = category.classList.contains('active');
            
            // Close all categories
            document.querySelectorAll('.category').forEach(cat => {
                cat.classList.remove('active');
                cat.querySelector('.subcategories').style.maxHeight = null;
            });

            // Open clicked category if it wasn't open
            if (!isOpen) {
                category.classList.add('active');
                subcategories.style.maxHeight = subcategories.scrollHeight + "px";
            }
        }

        // Open first category by default
        document.addEventListener('DOMContentLoaded', function() {
            const firstCategory = document.querySelector('.category');
            if (firstCategory) {
                const header = firstCategory.querySelector('.category-header');
                toggleCategory(header);
            }
        });
    </script>
</body>
</html>