<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Phonemes Management System</title>
    <style>
    :root {
        --primary-color: #1a5f7a;
        --secondary-color: #c7b7a3;
        --accent-color: #e6d5b8;
        --text-color: #2b2b2b;
        --white: #ffffff;
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
        font-family: 'Amiri', serif;
        color: var(--white);
        text-align: center;
        font-size: 2.5rem;
        position: relative;
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2);
    }

    .container {
        flex: 1;
        padding: 3rem 1rem;
        max-width: 1400px;
        margin: 0 14%;
    }

    .table-responsive {
        background: var(--white);
        border-radius: 15px;
        padding: 1.5rem;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        overflow-x: auto;
        /* margin: 2rem 0; */
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }

    th,
    td {
        padding: 1rem;
        text-align: left;
        border-bottom: 1px solid #e4e9f2;
    }

    th {
        background-color: var(--primary-color);
        color: var(--white);
        font-weight: bold;
    }

    tr:hover {
        background-color: #f5f7fa;
    }

    .edit-form {
        background: #f5f7fa;
        padding: 1.5rem;
        border-radius: 15px;
        margin: 1rem 0;
        border: 1px solid #e4e9f2;
    }

    .form-group {
        margin-bottom: 1rem;
    }

    .form-group label {
        display: block;
        margin-bottom: 0.5rem;
        font-weight: bold;
        color: var(--text-color);
    }

    .form-group select,
    .form-group input[type="text"],
    .form-group textarea {
        width: 100%;
        padding: 0.8rem;
        border: 1px solid #e4e9f2;
        border-radius: 8px;
        font-size: 1rem;
        transition: all 0.3s ease;
    }

    .form-group select:focus,
    .form-group input[type="text"]:focus,
    .form-group textarea:focus {
        outline: none;
        border-color: var(--primary-color);
        box-shadow: 0 0 0 2px rgba(26, 95, 122, 0.1);
    }

    .button {
        display: inline-block;
        text-decoration: none;
        background: linear-gradient(135deg, #f5f7fa 0%, #e4e9f2 100%);
        color: var(--primary-color);
        padding: 0.8rem 1.2rem;
        font-size: 1rem;
        font-weight: bold;
        border-radius: 8px;
        transition: all 0.3s ease;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        border: 2px solid transparent;
        cursor: pointer;
    }

    .button:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.15);
        border-color: var(--primary-color);
        background: var(--primary-color);
        color: var(--white);
    }

    .button-primary {
        background: var(--primary-color);
        color: var(--white);
    }

    .footer {
        background: var(--primary-color);
        color: var(--white);
        text-align: center;
        padding: 1.5rem;
        margin-top: auto;
    }

    .toast {
        position: fixed;
        top: 2rem;
        right: 2rem;
        padding: 1rem 2rem;
        border-radius: 8px;
        background: var(--white);
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        transform: translateY(-100%);
        opacity: 0;
        transition: all 0.3s ease;
    }

    .toast.show {
        transform: translateY(0);
        opacity: 1;
    }

    @media (max-width: 768px) {
        .container {
            padding: 1rem;
        }

        h1 {
            font-size: 2rem;
        }

        .table-responsive {
            padding: 1rem;
            border-radius: 8px;
        }

        th,
        td {
            padding: 0.8rem;
        }
    }

    .status-badge {
        display: inline-block;
        padding: 0.4rem 1rem;
        border-radius: 999px;
        font-size: 0.875rem;
        font-weight: 500;
    }

    .status-yes {
        background-color: #e6f4ea;
        color: #1e7e34;
    }

    .status-no {
        background-color: #feecea;
        color: #dc3545;
    }

    .grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 1.5rem;
        margin-bottom: 1.5rem;
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
                        <th>Notes</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($diacritics as $diacritic)
                    <tr>
                        <td>{{ $diacritic->id }}</td>
                        <td>{{ $letter->letter }}{{ $diacritic->diacritic }}</td>
                        <td>
                            <div style="display: flex; justify-content: space-between;">
                                <span>ىـ{{ $diacritic->diacritic }}</span>
                                <span>{{ $diacritic->name }}</span>
                            </div>
                        </td>
                        <td>{{ $diacritic->effect }}</td>

                        <td dir="rtl">
                            {{ isset($diacritic->arabicLetters->first()->pivot) ? $diacritic->arabicLetters->first()->pivot->usage_meaning : '' }}
                        </td>
                        <td>
                            <button class="button button-primary" onclick="showEditForm({{ $diacritic->id }})">
                                Edit
                            </button>
                        </td>
                    </tr>
                    <tr id="edit_form_{{ $diacritic->id }}" style="display: none;">
                        <td colspan="9">
                            <div class="edit-form">
                                <form action="{{ route('update.phoneme.diacritic') }}" method="POST">
                                    @csrf
                                    <div class="grid">
                                        <div class="form-group">
                                            <label for="arabic_tool_id">Arabic Tool</label>
                                            <select name="arabic_tool_id" required>
                                                <option value="">Select a Tool</option>
                                                @foreach($tools as $tool)
                                                <option value="{{ $tool->id }}" {{ isset($diacritic->arabicTools->first()->id) && 
                                   $diacritic->arabicTools->first()->id == $tool->id ? 'selected' : '' }}>
                                                    {{ $tool->name }}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <input type="hidden" name="arabic_letter_id" value="{{ $letter->id }}">
                                            <input type="hidden" name="arabic_diacritic_id"
                                                value="{{ $diacritic->id }}">
                                            <label for="effect">Effect</label>
                                            <select name="effect" required>
                                                <option value="">اختر التأثير</option>
                                                <option value="لا تأثير"
                                                    {{ isset($diacritic->arabicLetters->first()->pivot) && $diacritic->arabicLetters->first()->pivot->effect == 'لا تأثير' ? 'selected' : '' }}>
                                                    لا تأثير</option>
                                                <option value="النصب"
                                                    {{ isset($diacritic->arabicLetters->first()->pivot) && $diacritic->arabicLetters->first()->pivot->effect == 'النصب' ? 'selected' : '' }}>
                                                    تغيير الحركة الإعرابية - النصب</option>
                                                <option value="الجزم"
                                                    {{ isset($diacritic->arabicLetters->first()->pivot) && $diacritic->arabicLetters->first()->pivot->effect == 'الجزم' ? 'selected' : '' }}>
                                                    تغيير الحركة الإعرابية - الجزم</option>
                                                <option value="الرفع"
                                                    {{ isset($diacritic->arabicLetters->first()->pivot) && $diacritic->arabicLetters->first()->pivot->effect == 'الرفع' ? 'selected' : '' }}>
                                                    تغيير الحركة الإعرابية - الرفع</option>
                                                <option value="الجر"
                                                    {{ isset($diacritic->arabicLetters->first()->pivot) && $diacritic->arabicLetters->first()->pivot->effect == 'الجر' ? 'selected' : '' }}>
                                                    تغيير الحركة الإعرابية - الجر</option>
                                                <option value="حذف حرف النون"
                                                    {{ isset($diacritic->arabicLetters->first()->pivot) && $diacritic->arabicLetters->first()->pivot->effect == 'حذف حرف النون' ? 'selected' : '' }}>
                                                    حذف حرف النون</option>
                                                <option value="حذف حرف العلة"
                                                    {{ isset($diacritic->arabicLetters->first()->pivot) && $diacritic->arabicLetters->first()->pivot->effect == 'حذف حرف العلة' ? 'selected' : '' }}>
                                                    حذف حرف العلة</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="usage_meaning">Usage Meaning</label>
                                        <input type="text" name="usage_meaning" placeholder="Enter usage meaning"
                                            value="{{ isset($diacritic->arabicLetters->first()->pivot) ? $diacritic->arabicLetters->first()->pivot->usage_meaning : '' }}">
                                    </div>
                                    
                                    <div style="text-align: right;">
                                        <button type="button" class="button"
                                            onclick="hideEditForm({{ $diacritic->id }})">Cancel</button>
                                        <button type="submit" class="button button-primary">Save Changes</button>
                                    </div>
                                </form>
                                <form id="diacriticForm">
                                        <input type="text" name="arabic_letter" value="{{ $letter->letter }}">
                                        <input type="text" name="effect"
                                            value="{{ isset($diacritic->arabicLetters->first()->pivot) ? $diacritic->arabicLetters->first()->pivot->effect : '' }}">
                                        <button type="submit" class="button button-primary">Description</button>
                                    </form>

                                    <div class="form-group">
                                        <label for="example">Example</label>
                                        <textarea name="example" rows="3"></textarea>
                                    </div>

                            </div>
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

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
    $(document).ready(function() {
        $('#diacriticForm').on('submit', function(e) {
            e.preventDefault(); // Prevent default form submission

            let formData = $(this).serialize(); // Serialize form data

            $.ajax({
                url: "{{ route('deepinfra-chat') }}", // Laravel route
                type: "POST",
                data: formData,
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}' // Add CSRF token for security
                },
                success: function(response) {
                    alert('Updated successfully!');
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                    alert('An error occurred. Please try again.');
                }
            });
        });
    });
    </script>

    <script>
    function showEditForm(diacriticId) {
        document.querySelectorAll('[id^="edit_form_"]').forEach(form => {
            form.style.display = 'none';
        });
        document.getElementById(`edit_form_${diacriticId}`).style.display = 'table-row';
    }

    function hideEditForm(diacriticId) {
        document.getElementById(`edit_form_${diacriticId}`).style.display = 'none';
    }

    function showToast(message, type = 'success') {
        const toast = document.getElementById('toast');
        toast.textContent = message;
        toast.className = `toast ${type} show`;

        setTimeout(() => {
            toast.className = 'toast';
        }, 3000);
    }

    async function handleSubmit(event) {
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
                location.reload();
            } else {
                throw new Error('Failed to save changes');
            }
        } catch (error) {
            showToast(error.message, 'error');
        }
    }

    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            document.querySelectorAll('[id^="edit_form_"]').forEach(form => {
                form.style.display = 'none';
            });
        }
    });
    </script>
</body>

</html>