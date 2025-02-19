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
        font-family: 'Amiri', serif;
        background: linear-gradient(135deg, #f5f7fa 0%, #e4e9f2 100%);
        color: var(--text-color);
        min-height: 100vh;
        display: flex;
        flex-direction: column;
        direction: rtl; /* Set the entire layout to right-to-left */
        text-align: right; /* Ensure text aligns to the right */
    }

    header {
        background: var(--primary-color);
        padding: 2rem;
        position: relative;
        overflow: hidden;
    }

    header::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(45deg, rgba(255,255,255,0.1) 25%, transparent 25%),
                    linear-gradient(-45deg, rgba(255,255,255,0.1) 25%, transparent 25%);
        background-size: 60px 60px;
        opacity: 0.1;
    }

    h1 {
        font-family: 'Aref Ruqaa', serif;
        color: var(--white);
        text-align: center;
        font-size: 2.5rem;
        position: relative;
        text-shadow: 2px 2px 4px rgba(0,0,0,0.2);
    }

    .container {
        flex: 1;
        padding: 3rem 1rem;
        width: 100%;
        max-width: 1200px;
        margin: 0 auto;
    }

    table {
        width: 100%;
        margin: 30px auto;
        border-collapse: collapse;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        background-color: var(--white);
        direction: rtl; /* Ensure table flows from right to left */
    }

    th, td {
        padding: 15px;
        text-align: right; /* Align text to the right */
    }

    th {
        background-color: var(--primary-color);
        color: var(--white);
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

    .footer {
        background: var(--primary-color);
        color: var(--white);
        text-align: center;
        padding: 1.5rem;
        margin-top: auto;
    }

    @media (max-width: 1024px) {
        table {
            width: 95%;
        }
    }

    @media (max-width: 768px) {
        h1 {
            font-size: 2rem;
        }

        table {
            width: 100%;
        }
    }
</style>

<header>
    <h1>{{ ucwords(str_replace('-', ' ', $tableName)) }}</h1> <!-- Dynamically render the table name -->
</header>

<div class="container">
    @if($data->isEmpty())
        <p>No records found for this table.</p>
    @else
        <table dir="rtl"> <!-- Set table to right-to-left -->
            <thead>
                <tr>
                    @foreach($data->first()->getAttributes() as $key => $value)
                        @if(!in_array($key, ['created_at', 'updated_at'])) <!-- Exclude timestamps -->
                            <th>{{ ucwords(str_replace('_', ' ', $key)) }}</th>
                        @endif
                    @endforeach
                </tr>
            </thead>
            <tbody>
                @foreach($data as $item)
                    <tr>
                        @foreach($item->getAttributes() as $key => $value)
                            @if(!in_array($key, ['created_at', 'updated_at'])) <!-- Exclude timestamps -->
                                <td>{{ $value }}</td>
                            @endif
                        @endforeach
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>

<footer class="footer">
    <p>&copy; 2025 Your Company. All Rights Reserved.</p>
</footer>
