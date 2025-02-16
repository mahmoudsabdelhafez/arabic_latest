<!DOCTYPE html>
<html dir="rtl" lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>إدارة التأثيرات النحوية</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
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
            min-height: 100vh;
            background: linear-gradient(135deg, #f5f7fa 0%, #e4e9f2 100%);
            color: var(--text-color);
        }

        header {
            background: linear-gradient(45deg, var(--gradient-start), var(--gradient-end));
            padding: 2rem;
            text-align: center;
            color: var(--white);
            position: relative;
            overflow: hidden;
            margin-bottom: 2rem;
        }

        header::before {
            content: '';
            position: absolute;
            top: 0;
            right: 0;
            left: 0;
            bottom: 0;
            background: radial-gradient(circle at 50% 50%, rgba(255, 255, 255, 0.1) 0%, transparent 60%);
            opacity: 0.2;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 1rem;
        }

        .content-section {
            background: var(--white);
            border-radius: 12px;
            padding: 2rem;
            margin-bottom: 2rem;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }

        .section-title {
            color: var(--primary-color);
            font-size: 1.8rem;
            margin-bottom: 1.5rem;
            font-family: 'Aref Ruqaa', serif;
            position: relative;
            padding-bottom: 0.75rem;
            text-align: center;
        }

        .section-title::after {
            content: '';
            position: absolute;
            bottom: 0;
            right: 50%;
            transform: translateX(50%);
            width: 60px;
            height: 4px;
            background: linear-gradient(45deg, var(--gradient-start), var(--gradient-end));
            border-radius: 2px;
        }

        .form-control {
            width: 100%;
            padding: 0.75rem;
            border: 1px solid rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            margin-bottom: 1rem;
            font-family: 'Amiri', serif;
        }

        .btn {
            padding: 0.75rem 1.5rem;
            border-radius: 8px;
            border: none;
            cursor: pointer;
            font-family: 'Amiri', serif;
            font-size: 1rem;
            transition: all 0.3s ease;
        }

        .btn-primary {
            background: linear-gradient(45deg, var(--gradient-start), var(--gradient-end));
            color: var(--white);
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        }

        .table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 1rem;
        }

        .table th, .table td {
            padding: 1rem;
            border: 1px solid rgba(0, 0, 0, 0.1);
            text-align: right;
        }

        .table th {
            background: linear-gradient(45deg, var(--gradient-start), var(--gradient-end));
            color: var(--white);
        }

        .table tr:nth-child(even) {
            background-color: rgba(0, 0, 0, 0.02);
        }

        .btn-sm {
            padding: 0.5rem 1rem;
            font-size: 0.875rem;
        }

        .btn-warning {
            background: var(--accent-color);
            color: var(--white);
        }

        .btn-danger {
            background: #dc3545;
            color: var(--white);
        }

        footer {
            text-align: center;
            padding: 2rem;
            background: linear-gradient(45deg, var(--gradient-start), var(--gradient-end));
            color: var(--white);
            margin-top: 2rem;
        }

        @media (max-width: 768px) {
            .container {
                padding: 0.5rem;
            }
            
            .content-section {
                padding: 1rem;
            }

            .table {
                display: block;
                overflow-x: auto;
            }
        }
    </style>
