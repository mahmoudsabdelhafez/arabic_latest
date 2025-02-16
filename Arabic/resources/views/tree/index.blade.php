<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>شجرة الكلمات - Arabic Word Tree</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <style>
    :root {
        --primary-color: #234B6E;
        --secondary-color: #3A7E71;
        --accent-color: #C17B3F;
        --success-color: #28a745;
        --warning-color: #ffc107;
        --text-color: #2b2b2b;
        --text-light: #6c757d;
        --white: #ffffff;
        --gradient-start: #234B6E;
        --gradient-end: #3A7E71;
        --sidebar-width: 280px;
        --transition-speed: 0.3s;
        --shadow-sm: 0 4px 6px rgba(0, 0, 0, 0.1);
        --shadow-md: 0 4px 12px rgba(0, 0, 0, 0.15);
        --shadow-lg: 0 8px 24px rgba(0, 0, 0, 0.2);
        --border-radius: 12px;
    }

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        font-family: 'Amiri', 'Segoe UI', Tahoma, serif;
        background: linear-gradient(135deg, #f5f7fa 0%, #e4e9f2 100%);
        min-height: 100vh;
        color: var(--text-color);
        direction: rtl;
    }

    /* Header Styles */
    header {
        background: linear-gradient(45deg, var(--gradient-start), var(--gradient-end));
        padding: 2.5rem 2rem;
        position: relative;
        box-shadow: var(--shadow-md);
        overflow: hidden;
    }

    header::before {
        content: '';
        position: absolute;
        inset: 0;
        background:
            radial-gradient(circle at 50% 50%, rgba(255, 255, 255, 0.1) 0%, transparent 60%),
            linear-gradient(45deg, rgba(255, 255, 255, 0.05) 25%, transparent 25%);
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
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2);
        margin: 0;
        position: relative;
    }

    .search-container {
        max-width: 600px;
        margin: 1.5rem auto 0;
        position: relative;
    }

    .search-input {
        width: 100%;
        padding: 1rem 3rem 1rem 1rem;
        border: none;
        border-radius: var(--border-radius);
        background: rgba(255, 255, 255, 0.95);
        font-size: 1.1rem;
        transition: all var(--transition-speed);
        direction: rtl;
    }

    .search-input:focus {
        outline: none;
        box-shadow: var(--shadow-lg);
        background: var(--white);
    }

    .search-icon {
        position: absolute;
        right: 1rem;
        top: 50%;
        transform: translateY(-50%);
        color: var(--text-light);
    }

    /* Main Layout */
    .body {
        display: flex;
        min-height: 82vh;
    }

    /* Sidebar */
    .sidebar {
        width: var(--sidebar-width);
        background: var(--white);
        box-shadow: var(--shadow-sm);
        z-index: 100;
        padding-top: 1rem;
    }

    .nav-item {
        padding: 1rem 1.5rem;
        cursor: pointer;
        transition: all var(--transition-speed);
        margin: 0.5rem 1rem;
        border-radius: var(--border-radius);
        display: flex;
        align-items: center;
        gap: 0.75rem;
    }

    .nav-item:hover {
        background: rgba(35, 75, 110, 0.1);
        color: var(--primary-color);
        transform: translateX(-5px);
    }

    .nav-item.active {
        background: linear-gradient(45deg, var(--gradient-start), var(--gradient-end));
        color: var(--white);
        box-shadow: var(--shadow-sm);
    }

    .nav-icon {
        width: 20px;
        height: 20px;
        opacity: 0.7;
    }

    /* Tree Styles */
    .tree-container {
        display: flex;
        justify-content: center;
        padding: 2rem;
        max-width: 1200px;
        margin: 0 auto;
    }

    .tree {
        display: flex;
        flex-direction: column;
        align-items: center;
        width: 100%;
    }

    .tree ul {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        padding: 20px 0;
        position: relative;
        transition: all 0.3s;
        list-style-type: none;
        margin: 0;
    }

    .tree li {
        display: flex;
        flex-direction: column;
        align-items: center;
        position: relative;
        padding: 0 20px;
        margin: 0;
    }

    .tree li::before,
    .tree li::after {
        content: '';
        position: absolute;
        background: linear-gradient(to bottom, var(--gradient-start), var(--gradient-end));
    }

    .tree li::before {
        top: -20px;
        height: 20px;
        width: 2px;
    }

    .tree ul>li::after {
        top: -20px;
        width: 100%;
        height: 2px;
    }

    .tree li::after {
        content: '';
        position: absolute;
        top: -20px;
        width: 50%;
        /* Changed from 100% to 50% */
        height: 2px;
        background: linear-gradient(to bottom, var(--gradient-start), var(--gradient-end));
        right: 0;
        /* Added to align from the right side */
    }

    /* Add new rule for first child */
    .tree li:first-child::after {
        right: 50%;
        /* Start from middle for first child */
        width: 50%;
    }

    /* Add new rule for last child */
    .tree li:last-child::after {
        left: 50%;
        /* Start from middle for last child */
        width: 50%;
    }

    /* Remove the line for single children */
    .tree li:only-child::after {
        display: none;
    }

    /* Ensure vertical lines are still visible */
    .tree li::before {
        content: '';
        position: absolute;
        top: -20px;
        height: 20px;
        width: 2px;
        background: linear-gradient(to bottom, var(--gradient-start), var(--gradient-end));
    }

    .branch {
        display: inline-block;
        padding: 1rem 1.5rem;
        border-radius: var(--border-radius);
        background: var(--white);
        box-shadow: var(--shadow-sm);
        cursor: pointer;
        transition: all 0.3s ease;
        border: 2px solid var(--primary-color);
        min-width: 150px;
        text-align: center;
        margin: 10px 0;
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
        transition: all var(--transition-speed);
        white-space: nowrap;
        z-index: 10;
    }

    .branch:hover .branch-tooltip {
        opacity: 1;
        visibility: visible;
        transform: translateX(-50%) translateY(-5px);
    }

    /* Animations */
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

    /* Progress Indicator */
    .progress-indicator {
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        height: 3px;
        background: linear-gradient(to right, var(--primary-color), var(--secondary-color));
        transform-origin: 0 50%;
        transform: scaleX(0);
        transition: transform 0.3s ease;
        z-index: 1000;
    }

    .loading .progress-indicator {
        transform: scaleX(1);
    }

    /* Mobile Responsive */
    @media (max-width: 768px) {
        .sidebar {
            position: fixed;
            right: -280px;
            top: 0;
            /* height: 110vh; */
            transition: transform var(--transition-speed);
        }

        .sidebar.active {
            transform: translateX(-280px);
        }

        .tree-container {
            padding: 1rem;
        }

        .branch {
            min-width: 120px;
            padding: 0.8rem 1.2rem;
        }

        header {
            padding: 1.5rem 1rem;
        }

        header h1 {
            font-size: 2rem;
        }

        .search-container {
            margin-top: 1rem;
        }
    }

    /* Overlay */
    .overlay {
        position: fixed;
        inset: 0;
        background: rgba(0, 0, 0, 0.5);
        display: none;
        z-index: 99;
        backdrop-filter: blur(4px);
        transition: opacity var(--transition-speed);
        opacity: 0;
    }

    .overlay.active {
        display: block;
        opacity: 1;
    }

    /* Menu Toggle */
    .menu-toggle {
        position: fixed;
        right: 1rem;
        top: 1rem;
        z-index: 101;
        background: linear-gradient(45deg, var(--gradient-start), var(--gradient-end));
        color: var(--white);
        border: none;
        padding: 0.75rem 1.5rem;
        border-radius: var(--border-radius);
        cursor: pointer;
        display: none;
        font-family: inherit;
        font-size: 1.1rem;
        box-shadow: var(--shadow-sm);
        transition: all var(--transition-speed);
    }

    .menu-toggle:hover {
        transform: translateY(-2px);
        box-shadow: var(--shadow-md);
    }

    @media (max-width: 768px) {
        .menu-toggle {
            display: block;
        }
    }

    /* Toast Notifications */
    .toast-container {
        position: fixed;
        bottom: 2rem;
        right: 2rem;
        z-index: 1000;
    }

    .toast {
        background: var(--white);
        border-radius: var(--border-radius);
        padding: 1rem 1.5rem;
        margin-top: 0.5rem;
        box-shadow: var(--shadow-md);
        display: flex;
        align-items: center;
        gap: 0.75rem;
        animation: toastSlideIn 0.3s ease forwards;
    }

    @keyframes toastSlideIn {
        from {
            transform: translateX(100%);
            opacity: 0;
        }

        to {
            transform: translateX(0);
            opacity: 1;
        }
    }

    .toast-success {
        border-right: 4px solid var(--success-color);
    }

    .toast-warning {
        border-right: 4px solid var(--warning-color);
    }

    .main-container {
        display: flex;
        flex: 1;
    }

    .main-content {
        flex: 1;
        padding: 2rem;
        max-width: 1200px;
        margin: 0 auto;
    }

    a.branch {
        color: var(--primary-color);
    }

    a.branch:hover {
        text-decoration: none;
        color: var(--white);
    }
    </style>
