<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>البحث في القرآن الكريم</title>
    <link href="https://fonts.googleapis.com/css2?family=Amiri:wght@400;700&family=Aref+Ruqaa:wght@400;700&display=swap"
        rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
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

    .container {
        max-width: 1300px;
        padding: 20px;
    }

    .search-container {
        background: var(--white);
        border-radius: 20px;
        padding: 25px;
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
        outline: none;
    }

    #search:focus {
        border-color: var(--primary-color);
        box-shadow: 0 0 0 3px rgba(35, 75, 110, 0.1);
    }

    .loader {
        display: none;
        text-align: center;
        padding: 1rem;
    }

    .loader::after {
        content: "";
        display: inline-block;
        width: 30px;
        height: 30px;
        border: 3px solid #f3f3f3;
        border-top: 3px solid var(--primary-color);
        border-radius: 50%;
        animation: spin 1s linear infinite;
    }

    @keyframes spin {
        0% {
            transform: rotate(0deg);
        }

        100% {
            transform: rotate(360deg);
        }
    }

    #results {
        list-style: none;
    }

    #results li {
        background: var(--white);
        margin-bottom: 15px;
        padding: 20px 25px;
        border-radius: 12px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    #results li:hover {
        transform: translateY(-3px);
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
    }

    .sura-name {
        color: var(--primary-color);
        font-weight: bold;
        font-size: 1.2rem;
        font-family: 'Aref Ruqaa', serif;
    }

    .aya-number {
        color: var(--secondary-color);
        font-size: 1rem;
    }

    .aya-text {
        margin-top: 0.8rem;
        line-height: 2;
        font-size: 1.15rem;
    }

    .highlight {
        background-color: rgba(193, 123, 63, 0.2);
        color: var(--accent-color);
        padding: 0 4px;
        border-radius: 4px;
    }

    #pagination {
        margin-top: 2rem;
        text-align: center;
    }

    .pagination-btn {
        padding: 0.8rem 1.5rem;
        margin: 0 0.5rem;
        border: none;
        background: linear-gradient(45deg, var(--gradient-start), var(--gradient-end));
        color: var(--white);
        border-radius: 8px;
        cursor: pointer;
        transition: all 0.3s ease;
        font-family: 'Amiri', serif;
        font-size: 1.1rem;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    }

    .pagination-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(0, 0, 0, 0.15);
    }

    .pagination-btn:disabled {
        background: #bdc3c7;
        cursor: not-allowed;
        transform: none;
    }

    .no-results {
        text-align: center;
        padding: 2rem;
        color: var(--text-color);
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

    @media (max-width: 768px) {
        .container {
            padding: 15px;
            margin: 20px auto;
        }

        header h1 {
            font-size: 2.2rem;
        }

        #search {
            font-size: 1rem;
            padding: 12px 15px;
        }
    }

    .form-group {
        margin-bottom: 1rem;
    }

    .form-group label {
        display: block;
        margin-bottom: 0.5rem;
        font-weight: bold;
        color: var(--text-color);
    }

    .form-group select,
    .form-group input[type="text"],
    .form-group textarea {
        width: 100%;
        padding: 0.8rem;
        border: 1px solid #e4e9f2;
        border-radius: 8px;
        font-size: 1rem;
        transition: all 0.3s ease;
    }

    .form-group select:focus,
    .form-group input[type="text"]:focus,
    .form-group textarea:focus {
        outline: none;
        border-color: var(--primary-color);
        box-shadow: 0 0 0 2px rgba(26, 95, 122, 0.1);
    }

    .button {
        display: inline-block;
        text-decoration: none;
        background: linear-gradient(135deg, #f5f7fa 0%, #e4e9f2 100%);
        color: var(--primary-color);
        padding: 0.8rem 1.2rem;
        font-size: 1rem;
        font-weight: bold;
        border-radius: 8px;
        transition: all 0.3s ease;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        border: 2px solid transparent;
        cursor: pointer;
    }

    .button:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.15);
        border-color: var(--primary-color);
        background: var(--primary-color);
        color: var(--white);
    }

    .button-primary {
        background: var(--primary-color);
        color: var(--white);
    }
    @keyframes modalSlideIn {
            from {
                transform: translateY(-20px);
                opacity: 0;
            }
            to {
                transform: translateY(0);
                opacity: 1;
            }
        }

        @keyframes spin {
            100% {
                transform: rotate(360deg);
            }
        }

        .modal-overlay {
            display: none;
            opacity: 0;
            transition: opacity 0.3s ease-out;
        }

        .modal-overlay.active {
            display: flex;
            opacity: 1;
        }

        .button-loader {
            display: none;
            animation: spin 1s linear infinite;
        }

        .button.loading .button-text {
            display: none;
        }

        .button.loading .button-loader {
            display: inline-block;
        }
    </style>
