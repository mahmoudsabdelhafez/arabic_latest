@extends('layouts.app')

@section('content')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <div class="container">
        <h2 class="table-header">الظروف المدمجة</h2>

        <!-- Add Record Button -->
        <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addRecordModal">
            إضافة ظرف جديد
        </button>

        <!-- Back to Home Button -->
        <a href="/" class="btn btn-primary mb-3">العودة إلى الصفحة الرئيسية</a>

        <!-- Table Container -->
        <div class="table-container">
            <table class="table">
                <thead>
                    <tr>
                        <th>النوع</th>
                        <th>الظرف</th>
                        <th>جملة المثال</th>
                        <th>التحليل النحوي</th>
                        <th>التحليل الدلالي</th>
                        <th>الإجراءات</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($records as $record)
                        <tr>
                            <td>{{ $record->adverb_type }}</td>
                            <td>{{ $record->adverb }}</td>
                            <td>{{ $record->example_sentence }}</td>
                            <td>{{ $record->syntactic_analysis }}</td>
                            <td>{{ $record->semantic_analysis }}</td>
                            <td>
                                <div class="d-flex gap-2 justify-content-center">
                                    <!-- Edit Button -->
                                    <button class="btn btn-primary btn-sm edit-btn"
                                        data-id="{{ $record->id }}"
                                        data-adverb-type="{{ $record->adverb_type }}"
                                        data-adverb="{{ $record->adverb }}"
                                        data-example-sentence="{{ $record->example_sentence }}"
                                        data-syntactic-analysis="{{ $record->syntactic_analysis }}"
                                        data-semantic-analysis="{{ $record->semantic_analysis }}"
                                        data-bs-toggle="modal" data-bs-target="#editRecordModal">
                                        تعديل
                                    </button>

                                    <!-- Delete Button -->
                                    <form action="{{ route('built_in_adverbs.destroy', $record->id) }}" method="POST"
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
                    <h5 class="modal-title">إضافة ظرف جديد</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('built_in_adverbs.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
    <label class="form-label">النوع</label>
    <select id="edit-adverb-type" name="adverb_type" class="form-control" required>
        <option value="ضم">ضم</option>
        <option value="فتح">فتح</option>
        <option value="سكون">سكون</option>
    </select>
</div>

                        <div class="mb-3">
                            <label class="form-label">الظرف</label>
                            <input type="text" name="adverb" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">جملة المثال</label>
                            <input type="text" name="example_sentence" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">التحليل النحوي</label>
                            <input type="text" name="syntactic_analysis" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">التحليل الدلالي</label>
                            <input type="text" name="semantic_analysis" class="form-control" required>
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
                    <h5 class="modal-title">تعديل الظرف</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="editRecordForm" method="POST">
                        @csrf
                        @method('PUT')
                        <input type="hidden" id="edit-id" name="id">

                        <div class="mb-3">
    <label class="form-label">النوع</label>
    <select id="edit-adverb-type" name="adverb_type" class="form-control" required>
        <option value="ضم">ضم</option>
        <option value="فتح">فتح</option>
        <option value="سكون">سكون</option>
    </select>
</div>

                        <div class="mb-3">
                            <label class="form-label">الظرف</label>
                            <input type="text" id="edit-adverb" name="adverb" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">جملة المثال</label>
                            <input type="text" id="edit-example-sentence" name="example_sentence" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">التحليل النحوي</label>
                            <input type="text" id="edit-syntactic-analysis" name="syntactic_analysis" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">التحليل الدلالي</label>
                            <input type="text" id="edit-semantic-analysis" name="semantic_analysis" class="form-control" required>
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
                    document.getElementById("edit-adverb-type").value = this.dataset.adverbType;
                    document.getElementById("edit-adverb").value = this.dataset.adverb;
                    document.getElementById("edit-example-sentence").value = this.dataset.exampleSentence;
                    document.getElementById("edit-syntactic-analysis").value = this.dataset.syntacticAnalysis;
                    document.getElementById("edit-semantic-analysis").value = this.dataset.semanticAnalysis;

                    // Set form action dynamically
                    document.getElementById("editRecordForm").action = `/built_in_adverbs/${this.dataset.id}`;
                });
            });
        });
    </script>

@endsection

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
