@extends('layouts.app')

@section('content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<div class="container">
    <h2 class="table-header">الإعلال</h2>

    <!-- Add Record Button -->
    <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addRecordModal">
        إضافة إعلال جديد
    </button>
    
    <!-- Back to Home Button -->
    <a href="/" class="btn btn-primary mb-3">العودة إلى الصفحة الرئيسية</a>
    
    <!-- Table Container -->
    <div class="table-container">
        <table class="table">
            <thead>
                <tr>
                    <th>نوع الإعلال</th>
                    <th>الحالة</th>
                    <th>الكلمة وأصلها</th>
                    <th>التغيير الحاصل</th>
                    <th>السبب</th>
                    <th>الملاحظات</th>
                    <th>الإجراءات</th>
                </tr>
            </thead>
            <tbody>
            @foreach($records as $record)
                <tr>
                    <td>{{ $record->weakening_type }}</td>
                    <td>{{ $record->condition }}</td>
                    <td>{{ $record->original_word }}</td>
                    <td>{{ $record->change_happened }}</td>
                    <td>{{ $record->reason }}</td>
                    <td>{{ $record->notes }}</td>
                    <td>
                        <div class="d-flex gap-2 justify-content-center">
                            <!-- Edit Button -->
                            <button class="btn btn-primary btn-sm edit-btn"
                                data-id="{{ $record->id }}"
                                data-weakening_type="{{ $record->weakening_type }}"
                                data-condition="{{ $record->condition }}"
                                data-original_word="{{ $record->original_word }}"
                                data-change_happened="{{ $record->change_happened }}"
                                data-reason="{{ $record->reason }}"
                                data-notes="{{ $record->notes }}"
                                data-bs-toggle="modal"
                                data-bs-target="#editRecordModal">
                                تعديل
                            </button>

                            <!-- Delete Button -->
                            <form action="{{ route('analyzing_weakening.destroy', $record->id) }}" method="POST" class="d-inline">
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
                <h5 class="modal-title">إضافة إعلال جديد</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('analyzing_weakening.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">نوع الإعلال</label>
                        <input type="text" name="weakening_type" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">الحالة</label>
                        <textarea name="condition" class="form-control" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">الكلمة وأصلها</label>
                        <textarea name="original_word" class="form-control" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">التغيير الحاصل</label>
                        <textarea name="change_happened" class="form-control" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">السبب</label>
                        <textarea name="reason" class="form-control" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">الملاحظات</label>
                        <textarea name="notes" class="form-control"></textarea>
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
                <h5 class="modal-title">تعديل الإعلال</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editRecordForm" method="POST">
                    @csrf
                    @method('PUT')
                    <input type="hidden" id="edit-id" name="id">
                    
                    <div class="mb-3">
                        <label class="form-label">نوع الإعلال</label>
                        <input type="text" id="edit-weakening_type" name="weakening_type" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">الحالة</label>
                        <textarea id="edit-condition" name="condition" class="form-control" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">الكلمة وأصلها</label>
                        <textarea id="edit-original_word" name="original_word" class="form-control" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">التغيير الحاصل</label>
                        <textarea id="edit-change_happened" name="change_happened" class="form-control" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">السبب</label>
                        <textarea id="edit-reason" name="reason" class="form-control" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">الملاحظات</label>
                        <textarea id="edit-notes" name="notes" class="form-control"></textarea>
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
            document.getElementById("edit-weakening_type").value = this.dataset.weakening_type;
            document.getElementById("edit-condition").value = this.dataset.condition;
            document.getElementById("edit-original_word").value = this.dataset.original_word;
            document.getElementById("edit-change_happened").value = this.dataset.change_happened;
            document.getElementById("edit-reason").value = this.dataset.reason;
            document.getElementById("edit-notes").value = this.dataset.notes;
            document.getElementById("editRecordForm").action = `/analyzing_weakening/${this.dataset.id}`;
        });
    });
});

</script>

@endsection

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>