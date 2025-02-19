<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }} - Arabic Features</title>
    
    <link href="https://fonts.googleapis.com/css2?family=Amiri:wght@400;700&family=Aref+Ruqaa:wght@400;700&display=swap" rel="stylesheet">
    
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

        .form-container, .table-container {
            background: var(--white);
            border-radius: 15px;
            padding: 2rem;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            margin-bottom: 2rem;
            overflow-x: auto;
        }

        .section-title {
            color: var(--primary-color);
            font-family: 'Aref Ruqaa', serif;
            font-size: 1.5rem;
            margin-bottom: 1.5rem;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        

        th{
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

        .form-group {
            margin-bottom: 1.5rem;
        }

        .alert {
            padding: 1rem;
            border-radius: 8px;
            margin-bottom: 1rem;
        }

        .alert-success {
            background-color: rgb(186, 255, 159);
            color: #03543f;
        }

        .alert-error {
            background-color: #fde8e8;
            color: #9b1c1c;
        }

        label {
            display: block;
            margin-bottom: 0.5rem;
            color: var(--primary-color);
            font-weight: bold;
        }

        input,
        select {
            width: 100%;
            padding: 0.75rem;
            border: 1px solid #ddd;
            border-radius: 8px;
            font-family: 'Amiri', serif;
            font-size: 1rem;
            margin-bottom: 1rem;
        }

        input:focus,
        select:focus {
            outline: none;
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(35, 75, 110, 0.1);
        }

        .action-buttons {
            display: flex;
            gap: 0.5rem;
        }

        .btn {
            padding: 0.5rem 1rem;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-family: 'Amiri', serif;
            transition: transform 0.2s ease;
        }

        .btn-primary {
            background: linear-gradient(45deg, var(--gradient-start), var(--gradient-end));
            color: var(--white);
        }

        .edit-btn {
            background-color: var(--secondary-color);
            color: white;
        }

        .delete-btn {
            background-color: #dc3545;
            color: white;
        }

        .btn:hover {
            transform: translateY(-2px);
        }

        .error-message {
            color: #dc3545;
            font-size: 0.875rem;
            margin-top: 0.5rem;
        }

        .no-data {
            text-align: center;
            padding: 2rem;
            color: var(--text-color);
            font-size: 1.2rem;
        }

        @media (max-width: 768px) {
            .container {
                padding: 1rem;
            }

            header h1 {
                font-size: 2rem;
            }

            .form-container, .table-container {
                padding: 1rem;
            }

            th, td {
                padding: 0.75rem;
                font-size: 0.9rem;
            }

            .action-buttons {
                flex-direction: column;
            }

            .btn {
                width: 100%;
                margin-bottom: 0.5rem;
            }
        }

        .editing td {
            padding: 0.5rem;
        }

        .editing .form-edit {
            display: flex;
            gap: 0.5rem;
            align-items: center;
        }

        .editing input,
        .editing select {
            margin-bottom: 0;
            padding: 0.5rem;
        }

        .edit-actions {
            display: flex;
            gap: 0.5rem;
        }

        .save-btn {
            background-color: #28a745;
            color: white;
        }

        .cancel-btn {
            background-color: #6c757d;
            color: white;
        }

        /* Add this for the edit form */
        .edit-form {
            display: flex;
            gap: 0.5rem;
            align-items: center;
        }

        .edit-form input,
        .edit-form select {
            flex: 1;
        }

        /* Make sure inline elements don't overflow */
        td {
            max-width: 300px;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }

        .editing td {
            white-space: normal;
        }
    </style>
</head>
<body>
    <header>
        <h1>Arabic Features</h1>
    </header>

    <div class="container">
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="form-container">
            <h2 class="section-title">Add New Feature</h2>
            <form method="POST" action="{{ route('arabic-features.store') }}">
                @csrf
                <div class="form-group">
                    <label for="word_type_id">Word Type</label>
                    <select id="word_type_id" name="word_type_id" required>
                        <option value="">Select Word Type</option>
                        @foreach ($wordTypes as $wordType)
                            <option value="{{ $wordType->id }}">
                                {{ $wordType->type_name }}
                            </option>
                        @endforeach
                    </select>
                    @error('word_type_id')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="example_text">Example Text</label>
                    <input type="text" id="example_text" name="example_text" required>
                    @error('example_text')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Add Feature</button>
            </form>
        </div>

        <div class="table-container">
            <h2 class="section-title">Arabic Features List</h2>
            @if(count($arabicFeatures) > 0)
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Word Type</th>
                            <th>Example Text</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($arabicFeatures as $feature)
                            <tr id="feature-{{ $feature->id }}" data-feature-id="{{ $feature->id }}">
                                <td>{{ $feature->id }}</td>
                                <td class="feature-word-type">
                                    <span class="display-value">{{ $feature->wordType->name }}</span>
                                    <select class="edit-input hidden" name="word_type_id">
                                        @foreach ($wordTypes as $wordType)
                                            <option value="{{ $wordType->id }}" {{ $feature->word_type_id == $wordType->id ? 'selected' : '' }}>
                                                {{ $wordType->type_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </td>
                                <td class="feature-example">
                                    <span class="display-value">{{ $feature->example_text }}</span>
                                    <input type="text" class="edit-input hidden" name="example_text" value="{{ $feature->example_text }}">
                                </td>
                                <td>
                                    <div class="action-buttons">
                                        <button class="btn edit-btn" onclick="toggleEdit({{ $feature->id }})">Edit</button>
                                        <div class="edit-actions hidden">
                                            <button class="btn save-btn" onclick="saveChanges({{ $feature->id }})">Save</button>
                                            <button class="btn cancel-btn" onclick="cancelEdit({{ $feature->id }})">Cancel</button>
                                        </div>
                                        <form method="POST" action="{{ route('arabic-features.destroy', $feature->id) }}" 
                                              onsubmit="return confirm('Are you sure you want to delete this feature?');" 
                                              style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn delete-btn">Delete</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <div class="no-data">No features found.</div>
            @endif
        </div>
    </div>

    <script>
        function toggleEdit(featureId) {
            const row = document.querySelector(`#feature-${featureId}`);
            row.classList.add('editing');
            
            // Hide display values and show edit inputs
            row.querySelectorAll('.display-value').forEach(el => el.style.display = 'none');
            row.querySelectorAll('.edit-input').forEach(el => el.style.display = 'block');
            
            // Show/hide appropriate buttons
            row.querySelector('.edit-btn').style.display = 'none';
            row.querySelector('.edit-actions').style.display = 'flex';
        }

        function cancelEdit(featureId) {
            const row = document.querySelector(`#feature-${featureId}`);
            row.classList.remove('editing');
            
            // Show display values and hide edit inputs
            row.querySelectorAll('.display-value').forEach(el => el.style.display = 'block');
            row.querySelectorAll('.edit-input').forEach(el => el.style.display = 'none');
            
            // Reset input values to original
            row.querySelectorAll('.edit-input').forEach(input => {
                const displayValue = row.querySelector(`[name="${input.name}"] + .display-value`).textContent;
                input.value = displayValue;
            });
            
            // Show/hide appropriate buttons
            row.querySelector('.edit-btn').style.display = 'inline-block';
            row.querySelector('.edit-actions').style.display = 'none';
        }

        async function saveChanges(featureId) {
            const row = document.querySelector(`#feature-${featureId}`);
            const formData = new FormData();
            
            // Get values from edit inputs
            row.querySelectorAll('.edit-input').forEach(input => {
                formData.append(input.name, input.value);
            });
            
            // Add required method for Laravel
            formData.append('_method', 'PUT');
            
            try {
                const response = await fetch(`/arabic-features/${featureId}`, {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                    }
                });

                if (response.ok) {
                    const data = await response.json();
                    
                    // Update display values
                    row.querySelector('[name="word_type_id"]').nextElementSibling.textContent = 
                        row.querySelector('[name="word_type_id"] option:checked').textContent;
                    row.querySelector('[name="example_text"]').nextElementSibling.textContent = 
                        row.querySelector('[name="example_text"]').value;
                    
                    // Reset edit mode
                    cancelEdit(featureId);
                    
                    // Show success message
                    const alert = document.createElement('div');
                    alert.className = 'alert alert-success';
                    alert.textContent = 'Feature updated successfully';
                    document.querySelector('.container').insertBefore(alert, document.querySelector('.form-container'));
                    
                    // Remove alert after 3 seconds
                    setTimeout(() => alert.remove(), 3000);
                } else {
                    throw new Error('Failed to update feature');
                }
            } catch (error) {
                console.error('Error:', error);
                alert('Failed to update feature. Please try again.');
            }
        }
    </script>
</body>
</html>