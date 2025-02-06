<h3>{{ ucfirst($toolName) }} Table Records:</h3>

<div>
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($rows as $row)
                <tr>
                    <td>{{ $row->name }}</td>
                    <td>
                        <button class="add-contextual-condition" data-row-id="{{ $row->id }}" data-table-name="{{ $toolName }}">
                            Add Contextual Condition
                        </button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<!-- Hidden Form for Contextual Condition -->
<div id="form-container" style="display: none;">
    <form action="{{ route('contextual_conditions.store') }}" method="POST">
        @csrf
        <input type="hidden" name="linking_tool_id" id="linking_tool_id">
        <input type="hidden" name="tool_type" id="tool_type">
        <input type="hidden" name="table_name" id="table_name">
        <input type="hidden" name="row_id" id="row_id">

        <!-- Form fields -->
        <div>
            <label for="linguistic_condition">Linguistic Condition</label>
            <input type="text" name="linguistic_condition" id="linguistic_condition">
        </div>

        <div>
            <label for="syntactic_context">Syntactic Context</label>
            <input type="text" name="syntactic_context" id="syntactic_context">
        </div>

        <div>
            <label for="semantic_context">Semantic Context</label>
            <input type="text" name="semantic_context" id="semantic_context">
        </div>

        <div>
            <label for="outcome_effect">Outcome Effect</label>
            <input type="text" name="outcome_effect" id="outcome_effect">
        </div>

        <button type="submit">Submit</button>
    </form>
</div>

<script>
 document.querySelectorAll('.add-contextual-condition').forEach(button => {
    button.addEventListener('click', function() {
        const rowId = this.getAttribute('data-row-id');
        const tableName = this.getAttribute('data-table-name');
        
        // Set the hidden inputs with the corresponding values
        document.getElementById('row_id').value = rowId;
        document.getElementById('table_name').value = tableName;
        
        // Set the tool_id from the selected row (this should be the id of the row clicked)
        const toolId = rowId;  // Tool ID is now the ID of the clicked row in the table
        document.getElementById('linking_tool_id').value = toolId;

        // Optionally set tool_type if needed
        document.getElementById('tool_type').value = ''; // Set appropriate tool_type if needed

        // Show the form to fill out the contextual condition
        document.getElementById('form-container').style.display = 'block';
    });
});

</script>
