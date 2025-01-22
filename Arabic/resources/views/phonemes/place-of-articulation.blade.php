<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Places of Articulation</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f7f7f7;
            color: #333;
            text-align: center;
        }

        h1 {
            background-color: #4CAF50;
            color: white;
            padding: 20px;
            margin: 0;
        }

        .container {
            margin: 20px auto;
            padding: 20px;
            max-width: 600px;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        ul {
            list-style-type: none;
            padding: 0;
        }

        li {
            padding: 10px;
            margin: 5px 0;
            border: 1px solid #ddd;
            border-radius: 5px;
            transition: background 0.3s ease;
            cursor: pointer;
        }

        li:hover {
            background-color: #f0f0f0;
        }

        a {
            text-decoration: none;
            color: #333;
            display: block;
        }

        a:hover {
            color: #4CAF50;
        }
    </style>
</head>
<body>
    <h1>Places of Articulation</h1>

    <div class="container">
        <ul>
            @foreach ($places as $place)
                <li>
                    <a href="{{ route('phonemes.showByPlace', $place->place_of_articulation) }}">
                        {{ $place->place_of_articulation }}
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
</body>
</html>
