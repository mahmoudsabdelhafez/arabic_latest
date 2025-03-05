<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تفاصيل الصوتية</title>
    <link
        href="https://fonts.googleapis.com/css2?family=Amiri:wght@400;700&family=Aref+Ruqaa:wght@400;700&family=Cairo:wght@400;600;700&display=swap"
        rel="stylesheet">
    <style>
    :root {
        --primary-color: #234B6E;
        --primary-light: rgba(35, 75, 110, 0.1);
        --secondary-color: #3A7E71;
        --secondary-light: rgba(58, 126, 113, 0.1);
        --accent-color: #C17B3F;
        --accent-light: rgba(193, 123, 63, 0.1);
        --text-color: #2b2b2b;
        --text-light: #666;
        --white: #ffffff;
        --light-bg: #f9f9fc;
        --gradient-start: #234B6E;
        --gradient-end: #3A7E71;
        --border-radius: 12px;
        --box-shadow: 0 8px 30px rgba(0, 0, 0, 0.08);
        --transition: all 0.3s ease;
    }

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        font-family: 'Cairo', 'Amiri', serif;
        line-height: 1.7;
        background: linear-gradient(135deg, #f5f7fa 0%, #e4e9f2 100%);
        color: var(--text-color);
        min-height: 100vh;
        padding-bottom: 3rem;
    }

    header {
        background: linear-gradient(45deg, var(--gradient-start), var(--gradient-end));
        padding: 2.5rem 2rem;
        position: relative;
        overflow: hidden;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.15);
        margin-bottom: 2.5rem;
        border-bottom-left-radius: 30px;
        border-bottom-right-radius: 30px;
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
        font-size: 2.5rem;
        text-align: center;
        font-family: 'Aref Ruqaa', serif;
        position: relative;
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2);
    }

    .container {
        max-width: 1000px;
        margin: 0 auto;
        padding: 0 1.5rem;
    }

    .section {
        background: var(--white);
        border-radius: var(--border-radius);
        padding: 2.5rem;
        box-shadow: var(--box-shadow);
        margin-bottom: 2.5rem;
        animation: fadeIn 0.5s ease;
        position: relative;
        overflow: hidden;
    }



    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(20px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .section h2 {
        color: var(--primary-color);
        margin-bottom: 1.8rem;
        font-size: 2rem;
        font-family: 'Aref Ruqaa', serif;
        position: relative;
        padding-bottom: 0.85rem;
    }

    .section h2::after {
        content: '';
        position: absolute;
        bottom: 0;
        right: 0;
        width: 80px;
        height: 4px;
        background: linear-gradient(45deg, var(--gradient-start), var(--gradient-end));
        border-radius: 2px;
    }

    .card {
        background-color: var(--light-bg);
        border-radius: var(--border-radius);
        padding: 2rem;
        margin-bottom: 2rem;
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.05);
        border-right: 4px solid var(--accent-color);
        transition: var(--transition);
    }

    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 12px 30px rgba(0, 0, 0, 0.1);
    }

    .card-title {
        color: var(--primary-color);
        font-size: 1.7rem;
        margin-bottom: 1.2rem;
        font-family: 'Aref Ruqaa', serif;
    }

    .card p {
        margin-bottom: 0.8rem;
        font-size: 1.15rem;
    }

    .card strong {
        color: var(--primary-color);
        font-weight: 600;
    }

    .section-title {
        color: var(--primary-color);
        font-size: 1.8rem;
        margin: 2.5rem 0 1.5rem;
        padding-bottom: 0.7rem;
        border-bottom: 2px solid var(--secondary-color);
        font-family: 'Aref Ruqaa', serif;
        position: relative;
        display: inline-block;
    }

    .section-title::after {
        content: '';
        position: absolute;
        bottom: -2px;
        right: 0;
        width: 40%;
        height: 2px;
        background-color: var(--accent-color);
    }

    .list-group {
        border-radius: var(--border-radius);
        overflow: hidden;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
        list-style-type: none;
        padding: 0;
    }

    .list-group-item {
        background-color: white;
        border: none;
        border-bottom: 1px solid rgba(0, 0, 0, 0.1);
        padding: 1.5rem;
        transition: var(--transition);
        position: relative;
    }

    .list-group-item::before {
        content: '';
        position: absolute;
        top: 0;
        right: 0;
        bottom: 0;
        width: 5px;
        background-color: transparent;
        transition: var(--transition);
    }

    .list-group-item:hover::before {
        background-color: var(--accent-color);
    }

    .list-group-item:last-child {
        border-bottom: none;
    }

    .list-group-item:hover {
        background-color: var(--light-bg);
        transform: translateX(-8px);
    }

    .list-group-item strong {
        color: var(--primary-color);
        display: inline-block;
        min-width: 160px;
        font-weight: 600;
    }

    .list-group-item p {
        margin-bottom: 0.7rem;
        font-size: 1.1rem;
    }

    .list-group-item p:last-child {
        margin-bottom: 0;
    }

    .back-button {
        display: inline-block;
        padding: 0.8rem 1.8rem;
        background: linear-gradient(45deg, var(--primary-color), var(--secondary-color));
        color: var(--white);
        text-decoration: none;
        border-radius: var(--border-radius);
        margin: 2rem 0;
        transition: var(--transition);
        font-family: 'Cairo', 'Amiri', serif;
        border: none;
        cursor: pointer;
        font-size: 1.1rem;
        font-weight: 600;
        box-shadow: 0 4px 10px rgba(35, 75, 110, 0.3);
    }

    .back-button:hover {
        transform: translateX(-8px);
        box-shadow: 0 6px 15px rgba(35, 75, 110, 0.4);
    }

    /* Animation for list items */
    @keyframes slideIn {
        from {
            opacity: 0;
            transform: translateX(20px);
        }

        to {
            opacity: 1;
            transform: translateX(0);
        }
    }

    .list-group-item {
        animation: slideIn 0.3s ease forwards;
        opacity: 0;
    }

    .list-group-item:nth-child(1) {
        animation-delay: 0.1s;
    }

    .list-group-item:nth-child(2) {
        animation-delay: 0.2s;
    }

    .list-group-item:nth-child(3) {
        animation-delay: 0.3s;
    }

    .list-group-item:nth-child(4) {
        animation-delay: 0.4s;
    }

    .list-group-item:nth-child(5) {
        animation-delay: 0.5s;
    }

    /* Badge for phonetic symbol */
    .phonetic-symbol {
        display: inline-block;
        padding: 0.3rem 0.8rem;
        background-color: var(--accent-light);
        color: var(--accent-color);
        border-radius: 30px;
        font-size: 1.3rem;
        margin-right: 1rem;
        vertical-align: middle;
        font-weight: bold;
    }

    /* Labels */
    .label {
        display: inline-block;
        padding: 0.25rem 0.75rem;
        border-radius: 30px;
        font-size: 0.9rem;
        font-weight: 600;
        margin-right: 0.5rem;
        vertical-align: middle;
    }

    .label-primary {
        background-color: var(--primary-light);
        color: var(--primary-color);
    }

    .label-secondary {
        background-color: var(--secondary-light);
        color: var(--secondary-color);
    }

    .label-accent {
        background-color: var(--accent-light);
        color: var(--accent-color);
    }

    /* Card grid for responsive layout */
    .card-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
        gap: 1.5rem;
        margin-top: 1.5rem;
    }

    /* Print button */
    .print-button {
        position: fixed;
        bottom: 2rem;
        left: 2rem;
        background-color: var(--white);
        color: var(--primary-color);
        border: 2px solid var(--primary-color);
        border-radius: 50%;
        width: 60px;
        height: 60px;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        box-shadow: var(--box-shadow);
        transition: var(--transition);
        z-index: 100;
    }

    .print-button:hover {
        background-color: var(--primary-color);
        color: var(--white);
    }

    .print-icon {
        font-size: 1.5rem;
    }

    /* Filter styles */
    .filter-container {
        background-color: var(--light-bg);
        padding: 1.2rem;
        border-radius: var(--border-radius);
        margin-bottom: 1.5rem;
        display: flex;
        flex-wrap: wrap;
        align-items: center;
        gap: 1rem;
        border-right: 4px solid var(--secondary-color);
    }

    .filter-label {
        font-weight: 600;
        color: var(--primary-color);
        font-size: 1.1rem;
        margin-left: 0.5rem;
    }

    .filter-search {
        flex: 1;
        min-width: 200px;
        padding: 0.7rem 1rem;
        border: 2px solid rgba(0, 0, 0, 0.1);
        border-radius: 30px;
        font-family: 'Cairo', 'Amiri', serif;
        font-size: 1rem;
        transition: var(--transition);
        outline: none;
    }

    .filter-search:focus {
        border-color: var(--secondary-color);
        box-shadow: 0 0 0 3px var(--secondary-light);
    }

    .filter-button {
        padding: 0.5rem 1.2rem;
        background-color: var(--secondary-color);
        color: white;
        border: none;
        border-radius: 30px;
        cursor: pointer;
        transition: var(--transition);
        font-family: 'Cairo', 'Amiri', serif;
        font-weight: 600;
    }

    .filter-button:hover {
        background-color: var(--primary-color);
        transform: translateY(-2px);
    }

    .filter-chips {
        display: flex;
        flex-wrap: wrap;
        gap: 0.5rem;
        margin-top: 1rem;
    }

    .filter-chip {
        padding: 0.3rem 0.8rem;
        background-color: var(--primary-light);
        color: var(--primary-color);
        border-radius: 20px;
        font-size: 0.9rem;
        cursor: pointer;
        transition: var(--transition);
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .filter-chip:hover {
        background-color: var(--primary-color);
        color: white;
    }

    .filter-chip-active {
        background-color: var(--primary-color);
        color: white;
    }

    .filter-chip-clear {
        background-color: var(--accent-light);
        color: var(--accent-color);
    }

    .filter-chip-clear:hover {
        background-color: var(--accent-color);
        color: white;
    }

    .chip-remove {
        font-size: 1.2rem;
        line-height: 0.8;
    }

    .hidden {
        display: none;
    }

    .no-results {
        padding: 2rem;
        text-align: center;
        background-color: var(--light-bg);
        border-radius: var(--border-radius);
        margin: 1rem 0;
        color: var(--text-light);
        font-size: 1.1rem;
    }

    /* Highlight matching text */
    .highlight {
        background-color: #FFEB3B;
        padding: 0 3px;
        border-radius: 3px;
    }

    /* Count badge */
    .results-count {
        background-color: var(--primary-color);
        color: white;
        border-radius: 20px;
        padding: 0.2rem 0.7rem;
        font-size: 0.9rem;
        margin-right: 0.5rem;
    }

    @media (max-width: 768px) {
        .section {
            padding: 1.5rem;
        }

        header {
            padding: 1.8rem 1rem;
        }

        header h1 {
            font-size: 1.8rem;
        }

        .card {
            padding: 1.2rem;
        }

        .list-group-item {
            padding: 1.2rem;
        }

        .section-title {
            font-size: 1.5rem;
        }

        .card-title {
            font-size: 1.4rem;
        }

        .list-group-item strong {
            min-width: 120px;
        }

        .card-grid {
            grid-template-columns: 1fr;
        }

        .filter-container {
            flex-direction: column;
            align-items: stretch;
        }

        .filter-search {
            width: 100%;
        }
    }

    @media print {
        body {
            background: white;
            font-size: 12pt;
        }

        header {
            background: white;
            color: black;
            padding: 1rem;
            box-shadow: none;
        }

        header h1 {
            color: var(--primary-color);
            text-shadow: none;
        }

        .section {
            box-shadow: none;
            margin-bottom: 1rem;
            page-break-inside: avoid;
        }

        .back-button,
        .print-button,
        .filter-container {
            display: none;
        }
    }
    </style>
</head>

<body>
    <header>
        <h1>تفاصيل الصوتية للحرف : {{ $phoneme->char }}</h1>
    </header>

    <div class="container">
        <button class="back-button" onclick="window.history.back()">
            <span>&#8592;</span> العودة للخلف
        </button>

        <section class="section">
            <div class="card">
                <h3 class="card-title">
                    <span class="phonetic-symbol">{{ $phoneme->Symbol }}</span>
                    الحرف: {{ $phoneme->char }}
                </h3>

                <p><strong>الرمز الموحد:</strong>
                    <span class="label label-primary">{{ $phoneme->unicode_hex }}</span>
                </p>
                <p><strong>الجهر:</strong>
                    <span class="label label-secondary">{{ $phoneme->Voicing }}</span>
                </p>
                <p><strong>المخرج والصفة:</strong> {{ $phoneme->PlaceManner }}</p>
                <p><strong>المدة:</strong>
                    <span class="label label-accent">{{ $phoneme->Duration }}</span>
                </p>
                <p><strong>تاريخ الإضافة:</strong> {{ $phoneme->TimestampCreated }}</p>
            </div>

            <h3 class="section-title">الوظائف الصرفية</h3>

            <div class="filter-container">
                <div>
                    <span class="filter-label">البحث في التأثير الكتابي:</span>
                </div>
                <input type="text" id="filter-input" class="filter-search" placeholder="اكتب كلمة للبحث...">
                <button id="filter-button" class="filter-button">بحث</button>

                <div class="filter-chips">
                    <div class="filter-chip filter-chip-all filter-chip-active" data-filter="all">
                        الكل <span class="results-count" id="all-count">0</span>
                    </div>
                    <div class="filter-chip filter-chip-clear" id="clear-filter">
                        مسح البحث <span class="chip-remove">×</span>
                    </div>
                </div>
            </div>

            <div id="no-results" class="no-results hidden">
                لا توجد نتائج مطابقة للبحث
            </div>

            <ul class="list-group" id="morphological-list">
                @foreach($phoneme->morphologicalFunction as $morphFunction)
                <li class="list-group-item" data-function-type="{{ $morphFunction->function_type }}">
                    <p><strong>التأثير الكتابي:</strong> <span
                            class="searchable-text">{{ $morphFunction->function_type }}</span></p>
                    <p><strong>الشكل مع الحركات:</strong> {{ $morphFunction->description }}</p>
                    <p><strong>الأمثلة:</strong> {{ $morphFunction->example }}</p>
                </li>
                @endforeach
            </ul>

            <h3 class="section-title">تأثيرات الجذر الصوتي</h3>

            <div class="filter-container">
                <div>
                    <span class="filter-label">البحث في موقع الجذر:</span>
                </div>
                <input type="text" id="root-effect-filter-input" class="filter-search"
                    placeholder="اكتب موقع الجذر للبحث...">
                <button id="root-effect-filter-button" class="filter-button">بحث</button>

                <div class="filter-chips">
                    <div class="filter-chip filter-chip-all filter-chip-active" data-filter="all">
                        الكل <span class="results-count" id="root-effect-all-count">0</span>
                    </div>
                    <div class="filter-chip filter-chip-clear" id="root-effect-clear-filter">
                        مسح البحث <span class="chip-remove">×</span>
                    </div>
                </div>
            </div>

            <div id="root-effect-no-results" class="no-results hidden">
                لا توجد نتائج مطابقة للبحث
            </div>

            <ul class="list-group" id="root-effect-list">
                @foreach($phoneme->phonemeRootEffect as $rootEffect)
                <li class="list-group-item" data-position="{{ $rootEffect->position_in_root }}">
                    <p><strong>الموقع في الجذر:</strong>
                        <span class="label label-primary searchable-text">{{ $rootEffect->position_in_root }}</span>
                    </p>
                    <p><strong>التأثير على التصريف:</strong> {{ $rootEffect->effect_on_inflection }}</p>
                    <p><strong>التغيرات على التصريف:</strong> {{ $rootEffect->morphological_changes }}</p>
                    <p><strong>الأمثلة التوضيحية:</strong> {{ $rootEffect->illustrative_examples }}</p>
                </li>
                @endforeach
            </ul>

            <h3 class="section-title">الميزات الدلالية للصوتية</h3>
            <ul class="list-group">
                @foreach($phoneme->phonemeSemanticFeature as $semanticFeature)
                <li class="list-group-item">
                    <p>
                        @if($semanticFeature->harakat)
                        <strong>نوع التشكيل : </strong> {{ $semanticFeature->harakat->name }}
                        @else
                        <strong>نوع التشكيل : </strong> No associated harakat.
                        @endif
                    </p>
                    <p><strong>الموقع:</strong>
                        <span class="label label-secondary">{{ $semanticFeature->position }}</span>
                    </p>
                    <p><strong>التأثير الدلالي:</strong> {{ $semanticFeature->semantic_effect }}</p>
                    <p><strong>الشرح:</strong> {{ $semanticFeature->explanation }}</p>
                </li>
                @endforeach
            </ul>

            <h3 class="section-title">الوظائف الدلالية</h3>
            <ul class="list-group">
                @foreach($phoneme->semanticFunction as $semanticFunction)
                <li class="list-group-item">
                    <p><strong>الحرف:</strong> {{ $semanticFunction->category }}</p>
                    <p><strong>تحول المعنى:</strong> {{ $semanticFunction->description }}</p>
                    <p><strong>الأمثلة:</strong> {{ $semanticFunction->example }}</p>
                </li>
                @endforeach
            </ul>
        </section>

        <button class="back-button" onclick="window.history.back()">
            <span>&#8592;</span> العودة للخلف
        </button>
    </div>

    <button onclick="window.print()" class="print-button" title="طباعة الصفحة">
        <span class="print-icon">&#128424;</span>
    </button>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        // Generalized filter function for lists
        function createFilterFunctionality(config) {
            const {
                filterInputId,
                filterButtonId,
                clearFilterId,
                listId,
                noResultsId,
                allCountId,
                filterChipsContainer
            } = config;

            const filterInput = document.getElementById(filterInputId);
            const filterButton = document.getElementById(filterButtonId);
            const clearFilterButton = document.getElementById(clearFilterId);
            const listItems = document.querySelectorAll(`#${listId} .list-group-item`);
            const noResultsElement = document.getElementById(noResultsId);
            const allCountElement = document.getElementById(allCountId);
            const chipsContainer = document.querySelector(filterChipsContainer);

            // Update the count of all items
            allCountElement.textContent = listItems.length;

            // Function to perform filtering
            function performFilter() {
                const searchTerm = filterInput.value.trim().toLowerCase();
                let matchCount = 0;

                if (searchTerm === '') {
                    // If search is empty, show all items
                    listItems.forEach(item => {
                        item.classList.remove('hidden');

                        // Remove any existing highlights
                        const searchableText = item.querySelector('.searchable-text');
                        searchableText.innerHTML = searchableText.textContent;
                    });

                    noResultsElement.classList.add('hidden');
                    matchCount = listItems.length;
                } else {
                    // Filter and highlight the matching items
                    listItems.forEach(item => {
                        const textElement = item.querySelector('.searchable-text');
                        const text = textElement.textContent.toLowerCase();

                        if (text.includes(searchTerm)) {
                            item.classList.remove('hidden');
                            matchCount++;

                            // Highlight the matching text
                            const regex = new RegExp(`(${searchTerm})`, 'gi');
                            textElement.innerHTML = textElement.textContent.replace(
                                regex, '<span class="highlight">$1</span>'
                            );
                        } else {
                            item.classList.add('hidden');
                        }
                    });

                    // Show or hide no results message
                    if (matchCount === 0) {
                        noResultsElement.classList.remove('hidden');
                    } else {
                        noResultsElement.classList.add('hidden');
                    }
                }

                // Update the count
                allCountElement.textContent = matchCount;

                // Toggle active class on filter chips
                const allChip = chipsContainer.querySelector('.filter-chip-all');
                if (searchTerm === '') {
                    allChip.classList.add('filter-chip-active');
                } else {
                    allChip.classList.remove('filter-chip-active');
                }
            }

            // Search button click handler
            filterButton.addEventListener('click', performFilter);

            // Enter key handler in search input
            filterInput.addEventListener('keyup', function(event) {
                if (event.key === 'Enter') {
                    performFilter();
                }
            });

            // Clear filter handler
            clearFilterButton.addEventListener('click', function() {
                filterInput.value = '';
                performFilter();
            });

            // Generate dynamic filter chips
            const filterTypes = new Set();
            listItems.forEach(item => {
                const filterValue = item.getAttribute('data-function-type') ||
                    item.getAttribute('data-position');
                if (filterValue) {
                    filterTypes.add(filterValue);
                }
            });

            // Create chips for common types
            filterTypes.forEach(type => {
                const chip = document.createElement('div');
                chip.className = 'filter-chip';
                chip.textContent = type;
                chip.setAttribute('data-filter-value', type);

                chip.addEventListener('click', function() {
                    filterInput.value = type;
                    performFilter();
                });

                chipsContainer.appendChild(chip);
            });

            // Ensure list items animate in properly
            listItems.forEach(item => {
                item.style.opacity = '0';
                setTimeout(() => {
                    item.style.opacity = '1';
                }, 100);
            });
        }

        // Initialize filter for morphological functions
        createFilterFunctionality({
            filterInputId: 'filter-input',
            filterButtonId: 'filter-button',
            clearFilterId: 'clear-filter',
            listId: 'morphological-list',
            noResultsId: 'no-results',
            allCountId: 'all-count',
            filterChipsContainer: '.filter-chips'
        });

        // Initialize filter for root effects
        createFilterFunctionality({
            filterInputId: 'root-effect-filter-input',
            filterButtonId: 'root-effect-filter-button',
            clearFilterId: 'root-effect-clear-filter',
            listId: 'root-effect-list',
            noResultsId: 'root-effect-no-results',
            allCountId: 'root-effect-all-count',
            filterChipsContainer: '#root-effect-filter-input ~ .filter-chips'
        });
    });
    </script>
</body>

</html>