</head>

<body>
    <div class="progress-indicator"></div>

    <header>
        <h1>شجرة الكلمات</h1>
        <!-- <div class="search-container">
            <input type="text" class="search-input" placeholder="ابحث عن كلمة...">
            <span class="search-icon">🔍</span>
        </div> -->
    </header>

    <div class="body">
        <div class="overlay" onclick="toggleSidebar()"></div>
        <button class="menu-toggle" onclick="toggleSidebar()">القائمة</button>
        <div class="main-container">
            <main class="main-content">
                <div class="tree-container">
                    <ul class="tree">
                        <li>
                            <span class="branch" data-id="{{ $root->id }}">{{ $root->type_name }}</span>
                            <ul class="branch-data-{{ $root->id }}"></ul>
                        </li>
                    </ul>
                </div>
            </main>
        </div>
    </div>

    <div class="toast-container"></div>

    <script>
    function toggleSidebar() {
        document.querySelector('.sidebar').classList.toggle('active');
        document.querySelector('.overlay').classList.toggle('active');
    }

    function showToast(message, type = 'success') {
        const toast = document.createElement('div');
        toast.className = `toast toast-${type}`;
        toast.textContent = message;

        const container = document.querySelector('.toast-container');
        container.appendChild(toast);

        setTimeout(() => {
            toast.style.opacity = '0';
            toast.style.transform = 'translateX(100%)';
            setTimeout(() => container.removeChild(toast), 300);
        }, 3000);
    }

    function showLoader() {
        document.body.classList.add('loading');
    }

    function hideLoader() {
        document.body.classList.remove('loading');
    }

    // Search functionality
    const searchInput = document.querySelector('.search-input');
    let searchTimeout;

    // searchInput.addEventListener('input', (e) => {
    //     clearTimeout(searchTimeout);
    //     searchTimeout = setTimeout(() => {
    //         const searchTerm = e.target.value.trim();
    //         if (searchTerm.length >= 2) {
    //             searchWords(searchTerm);
    //         }
    //     }, 300);
    // });

    async function searchWords(term) {
        showLoader();
        try {
            const response = await fetch(`/api/search?term=${encodeURIComponent(term)}`);
            const data = await response.json();

            if (data.length > 0) {
                highlightMatchingBranches(data);
                showToast(`تم العثور على ${data.length} نتيجة`);
            } else {
                showToast('لم يتم العثور على نتائج', 'warning');
            }
        } catch (error) {
            showToast('حدث خطأ في البحث', 'warning');
            console.error('Search error:', error);
        } finally {
            hideLoader();
        }
    }

    function highlightMatchingBranches(matches) {
        document.querySelectorAll('.branch').forEach(branch => {
            branch.style.transition = 'all 0.3s ease';
            branch.style.opacity = '0.5';
        });

        matches.forEach(match => {
            const branch = document.querySelector(`.branch[data-id="${match.id}"]`);
            if (branch) {
                branch.style.opacity = '1';
                branch.scrollIntoView({
                    behavior: 'smooth',
                    block: 'center'
                });
            }
        });

        setTimeout(() => {
            document.querySelectorAll('.branch').forEach(branch => {
                branch.style.opacity = '1';
            });
        }, 2000);
    }

    // Enhanced tree navigation
    $(document).ready(function() {
        let loadedBranches = new Set();

        function handleBranchClick(event) {
            event.stopPropagation();
            const branch = $(this);

            // If this is a link (has href), don't handle as expandable branch
            if (branch.is('a')) {
                return true; // Allow default link behavior
            }

            const parentId = branch.data("id");
            const branchDataContainer = $(".branch-data-" + parentId);

            if (!loadedBranches.has(parentId)) {
                showLoader();
                $.ajax({
                    url: '/tree/branch/' + parentId,
                    method: 'GET',
                    success: function(data) {
                        if (Array.isArray(data) && data.length > 0) {
                            let branchHtml = '<ul>';
                            data.forEach(item => {
                                // Check if item is a leaf node (no parent_id or is_parent = 0)
                                const isLeafNode = !item.parent_id || item.is_parent === 0;

                                branchHtml += `<li class="new-branch">`;

                                if (isLeafNode) {
                                    // Create as link if it's a leaf node
                                    branchHtml += `
                                    <a href="/word/${item.id}" class="branch" data-id="${item.id}">
                                        ${item.arabic_name || item.type_name}
                                        <div class="branch-tooltip">
                                            ${item.description || 'انقر للعرض'}
                                        </div>
                                    </a>`;
                                } else {
                                    // Create as expandable branch if it's a parent node
                                    branchHtml += `
                                    <span class="branch" data-id="${item.id}">
                                        ${item.arabic_name || item.type_name}
                                        <div class="branch-tooltip">
                                            ${item.description || 'انقر للتوسيع'}
                                        </div>
                                    </span>`;
                                }

                                branchHtml +=
                                    `<ul class="branch-data-${item.id}"></ul></li>`;
                            });
                            branchHtml += '</ul>';

                            branchDataContainer
                                .html(branchHtml)
                                .hide()
                                .slideDown({
                                    duration: 300,
                                    complete: function() {
                                        loadedBranches.add(parentId);
                                    }
                                });

                            showToast('تم تحميل الفروع بنجاح');
                        } else {
                            showToast('لا توجد فروع إضافية', 'warning');
                        }
                    },
                    error: function() {
                        showToast('حدث خطأ في تحميل الفروع', 'warning');
                    },
                    complete: function() {
                        hideLoader();
                    }
                });
            } else {
                branchDataContainer.slideToggle(300);
            }

            // Visual feedback
            branch.addClass('active').siblings().removeClass('active');
        }

        // Event delegation for branch clicks
        $(document).on('click', '.branch:not(a)', handleBranchClick);

        // Keyboard navigation
        $(document).on('keydown', function(e) {
            const activeBranch = $('.branch.active');
            if (!activeBranch.length) return;

            switch (e.key) {
                case 'ArrowRight':
                    activeBranch.closest('li').find('> ul > li:first-child .branch').click();
                    break;
                case 'ArrowLeft':
                    activeBranch.closest('ul').closest('li').find('> .branch').click();
                    break;
                case 'ArrowUp':
                    activeBranch.closest('li').prev().find('> .branch').click();
                    break;
                case 'ArrowDown':
                    activeBranch.closest('li').next().find('> .branch').click();
                    break;
            }
        });
    });
    </script>
</body>

</html>