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
    <style>
.loader-container {
  display: none;
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background: rgba(0, 0, 0, 0.7);
  backdrop-filter: blur(4px);
  z-index: 1000;
  display: flex;
  justify-content: center;
  align-items: center;
}

.loader-content {
  background: white;
  padding: 2rem;
  border-radius: 1rem;
  box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
  text-align: center;
  max-width: 400px;
  width: 90%;
}

.brain-loader {
  width: 80px;
  height: 80px;
  margin: 0 auto 1rem;
  background: 
    linear-gradient(90deg, #4F46E5 50%, transparent 50%),
    linear-gradient(90deg, #818CF8 50%, transparent 50%),
    linear-gradient(90deg, #C7D2FE 50%, transparent 50%);
  background-size: 200% 100%;
  background-position: 200% 0;
  border-radius: 50%;
  animation: pulse 2s ease-in-out infinite;
  position: relative;
}

.brain-loader::before {
  content: "";
  position: absolute;
  width: 100%;
  height: 100%;
  background: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='none' stroke='white' stroke-width='2'%3E%3Cpath d='M9.5 2a2.5 2.5 0 0 1 2.5 2.5c0 .63-.24 1.2-.63 1.63.31.4.5.9.5 1.46a2.5 2.5 0 0 1-2.5 2.5c-.63 0-1.2-.24-1.63-.63-.4.31-.9.5-1.46.5a2.5 2.5 0 0 1-2.5-2.5c0-.63.24-1.2.63-1.63-.31-.4-.5-.9-.5-1.46a2.5 2.5 0 0 1 2.5-2.5c.63 0 1.2.24 1.63.63.4-.31.9-.5 1.46-.5zM16.5 6a2.5 2.5 0 0 1 2.5 2.5c0 .63-.24 1.2-.63 1.63.31.4.5.9.5 1.46a2.5 2.5 0 0 1-2.5 2.5c-.63 0-1.2-.24-1.63-.63-.4.31-.9.5-1.46.5a2.5 2.5 0 0 1-2.5-2.5c0-.63.24-1.2.63-1.63-.31-.4-.5-.9-.5-1.46a2.5 2.5 0 0 1 2.5-2.5c.63 0 1.2.24 1.63.63.4-.31.9-.5 1.46-.5z'/%3E%3C/svg%3E") center/60% no-repeat;
}

.thinking-dots::after {
  content: '';
  animation: dots 1.5s steps(5, end) infinite;
}

@keyframes pulse {
  0% { transform: scale(1); background-position: 200% 0; }
  50% { transform: scale(1.1); background-position: 100% 0; }
  100% { transform: scale(1); background-position: 0% 0; }
}

@keyframes dots {
  0%, 20% { content: '.'; }
  40% { content: '..'; }
  60% { content: '...'; }
  80% { content: '....'; }
  100% { content: '.....'; }
}

.messages {
  margin-top: 1rem;
}

.message {
  margin: 0.5rem 0;
  font-size: 0.9rem;
  color: #6B7280;
  opacity: 0;
  transform: translateY(10px);
  animation: fadeInUp 0.5s ease forwards;
}

@keyframes fadeInUp {
  to {
    opacity: 1;
    transform: translateY(0);
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
                                <form action="{{ route('update.phoneme.diacritic') }}" method="POST" dir="rtl"
                                    style="text-align: start;" onsubmit="handleSubmit(event)">
                                    @csrf
                                    <div class="grid">
                                        <div class="form-group">
                                            <label for="arabic_tool_id">الأداة :</label>
                                            <select name="arabic_tool_id" required>
                                                <option value="">اختر نوع الأداة</option>
                                                @foreach($tools as $tool)
                                                <option value="{{ $tool->id }}">
                                                    {{ $tool->arabic_name }}
                                                </option>
                                                @endforeach
                                            </select>
                                            <label for="english_name" style="margin-top: 15px;">اللفظ بالإنجليزية
                                                :</label>
                                            <input type="text" id="english_name" name="english_name" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="hidden" name="arabic_letter_id" value="{{ $letter->letter }}">
                                            <input type="hidden" name="arabic_diacritic_id"
                                                value="{{ $diacritic->diacritic }}">
                                            <label for="semantic_logical_effects">الوظيفة الدلالية :</label>
                                            <select name="semantic_logical_effects" required>
                                                <option value="">اختر الوظيفة الدلالية</option>
                                                @foreach($Semantic_logical_effect as $tool)
                                                <option value="{{ $tool->id }}">
                                                {{ $tool->typical_relation  }}، {{ $tool->nisbah_type  }}
                                                </option>
                                                @endforeach
                                            </select>

                                            <label for="syntactic_effects" style="margin-top: 15px;">الوظيفة النحوية
                                                :</label>
                                                <select name="syntactic_effects" required>
                                                <option value="">اختر الوظيفة النحوية</option>
                                                @foreach($syntactic_effect as $tool)
                                                <option value="{{ $tool->id }}">
                                                    {{ $tool->result_case }}
                                                </option>
                                                @endforeach
                                            </select>
                                                
                                        </div>

                                    </div>
                                    <div class="form-group">
                                        <label for="usage_meaning">مثال :</label>
                                        <textarea id="example" name="example" rows="3" required></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="example">شرح</label>
                                        <textarea name="description" rows="3"></textarea>
                                            <button class="btn" id="ai" type="button">إستخدم الذكاء الإصطناعي</button>
                                    </div>
                                    <div style="text-align: right;">
                                        <button type="button" class="button"
                                            onclick="hideEditForm({{ $diacritic->id }})">Cancel</button>
                                        <button type="submit" class="button button-primary">Save Changes</button>
                                    </div>
                                </form>
                                <div id="toast"></div>
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
    

<div id="aiLoader" class="loader-container" style="display: none;">
  <div class="loader-content">
    <div class="brain-loader"></div>
    <h3 class="thinking-dots" style="color: #4F46E5; margin: 0;">AI is thinking</h3>
    <div class="messages">
      <p class="message" style="animation-delay: 0.5s">Analyzing language patterns...</p>
      <p class="message" style="animation-delay: 1.5s">Generating linguistic insights...</p>
      <p class="message" style="animation-delay: 2.5s">Crafting detailed explanation...</p>
    </div>
  </div>
</div>

<script>
document.getElementById('ai').addEventListener('click', async function() {
    const loader = document.getElementById('aiLoader');
    loader.style.display = 'flex';
    
    try {
        const response = await fetch("{{ route('deepinfra-chat') }}", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": document.querySelector('input[name="_token"]').value
            },
            body: JSON.stringify({
                arabic_letter_id: document.querySelector('input[name="arabic_letter_id"]').value,
                arabic_diacritic_id: document.querySelector('input[name="arabic_diacritic_id"]').value
            })
        });

        const data = await response.json();

        if (data.description) {
            document.querySelector('textarea[name="description"]').value = data.description;
        }
    } catch (error) {
        console.error('Error:', error);
    } finally {
        loader.style.display = 'none';
    }
});
</script>
    <script>


    document.addEventListener("DOMContentLoaded", function() {
        function handleSubmit(event) {
            event.preventDefault(); // Prevent form submission
            let formData = new FormData(event.target); // Collect form data

            fetch("{{ route('deepinfra-chat') }}", {
                    method: "POST",
                    headers: {
                        "X-CSRF-TOKEN": "{{ csrf_token() }}", // Send CSRF token with the request
                    },
                    body: formData, // Send form data as POST body
                })
                .then(response => response.json())
                .then(data => {
                    if (data.error) {
                        showToast("An error occurred: " + data.error, "error");
                    } else {
                        showToast("Updated successfully!");
                    }
                })
                .catch(error => {
                    showToast("An error occurred. Please try again.", "error");
                });
        }

        // Ensure the form is selected and event listener is attached
        const form = document.getElementById("your-form-id");
        if (form) {
            form.addEventListener("submit", handleSubmit);
        }

        // Function to show toast notifications
        function showToast(message, type = "success") {
            const toast = document.getElementById("toast");
            toast.textContent = message;
            toast.className = `toast ${type} show`;

            setTimeout(() => {
                toast.className = "toast";
            }, 3000);
        }
        window.showEditForm = function(diacriticId) {
            document.querySelectorAll('[id^="edit_form_"]').forEach(form => form.style.display = "none");
            document.getElementById(`edit_form_${diacriticId}`).style.display = "table-row";
        };

        window.hideEditForm = function(diacriticId) {
            document.getElementById(`edit_form_${diacriticId}`).style.display = "none";
        };
    });


    document.addEventListener("keydown", function(e) {
        if (e.key === "Escape") {
            document.querySelectorAll('[id^="edit_form_"]').forEach(form => form.style.display = "none");
        }
    });
    </script>

</body>

</html>