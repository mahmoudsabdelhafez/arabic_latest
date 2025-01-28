<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ayah Tajweed Checker</title>
    <style>
        :root {
            --primary-color: #1a5f7a;
            --secondary-color: #c7b7a3;
            --accent-color: #e6d5b8;
            --text-color: #2b2b2b;
            --white: #ffffff;
            --teal: #1abc9c;
            --green: #4CAF50;
            --bright-blue: #3498db;
            --bright-red: #e74c3c;
        }

        body {
            font-family: 'Roboto', Arial, sans-serif;
            background-color: #f7f7f7;
            margin: 0;
            padding: 0;
            color: #333;
        }

        header {
            background-color: var(--primary-color);
            color: var(--white);
            padding: 20px;
            text-align: center;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        header h1 {
            margin: 0;
            font-size: 28px;
            letter-spacing: 1px;
        }

        .container {
            max-width: 800px;
            margin: 40px auto;
            text-align: center;
            padding: 20px;
            background-color: var(--white);
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }

        .ayah {
            font-size: 28px;
            color: var(--teal);
            cursor: pointer;
            margin: 20px 0;
            transition: transform 0.3s ease, color 0.3s ease;
        }

        .ayah:hover {
            transform: scale(1.05);
            color: var(--bright-blue);
        }

        .result {
            margin-top: 30px;
            text-align: right;
            direction: rtl;
            font-size: 20px;
        }

        .result p {
            background-color: #f1f1f1;
            border-left: 5px solid var(--green);
            padding: 10px;
            margin: 10px 0;
            border-radius: 5px;
            font-weight: bold;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        .matching-word {
            background-color: var(--bright-blue);
            color: var(--white);
            font-weight: bold;
            padding: 3px 5px;
            border-radius: 3px;
        }

        footer {
            margin-top: 50px;
            padding: 20px;
            background-color: var(--primary-color);
            color: var(--white);
            text-align: center;
        }

        footer p {
            margin: 0;
            font-size: 14px;
        }

        .btn-back {
            background-color: var(--green);
            color: var(--white);
            padding: 10px 20px;
            font-size: 16px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            margin-top: 20px;
        }

        .btn-back:hover {
            background-color: #388e3c;
        }

        /* Style for the input field */
        .ayah-input {
            font-size: 20px;
            padding: 10px;
            width: 80%;
            margin-top: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            outline: none;
        }

        .ayah-input:focus {
            border-color: var(--teal);
        }
    </style>
</head>
<body>
    <header>
        <h1>Ayah Tajweed Checker</h1>
    </header>

    <div class="container">
        <input type="text" id="ayahInput" class="ayah-input" placeholder="Enter an Ayah here..." />
        <div class="ayah-container">
            <!-- The Ayah will appear here after user enters it -->
        </div>
        <div class="result"></div>

        <!-- Back Button -->
        <a href="javascript:history.back()" class="btn-back">Back</a>
    </div>

    <footer>
        <p>&copy; 2025 Ayah Checker. All Rights Reserved.</p>
    </footer>

    <script>
        // Function to handle checking Tajweed rules
        function checkTajweed(ayah) {
            fetch(`/check-tajweed?ayah=${encodeURIComponent(ayah)}`)
                .then(response => response.json())
                .then(data => {
                    const resultDiv = document.querySelector('.result');
                    resultDiv.innerHTML = ''; // Clear previous results
                    
                    if (data.success) {
                        data.matches.forEach(match => {
                            // Highlight the matching word in the Ayah
                            const highlightedAyah = ayah.replace(new RegExp(match.matching_word, 'g'), `<span class="matching-word">${match.matching_word}</span>`);
                            
                            const ruleInfo = document.createElement('p');
                            ruleInfo.innerHTML = ` 
                                <span class="matching-word">${match.matching_word}</span> 
                                - Expression: ${match.expression} , Rule: ${match.rule_name}<br><br>
                            `;
                            resultDiv.appendChild(ruleInfo);
                        });
                    } else {
                        resultDiv.textContent = 'No Tajweed rule matches this Ayah.';
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    document.querySelector('.result').textContent = 'An error occurred while fetching Tajweed rules.';
                });
        }

        // Function to dynamically update the Ayah for checking
        document.getElementById('ayahInput').addEventListener('input', function() {
            const ayahInput = this.value.trim();
            const ayahContainer = document.querySelector('.ayah-container');
            if (ayahInput) {
                ayahContainer.innerHTML = `<p class="ayah" onclick="checkTajweed(this.innerText)">${ayahInput}</p>`;
            } else {
                ayahContainer.innerHTML = ''; // Clear the ayah if the input is empty
            }
        });
    </script>
</body>
</html>
