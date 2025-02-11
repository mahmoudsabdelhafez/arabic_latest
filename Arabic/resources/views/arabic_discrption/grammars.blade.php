<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Linking Tools Management</title>
    <link href="https://fonts.googleapis.com/css2?family=Amiri:wght@400;700&family=Aref+Ruqaa:wght@400;700&display=swap"
        rel="stylesheet">
    <style>
    :root {
        --primary-color: #234B6E;
        --secondary-color: #3A7E71;
        --accent-color: #C17B3F;
        --text-color: #2b2b2b;
        --white: #ffffff;
        --gradient-start: #234B6E;
        --gradient-end: #3A7E71;
    }

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        font-family: 'Amiri', serif;
        background: linear-gradient(135deg, #f5f7fa 0%, #e4e9f2 100%);
        color: var(--text-color);
        min-height: 100vh;
        line-height: 1.6;
    }

    header {
        background: linear-gradient(45deg, var(--gradient-start), var(--gradient-end));
        padding: 3rem;
        position: relative;
        overflow: hidden;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        margin-bottom: 2rem;
    }

    header h1 {
        color: var(--white);
        font-size: 3rem;
        text-align: center;
        font-family: 'Aref Ruqaa', serif;
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2);
    }

    .container {
        max-width: 1600px;
        margin: 0 auto;
        padding: 0 2rem;
    }

    .table-container {
        background: var(--white);
        border-radius: 15px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        margin-bottom: 2rem;
        overflow-x: auto;
    }

    .form-container {
        background: var(--white);
        border-radius: 15px;
        padding: 2rem;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        margin-bottom: 2rem;
        overflow-x: auto;
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }

    th,
    td {
        padding: 1rem;
        text-align: left;
        border-bottom: 1px solid rgba(35, 75, 110, 0.1);
    }

    th {
        background: var(--gradient-end);
        color: var(--white);
        font-family: 'Aref Ruqaa', serif;
        font-weight: normal;
        position: sticky;
        top: 0;
    }

    tr:hover {
        background-color: rgba(35, 75, 110, 0.05);
    }

    .form-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 1.5rem;
    }

    .form-group {
        margin-bottom: 1rem;
    }

    .alert {
        padding: 1rem;
        border-radius: 8px;
        margin-bottom: 1rem;
    }

    .alert-success {
        background-color: rgb(186, 255, 159);
        color: #03543f;
    }

    .alert-error {
        background-color: #fde8e8;
        color: #9b1c1c;
    }

    label {
        display: block;
        margin-bottom: 0.5rem;
        color: var(--primary-color);
        font-weight: bold;
    }

    input,
    textarea,
    select {
        width: 100%;
        padding: 0.75rem;
        border: 1px solid #ddd;
        border-radius: 8px;
        font-family: 'Amiri', serif;
        font-size: 1rem;
        margin-bottom: 30px;
    }

    textarea {
        min-height: 100px;
        resize: vertical;
    }

    .submit-btn {
        background: linear-gradient(45deg, var(--gradient-start), var(--gradient-end));
        color: var(--white);
        padding: 1rem 2rem;
        border: none;
        border-radius: 8px;
        font-family: 'Aref Ruqaa', serif;
        font-size: 1.1rem;
        cursor: pointer;
        transition: transform 0.2s ease;
        margin-top: 1rem;
    }

    .submit-btn:hover {
        transform: translateY(-2px);
    }

    @media (max-width: 768px) {
        .container {
            padding: 1rem;
        }

        header h1 {
            font-size: 2rem;
        }

        .table-container,
        .form-container {
            padding: 1rem;
        }

        th,
        td {
            padding: 0.75rem;
            font-size: 0.9rem;
        }
    }

    .action-buttons {
        display: flex;
        gap: 0.5rem;
    }

    .btn {
        padding: 0.75rem 1.5rem;
        border: none;
        border-radius: 8px;
        font-family: 'Amiri', serif;
        font-size: 1rem;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .btn-primary {
        background: linear-gradient(45deg, var(--gradient-start), var(--gradient-end));
        color: var(--white);
    }

    .edit-btn,
    .delete-btn,
    .save-btn,
    .cancel-btn {
        padding: 0.5rem 1rem;
        border-radius: 4px;
        cursor: pointer;
        font-family: 'Amiri', serif;
        border: none;
        transition: transform 0.2s ease;
    }

    .edit-btn {
        background-color: var(--secondary-color);
        color: white;
    }

    .delete-btn {
        background-color: #dc3545;
        color: white;
    }

    .save-btn {
        background-color: #28a745;
        color: white;
    }

    .cancel-btn {
        background-color: #6c757d;
        color: white;
    }

    .edit-btn:hover,
    .delete-btn:hover,
    .save-btn:hover,
    .cancel-btn:hover {
        transform: translateY(-2px);
    }

    .editing {
        background-color: rgba(35, 75, 110, 0.05);
    }

    .editing input,
    .editing textarea {
        width: 100%;
        padding: 0.5rem;
        border: 1px solid var(--primary-color);
        border-radius: 4px;
        font-family: 'Amiri', serif;
    }

    .editing textarea {
        min-height: 60px;
    }

    .no-data {
        text-align: center;
        padding: 2rem;
        color: var(--text-color);
        font-size: 1.2rem;
        background: var(--white);
        border-radius: 15px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    }
    </style>
</head>

<body>
<header>
    <h1>Grammar Rules</h1>
</header>

<div class="container">
    <h2>Add New Rule</h2>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('grammar-rules.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="rule_name" class="form-label">Rule Name</label>
            <input type="text" name="rule_name" id="rule_name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" id="description" rows="4" class="form-control" required></textarea>
        </div>
        
        <button type="submit" class="btn btn-primary">Save Rule</button>
    </form>
</div>

<div class="container mt-4">
    <h2>Existing Rules</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Name</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($grammarRules as $rule)
                <tr>
                    <td>{{ $rule->rule_name }}</td>
                    <td>{{ $rule->description }}</td>
                    <td>
                        <!-- Edit Form -->
                        <form action="{{ route('grammar-rules.update', $rule->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="rule_name" value="{{ $rule->rule_name }}">
                            <input type="hidden" name="description" value="{{ $rule->description }}">
                            <button type="submit" class="btn btn-warning btn-sm">Edit</button>
                        </form>
                        
                        <!-- Delete Form -->
                        <form action="{{ route('grammar-rules.destroy', $rule->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

</body>

</html>