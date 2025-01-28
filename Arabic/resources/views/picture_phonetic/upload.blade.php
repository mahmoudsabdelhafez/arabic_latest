<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Phoneme Image Upload</title>
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
            max-width: 1200px;
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

        .upload-card {
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

        .file-input-wrapper {
            position: relative;
            margin-bottom: 20px;
        }

        .file-input {
            display: none;
        }

        .file-input-button {
            display: inline-block;
            padding: 12px 24px;
            background: var(--primary-color);
            color: white;
            border-radius: 5px;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        .file-input-button:hover {
            background: var(--primary-hover);
        }

        select {
            width: 100%;
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
            margin-bottom: 20px;
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

        .image-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            gap: 20px;
            margin-top: 40px;
        }

        .image-card {
            background: white;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: var(--card-shadow);
            transition: transform 0.3s ease;
        }

        .image-card:hover {
            transform: translateY(-5px);
        }

        .image-card img {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }

        .image-info {
            padding: 15px;
            text-align: center;
        }

        .image-info p {
            margin: 0;
            color: #666;
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
            
            .image-grid {
                grid-template-columns: repeat(auto-fill, minmax(150px, 1fr));
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Phoneme Image Upload</h1>
            <p>Upload and manage your phoneme images</p>
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

        <div class="upload-card">
            <form method="POST" action="{{ route('upload.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label class="form-label">Select Image</label>
                    <div class="file-input-wrapper">
                        <input type="file" name="image" id="image" class="file-input" accept="image/*" required>
                        <label for="image" class="file-input-button">Choose File</label>
                    </div>
                </div>

                <div class="form-group">
                    <label class="form-label">Phoneme Category</label>
                    <select name="phoneme_category_id" required>
                        <option value="" disabled selected>Select a Phoneme Category</option>
                        @foreach ($phonemeCategories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="submit-button">Upload Image</button>
            </form>
        </div>

        <h2>Uploaded Images</h2>
        <div class="image-grid">
            @foreach ($images as $image)
                <div class="image-card">
                    <img src="{{ asset($image->path) }}" alt="{{ $image->name }}">
                    <div class="image-info">
                        <p>{{ $image->name }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <script>
        // Show filename when file is selected
        document.getElementById('image').addEventListener('change', function(e) {
            const fileName = e.target.files[0]?.name || 'No file chosen';
            const label = document.querySelector('.file-input-button');
            label.textContent = fileName;
        });

        // Add loading state to form during submission
        document.querySelector('form').addEventListener('submit', function() {
            this.classList.add('loading');
        });
    </script>
</body>
</html>