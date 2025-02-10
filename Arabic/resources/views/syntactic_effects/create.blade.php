<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Syntactic Effect</title>
    <link href="https://fonts.googleapis.com/css2?family=Aref+Ruqaa:wght@400;700&family=Roboto:wght@300;400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        :root {
            --primary-color: #1a5f7a;
            --secondary-color: #c7b7a3;
            --accent-color: #e6d5b8;
            --text-color: #2b2b2b;
            --white: #ffffff;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Roboto', sans-serif;
            background: linear-gradient(135deg, #f5f7fa 0%, #e4e9f2 100%);
            color: var(--text-color);
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        header {
            background: var(--primary-color);
            color: var(--white);
            text-align: center;
            padding: 1rem;
            font-size: 1.5rem;
            font-weight: bold;
        }

        .container {
            flex: 1;
            max-width: 800px;
            width: 100%;
            padding: 3rem 1.5rem;
            margin: auto;
        }

        .form-section {
            background: var(--white);
            border-radius: 15px;
            padding: 2.5rem;
            box-shadow: 0 8px 15px rgba(0,0,0,0.1);
        }

        .form-label {
            color: var(--primary-color);
            font-weight: bold;
        }

        .form-control {
            border: 2px solid var(--secondary-color);
            border-radius: 10px;
            padding: 0.75rem;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 0.2rem rgba(26, 95, 122, 0.25);
            outline: none;
        }

        textarea {
            resize: vertical; /* Allows vertical resizing */
            min-height: 100px;
        }

        .btn-primary {
            background-color: var(--primary-color);
            color: var(--white);
            border: none;
            border-radius: 12px;
            padding: 0.75rem 1.5rem;
            font-size: 1.1rem;
            font-weight: bold;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto;
            cursor: pointer;
        }

        .btn-primary i {
            margin-right: 0.5rem;
        }

        .btn-primary:hover {
            background-color: #144f66;
            transform: translateY(-2px);
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }

        footer {
            background: var(--primary-color);
            color: var(--white);
            text-align: center;
            padding: 1rem;
            margin-top: 2rem;
        }

        @media (max-width: 768px) {
            .form-section {
                padding: 1.5rem;
            }
        }
    </style>
</head>
<body>

<header>
    <i class="fas fa-code"></i> Syntactic Effects Management
</header>

<div class="container">
    <div class="form-section">
        <h2 class="text-center mb-4">
            <i class="fas fa-plus-circle"></i> Add Syntactic Effect
        </h2>

        @if(session('success'))
            <div class="alert alert-success text-center">
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

            <div class="text-center">
                <button type="submit" class="btn-primary">
                    <i class="fas fa-save"></i> Save
                </button>
            </div>
        </form>
    </div>
</div>

<footer>
    &copy; 2025 Syntactic Effects Management | All Rights Reserved
</footer>

</body>
</html>