</head>

<body>
    <header>
        <h1>إضافة أداة</h1>
    </header>

    <div class="container">
    <div class="search-container" style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
        <h2 style="color: var(--primary-color); font-family: 'Aref Ruqaa', serif; font-size: 1.5rem; margin: 0;">قائمة أدوات الربط</h2>
        <a href="{{ route('linkingtool.create') }}" class="button button-primary" style="display: flex; align-items: center; gap: 8px;">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <line x1="12" y1="5" x2="12" y2="19"></line>
                <line x1="5" y1="12" x2="19" y2="12"></line>
            </svg>
            إضافة أداة جديدة
        </a>
    </div>

    @if(session('success'))
    <div class="search-container" style="background-color: rgba(37, 162, 51, 0.1); border-right: 4px solid #25a233; color: #155724; display: flex; align-items: center; gap: 10px;">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="color: #25a233;">
            <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
            <polyline points="22 4 12 14.01 9 11.01"></polyline>
        </svg>
        {{ session('success') }}
    </div>
    @endif

    <div class="search-container" style="padding: 0; overflow: hidden;">
        <table style="width: 100%; border-collapse: collapse;">
            <thead>
                <tr style="background: linear-gradient(45deg, var(--gradient-start), var(--gradient-end)); color: white;">
                    <th style="text-align: right; padding: 15px; font-family: 'Aref Ruqaa', serif;">الاسم بالعربية</th>
                    <th style="text-align: left; padding: 15px; font-family: 'Aref Ruqaa', serif;">Name</th>
                    <th style="text-align: center; padding: 15px; font-family: 'Aref Ruqaa', serif;">الإجراءات</th>
                </tr>
            </thead>
            <tbody>
                @foreach($tools as $tool)
                <tr style="border-bottom: 1px solid #e4e9f2; transition: background-color 0.3s ease;">
                    <td style="padding: 15px;">{{ $tool->arabic_name }}</td>
                    <td style="padding: 15px;">{{ $tool->name }}</td>
                    <td style="text-align: center; padding: 15px;">
                        <div style="display: flex; gap: 10px; justify-content: center;">
                            <a href="{{ route('linkingtool.edit', $tool) }}" 
                               class="button" 
                               style="display: flex; align-items: center; gap: 5px; margin: 0; padding: 8px 16px;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                                    <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                                </svg>
                                تعديل
                            </a>
                            <form action="{{ route('linkingtool.destroy', $tool) }}" 
                                  method="POST" 
                                  style="display: inline; margin: 0;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" 
                                        class="button"
                                        onclick="return confirm('هل أنت متأكد من حذف هذه الأداة؟')"
                                        style="background: #dc3545; color: white; display: flex; align-items: center; gap: 5px; margin: 0; padding: 8px 16px;">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M3 6h18"></path>
                                        <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6"></path>
                                        <path d="M8 6V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                                    </svg>
                                    حذف
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div id="formModal" class="modal-overlay" style="display: none; position: fixed; top: 0; left: 0; right: 0; bottom: 0; background-color: rgba(0, 0, 0, 0.5); z-index: 1000; justify-content: center; align-items: center;">
        <div class="modal-content search-container" style="width: 90%; max-width: 500px; position: relative; animation: modalSlideIn 0.3s ease-out;">
            <button onclick="closeModal()" class="close-button" style="position: absolute; top: 15px; left: 15px; background: none; border: none; cursor: pointer; padding: 5px;">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <line x1="18" y1="6" x2="6" y2="18"></line>
                    <line x1="6" y1="6" x2="18" y2="18"></line>
                </svg>
            </button>

            <h2 style="color: var(--primary-color); font-family: 'Aref Ruqaa', serif; font-size: 1.5rem; margin: 0 0 20px 0; text-align: center;">
                إضافة أداة جديدة
            </h2>

            <div id="errorMessages" style="display: none; background-color: #f8d7da; color: #721c24; padding: 10px; margin-bottom: 20px; border-radius: 8px;">
                <ul></ul>
            </div>

            <form id="toolForm" onsubmit="submitForm(event)">
                @csrf
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" 
                           id="name" 
                           name="name" 
                           required
                           style="background: var(--white);">
                </div>

                <div class="form-group">
                    <label for="arabic_name">الاسم بالعربية:</label>
                    <input type="text" 
                           id="arabic_name" 
                           name="arabic_name"
                           required
                           style="background: var(--white);">
                </div>

                <div style="display: flex; justify-content: space-between; margin-top: 20px; gap: 10px;">
                    <button type="submit" class="button button-primary" style="flex: 1;">
                        <span class="button-text">حفظ</span>
                        <span class="button-loader" style="display: none;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="animation: spin 1s linear infinite;">
                                <line x1="12" y1="2" x2="12" y2="6"></line>
                                <line x1="12" y1="18" x2="12" y2="22"></line>
                                <line x1="4.93" y1="4.93" x2="7.76" y2="7.76"></line>
                                <line x1="16.24" y1="16.24" x2="19.07" y2="19.07"></line>
                                <line x1="2" y1="12" x2="6" y2="12"></line>
                                <line x1="18" y1="12" x2="22" y2="12"></line>
                                <line x1="4.93" y1="19.07" x2="7.76" y2="16.24"></line>
                                <line x1="16.24" y1="7.76" x2="19.07" y2="4.93"></line>
                            </svg>
                        </span>
                    </button>
                    <button type="button" onclick="closeModal()" class="button" style="flex: 1;">إلغاء</button>
                </div>
            </form>
        </div>
    </div>
        @if($tools->isEmpty())
        <div style="text-align: center; padding: 30px; color: var(--text-color);">
            <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="margin: 0 auto 15px; display: block; color: var(--primary-color);">
                <path d="M13 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9z"></path>
                <polyline points="13 2 13 9 20 9"></polyline>
            </svg>
            <p style="font-size: 1.1rem;">لا توجد أدوات ربط مضافة حتى الآن</p>
        </div>
        @endif
    </div>
