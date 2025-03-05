<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تحرير الفونيم</title>
    <link
        href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;600;700&family=Amiri&family=Aref+Ruqaa:wght@400;700&display=swap"
        rel="stylesheet">
    <style>
    :root {
        --primary-color: #234B6E;
        --primary-light: rgba(35, 75, 110, 0.1);
        --secondary-color: #3A7E71;
        --secondary-light: rgba(58, 126, 113, 0.1);
        --accent-color: #C17B3F;
        --accent-light: rgba(193, 123, 63, 0.1);
        --text-color: #2b2b2b;
        --text-light: #666;
        --white: #ffffff;
        --light-bg: #f9f9fc;
        --gradient-start: #234B6E;
        --gradient-end: #3A7E71;
        --border-radius: 12px;
        --box-shadow: 0 8px 30px rgba(0, 0, 0, 0.08);
        --transition: all 0.3s ease;
    }

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        font-family: 'Cairo', 'Amiri', serif;
        line-height: 1.7;
        background: linear-gradient(135deg, #f5f7fa 0%, #e4e9f2 100%);
        color: var(--text-color);
        min-height: 100vh;
        padding-bottom: 3rem;
        direction: rtl;
        text-align: right;
    }

    header {
        background: linear-gradient(45deg, var(--gradient-start), var(--gradient-end));
        padding: 2.5rem 2rem;
        position: relative;
        overflow: hidden;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.15);
        margin-bottom: 2.5rem;
        border-bottom-left-radius: 30px;
        border-bottom-right-radius: 30px;
    }

    header::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background:
            radial-gradient(circle at 50% 50%, rgba(255, 255, 255, 0.1) 0%, transparent 60%),
            linear-gradient(45deg, rgba(255, 255, 255, 0.1) 25%, transparent 25%);
        background-size: 100% 100%, 60px 60px;
        opacity: 0.2;
        animation: backgroundMove 30s linear infinite;
    }

    @keyframes backgroundMove {
        0% {
            background-position: center, 0 0;
        }

        100% {
            background-position: center, 60px 60px;
        }
    }

    header h1 {
        color: var(--white);
        font-size: 2.5rem;
        text-align: center;
        font-family: 'Aref Ruqaa', serif;
        position: relative;
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2);
    }

    .container {
        max-width: 1000px;
        margin: 0 auto;
        padding: 0 1.5rem;
    }

    .section {
        background: var(--white);
        border-radius: var(--border-radius);
        padding: 2.5rem;
        box-shadow: var(--box-shadow);
        margin-bottom: 2.5rem;
        animation: fadeIn 0.5s ease;
        position: relative;
        overflow: hidden;
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(20px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    h2,
    h3 {
        color: var(--primary-color);
        margin-bottom: 1.8rem;
        font-size: 2rem;
        font-family: 'Aref Ruqaa', serif;
        position: relative;
        padding-bottom: 0.85rem;
    }

    h2::after,
    h3::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        width: 80px;
        height: 4px;
        background: linear-gradient(45deg, var(--gradient-start), var(--gradient-end));
        border-radius: 2px;
    }

    h3 {
        font-size: 1.8rem;
        margin: 2.5rem 0 1.5rem;
        padding-bottom: 0.7rem;
        border-bottom: 2px solid var(--secondary-color);
        display: inline-block;
    }

    h3::after {
        width: 40%;
    }

    .card {
        background-color: var(--light-bg);
        border-radius: var(--border-radius);
        padding: 2rem;
        margin-bottom: 2rem;
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.05);
        border-left: 4px solid var(--accent-color);
        transition: var(--transition);
    }

    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 12px 30px rgba(0, 0, 0, 0.1);
    }

    .card-body {
        padding: 1rem 0;
    }

    .card-title {
        color: var(--primary-color);
        font-size: 1.7rem;
        margin-bottom: 1.2rem;
        font-family: 'Aref Ruqaa', serif;
    }

    label {
        display: block;
        margin-top: 1rem;
        margin-bottom: 0.5rem;
        color: var(--primary-color);
        font-weight: 600;
        text-align: right;
    }

    .form-control {
        width: 100%;
        padding: 0.8rem 1rem;
        font-size: 1rem;
        border: 2px solid rgba(0, 0, 0, 0.1);
        border-radius: var(--border-radius);
        background-color: var(--white);
        transition: var(--transition);
        font-family: 'Cairo', 'Amiri', serif;
        margin-bottom: 0.5rem;
        text-align: right;
    }

    .form-control:focus {
        outline: none;
        border-color: var(--secondary-color);
        box-shadow: 0 0 0 3px var(--secondary-light);
    }

    .btn {
        display: inline-block;
        padding: 0.8rem 1.8rem;
        border-radius: var(--border-radius);
        transition: var(--transition);
        cursor: pointer;
        font-family: 'Cairo', 'Amiri', serif;
        font-weight: 600;
        font-size: 1.1rem;
        border: none;
        margin-top: 1rem;
    }

    .btn-primary {
        background: linear-gradient(45deg, var(--primary-color), var(--secondary-color));
        color: var(--white);
        box-shadow: 0 4px 10px rgba(35, 75, 110, 0.3);
    }

    .btn-primary:hover {
        transform: translateY(-5px);
        box-shadow: 0 6px 15px rgba(35, 75, 110, 0.4);
    }

    @media (max-width: 768px) {
        header {
            padding: 1.8rem 1rem;
        }

        header h1 {
            font-size: 1.8rem;
        }

        .section {
            padding: 1.5rem;
        }

        .card {
            padding: 1.2rem;
        }

        h2 {
            font-size: 1.6rem;
        }

        h3 {
            font-size: 1.4rem;
        }

        .card-title {
            font-size: 1.4rem;
        }
    }

    @keyframes slideIn {
        from {
            opacity: 0;
            transform: translateX(-20px);
        }

        to {
            opacity: 1;
            transform: translateX(0);
        }
    }

    .card {
        animation: slideIn 0.3s ease forwards;
    }

    .card:nth-child(1) {
        animation-delay: 0.1s;
    }

    .card:nth-child(2) {
        animation-delay: 0.2s;
    }

    .card:nth-child(3) {
        animation-delay: 0.3s;
    }

    .card:nth-child(4) {
        animation-delay: 0.4s;
    }

    .card:nth-child(5) {
        animation-delay: 0.5s;
    }
    </style>
