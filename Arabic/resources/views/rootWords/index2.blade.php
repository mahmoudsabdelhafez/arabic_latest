<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Root Words with Prefixes and Suffixes</title>

    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom Styles -->
    <style>
        body {
            background-color: #f4f7fc;
            font-family: 'Arial', sans-serif;
        }

        .container {
            margin-top: 40px;
        }

        h1 {
            color: #333;
            font-size: 2rem;
        }

        .card {
            border: 2px solid #f8f9fa;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .card-body {
            background-color: #ffffff;
            padding: 20px;
        }

        .card-title {
            font-size: 1.5rem;
            font-weight: bold;
            color: #007bff;
        }

        h5 {
            font-size: 1.125rem;
            margin-top: 20px;
            color: #333;
        }

        .list-group-item {
            font-size: 1rem;
            padding: 10px;
            background-color: #f8f9fa;
            border: 1px solid #ddd;
        }

        .list-group-item:hover {
            background-color: #e9ecef;
        }

        .list-group {
            margin-top: 10px;
        }
    </style>
</head>
<body>

    <div class="container">
        <h1 class="text-center my-4">Root Words with Prefixes and Suffixes</h1>

        <div class="row">
            @foreach ($rootWordsWithDetails as $item)
                <div class="col-md-4 mb-4">
                    <div class="card p-3 border-secondary">
                        <h3 class="card-title text-center">{{ $item['root'] }}</h3>

                        <div class="card-body">
                            <!-- Prefixes -->
                            <h5>Prefixes:</h5>
                            <ul class="list-group">
                                @forelse ($item['prefixes'] as $prefix)
                                    <li class="list-group-item">{{ $prefix }}</li>
                                @empty
                                    <li class="list-group-item">No prefixes available</li>
                                @endforelse
                            </ul>

                            <!-- Suffixes -->
                            <h5 class="mt-3">Suffixes:</h5>
                            <ul class="list-group">
                                @forelse ($item['suffixes'] as $suffix)
                                    <li class="list-group-item">{{ $suffix }}</li>
                                @empty
                                    <li class="list-group-item">No suffixes available</li>
                                @endforelse
                            </ul>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Bootstrap JS & Dependencies (optional, if needed) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
