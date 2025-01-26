<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Tajweed Rule</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f7f7f7;
            font-family: 'Roboto', Arial, sans-serif;
        }

        .container {
            margin-top: 50px;
            background-color: #ffffff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        h1 {
            font-size: 30px;
            color: #2F4F4F;
            text-align: center;
            margin-bottom: 20px;
        }

        .form-label {
            font-weight: bold;
            color: #333;
        }

        .btn-submit {
            background-color: #2F4F4F;
            color: white;
            font-weight: bold;
            width: 100%;
        }

        .btn-submit:hover {
            background-color: #4a148c;
        }

        footer {
            margin-top: 30px;
            text-align: center;
            color: #6a1b9a;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Add New Tajweed Rule</h1>

    <!-- Display Success Message -->
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('store-tajweed') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="category_id" class="form-label">Teajweed Category</label>
            <select name="category_id" id="category_id" class="form-control" required>
                <option value="">Select Category</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="rule_name" class="form-label">Tajweed Rule Name</label>
            <input type="text" name="rule_name" id="rule_name" class="form-control" required placeholder="Enter the rule name">
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" id="description" class="form-control" rows="5" required placeholder="Describe the Tajweed rule"></textarea>
        </div>

        <div class="mb-3">
            <label for="example_ayah" class="form-label">Example Ayah</label>
            <input type="text" name="example_ayah" id="example_ayah" class="form-control" required placeholder="Provide an example of the Ayah from the Quran">
        </div>

        <div class="mb-3">
            <label for="expression" class="form-label">Expression</label>
            <input type="text" name="expression" id="expression" class="form-control" required placeholder="Enter the expression of the rule">
        </div>

        <div class="mb-3">
            <button type="submit" class="btn-submit btn">Add Rule</button>
        </div>
    </form>
</div>

<footer>
    <p>&copy; 2025 Tajweed Checker. All Rights Reserved.</p>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
