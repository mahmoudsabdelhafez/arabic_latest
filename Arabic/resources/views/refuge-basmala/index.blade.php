<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>جداول اللجوء و البسملة</title>
    <link href="https://fonts.googleapis.com/css2?family=Amiri:wght@400;700&family=Aref+Ruqaa:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.rtl.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Amiri', serif;
            background-color: #f8f9fa;
        }

        .main-title {
            position: relative;
            padding-bottom: 1rem;
            margin-bottom: 2rem;
        }

        .main-title::after {
            content: '';
            position: absolute;
            bottom: 0;
            right: 50%;
            transform: translateX(50%);
            width: 60px;
            height: 4px;
            background: linear-gradient(90deg, #007bff, #0056b3);
            border-radius: 2px;
        }

        .tabs-container {
            background: white;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            margin-bottom: 2rem;
        }

        .tabs {
            display: flex;
            border-bottom: 1px solid #dee2e6;
            padding: 0;
            margin: 0;
            list-style: none;
        }

        .tab-button {
            flex: 1;
            padding: 1rem;
            border: none;
            background: none;
            color: #6c757d;
            font-weight: bold;
            cursor: pointer;
            transition: all 0.3s ease;
            position: relative;
        }

        .tab-button:hover {
            color: #007bff;
        }

        .tab-button.active {
            color: #007bff;
        }

        .tab-button.active::after {
            content: '';
            position: absolute;
            bottom: -1px;
            left: 0;
            right: 0;
            height: 2px;
            background-color: #007bff;
        }

        .tab-content {
            display: none;
            padding: 2rem;
        }

        .tab-content.active {
            display: block;
            animation: fadeIn 0.5s ease;
        }

        .table {
            margin: 0;
        }

        .table thead th {
            background-color: #f8f9fa;
            border-bottom: 2px solid #dee2e6;
            font-weight: bold;
        }

        .table tbody tr {
            transition: background-color 0.3s ease;
        }

        .table tbody tr:hover {
            background-color: rgba(0,123,255,0.05);
        }

        .icon {
            margin-left: 0.5rem;
            vertical-align: middle;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        @media (max-width: 768px) {
            .container {
                padding: 1rem;
            }
            
            .table-responsive {
                margin: 0;
            }
        }
    </style>
</head>
<body>
    <div class="container py-5">
        <h1 class="text-center main-title">جداول اللجوء و البسملة</h1>

        <div class="tabs-container">
            <ul class="tabs">
                <li>
                    <button class="tab-button active" data-tab="seeking-refuge">
                        <svg class="icon" width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                        </svg>
                        اللجوء و الاستعاذة
                    </button>
                </li>
                <li>
                    <button class="tab-button" data-tab="basmala">
                        <svg class="icon" width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                        </svg>
                        البسملة
                    </button>
                </li>
            </ul>

            <div id="seeking-refuge" class="tab-content active">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>النص الكامل</th>
                                <th>الحكم</th>
                                <th>الحالات</th>
                                <th>الملاحظة</th>
                                <th>التاريخ</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($seekingRefuges as $seekingRefuge)
                            <tr>
                                <td>{{ $seekingRefuge->formula }}</td>
                                <td>{{ $seekingRefuge->ruling }}</td>
                                <td>{{ $seekingRefuge->cases }}</td>
                                <td>{{ $seekingRefuge->note }}</td>
                                <td>{{ $seekingRefuge->created_at->format('Y-m-d') }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <div id="basmala" class="tab-content">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>النص الكامل</th>
                                <th>الموضع</th>
                                <th>أشكال البسملة</th>
                                <th>التاريخ</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($basmalas as $basmala)
                            <tr>
                                <td>{{ $basmala->formula }}</td>
                                <td>{{ $basmala->placement }}</td>
                                <td>{{ $basmala->forms_of_bismillah }}</td>
                                <td>{{ $basmala->created_at->format('Y-m-d') }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const tabButtons = document.querySelectorAll('.tab-button');
            const tabContents = document.querySelectorAll('.tab-content');

            tabButtons.forEach(button => {
                button.addEventListener('click', () => {
                    // Remove active class from all buttons and contents
                    tabButtons.forEach(btn => btn.classList.remove('active'));
                    tabContents.forEach(content => content.classList.remove('active'));

                    // Add active class to clicked button and corresponding content
                    button.classList.add('active');
                    const tabId = button.getAttribute('data-tab');
                    document.getElementById(tabId).classList.add('active');
                });
            });
        });
    </script>
</body>
</html>