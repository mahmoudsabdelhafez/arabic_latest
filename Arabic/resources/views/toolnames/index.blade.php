<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tool Names Management</title>
    <link href="https://fonts.googleapis.com/css2?family=Amiri:wght@400;700&family=Aref+Ruqaa:wght@400;700&display=swap"
        rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
    :root {
        --primary-color: #234B6E;
        --secondary-color: #3A7E71;
        --accent-color: #C17B3F;
        --text-color: #2b2b2b;
        --white: #ffffff;
        --gradient-start: #234B6E;
        --gradient-end: #3A7E71;
        --light-bg: #f5f7fa;
        --border-radius: 12px;
        --box-shadow: 0 8px 30px rgba(0, 0, 0, 0.12);
    }

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        font-family: 'Amiri', serif;
        background: linear-gradient(135deg, #f5f7fa 0%, #e4e9f2 100%);
        min-height: 100vh;
        line-height: 1.8;
        color: var(--text-color);
    }

    .page-wrapper {
        display: flex;
        min-height: 100vh;
        flex-direction: column;
    }

    header {
        background: linear-gradient(45deg, var(--gradient-start), var(--gradient-end));
        padding: 3.5rem;
        position: relative;
        overflow: hidden;
        box-shadow: var(--box-shadow);
        margin-bottom: 2.5rem;
    }

    header::before {
        content: '';
        position: absolute;
        top: 0;
        right: 0;
        left: 0;
        bottom: 0;
        background:
            radial-gradient(circle at 50% 50%, rgba(255, 255, 255, 0.15) 0%, transparent 60%),
            linear-gradient(45deg, rgba(255, 255, 255, 0.12) 25%, transparent 25%);
        background-size: 100% 100%, 60px 60px;
        opacity: 0.3;
        animation: backgroundMove 30s linear infinite;
    }

    @keyframes backgroundMove {
        0% {
            background-position: center, 0 0;
        }

        100% {
            background-position: center, 60px 60px;
        }
    }

    header h1 {
        color: var(--white);
        font-size: 3rem;
        text-align: center;
        font-family: 'Aref Ruqaa', serif;
        position: relative;
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2);
        margin: 0;
        letter-spacing: 1px;
    }

    .content-wrapper {
        width: 90%;
        max-width: 1200px;
        margin: 0 auto;
        padding: 2rem;
    }

    .content-card {
        background: var(--white);
        border-radius: var(--border-radius);
        padding: 2.5rem;
        box-shadow: var(--box-shadow);
        transition: transform 0.3s ease;
    }

    .content-card:hover {
        transform: translateY(-5px);
    }

    .action-bar {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 2.5rem;
        gap: 1rem;
    }

    .search-container {
        flex: 1;
        max-width: 400px;
        position: relative;
    }

    .search-input {
        width: 100%;
        padding: 0.75rem 1rem 0.75rem 3rem;
        border-radius: 8px;
        border: 1px solid rgba(0, 0, 0, 0.1);
        font-family: 'Amiri', serif;
        font-size: 1rem;
        transition: all 0.3s ease;
    }

    .search-input:focus {
        outline: none;
        border-color: var(--secondary-color);
        box-shadow: 0 0 0 3px rgba(58, 126, 113, 0.2);
    }

    .search-icon {
        position: absolute;
        left: 1rem;
        top: 50%;
        transform: translateY(-50%);
        color: #888;
    }

    .btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        padding: 0.85rem 1.75rem;
        border-radius: 8px;
        font-family: 'Amiri', serif;
        cursor: pointer;
        transition: all 0.3s ease;
        text-decoration: none;
        font-size: 1.1rem;
        gap: 0.5rem;
        font-weight: 600;
    }

    .btn i {
        font-size: 1rem;
    }

    .btn-primary {
        background: linear-gradient(45deg, var(--gradient-start), var(--gradient-end));
        color: var(--white);
        border: none;
        box-shadow: 0 4px 10px rgba(35, 75, 110, 0.3);
    }

    .btn-warning {
        background: var(--accent-color);
        color: var(--white);
        border: none;
        padding: 0.6rem 1rem;
        font-size: 0.95rem;
    }

    .btn-danger {
        background: #dc3545;
        color: var(--white);
        border: none;
        padding: 0.6rem 1rem;
        font-size: 0.95rem;
    }

    .btn-info {
        background: #17a2b8;
        color: var(--white);
        border: none;
        padding: 0.6rem 1rem;
        font-size: 0.95rem;
    }

    .btn:hover {
        transform: translateY(-3px);
        box-shadow: 0 6px 15px rgba(0, 0, 0, 0.2);
    }

    .btn:active {
        transform: translateY(-1px);
    }

    .table-responsive {
        overflow-x: auto;
        margin-top: 1.5rem;
        border-radius: var(--border-radius);
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
    }

    .table {
        width: 100%;
        border-collapse: separate;
        border-spacing: 0;
        background: white;
    }

    .table th,
    .table td {
        padding: 1.4rem;
        text-align: left;
        border-bottom: 1px solid rgba(0, 0, 0, 0.08);
    }

    .table th {
        background: linear-gradient(45deg, var(--gradient-start), var(--gradient-end));
        color: var(--white);
        font-family: 'Aref Ruqaa', serif;
        font-weight: normal;
        letter-spacing: 0.5px;
        font-size: 1.1rem;
    }

    .table th:first-child {
        border-top-left-radius: var(--border-radius);
    }

    .table th:last-child {
        border-top-right-radius: var(--border-radius);
    }

    .table tr:last-child td:first-child {
        border-bottom-left-radius: var(--border-radius);
    }

    .table tr:last-child td:last-child {
        border-bottom-right-radius: var(--border-radius);
    }

    .table tbody tr {
        transition: all 0.3s ease;
    }

    .table tbody tr:hover {
        background: rgba(35, 75, 110, 0.05);
        transform: translateX(-5px);
    }

    .table tbody tr:nth-child(even) {
        background-color: rgba(245, 247, 250, 0.5);
    }

    .actions {
        display: flex;
        gap: 0.75rem;
        align-items: center;
    }

    .pagination {
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 0.75rem;
        margin-top: 2.5rem;
        font-family: 'Amiri', serif;
    }

    .pagination nav {
        display: flex;
        justify-content: center;
        width: 100%;
    }

    .pagination svg {
        width: 1.2rem;
        height: 1.2rem;
        fill: currentColor;
    }

    .pagination>div {
        display: flex;
        gap: 0.5rem;
    }

    .pagination span.relative,
    .pagination a.relative {
        position: relative;
        padding: 0.75rem 1rem;
        background: var(--white);
        border-radius: 8px;
        color: var(--text-color);
        text-decoration: none;
        transition: all 0.3s ease;
        min-width: 2.5rem;
        text-align: center;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1rem;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.08);
        border: 1px solid rgba(0, 0, 0, 0.06);
    }

    .pagination span[aria-current="page"] {
        background: linear-gradient(45deg, var(--gradient-start), var(--gradient-end));
        color: var(--white);
        border: none;
        font-weight: bold;
        box-shadow: 0 4px 10px rgba(35, 75, 110, 0.3);
    }

    .pagination a.relative:hover {
        background: rgba(35, 75, 110, 0.08);
        transform: translateY(-2px);
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.15);
    }

    .pagination span[aria-disabled="true"] {
        opacity: 0.5;
        cursor: not-allowed;
        background: rgba(0, 0, 0, 0.05);
    }

    .empty-state {
        text-align: center;
        padding: 3rem;
        display: none;
    }

    .empty-state i {
        font-size: 3rem;
        color: var(--secondary-color);
        margin-bottom: 1rem;
    }

    .empty-state h3 {
        font-family: 'Aref Ruqaa', serif;
        margin-bottom: 1rem;
        color: var(--primary-color);
    }

    .stats-bar {
        display: flex;
        gap: 1.5rem;
        margin-bottom: 2rem;
    }

    .stat-card {
        flex: 1;
        background: white;
        padding: 1.5rem;
        border-radius: var(--border-radius);
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
        display: flex;
        align-items: center;
        gap: 1rem;
    }

    .stat-icon {
        width: 50px;
        height: 50px;
        background: linear-gradient(45deg, var(--gradient-start), var(--gradient-end));
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 1.25rem;
    }

    .stat-content h3 {
        font-family: 'Aref Ruqaa', serif;
        margin-bottom: 0.25rem;
        color: var(--text-color);
    }

    .stat-content p {
        font-size: 1.5rem;
        font-weight: bold;
        color: var(--primary-color);
    }

    @media (max-width: 768px) {
        .content-wrapper {
            width: 95%;
            padding: 1rem;
        }

        .content-card {
            padding: 1.5rem;
        }

        .action-bar {
            flex-direction: column;
            gap: 1rem;
        }

        .btn {
            width: 100%;
            justify-content: center;
        }

        header {
            padding: 2.5rem;
        }

        header h1 {
            font-size: 2.2rem;
        }

        .actions {
            flex-direction: column;
            width: 100%;
        }

        .actions .btn {
            width: 100%;
        }

        .stats-bar {
            flex-direction: column;
        }
    }
    </style>