</head>
<body>
    <header>
        <h1><i class="fas fa-code"></i> إدارة التأثيرات النحوية</h1>
    </header>

    <div class="container">
        <div class="content-section">
            <h2 class="section-title"><i class="fas fa-list"></i> قائمة التأثيرات النحوية</h2>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>يطبق على</th>
                            <th>الحالة الناتجة</th>
                            <th>شرط السياق</th>
                            <th>ترتيب الأولوية</th>
                            <th>ملاحظات</th>
                            @if (auth()->check() )
                            <th>الإجراءات</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody id="effectsTableBody">
                        @foreach($syntacticEffects as $effect)
                            <tr data-id="{{ $effect->id }}">
                                <td class="applied-on">{{ $effect->applied_on }}</td>
                                <td class="result-case">{{ $effect->result_case }}</td>
                                <td class="context-condition">{{ $effect->context_condition }}</td>
                                <td class="priority-order">{{ $effect->priority_order }}</td>
                                <td class="notes">{{ $effect->notes }}</td>
                                @if (auth()->check() )
                                <td>
                                    <button onclick="openEditModal({{ $effect->id }})" class="btn btn-warning btn-sm">
                                        <i class="fas fa-edit"></i> تعديل
                                    </button>
                                    <button onclick="handleDelete({{ $effect->id }})" class="btn btn-danger btn-sm">
                                        <i class="fas fa-trash"></i> حذف
                                    </button>
                                </td>
                                @endif
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="content-section">
            <h2 class="section-title"><i class="fas fa-plus-circle"></i> إضافة تأثير نحوي جديد</h2>
            <form id="addEffectForm">
                <div class="mb-3">
                    <label for="applied_on" class="form-label">يطبق على</label>
                    <input type="text" name="applied_on" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="result_case" class="form-label">الحالة الناتجة</label>
                    <input type="text" name="result_case" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="context_condition" class="form-label">شرط السياق</label>
                    <textarea name="context_condition" class="form-control" rows="3"></textarea>
                </div>
                <div class="mb-3">
                    <label for="priority_order" class="form-label">ترتيب الأولوية</label>
                    <select name="priority_order" class="form-control">
                        <option value="عالي">عالي</option>
                        <option value="متوسط">متوسط</option>
                        <option value="منخفض">منخفض</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="notes" class="form-label">ملاحظات</label>
                    <textarea name="notes" class="form-control" rows="3"></textarea>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> حفظ</button>
                </div>
            </form>
        </div>
    </div>

    <script>
    document.addEventListener("DOMContentLoaded", function () {
        document.getElementById("addEffectForm").addEventListener("submit", function(event) {
            event.preventDefault();
            let formData = new FormData(this);

            fetch("{{ route('syntactic-effects.store') }}", {
                method: "POST",
                body: formData,
                headers: {
                    "X-CSRF-TOKEN": "{{ csrf_token() }}"
                }
            })
            .then(response => response.json())
            .then(data => {
                alert(data.status === "success" ? "تمت إضافة التأثير النحوي بنجاح!" : "حدث خطأ أثناء الإضافة!");
                if (data.status === "success") location.reload();
            })
            .catch(error => console.error("Error:", error));
        });
    });

    function openEditModal(effectId) {
        let effectRow = document.querySelector(`tr[data-id='${effectId}']`);
        if (!effectRow) return;

        let appliedOn = effectRow.querySelector(".applied-on").innerText;
        let resultCase = effectRow.querySelector(".result-case").innerText;
        let contextCondition = effectRow.querySelector(".context-condition").innerText;
        let priorityOrder = effectRow.querySelector(".priority-order").innerText;
        let notes = effectRow.querySelector(".notes").innerText;

        document.querySelector("#editModal input[name='applied_on']").value = appliedOn;
        document.querySelector("#editModal input[name='result_case']").value = resultCase;
        document.querySelector("#editModal textarea[name='context_condition']").value = contextCondition;
        document.querySelector("#editModal select[name='priority_order']").value = priorityOrder;
        document.querySelector("#editModal textarea[name='notes']").value = notes;
        document.querySelector("#editModal form").setAttribute("data-id", effectId);
        document.querySelector("#editModal").style.display = "block";
    }

    function handleDelete(effectId) {
        if (!confirm("هل أنت متأكد أنك تريد حذف هذا التأثير النحوي؟")) return;

        fetch(`/syntactic-effects/${effectId}`, {
            method: "DELETE",
            headers: {
                "X-CSRF-TOKEN": "{{ csrf_token() }}"
            }
        })
        .then(response => response.json())
        .then(data => {
            alert(data.status === "success" ? "تم حذف التأثير النحوي بنجاح!" : "حدث خطأ أثناء الحذف!");
            if (data.status === "success") location.reload();
        })
        .catch(error => console.error("Error:", error));
    }
    </script>
</body>
</html>