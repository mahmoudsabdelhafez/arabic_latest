<!-- resources/views/verb-phoneme-positions/index.blade.php -->
<!DOCTYPE html>
<html lang="en" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>مواقع الأصوات في الأفعال</title>
    <link href="https://fonts.googleapis.com/css2?family=Amiri&family=Aref+Ruqaa&display=swap" rel="stylesheet">
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
        background: linear-gradient(135deg, #f5f7fa 0%, #e4e9f2 100%);
        color: var(--text-color);
        min-height: 100vh;
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

    .btn-edit {
        background: var(--secondary-color);
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

    .actions {
        display: flex;
        gap: 0.5rem;
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

    @media (max-width: 768px) {
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

        .responsive-table {
            overflow-x: auto;
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
            display: none;
        }
    }

    /* Additional Form Styling */
    .form-group {
        margin-bottom: 1.5rem;
    }

    .form-group label {
        display: block;
        margin-bottom: 0.5rem;
        font-weight: bold;
        color: var(--primary-color);
    }

    .form-control {
        width: 100%;
        padding: 0.75rem;
        border: 1px solid rgba(0, 0, 0, 0.1);
        border-radius: 8px;
        font-family: 'Amiri', serif;
        font-size: 1rem;
        transition: border-color 0.3s ease, box-shadow 0.3s ease;
        background-color: var(--white);
    }

    .form-control:focus {
        outline: none;
        border-color: var(--secondary-color);
        box-shadow: 0 0 0 3px rgba(58, 126, 113, 0.2);
    }

    .form-control.is-invalid {
        border-color: #dc3545;
    }

    .invalid-feedback {
        color: #dc3545;
        font-size: 0.875rem;
        margin-top: 0.25rem;
    }

    .form-actions {
        display: flex;
        gap: 1rem;
        margin-top: 2rem;
    }

    .btn-secondary {
        background: #6c757d;
    }

    select.form-control {
        -webkit-appearance: none;
        -moz-appearance: none;
        appearance: none;
        background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='%23212529' viewBox='0 0 16 16'%3E%3Cpath d='M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z'/%3E%3C/svg%3E");
        background-repeat: no-repeat;
        background-position: left 1rem center;
        background-size: 16px 12px;
        padding-left: 2.5rem;
    }

    @media (max-width: 768px) {
        .form-actions {
            flex-direction: column;
        }

        .form-actions .btn {
            width: 100%;
        }
    }
    </style>
</head>

<body>
    <header>
        <h1>نظام إدارة المواقع الصوتية</h1>
    </header>

    <div class="container">
        <div class="content-card">
            <div class="card-header">
                <h2 class="card-title">إضافة موقع صوت جديد</h2>
                <a href="{{ route('verb-phoneme-positions.index') }}" class="btn">العودة إلى القائمة</a>
            </div>

            <form action="{{ route('verb-phoneme-positions.store') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="verb_conjugation_id">تصريف الفعل</label>
                    <select name="verb_conjugation_id" id="verb_conjugation_id"
                        class="form-control @error('verb_conjugation_id') is-invalid @enderror" required>
                        <option value="">-- اختر تصريف الفعل --</option>
                        @foreach($augmentedThreeLetterVerbs as $conjugation)
                        <option value="{{ $conjugation->id }}">
                            {{ $conjugation->root->root }} ({{ $conjugation->pattern }})
                        </option>
                        @endforeach
                    </select>
                    @error('verb_conjugation_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- <div class="form-group">
                    <label for="phoneme_activity_id">نشاط الصوت</label>
                    <select name="phoneme_activity_id" id="phoneme_activity_id"
                        class="form-control @error('phoneme_activity_id') is-invalid @enderror" required>
                        <option value="">-- اختر نشاط الصوت --</option>
                        @foreach($phonemeActivities as $activity)
                        <option value="{{ $activity->id }}">
                            {{ $activity->phoneme->symbol }} ({{ $activity->name }})
                        </option>
                        @endforeach
                    </select>
                    @error('phoneme_activity_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div> -->
                <div class="form-group">
                    <label for="phoneme_activity_id">أختر حرف الزيادة</label>
                    <select id="phoneme" name="phoneme_id" class="form-control">
                        <option value="">اختر حرف الزيادة</option>
                        @foreach ($phonemes as $phoneme)
                        <option value="{{ $phoneme->phoneme_id }}">{{ $phoneme->letter }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="phoneme_activity_id">أختر تأثير حرف الزيادة</label>
                    <select id="phoneme_activity" name="phoneme_activity_id" class="form-control">
                        <option value="">اختر النشاط</option>
                    </select>
                </div>



                <div class="form-group">
                    <label for="position">الموقع</label>
                    <input type="number" name="position" id="position"
                        class="form-control @error('position') is-invalid @enderror" value="{{ old('position') }}"
                        required min="0">
                    @error('position')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-actions">
                    <button type="submit" class="btn">حفظ</button>
                    <a href="{{ route('verb-phoneme-positions.index') }}" class="btn btn-secondary">إلغاء</a>
                </div>
            </form>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
    $(document).ready(function() {
        $('#phoneme').change(function() {
            var phonemeId = $(this).val();
            $('#phoneme_activity').empty().append(
                '<option value="">جار التحميل...</option>');

            if (phonemeId) {
                $.ajax({
                    url: '/phoneme-activities/' + phonemeId,
                    type: 'GET',
                    success: function(data) {
                        $('#phoneme_activity').empty().append(
                            '<option value="">اختر النشاط</option>');
                        $.each(data, function(index, activity) {
                            $('#phoneme_activity').append(
                                '<option value="' + activity.id +
                                '">' + activity.type + '</option>');
                        });
                    }
                });
            } else {
                $('#phoneme_activity').empty().append(
                    '<option value="">اختر النشاط</option>');
            }
        });
    });
    </script>
</body>

</html>