</head>

<body>
    <header>
        <h1>تحرير الفونيم</h1>
    </header>

    <div class="container">
        <div class="section">
            <form action="{{ route('phonemes.update', $phoneme->id) }}" method="POST">
                @csrf

                <!-- Phoneme Details -->
                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="card-title">تفاصيل الفونيم</h5>
                        <label>الرمز:</label>
                        <input type="text" name="Symbol" class="form-control" value="{{ $phoneme->Symbol }}" required>

                        <label>رمز يونيكود سداسي:</label>
                        <input type="text" name="unicode_hex" class="form-control" value="{{ $phoneme->unicode_hex }}">

                        <label>الجهر:</label>
                        <input type="text" name="Voicing" class="form-control" value="{{ $phoneme->Voicing }}">

                        <label>المكان والطريقة:</label>
                        <input type="text" name="PlaceManner" class="form-control" value="{{ $phoneme->PlaceManner }}">

                        <label>المدة:</label>
                        <input type="text" name="Duration" class="form-control" value="{{ $phoneme->Duration }}">
                    </div>
                </div>

                <!-- Morphological Functions -->
                <h3>الوظائف الصرفية</h3>
                @foreach($phoneme->morphologicalFunction as $morphFunction)
                <div class="card mb-3">
                    <div class="card-body">
                        <input type="hidden" name="morphological_functions[{{ $morphFunction->id }}][id]"
                            value="{{ $morphFunction->id }}">

                        <label>التأثير الإملائي:</label>
                        <input type="text" name="morphological_functions[{{ $morphFunction->id }}][function_type]"
                            class="form-control" value="{{ $morphFunction->function_type }}">
                        <label>الوصف : </label>
                        <input type="text" name="morphological_functions[{{ $morphFunction->id }}][description]"
                            class="form-control" value="{{ $morphFunction->description }}">
                        <label>الأمثلة:</label>
                        <input type="text" name="morphological_functions[{{ $morphFunction->id }}][example]"
                            class="form-control" value="{{ $morphFunction->example }}">
                    </div>
                </div>
                @endforeach

                <!-- Phoneme Root Effects -->
                <h3>تأثيرات الفونيم على الجذر</h3>
                @foreach($phoneme->phonemeRootEffect as $rootEffect)
                <div class="card mb-3">
                    <div class="card-body">
                        <input type="hidden" name="phoneme_root_effects[{{ $rootEffect->id }}][id]"
                            value="{{ $rootEffect->id }}">

                        <label>الموضع في الجذر:</label>
                        <input type="text" name="phoneme_root_effects[{{ $rootEffect->id }}][position_in_root]"
                            class="form-control" value="{{ $rootEffect->position_in_root }}">
                    </div>
                </div>
                @endforeach

                <!-- Phoneme Semantic Features -->
                <h3>الميزات الدلالية للفونيم</h3>
                @foreach($phoneme->phonemeSemanticFeature as $semanticFeature)
                <div class="card mb-3">
                    <div class="card-body">
                        <input type="hidden" name="phoneme_semantic_features[{{ $semanticFeature->id }}][id]"
                            value="{{ $semanticFeature->id }}">

                        <label>التأثير الدلالي:</label>
                        <input type="text" name="phoneme_semantic_features[{{ $semanticFeature->id }}][semantic_effect]"
                            class="form-control" value="{{ $semanticFeature->semantic_effect }}">

                        <label>الحركات:</label>
                        <select name="phoneme_semantic_features[{{ $semanticFeature->id }}][harakat_id]"
                            class="form-control">
                            <option value="">اختر الحركة</option>
                            @foreach($harakats as $harakat)
                            <option value="{{ $harakat->id }}" @if($semanticFeature->harakat_id == $harakat->id)
                                selected @endif>{{ $harakat->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                @endforeach

                <!-- Semantic Functions -->
                <h3>الوظائف الدلالية</h3>
                @foreach($phoneme->semanticFunction as $semanticFunction)
                <div class="card mb-3">
                    <div class="card-body">
                        <input type="hidden" name="semantic_functions[{{ $semanticFunction->id }}][id]"
                            value="{{ $semanticFunction->id }}">

                        <label>الحرف:</label>
                        <input type="text" name="semantic_functions[{{ $semanticFunction->id }}][category]"
                            class="form-control" value="{{ $semanticFunction->category }}">

                        <label>الوصف :</label>
                        <input type="text"
                            name="semantic_functions[{{ $semanticFunction->id }}][description]"
                            class="form-control" value="{{ $semanticFunction->description }}">

                        <label>الأمثلة:</label>
                        <input type="text"
                            name="semantic_functions[{{ $semanticFunction->id }}][example]"
                            class="form-control" value="{{ $semanticFunction->example }}">
                    </div>
                </div>
                @endforeach

                <button type="submit" class="btn btn-primary">حفظ التغييرات</button>
            </form>
        </div>
    </div>
</body>

</html>