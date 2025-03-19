@extends('layouts.app')

@section('content')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <div class="container">
        <h2 class="table-header">الكلمات المشتقة</h2>

        <!-- Add Record Button -->
        <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addRecordModal">
            إضافة كلمة جديدة
        </button>

        <!-- Back to Home Button -->
        <a href="/" class="btn btn-primary mb-3">العودة إلى الصفحة الرئيسية</a>

        <!-- Table Container -->
        <div class="table-container">
            <table class="table">
                <thead>
                    <tr>
                        <th>الجذر</th>
                        <th>نوع الكلمة</th>
                        <th>الوزن الصرفي</th>
                        <th>مثال</th>
                        <th>الإجراءات</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($records as $record)
                        <tr>
                        <td>{{ $record->verbConjugation ? $record->verbConjugation->root : 'غير متوفر' }}</td> 
                        <td>{{ $record->type }}</td>
                            <td>{{ $record->pattern }}</td>
                            <td>{{ $record->example }}</td>
                            <td>
                                <div class="d-flex gap-2 justify-content-center">
                                    <!-- Edit Button -->
                                    <button class="btn btn-primary btn-sm edit-btn" data-id="{{ $record->id }}"
                                        data-type="{{ $record->type }}" data-pattern="{{ $record->pattern }}"
                                        data-example="{{ $record->example }}" data-root-id="{{ $record->root_id }}"
                                        data-bs-toggle="modal" data-bs-target="#editRecordModal">
                                        تعديل
                                    </button>

                                    <!-- Delete Button -->
                                    <form action="{{ route('derived_words.destroy', $record->id) }}" method="POST"
                                        class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm"
                                            onclick="return confirm('هل أنت متأكد؟')">حذف</button>
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
                    <h5 class="modal-title">إضافة كلمة جديدة</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('derived_words.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">نوع الكلمة</label>
                            <input type="text" name="type" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">الوزن الصرفي</label>
                            <input type="text" name="pattern" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">مثال</label>
                            <input type="text" name="example" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">الجذر</label>
                            <select name="root_id" class="form-control" required>
                                <option value="">اختر الجذر</option>
                                @foreach($roots as $root)
                                    <option value="{{ $root->id }}">{{ $root->root }}</option>
                                @endforeach
                            </select>
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
                    <h5 class="modal-title">تعديل الكلمة</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="editRecordForm" method="POST">
                        @csrf
                        @method('PUT')
                        <input type="hidden" id="edit-id" name="id">

                        <div class="mb-3">
                            <label class="form-label">نوع الكلمة</label>
                            <input type="text" id="edit-type" name="type" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">الوزن الصرفي</label>
                            <input type="text" id="edit-pattern" name="pattern" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">مثال</label>
                            <input type="text" id="edit-example" name="example" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">الجذر</label>
                            <select name="root_id" id="edit-root-id" class="form-control" required>
                                @foreach($roots as $root)
                                    <option value="{{ $root->id }}">{{ $root->root }}</option>
                                @endforeach
                            </select>
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
                    document.getElementById("edit-type").value = this.dataset.type;
                    document.getElementById("edit-pattern").value = this.dataset.pattern;
                    document.getElementById("edit-example").value = this.dataset.example;
                    document.getElementById("edit-root-id").value = this.dataset.rootId;  // Pre-select the root ID
                    document.getElementById("editRecordForm").action = `/derived_words/${this.dataset.id}`;
                });
            });
        });
    </script>

@endsection

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>