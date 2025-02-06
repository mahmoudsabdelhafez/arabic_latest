<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Syntactic Effect</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-5">
    <h2>Add Syntactic Effect</h2>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('syntactic-effects.store') }}" method="POST">
        @csrf
        
        <div class="mb-3">
            <label for="applied_on" class="form-label">Applied On</label>
            <input type="text" name="applied_on" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="result_case" class="form-label">Result Case</label>
            <input type="text" name="result_case" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="context_condition" class="form-label">Context Condition</label>
            <textarea name="context_condition" class="form-control"></textarea>
        </div>

        <div class="mb-3">
            <label for="priority_order" class="form-label">Priority Order</label>
            <input type="number" name="priority_order" class="form-control" value="1" min="1" required>
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
