<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Classification Results</title>
    <link href="https://fonts.googleapis.com/css2?family=Amiri:wght@400;700&family=Aref+Ruqaa:wght@400;700&display=swap"
        rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastify-js/1.12.0/toastify.min.css" rel="stylesheet">
    <style>
    :root {
        --primary-color: #234B6E;
        --secondary-color: #3A7E71;
        --accent-color: #C17B3F;
        --text-color: #2b2b2b;
        --white: #ffffff;
        --error-color: #dc3545;
        --success-color: #28a745;
        --gradient-start: #234B6E;
        --gradient-end: #3A7E71;
        --border-radius: 12px;
        --transition: all 0.3s ease;
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

    .header {
        background: linear-gradient(45deg, var(--gradient-start), var(--gradient-end));
        padding: 2rem;
        position: relative;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
    }

    .header h1 {
        color: var(--white);
        font-size: 2.5rem;
        text-align: center;
        font-family: 'Aref Ruqaa', serif;
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2);
    }

    .container {
        max-width: 1400px;
        margin: 2rem auto;
        padding: 0 1rem;
    }

    .table-container {
        background: var(--white);
        border-radius: var(--border-radius);
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        overflow: hidden;
        margin-bottom: 2rem;
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
        background: var(--secondary-color);
        color: var(--white);
        font-family: 'Aref Ruqaa', serif;
        font-weight: 600;
        position: sticky;
        top: 0;
    }

    tr:hover {
        background-color: rgba(35, 75, 110, 0.05);
        transition: var(--transition);
    }

    .form-container {
        background: var(--white);
        border-radius: var(--border-radius);
        padding: 2rem;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    }

    .form-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 1.5rem;
    }

    .form-group {
        margin-bottom: 1.5rem;
    }

    label {
        display: block;
        margin-bottom: 0.5rem;
        color: var(--primary-color);
        font-weight: 600;
    }

    input,
    textarea,
    select {
        width: 100%;
        padding: 0.75rem;
        border: 2px solid #e0e0e0;
        border-radius: 8px;
        font-family: 'Amiri', serif;
        font-size: 1rem;
        transition: var(--transition);
    }

    input:focus,
    textarea:focus,
    select:focus {
        outline: none;
        border-color: var(--primary-color);
        box-shadow: 0 0 0 3px rgba(35, 75, 110, 0.1);
    }

    textarea {
        min-height: 120px;
        resize: vertical;
    }

    .btn {
        padding: 0.75rem 1.5rem;
        border: none;
        border-radius: 6px;
        font-family: 'Aref Ruqaa', serif;
        font-size: 1rem;
        cursor: pointer;
        transition: var(--transition);
    }

    .btn-primary {
        background: linear-gradient(45deg, var(--gradient-start), var(--gradient-end));
        color: var(--white);
    }

    .btn-warning {
        background: var(--accent-color);
        color: var(--white);
        margin-right: 0.5rem;
    }

    .btn-danger {
        background: var(--error-color);
        color: var(--white);
    }

    .btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
    }

    .modal {
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: rgba(0, 0, 0, 0.5);
        display: none;
        justify-content: center;
        align-items: center;
        z-index: 1000;
    }

    .modal.show {
        display: flex;
    }

    .modal-content {
        background: var(--white);
        border-radius: var(--border-radius);
        padding: 2rem;
        width: 90%;
        max-width: 600px;
        max-height: 90vh;
        overflow-y: auto;
    }

    .no-data {
        text-align: center;
        padding: 3rem;
        background: var(--white);
        border-radius: var(--border-radius);
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    }

    @media (max-width: 768px) {
        .header h1 {
            font-size: 2rem;
        }

        .form-grid {
            grid-template-columns: 1fr;
        }

        th,
        td {
            padding: 0.75rem;
            font-size: 0.9rem;
        }

        .table-container {
            overflow-x: auto;
        }
    }
    </style>
</head>

