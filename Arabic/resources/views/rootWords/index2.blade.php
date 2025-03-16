<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Root Words with Prefixes and Suffixes</title>
    <link href="https://fonts.googleapis.com/css2?family=Amiri:wght@400;700&family=Aref+Ruqaa:wght@400;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-color: #234B6E;
            --secondary-color: #3A7E71;
            --accent-color: #C17B3F;
            --background-color: #f5f7fa;
            --text-color: #2b2b2b;
            --white: #ffffff;
            --border-radius: 10px;
            --box-shadow: 0 5px 20px rgba(0,0,0,0.1);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Amiri', serif;
            background: linear-gradient(135deg, var(--background-color) 0%, #e4e9f2 100%);
            color: var(--text-color);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        header {
            background: linear-gradient(45deg, var(--primary-color), var(--secondary-color));
            padding: 1.5rem;
            text-align: center;
            width: 100%;
            color: var(--white);
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }

        header h1 {
            font-family: 'Aref Ruqaa', serif;
            font-size: 2.5rem;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.2);
            letter-spacing: 1px;
        }

        .container {
            max-width: 1200px;
            width: 90%;
            margin: 40px auto;
            padding: 0;
        }

        .row {
            display: flex;
            flex-wrap: wrap;
            margin: -15px;
        }

        .col {
            flex: 0 0 33.333333%;
            max-width: 33.333333%;
            padding: 15px;
            box-sizing: border-box;
        }

        .card {
            background-color: var(--white);
            border-radius: var(--border-radius);
            overflow: hidden;
            box-shadow: var(--box-shadow);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            height: 100%;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 30px rgba(0,0,0,0.15);
        }

        .card-header {
            background: linear-gradient(45deg, var(--primary-color), var(--secondary-color));
            color: var(--white);
            padding: 15px;
            font-size: 1.5rem;
            font-weight: bold;
            text-align: center;
            font-family: 'Aref Ruqaa', serif;
        }

        .card-body {
            padding: 20px;
        }

        .section-title {
            font-family: 'Aref Ruqaa', serif;
            font-size: 1.2rem;
            color: var(--primary-color);
            margin-bottom: 10px;
            margin-top: 15px;
            position: relative;
            padding-right: 10px;
        }

        .section-title:first-child {
            margin-top: 0;
        }

        .section-title:after {
            content: '';
            position: absolute;
            bottom: -5px;
            left: 0;
            width: 50px;
            height: 2px;
            background-color: var(--accent-color);
        }

        .list-group {
            list-style: none;
            margin: 0;
            padding: 0;
        }

        .list-group-item {
            padding: 10px 15px;
            background-color: rgba(245, 247, 250, 0.7);
            border-left: 3px solid var(--secondary-color);
            margin-bottom: 5px;
            border-radius: 0 var(--border-radius) var(--border-radius) 0;
            transition: all 0.2s ease;
        }

        .list-group-item:hover {
            background-color: rgba(58, 126, 113, 0.15);
            transform: translateX(5px);
        }

        .empty-list {
            font-style: italic;
            color: #6c757d;
        }

        .footer {
            background: linear-gradient(45deg, var(--primary-color), var(--secondary-color));
            color: var(--white);
            text-align: center;
            padding: 1.5rem;
            width: 100%;
            margin-top: auto;
            font-family: 'Aref Ruqaa', serif;
        }

        @media (max-width: 992px) {
            .col {
                flex: 0 0 50%;
                max-width: 50%;
            }
        }

        @media (max-width: 768px) {
            .container {
                width: 95%;
            }

            header h1 {
                font-size: 2rem;
            }

            .card-header {
                font-size: 1.3rem;
                padding: 12px;
            }
        }

        @media (max-width: 576px) {
            .col {
                flex: 0 0 100%;
                max-width: 100%;
            }

            header h1 {
                font-size: 1.8rem;
            }

            .card-header {
                font-size: 1.2rem;
            }
        }
    </style>
</head>
<body>
    <header>
        <h1>Root Words with Prefixes and Suffixes</h1>
    </header>

    <div class="container">
        <div class="row">
            @foreach ($rootWordsWithDetails as $item)
                <div class="col">
                    <div class="card">
                        <div class="card-header">
                            {{ $item['root'] }}
                        </div>
                        <div class="card-body">
                            <!-- Prefixes -->
                            <h5 class="section-title">Prefixes:</h5>
                            <ul class="list-group">
                                @forelse ($item['prefixes'] as $prefix)
                                    <li class="list-group-item">{{ $prefix }}</li>
                                @empty
                                    <li class="list-group-item empty-list">No prefixes available</li>
                                @endforelse
                            </ul>
                            
                            <!-- Suffixes -->
                            <h5 class="section-title">Suffixes:</h5>
                            <ul class="list-group">
                                @forelse ($item['suffixes'] as $suffix)
                                    <li class="list-group-item">{{ $suffix }}</li>
                                @empty
                                    <li class="list-group-item empty-list">No suffixes available</li>
                                @endforelse
                            </ul>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <div class="footer">
        <p>&copy; 2025 Root Words. All rights reserved.</p>
    </div>
</body>
</html>