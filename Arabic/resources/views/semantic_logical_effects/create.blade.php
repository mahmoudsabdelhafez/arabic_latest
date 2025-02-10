<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Semantic Logical Effects</title>
    <link href="https://fonts.googleapis.com/css2?family=Aref+Ruqaa:wght@400;700&family=Amiri:wght@400;700&family=Roboto:wght@300;400;700&display=swap" rel="stylesheet">
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
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        .header {
            background: var(--primary-color);
            color: var(--white);
            padding: 2rem;
            text-align: center;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }

        .header h1 {
            font-family: 'Aref Ruqaa', serif;
            font-size: 2.5rem;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .header-icon {
            margin-right: 1rem;
            font-size: 2.5rem;
        }

        .main-container {
            flex: 1;
            padding: 3rem 1rem;
            max-width: 800px;
            margin: 0 auto;
            width: 100%;
        }

        .form-section {
            background: var(--white);
            border-radius: 15px;
            padding: 2.5rem;
            box-shadow: 0 8px 15px rgba(0,0,0,0.1);
            position: relative;
            overflow: hidden;
        }

        .form-label {
            color: var(--primary-color);
            font-weight: bold;
            margin-bottom: 0.5rem;
            display: block;
        }

        .form-control {
            width: 100%;
            border: 2px solid var(--secondary-color);
            border-radius: 10px;
            padding: 0.75rem 1rem;
            transition: all 0.3s ease;
            margin-bottom: 1rem;
            resize: vertical; /* Allows resizing */
            background: var(--white); /* Ensures textarea is visible */
            color: var(--text-color);
        }

        .form-control:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 0.2rem rgba(26, 95, 122, 0.25);
            outline: none;
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

        .footer {
            background: var(--primary-color);
            color: var(--white);
            text-align: center;
            padding: 1.5rem;
            margin-top: auto;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .footer-content {
            display: flex;
            align-items: center;
        }

        .footer-icon {
            margin-right: 1rem;
            font-size: 1.5rem;
        }

        @media (max-width: 768px) {
            .form-section {
                padding: 1.5rem;
            }

            .header h1 {
                flex-direction: column;
                align-items: center;
            }

            .header-icon {
                margin-right: 0;
                margin-bottom: 0.5rem;
            }
        }
    </style>
</head>
<body>
    <header class="header">
        <h1>
            <i class="fas fa-code header-icon"></i>
            Semantic Logical Effects
        </h1>
    </header>

    <div class="main-container">
        <div class="form-section">
        <form action="{{ route('semantic-logical-effects.store') }}" method="POST">
            @csrf
        <div>
                    <label for="typical_relation" class="form-label">Typical Relation </label>
                    <input type="text" id="typical_relation" name="typical_relation" class="form-control" required>
                </div>

                <div>
                    <label for="nisbah_type" class="form-label">Nisbah Type</label>
                    <input type="text" id="nisbah_type" name="nisbah_type" class="form-control" required>
                </div>

                <div>
                    <label for="semantic_roles" class="form-label">Semantic Roles</label>
                    <textarea id="semantic_roles" name="semantic_roles" class="form-control" required rows="3"></textarea>
                </div>

                <div>
                    <label for="conditions" class="form-label">Conditions</label>
                    <textarea id="conditions" name="conditions" class="form-control" rows="3"></textarea>
                </div>

                <div>
                    <label for="notes" class="form-label">Notes</label>
                    <textarea id="notes" name="notes" class="form-control" rows="3"></textarea>
                </div>

                <div class="text-center">
                    <button type="submit" class="btn-primary">
                        <i class="fas fa-save"></i> Save Semantic Logical Effect
                    </button>
                </div>
            </form>
        </div>
    </div>

    <footer class="footer">
        <div class="footer-content">
            <i class="fas fa-copyright footer-icon"></i>
            <span>2024 Semantic Logical Effects | All Rights Reserved</span>
        </div>
    </footer>
</body>
</html>
