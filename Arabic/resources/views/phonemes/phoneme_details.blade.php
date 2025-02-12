{{-- resources/views/phonemes/edit.blade.php --}}
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تحرير الصوتيات</title>
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
        line-height: 1.8;
    }

    .container {
        max-width: 1200px;
        margin: 2rem auto;
        padding: 2rem;
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 2rem;
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

    .card {
        background: var(--white);
        border-radius: 15px;
        padding: 2rem;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    }

    .rules-list {
        margin-top: 2rem;
    }

    .rules-list h2 {
        color: var(--primary-color);
        font-family: 'Aref Ruqaa', serif;
        margin-bottom: 1.5rem;
        font-size: 1.8rem;
    }

    .rules-list h3 {
        color: var(--secondary-color);
        margin: 1rem 0;
        font-size: 1.4rem;
    }

    .table {
        width: 100%;
        border-collapse: collapse;
        margin: 1rem 0;
    }

    .table th,
    .table td {
        padding: 1rem;
        border: 1px solid #e2e8f0;
        text-align: right;
    }

    .table th {
        background: rgba(35, 75, 110, 0.1);
        color: var(--primary-color);
    }

    .form-group {
        margin-bottom: 1.5rem;
    }

    label {
        display: block;
        margin-bottom: 0.5rem;
        color: var(--primary-color);
        font-weight: bold;
    }

    input[type="text"],
    select,
    textarea {
        width: 100%;
        padding: 0.75rem;
        border: 2px solid rgba(35, 75, 110, 0.2);
        border-radius: 8px;
        font-family: 'Amiri', serif;
        font-size: 1rem;
        transition: all 0.3s ease;
    }

    input[type="text"]:focus,
    select:focus,
    textarea:focus {
        border-color: var(--primary-color);
        box-shadow: 0 0 0 3px rgba(35, 75, 110, 0.1);
        outline: none;
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
    .btn {
        padding: 0.75rem 1.5rem;
        border: none;
        border-radius: 8px;
        font-family: 'Amiri', serif;
        font-size: 1rem;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .btn-primary {
        background: linear-gradient(45deg, var(--gradient-start), var(--gradient-end));
        color: var(--white);
    }

    .btn-ai {
        background: #4F46E5;
        color: var(--white);
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .alert {
        padding: 1rem;
        border-radius: 8px;
        margin-bottom: 1rem;
    }

    .alert-success {
        background-color: #def7ec;
        color: #03543f;
    }

    .alert-error {
        background-color: #fde8e8;
        color: #9b1c1c;
    }

    .loader-container {
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: rgba(255, 255, 255, 0.9);
        display: flex;
        justify-content: center;
        align-items: center;
        z-index: 1000;
    }

    .loader-content {
        text-align: center;
        padding: 2rem;
        background: white;
        border-radius: 15px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
    }

    header {
        background: linear-gradient(45deg, var(--gradient-start), var(--gradient-end));
        padding: 3rem;
        position: relative;
        overflow: hidden;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
    }

    header::before {
        content: '';
        position: absolute;
        top: 0;
        right: 0;
        left: 0;
        bottom: 0;
        background:
            radial-gradient(circle at 50% 50%, rgba(255, 255, 255, 0.1) 0%, transparent 60%),
            linear-gradient(45deg, rgba(255, 255, 255, 0.1) 25%, transparent 25%);
        background-size: 100% 100%, 60px 60px;
        opacity: 0.2;
        animation: backgroundMove 30s linear infinite;
    }

    header h1 {
        color: var(--white);
        font-size: 3rem;
        text-align: center;
        font-family: 'Aref Ruqaa', serif;
        position: relative;
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2);
    }


    .footer {
        background: linear-gradient(45deg, var(--gradient-start), var(--gradient-end));
        color: var(--white);
        text-align: center;
        padding: 2rem;
        margin-top: auto;
        position: relative;
        overflow: hidden;
        font-family: 'Aref Ruqaa', serif;
    }

    @media (max-width: 768px) {
        .container {
            grid-template-columns: 1fr;
            padding: 1rem;
        }

        .letter-display {
            font-size: 6rem;
        }
    }
    </style>
</head>

<body>
    <header>
        <h1>القواعد المتصلة بالحرف</h1>
    </header>

    <div class="container">
        <div class="right-section card">
            <div class="letter-display">
                {{ $phoneme->arabicLetter->letter }}
            </div>

            <div class="rules-list">
                <h2>القواعد المضافة</h2>
                @if(empty(array_filter($tables, fn($result) => $result->isNotEmpty())))
                <p class="text-center">لا توجد نتائج.</p>
                @else
                @foreach($tables as $tableName => $results)
                @if($results->isNotEmpty())
                <h3>{{ $tableName }}</h3>
                <table class="table">
                    <thead>
                        <tr>
                            <th>الرقم</th>
                            <th>الاسم</th>
                            <th>التصنيفات</th>
                            <th>جدول البيانات</th>
                            <th>الشروط السياقية</th>
                        </tr>
                    </thead>
                    <tbody>
    @foreach($results as $item)
    <tr>
        <td>{{ $item->id }}</td>
        <td>{{ $item->name }}</td>
        <td>
            <form action="{{ route('classification.ruleDetails') }}" method="GET">
                <input type="hidden" name="letter" value="{{ $item->name }}">
                <input type="hidden" name="tool_id" value="{{ $item->id }}">
                <input type="hidden" name="linking_tool_id" value="{{ $item->linking_tool_id }}">
                <button class="button" type="submit">عرض التصنيفات</button>
            </form>
        </td>
        <td>
            <form action="{{ url('tool_information/show-table', $item->linking_tool_id) }}" method="GET">
                <input type="hidden" name="letter" value="{{ $item->id }}">
                <input type="hidden" name="linking_tool_id" value="{{ $item->linking_tool_id }}">
                <button class="button" type="submit">عرض الشروط</button>
            </form>
        </td>
        <td>
            <form action="{{ url('contextual_conditions/index') }}" method="GET">
                <input type="hidden" name="letter" value="{{ $item->name }}">
                <input type="hidden" name="tool_id" value="{{ $item->id }}">
                <input type="hidden" name="linking_tool_id" value="{{ $item->linking_tool_id }}">
                <button class="button" type="submit">عرض السياقية</button>
            </form>
        </td>
        @if (auth()->check() )

        <td>
            <!-- DELETE Button with linking_tool_id -->
            <form action="{{ route('delete.rule', ['id' => $item->id, 'linking_tool_id' => $item->linking_tool_id]) }}" 
                  method="POST" 
                  onsubmit="return confirmDelete(event, this);">
                @csrf
                @method('DELETE')
                <input type="hidden" name="linking_tool_id" value="{{ $item->linking_tool_id }}">
                <button type="submit" class="btn btn-danger">حذف</button>
            </form>
        </td>
        @endif
    </tr>
    @endforeach
</tbody>

                    
                </table>
                @endif
                @endforeach
                @endif
            </div>
        </div>
        @if (auth()->check() )

        <div class="left-section card">
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

            <form action="{{ route('update.phoneme.diacritic') }}" method="POST" onsubmit="handleSubmit(event)">
                @csrf
                <div class="grid">
                    <div class="form-group">
                        <label for="arabic_tool_id">الأداة :</label>
                        <select name="arabic_tool_id" required>
                            <option value="">اختر نوع الأداة</option>
                            @foreach($tools as $tool)
                            <option value="{{ $tool->id }}">{{ $tool->arabic_name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="english_name">اللفظ بالإنجليزية :</label>
                        <input type="text" id="english_name" name="english_name" required>
                    </div>

                    <input type="hidden" name="arabic_letter_id" value="{{ $letter->letter }}">

                    <div class="form-group">
                        <label for="semantic_logical_effects">الوظيفة الدلالية :</label>
                                            <select name="semantic_logical_effects" required>
                                                <option value="">اختر الوظيفة الدلالية</option>
                                                @foreach($Semantic_logical_effect as $tool)
                                                <option value="{{ $tool->id }}">
                                                    {{ $tool->typical_relation  }}، {{ $tool->nisbah_type  }}
                                                </option>
                                                @endforeach
                                            </select>
                    </div>

                    <div class="form-group">
                        <label for="syntactic_effects">الوظيفة النحوية :</label>
                        <select name="syntactic_effects" required>
                                                <option value="">اختر الوظيفة النحوية</option>
                                                @foreach($syntactic_effect as $tool)
                                                <option value="{{ $tool->id }}">
                                                    {{ $tool->result_case }}
                                                </option>
                                                @endforeach
                                            </select>                    </div>

                    <div class="form-group">
                        <label for="example">مثال :</label>
                        <textarea id="example" name="example" rows="3" required></textarea>
                    </div>

                    <div class="form-group">
                        <label for="description">شرح :</label>
                        <textarea name="description" rows="3"></textarea>
                        <button class="btn btn-ai" id="ai" type="button">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2">
                                <path
                                    d="M12 2a10 10 0 0 1 10 10c0 5.523-4.477 10-10 10S2 17.523 2 12 6.477 2 12 2m0 2a8 8 0 1 0 0 16 8 8 0 0 0 0-16">
                                </path>
                                <path d="M12 6v6l4 2"></path>
                            </svg>
                            إستخدم الذكاء الإصطناعي
                        </button>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">حفظ التغييرات</button>
                    </div>
                </div>
            </form>
        </div>
        @endif
    </div>

    <div id="aiLoader" class="loader-container" style="display: none;">
        <div class="loader-content">
            <div class="brain-loader"></div>
            <h3 style="color: #4F46E5; margin-bottom: 1rem;">جاري التفكير...</h3>
            <div class="messages">
                <p style="animation-delay: 0.5s">تحليل أنماط اللغة...</p>
                <p style="animation-delay: 1.5s">توليد الرؤى اللغوية...</p>
                <p style="animation-delay: 2.5s">صياغة الشرح المفصل...</p>
            </div>
        </div>
    </div>
    <footer class="footer">
        <p>© جميع الحقوق محفوظة </p>
    </footer>
    <script>
    function handleSubmit(event) {
        event.preventDefault();
        const form = event.target;
        const formData = new FormData(form);

        // Validate required fields
        const requiredFields = form.querySelectorAll('[required]');
        let isValid = true;
        requiredFields.forEach(field => {
            if (!field.value.trim()) {
                isValid = false;
                field.classList.add('error');
            } else {
                field.classList.remove('error');
            }
        });

        if (!isValid) {
            showToast("يرجى ملء جميع الحقول المطلوبة", "error");
            return;
        }

        // Disable submit button to prevent multiple submissions
        const submitButton = form.querySelector('button[type="submit"]');
        submitButton.disabled = true;
        submitButton.classList.add('btn-loading');

        fetch("{{ route('update.phoneme.diacritic') }}", {
            method: "POST",
            headers: {
                "X-CSRF-TOKEN": document.querySelector('input[name="_token"]').value
            },
            body: formData
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {
            if (data.error) {
                showToast("حدث خطأ: " + data.error, "error");
            } else {
                showToast("تم التحديث بنجاح!");
                // Optional: Redirect or refresh page
                window.location.reload();
            }
        })
        .catch(error => {
            console.error('Error:', error);
            showToast("حدث خطأ. يرجى المحاولة مرة أخرى.", "error");
        })
        .finally(() => {
            // Re-enable submit button
            submitButton.disabled = false;
            submitButton.classList.remove('btn-loading');
        });
    }

    function showToast(message, type = "success") {
        // Create toast element if it doesn't exist
        let toast = document.getElementById("toast");
        if (!toast) {
            toast = document.createElement("div");
            toast.id = "toast";
            toast.style.cssText = `
                position: fixed;
                bottom: 20px;
                left: 50%;
                transform: translateX(-50%);
                padding: 15px;
                border-radius: 8px;
                color: white;
                z-index: 1000;
                transition: opacity 0.3s;
            `;
            document.body.appendChild(toast);
        }

        toast.textContent = message;
        toast.style.backgroundColor = type === "success" ? "#4CAF50" : "#F44336";
        toast.style.opacity = "1";

        setTimeout(() => {
            toast.style.opacity = "0";
        }, 3000);
    }

    // AI Assistant Button Logic
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
                    // Add other necessary data here
                })
            });

            const data = await response.json();

            if (data.description) {
                document.querySelector('textarea[name="description"]').value = data.description;
            } else {
                showToast("لم يتم إنشاء وصف", "error");
            }
        } catch (error) {
            console.error('Error:', error);
            showToast("حدث خطأ أثناء استدعاء الذكاء الاصطناعي", "error");
        } finally {
            loader.style.display = 'none';
        }
    });

    // Add additional styles for error states
    const styleTag = document.createElement('style');
    styleTag.textContent = `
        input:invalid, select:invalid, textarea:invalid {
        }
        
        .btn-loading {
            opacity: 0.7;
            cursor: not-allowed;
        }
    `;
    document.head.appendChild(styleTag);
    function confirmDelete(event, form) {
    event.preventDefault(); // Prevent default form submission
    if (confirm("هل أنت متأكد أنك تريد حذف هذا العنصر؟ لا يمكن التراجع عن هذا الإجراء!")) {
        form.submit(); // Submit the form if confirmed
    }
}

    </script>
</body>

</html>