</head>

<body>
    <div class="page-wrapper">
        <header>
            <h1>Tool Names Management</h1>
        </header>

        <div class="content-wrapper">
            <!-- Stats Bar -->
            <div class="stats-bar">
                <div class="stat-card">
                    <div class="stat-icon">
                        <i class="fas fa-tools"></i>
                    </div>
                    <div class="stat-content">
                        <h3>Total Tools</h3>
                        <p>{{ $toolNames->total() }}</p>
                    </div>
                </div>
                <div class="stat-card">
                    <div class="stat-icon">
                        <i class="fas fa-calendar-day"></i>
                    </div>
                    <div class="stat-content">
                        <h3>Current Page</h3>
                        <p>{{ $toolNames->currentPage() }}</p>
                    </div>
                </div>
                <div class="stat-card">
                    <div class="stat-icon">
                        <i class="fas fa-list"></i>
                    </div>
                    <div class="stat-content">
                        <h3>Per Page</h3>
                        <p>{{ $toolNames->perPage() }}</p>
                    </div>
                </div>
            </div>

            <div class="content-card">
                <!-- <div class="action-bar">
                    <div class="search-container">
                        <i class="fas fa-search search-icon"></i>
                        <input type="text" class="search-input" placeholder="Search tool names...">
                    </div>
                    <a href="{{ route('toolnames.create') }}" class="btn btn-primary">
                        <i class="fas fa-plus"></i>
                        Create New Tool Name
                    </a>
                </div> -->

                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($toolNames as $toolName)
                            <tr>
                                <td>{{ $toolName->id }}</td>
                                <td>{{ $toolName->name }}</td>
                                <td>
                                    <div class="actions">
                                        <a href="{{ route('toolnames.show', $toolName->id) }}" class="btn btn-info">
                                            <i class="fas fa-eye"></i> View
                                        </a>
                                        <a href="{{ route('toolnames.edit', $toolName->id) }}" class="btn btn-warning">
                                            <i class="fas fa-edit"></i> Edit
                                        </a>
                                        <form action="{{ route('toolnames.destroy', $toolName->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger"
                                                onclick="return confirm('Are you sure you want to delete this tool name?')">
                                                <i class="fas fa-trash"></i> Delete
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- Empty state (shows only when no records) -->
                @if($toolNames->count() == 0)
                <div class="empty-state" style="display: block;">
                    <i class="fas fa-tools"></i>
                    <h3>No Tool Names Found</h3>
                    <p>Add your first tool name by clicking the 'Create New Tool Name' button above.</p>
                </div>
                @endif

                <div class="pagination">
                    {{ $toolNames->links() }}
                </div>
            </div>
        </div>
    </div>
</body>

</html>