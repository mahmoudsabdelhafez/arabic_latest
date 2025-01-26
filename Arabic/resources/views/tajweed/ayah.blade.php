<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ayah Tajweed Checker</title>
    <style>
        body {
            font-family: 'Roboto', Arial, sans-serif;
            background-color: #f4f4f9;
            color: #333;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #2F4F4F;
            color: #fff;
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
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }

        .ayah {
            font-size: 28px;
            color: #4CAF50;
            cursor: pointer;
            margin: 20px 0;
            transition: transform 0.3s ease, color 0.3s ease;
        }

        .ayah:hover {
            transform: scale(1.05);
            color: #4a148c;
        }

        .result {
            margin-top: 30px;
            text-align: right;
            direction: rtl;
            font-size: 20px;
        }

        .result p {
            background-color: #f1f1f1;
            border-left: 5px solid #4CAF50;
            padding: 10px;
            margin: 10px 0;
            border-radius: 5px;
            font-weight: bold;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        .matching-word {
            background-color: #ffeb3b;
            color: #333;
            font-weight: bold;
            padding: 3px 5px;
            border-radius: 3px;
        }

        footer {
            margin-top: 50px;
            padding: 20px;
            background-color: #2F4F4F;
            color: #fff;
            text-align: center;
        }

        footer p {
            margin: 0;
            font-size: 14px;
        }

        .btn-add-rule {
            background-color: #4CAF50;
            color: #fff;
            padding: 10px 20px;
            font-size: 16px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            margin-top: 20px;
        }

        .btn-add-rule:hover {
            background-color: #388e3c;
        }
    </style>
</head>
<body>
    <header>
        <h1>Ayah Tajweed Checker</h1>
    </header>

    <div class="container">
        <p class="ayah" onclick="checkTajweed(this.innerText)">
            وَيَطُوفُ عَلَيْهِمْ وِلْدَانٌ مُّخَلَّدُونَ إِذَا رَأَيْتَهُمْ حَسِبْتَهُمْ لُؤْلُؤًا مَّنثُورًا
        </p>
        <div class="result"></div>

        <!-- Add Rule Button -->
        <a href="{{ route('add-rule') }}" class="btn-add-rule">Add Rule</a>
    </div>

    <footer>
        <p>&copy; 2025 Ayah Checker. All Rights Reserved.</p>
    </footer>

    <script>
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
    </script>
</body>
</html>
