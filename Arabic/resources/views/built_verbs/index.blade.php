@extends('layouts.app')

@section('content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<div class="container">
    <h2 class="table-header">الأفعال المبنية</h2>

    <!-- Add Verb Button -->
    <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addVerbModal">
        إضافة فعل جديد
    </button>
<!-- Back to Home Button -->
<a href="/" class="btn btn-primary mb-3">العودة إلى الصفحة الرئيسية</a>
    <!-- Table Container -->
    <div class="table-container">
        <table class="table">
            <thead>
                <tr>
                    <th>الزمن</th>
                    <th>النوع</th>
                    <th>الوصف</th>
                    <th>المثال</th>
                    <th>الإجراءات</th>
                </tr>
            </thead>
            <tbody>
            @foreach($builtVerbs as $verb)
                <tr>
                    <td>{{ $verb->tense }}</td>
                    <td>{{ $verb->type }}</td>
                    <td>{{ $verb->description }}</td>
                    <td>{{ $verb->example }}</td>
                    <td>
                        <div class="d-flex gap-2 justify-content-center">
                            <!-- Edit Button -->
                            <button class="btn btn-primary btn-sm edit-btn"
                                data-id="{{ $verb->id }}"
                                data-tense="{{ $verb->tense }}"
                                data-type="{{ $verb->type }}"
                                data-description="{{ $verb->description }}"
                                data-example="{{ $verb->example }}"
                                data-bs-toggle="modal"
                                data-bs-target="#editVerbModal">
                                تعديل
                            </button>

                            <!-- Delete Button -->
                            <form action="{{ route('built_verbs.destroy', $verb->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('هل أنت متأكد؟')">حذف</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>

<!-- Add Verb Modal -->
<div class="modal fade" id="addVerbModal" tabindex="-1" aria-labelledby="addVerbModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">إضافة فعل جديد</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('built_verbs.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">الزمن</label>
                        <input type="text" name="tense" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">النوع</label>
                        <input type="text" name="type" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">الوصف</label>
                        <textarea name="description" class="form-control" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">المثال</label>
                        <input type="text" name="example" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-primary">إضافة</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Edit Verb Modal -->
<div class="modal fade" id="editVerbModal" tabindex="-1" aria-labelledby="editVerbModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">تعديل الفعل</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editVerbForm" method="POST">
                    @csrf
                    @method('PUT')
                    <input type="hidden" id="edit-id" name="id">
                    <div class="mb-3">
                        <label class="form-label">الزمن</label>
                        <input type="text" id="edit-tense" name="tense" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">النوع</label>
                        <input type="text" id="edit-type" name="type" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">الوصف</label>
                        <textarea id="edit-description" name="description" class="form-control" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">المثال</label>
                        <input type="text" id="edit-example" name="example" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-primary">حفظ التعديلات</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener("DOMContentLoaded", function () {
    document.querySelectorAll(".edit-btn").forEach(button => {
        button.addEventListener("click", function () {
            const id = this.dataset.id;
            const tense = this.dataset.tense;
            const type = this.dataset.type;
            const description = this.dataset.description;
            const example = this.dataset.example;

            document.getElementById("edit-id").value = id;
            document.getElementById("edit-tense").value = tense;
            document.getElementById("edit-type").value = type;
            document.getElementById("edit-description").value = description;
            document.getElementById("edit-example").value = example;

            document.getElementById("editVerbForm").action = `/built_verbs/${id}`;
        });
    });
});
</script>

@endsection

<!-- Bootstrap 5 JS (Requires Popper.js) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
