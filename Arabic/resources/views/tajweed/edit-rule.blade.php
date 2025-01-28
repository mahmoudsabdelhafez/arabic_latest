<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Rule</title>
    <style>
        /* Global Styles */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f7fc;
            margin: 0;
            padding: 0;
        }

        h1 {
            background-color: #2F4F4F;
            color: white;
            padding: 20px;
            margin: 0;
            font-size: 36px;
            text-align: center;
        }

        .back-button-container {
            text-align: center;
            margin-top: 10px;
        }

        .back-button {
            background-color: white;
            color: #2F4F4F;
            border: none;
            padding: 6px 10px;
            font-size: 14px;
            font-weight: bold;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .back-button:hover {
            background-color: #4CAF50;
            color: white;
        }

        .container {
            width: 50%;
            margin: 30px auto;
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            font-size: 16px;
            font-weight: bold;
            display: block;
            margin-bottom: 5px;
        }

        input, textarea, select {
            width: 100%;
            padding: 10px;
            margin: 5px 0 15px 0;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
            transition: border-color 0.3s ease;
        }

        input:focus, textarea:focus, select:focus {
            border-color: #4CAF50;
            outline: none;
        }

        textarea {
            height: 120px;
            resize: vertical;
        }

        button {
            background-color: #2F4F4F;
            color: white;
            padding: 12px 20px;
            border: none;
            font-size: 18px;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #4CAF50;
        }

        .alert {
            background-color: #f44336;
            color: white;
            padding: 10px;
            margin-bottom: 20px;
            border-radius: 5px;
            font-size: 16px;
        }

        .alert-success {
            background-color: #4CAF50;
        }

        .alert ul {
            list-style-type: none;
            padding: 0;
        }

        .alert ul li {
            margin: 5px 0;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .container {
                width: 80%;
            }

            h1 {
                font-size: 28px;
            }

            .back-button {
                font-size: 12px;
                padding: 5px 8px;
            }
        }
    </style>
</head>
<body>
    <h1>Edit Tajweed Rule</h1>

    <div class="back-button-container">
        <button class="back-button" onclick="window.history.back();">Back</button>
    </div>

    <div class="container">
        <!-- Display validation errors if any -->
        @if ($errors->any())
            <div class="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Success message if any -->
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <!-- Form to update the Tajweed rule -->
        <form action="{{ route('update-rule', $tajweed->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="category_id">Category</label>
                <select name="category_id" id="category_id">
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ $tajweed->category_id == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="rule_name">Rule Name</label>
                <input type="text" name="rule_name" id="rule_name" value="{{ old('rule_name', $tajweed->rule_name) }}" required>
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" id="description">{{ old('description', $tajweed->description) }}</textarea>
            </div>

            <div class="form-group">
                <label for="example_ayah">Example Ayah</label>
                <textarea name="example_ayah" id="example_ayah">{{ old('example_ayah', $tajweed->example_ayah) }}</textarea>
            </div>

            <div class="form-group">
                <label for="expression">Expression</label>
                <textarea name="expression" id="expression">{{ old('expression', $tajweed->expression) }}</textarea>
            </div>

            <button type="submit">Update Rule</button>
        </form>
    </div>
</body>
</html>
