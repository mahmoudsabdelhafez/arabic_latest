<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>إدارة الروابط العربية</title>
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

    .content-card:hover {
        transform: translateY(-3px);
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.12);
    }

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

        .effect-content {
            grid-template-columns: 1fr;
        }

        .modal-content {
            width: 95%;
            padding: 1.5rem;
            margin: 1rem auto;
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
    </style>
</head>

<body>
    <header>
        <h1> الروابط {{ $connectives[0]->category->arabic_name }}</h1>
    </header>


    <div class="main-content">
        <div class="content-section">
            <div class="section-header">
                <h2>قائمة الروابط : {{ $connectives[0]->category->arabic_name }}</h2>
                <div class="all-connectives-list">
                    @foreach($connectives as $connective)
                    <span class="connective-tag">{{ $connective->name }}</span>
                    @endforeach
                </div>
                <button class="btn btn-edit" onclick="openAddModal()">إضافة رابط جديد</button>
            </div>

            <div class="grid-container">
                @foreach($connectives as $connective)
                <div class="content-card" data-categories="{{ $connective->categories }}">
                    <h3>{{ $connective->name }}</h3>
                    <div class="main-description">
                        <p><strong>النطق:</strong> {{ $connective->pronunciation }}</p>
                        <p><strong>المعنى:</strong>
                            {{ isset($connective->meaning)? $connective->meaning : $connective->definition}}</p>
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
                    <div class="action-buttons" style="display: flex; justify-content: space-between; margin: 20px;">
                        <button class="btn btn-edit" onclick="openEditModal({{ $connective->id }})">
                            تعديل
                        </button>
                        <form action="{{ route('connectives.destroy', $connective->id) }}" method="POST"
                            class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="button" class="btn btn-delete"
                                onclick="deleteConnective({{ $connective->id }})">
                                حذف
                            </button>
                        </form>
                    </div>
                </div>
                @endforeach
            </div>
        </div>




    </div>

    <div id="editModal" class="modal">
        <div class="modal-content">
            <h2>تعديل الرابط</h2>
            <form id="editForm" method="POST">
                @csrf
                @method('PUT')

                <input type="hidden" id="edit_id" name="id">

                <!-- Basic Information -->
                <div class="grid-2">
                    <div class="form-group">
                        <label for="name">الاسم</label>
                        <input type="text" class="form-control" id="name" name="name" required>
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

    <!-- Add Modal -->
    <div id="addModal" class="modal">
        <div class="modal-content">
            <h2 class="modal-title">إضافة رابط جديد</h2>
            <form id="addForm" method="POST">
                @csrf

                <!-- Basic Information Section -->
                <div class="form-section">
                    <h3 class="form-section-title">المعلومات الأساسية</h3>
                    <div class="form-grid">
                        <div class="form-group">
                            <label for="add_name">الاسم</label>
                            <input type="text" class="form-control" id="add_name" name="name" required>
                        </div>
                        <div class="form-group">
                            <label for="add_pronunciation">النطق</label>
                            <input type="text" class="form-control" id="add_pronunciation" name="pronunciation">
                        </div>
                        <div class="form-group">
                            <label for="add_meaning">المعنى</label>
                            <input type="text" class="form-control" id="add_meaning" name="meaning" required>
                        </div>
                        <div class="form-group">
                            <label for="add_meaning">التعريف</label>
                            <input type="text" class="form-control" id="add_meaning" name="definition" required>
                        </div>
                        <div class="form-group">
                            <label for="add_category_id">الفئة</label>
                            <select class="form-control" id="add_category_id" name="category_id" required>
                                @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->arabic_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <!-- Position and Form Section -->
                <div class="form-section">
                    <h3 class="form-section-title">الموقع والشكل</h3>
                    <div class="form-grid">
                        <div class="form-group">
                            <label for="add_position">الموقع</label>
                            <select class="form-control" id="add_position" name="position" required>
                                <option value="start">بداية</option>
                                <option value="middle">وسط</option>
                                <option value="end">نهاية</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="add_connective_form">شكل الرابط</label>
                            <select class="form-control" id="add_connective_form" name="connective_form" required>
                                <option value="standalone">مستقل</option>
                                <option value="connected">متصل</option>
                                <option value="hybrid">هجين</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="form-section">
                    <h3 class="form-section-title">التأثيرات</h3>
                    <div class="form-grid">
                        <!-- Syntactic Effect -->
                        <div class="form-group">
                            <label for="add_syntactic_effect_id">التأثير النحوي</label>
                            <select class="form-control" id="add_syntactic_effect_id" name="syntactic_effect_id"
                                onchange="toggleNewSyntacticEffect(this)">
                                <option value="">اختر تأثير نحوي</option>
                                @foreach ($syntacticEffects as $syntacticEffect)
                                <option value="{{ $syntacticEffect->id }}">{{ $syntacticEffect->result_case }}</option>
                                @endforeach
                                <option value="new">+ إضافة جديد</option>
                            </select>
                        </div>
                        <!-- Hidden New Syntactic Effect Fields -->
                        <div id="new_syntactic_effect" style="display: none;">
                            <label>تأثير نحوي جديد</label>
                            <input type="text" class="form-control" name="new_applied_on" placeholder="المطبق على">
                            <input type="text" class="form-control" name="new_result_case" placeholder="الحالة الناتجة">
                            <textarea class="form-control" name="new_context_condition"
                                placeholder="شرط السياق (اختياري)"></textarea>
                        </div>


                        <!-- Semantic Logical Effect -->
                        <div class="form-group">
                            <label for="add_semantic_logical_effect_id">التأثير الدلالي المنطقي</label>
                            <select class="form-control" id="add_semantic_logical_effect_id"
                                name="semantic_logical_effect_id" onchange="toggleNewSemanticEffect(this)">
                                <option value="">اختر تأثير دلالي</option>
                                @foreach ($semanticEffects as $semanticEffect)
                                <option value="{{ $semanticEffect->id }}">{{ $semanticEffect->typical_relation }}
                                </option>
                                @endforeach
                                <option value="new">+ إضافة جديد</option>
                            </select>
                        </div>
                        <!-- Hidden New Semantic Logical Effect Fields -->
                        <div id="new_semantic_effect" style="display: none;">
                            <label>تأثير دلالي جديد</label>
                            <input type="text" class="form-control" name="new_typical_relation"
                                placeholder="العلاقة النموذجية">
                            <input type="text" class="form-control" name="new_nisbah_type" placeholder="نوع النسبة">
                            <textarea class="form-control" name="new_semantic_roles"
                                placeholder="الأدوار الدلالية"></textarea>
                        </div>

                    </div>
                </div>


                <!-- Additional Information -->
                <div class="form-section">
                    <h3 class="form-section-title">معلومات إضافية</h3>
                    <div class="form-group">
                        <label for="add_status">الحالة</label>
                        <input type="text" class="form-control" id="add_status" name="status">
                    </div>
                </div>

                <!-- Form Actions -->
                <div class="form-actions">
                    <button type="submit" class="btn btn-edit">إضافة الرابط</button>
                    <button type="button" class="btn btn-delete" onclick="closeAddModal()">إلغاء</button>
                </div>
            </form>
        </div>
    </div>

    <script>
    function toggleNewInput(select, inputId) {
        var inputField = document.getElementById(inputId);
        if (select.value === "new") {
            inputField.style.display = "block";
            inputField.required = true;
        } else {
            inputField.style.display = "none";
            inputField.required = false;
        }
    }

    function toggleNewSyntacticEffect(select) {
        document.getElementById('new_syntactic_effect').style.display = (select.value === 'new') ? 'block' : 'none';
    }

    function toggleNewSemanticEffect(select) {
        document.getElementById('new_semantic_effect').style.display = (select.value === 'new') ? 'block' : 'none';
    }

    document.addEventListener('DOMContentLoaded', function() {
        // Add click event for connective tags to filter
        const connectiveTags = document.querySelectorAll('.connective-tag');
        connectiveTags.forEach(tag => {
            tag.addEventListener('click', function() {
                const name = this.textContent.trim();
                filterConnectives(name);
            });
        });
    });

    function filterConnectives(name) {
        const cards = document.querySelectorAll('.content-card');

        cards.forEach(card => {
            const cardName = card.querySelector('h3').textContent.trim();

            if (name === 'all' || cardName === name) {
                card.style.display = 'block';
            } else {
                card.style.display = 'none';
            }
        });
    }
    </script>
    <script>
    // Modal handling functions
    // Add Modal handling functions
    function openAddModal() {
        const modal = document.getElementById('addModal');
        const form = document.getElementById('addForm');
        form.reset();
        modal.style.display = 'block';
    }

    function closeAddModal() {
        const modal = document.getElementById('addModal');
        modal.style.display = 'none';
    }

    // Form submission handler for add form
    document.getElementById('addForm').addEventListener('submit', function(e) {
        e.preventDefault();

        const formData = new FormData(this);

        fetch('/connectives', {
                method: 'POST',
                body: formData,
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert('تم إضافة الرابط بنجاح');
                    window.location.reload();
                } else {
                    alert('حدث خطأ أثناء إضافة الرابط');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('حدث خطأ أثناء إضافة الرابط');
            });
    });

    // Close add modal when clicking outside
    window.onclick = function(event) {
        const addModal = document.getElementById('addModal');
        const editModal = document.getElementById('editModal');
        if (event.target == addModal) {
            closeAddModal();
        }
        if (event.target == editModal) {
            closeModal();
        }
    }

    function openEditModal(id) {
        // جلب بيانات الرابط عبر AJAX
        fetch(`/connectives/${id}/edit`)
            .then(response => response.json())
            .then(data => {
                console.log(data);
                // تعبئة البيانات في النموذج
                document.getElementById('edit_id').value = id;
                document.getElementById('name').value = data.name;
                document.getElementById('pronunciation').value = data.pronunciation;
                document.getElementById('applied_on').value = data.syntactic_effect.applied_on || '';
                document.getElementById('result_case').value = data.syntactic_effect.result_case || '';
                document.getElementById('context_condition').value = data.syntactic_effect.context_condition || '';
                document.getElementById('priority_order').value = data.syntactic_effect.priority_order || '';

                document.getElementById('typical_relation').value = data.semantic_logical_effect.typical_relation ||
                    '';
                document.getElementById('nisbah_type').value = data.semantic_logical_effect.nisbah_type || '';
                document.getElementById('semantic_roles').value = data.semantic_logical_effect.semantic_roles || '';
                document.getElementById('conditions').value = data.semantic_logical_effect.conditions || '';

                // تعيين action للنموذج
                document.getElementById('editForm').action = `/connectives/${id}`;

                // فتح النافذة
                document.getElementById('editModal').style.display = 'block';
            })
            .catch(error => console.error('Error fetching connective data:', error));
    }

    function closeModal() {
        document.getElementById('editModal').style.display = 'none';
    }


    function closeModal() {
        const modal = document.getElementById('editModal');
        modal.style.display = 'none';
    }

    // Form submission handler
    document.getElementById('editForm').addEventListener('submit', function(e) {
        e.preventDefault();

        const formData = new FormData(this);
        const method = formData.get('_method') || 'POST';

        fetch(this.action, {
                method: method === 'PUT' ? 'POST' : method,
                body: formData,
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert('تم حفظ البيانات بنجاح');
                    window.location.reload();
                } else {
                    alert('حدث خطأ أثناء حفظ البيانات');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('حدث خطأ أثناء حفظ البيانات');
            });
    });

    // Delete handler
    function deleteConnective(id) {
        if (confirm('هل أنت متأكد من الحذف؟')) {
            const form = document.createElement('form');
            form.method = 'POST';
            form.action = `/connectives/${id}`;

            const methodInput = document.createElement('input');
            methodInput.type = 'hidden';
            methodInput.name = '_method';
            methodInput.value = 'DELETE';

            const tokenInput = document.createElement('input');
            tokenInput.type = 'hidden';
            tokenInput.name = '_token';
            tokenInput.value = document.querySelector('meta[name="csrf-token"]').content;

            form.appendChild(methodInput);
            form.appendChild(tokenInput);
            document.body.appendChild(form);

            form.submit();
        }
    }

    // Close modal when clicking outside
    window.onclick = function(event) {
        const modal = document.getElementById('editModal');
        if (event.target == modal) {
            closeModal();
        }
    }
    </script>
</body>

</html>