<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>إدخال الفعل</title>
    <link href="https://fonts.googleapis.com/css2?family=Amiri:wght@400;700&family=Aref+Ruqaa:wght@400;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-color: #1a5f7a;
            --secondary-color: #c7b7a3;
            --accent-color: #e6d5b8;
            --text-color: #2b2b2b;
            --white: #ffffff;
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
            display: flex;
            flex-direction: column;
        }

        header {
            background: var(--primary-color);
            padding: 2rem;
            position: relative;
            overflow: hidden;
        }

        header::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(45deg, rgba(255,255,255,0.1) 25%, transparent 25%),
                        linear-gradient(-45deg, rgba(255,255,255,0.1) 25%, transparent 25%);
            background-size: 60px 60px;
            opacity: 0.1;
        }

        h1 {
            font-family: 'Aref Ruqaa', serif;
            color: var(--white);
            text-align: center;
            font-size: 2.5rem;
            position: relative;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.2);
        }

        .container {
            flex: 1;
            padding: 3rem 1rem;
            width: 100%;
            max-width: 1200px;
            margin: 0 auto;
        }

        /* Form Styles */
        .verb-form {
            background: var(--white);
            padding: 2rem;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            margin: 2rem auto;
            max-width: 600px;
            text-align: right;
        }

        .form-group {
            margin-bottom: 1.5rem;
            display: flex;
            gap: 1rem;
            align-items: center;
            justify-content: flex-end;
        }

        label {
            font-size: 1.2rem;
            color: var(--text-color);
            font-weight: bold;
        }

        input[type="text"] {
            padding: 0.8rem 1rem;
            border: 2px solid var(--secondary-color);
            border-radius: 4px;
            font-size: 1.1rem;
            font-family: 'Amiri', serif;
            width: 60%;
            transition: border-color 0.3s ease;
        }

        input[type="text"]:focus {
            outline: none;
            border-color: var(--primary-color);
        }

        button {
            background: var(--primary-color);
            color: var(--white);
            border: none;
            padding: 0.8rem 2rem;
            font-size: 1.1rem;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            font-family: 'Amiri', serif;
        }

        button:hover {
            background-color: #14495e;
        }

        /* Table Styles */
        table {
            width: 100%;
            margin: 30px auto;
            border-collapse: collapse;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            background-color: var(--white);
        }

        th, td {
            padding: 15px;
            text-align: center;
        }

        th {
            background-color: var(--primary-color);
            color: var(--white);
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        td {
            font-size: 16px;
            color: #555;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        .footer {
            background: var(--primary-color);
            color: var(--white);
            text-align: center;
            padding: 1.5rem;
            margin-top: auto;
        }

        @media (max-width: 768px) {
            .container {
                padding: 1rem;
            }

            .verb-form {
                padding: 1rem;
            }

            .form-group {
                flex-direction: column;
                gap: 0.5rem;
                align-items: stretch;
            }

            input[type="text"] {
                width: 100%;
            }

            h1 {
                font-size: 2rem;
            }
        }
    </style>
</head>
<body>
    <header>
        <h1>أدخل الفعل العربي</h1>
    </header>

    <div class="container">
        <form method="POST" action="{{ route('apply-prefixes-suffixes') }}" id="prefixSuffixForm" class="verb-form">
            @csrf
            <div class="form-group">
            <button type="submit">تطبيق</button>
                <input type="text" id="verb" name="verb" required>
                <label for="verb">:أدخل الفعل</label>
            </div>
        </form>

        <table dir="rtl" id="resultsTable">
            <thead>
                <tr>
                    <th>الضمير</th>
                    <th>الفعل الأمر</th>
                    <th>الفعل المضارع</th>
                    <th>الفعل الماضي</th>
                </tr>
            </thead>
            <tbody>
                <!-- يتم إضافة الصفوف هنا ديناميكيًا -->
            </tbody>
        </table>
    </div>

    <div class="footer">
        <p>&copy; 2025 Arabic Verb Conjugation. All rights reserved.</p>
    </div>

    <script>
        document.getElementById('prefixSuffixForm').addEventListener('submit', function (e) {
            e.preventDefault();
            const formData = new FormData(this);

            fetch(this.action, {
                method: 'POST',
                body: formData,
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            })
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(data => {
                const resultsTableBody = document.querySelector('#resultsTable tbody');
                resultsTableBody.innerHTML = ''; // تنظيف الجدول من أي بيانات سابقة

                if (data.length) {
                    data.forEach(item => {
                        const row = `
                            <tr>
                                <td>${item.pronoun}</td>
                                <td>${item.amr}</td>
                                <td>${item.modara}</td>
                                <td>${item.madi}</td>
                            </tr>
                        `;
                        resultsTableBody.innerHTML += row;
                    });
                } else {
                    resultsTableBody.innerHTML = `
                        <tr>
                            <td colspan="4" style="text-align: center;">لا توجد نتائج.</td>
                        </tr>
                    `;
                }
            })
            .catch(error => {
                console.error('Error:', error);
                const resultsTableBody = document.querySelector('#resultsTable tbody');
                resultsTableBody.innerHTML = `
                    <tr>
                        <td colspan="4" style="text-align: center;">حدث خطأ أثناء إرسال الطلب.</td>
                    </tr>
                `;
            });
        });
    </script>
</body>
</html>