<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $conditional->name }} Details</title>
    <link href="https://fonts.googleapis.com/css2?family=Amiri:wght@400;700&family=Aref+Ruqaa:wght@400;700&display=swap"
        rel="stylesheet">
    <style>
    /* [Previous CSS styles remain the same until .container] */
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
            box-shadow: 0 4px 12px rgba(0,0,0,0.15);
        }

        header h1 {
            color: var(--white);
            font-size: 2.5rem;
            font-family: 'Aref Ruqaa', serif;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.2);
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 2rem 1rem;
        }

        .card {
            background: var(--white);
            border-radius: 15px;
            margin-bottom: 2rem;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            overflow: hidden;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 15px rgba(0,0,0,0.2);
        }

        .card-header {
            background: linear-gradient(45deg, var(--primary-color), var(--secondary-color));
            padding: 1.5rem;
            color: var(--white);
        }

        .card-title {
            font-family: 'Aref Ruqaa', serif;
            font-size: 1.5rem;
            margin-bottom: 0.5rem;
        }

        .card-body {
            padding: 1.5rem;
        }

        .detail-group {
            margin-bottom: 1rem;
            padding: 0.5rem 0;
            border-bottom: 1px solid rgba(0,0,0,0.1);
        }

        .detail-label {
            font-weight: bold;
            color: var(--primary-color);
            margin-bottom: 0.25rem;
        }

        .detail-value {
            color: var(--text-color);
        }

        .example {
            background-color: rgba(193, 123, 63, 0.1);
            padding: 1rem;
            border-radius: 8px;
            margin: 1rem 0;
        }

        @media (max-width: 768px) {
            header h1 {
                font-size: 2rem;
            }

            .container {
                padding: 1rem;
            }

            .card-header {
                padding: 1rem;
            }

            .card-body {
                padding: 1rem;
            }

            .card-title {
                font-size: 1.25rem;
            }
        }

        @media (max-width: 480px) {
            header h1 {
                font-size: 1.75rem;
            }

            .detail-group {
                padding: 0.25rem 0;
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

    .card {
        background: var(--white);
        border-radius: 15px;
        margin-bottom: 2rem;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        overflow: hidden;
    }

    .card-header {
        background: linear-gradient(45deg, var(--primary-color), var(--secondary-color));
        padding: 1.5rem;
        color: var(--white);
    }

    .card-title {
        font-family: 'Aref Ruqaa', serif;
        font-size: 1.5rem;
        margin-bottom: 0.5rem;
    }

    .card-body {
        padding: 1.5rem;
    }

    .detail-group {
        margin-bottom: 1rem;
        padding: 0.5rem 0;
        border-bottom: 1px solid rgba(0, 0, 0, 0.1);
    }

    .detail-label {
        font-weight: bold;
        color: var(--primary-color);
        margin-bottom: 0.25rem;
    }

    .detail-value {
        color: var(--text-color);
    }

    .example {
        background-color: rgba(193, 123, 63, 0.1);
        padding: 1rem;
        border-radius: 8px;
        margin: 1rem 0;
    }
    </style>
</head>

<body>
    <header>
        <h1>Conditional Details</h1>
    </header>

    <div class="container">
        <a href="{{ route('harf.show',$conditional->table_id) }}" class="back-button">← Back to List</a>

        <div class="card">
            <div class="card-header">
                <h2 class="card-title">{{ $conditional->name }}
                    <span style="font-size: 0.8em;">({{ $conditional->english_name }})</span>
                </h2>
            </div>
            <div class="card-body">
                <div class="detail-group">
                    <div class="detail-label">Tool</div>
                    <div class="detail-value">{{ $conditional->tool_name ?? 'N/A' }}</div>
                </div>

                <div class="detail-group">
                    <div class="detail-label">Syntactic Effect</div>
                    <div class="detail-value">{{ $conditional->result_case ?? 'N/A' }}</div>
                </div>

                <div class="detail-group">
                    <div class="detail-label">Semantic Logical Effect</div>
                    <div class="detail-value">{{ $conditional->semantic_roles ?? 'N/A' }}</div>
                </div>

                <div class="detail-group">
                    <div class="detail-label">Example</div>
                    <div class="example">{{ $conditional->example ?? 'N/A' }}</div>
                </div>

                <div class="detail-group">
                    <div class="detail-label">Description</div>
                    <div class="detail-value">{{ $conditional->description ?? 'N/A' }}</div>
                </div>

                <div class="detail-group">
                    <div class="detail-label">Applied On</div>
                    <div class="detail-value">{{ $conditional->applied_on ?? 'N/A' }}</div>
                </div>

                <div class="detail-group">
                    <div class="detail-label">Context Condition</div>
                    <div class="detail-value">{{ $conditional->context_condition ?? 'N/A' }}</div>
                </div>

                <div class="detail-group">
                    <div class="detail-label">Priority Order</div>
                    <div class="detail-value">{{ $conditional->priority_order ?? 'N/A' }}</div>
                </div>

                <div class="detail-group">
                    <div class="detail-label">Notes</div>
                    <div class="detail-value">{{ $conditional->notes ?? 'N/A' }}</div>
                </div>

                <div class="detail-group">
                    <div class="detail-label">Typical Relation</div>
                    <div class="detail-value">{{ $conditional->typical_relation ?? 'N/A' }}</div>
                </div>

                <div class="detail-group">
                    <div class="detail-label">Example Ayah</div>
                    <div class="example">{{ $hasToolsInfo[0]->example_ayah ?? 'N/A' }}</div>
                </div>

                <div class="detail-group">
                    <div class="detail-label">Example Explanation</div>
                    <div class="detail-value">{{ $hasToolsInfo[0]->example_explanation ?? 'N/A' }}</div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>