<body>
    <header class="header">
        <h1>Classification Results</h1>
    </header>

    <div class="container">
        @if($rules->isEmpty())
        <div class="no-data">
            <p>No classifications found.</p>
        </div>
        @else
        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>Subtool Name</th>
                        <th>Name</th>
                        <th>Subtype</th>
                        <th>Linking Tool</th>
                        <th>Example</th>
                        <th>Description</th>
                        <th>Typical Nisbah</th>
                        <th>Logical Effect</th>
                        <th>Semantic Effect</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($rules as $rule)
                    <tr id="row-{{ $rule->id }}">
                        <td>{{ $rule->subtool_name }}</td>
                        <td>{{ $rule->name }}</td>
                        <td>{{ $rule->subtype }}</td>
                        <td>{{ $rule->linkingTool->name }}</td>
                        <td>{{ $rule->example_sentence }}</td>
                        <td>{{ $rule->description }}</td>
                        <td>{{ $rule->typical_nisbah }}</td>
                        <td>{{ $rule->logical_effect }}</td>
                        <td>{{ $rule->semantic_effect }}</td>
                        <td>
                            <button class="btn btn-warning edit-btn" data-id="{{ $rule->id }}"
                                data-subtool="{{ $rule->subtool_name }}" data-name="{{ $rule->name }}"
                                data-subtype="{{ $rule->subtype }}" data-linking="{{ $rule->linkingTool->name }}"
                                data-example="{{ $rule->example_sentence }}" data-description="{{ $rule->description }}"
                                data-typical="{{ $rule->typical_nisbah }}" data-logical="{{ $rule->logical_effect }}"
                                data-semantic="{{ $rule->semantic_effect }}">
                                Edit
                            </button>
                            <form action="{{ route('classifications.destroy', $rule->id) }}" method="POST"
                                    style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger"
                                        onclick="return confirm('Are you sure you want to delete this item?')">Delete</button>
                                </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @endif

        <div class="form-container">
            <h2 style="color: var(--primary-color); margin-bottom: 1.5rem;">Add New Classification</h2>
            <form id="addForm" action="{{route('classifications.store')}}" method="POST">
                @csrf
                <input type="hidden" name="linking_tool_id" value="{{$linkingTool->id}}">
                <input type="hidden" name="subtool_name" value="{{$letter}}">

                <div class="form-grid">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" id="name" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="subtype">Subtype</label>
                        <input type="text" id="subtype" name="subtype" required>
                    </div>
                    <div class="form-group">
                        <label for="example_sentence">Example Sentence</label>
                        <input type="text" id="example_sentence" name="example_sentence" required>
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea id="description" name="description" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="typical_nisbah">Typical Nisbah</label>
                        <textarea id="typical_nisbah" name="typical_nisbah" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="logical_effect">Logical Effect</label>
                        <textarea id="logical_effect" name="logical_effect" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="semantic_effect">Semantic Effect</label>
                        <textarea id="semantic_effect" name="semantic_effect" required></textarea>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Add Classification</button>
            </form>
        </div>
    </div>

    <!-- Edit Modal -->
    <div class="modal" id="editModal">
        <div class="modal-content">
            <h2 style="margin-bottom: 1.5rem;">Edit Classification</h2>
            <form id="editForm">
                @csrf
                <input type="hidden" id="edit_id">
                <div class="form-group">
                    <label>Subtool Name</label>
                    <input type="text" id="edit_subtool" required>
                </div>
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" id="edit_name" required>
                </div>
                <div class="form-group">
                    <label>Subtype</label>
                    <input type="text" id="edit_subtype" required>
                </div>
                <div class="form-group">
                    <label>Example Sentence</label>
                    <input type="text" id="edit_example" required>
                </div>
                <div class="form-group">
                    <label>Description</label>
                    <textarea id="edit_description" required></textarea>
                </div>
                <div class="form-group">
                    <label>Typical Nisbah</label>
                    <textarea id="edit_typical" required></textarea>
                </div>
                <div class="form-group">
                    <label>Logical Effect</label>
                    <textarea id="edit_logical" required></textarea>
                </div>
                <div class="form-group">
                    <label>Semantic Effect</label>
                    <textarea id="edit_semantic" required></textarea>
                </div>
                <div style="display: flex; gap: 1rem; justify-content: flex-end;">
                    <button type="button" class="btn btn-danger" onclick="closeModal()">Cancel</button>
                    <button type="button" class="btn btn-primary" id="updateBtn">Update</button>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastify-js/1.12.0/toastify.js"></script>
    <script>
    function showToast(message, type = 'success') {
        Toastify({
            text: message,
            duration: 3000,
            gravity: "top",
            position: "right",
            backgroundColor: type === 'success' ? "var(--success-color)" : "var(--error-color)",
        }).showToast();
    }

    function closeModal() {
        document.getElementById('editModal').classList.remove('show');
    }

    document.addEventListener('DOMContentLoaded', function () {
    // Edit button handler
    document.querySelectorAll('.edit-btn').forEach(button => {
        button.addEventListener('click', function () {
            populateEditForm(this.dataset);
            document.getElementById('editModal').classList.add('show');
        });
    });

    // Update button handler
    const csrfTokenElement = document.querySelector('meta[name="csrf-token"]');
const csrfToken = csrfTokenElement ? csrfTokenElement.content : '';

if (!csrfToken) {
    console.error("CSRF token not found. Ensure <meta name='csrf-token' content='{{ csrf_token() }}'> is present.");
}

document.getElementById('updateBtn').addEventListener('click', function () {
    const id = document.getElementById('edit_id').value;
    
    const formData = {
        _token: csrfToken,  // Use the retrieved CSRF token
        subtool_name: document.getElementById('edit_subtool').value,
        name: document.getElementById('edit_name').value,
        subtype: document.getElementById('edit_subtype').value,
        example_sentence: document.getElementById('edit_example').value,
        description: document.getElementById('edit_description').value,
        typical_nisbah: document.getElementById('edit_typical').value,
        logical_effect: document.getElementById('edit_logical').value,
        semantic_effect: document.getElementById('edit_semantic').value,
    };

    fetch(`/classifications/${id}`, {
        method: 'PUT',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': csrfToken
        },
        body: JSON.stringify(formData)
    })
    .then(response => response.json())
    .then(data => {
        showToast('Updated successfully!');
        updateTableRow(id, data);
        closeModal();
    })
    .catch(error => {
        showToast('Failed to update', 'error');
        console.error('Error:', error);
    });
});


    

    // Helper function to populate edit form
    function populateEditForm(data) {
        document.getElementById('edit_id').value = data.id;
        document.getElementById('edit_subtool').value = data.subtool;
        document.getElementById('edit_name').value = data.name;
        document.getElementById('edit_subtype').value = data.subtype;
        document.getElementById('edit_example').value = data.example;
        document.getElementById('edit_description').value = data.description;
        document.getElementById('edit_typical').value = data.typical;
        document.getElementById('edit_logical').value = data.logical;
        document.getElementById('edit_semantic').value = data.semantic;
    }

    // Helper function to update table row
    function updateTableRow(id, data) {
        console.log(data.linking_tool);
        const row = document.getElementById(`row-${id}`);
        data.data.forEach(element => {
            
        
        row.innerHTML = `
            <td>${element.subtool_name}</td>
            <td>${element.name}</td>
            <td>${element.subtype}</td>
            <td>${element.linking_tool.name}</td>
            <td>${element.example_sentence}</td>
            <td>${element.description}</td>
            <td>${element.typical_nisbah}</td>
            <td>${element.logical_effect}</td>
            <td>${element.semantic_effect}</td>
            <td>
                <button class="btn btn-warning edit-btn" 
                    data-id="${element.id}"
                    data-subtool="${element.subtool_name}"
                    data-name="${element.name}"
                    data-subtype="${element.subtype}"
                    data-linking="${element.linking_tool.name}"
                    data-example="${element.example_sentence}"
                    data-description="${element.description}"
                    data-typical="${element.typical_nisbah}"
                    data-logical="${element.logical_effect}"
                    data-semantic="${element.semantic_effect}">
                    Edit
                </button>
                <button class="btn btn-danger delete-btn" data-id="${element.id}">Delete</button>
            </td>
        `;
        attachEventListeners(row);
    });
    }

    // Helper function to attach event listeners to new elements
    function attachEventListeners(row) {
        const editBtn = row.querySelector('.edit-btn');
        const deleteBtn = row.querySelector('.delete-btn');

        editBtn.addEventListener('click', function () {
            populateEditForm(this.dataset);
            document.getElementById('editModal').classList.add('show');
        });

        deleteBtn.addEventListener('click', function () {
            if (confirm('Are you sure you want to delete this item?')) {
                const id = this.dataset.id;
                fetch(`/rules/${id}`, {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                        'Content-Type': 'application/json'
                    }
                })
                .then(response => response.json())
                .then(() => {
                    showToast('Deleted successfully!');
                    row.remove();
                })
                .catch(error => {
                    showToast('Failed to delete', 'error');
                    console.error('Error:', error);
                });
            }
        });
    }

    // Close modal when clicking outside
    document.getElementById('editModal').addEventListener('click', function (e) {
        if (e.target === this) closeModal();
    });

    // Add keyboard support for modal
    document.addEventListener('keydown', function (e) {
        if (e.key === 'Escape') closeModal();
    });

    // Function to close modal
    function closeModal() {
        document.getElementById('editModal').classList.remove('show');
    }

    // Function to show toast messages
    function showToast(message, type = 'success') {
        alert(message); // Replace with a better toast notification system if needed
    }
});
    </script>
</body>
</html>