<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Rule</title>
    <style>
        /* Add your styling here, or reuse the previous styles */
    </style>
</head>
<body>
    <h1>Edit Tajweed Rule</h1>

    <!-- Display validation errors if any -->
    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Form to update the Tajweed rule -->
    <form action="{{ route('update-rule', $tajweed->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="category_id">Category</label>
        <select name="category_id" id="category_id">
            <!-- Assuming you have a categories variable passed from the controller -->
            @foreach($categories as $category)
                <option value="{{ $category->id }}" {{ $tajweed->category_id == $category->id ? 'selected' : '' }}>
                    {{ $category->name }}
                </option>
            @endforeach
        </select><br>

        <label for="rule_name">Rule Name</label>
        <input type="text" name="rule_name" id="rule_name" value="{{ old('rule_name', $tajweed->rule_name) }}" required><br>

        <label for="description">Description</label>
        <textarea name="description" id="description">{{ old('description', $tajweed->description) }}</textarea><br>

        <label for="example_ayah">Example Ayah</label>
        <textarea name="example_ayah" id="example_ayah">{{ old('example_ayah', $tajweed->example_ayah) }}</textarea><br>

        <label for="expression">Expression</label>
        <textarea name="expression" id="expression">{{ old('expression', $tajweed->expression) }}</textarea><br>

        <button type="submit">Update Rule</button>
    </form>

</body>
</html>
