<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>إدارة الروابط العربية</title>
    <link
        href="https://fonts.googleapis.com/css2?family=Noto+Kufi+Arabic:wght@400;700&family=Amiri:wght@400;700&display=swap"
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
    </style>
</head>

<body>
    <header class="header">
        <h1>إدارة الروابط العربية</h1>
    </header>

    <div class="container">
        <section class="filter-section">
            <h2 class="filter-title">تصفية الروابط</h2>

            <div class="filter-options">
                <button class="filter-category active">الكل</button>
                <button class="filter-category">روابط العطف</button>
                <button class="filter-category">روابط الشرط</button>
                <button class="filter-category">روابط السببية</button>
                <button class="filter-category">روابط الاستدراك</button>
                <button class="filter-category">روابط التوكيد</button>
            </div>

            <input type="text" class="search-box" placeholder="ابحث عن رابط...">

            <div class="active-filters mt-2"></div>
        </section>

        <section class="content-section mt-3">
            <div class="section-header mb-3">
                <h2>قائمة الروابط</h2>
                <button class="btn btn-primary" onclick="openAddModal()">إضافة رابط جديد</button>
            </div>

            <div class="grid-container">
                @foreach($connectives as $connective)
                <div class="content-card" data-categories="{{ $connective->categories }}">
                    <h3>{{ $connective->name }}</h3>
                    <div class="main-description">
                        <p><strong>النطق:</strong> {{ $connective->pronunciation }}</p>
                        <p><strong>المعنى:</strong> {{ $connective->meaning }}</p>
                        <p><strong>الأدوات:</strong> {{ $connective->category->arabic_name }}</p>
                        <p><strong>التعريف:</strong> {{ $connective->definition }}</p>

                        <!-- Syntactic Effect Section -->
                        <div class="effect-section">
                            <div class="effect-title">التأثير النحوي</div>
                            <div class="effect-content">
                                <div class="effect-item">
                                    <p><strong>يطبق على:</strong> {{ $connective->syntacticEffect->applied_on }}</p>
                                </div>
                                <div class="effect-item">
                                    <p><strong>الحالة الناتجة:</strong> {{ $connective->syntacticEffect->result_case }}
                                    </p>
                                </div>
                                @if($connective->syntacticEffect->context_condition)
                                <div class="effect-item">
                                    <p><strong>شروط السياق:</strong>
                                        {{ $connective->syntacticEffect->context_condition }}</p>
                                </div>
                                @endif
                                @if($connective->syntacticEffect->priority_order)
                                <div class="effect-item">
                                    <p><strong>ترتيب الأولوية:</strong>
                                        {{ $connective->syntacticEffect->priority_order }}</p>
                                </div>
                                @endif
                            </div>
                        </div>

                        <!-- Semantic Logical Effect Section -->
                        <div class="effect-section">
                            <div class="effect-title">التأثير الدلالي المنطقي</div>
                            <div class="effect-content">
                                <div class="effect-item">
                                    <p><strong>العلاقة النموذجية:</strong>
                                        {{ $connective->semanticLogicalEffect->typical_relation }}</p>
                                </div>
                                <div class="effect-item">
                                    <p><strong>نوع النسبة:</strong>
                                        {{ $connective->semanticLogicalEffect->nisbah_type }}</p>
                                </div>
                                <div class="effect-item">
                                    <p><strong>الأدوار الدلالية:</strong>
                                        {{ $connective->semanticLogicalEffect->semantic_roles }}</p>
                                </div>
                                @if($connective->semanticLogicalEffect->conditions)
                                <div class="effect-item">
                                    <p><strong>الشروط:</strong> {{ $connective->semanticLogicalEffect->conditions }}</p>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="action-buttons">
                        <button class="btn btn-edit" onclick="openEditModal({{ $connective->id }})">
                            تعديل
                        </button>
                        <form action="{{ route('connectives.destroy', $connective->id) }}" method="POST"
                            class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-delete"
                                onclick="return confirm('هل أنت متأكد من الحذف؟')">
                                حذف
                            </button>
                        </form>
                    </div>
                </div>
                @endforeach
            </div>
        </section>
    </div>

    <!-- Modal Template -->
    <div id="editModal" class="modal">
        <div class="modal-content">
            <h2 class="mb-3">تعديل الرابط</h2>
            <form id="editForm" method="POST">
                @csrf
                @method('PUT')

                <!-- Basic Information -->
                <div class="grid-2">
                    <div class="form-group">
                        <label for="name">الاسم</label>
                        <input type="text" class="form-control" id="name" name="name">
                    </div>
                    <div class="form-group">
                        <label for="pronunciation">النطق</label>
                        <input type="text" class="form-control" id="pronunciation" name="pronunciation">
                    </div>
                </div>

                <!-- Syntactic Effect Fields -->
                <h3 class="form-section-title">التأثير النحوي</h3>
                <div class="grid-2">
                    <div class="form-group">
                        <label for="applied_on">يطبق على</label>
                        <input type="text" class="form-control" id="applied_on" name="syntactic_effect[applied_on]">
                    </div>
                    <div class="form-group">
                        <label for="result_case">الحالة الناتجة</label>
                        <input type="text" class="form-control" id="result_case" name="syntactic_effect[result_case]">
                    </div>
                </div>
                <div class="form-group">
                    <label for="context_condition">شروط السياق</label>
                    <textarea class="form-control" id="context_condition"
                        name="syntactic_effect[context_condition]"></textarea>
                </div>
                <div class="form-group">
                    <label for="priority_order">ترتيب الأولوية</label>
                    <input type="text" class="form-control" id="priority_order" name="syntactic_effect[priority_order]">
                </div>

                <!-- Semantic Logical Effect Fields -->
                <h3 class="form-section-title">التأثير الدلالي المنطقي</h3>
                <div class="grid-2">
                    <div class="form-group">
                        <label for="typical_relation">العلاقة النموذجية</label>
                        <input type="text" class="form-control" id="typical_relation"
                            name="semantic_effect[typical_relation]">
                    </div>
                    <div class="form-group">
                        <label for="nisbah_type">نوع النسبة</label>
                        <input type="text" class="form-control" id="nisbah_type" name="semantic_effect[nisbah_type]">
                    </div>
                </div>
                <div class="form-group">
                    <label for="semantic_roles">الأدوار الدلالية</label>
                    <textarea class="form-control" id="semantic_roles"
                        name="semantic_effect[semantic_roles]"></textarea>
                </div>
                <div class="form-group">
                    <label for="conditions">الشروط</label>
                    <textarea class="form-control" id="conditions" name="semantic_effect[conditions]"></textarea>
                </div>

                <div class="action-buttons">
                    <button type="submit" class="btn btn-edit">حفظ التغييرات</button>
                    <button type="button" class="btn btn-delete" onclick="closeModal()">إلغاء</button>
                </div>
            </form>
        </div>
    </div>

    <script>
    // Insert the JavaScript code from the previous artifact here
    // State management
    const state = {
        currentFilters: new Set(),
        searchTerm: '',
        activeConnective: null
    };

    // Constants
    const FILTER_TYPES = {
        ALL: 'الكل',
        CONJUNCTION: 'روابط العطف',
        CONDITION: 'روابط الشرط',
        CAUSATIVE: 'روابط السببية',
        EXCEPTION: 'روابط الاستدراك',
        EMPHASIS: 'روابط التوكيد'
    };

    // Utility functions
    const debounce = (func, wait) => {
        let timeout;
        return function executedFunction(...args) {
            const later = () => {
                clearTimeout(timeout);
                func(...args);
            };
            clearTimeout(timeout);
            timeout = setTimeout(later, wait);
        };
    };

    // Filter management
    class FilterManager {
        constructor() {
            this.filterContainer = document.querySelector('.filter-options');
            this.activeFiltersContainer = document.querySelector('.active-filters');
            this.searchBox = document.querySelector('.search-box');
            this.setupEventListeners();
        }

        setupEventListeners() {
            // Filter buttons
            this.filterContainer.addEventListener('click', (e) => {
                if (e.target.classList.contains('filter-category')) {
                    this.handleFilterClick(e.target);
                }
            });

            // Search functionality
            this.searchBox.addEventListener('input', debounce((e) => {
                state.searchTerm = e.target.value.trim().toLowerCase();
                this.applyFilters();
            }, 300));

            // Active filter tags
            this.activeFiltersContainer.addEventListener('click', (e) => {
                if (e.target.classList.contains('filter-tag')) {
                    this.removeFilter(e.target);
                }
            });
        }

        handleFilterClick(button) {
            const filterValue = button.textContent;

            if (filterValue === FILTER_TYPES.ALL) {
                state.currentFilters.clear();
                this.updateFilterButtons();
                this.updateFilterTags();
            } else {
                if (state.currentFilters.has(filterValue)) {
                    state.currentFilters.delete(filterValue);
                } else {
                    state.currentFilters.add(filterValue);
                }
            }

            this.updateFilterButtons();
            this.updateFilterTags();
            this.applyFilters();
        }

        updateFilterButtons() {
            const buttons = this.filterContainer.querySelectorAll('.filter-category');
            buttons.forEach(button => {
                const isActive = button.textContent === FILTER_TYPES.ALL ?
                    state.currentFilters.size === 0 :
                    state.currentFilters.has(button.textContent);
                button.classList.toggle('active', isActive);
            });
        }

        updateFilterTags() {
            this.activeFiltersContainer.innerHTML = '';
            state.currentFilters.forEach(filter => {
                const tag = document.createElement('div');
                tag.className = 'filter-tag';
                tag.textContent = `${filter} ×`;
                this.activeFiltersContainer.appendChild(tag);
            });
        }

        removeFilter(tagElement) {
            const filterText = tagElement.textContent.replace(' ×', '');
            state.currentFilters.delete(filterText);
            this.updateFilterButtons();
            this.updateFilterTags();
            this.applyFilters();
        }

        applyFilters() {
            const cards = document.querySelectorAll('.content-card');

            cards.forEach(card => {
                const cardText = card.textContent.toLowerCase();
                const categories = card.getAttribute('data-categories')?.toLowerCase() || '';

                let matchesFilters = true;
                let matchesSearch = true;

                // Check filters
                if (state.currentFilters.size > 0) {
                    matchesFilters = Array.from(state.currentFilters).some(filter =>
                        categories.includes(filter.toLowerCase())
                    );
                }

                // Check search
                if (state.searchTerm) {
                    matchesSearch = cardText.includes(state.searchTerm);
                }

                card.style.display = (matchesFilters && matchesSearch) ? 'block' : 'none';
            });
        }
    }

    // Modal management
    class ModalManager {
        constructor() {
            this.modal = document.getElementById('editModal');
            this.form = document.getElementById('editForm');
            this.setupEventListeners();
        }

        setupEventListeners() {
            // Close modal on outside click
            window.addEventListener('click', (e) => {
                if (e.target === this.modal) {
                    this.closeModal();
                }
            });

            // Form submission
            this.form.addEventListener('submit', (e) => {
                e.preventDefault();
                this.handleSubmit(e);
            });
        }

        async openModal(id) {
            state.activeConnective = id;

            // التأكد من وجود العناصر
            if (!this.modal || !this.form) {
                console.error("Modal or form not found");
                return;
            }

            this.modal.style.display = 'block';
            this.form.action = `/connectives/${id}`;

            try {
                const response = await fetch(`/connectives/${id}/edit`);
                if (!response.ok) throw new Error('Failed to fetch connective data');

                const data = await response.json();
                this.populateForm(data);
            } catch (error) {
                console.error('Error fetching connective data:', error);
                this.showError('Failed to load connective data');
            }
        }

        closeModal() {
            this.modal.style.display = 'none';
            state.activeConnective = null;

            // إعادة تعيين الحقول
            this.form.reset();

            // إعادة تعيين الحقول النصية (textarea) التي لا تتأثر بـ reset()
            this.form.querySelectorAll('textarea').forEach(textarea => textarea.value = '');
        }

        populateForm(data) {
            if (!data) return;

            // تعبئة الحقول الأساسية
            Object.entries(data).forEach(([key, value]) => {
                const element = document.getElementById(key);
                if (element && (typeof value === 'string' || typeof value === 'number')) {
                    element.value = value;
                }
            });

            // تعبئة الحقول المتداخلة (التأثير النحوي والتأثير الدلالي)
            const effectMappings = {
                syntactic_effect: ['applied_on', 'result_case', 'context_condition', 'priority_order'],
                semantic_logical_effect: ['typical_relation', 'nisbah_type', 'semantic_roles', 'conditions']
            };

            Object.entries(effectMappings).forEach(([effectType, fields]) => {
                // console.log(data);
                if (data[effectType]) {
                    fields.forEach(field => {
                        const element = document.getElementById(field);
                        if (element && (typeof data[effectType][field] === 'string' || typeof data[
                                effectType][field] === 'number')) {
                            element.value = data[effectType][field];
                        }
                    });
                }
            });
        }



        async handleSubmit(event) {
    event.preventDefault();
    
    // Convert FormData to JSON
    const formData = new FormData(this.form);
    let jsonObject = {};

    formData.forEach((value, key) => {
        const keys = key.split('[').map(k => k.replace(']', ''));
        if (keys.length > 1) {
            if (!jsonObject[keys[0]]) jsonObject[keys[0]] = {};
            jsonObject[keys[0]][keys[1]] = value;
        } else {
            jsonObject[key] = value;
        }
    });
    console.log(jsonObject);
    try {
        const response = await fetch(this.form.action, {
            method: 'PUT',
            body: JSON.stringify(jsonObject), // Send JSON
            headers: {
                'Content-Type': 'application/json', // Set correct content type
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
            }
        });

        const result = await response.json();

        if (!response.ok) {
            console.error('Validation errors:', result);
            throw new Error('Submission failed');
        }

        this.closeModal();
        window.location.reload(); // Refresh to show updated data
    } catch (error) {
        console.error('Error submitting form:', error);
        this.showError('Failed to save changes');
    }
}





        showError(message) {
            // Implement error notification
            alert(message);
        }
    }

    // Initialize the application
    document.addEventListener('DOMContentLoaded', () => {
        const filterManager = new FilterManager();
        const modalManager = new ModalManager();

        // Make modalManager available globally for onclick handlers
        window.openEditModal = (id) => modalManager.openModal(id);
        window.closeModal = () => modalManager.closeModal();
    });
    </script>
</body>

</html>