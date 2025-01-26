<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tajweeds Table</title>
    <style>
        /* Same style as the Arabic Letters table or modify as needed */
        table {
            width: 80%;
            margin: 30px auto;
            border-collapse: collapse;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            background-color: white;
        }

        h1 {
            background-color: #2f4f4f;
            color: white;
            padding: 20px;
            margin: 0;
            font-size: 36px;
            text-align: center;
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

        /* Add Rule Button Style */
        .btn-add-rule {
            display: inline-block;
            width: 200px;
            margin: 20px;
            background-color: #2F4F4F;
            color: white;
            padding: 10px;
            font-size: 18px;
            text-align: center;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .btn-add-rule:hover {
            background-color: #4a148c;
        }

        /* Edit and Delete Button Styles */
        .btn-edit, .btn-delete {
            display: inline-block;
            width: 80px;
            padding: 5px;
            margin: 0 5px;
            font-size: 14px;
            text-align: center;
            text-decoration: none;
            border-radius: 5px;
            color: white;
        }

        .btn-edit {
            background-color: #4CAF50;
        }

        .btn-edit:hover {
            background-color: #388e3c;
        }

        .btn-delete {
            background-color: #f44336;
        }

        .btn-delete:hover {
            background-color: #d32f2f;
        }

        /* Success Message Style */
        .alert-success {
            background-color: #4CAF50;
            color: white;
            padding: 15px;
            margin: 20px 0;
            border-radius: 5px;
            font-size: 18px;
        }
    </style>
</head>
<body>
    <h1>تطبيقات قواعد التجويد</h1>

    <!-- Display success message if exists -->
    @if (session('success'))
        <div class="alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Add Rule Button (on the left side) -->
    <a href="{{ route('add-rule') }}" class="btn-add-rule">Add Rule</a>

    <table>
        <thead>
            <tr>
                <th>الوصف</th>
                <th>الآية المثال</th>
                <th>الحروف</th>
                <th>اسم القاعدة</th>
                <th>الإجراءات</th> <!-- Added a new column for actions -->
            </tr>
        </thead>
        <tbody>
            @foreach($tajweeds as $tajweed)
                <tr>
                    <td>{{ $tajweed->description }}</td>
                    <td>{{ $tajweed->example_ayah }}</td>
                    <td>{{ $tajweed->expression }}</td>
                    <td>{{ $tajweed->rule_name }}</td>
                    <td>
                        <!-- Edit and Delete Buttons -->
                        <a href="{{ route('edit-rule', $tajweed->id) }}" class="btn-edit">Edit</a>
                        <a href="{{ route('delete-rule', $tajweed->id) }}" class="btn-delete" onclick="return confirm('Are you sure you want to delete this rule?')">Delete</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>
</html>
