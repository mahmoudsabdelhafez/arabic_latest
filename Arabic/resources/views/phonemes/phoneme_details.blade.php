<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تفاصيل الحرف</title>
    <link href="https://fonts.googleapis.com/css2?family=Amiri:wght@400;700&family=Aref+Ruqaa:wght@400;700&display=swap" rel="stylesheet">
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

        select, textarea {
            padding: 1rem;
            border: 2px solid #e0e0e0;
            border-radius: 8px;
            font-size: 1rem;
            width: 100%;
            transition: border-color 0.3s ease;
        }

        select:focus, textarea:focus {
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
</head>
<body>
    <div class="container">
        <div class="right-section">
            <div class="letter-display">
                {{ $phoneme->arabicLetter->letter }}
            </div>
            
            <div class="rules-list">
                <h2>القواعد المضافة</h2>
                @if(isset($letter->arabicTools) && $letter->arabicTools->count() > 0)
                    @foreach($letter->arabicTools as $tool)
                        <div class="rule-item">
                            <div><strong>الأداة:</strong> {{ $tool->name }}</div>
                            <div><strong>التأثير:</strong> {{ $tool->pivot->effect }}</div>
                            <div><strong>ملاحظات:</strong> {{ $tool->pivot->note ?? 'لا توجد ملاحظات' }}</div>
                        </div>
                    @endforeach
                @else
                    <p class="text-muted">لا توجد قواعد مضافة لهذا الحرف.</p>
                @endif
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

            <form class="rule-form" method="POST" action="{{route('ar-tools.store')}}">
                @csrf
                <input type="hidden" name="letter_id" value="{{ $phoneme->arabicLetter->id }}">
                
                <div class="form-group">
                    <label for="tool_id">الأداة النحوية:</label>
                    <select name="tool_id" id="tool_id" required>
                        <option value="">اختر الأداة</option>
                        @foreach($tools as $tool)
                            <option value="{{ $tool->id }}" {{ old('tool_id') == $tool->id ? 'selected' : '' }}>
                                {{ $tool->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('tool_id')
                        <span class="validation-error">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="effect">التأثير:</label>
                    <select name="effect" id="effect" required>
                        <option value="">اختر التأثير</option>
                        <option value="لا تأثير" {{ old('effect') == 'لا تأثير' ? 'selected' : '' }}>لا تأثير</option>
                        <option value="النصب" {{ old('effect') == 'النصب' ? 'selected' : '' }}>تغيير الحركة الإعرابية - النصب</option>
                        <option value="الجزم" {{ old('effect') == 'الجزم' ? 'selected' : '' }}>تغيير الحركة الإعرابية - الجزم</option>
                        <option value="الرفع" {{ old('effect') == 'الرفع' ? 'selected' : '' }}>تغيير الحركة الإعرابية - الرفع</option>
                        <option value="الجر" {{ old('effect') == 'الجر' ? 'selected' : '' }}>تغيير الحركة الإعرابية - الجر</option>
                        <option value="حذف حرف النون" {{ old('effect') == 'حذف حرف النون' ? 'selected' : '' }}>حذف حرف النون</option>
                        <option value="حذف حرف العلة" {{ old('effect') == 'حذف حرف العلة' ? 'selected' : '' }}>حذف حرف العلة</option>
                    </select>
                    @error('effect')
                        <span class="validation-error">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group" style="margin-left: 7.5%;">
                    <label for="note">ملاحظات:</label>
                    <textarea name="note" id="note" rows="4">{{ old('note') }}</textarea>
                    @error('note')
                        <span class="validation-error">{{ $message }}</span>
                    @enderror
                </div>

                <button type="submit" class="btn-submit">إضافة القاعدة</button>
            </form>
        </div>
    </div>
</body>
</html>