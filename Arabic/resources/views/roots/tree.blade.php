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

    header {
        background: linear-gradient(135deg, var(--gradient-start), var(--gradient-end));
        padding: 1.5rem 2rem;
        position: relative;
        box-shadow: var(--shadow-md);
        overflow: hidden;
    }

    .header-content {
        max-width: 1200px;
        margin: 0 auto;
        display: flex;
        justify-content: space-between;
        align-items: center;
        position: relative;
        z-index: 2;
    }

    header::before {
        content: '';
        position: absolute;
        inset: 0;
        background:
            radial-gradient(circle at 20% 50%, rgba(255, 255, 255, 0.12) 0%, transparent 50%),
            radial-gradient(circle at 80% 50%, rgba(255, 255, 255, 0.12) 0%, transparent 50%);
        opacity: 0.8;
    }

    header::after {
        content: '';
        position: absolute;
        inset: 0;
        background: linear-gradient(45deg, rgba(255, 255, 255, 0.08) 25%, transparent 25%);
        background-size: 3px 3px;
        opacity: 0.5;
    }

    header h1 {
        color: var(--white);
        font-size: 2.5rem;
        margin: 0;
        text-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
        position: relative;
        font-weight: bold;
    }

    .back-button {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        padding: 0.75rem 1.5rem;
        background: rgba(255, 255, 255, 0.15);
        color: var(--white);
        text-decoration: none;
        border-radius: var(--border-radius);
        border: 1px solid rgba(255, 255, 255, 0.2);
        backdrop-filter: blur(8px);
        transition: all 0.3s ease;
        font-size: 1.1rem;
    }

    .back-button:hover {
        background: rgba(255, 255, 255, 0.25);
        transform: translateX(-5px);
        border-color: rgba(255, 255, 255, 0.3);
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    }

    .back-button::before {
        content: '←';
        font-size: 1.2em;
        margin-left: 0.5rem;
    }

    @media (max-width: 768px) {
        header {
            padding: 1.25rem 1rem;
        }

        .header-content {
            flex-direction: column;
            gap: 1rem;
            text-align: center;
        }

        header h1 {
            font-size: 2rem;
        }

        .back-button {
            padding: 0.6rem 1.2rem;
            font-size: 1rem;
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

    header h1 {
        color: var(--white);
        font-size: 2.5rem;
        text-align: center;
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2);
        margin: 0;
        position: relative;
    }

    .body {
        display: flex;
        min-height: 82vh;
    }

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
        margin-top: 20px;
        content: '';
        position: absolute;
        top: 20px;
        width: 50%;
        height: 2px;
        background: linear-gradient(to bottom, var(--gradient-start), var(--gradient-end));
        right: 0;
    }

    .tree li:first-child::after {
        right: 50%;
        width: 50%;
    }

    .tree li:last-child::after {
        left: 50%;
        width: 50%;
    }

    .tree li:only-child::after {
        display: none;
    }

    .tree li::before {
        content: '';
        position: absolute;
        top: 0px;
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
        transition: all var(--transition-speed);
        white-space: nowrap;
        z-index: 10;
    }

    .branch:hover .branch-tooltip {
        opacity: 1;
        visibility: visible;
        transform: translateX(-50%) translateY(-5px);
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

    a.branch {
        color: var(--primary-color);
    }

    a.branch:hover {
        text-decoration: none;
        color: var(--white);
    }

    @media (max-width: 768px) {
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
    }

    .alert {
        padding: 1rem;
        border-radius: 8px;
        margin-bottom: 1rem;
        display: flex;
        align-items: center;
        gap: 0.75rem;
        position: fixed;
        bottom: 2rem;
        right: 2rem;
        z-index: 1000;
        animation: slideIn 0.5s ease forwards, fadeOut 0.5s ease 5.5s forwards;
        box-shadow: var(--shadow-md);
        max-width: 300px;
    }

    .alert-success {
        background-color: #def7ec;
        color: #03543f;
        border-left: 4px solid #03543f;
    }

    .alert-error {
        background-color: #fde8e8;
        color: #9b1c1c;
        border-left: 4px solid #9b1c1c;
    }

    .alert-icon {
        font-size: 1.5rem;
    }

    @keyframes slideIn {
        from {
            transform: translateX(100%);
            opacity: 0;
        }

        to {
            transform: translateX(0);
            opacity: 1;
        }
    }

    @keyframes fadeOut {
        from {
            opacity: 1;
        }

        to {
            opacity: 0;
        }
    }
    </style>
</head>

<body>
    <div class="progress-indicator"></div>

    <header>
        <div class="header-content">
            <h1>شجرة الجذر</h1>
            <a href="/" class="back-button">الرئيسية</a>
        </div>
    </header>
    <div class="alert-container">@if(session('error'))
        <div class="alert alert-error">
            {{ session('error') }}
        </div>
        @endif
    </div>



    <div class="body">
        <div class="main-container">

            <main class="main-content">

                <div class="tree-container">
                    <div class="tree">
                        <li>
                            <span class="branch" data-branch-id="{{ $root->id }}">{{ $root->type_name }}</span>
                            <ul class="branch-children-{{ $root->id }}"></ul>
                        </li>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <div class="toast-container"></div>

    <script>
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

    $(document).ready(function() {
        let loadedBranches = new Set();

        function handleBranchClick(event) {
            event.stopPropagation();
            const branch = $(this);

            if (branch.is('a')) {
                return true;
            }

            const parentId = branch.data("branch-id");
            const branchDataContainer = $(".branch-children-" + parentId);

            if (!loadedBranches.has(parentId)) {
                showLoader();
                $.ajax({
                    url: '/root/tree/' + parentId,
                    method: 'GET',
                    success: function(data) {
                        if (Array.isArray(data) && data.length > 0) {
                            let branchHtml = '<ul>';
                            data.forEach(item => {
                                const isLeafNode = !item.parent_id || item.is_parent === 0;
                                const uniqueId =
                                    `${item.id}-${Date.now()}-${Math.random().toString(36).substr(2, 9)}`;

                                branchHtml += `<li class="new-branch">`;

                                if (isLeafNode) {
                                    branchHtml += `
                                    <a href="/verb/${item.id}" class="branch" data-branch-id="${uniqueId}">
                                        ${item.arabic_name || item.type_name}
                                        <div class="branch-tooltip">
                                            ${item.description || 'انقر للعرض'}
                                        </div>
                                    </a>`;
                                } else {
                                    branchHtml += `
                                    <span class="branch" data-branch-id="${uniqueId}">
                                        ${item.arabic_name || item.type_name}
                                        <div class="branch-tooltip">
                                            ${item.description || 'انقر للتوسيع'}
                                        </div>
                                    </span>`;
                                }

                                branchHtml +=
                                    `<ul class="branch-children-${uniqueId}"></ul></li>`;
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

            branch.addClass('active').siblings().removeClass('active');
        }

        $(document).on('click', '.branch:not(a)', handleBranchClick);

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

    function showAlert(message, type = 'success') {
        const alert = document.createElement('div');
        alert.className = `alert alert-${type}`;
        alert.innerHTML = `
        <span class="alert-icon">${type === 'success' ? '✔️' : '❌'}</span>
        <span>${message}</span>
    `;

        const container = document.body;
        container.appendChild(alert);

        setTimeout(() => {
            alert.remove();
        }, 6000); // Remove after 6 seconds
    }

    // Replace showToast calls with showAlert
    function showToast(message, type = 'success') {
        showAlert(message, type);
    }
    </script>
</body>

</html>