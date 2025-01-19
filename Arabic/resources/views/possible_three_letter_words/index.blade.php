<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Matching 3-Letter Words</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 10px;
            text-align: center;
        }
    </style>
</head>
<body>
    <h1>Matching 3-Letter Words</h1>
    <h2>all: {{ $totalRowsBeforeFiltering }} </h2>
    <h2>filtered: {{ $totalRows }} </h2>

    @if($filteredWords->isEmpty())
        <p>No matching words found.</p>
    @else
        <table>
            <thead>
                <tr>
                    <th>#</th>

                </tr>
            </thead>
            <tbody>
                @foreach($filteredWords as $index => $word)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $word->combination }}</td>

                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</body>
</html>
