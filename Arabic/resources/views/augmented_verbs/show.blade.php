<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>نظام اشتقاق الأفعال العربية</title>
    <link href="https://fonts.googleapis.com/css2?family=Amiri&family=Aref+Ruqaa:wght@400;700&display=swap"
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
        --bg-light: #f8f9fa;
        --border-light: #e9ecef;
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
        text-align: right;
    }

    header {
        background: linear-gradient(45deg, var(--gradient-start), var(--gradient-end));
        padding: 2rem;
        text-align: center;
        position: relative;
        overflow: hidden;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
    }

    header h1 {
        color: var(--white);
        font-size: 2.5rem;
        font-family: 'Aref Ruqaa', serif;
        position: relative;
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2);
    }

    .container {
        max-width: 1200px;
        margin: 2rem auto;
        padding: 0 1rem;
    }

    .content-card {
        background: var(--white);
        border-radius: 20px;
        padding: 2rem;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        animation: fadeIn 0.3s ease;
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(10px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .card-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 2rem;
        padding-bottom: 1rem;
        border-bottom: 1px solid rgba(0, 0, 0, 0.1);
    }

    .card-title {
        color: var(--primary-color);
        font-size: 1.8rem;
        font-family: 'Aref Ruqaa', serif;
    }

    .btn {
        display: inline-block;
        padding: 0.75rem 1.5rem;
        background: linear-gradient(45deg, var(--gradient-start), var(--gradient-end));
        color: var(--white);
        border: none;
        border-radius: 8px;
        font-family: 'Amiri', serif;
        font-size: 1.1rem;
        cursor: pointer;
        transition: all 0.3s ease;
        text-align: center;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        text-decoration: none;
    }

    .btn:hover {
        transform: translateY(-3px);
        box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
    }

    .btn-sm {
        padding: 0.5rem 1rem;
        font-size: 0.9rem;
    }

    .btn-info {
        background: var(--primary-color);
    }

    .btn-edit {
        background: var(--secondary-color);
    }

    .btn-save {
        background: #28a745;
    }

    .btn-delete {
        background: #dc3545;
    }

    .alert {
        padding: 1rem;
        border-radius: 8px;
        margin-bottom: 1.5rem;
    }

    .alert-success {
        background-color: rgba(58, 126, 113, 0.1);
        border-right: 4px solid var(--secondary-color);
        color: var(--secondary-color);
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 1rem;
    }

    th,
    td {
        padding: 1rem;
        text-align: right;
        border-bottom: 1px solid rgba(0, 0, 0, 0.1);
    }

    th {
        background-color: rgba(35, 75, 110, 0.1);
        color: var(--primary-color);
        font-weight: bold;
    }

    tr:hover {
        background-color: rgba(0, 0, 0, 0.02);
    }

    .editable {
        min-height: 24px;
        padding: 5px;
        border-radius: 4px;
        transition: all 0.2s ease;
    }

    .editable:hover {
        background-color: var(--bg-light);
        cursor: pointer;
    }

    .editable:focus {
        outline: 2px solid var(--primary-color);
        background-color: var(--white);
    }

    .editable-input {
        width: 100%;
        padding: 5px;
        border: 1px solid var(--border-light);
        border-radius: 4px;
        font-family: 'Amiri', serif;
        font-size: 1rem;
    }

    .editing-active {
        background-color: #fff8e6;
    }

    .actions {
        display: flex;
        gap: 0.5rem;
    }

    .action-buttons {
        display: flex;
        justify-content: flex-end;
        gap: 10px;
        margin-top: 20px;
    }

    .pagination {
        display: flex;
        justify-content: center;
        list-style: none;
        margin-top: 2rem;
    }

    .pagination li {
        margin: 0 0.25rem;
    }

    .pagination li a,
    .pagination li span {
        display: block;
        padding: 0.5rem 1rem;
        border-radius: 4px;
        text-decoration: none;
        background: var(--white);
        color: var(--text-color);
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        transition: all 0.3s ease;
    }

    .pagination li.active span {
        background: linear-gradient(45deg, var(--gradient-start), var(--gradient-end));
        color: var(--white);
    }

    .pagination li a:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15);
    }

    .d-none {
        display: none;
    }

    .responsive-table {
        overflow-x: auto;
    }

    .row {
        display: flex;
        flex-wrap: wrap;
        margin-right: -15px;
        margin-left: -15px;
    }

    .justify-content-center {
        justify-content: center;
    }

    .col-md-12, .col-md-6 {
        position: relative;
        width: 100%;
        padding-right: 15px;
        padding-left: 15px;
    }

    .mt-4 {
        margin-top: 1.5rem;
    }

    .d-flex {
        display: flex;
    }

    .justify-content-between {
        justify-content: space-between;
    }

    .align-items-center {
        align-items: center;
    }

    .card {
        background: var(--white);
        border-radius: 20px;
        padding: 2rem;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        animation: fadeIn 0.3s ease;
    }

    .card-body {
        padding: 1.25rem;
    }

    .table-bordered {
        border: 1px solid rgba(0, 0, 0, 0.1);
    }

    .table-bordered th,
    .table-bordered td {
        border: 1px solid rgba(0, 0, 0, 0.1);
    }

    .flash-message {
        position: fixed;
        top: 20px;
        left: 50%;
        transform: translateX(-50%);
        padding: 15px 25px;
        border-radius: 8px;
        background-color: #28a745;
        color: white;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        z-index: 1000;
        display: none;
    }

    @media (min-width: 768px) {
        .col-md-6 {
            flex: 0 0 50%;
            max-width: 50%;
        }

        .col-md-12 {
            flex: 0 0 100%;
            max-width: 100%;
        }
    }

    @media (max-width: 768px) {
        .d-none {
            display: block;
        }

        .container {
            padding: 0 1rem;
        }

        .content-card {
            padding: 1.5rem;
        }

        .card-header {
            flex-direction: column;
            align-items: flex-start;
            gap: 1rem;
        }

        .card-title {
            font-size: 1.5rem;
        }

        th,
        td {
            padding: 0.75rem 0.5rem;
            font-size: 0.9rem;
        }

        .actions {
            flex-direction: column;
        }

        .btn-sm {
            padding: 0.4rem 0.8rem;
            font-size: 0.8rem;
        }

        .row {
            flex-direction: column;
        }
    }

    /* Responsive table for mobile */
    @media (max-width: 576px) {
        .card-data {
            display: flex;
            flex-direction: column;
            margin-bottom: 1rem;
            padding: 1rem;
            border: 1px solid rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        .card-data-item {
            display: flex;
            justify-content: space-between;
            padding: 0.5rem 0;
            border-bottom: 1px solid rgba(0, 0, 0, 0.05);
        }

        .card-data-label {
            font-weight: bold;
            color: var(--primary-color);
        }

        .card-data-actions {
            display: flex;
            justify-content: flex-end;
            gap: 0.5rem;
            margin-top: 1rem;
        }

        table {
            display: table;
        }
    }
    </style>
</head>

<body>
    <header>
        <h1>نظام اشتقاق الأفعال العربية</h1>
    </header>

    <div class="flash-message" id="flashMessage">تم حفظ التغييرات بنجاح</div>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div style=" display: flex; justify-content: space-between;">
                            <h2>تفاصيل المثال</h2>
                            <div>
                                <button id="toggleEditMode" class="btn btn-secondary">وضع التحرير</button>
                                <button id="saveChanges" class="btn btn-save d-none">حفظ التغييرات</button>
                                <a href="#" class="btn btn-secondary">العودة للقائمة</a>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <h4>معلومات أساسية</h4>
                                <table class="table table-bordered">
                                    <tr>
                                        <th>الجذر</th>
                                        <td><div class="editable" contenteditable="false" data-field="root">ك ت ب</div></td>
                                    </tr>
                                    <tr>
                                        <th>الوزن</th>
                                        <td><div class="editable" contenteditable="false" data-field="pattern">أَفْعَلَ</div></td>
                                    </tr>
                                    <tr>
                                        <th>المثال</th>
                                        <td><div class="editable" contenteditable="false" data-field="example">أَكْتَبَ</div></td>
                                    </tr>
                                </table>
                            </div>

                            <div class="col-md-6">
                                <h4>الأسماء المشتقة</h4>
                                <table class="table table-bordered">
                                    <tr>
                                        <th width="180px">المصدر</th>
                                        <td><div class="editable" contenteditable="false" data-field="verbal_noun">إِكْتَاب</div></td>
                                    </tr>
                                    <tr>
                                        <th>المصدر الثاني</th>
                                        <td><div class="editable" contenteditable="false" data-field="verbal_noun2">إِكْتَابَة</div></td>
                                    </tr>
                                    <tr>
                                        <th>اسم المرة</th>
                                        <td><div class="editable" contenteditable="false" data-field="mimic_noun">إِكْتَابَة</div></td>
                                    </tr>
                                    <tr>
                                        <th>المصدر الصناعي</th>
                                        <td><div class="editable" contenteditable="false" data-field="industrial_noun">إكتابية</div></td>
                                    </tr>
                                </table>
                            </div>
                        </div>

                        <div class="row mt-4">
                            <div class="col-md-6">
                                <h4>اسم الفاعل واسم المفعول</h4>
                                <table class="table table-bordered">
                                    <tr>
                                        <th width="180px">اسم الفاعل</th>
                                        <td><div class="editable" contenteditable="false" data-field="active_participle">مُكْتِب</div></td>
                                    </tr>
                                    <tr>
                                        <th>اسم المفعول</th>
                                        <td><div class="editable" contenteditable="false" data-field="passive_participle">مُكْتَب</div></td>
                                    </tr>
                                </table>
                            </div>

                            <div class="col-md-6">
                                <h4>أسماء الزمان والمكان</h4>
                                <table class="table table-bordered">
                                    <tr>
                                        <th width="180px">اسم الزمان</th>
                                        <td><div class="editable" contenteditable="false" data-field="time_noun">مُكْتَب</div></td>
                                    </tr>
                                    <tr>
                                        <th>اسم المكان</th>
                                        <td><div class="editable" contenteditable="false" data-field="place_noun">مُكْتَب</div></td>
                                    </tr>
                                </table>
                            </div>
                        </div>

                        <div class="row mt-4">
                            <div class="col-md-12">
                                <h4>أشكال أخرى</h4>
                                <table class="table table-bordered">
                                    <tr>
                                        <th width="180px">اسم الآلة</th>
                                        <td><div class="editable" contenteditable="false" data-field="instrument_noun">مِكْتَاب</div></td>
                                    </tr>
                                    <tr>
                                        <th>اسم الهيئة</th>
                                        <td><div class="editable" contenteditable="false" data-field="form_noun">إِكْتَابَة</div></td>
                                    </tr>
                                    <tr>
                                        <th>اسم التفضيل</th>
                                        <td><div class="editable" contenteditable="false" data-field="preference_noun">أَكْتَب</div></td>
                                    </tr>
                                    <tr>
                                        <th>الظرف</th>
                                        <td><div class="editable" contenteditable="false" data-field="adverb">إِكْتَابًا</div></td>
                                    </tr>
                                </table>
                            </div>
                        </div>

                        <div class="action-buttons">
                            <button id="cancelChanges" class="btn btn-delete d-none">إلغاء التغييرات</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const toggleEditModeButton = document.getElementById('toggleEditMode');
        const saveChangesButton = document.getElementById('saveChanges');
        const cancelChangesButton = document.getElementById('cancelChanges');
        const editableFields = document.querySelectorAll('.editable');
        const flashMessage = document.getElementById('flashMessage');
        
        // لتخزين الحالة الأصلية للبيانات
        const originalData = {};
        
        // تخزين الحالة الأصلية لجميع الحقول
        editableFields.forEach(field => {
            originalData[field.dataset.field] = field.textContent;
        });
        
        // تفعيل وضع التحرير
        toggleEditModeButton.addEventListener('click', function() {
            const isEditMode = toggleEditModeButton.textContent === 'وضع العرض';
            
            if (isEditMode) {
                // تغيير إلى وضع العرض
                toggleEditModeButton.textContent = 'وضع التحرير';
                saveChangesButton.classList.add('d-none');
                cancelChangesButton.classList.add('d-none');
                
                editableFields.forEach(field => {
                    field.contentEditable = 'false';
                    field.classList.remove('editing-active');
                });
            } else {
                // تغيير إلى وضع التحرير
                toggleEditModeButton.textContent = 'وضع العرض';
                saveChangesButton.classList.remove('d-none');
                cancelChangesButton.classList.remove('d-none');
                
                editableFields.forEach(field => {
                    field.contentEditable = 'true';
                    field.classList.add('editing-active');
                });
            }
        });
        
        // حفظ التغييرات
        saveChangesButton.addEventListener('click', function() {
            // جمع البيانات المحدثة
            const updatedData = {};
            editableFields.forEach(field => {
                updatedData[field.dataset.field] = field.textContent.trim();
            });
            
            // عرض رسالة تأكيد
            showFlashMessage('تم حفظ التغييرات بنجاح');
            
            // إعادة وضع العرض
            toggleEditModeButton.textContent = 'وضع التحرير';
            saveChangesButton.classList.add('d-none');
            cancelChangesButton.classList.add('d-none');
            
            editableFields.forEach(field => {
                field.contentEditable = 'false';
                field.classList.remove('editing-active');
                
                // تحديث البيانات الأصلية
                originalData[field.dataset.field] = field.textContent.trim();
            });
            
            // هنا يمكن إضافة كود لإرسال البيانات إلى الخادم
            console.log('البيانات المحدثة:', updatedData);
            
            // مثال على إرسال البيانات إلى الخادم (يجب تفعيله حسب الحاجة)
            /*
            fetch('/api/update-example', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify(updatedData)
            })
            .then(response => response.json())
            .then(data => {
                console.log('استجابة الخادم:', data);
            })
            .catch(error => {
                console.error('خطأ في إرسال البيانات:', error);
            });
            */
        });
        
        // إلغاء التغييرات
        cancelChangesButton.addEventListener('click', function() {
            // استعادة البيانات الأصلية
            editableFields.forEach(field => {
                field.textContent = originalData[field.dataset.field];
            });
            
            // إعادة وضع العرض
            toggleEditModeButton.textContent = 'وضع التحرير';
            saveChangesButton.classList.add('d-none');
            cancelChangesButton.classList.add('d-none');
            
            editableFields.forEach(field => {
                field.contentEditable = 'false';
                field.classList.remove('editing-active');
            });
            
            showFlashMessage('تم إلغاء التغييرات');
        });
        
        // وظيفة لعرض رسالة تأكيد
        function showFlashMessage(message) {
            flashMessage.textContent = message;
            flashMessage.style.display = 'block';
            
            setTimeout(() => {
                flashMessage.style.display = 'none';
            }, 3000);
        }
        
        // تحسين تجربة المستخدم من خلال التنقل بين الحقول باستخدام مفتاح Tab
        editableFields.forEach(field => {
            field.addEventListener('keydown', function(e) {
                if (e.key === 'Tab') {
                    e.preventDefault();
                    const allFields = Array.from(editableFields);
                    const currentIndex = allFields.indexOf(this);
                    const nextIndex = (currentIndex + 1) % allFields.length;
                    allFields[nextIndex].focus();
                }
            });
        });
    });
    </script>
</body>

</html>