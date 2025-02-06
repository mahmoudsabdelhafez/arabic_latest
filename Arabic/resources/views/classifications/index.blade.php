<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="container">
        <h1>Classifications</h1>
        <a href="{{ route('classifications.create') }}" class="btn btn-primary">Add New</a>
        
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Subtype</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($classifications as $classification)
                    <tr>
                        <td>{{ $classification->name }}</td>
                        <td>{{ $classification->subtype }}</td>
                        <td>
                            <a href="{{ route('classifications.show', $classification->id) }}" class="btn btn-info">View</a>
                            <a href="{{ route('classifications.edit', $classification->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('classifications.destroy', $classification->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>