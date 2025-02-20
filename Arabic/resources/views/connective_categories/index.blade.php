{{-- resources/views/connective-categories/index.blade.php --}}
<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ __('Connective Categories') }}</title>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Kufi+Arabic:wght@400;700&family=Amiri&display=swap"
        rel="stylesheet">
    <style>
    :root {
        --primary-color: #234B6E;
        --secondary-color: #3A7E71;
        --accent-color: #C17B3F;
        --text-color: #2b2b2b;
        --white: #ffffff;
        --gray-100: #f7fafc;
        --gray-200: #edf2f7;
        --gray-300: #e2e8f0;
        --shadow-sm: 0 1px 2px rgba(0, 0, 0, 0.05);
        --shadow-md: 0 4px 6px rgba(0, 0, 0, 0.1);
        --shadow-lg: 0 10px 15px rgba(0, 0, 0, 0.1);
        --radius-sm: 0.375rem;
        --radius-md: 0.5rem;
        --radius-lg: 1rem;
    }

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        font-family: 'Noto Kufi Arabic', 'Amiri', sans-serif;
        background-color: var(--gray-100);
        color: var(--text-color);
        line-height: 1.6;
        overflow-x: hidden;
    }

    /* Header Styles */
    .header {
        background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
        padding: 2rem 1rem;
        text-align: center;
        position: relative;
        box-shadow: var(--shadow-lg);
    }

    .header h1 {
        color: var(--white);
        font-size: clamp(1.5rem, 4vw, 2.5rem);
        margin: 0;
        font-weight: 700;
    }

    /* Container */
    .container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 1rem;
    }

    /* Filter Section */
    .filter-section {
        background: var(--white);
        border-radius: var(--radius-lg);
        padding: 1.5rem;
        margin: 1rem auto;
        box-shadow: var(--shadow-md);
    }

    .filter-title {
        color: var(--primary-color);
        font-size: 1.25rem;
        margin-bottom: 1rem;
        font-weight: 700;
    }

    .filter-options {
        display: flex;
        flex-wrap: wrap;
        gap: 0.5rem;
        margin-bottom: 1rem;
    }

    .filter-category {
        padding: 0.5rem 1rem;
        border-radius: var(--radius-md);
        border: 2px solid var(--primary-color);
        background: transparent;
        color: var(--primary-color);
        cursor: pointer;
        font-size: 0.9rem;
        transition: all 0.3s ease;
    }

    .filter-category:hover {
        background: var(--gray-200);
    }

    .filter-category.active {
        background: var(--primary-color);
        color: var(--white);
    }

    /* Search Box */
    .search-box {
        width: 100%;
        padding: 0.75rem 1rem;
        border: 2px solid var(--gray-300);
        border-radius: var(--radius-md);
        font-size: 1rem;
        transition: all 0.3s ease;
    }

    .search-box:focus {
        outline: none;
        border-color: var(--primary-color);
        box-shadow: var(--shadow-sm);
    }

    /* Content Cards */
    .grid-container {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
        gap: 1.5rem;
        margin-top: 2rem;
    }

    .content-card {
        background: var(--white);
        border-radius: var(--radius-lg);
        padding: 1.5rem;
        box-shadow: var(--shadow-md);
        transition: transform 0.3s ease;
    }

    .content-card:hover {
        transform: translateY(-3px);
    }

    .content-card h3 {
        color: var(--primary-color);
        margin-bottom: 1rem;
        font-size: 1.25rem;
    }

    /* Effect Sections */
    .effect-section {
        background: var(--gray-100);
        border-radius: var(--radius-md);
        padding: 1rem;
        margin-top: 1rem;
    }

    .effect-title {
        color: var(--primary-color);
        font-size: 1.1rem;
        margin-bottom: 0.75rem;
        padding-bottom: 0.5rem;
        border-bottom: 2px solid var(--secondary-color);
    }

    .effect-content {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 1rem;
    }

    .effect-item {
        background: var(--white);
        padding: 0.75rem;
        border-radius: var(--radius-sm);
        border-right: 3px solid var(--primary-color);
    }

    /* Modal Styles */
    .modal {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: rgba(0, 0, 0, 0.5);
        z-index: 1000;
    }

    .modal-content {
        background: var(--white);
        width: 90%;
        max-width: 600px;
        margin: 2rem auto;
        padding: 2rem;
        border-radius: var(--radius-lg);
        box-shadow: var(--shadow-lg);
        max-height: 90vh;
        overflow-y: auto;
    }

    /* Form Styles */
    .form-group {
        margin-bottom: 1.5rem;
    }

    .form-group label {
        display: block;
        margin-bottom: 0.5rem;
        color: var(--primary-color);
        font-weight: 500;
    }

    .form-control {
        width: 100%;
        padding: 0.75rem;
        border: 2px solid var(--gray-300);
        border-radius: var(--radius-md);
        font-size: 1rem;
        transition: all 0.3s ease;
    }

    .form-control:focus {
        outline: none;
        border-color: var(--primary-color);
        box-shadow: var(--shadow-sm);
    }

    /* Button Styles */
    .btn {
        padding: 0.75rem 1.5rem;
        border-radius: var(--radius-md);
        border: none;
        cursor: pointer;
        font-weight: 500;
        transition: all 0.3s ease;
    }

    .btn-primary {
        background: var(--primary-color);
        color: var(--white);
    }

    .btn-danger {
        background: #dc3545;
        color: var(--white);
    }

    .btn:hover {
        opacity: 0.9;
        transform: translateY(-1px);
    }

    /* Responsive Adjustments */
    @media (max-width: 768px) {
        .container {
            padding: 0.5rem;
        }

        .grid-container {
            grid-template-columns: 1fr;
        }

        .filter-options {
            flex-direction: column;
        }

        .filter-category {
            width: 100%;
            text-align: center;
        }

        .modal-content {
            width: 95%;
            margin: 1rem auto;
            padding: 1rem;
        }

        .effect-content {
            grid-template-columns: 1fr;
        }
    }

    @media (max-width: 480px) {
        .header h1 {
            font-size: 1.5rem;
        }

        .content-card {
            padding: 1rem;
        }

        .btn {
            width: 100%;
            margin-bottom: 0.5rem;
        }
    }

    /* Utility Classes */
    .mt-1 {
        margin-top: 0.5rem;
    }

    .mt-2 {
        margin-top: 1rem;
    }

    .mt-3 {
        margin-top: 1.5rem;
    }

    .mb-1 {
        margin-bottom: 0.5rem;
    }

    .mb-2 {
        margin-bottom: 1rem;
    }

    .mb-3 {
        margin-bottom: 1.5rem;
    }

    .filter-category {
        padding: 0.5rem 1rem;
        border-radius: var(--radius-md);
        border: 2px solid var(--primary-color);
        background: transparent;
        color: var(--primary-color);
        cursor: pointer;
        font-size: 0.9rem;
        transition: all 0.3s ease;
        font-family: 'Noto Kufi Arabic', 'Amiri', sans-serif;
    }

    .filter-category:hover {
        background: var(--gray-200);
    }

    .filter-category.active {
        background: var(--primary-color);
        color: var(--white);
    }

    /* Add new filter tag styles */
    .active-filters {
        display: flex;
        flex-wrap: wrap;
        gap: 0.5rem;
        margin-top: 1rem;
    }

    .filter-tag {
        display: inline-flex;
        align-items: center;
        background: var(--primary-color);
        color: var(--white);
        padding: 0.25rem 0.75rem;
        border-radius: var(--radius-md);
        font-size: 0.9rem;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .filter-tag:hover {
        background: #1a3a57;
    }
    .back-button {
        display: inline-block;
        padding: 0.5rem 1rem;
        background: linear-gradient(45deg, var(--primary-color), var(--secondary-color));
        color: var(--white);
        text-decoration: none;
        border-radius: 8px;
        margin-bottom: 1.5rem;
        transition: transform 0.3s ease;
    }

    .back-button:hover {
        transform: translateX(-5px);
    }
    </style>

</head>

<body>
    <header class="header">
        <h1>{{ __('أدوات الربط') }}</h1>
    </header>

    <div class="container" dir="rtl">
        <div class="filter-section">
            <h2 class="filter-title">{{ __('الأدوات في اللغة العربية') }}</h2>

            <div class="search-box-container mb-3">
                <input type="text" class="search-box" placeholder="{{ __('ابحث...') }}"
                    id="categorySearch">
            </div>

            <div class="filter-options">
                @foreach($categories as $category)
                <button class="filter-category" data-category="{{ $category->id }}">
                    {{ app()->getLocale() == 'ar' ? $category->arabic_name : $category->arabic_name }}
                </button>
                @endforeach
            </div>

            <div class="active-filters mt-2">
                {{-- Active filters will be dynamically added here --}}
            </div>
        </div>

        <div class="grid-container">
            @foreach($categories as $category)
            <div class="content-card" data-category="{{ $category->id }}">
                <div style="display: flex; justify-content: space-between;">
                    <h3>{{ app()->getLocale() == 'ar' ? $category->arabic_name : $category->arabic_name }}</h3>
                    <a href="/connectives/{{ $category->id }}" class="back-button">عرض</a>

                </div>
                <div class="effect-section">
                    <p>{{ $category->definition }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    {{-- Add Category Modal --}}
    <div class="modal" id="addCategoryModal">
        <div class="modal-content">
            <h2 class="mb-3">{{ __('Add New Category') }}</h2>
            <form action="" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name">{{ __('English Name') }}</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>

                <div class="form-group">
                    <label for="arabic_name">{{ __('Arabic Name') }}</label>
                    <input type="text" class="form-control" id="arabic_name" name="arabic_name" required>
                </div>

                <div class="form-group">
                    <label for="definition">{{ __('Definition') }}</label>
                    <textarea class="form-control" id="definition" name="definition" rows="3"></textarea>
                </div>

                <div class="mt-3">
                    <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
                    <button type="button" class="btn btn-danger" onclick="closeModal()">{{ __('Cancel') }}</button>
                </div>
            </form>
        </div>
    </div>

    <script>
    // Search functionality
    document.getElementById('categorySearch').addEventListener('input', function(e) {
        const searchTerm = e.target.value.toLowerCase();
        const cards = document.querySelectorAll('.content-card');

        cards.forEach(card => {
            const title = card.querySelector('h3').textContent.toLowerCase();
            card.style.display = title.includes(searchTerm) ? 'block' : 'none';
        });
    });

    // Filter functionality
    document.querySelectorAll('.filter-category').forEach(button => {
        button.addEventListener('click', function() {
            this.classList.toggle('active');
            const categoryId = this.dataset.category;

            // Update active filters
            if (this.classList.contains('active')) {
                addActiveFilter(categoryId, this.textContent);
            } else {
                removeActiveFilter(categoryId);
            }

            updateVisibleCards();
        });
    });

    function addActiveFilter(categoryId, text) {
        const activeFilters = document.querySelector('.active-filters');
        const filterTag = document.createElement('div');
        filterTag.className = 'filter-tag';
        filterTag.dataset.category = categoryId;
        filterTag.textContent = text;
        filterTag.onclick = () => removeActiveFilter(categoryId);
        activeFilters.appendChild(filterTag);
    }

    function removeActiveFilter(categoryId) {
        document.querySelector(`.filter-tag[data-category="${categoryId}"]`)?.remove();
        document.querySelector(`.filter-category[data-category="${categoryId}"]`)
            ?.classList.remove('active');
        updateVisibleCards();
    }

    function updateVisibleCards() {
        const activeCategories = Array.from(document.querySelectorAll('.filter-category.active'))
            .map(button => button.dataset.category);

        document.querySelectorAll('.content-card').forEach(card => {
            card.style.display = activeCategories.length === 0 ||
                activeCategories.includes(card.dataset.category) ? 'block' : 'none';
        });
    }

    // Modal functions
    function openModal() {
        document.getElementById('addCategoryModal').style.display = 'block';
    }

    function closeModal() {
        document.getElementById('addCategoryModal').style.display = 'none';
    }
    </script>
</body>

</html>