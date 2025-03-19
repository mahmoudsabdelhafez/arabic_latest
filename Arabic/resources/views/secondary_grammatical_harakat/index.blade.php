@extends('layouts.app')

@section('content')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <div class="container">
        <h2 class="table-header">الحركات النحوية الثانوية</h2>

        <!-- Add Record Button -->
        <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addRecordModal">
            إضافة حركة نحوية ثانوية جديدة
        </button>

        <!-- Back to Home Button -->
        <a href="/" class="btn btn-primary mb-3">العودة إلى الصفحة الرئيسية</a>

        <!-- Table Container -->
        <div class="table-container">
            <table class="table">
                <thead>
                    <tr>
                        <th>الحركة</th>
                        <th>الحالة</th>
                        <th>الوظيفة</th>
                        <th>جملة المثال</th>
                        <th>حالة الحذف</th> <!-- Added Column -->
                        <th>الإجراءات</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($records as $record)
                        <tr>
                            <td>{{ $record->haraka }}</td>
                            <td>{{ $record->state }}</td>
                            <td>{{ $record->function }}</td>
                            <td>{{ $record->example_sentence }}</td>
                            <td>
                                <!-- Show deleted status -->
                                @if($record->is_deleted)
                                    <span class="badge bg-danger">محذوف</span>
                                @else
                                    <span class="badge bg-success">نشط</span>
                                @endif
                            </td>
                            <td>
                                <div class="d-flex gap-2 justify-content-center">
                                    <!-- Edit Button -->
                                    <button class="btn btn-primary btn-sm edit-btn"
                                        data-id="{{ $record->id }}"
                                        data-haraka="{{ $record->haraka }}"
                                        data-state="{{ $record->state }}"
                                        data-function="{{ $record->function }}"
                                        data-example-sentence="{{ $record->example_sentence }}"
                                        data-bs-toggle="modal" data-bs-target="#editRecordModal">
                                        تعديل
                                    </button>

                                    <!-- Soft Delete Button -->
                                    @if($record->is_deleted == 0)
                                    <form action="{{ route('secondary_grammatical_harakat.destroy', $record->id) }}" method="POST"
                                          class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm"
                                                onclick="return confirm('هل أنت متأكد؟')">حذف</button>
                                    </form>
                                    @else
                                    <!-- Restore Button (Optional) -->
                                    <form action="{{ route('secondary_grammatical_harakat.restore', $record->id) }}" method="POST"
                                          class="d-inline">
                                        @csrf
                                        @method('POST')
                                        <button type="submit" class="btn btn-success btn-sm"
                                                onclick="return confirm('هل أنت متأكد من استعادة هذا العنصر؟')">استرجاع</button>
                                    </form>
                                    @endif
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
                    <h5 class="modal-title">إضافة حركة نحوية ثانوية جديدة</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('secondary_grammatical_harakat.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">الحركة</label>
                            <select name="haraka" class="form-control" required>
                                <option value="الواو">الواو</option>
                                <option value="الألف">الألف</option>
                                <option value="الياء">الياء</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">الحالة</label>
                            <select name="state" class="form-control" required>
                                <option value="رفع">رفع</option>
                                <option value="نصب">نصب</option>
                                <option value="جر">جر</option>
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
                    <h5 class="modal-title">تعديل الحركة النحوية الثانوية</h5>
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
                                <option value="الواو">الواو</option>
                                <option value="الألف">الألف</option>
                                <option value="الياء">الياء</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">الحالة</label>
                            <select id="edit-state" name="state" class="form-control" required>
                                <option value="رفع">رفع</option>
                                <option value="نصب">نصب</option>
                                <option value="جر">جر</option>
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
                    document.getElementById("edit-state").value = this.dataset.state;
                    document.getElementById("edit-function").value = this.dataset.function;
                    document.getElementById("edit-example-sentence").value = this.dataset.exampleSentence;

                    // Set form action dynamically
                    document.getElementById("editRecordForm").action = `/secondary-grammatical-harakats/${this.dataset.id}`;
                });
            });
        });
    </script>

@endsection

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
