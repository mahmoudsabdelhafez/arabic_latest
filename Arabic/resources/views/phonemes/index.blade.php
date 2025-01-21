<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Phonemes</title>
    <style>
        /* Same style as the Arabic Letters table or modify as needed */
        table {
            width: 80%;
            margin: 30px auto;
            border-collapse: collapse;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            background-color: white;
        }

        th, td {
            padding: 15px;
            text-align: center;
        }

        th {
            background-color: #4CAF50;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        td {
            font-size: 16px;
            color: #555;
        }

        table, th, td {
            border: 1px solid #ddd;
        }
    </style>
</head>
<body>

    <h1>Phonemes</h1>

    <table>
        <tr>
            <th>Letter</th>
            <th>IPA</th>
            <th>Type</th>
            <th>Place of Articulation</th>
            <th>Manner of Articulation</th>
            <th>Voicing</th>
            <th>Sound Effects</th>
            <th>Notes</th>
        </tr>
        @foreach ($phonemes as $phoneme)
        <tr>
            <td>{{ $phoneme->arabicLetter->letter }}</td>
            <td>{{ $phoneme->ipa }}</td>
            <td>{{ $phoneme->type }}</td>
            <td>{{ $phoneme->place_of_articulation }}</td>
            <td>{{ $phoneme->manner_of_articulation }}</td>
            <td>{{ $phoneme->voicing }}</td>
            <td>{{ $phoneme->sound_effects }}</td>
            <td>{{ $phoneme->notes }}</td>
        </tr>
        @endforeach
    </table>

</body>
</html>
