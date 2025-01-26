
<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>إدخال الفعل</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f9;
            color: #333;
            margin: 0;
            padding: 0;
        }

        h1 {
            background-color: #2f4f4f;
            color: white;
            padding: 20px;
            margin: 0;
            font-size: 36px;
            text-align: center;
        }

        h2 {
            color: #333;
            font-size: 28px;
            margin-top: 40px;
            text-align: center;
        }

        table {
            width: 80%;
            margin: 30px auto;
            border-collapse: collapse;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            background-color: white;
        }

        th, td {
            padding: 15px;
            text-align: center;
        }

        th {
            background-color: #4CAF50;
            color: white;
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

        .container {
            padding: 20px;
        }

        .footer {
            text-align: center;
            margin-top: 40px;
            color: #777;
        }
    </style>
</head>
<body>
    <h1>أدخل الفعل العربي</h1>
    
    <form method="POST" action="{{ route('apply-prefixes-suffixes') }}" id="prefixSuffixForm" dir="rtl" style ="padding:30px 90px 0 0">
    @csrf
    <label for="verb">أدخل الفعل:</label>
    <input type="text" id="verb" name="verb" required>
    <button type="submit">تطبيق</button>
</form>

<!-- جدول عرض النتائج -->
<table id="resultsTable" border="1" dir="rtl">
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
