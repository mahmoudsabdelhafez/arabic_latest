@extends('layouts.app')

@section('content')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <div class="container">
        <h2 class="table-header">الحركات النحوية</h2>

        <!-- Add Record Button -->
        <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addRecordModal">
            إضافة حركة نحوية جديدة
        </button>

        <!-- Back to Home Button -->
        <a href="/" class="btn btn-primary mb-3">العودة إلى الصفحة الرئيسية</a>

        <!-- Table Container -->
        <div class="table-container">
            <table class="table">
                <thead>
                    <tr>
                        <th>الحركة</th>
                        <th>الموقع</th>
                        <th>الوظيفة</th>
                        <th>جملة المثال</th>
                        <th>الإجراءات</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($records as $record)
                        <tr>
                            <td>{{ $record->haraka }}</td>
                            <td>{{ $record->position }}</td>
                            <td>{{ $record->function }}</td>
                            <td>{{ $record->example_sentence }}</td>
                            <td>
                                <div class="d-flex gap-2 justify-content-center">
                                    <!-- Edit Button -->
                                    <button class="btn btn-primary btn-sm edit-btn"
                                        data-id="{{ $record->id }}"
                                        data-haraka="{{ $record->haraka }}"
                                        data-position="{{ $record->position }}"
                                        data-function="{{ $record->function }}"
                                        data-example-sentence="{{ $record->example_sentence }}"
                                        data-bs-toggle="modal" data-bs-target="#editRecordModal">
                                        تعديل
                                    </button>

                                    <!-- Delete Button -->
                                    <form action="{{ route('grammatical_harakat.destroy', $record->id) }}" method="POST"
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
                    <h5 class="modal-title">إضافة حركة نحوية جديدة</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('grammatical_harakat.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">الحركة</label>
                            <select name="haraka" class="form-control" required>
                                <option value="الضمة">الضمة</option>
                                <option value="الفتحة">الفتحة</option>
                                <option value="الكسرة">الكسرة</option>
                                <option value="السكون">السكون</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">الموقع</label>
                            <select name="position" class="form-control" required>
                                <option value="رفع">رفع</option>
                                <option value="نصب">نصب</option>
                                <option value="جر">جر</option>
                                <option value="جزم">جزم</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">الوظيفة</label>
                            <input type="text" name="function" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">جملة المثال</label>
                            <input type="text" name="example_sentence" class="form-control" required>
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
                    <h5 class="modal-title">تعديل الحركة النحوية</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="editRecordForm" method="POST">
                        @csrf
                        @method('PUT')
                        <input type="hidden" id="edit-id" name="id">

                        <div class="mb-3">
                            <label class="form-label">الحركة</label>
                            <select id="edit-haraka" name="haraka" class="form-control" required>
                                <option value="الضمة">الضمة</option>
                                <option value="الفتحة">الفتحة</option>
                                <option value="الكسرة">الكسرة</option>
                                <option value="السكون">السكون</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">الموقع</label>
                            <select id="edit-position" name="position" class="form-control" required>
                                <option value="رفع">رفع</option>
                                <option value="نصب">نصب</option>
                                <option value="جر">جر</option>
                                <option value="جزم">جزم</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">الوظيفة</label>
                            <input type="text" id="edit-function" name="function" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">جملة المثال</label>
                            <input type="text" id="edit-example-sentence" name="example_sentence" class="form-control" required>
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
                    document.getElementById("edit-haraka").value = this.dataset.haraka;
                    document.getElementById("edit-position").value = this.dataset.position;
                    document.getElementById("edit-function").value = this.dataset.function;
                    document.getElementById("edit-example-sentence").value = this.dataset.exampleSentence;

                    // Set form action dynamically
                    document.getElementById("editRecordForm").action = `/grammatical_harakat/${this.dataset.id}`;
                });
            });
        });
    </script>

@endsection

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
