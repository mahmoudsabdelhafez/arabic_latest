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
        <h1>Contextual Conditions for "{{$toolLetter}}"</h1>
    </header>
    <div class="container">
        <!-- Data Table -->
        <div class="table-container">
            @if(isset($conditions) && count($conditions) > 0)
            <table>
                <thead>
                    <tr>
                        <th>Linking Tool</th>
                        <th>Tool</th>
                        <th>Linguistic Condition</th>
                        <th>Syntactic Context</th>
                        <th>Semantic Context</th>
                        <th>Outcome Effect</th>
                        <th>Example Text</th>
                        <th>Syntactic Analysis</th>
                        <th>Semantic Analysis</th>
                        <th>Source Reference</th>
                        <th>Notes</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($conditions as $condition)

                    <tr id="row-{{ $condition->id }}">
                        <input type="hidden" data-field="linking_tool_id" name="linking_tool_id"
                            value="{{$condition->linking_tool_id}}">
                        <input type="hidden" data-field="tool_type" name="tool_type" value="{{$condition->tool_type}}">
                        <input type="hidden" data-field="tool_id" name="tool_id" value="{{$condition->tool_id}}">
                        <td><p>{{ $linkingTool->arabic_name }}</p></td>
                        <td>{{ $toolLetter }}</td>
                        <td data-field="linguistic_condition">{{ $condition->linguistic_condition }}</td>
                        <td data-field="syntactic_context">{{ $condition->syntactic_context }}</td>
                        <td data-field="semantic_context">{{ $condition->semantic_context }}</td>
                        <td data-field="outcome_effect">{{ $condition->outcome_effect }}</td>
                        <td data-field="example_text">{{ $condition->example_text }}</td>
                        <td data-field="syntactic_analysis">{{ $condition->syntactic_analysis }}</td>
                        <td data-field="semantic_analysis">{{ $condition->semantic_analysis }}</td>
                        <td data-field="source_reference">{{ $condition->source_reference }}</td>
                        <td data-field="notes">{{ $condition->notes }}</td>
                        <td>
                            <div class="action-buttons">
                                <button class="edit-btn" onclick="enableEdit({{ $condition->id }})">Edit</button>
                                <form action="{{ route('contextual_conditions.destroy', $condition->id) }}"
                                    method="POST" style="display: inline;">
                                    @csrf
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
            <p>No Contextual Conditions found.</p>
        </div>
        @endif

        <!-- Add New Entry Form -->
        <div class="form-container">
            <h2 style="color: var(--primary-color); margin-bottom: 1.5rem;">Add New Contextual Condition</h2>
            <form action="{{ route('contextual_conditions.store') }}" method="POST">
                @csrf
                <div class="form-grid">
                    <input type="hidden" id="linking_tool_id" name="linking_tool_id" value="{{$linkingTool->id }}"
                        required>
                    <input type="hidden" id="tool_id" name="tool_id" value="{{$toolId}}" required>
                    <input type="hidden" id="tool_type" name="tool_type" value="{{$linkingTool->name}}" required>
                    <div class="form-group">
                        <label for="linguistic_condition">Linguistic Condition</label>
                        <textarea id="linguistic_condition" name="linguistic_condition" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="syntactic_context">Syntactic Context</label>
                        <textarea id="syntactic_context" name="syntactic_context" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="semantic_context">Semantic Context</label>
                        <textarea id="semantic_context" name="semantic_context" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="outcome_effect">Outcome Effect</label>
                        <input type="text" id="outcome_effect" name="outcome_effect" required>
                    </div>
                    <div class="form-group">
                        <label for="example_text">Example Text</label>
                        <textarea id="example_text" name="example_text" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="syntactic_analysis">Syntactic Analysis</label>
                        <textarea id="syntactic_analysis" name="syntactic_analysis" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="semantic_analysis">Semantic Analysis</label>
                        <textarea id="semantic_analysis" name="semantic_analysis" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="source_reference">Source Reference</label>
                        <input type="text" id="source_reference" name="source_reference" required>
                    </div>
                    <div class="form-group">
                        <label for="notes">Notes</label>
                        <textarea id="notes" name="notes" required></textarea>
                    </div>
                </div>
                <button type="submit" class="submit-btn">Add Contextual Condition</button>
            </form>
        </div>
    </div>

    <script>
    function enableEdit(id) {
    const row = document.getElementById(`row-${id}`);
    const cells = row.getElementsByTagName('td');
    const originalValues = {};

    // Start from index 2 to skip the first two columns (Linking Tool and Tool)
    for (let i = 2; i < cells.length - 1; i++) {
        const cell = cells[i];
        const fieldName = cell.dataset.field;
        originalValues[fieldName] = cell.innerText;

        const isTextarea = ['linguistic_condition', 'syntactic_context', 'semantic_context',
            'example_text', 'syntactic_analysis', 'semantic_analysis', 'notes'
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

    // Get the hidden input values
    const hiddenInputs = row.querySelectorAll('input[type="hidden"]');
    hiddenInputs.forEach(input => {
        if (input.name) {
            data[input.name] = input.value;
        }
    });

    // Get the editable field values
    row.querySelectorAll('td input:not([type="hidden"]), td textarea').forEach(input => {
        if (input.name) {
            data[input.name] = input.value;
        }
    });

    const csrfToken = document.querySelector('input[name="_token"]').value;

    fetch(`/contextual_conditions/update/${id}`, {
        method: 'POST',
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
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            Object.entries(data.data || {}).forEach(([field, value]) => {
                const cell = row.querySelector(`td[data-field="${field}"]`);
                if (cell) {
                    cell.textContent = value;
                }
            });

            restoreActionButtons(id, row);
            row.classList.remove('editing');
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

    Object.entries(originalValues).forEach(([fieldName, value]) => {
        const cell = row.querySelector(`td[data-field="${fieldName}"]`);
        if (cell) {
            cell.textContent = value;
        }
    });

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
            <form action="/contextual_conditions/${id}" method="POST" style="display: inline;">
                @csrf
                <button type="submit" class="delete-btn" onclick="return confirm('Are you sure you want to delete this item?')">Delete</button>
            </form>
        </div>
    `;
}
    </script>
</body>

</html>