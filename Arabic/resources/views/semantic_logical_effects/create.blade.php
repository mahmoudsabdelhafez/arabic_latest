<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Semantic Logical Effects</title>
    <link
        href="https://fonts.googleapis.com/css2?family=Aref+Ruqaa:wght@400;700&family=Amiri:wght@400;700&family=Roboto:wght@300;400;700&display=swap"
        rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
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

    .table th,
    .table td {
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
        <h1><i class="fas fa-code"></i> إدارة التأثيرات المنطقية الدلالية</h1>
    </header>

    <div class="container">
        <div class="content-section">
            <h2 class="section-title"><i class="fas fa-list"></i> قائمة التأثيرات المنطقية الدلالية</h2>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>العلاقة النموذجية</th>
                            <th>نوع النسبة</th>
                            <th>الأدوار الدلالية</th>
                            <th>الشروط</th>
                            <th>ملاحظات</th>
                            @if (auth()->check() )
                            <th>الإجراءات</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody id="effectsTableBody">
                        @foreach($semanticLogicalEffects as $effect)
                        <tr>
                            <td>{{ $effect->typical_relation }}</td>
                            <td>{{ $effect->nisbah_type }}</td>
                            <td>{{ $effect->semantic_roles }}</td>
                            <td>{{ $effect->conditions }}</td>
                            <td>{{ $effect->notes }}</td>
                            @if (auth()->check() )
                            <td>
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
        @if (auth()->check() )
        <div class="content-section">
            <h2 class="section-title"><i class="fas fa-plus-circle"></i> إضافة تأثير منطقي دلالي جديد</h2>
            <form id="semanticEffectForm">
                <div class="mb-3">
                    <label for="typical_relation" class="form-label">العلاقة النموذجية</label>
                    <input type="text" name="typical_relation" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="nisbah_type" class="form-label">نوع النسبة</label>
                    <input type="text" name="nisbah_type" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="semantic_roles" class="form-label">الأدوار الدلالية</label>
                    <textarea name="semantic_roles" class="form-control" rows="3" required></textarea>
                </div>
                <div class="mb-3">
                    <label for="conditions" class="form-label">الشروط</label>
                    <textarea name="conditions" class="form-control" rows="3"></textarea>
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
        @endif
    </div>
    

    <script>
    document.addEventListener("DOMContentLoaded", function() {

        // Handle form submission for creating a new semantic logical effect
        document.getElementById("semanticEffectForm").addEventListener("submit", function(event) {
            event.preventDefault();
            let form = event.target;
            let formData = new FormData(form);

            fetch("{{ route('semantic-logical-effects.store') }}", {
                    method: "POST",
                    body: formData,
                    headers: {
                        "X-CSRF-TOKEN": "{{ csrf_token() }}"
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if (data.status === "success") {
                        alert("تمت إضافة التأثير بنجاح!");
                        location.reload(); // Reload to show the updated list
                    } else {
                        alert("حدث خطأ أثناء الإضافة!");
                    }
                })
                .catch(error => console.error("Error:", error));
        });

        // Handle form submission for editing an existing semantic logical effect
        document.getElementById("editEffectForm").addEventListener("submit", function(event) {
            event.preventDefault();

            let effectId = document.getElementById("editEffectId").value;
            let formData = new FormData(this);

            fetch(`/semantic-logical-effects/${effectId}`, {
                    method: "POST",
                    body: formData,
                    headers: {
                        "X-CSRF-TOKEN": "{{ csrf_token() }}",
                        "Accept": "application/json"
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if (data.status === "success") {
                        alert("تم التحديث بنجاح!");
                        location.reload(); // Reload the page after update
                    } else {
                        alert("حدث خطأ أثناء التحديث!");
                    }
                })
                .catch(error => console.error("Error:", error));
        });
    });

    // Open the edit modal and fetch data for the specific effect
    function openEditModal(effectId) {
        fetch(`/semantic-logical-effects/${effectId}/edit`)
            .then(response => response.json())
            .then(data => {
                if (data.status === "success") {
                    document.getElementById("edit_typical_relation").value = data.effect.typical_relation;
                    document.getElementById("edit_nisbah_type").value = data.effect.nisbah_type;
                    document.getElementById("edit_semantic_roles").value = data.effect.semantic_roles;
                    document.getElementById("edit_conditions").value = data.effect.conditions;
                    document.getElementById("edit_notes").value = data.effect.notes;
                    document.getElementById("editEffectId").value = effectId;

                    // Show the edit modal using Bootstrap
                    let editModal = new bootstrap.Modal(document.getElementById("editEffectModal"));
                    editModal.show();
                } else {
                    alert("حدث خطأ أثناء جلب البيانات!");
                }
            })
            .catch(error => console.error("Error fetching effect data:", error));
    }

    // Handle the delete action for a specific effect
    function handleDelete(effectId) {
        if (!confirm("هل أنت متأكد أنك تريد الحذف؟")) return;

        fetch(`/semantic-logical-effects/${effectId}`, {
                method: "DELETE",
                headers: {
                    "X-CSRF-TOKEN": "{{ csrf_token() }}"
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.status === "success") {
                    alert("تم الحذف بنجاح!");
                    location.reload(); // Reload to update the list after deletion
                } else {
                    alert("حدث خطأ أثناء الحذف!");
                }
            })
            .catch(error => console.error("Error:", error));
    }
    </script>

</body>


</html>