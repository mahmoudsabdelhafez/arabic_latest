<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Phoneme Category Management</title>
    <style>
        :root {
            --primary-color: #4CAF50;
            --primary-hover: #45a049;
            --error-color: #dc3545;
            --success-color: #28a745;
            --bg-color: #f8f9fa;
            --card-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        body {
            font-family: 'Segoe UI', system-ui, -apple-system, sans-serif;
            line-height: 1.6;
            margin: 0;
            padding: 20px;
            background-color: var(--bg-color);
            color: #333;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }

        .header {
            text-align: center;
            margin-bottom: 40px;
        }

        .header h1 {
            color: #2c3e50;
            font-size: 2.5rem;
            margin-bottom: 10px;
        }

        .card {
            background: white;
            border-radius: 10px;
            padding: 30px;
            box-shadow: var(--card-shadow);
            margin-bottom: 40px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
            color: #2c3e50;
        }

        .form-input {
            width: 100%;
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
            transition: border-color 0.3s ease;
        }

        .form-input:focus {
            outline: none;
            border-color: var(--primary-color);
            box-shadow: 0 0 0 2px rgba(76, 175, 80, 0.2);
        }

        .submit-button {
            background: var(--primary-color);
            color: white;
            border: none;
            padding: 12px 30px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: background 0.3s ease;
        }

        .submit-button:hover {
            background: var(--primary-hover);
        }

        .categories-list {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .category-item {
            background: white;
            padding: 15px;
            margin-bottom: 10px;
            border-radius: 5px;
            box-shadow: var(--card-shadow);
            display: flex;
            justify-content: space-between;
            align-items: center;
            transition: transform 0.2s ease;
        }

        .category-item:hover {
            transform: translateX(5px);
        }

        .category-name {
            font-weight: 500;
            color: #2c3e50;
        }

        .alert {
            padding: 15px;
            border-radius: 5px;
            margin-bottom: 20px;
        }

        .alert-success {
            background-color: #d4edda;
            border-color: #c3e6cb;
            color: var(--success-color);
        }

        .alert-error {
            background-color: #f8d7da;
            border-color: #f5c6cb;
            color: var(--error-color);
        }

        .loading {
            position: relative;
        }

        .loading::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 3px;
            background: linear-gradient(90deg, var(--primary-color) 0%, #83c585 50%, var(--primary-color) 100%);
            animation: loading 1.5s infinite;
        }

        @keyframes loading {
            0% { transform: translateX(-100%); }
            100% { transform: translateX(100%); }
        }

        @media (max-width: 768px) {
            .container {
                padding: 10px;
            }
            
            .header h1 {
                font-size: 2rem;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Phoneme Category Management</h1>
            <p>Create and manage phoneme categories</p>
        </div>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-error">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="card">
            <form action="{{ route('phonemecategories.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name" class="form-label">Category Name</label>
                    <input 
                        type="text" 
                        id="name" 
                        name="name" 
                        class="form-input" 
                        required 
                        placeholder="Enter category name"
                        value="{{ old('name') }}"
                    >
                </div>
                <button type="submit" class="submit-button">Create Category</button>
            </form>
        </div>

        <div class="card">
            <h2>Existing Categories</h2>
            @if(count($categories) > 0)
                <ul class="categories-list">
                    @foreach ($categories as $category)
                        <li class="category-item">
                            <span class="category-name">{{ $category->name }}</span>
                        </li>
                    @endforeach
                </ul>
            @else
                <p>No categories found. Create your first category above.</p>
            @endif
        </div>
    </div>

    <script>
        // Add loading state to form during submission
        document.querySelector('form').addEventListener('submit', function() {
            this.classList.add('loading');
            this.querySelector('.submit-button').disabled = true;
        });
    </script>
</body>
</html>