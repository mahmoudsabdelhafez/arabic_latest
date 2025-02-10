<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conditionals List</title>
    <link href="https://fonts.googleapis.com/css2?family=Amiri:wght@400;700&family=Aref+Ruqaa:wght@400;700&display=swap"
        rel="stylesheet">
    <style>
    :root {
        --primary-color: #234B6E;
        --secondary-color: #3A7E71;
        --accent-color: #C17B3F;
        --text-color: #2b2b2b;
        --white: #ffffff;
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
        background: linear-gradient(45deg, var(--primary-color), var(--secondary-color));
        padding: 2rem 1rem;
        text-align: center;
        position: relative;
        overflow: hidden;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
    }

    header h1 {
        color: var(--white);
        font-size: 2.5rem;
        font-family: 'Aref Ruqaa', serif;
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2);
    }

    .container {
        max-width: 1200px;
        margin: 2rem auto;
        padding: 0 1rem;
    }

    .table-container {
        background: var(--white);
        border-radius: 15px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        overflow: hidden;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        background: var(--white);
    }

    th {
        background: linear-gradient(45deg, var(--primary-color), var(--secondary-color));
        color: var(--white);
        padding: 1rem;
        text-align: left;
        font-family: 'Aref Ruqaa', serif;
    }

    td {
        padding: 1rem;
        border-bottom: 1px solid rgba(0, 0, 0, 0.1);
    }

    tr:hover {
        background-color: rgba(35, 75, 110, 0.05);
    }

    .example-cell {
        max-width: 300px;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
    }

    .view-button {
        background: linear-gradient(45deg, var(--primary-color), var(--secondary-color));
        color: var(--white);
        border: none;
        padding: 0.5rem 1rem;
        border-radius: 5px;
        cursor: pointer;
        font-family: 'Amiri', serif;
        transition: opacity 0.2s;
    }

    .view-button:hover {
        opacity: 0.9;
    }

    form {
        margin: 0;
        padding: 0;
    }

    @media (max-width: 768px) {
        .container {
            padding: 0.5rem;
            margin: 1rem auto;
        }

        header h1 {
            font-size: 2rem;
        }

        th,
        td {
            padding: 0.75rem;
        }

        .hide-mobile {
            display: none;
        }
    }

    .back-button {
        display: inline-block;
        padding: 0.75rem 1.5rem;
        background: linear-gradient(45deg, var(--primary-color), var(--secondary-color));
        color: var(--white);
        text-decoration: none;
        border-radius: 8px;
        margin-bottom: 2rem;
        transition: transform 0.3s ease;
    }

    .back-button:hover {
        transform: translateX(-5px);
    }
    </style>
</head>

<body>
    <header>
        <h1>Conditionals List</h1>
    </header>

    <div class="container">
    <a href="/" class="back-button">← Back to List</a>

        <div class="table-container">

            <table>
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>English Name</th>
                        <th class="hide-mobile">Example</th>
                        <th class="hide-mobile">Type</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($conditionals as $conditional)
                    <tr>
                        <td>{{ $conditional->name }}</td>
                        <td>{{ $conditional->english_name }}</td>
                        <td class="hide-mobile example-cell">{{ $conditional->example }}</td>
                        <td class="hide-mobile">{{ $tableName->arabic_name }}</td>
                        <td>
                            <form action="{{ route('conditionals.show') }}" method="GET">
                                <!-- @csrf -->
                                <input type="hidden" name="tool_id" value="{{ $conditional->id }}">
                                <input type="hidden" name="linking_tool_id" value="{{ $conditional->linking_tool_id }}">
                                <button type="submit" class="view-button">View</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>