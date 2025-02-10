<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Linking Tools Management</title>
    <link href="https://fonts.googleapis.com/css2?family=Amiri:wght@400;700&family=Aref+Ruqaa:wght@400;700&display=swap"
        rel="stylesheet">
    <style>
    :root {
        --primary-color: #234B6E;
        --secondary-color: #3A7E71;
        --accent-color: #C17B3F;
        --text-color: #2b2b2b;
        --white: #ffffff;
        --gradient-start: #234B6E;
        --gradient-end: #3A7E71;
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
        line-height: 1.6;
    }

    header {
        background: linear-gradient(45deg, var(--gradient-start), var(--gradient-end));
        padding: 3rem;
        position: relative;
        overflow: hidden;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        margin-bottom: 2rem;
    }

    header h1 {
        color: var(--white);
        font-size: 3rem;
        text-align: center;
        font-family: 'Aref Ruqaa', serif;
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2);
    }

    .container {
        max-width: 1600px;
        margin: 0 auto;
        padding: 0 2rem;
    }

    .table-container {
        background: var(--white);
        border-radius: 15px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        margin-bottom: 2rem;
        overflow-x: auto;
    }

    .form-container {
        background: var(--white);
        border-radius: 15px;
        padding: 2rem;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        margin-bottom: 2rem;
        overflow-x: auto;
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }

    th,
    td {
        padding: 1rem;
        text-align: left;
        border-bottom: 1px solid rgba(35, 75, 110, 0.1);
    }

    th {
        background: var(--gradient-end);
        color: var(--white);
        font-family: 'Aref Ruqaa', serif;
        font-weight: normal;
        position: sticky;
        top: 0;
    }

    tr:hover {
        background-color: rgba(35, 75, 110, 0.05);
    }

    .form-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 1.5rem;
    }

    .form-group {
        margin-bottom: 1rem;
    }

    label {
        display: block;
        margin-bottom: 0.5rem;
        color: var(--primary-color);
        font-weight: bold;
    }

    input,
    textarea,
    select {
        width: 100%;
        padding: 0.75rem;
        border: 1px solid #ddd;
        border-radius: 8px;
        font-family: 'Amiri', serif;
        font-size: 1rem;
    }

    textarea {
        min-height: 100px;
        resize: vertical;
    }

    .submit-btn {
        background: linear-gradient(45deg, var(--gradient-start), var(--gradient-end));
        color: var(--white);
        padding: 1rem 2rem;
        border: none;
        border-radius: 8px;
        font-family: 'Aref Ruqaa', serif;
        font-size: 1.1rem;
        cursor: pointer;
        transition: transform 0.2s ease;
        margin-top: 1rem;
    }

    .submit-btn:hover {
        transform: translateY(-2px);
    }

    @media (max-width: 768px) {
        .container {
            padding: 1rem;
        }

        header h1 {
            font-size: 2rem;
        }

        .table-container,
        .form-container {
            padding: 1rem;
        }

        th,
        td {
            padding: 0.75rem;
            font-size: 0.9rem;
        }
    }

    .action-buttons {
        display: flex;
        gap: 0.5rem;
    }

    .edit-btn,
    .delete-btn,
    .save-btn,
    .cancel-btn {
        padding: 0.5rem 1rem;
        border-radius: 4px;
        cursor: pointer;
        font-family: 'Amiri', serif;
        border: none;
        transition: transform 0.2s ease;
    }

    .edit-btn {
        background-color: var(--secondary-color);
        color: white;
    }

    .delete-btn {
        background-color: #dc3545;
        color: white;
    }

    .save-btn {
        background-color: #28a745;
        color: white;
    }

    .cancel-btn {
        background-color: #6c757d;
        color: white;
    }

    .edit-btn:hover,
    .delete-btn:hover,
    .save-btn:hover,
    .cancel-btn:hover {
        transform: translateY(-2px);
    }

    .editing {
        background-color: rgba(35, 75, 110, 0.05);
    }

    .editing input,
    .editing textarea {
        width: 100%;
        padding: 0.5rem;
        border: 1px solid var(--primary-color);
        border-radius: 4px;
        font-family: 'Amiri', serif;
    }

    .editing textarea {
        min-height: 60px;
    }

    .no-data {
        text-align: center;
        padding: 2rem;
        color: var(--text-color);
        font-size: 1.2rem;
        background: var(--white);
        border-radius: 15px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    }
    </style>
