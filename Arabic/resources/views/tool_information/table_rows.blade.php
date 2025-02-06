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
                            Add Information
                        </button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<!-- Hidden Form for Contextual Condition -->
<div id="form-container" style="display: none;">
    <form action="{{ route('tool_information.store') }}" method="POST">
        @csrf
        <input type="hidden" name="linking_tool_id" id="linking_tool_id">
        <input type="hidden" name="tool_type" id="tool_type">
        <input type="hidden" name="table_name" id="table_name">
        <input type="hidden" name="row_id" id="row_id">

        <!-- Form fields for tools_informations table attributes -->
        <div>
            <label for="short_label">Short Label</label>
            <input type="text" name="short_label" id="short_label">
        </div>

        <div>
            <label for="classification_id">Classification ID</label>
            <input type="number" name="classification_id" id="classification_id">
        </div>

        <div>
            <label for="morphological_form">Morphological Form</label>
            <input type="text" name="morphological_form" id="morphological_form">
        </div>

        <div>
            <label for="typical_nisbah">Typical Nisbah</label>
            <input type="text" name="typical_nisbah" id="typical_nisbah">
        </div>

        <div>
            <label for="primary_usage">Primary Usage</label>
            <input type="text" name="primary_usage" id="primary_usage">
        </div>

        <div>
            <label for="secondary_usages">Secondary Usages</label>
            <textarea name="secondary_usages" id="secondary_usages"></textarea>
        </div>

        <div>
            <label for="notes">Notes</label>
            <textarea name="notes" id="notes"></textarea>
        </div>

        <div>
            <label for="example_ayah">Example Ayah</label>
            <textarea name="example_ayah" id="example_ayah"></textarea>
        </div>

        <div>
            <label for="example_explanation">Example Explanation</label>
            <textarea name="example_explanation" id="example_explanation"></textarea>
        </div>

        <div>
            <label for="syntactic_analysis">Syntactic Analysis</label>
            <textarea name="syntactic_analysis" id="syntactic_analysis"></textarea>
        </div>

        <div>
            <label for="semantic_analysis">Semantic Analysis</label>
            <textarea name="semantic_analysis" id="semantic_analysis"></textarea>
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

        // Show the form to fill out the information
        document.getElementById('form-container').style.display = 'block';
    });
});
</script>