</div>
    

    <div class="container" style="width: 100%;">
        <div class="search-container">
            @if($errors->any())
            <div
                style="background-color: #f8d7da; color: #721c24; padding: 10px; margin-bottom: 20px; border-radius: 8px;">
                <ul>
                    @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <form action="{{ route('linkingtool.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" id="name" name="name" value="{{ old('name') }}" required>
                </div>

                <div class="form-group">
                    <label for="arabic_name">الاسم بالعربية:</label>
                    <input type="text" id="arabic_name" name="arabic_name" value="{{ old('arabic_name') }}" required>
                </div>

                <div style="display: flex; justify-content: space-between; margin-top: 20px;">
                    <button type="submit" class="button button-primary">حفظ</button>
                    <a href="{{ route('linkingtool.index') }}" class="button">إلغاء</a>
                </div>
            </form>
        </div>
    </div>


    <script>
        function openModal() {
            const modal = document.getElementById('formModal');
            modal.style.display = 'flex';
            setTimeout(() => modal.classList.add('active'), 10);
            document.body.style.overflow = 'hidden';
        }

        function closeModal() {
            const modal = document.getElementById('formModal');
            modal.classList.remove('active');
            setTimeout(() => {
                modal.style.display = 'none';
                document.body.style.overflow = 'auto';
            }, 300);
            resetForm();
        }

        function resetForm() {
            document.getElementById('toolForm').reset();
            document.getElementById('errorMessages').style.display = 'none';
        }

        function submitForm(event) {
            event.preventDefault();
            const form = event.target;
            const submitButton = form.querySelector('button[type="submit"]');
            submitButton.classList.add('loading');

            fetch('{{ route('linkingtool.store') }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                },
                body: JSON.stringify({
                    name: form.name.value,
                    arabic_name: form.arabic_name.value
                })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    window.location.reload();
                } else {
                    showErrors(data.errors);
                }
            })
            .catch(error => {
                showErrors(['An error occurred. Please try again.']);
            })
            .finally(() => {
                submitButton.classList.remove('loading');
            });
        }

        function showErrors(errors) {
            const errorDiv = document.getElementById('errorMessages');
            const errorList = errorDiv.querySelector('ul');
            errorList.innerHTML = '';
            errors.forEach(error => {
                const li = document.createElement('li');
                li.textContent = error;
                errorList.appendChild(li);
            });
            errorDiv.style.display = 'block';
        }

        // Close modal when clicking outside
        document.getElementById('formModal').addEventListener('click', function(event) {
            if (event.target === this) {
                closeModal();
            }
        });

        // Close modal on escape key
        document.addEventListener('keydown', function(event) {
            if (event.key === 'Escape') {
                closeModal();
            }
        });
    </script>
</body>

</html>