</head>

<body>
    <header>
        <h1>Semantic meanings of links - grammatical analysis</h1>
    </header>

    <div class="container">

        <div class="table-container">
            @if(isset($rows) && count($rows) > 0)

            <table>
                <thead>
                    <tr>
                        <th>Subtool Name</th>
                        <th>Tool Name</th>
                        <th>Short Label</th>
                        <th>Morphological Form</th>
                        <th>Typical Nisbah</th>
                        <th>Primary Usage</th>
                        <th>Secondary Usages</th>
                        <th>Example Ayah</th>
                        <th>Syntactic Analysis</th>
                        <th>Semantic Analysis</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($rows as $tool)
                    <tr id="row-{{ $tool->id }}">
                        <td data-field="name">{{ $tool->name }}</td>
                        <td data-field="arabic_name">{{ $linkingTool->arabic_name }}</td>
                        <td data-field="short_label">{{ $tool->short_label }}</td>
                        <td data-field="morphological_form">{{ $tool->morphological_form }}</td>
                        <td data-field="typical_nisbah">{{ $tool->typical_nisbah }}</td>
                        <td data-field="primary_usage">{{ $tool->primary_usage }}</td>
                        <td data-field="secondary_usages">{{ $tool->secondary_usages }}</td>
                        <td data-field="example_ayah">{{ $tool->example_ayah }}</td>
                        <td data-field="syntactic_analysis">{{ $tool->syntactic_analysis }}</td>
                        <td data-field="semantic_analysis">{{ $tool->semantic_analysis }}</td>
                        <td>
                            <div class="action-buttons">
                                <button class="edit-btn" onclick="enableEdit({{ $tool->id }})">Edit</button>
                                <form action="{{ route('tool_information.destroy', $tool->id) }}" method="POST"
                                    style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="delete-btn"
                                        onclick="return confirm('Are you sure you want to delete this item?')">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @else
        <div class="no-data">
            <p>No Tool Information found.</p>
        </div>
        @endif
        <!-- Add New Entry Form -->
        <div class="form-container">
            <h2 style="color: var(--primary-color); margin-bottom: 1.5rem;">Add New Linking Tool</h2>
            <form action="/tool_information/store" method="POST">
                @csrf
                <div class="form-grid">
                    <input type="hidden" name="linking_tool_id" value="{{$linkingTool->id}}">
                    <input type="hidden" name="tool_type" value="{{$linkingTool->name}}">
                    <input type="hidden" id="tool_name" name="tool_id" value="{{$toolName}}">
                    @if(isset($rows[0]->english_name))
                    <input type="hidden" name="short_label" value="{{$rows[0]->english_name}}">
                    @else
                    <div class="form-group">
                        <label for="short_lable">Short lable</label>
                        <input type="text" name="short_label" value="">
                    </div>
                    @endif
                    <div class="form-group">
                        <label for="morphological_form">Morphological Form</label>
                        <input type="text" id="morphological_form" name="morphological_form">
                    </div>
                    <div class="form-group">
                        <label for="typical_nisbah">Typical Nisbah</label>
                        <input type="text" id="typical_nisbah" name="typical_nisbah">
                    </div>
                    <div class="form-group">
                        <label for="primary_usage">Primary Usage</label>
                        <textarea id="primary_usage" name="primary_usage" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="secondary_usages">Secondary Usages</label>
                        <textarea id="secondary_usages" name="secondary_usages"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="example_ayah">Example Ayah</label>
                        <textarea id="example_ayah" name="example_ayah"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="example_explanation">Example Explanation</label>
                        <textarea id="example_explanation" name="example_explanation"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="syntactic_analysis">Syntactic Analysis</label>
                        <textarea id="syntactic_analysis" name="syntactic_analysis"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="semantic_analysis">Semantic Analysis</label>
                        <textarea id="semantic_analysis" name="semantic_analysis"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="notes">Notes</label>
                        <textarea id="notes" name="notes"></textarea>
                    </div>
                </div>
                <button type="submit" class="submit-btn">Add Linking Tool</button>
            </form>
        </div>

        <!-- Data Table -->

    </div>
    <script>
    function enableEdit(id) {
        const row = document.getElementById(`row-${id}`);
        const cells = row.getElementsByTagName('td');
        const originalValues = {};

        // Skip the first two columns (name and tool_name) and the last column (actions)
        for (let i = 2; i < cells.length - 1; i++) {
            const cell = cells[i];
            const fieldName = cell.dataset.field;
            originalValues[fieldName] = cell.innerText;

            const isTextarea = ['primary_usage', 'secondary_usages', 'example_ayah',
                'syntactic_analysis', 'semantic_analysis'
            ].includes(fieldName);

            const input = isTextarea ?
                `<textarea name="${fieldName}">${cell.innerText}</textarea>` :
                `<input type="text" name="${fieldName}" value="${cell.innerText}">`;

            cell.innerHTML = input;
        }

        row.dataset.originalValues = JSON.stringify(originalValues);

        const actionCell = cells[cells.length - 1];
        actionCell.innerHTML = `
        <div class="action-buttons">
            <button class="save-btn" onclick="saveChanges(${id})">Save</button>
            <button class="cancel-btn" onclick="cancelEdit(${id})">Cancel</button>
        </div>
    `;

        row.classList.add('editing');
    }

    function saveChanges(id) {
    const row = document.getElementById(`row-${id}`);
    const data = {};

    // Collect all input values
    row.querySelectorAll('input, textarea').forEach(input => {
        if (input.name) {
            data[input.name] = input.value;
        }
    });

    // Add required fields that might be missing
    data.linking_tool_id = document.querySelector('input[name="linking_tool_id"]').value;
    data.tool_type = document.querySelector('input[name="tool_type"]').value;
    data.tool_id = document.querySelector('input[name="tool_id"]').value;

    // Get CSRF token
    const csrfToken = document.querySelector('input[name="_token"]').value;

    // Log the request data for debugging
    console.log('Request Data:', {
        url: `/tool_information/update/${id}`,
        method: 'PUT',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': csrfToken,
            'Accept': 'application/json'
        },
        body: data
    });

    // Send AJAX request
    fetch(`/tool_information/update/${id}`, {
        method: 'PUT',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': csrfToken,
            'Accept': 'application/json'
        },
        body: JSON.stringify({
            ...data,
            _token: csrfToken
        })
    })
    .then(async response => {
        if (!response.ok) {
            // Get the error response body
            const errorText = await response.text();
            console.error('Server Error Response:', errorText);
            throw new Error(`HTTP error! status: ${response.status}\nResponse: ${errorText}`);
        }
        return response.json();
    })
    .then(data => {
        console.log('Success Response:', data);
        if (data.success) {
            // Update the row with new values
            Object.entries(data.data || {}).forEach(([field, value]) => {
                const cell = row.querySelector(`td[data-field="${field}"]`);
                if (cell) {
                    cell.textContent = value;
                }
            });

            // Restore edit/delete buttons
            restoreActionButtons(id, row);
            row.classList.remove('editing');

            // Show success message
            alert('Changes saved successfully!');
        } else {
            throw new Error(data.message || 'Update failed');
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert(`Error saving changes: ${error.message}`);
    });
}


    function cancelEdit(id) {
        const row = document.getElementById(`row-${id}`);
        const originalValues = JSON.parse(row.dataset.originalValues || '{}');

        // Restore original values
        Object.entries(originalValues).forEach(([fieldName, value]) => {
            const cell = row.querySelector(`td[data-field="${fieldName}"]`);
            if (cell) {
                cell.textContent = value;
            }
        });

        // Restore edit/delete buttons
        restoreActionButtons(id, row);
        row.classList.remove('editing');
        delete row.dataset.originalValues;
    }

    function restoreActionButtons(id, row) {
        const csrfToken = document.querySelector('input[name="_token"]').value;
        const actionCell = row.querySelector('td:last-child');
        actionCell.innerHTML = `
        <div class="action-buttons">
            <button class="edit-btn" onclick="enableEdit(${id})">Edit</button>
            <form action="/tool_information/${id}" method="POST" style="display: inline;">
                <input type="hidden" name="_token" value="${csrfToken}">
                <input type="hidden" name="_method" value="DELETE">
                <button type="submit" class="delete-btn" onclick="return confirm('Are you sure you want to delete this item?')">Delete</button>
            </form>
        </div>
    `;
    }
    </script>
</body>

</html>