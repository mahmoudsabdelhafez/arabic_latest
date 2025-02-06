<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Classification View</title>
</head>
<body>
    <h1>Classification Results</h1>

    @if($rules->isEmpty())
        <p>No classifications found.</p>
    @else
        <table border="1">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Subtype</th>
                    <th>Linking Tool ID</th>
                    <th>Subtool Name</th>
                    <th>Example Sentence</th>
                    <th>Description</th>
                    <th>Typical Nisbah</th>
                    <th>Logical Effect</th>
                    <th>Semantic Effect</th>
                </tr>
            </thead>
            <tbody>
                @foreach($rules as $rule)
                    <tr>
                        <td>{{ $rule->name }}</td>
                        <td>{{ $rule->subtype }}</td>
                        <td>{{ $rule->linking_tool_id }}</td>
                        <td>{{ $rule->subtool_name }}</td>
                        <td>{{ $rule->example_sentence }}</td>
                        <td>{{ $rule->description }}</td>
                        <td>{{ $rule->typical_nisbah }}</td>
                        <td>{{ $rule->logical_effect }}</td>
                        <td>{{ $rule->semantic_effect }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</body>
</html>
