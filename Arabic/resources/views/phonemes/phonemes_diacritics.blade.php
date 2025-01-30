<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Phonemes management system for linguistic analysis">
    <title>Phonemes Management System</title>
    <link href="https://fonts.googleapis.com/css2?family=Amiri:wght@400;700&family=Aref+Ruqaa:wght@400;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-color: #1a5f7a;
            --primary-dark: #134a60;
            --secondary-color: #c7b7a3;
            --accent-color: #e6d5b8;
            --text-color: #2b2b2b;
            --white: #ffffff;
            --error-color: #dc3545;
            --success-color: #28a745;
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
            display: flex;
            flex-direction: column;
            line-height: 1.6;
        }

        header {
            background: var(--primary-color);
            padding: 2rem;
            position: relative;
            overflow: hidden;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        header::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(45deg, rgba(255, 255, 255, 0.1) 25%, transparent 25%),
                        linear-gradient(-45deg, rgba(255, 255, 255, 0.1) 25%, transparent 25%);
            background-size: 60px 60px;
            opacity: 0.1;
        }

        h1 {
            font-family: 'Aref Ruqaa', serif;
            color: var(--white);
            text-align: center;
            font-size: 2.5rem;
            position: relative;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2);
        }

        .container {
            flex: 1;
            padding: 3rem 1rem;
            width: 100%;
            max-width: 1400px;
            margin: 0 auto;
        }

        .table-responsive {
            overflow-x: auto;
            margin: 2rem 0;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background-color: var(--white);
            border-radius: 8px;
            overflow: hidden;
        }

        th, td {
            padding: 1rem;
            text-align: left;
            border: 1px solid #ddd;
        }

        th {
            background-color: var(--primary-color);
            color: var(--white);
            font-weight: bold;
            text-transform: uppercase;
            font-size: 0.9rem;
            letter-spacing: 0.5px;
        }

        tr:nth-child(even) {
            background-color: #f8f9fa;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        .edit-form {
            background-color: #f8f9fa;
            padding: 1.5rem;
            border-radius: 8px;
            margin-top: 1rem;
        }

        .form-group {
            margin-bottom: 1rem;
        }

        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: bold;
        }

        .form-group select,
        .form-group input[type="text"] {
            width: 100%;
            padding: 0.5rem;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 1rem;
        }

        .btn {
            padding: 0.5rem 1rem;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 0.9rem;
            transition: var(--transition);
        }

        .btn-edit {
            background-color: var(--primary-color);
            color: var(--white);
        }

        .btn-edit:hover {
            background-color: var(--primary-dark);
        }

        .btn-save {
            background-color: var(--success-color);
            color: var(--white);
            margin-right: 0.5rem;
        }

        .btn-cancel {
            background-color: var(--error-color);
            color: var(--white);
        }

        .footer {
            background: var(--primary-color);
            color: var(--white);
            text-align: center;
            padding: 1.5rem;
            margin-top: auto;
        }

        /* Toast Notification */
        .toast {
            position: fixed;
            top: 20px;
            right: 20px;
            padding: 1rem;
            border-radius: 4px;
            color: var(--white);
            opacity: 0;
            transition: var(--transition);
            z-index: 1000;
        }

        .toast.success {
            background-color: var(--success-color);
        }

        .toast.error {
            background-color: var(--error-color);
        }

        .toast.show {
            opacity: 1;
        }

        @media (max-width: 768px) {
            h1 {
                font-size: 2rem;
            }

            th, td {
                padding: 0.75rem;
                font-size: 0.9rem;
            }

            .btn {
                padding: 0.4rem 0.8rem;
            }
        }

        @media (prefers-reduced-motion: reduce) {
            * {
                transition: none !important;
            }
        }
    </style>
</head>

