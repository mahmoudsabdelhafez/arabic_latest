<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Letters by Place of Articulation</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f7f7f7;
            padding: 20px;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #4CAF50;
            text-align: center;
        }

        ul {
            list-style-type: none;
            padding: 0;
        }

        li {
            margin: 10px 0;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            background: #f9f9f9;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Letters for: {{ $place }}</h1>
        <ul>
            @foreach ($letters as $letter)
                <li>
                    <p><strong>Letter:</strong> {{ $letter->arabicLetter->letter }}</p>
                    <p><strong>IPA:</strong> {{ $letter->ipa }}</p>
                    <p><strong>Type:</strong> {{ $letter->type }}</p>
                    <p><strong>Manner of Articulation:</strong> {{ $letter->manner_of_articulation }}</p>
                    <p><strong>Voicing:</strong> {{ $letter->voicing }}</p>
                    <p><strong>Sound Effects:</strong> {{ $letter->sound_effects }}</p>
                    <p><strong>Notes:</strong> {{ $letter->notes ?? 'N/A' }}</p>
                </li>
            @endforeach
        </ul>

        <p><a href="{{ url('/phonemes') }}">Back to All Phonemes</a></p>
    </div>
</body>
</html>

