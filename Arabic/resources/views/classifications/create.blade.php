<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="container">
        <h1>Add Classification</h1>
        <form action="{{ route('classifications.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label class="form-label">Name</label>
                <input type="text" name="name" class="form-control" required>
            </div>
            
            <div class="mb-3">
                <label class="form-label">Subtype</label>
                <input type="text" name="subtype" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Linking Tool ID</label>
                <input type="number" name="linking_tool_id" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Subtool Name</label>
                <textarea name="subtool_name" class="form-control" required></textarea>
            </div>

            <div class="mb-3">
                <label class="form-label">Example Sentence</label>
                <textarea name="example_sentence" class="form-control" required></textarea>
            </div>

            <div class="mb-3">
                <label class="form-label">Description</label>
                <textarea name="description" class="form-control" required></textarea>
            </div>

            <div class="mb-3">
                <label class="form-label">Typical Nisbah</label>
                <input type="text" name="typical_nisbah" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Logical Effect</label>
                <textarea name="logical_effect" class="form-control" required></textarea>
            </div>

            <div class="mb-3">
                <label class="form-label">Semantic Effect</label>
                <textarea name="semantic_effect" class="form-control" required></textarea>
            </div>

            <button type="submit" class="btn btn-success">Save</button>
        </form>
    </div>
</body>
</html>