<body>
    <header>
        <h1>Phonemes Management System</h1>
    </header>

    <div class="container">
        <div class="table-responsive">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Letter</th>
                        <th>Harakah</th>
                        <th>Effect</th>
                        <th>Used</th>
                        <th>Has Meaning</th>
                        <th>Is Preposition</th>
                        <th>Notes</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($diacritics as $diacritic)
                    <tr>
                        <td>{{ $diacritic->id }}</td>
                        <td>{{ $letter->letter }}</td>
                        <td><div style="display:flex; justify-content: space-between;width:100%;height: 100%;">ىـ{{ $diacritic->diacritic }}<span style="text-align :right;">{{ $diacritic->name }}</div></span></td>
                        <td>{{ $diacritic->effect }}{{ $diacritic->effect }}</td>
                        <td>{{ isset($diacritic->arabicLetters->first()->pivot) ? ($diacritic->arabicLetters->first()->pivot->used ? 'Yes' : 'No') : 'Yes' }}</td>
                        <td>{{ isset($diacritic->arabicLetters->first()->pivot) ? ($diacritic->arabicLetters->first()->pivot->has_meaning ? 'Yes' : 'No') : 'No' }}</td>
                        <td>{{ isset($diacritic->arabicLetters->first()->pivot) ? ($diacritic->arabicLetters->first()->pivot->is_preposition ? 'Yes' : 'No') : 'No' }}</td>
                        <td>{{ isset($diacritic->arabicLetters->first()->pivot) ? $diacritic->arabicLetters->first()->pivot->nots : '' }}</td>
                        <td>
                            <button class="btn btn-edit" onclick="showEditForm({{ $diacritic->id }})">
                                Edit
                            </button>
                        </td>
                    </tr>
                    <tr id="edit_form_{{ $diacritic->id }}" class="edit-form" style="display: none;">
                        <td colspan="8">
                            <form action="{{ route('update.phoneme.diacritic') }}" onsubmit="handleSubmit(event, {{ $diacritic->id }})">
                                @csrf
                                <input type="hidden" name="letter_id" value="{{ $letter->id }}">
                                <input type="hidden" name="diacritic_id" value="{{ $diacritic->id }}">

                                <div class="form-group">
                                    <label for="has_meaning_{{ $diacritic->id }}">Used:</label>
                                    <select id="has_meaning_{{ $diacritic->id }}" name="used" required>
                                        <option value="1" {{ isset($diacritic->arabicLetters->first()->pivot) && $diacritic->arabicLetters->first()->pivot->used ? 'selected' : '' }}>Yes</option>
                                        <option value="0" {{ isset($diacritic->arabicLetters->first()->pivot) && !$diacritic->arabicLetters->first()->pivot->used ? 'selected' : '' }}>No</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="has_meaning_{{ $diacritic->id }}">Has Meaning:</label>
                                    <select id="has_meaning_{{ $diacritic->id }}" name="has_meaning" required>
                                        <option value="1" {{ isset($diacritic->arabicLetters->first()->pivot) && $diacritic->arabicLetters->first()->pivot->has_meaning ? 'selected' : '' }}>Yes</option>
                                        <option value="0" {{ isset($diacritic->arabicLetters->first()->pivot) && !$diacritic->arabicLetters->first()->pivot->has_meaning ? 'selected' : '' }}>No</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="notes_{{ $diacritic->id }}">Notes:</label>
                                    <input type="text" id="notes_{{ $diacritic->id }}" name="nots" 
                                           value="{{ isset($diacritic->arabicLetters->first()->pivot) && isset($diacritic->arabicLetters->first()->pivot->nots) ? $diacritic->arabicLetters->first()->pivot->nots : '' }}" required>
                                </div>

                                <div class="form-group">
                                    <label for="is_preposition_{{ $diacritic->id }}">Is Preposition:</label>
                                    <select id="is_preposition_{{ $diacritic->id }}" name="is_preposition" required>
                                        <option value="1" {{ isset($diacritic->arabicLetters->first()->pivot) && $diacritic->arabicLetters->first()->pivot->is_preposition ? 'selected' : '' }}>Yes</option>
                                        <option value="0" {{ isset($diacritic->arabicLetters->first()->pivot) && !$diacritic->arabicLetters->first()->pivot->is_preposition ? 'selected' : '' }}>No</option>
                                    </select>
                                </div>

                                <button type="submit" class="btn btn-save">Save Changes</button>
                                <button type="button" class="btn btn-cancel" onclick="hideEditForm({{ $diacritic->id }})">Cancel</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="footer">
        <p>&copy; 2025 Phonemes Management System. All rights reserved.</p>
    </div>

    <div id="toast" class="toast"></div>

    <script>
        function showEditForm(diacriticId) {
            document.querySelectorAll('.edit-form').forEach(form => form.style.display = 'none');
            document.getElementById('edit_form_' + diacriticId).style.display = 'table-row';
        }

        function hideEditForm(diacriticId) {
            document.getElementById('edit_form_' + diacriticId).style.display = 'none';
        }

        function showToast(message, type = 'success') {
            const toast = document.getElementById('toast');
            toast.textContent = message;
            toast.className = `toast ${type} show`;
            
            setTimeout(() => {
                toast.className = 'toast';
            }, 3000);
        }

        async function handleSubmit(event, diacriticId) {
            event.preventDefault();
            const form = event.target;
            const formData = new FormData(form);

            try {
                const response = await fetch(form.action, {
                    method: 'POST',
                    body: formData
                });

                if (response.ok) {
                    showToast('Changes saved successfully!');
                    hideEditForm(diacriticId);
                    // Optionally refresh the page or update the table row
                    location.reload();
                } else {
                    throw new Error('Failed to save changes');
                }
            } catch (error) {
                showToast(error.message, 'error');
            }
        }

        // Add keyboard support for accessibility
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                document.querySelectorAll('.edit-form').forEach(form => form.style.display = 'none');
            }
        });
    </script>
</body>
</html>