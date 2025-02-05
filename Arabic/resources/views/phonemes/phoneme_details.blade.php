<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تفاصيل الحرف</title>
    <link href="https://fonts.googleapis.com/css2?family=Amiri:wght@400;700&family=Aref+Ruqaa:wght@400;700&display=swap"
        rel="stylesheet">
    <style>
    :root {
        --primary-color: #1a5f7a;
        --secondary-color: #c7b7a3;
        --text-color: #2b2b2b;
        --white: #ffffff;
        --error-color: #dc3545;
        --success-color: #28a745;
    }

    body {
        font-family: 'Amiri', serif;
        background: linear-gradient(135deg, #f5f7fa 0%, #e4e9f2 100%);
        color: var(--text-color);
        margin: 0;
        padding: 0;
        min-height: 100vh;
    }

    .container {
        max-width: 1200px;
        margin: 2rem auto;
        padding: 2rem;
        display: flex;
        gap: 2rem;
    }

    .right-section {
        flex: 1;
        background: var(--white);
        border-radius: 12px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        padding: 2rem;
        height: fit-content;
    }

    .left-section {
        flex: 1;
        background: var(--white);
        border-radius: 12px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        padding: 2rem;
        height: fit-content;
    }

    .letter-display {
        text-align: center;
        font-size: 6rem;
        color: var(--primary-color);
        margin-bottom: 2rem;
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.1);
        padding: 2rem;
        background: #f8f9fa;
        border-radius: 8px;
        box-shadow: inset 0 2px 4px rgba(0, 0, 0, 0.05);
    }

    .rule-form {
        display: grid;
        gap: 2rem;
        padding: 1rem;
    }

    .form-group {
        display: grid;
        gap: 0.75rem;
    }

    label {
        font-weight: bold;
        color: var(--primary-color);
        font-size: 1.1rem;
    }

    select,
    textarea {
        padding: 1rem;
        border: 2px solid #e0e0e0;
        border-radius: 8px;
        font-size: 1rem;
        width: 100%;
        transition: border-color 0.3s ease;
    }

    select:focus,
    textarea:focus {
        outline: none;
        border-color: var(--primary-color);
        box-shadow: 0 0 0 3px rgba(26, 95, 122, 0.1);
    }

    .btn-submit {
        background-color: var(--primary-color);
        color: var(--white);
        padding: 1.2rem 2rem;
        border: none;
        border-radius: 8px;
        cursor: pointer;
        font-size: 1.1rem;
        width: 100%;
        transition: transform 0.2s ease, background-color 0.2s ease;
        margin-top: 1rem;
    }

    .btn-submit:hover {
        background-color: #156688;
        transform: translateY(-2px);
    }

    .rules-list {
        margin-top: 2rem;
    }

    .rules-list h2 {
        color: var(--primary-color);
        border-bottom: 2px solid #e0e0e0;
        padding-bottom: 1rem;
        margin-bottom: 2rem;
        font-size: 1.5rem;
    }

    .rule-item {
        background: #f8f9fa;
        padding: 1.5rem;
        margin-bottom: 1.5rem;
        border-radius: 8px;
        border-right: 4px solid var(--primary-color);
        transition: transform 0.2s ease;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
    }

    .rule-item:hover {
        transform: translateX(-5px);
    }

    .rule-item strong {
        color: var(--primary-color);
        display: inline-block;
        min-width: 100px;
    }

    .rule-item div {
        margin-bottom: 0.5rem;
    }

    .alert {
        padding: 1rem;
        margin-bottom: 1rem;
        border-radius: 8px;
        font-weight: bold;
    }

    .alert-success {
        background-color: #d4edda;
        color: #155724;
        border: 1px solid #c3e6cb;
    }

    .alert-error {
        background-color: #f8d7da;
        color: #721c24;
        border: 1px solid #f5c6cb;
    }

    .validation-error {
        color: var(--error-color);
        font-size: 0.9rem;
        margin-top: 0.25rem;
    }

    .text-muted {
        color: #6c757d;
        text-align: center;
        padding: 2rem;
        font-style: italic;
    }

    @media (max-width: 992px) {
        .container {
            flex-direction: column;
            padding: 1rem;
            margin: 1rem;
        }

        .right-section,
        .left-section {
            width: 100%;
        }

        .letter-display {
            font-size: 4rem;
            padding: 1.5rem;
        }
    }
    </style>
    <style>
        
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
    <div class="container">
        <div class="right-section">
            <div class="letter-display">
                {{ $phoneme->arabicLetter->letter }}
            </div>

            <div class="rules-list">
                <h2>القواعد المضافة</h2>
                @foreach($rule as $table => $records)
                @if ($table != "")
                <p class="text-muted"></p>
                @else
                @foreach ($records as $record)
                @foreach ($record as $value)
                <div class="rule-item">
                    <div><strong>الأداة:</strong> {{ $value }}</div>
                    <div><strong>التأثير:</strong> </div>
                    <div style="display: flex;">
                        <p><strong>ملاحظات:</strong></p>
                    </div>
                </div>
                @endforeach
                @endforeach
                @endif
                @endforeach
            </div>
        </div>

        <div class="left-section">
            @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif

            @if($errors->any())
            <div class="alert alert-error">
                <ul>
                    @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <form action="{{ route('update.phoneme.diacritic') }}" method="POST" dir="rtl" style="text-align: start;"
                onsubmit="handleSubmit(event)">
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
                        <label for="effect">الوظيفة الدلالية :</label>
                        <input type="text" id="semantic_function" name="semantic_function" required>

                        <label for="grammatical_function" style="margin-top: 15px;">الوظيفة النحوية
                            :</label>
                        <input type="text" id="grammatical_function" name="grammatical_function" required>
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
                    <button type="submit" class="button button-primary">Save Changes</button>
                </div>
            </form>
        </div>
    </div>

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