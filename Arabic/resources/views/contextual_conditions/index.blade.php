<h2>Contextual Conditions</h2>
    <a href="{{ route('contextual_conditions.create') }}">Add New Condition</a>
    <table>
        <tr>
            <th>ID</th>
            <th>Linking Tool</th>
            <th>Outcome Effect</th>
            <th>Example</th>
        </tr>
        @foreach($conditions as $condition)
            <tr>
                <td>{{ $condition->id }}</td>
                <td>{{ $condition->linkingTool->name }}</td>
                <td>{{ $condition->outcome_effect }}</td>
                <td>{{ $condition->example_text }}</td>
            </tr>
        @endforeach
    </table>