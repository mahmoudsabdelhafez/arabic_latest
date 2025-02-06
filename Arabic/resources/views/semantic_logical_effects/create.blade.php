<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Semantic Logical Effect</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-5">
    <h2>Add Semantic Logical Effect</h2>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('semantic-logical-effects.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="typical_relation_1" class="form-label">Typical Relation 1</label>
            <input type="text" name="typical_relation_1" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="typical_relation_2" class="form-label">Typical Relation 2</label>
            <input type="text" name="typical_relation_2" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="semantic_roles" class="form-label">Semantic Roles</label>
            <textarea name="semantic_roles" class="form-control" required></textarea>
        </div>

        <div class="mb-3">
            <label for="conditions" class="form-label">Conditions</label>
            <textarea name="conditions" class="form-control"></textarea>
        </div>

        <div class="mb-3">
            <label for="notes" class="form-label">Notes</label>
            <textarea name="notes" class="form-control"></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Save</button>
    </form>
</div>

</body>
</html>
