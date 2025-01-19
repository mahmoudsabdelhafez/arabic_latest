<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sawabeq and Lawaheq</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            color: #333;
        }

        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th {
            background-color: #f4f4f4;
            font-weight: bold;
        }

        th, td {
            padding: 12px;
            text-align: center;
        }

        tbody tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tbody tr:hover {
            background-color: #f1f1f1;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>

    <!-- Sawabeq Table -->
     <h1> السوابق</h1>
    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Type</th>
            </tr>
        </thead>
        <tbody>
            @foreach($sawabeq as $index => $sawab)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $sawab->name }}</td>
                    <td>{{ $sawab->type }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Lawaheq Table -->
    <h1>اللواحق</h1>
    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Type</th>
            </tr>
        </thead>
        <tbody>
            @foreach($lawaheq as $index => $lawa)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $lawa->name }}</td>
                    <td>{{ $lawa->type }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>
</html>
