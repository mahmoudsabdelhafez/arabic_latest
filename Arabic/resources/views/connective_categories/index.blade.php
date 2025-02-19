<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="container">
    <h1>Connective Categories</h1>
    <a href="{{ route('connective_categories.create') }}" class="btn btn-primary">Add New</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Arabic Name</th>
                <th>Definition</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categories as $category)
                <tr>
                    <td>{{ $category->name }}</td>
                    <td>{{ $category->arabic_name }}</td>
                    <td>{{ $category->definition }}</td>
                    <td>
                        <a href="{{ route('connective_categories.show', $category) }}" class="btn btn-info">View</a>
                        <a href="{{ route('connective_categories.edit', $category) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('connective_categories.destroy', $category) }}" method="POST" style="display:inline;">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
</body>
</html>