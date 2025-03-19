@extends('layouts.app')

@section('content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<div class="container">
    <h2 class="table-header">أسماء الإشارة</h2>

    <!-- Add Record Button -->
    <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addRecordModal">
        إضافة اسم إشارة جديد
    </button>

    <!-- Back to Home Button -->
    <a href="/" class="btn btn-primary mb-3">العودة إلى الصفحة الرئيسية</a>

    <!-- Table Container -->
    <div class="table-container">
        <table class="table">
            <thead>
                <tr>
                    <th>الاسم</th>
                    <th>المثال</th>
                    <th>الجنس</th>
                    <th>تصنيف العدد</th>
                    <th>المسافة</th>
                    <th>الحالة النحوية</th>
                    <th>التحليل الدلالي</th>
                    <th>التحليل السياقي</th>
                    <th>الإجراءات</th>
                </tr>
            </thead>
            <tbody>
            @foreach($records as $record)
                <tr>
                    <td>{{ $record->name }}</td>
                    <td>{{ $record->example }}</td>
                    <td>{{ $record->gender }}</td>
                    <td>{{ $record->number_classification }}</td>
                    <td>{{ $record->distance }}</td>
                    <td>{{ $record->grammatical_status }}</td>
                    <td>{{ $record->semantic_analysis }}</td>
                    <td>{{ $record->contextual_analysis }}</td>
                    <td>
                        <div class="d-flex gap-2 justify-content-center">
                            <!-- Edit Button -->
                            <button class="btn btn-primary btn-sm edit-btn"
                                data-id="{{ $record->id }}"
                                data-name="{{ $record->name }}"
                                data-example="{{ $record->example }}"
                                data-gender="{{ $record->gender }}"
                                data-number_classification="{{ $record->number_classification }}"
                                data-distance="{{ $record->distance }}"
                                data-grammatical_status="{{ $record->grammatical_status }}"
                                data-semantic_analysis="{{ $record->semantic_analysis }}"
                                data-contextual_analysis="{{ $record->contextual_analysis }}"
                                data-bs-toggle="modal"
                                data-bs-target="#editRecordModal">
                                تعديل
                            </button>

                            <!-- Delete Button -->
                            <form action="{{ route('demonstrative_pronouns.destroy', $record->id) }}" method="POST" class="d-inline">
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

<!-- Add Record Modal -->
<div class="modal fade" id="addRecordModal" tabindex="-1" aria-labelledby="addRecordModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">إضافة اسم إشارة جديد</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('demonstrative_pronouns.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">الاسم</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">المثال</label>
                        <input type="text" name="example" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">الجنس</label>
                        <input type="text" name="gender" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">تصنيف العدد</label>
                        <input type="text" name="number_classification" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">المسافة</label>
                        <input type="text" name="distance" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">الحالة النحوية</label>
                        <input type="text" name="grammatical_status" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">التحليل الدلالي</label>
                        <textarea name="semantic_analysis" class="form-control" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">التحليل السياقي</label>
                        <textarea name="contextual_analysis" class="form-control" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">إضافة</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Edit Record Modal -->
<div class="modal fade" id="editRecordModal" tabindex="-1" aria-labelledby="editRecordModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">تعديل اسم الإشارة</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editRecordForm" method="POST">
                    @csrf
                    @method('PUT')
                    <input type="hidden" id="edit-id" name="id">
                    
                    <div class="mb-3">
                        <label class="form-label">الاسم</label>
                        <input type="text" id="edit-name" name="name" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">المثال</label>
                        <input type="text" id="edit-example" name="example" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">الجنس</label>
                        <input type="text" id="edit-gender" name="gender" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">تصنيف العدد</label>
                        <input type="text" id="edit-number_classification" name="number_classification" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">المسافة</label>
                        <input type="text" id="edit-distance" name="distance" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">الحالة النحوية</label>
                        <input type="text" id="edit-grammatical_status" name="grammatical_status" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">التحليل الدلالي</label>
                        <textarea id="edit-semantic_analysis" name="semantic_analysis" class="form-control" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">التحليل السياقي</label>
                        <textarea id="edit-contextual_analysis" name="contextual_analysis" class="form-control" required></textarea>
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
            document.getElementById("edit-id").value = this.dataset.id;
            Object.keys(this.dataset).forEach(key => {
                let input = document.getElementById(`edit-${key}`);
                if (input) input.value = this.dataset[key];
            });
            document.getElementById("editRecordForm").action = `/demonstrative_pronouns/${this.dataset.id}`;
        });
    });
});
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
@endsection
