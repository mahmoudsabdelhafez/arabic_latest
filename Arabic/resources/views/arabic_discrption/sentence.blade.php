<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }} - إدارة الميزات العربية</title>

    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@400;500;700&display=swap" rel="stylesheet">

    <style>
    :root {
        --primary-color: #234B6E;
        --secondary-color: #3A7E71;
        --accent-color: #C17B3F;
        --text-color: #2b2b2b;
        --white: #ffffff;
        --border-radius: 8px;
        --shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        font-family: 'Tajawal', sans-serif;
        background: #f5f7fa;
        color: var(--text-color);
        line-height: 1.6;
    }

    .container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 2rem;
    }

    .header {
        background: linear-gradient(45deg, var(--primary-color), var(--secondary-color));
        padding: 2rem;
        margin-bottom: 2rem;
        color: var(--white);
        text-align: center;
    }

    .card {
        background: var(--white);
        border-radius: var(--border-radius);
        padding: 2rem;
        margin-bottom: 2rem;
        box-shadow: var(--shadow);
    }

    .form-group {
        margin-bottom: 1.5rem;
    }

    label {
        display: block;
        margin-bottom: 0.5rem;
        font-weight: 500;
    }

    input,
    textarea,
    select {
        width: 100%;
        padding: 0.75rem;
        border: 1px solid #ddd;
        border-radius: var(--border-radius);
        font-family: 'Tajawal', sans-serif;
    }

    input:focus,
    textarea:focus,
    select:focus {
        outline: none;
        border-color: var(--primary-color);
        box-shadow: 0 0 0 2px rgba(35, 75, 110, 0.1);
    }

    .btn {
        display: inline-block;
        padding: 0.75rem 1.5rem;
        border: none;
        border-radius: var(--border-radius);
        background: var(--primary-color);
        color: var(--white);
        cursor: pointer;
        font-family: 'Tajawal', sans-serif;
        font-weight: 500;
    }

    .btn:hover {
        opacity: 0.9;
    }

    .btn-secondary {
        background: var(--secondary-color);
    }

    .alert {
        padding: 1rem;
        border-radius: var(--border-radius);
        margin-bottom: 1rem;
    }

    .alert-success {
        background: #d4edda;
        color: #155724;
        border: 1px solid #c3e6cb;
    }

    .alert-danger {
        background: #f8d7da;
        color: #721c24;
        border: 1px solid #f5c6cb;
    }

    .sentence-parts {
        border: 1px solid #ddd;
        border-radius: var(--border-radius);
        padding: 1rem;
        margin-bottom: 1rem;
    }

    .sentence-part {
        display: flex;
        gap: 1rem;
        padding: 1rem;
        background: #f8f9fa;
        border-radius: var(--border-radius);
        margin-bottom: 1rem;
    }

    .sentence-part input {
        flex: 1;
    }

    .table {
        width: 100%;
        border-collapse: collapse;
    }

    .table th,
    .table td {
        padding: 1rem;
        border-bottom: 1px solid #ddd;
        text-align: right;
    }

    .table th {
        background: #f8f9fa;
        font-weight: 500;
    }

    @media (max-width: 768px) {
        .container {
            padding: 1rem;
        }

        .table {
            display: block;
            overflow-x: auto;
        }
    }

    .edit-form {
        background: #f8f9fa;
        border: 1px solid #e2e8f0;
        border-radius: var(--border-radius);
        padding: 1.5rem;
        margin: 1rem 0;
    }

    .parts-container {
        background: var(--white);
        border: 1px solid #ddd;
        border-radius: var(--border-radius);
        padding: 1rem;
        margin-top: 1rem;
    }

    .part-item {
        display: flex;
        gap: 1rem;
        align-items: center;
        padding: 0.75rem;
        background: #f8f9fa;
        border: 1px solid #e2e8f0;
        border-radius: var(--border-radius);
        margin-bottom: 0.5rem;
    }

    .part-item:last-child {
        margin-bottom: 0;
    }

    .part-handle {
        cursor: move;
        color: #718096;
        padding: 0.5rem;
    }

    .part-inputs {
        flex: 1;
        display: flex;
        gap: 1rem;
    }

    .btn-icon {
        padding: 0.5rem;
        border-radius: var(--border-radius);
        cursor: pointer;
        display: inline-flex;
        align-items: center;
        justify-content: center;
    }

    .btn-icon.delete {
        color: #e53e3e;
        background: #fff5f5;
    }

    .btn-icon.edit {
        color: var(--primary-color);
        background: #ebf4ff;
    }

    .toggle-edit {
        background: none;
        border: none;
        color: var(--primary-color);
        cursor: pointer;
        padding: 0.5rem;
        border-radius: var(--border-radius);
    }

    .toggle-edit:hover {
        background: #ebf4ff;
    }

    .edit-form td {
        padding: 20px;
        background-color: #f8f9fa;
    }

    .table-inner {
        margin: 0;
        background: white;
    }

    .table-inner th,
    .table-inner td {
        padding: 10px;
    }

    .parts-section {
        margin-top: 20px;
        border-top: 1px solid #dee2e6;
        padding-top: 20px;
    }

    .parts-section h3 {
        margin-bottom: 15px;
        font-size: 1.1rem;
        color: #495057;
    }

    .table-parts {
        margin-bottom: 10px;
    }

    .table-parts input {
        width: 100%;
        padding: 8px;
        border: 1px solid #dee2e6;
        border-radius: 4px;
    }

    .part-handle {
        cursor: move;
        text-align: center;
        color: #6c757d;
        font-weight: bold;
    }

    .table-actions {
        padding: 10px 0;
        text-align: right;
    }

    .btn-sm {
        padding: 4px 8px;
        font-size: 0.875rem;
    }

    .inline {
        display: inline-block;
        margin-right: 5px;
    }
    </style>
