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

    .d-none{
        display: none;
    }
    @media (max-width: 768px) {
        .d-none{
        display: block;
    }
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
    </style>
</head>

<body>
    <header>
        <h1>أحرف الزيادة</h1>
    </header>

    <div class="container">
        @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif

        <div class="content-card">
            <div class="card-header">
                <h2 class="card-title">مواقع أحرف الزيادة في الأفعال</h2>
                <a href="{{ route('verb-phoneme-positions.create') }}" class="btn">إضافة موقع جديد</a>
            </div>

            <div class="responsive-table">
                <table>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>الفعل</th>
                            <th>تصريف الفعل</th>
                            <th>الحرف</th>
                            <th>نوع الحرف</th>
                            <th>الموقع</th>
                            <th>الإجراءات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($positions as $position)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $position->augmentedThreeLetterVerb->root->root ?? 'غير محدد' }}</td>
                            <td>{{ $position->augmentedThreeLetterVerb->pattern ?? 'غير محدد' }}</td>
                            <td>{{ $position->phonemeActivity->phoneme->char ?? 'غير محدد' }}</tف>
                            <td>{{ $position->phonemeActivity->type ?? 'غير محدد' }}</td>
                            <!-- <td>{{ $position->phonemeActivity->grammatical_effect ?? 'غير محدد' }}</td> -->
                            <!-- <td>{{ $position->phonemeActivity->name ?? 'غير محدد' }}</td> -->
                            <td>{{ $position->position }}</td>
                            <td class="actions">
                                <!-- <a href="{{ route('verb-phoneme-positions.edit', $position) }}"
                                    class="btn btn-sm btn-edit">تعديل</a> -->
                                <form action="{{ route('verb-phoneme-positions.destroy', $position) }}" method="POST"
                                    onsubmit="return confirm('هل أنت متأكد من الحذف؟')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-delete">حذف</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" class="text-center">لا توجد مواقع صوتية مسجلة</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Mobile view for smaller screens -->
            @foreach($positions as $position)
            <div class="card-data d-none d-sm-none">
                <div class="card-data-item">
                    <span class="card-data-label">الفعل:</span>
                    <span>{{  $position->augmentedThreeLetterVerb->root->root ?? 'غير محدد' }}</span>
                </div>
                <div class="card-data-item">
                    <span class="card-data-label">تصريف الفعل:</span>
                    <span>{{ $position->augmentedThreeLetterVerb->pattern ?? 'غير محدد' }}</span>
                </div>
                <div class="card-data-item">
                    <span class="card-data-label">الحرف:</span>
                    <span>{{ $position->phonemeActivity->phoneme->char ?? 'غير محدد' }}</span>
                </div>
                <div class="card-data-item">
                    <span class="card-data-label">نوع الحرف :</span>
                    <span>{{ $position->phonemeActivity->type ?? 'غير محدد' }}</span>
                </div>
                <div class="card-data-item">
                    <span class="card-data-label">الموقع:</span>
                    <span>{{ $position->position }}</span>
                </div>
                <div class="card-data-actions">
                    <a href="{{ route('verb-phoneme-positions.edit', $position) }}"
                        class="btn btn-sm btn-edit">تعديل</a>
                    <form action="{{ route('verb-phoneme-positions.destroy', $position) }}" method="POST"
                        onsubmit="return confirm('هل أنت متأكد من الحذف؟')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-delete">حذف</button>
                    </form>
                </div>
            </div>
            @endforeach

            <div class="pagination-container">
                {{ $positions->links() }}
            </div>
        </div>
    </div>
</body>
</html>