</head>

<body>
    <header class="header">
        <h1>إدارة الميزات العربية</h1>
    </header>

    <div class="container">
        @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif

        @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <div class="card">
            <h2>إضافة جملة جديدة</h2>
            <form method="POST" action="{{ route('sentences.store') }}" id="sentenceForm">
                @csrf
                <div class="form-group">
                    <label for="language_content_id">معرف المحتوى اللغوي</label>
                    <input type="text" id="language_content_id" name="language_content_id"
                        value="{{ old('language_content_id') }}" required>
                </div>

                <div class="form-group">
                    <label for="name">الاسم</label>
                    <input type="text" id="name" name="name" value="{{ old('name') }}" required>
                </div>

                <div class="form-group">
                    <label for="description">الوصف</label>
                    <textarea id="description" name="description" rows="3" required>{{ old('description') }}</textarea>
                </div>

                <div class="form-group">
                    <label>أجزاء الجملة</label>
                    <div id="sentenceParts" class="sentence-parts"></div>
                    <button type="button" class="btn btn-secondary" onclick="addPart()">إضافة جزء جديد</button>
                </div>

                <button type="submit" class="btn">حفظ الجملة</button>
            </form>
        </div>

        <div class="card">
            <h2>قائمة الجمل</h2>
            <table class="table">
                <thead>
                    <tr>
                        <th>المعرف</th>
                        <th>معرف المحتوى</th>
                        <th>الاسم</th>
                        <th>الوصف</th>
                        <th>الإجراءات</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($sentences as $sentence)
                    <tr>
                        <td>{{ $sentence->id }}</td>
                        <td>{{ $sentence->language_content_id }}</td>
                        <td>{{ $sentence->name }}</td>
                        <td>{{ $sentence->description }}</td>
                        <td>
                            <button type="button" class="btn btn-primary" onclick="toggleEdit({{ $sentence->id }})">
                                تعديل
                            </button>
                            <form method="POST" action="{{ route('sentences.destroy', $sentence) }}" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-secondary"
                                    onclick="return confirm('هل أنت متأكد من الحذف؟')">حذف</button>
                            </form>
                        </td>
                    </tr>
                    <!-- Edit Form Row -->
                    <tr class="edit-form" id="edit-sentence-{{ $sentence->id }}" style="display: none;">
                        <td colspan="5">
                            <form method="POST" action="{{ route('sentences.update', $sentence) }}"
                                class="sentence-edit-form">
                                @csrf
                                @method('PUT')
                                <table class="table table-inner">
                                    <tr>
                                        <th>معرف المحتوى اللغوي</th>
                                        <th>الاسم</th>
                                        <th>الوصف</th>
                                        <th colspan="2">الإجراءات</th>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="text" name="language_content_id"
                                                value="{{ $sentence->language_content_id }}" required>
                                        </td>
                                        <td>
                                            <input type="text" name="name" value="{{ $sentence->name }}" required>
                                        </td>
                                        <td>
                                            <textarea name="description" rows="2"
                                                required>{{ $sentence->description }}</textarea>
                                        </td>
                                        <td colspan="2">
                                            <button type="submit" class="btn btn-primary">حفظ</button>
                                            <button type="button" class="btn btn-secondary"
                                                onclick="toggleEdit({{ $sentence->id }})">
                                                إلغاء
                                            </button>
                                        </td>
                                    </tr>
                                </table>

                                <div class="parts-section">
                                    <h3>أجزاء الجملة</h3>
                                    <table class="table table-parts">
                                        <thead><tr>
                                            <th></th>
                                            <th>اسم الجزء</th>
                                            <th>وصف الجزء</th>
                                            <th>الإجراءات</th>
                                        </thead></tr>
                                    <tbody class="table table-parts" id="parts-{{ $sentence->id }}">
                                        @foreach($sentence->sentenceParts as $part)
                                        <tr data-part-id="{{ $part->id }}">
                                            <td >
                                                <div class="part-handle">⋮</div>
                                            </td>
                                            <td>
                                                <input type="text" name="parts[{{ $part->id }}][name]"
                                                    value="{{ $part->name }}" placeholder="اسم الجزء" required>
                                            </td>
                                            <td>
                                                <input type="text" name="parts[{{ $part->id }}][description]"
                                                    value="{{ $part->description }}" placeholder="وصف الجزء">
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-secondary btn-sm"
                                                    onclick="removePart(this)">
                                                    حذف
                                                </button>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                    </table>
                                    <div class="table-actions">
                                        <button type="button" class="btn btn-primary"
                                            onclick="addPartToSentence({{ $sentence->id }})">
                                            إضافة جزء جديد
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>


    </div>

    <script>
    // Add CSRF token to all AJAX requests
    const csrfToken = document.querySelector('meta[name="csrf-token"]').content;

    function addPart() {
        const container = document.getElementById('sentenceParts');
        const partCount = container.children.length;

        const part = document.createElement('div');
        part.className = 'sentence-part';
        part.innerHTML = `
                <input type="text" name="parts[${partCount}][name]" placeholder="اسم الجزء" required>
                <input type="text" name="parts[${partCount}][description]" placeholder="وصف الجزء">
                <button type="button" class="btn btn-secondary" onclick="this.parentElement.remove()">حذف</button>
            `;

        container.appendChild(part);
    }

    // Form validation
    document.getElementById('sentenceForm').addEventListener('submit', function(e) {
        const parts = document.querySelectorAll('#sentenceParts .sentence-part');

        if (parts.length === 0) {
            e.preventDefault();
            alert('يجب إضافة جزء واحد على الأقل');
            return;
        }

        let valid = true;
        parts.forEach(part => {
            const nameInput = part.querySelector('input[name*="[name]"]');
            if (!nameInput.value.trim()) {
                valid = false;
                nameInput.classList.add('error');
            }
        });

        if (!valid) {
            e.preventDefault();
            alert('يرجى ملء جميع الحقول المطلوبة');
        }
    });

    // Add initial part if form is empty
    if (document.getElementById('sentenceParts').children.length === 0) {
        addPart();
    }
    </script>


    <script src="https://cdn.jsdelivr.net/npm/sortablejs@1.14.0/Sortable.min.js"></script>
    <script>
    // Initialize edit forms as hidden
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelectorAll('.edit-form').forEach(form => {
            form.style.display = 'none';
        });

        // Initialize sortable for all part containers
        document.querySelectorAll('.parts-container').forEach(container => {
            new Sortable(container, {
                handle: '.part-handle',
                animation: 150
            });
        });
    });

    function toggleEdit(sentenceId) {
        const editForm = document.getElementById(`edit-sentence-${sentenceId}`);
        editForm.style.display = editForm.style.display === 'none' ? 'table-row' : 'none';
    }

    function addPartToSentence(sentenceId) {
        const tbody = document.getElementById(`parts-${sentenceId}`);
        const newPartId = 'new-' + Date.now();

        const tr = document.createElement('tr');
        tr.className = 'part-item';
        tr.innerHTML = `
            <td>
                <div class="part-handle">⋮</div>
            </td>
            <td>
                <input type="text" name="parts[${newPartId}][name]" 
                       placeholder="اسم الجزء" required>
            </td>
            <td>
                <input type="text" name="parts[${newPartId}][description]" 
                       placeholder="وصف الجزء">
            </td>
            <td>
                <button type="button" class="btn btn-secondary btn-sm" onclick="removePart(this)">
                    حذف
                </button>
            </td>
        `;

        tbody.appendChild(tr);
    }

    function removePart(button) {
        if (confirm('هل أنت متأكد من حذف هذا الجزء؟')) {
            button.closest('tr').remove();
        }
    }

    // Form validation for edit forms
    document.querySelectorAll('.sentence-edit-form').forEach(form => {
        form.addEventListener('submit', function(e) {
            const parts = this.querySelectorAll('.part-item');
            if (parts.length === 0) {
                e.preventDefault();
                alert('يجب إضافة جزء واحد على الأقل');
                return;
            }

            let valid = true;
            parts.forEach(part => {
                const nameInput = part.querySelector('input[name*="[name]"]');
                if (!nameInput.value.trim()) {
                    valid = false;
                    nameInput.classList.add('error');
                }
            });

            if (!valid) {
                e.preventDefault();
                alert('يرجى ملء جميع الحقول المطلوبة');
            }
        });
    });
    </script>
</body>

</html>