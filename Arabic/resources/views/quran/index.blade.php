<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>البحث في القرآن الكريم</title>
    <link href="https://fonts.googleapis.com/css2?family=Amiri:wght@400;700&family=Aref+Ruqaa:wght@400;700&display=swap" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <style>
        :root {
            --primary-color: #234B6E;
            --secondary-color: #3A7E71;
            --accent-color: #C17B3F;
            --text-color: #2b2b2b;
            --white: #ffffff;
            --gradient-start: #234B6E;
            --gradient-end: #3A7E71;
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
            line-height: 1.8;
        }

        header {
            background: linear-gradient(45deg, var(--gradient-start), var(--gradient-end));
            padding: 3rem;
            position: relative;
            overflow: hidden;
            box-shadow: 0 4px 12px rgba(0,0,0,0.15);
        }

        header::before {
            content: '';
            position: absolute;
            top: 0;
            right: 0;
            left: 0;
            bottom: 0;
            background: 
                radial-gradient(circle at 50% 50%, rgba(255,255,255,0.1) 0%, transparent 60%),
                linear-gradient(45deg, rgba(255,255,255,0.1) 25%, transparent 25%);
            background-size: 100% 100%, 60px 60px;
            opacity: 0.2;
            animation: backgroundMove 30s linear infinite;
        }

        @keyframes backgroundMove {
            0% { background-position: center, 0 0; }
            100% { background-position: center, 60px 60px; }
        }

        header h1 {
            color: var(--white);
            font-size: 3rem;
            text-align: center;
            font-family: 'Aref Ruqaa', serif;
            position: relative;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.2);
        }

        .container {
            max-width: 1000px;
            margin: 40px auto;
            padding: 20px;
        }

        .search-container {
            background: var(--white);
            border-radius: 20px;
            padding: 25px;
            margin-bottom: 25px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        }

        #search {
            width: 100%;
            padding: 15px 20px;
            font-size: 1.2rem;
            border: 2px solid rgba(35, 75, 110, 0.2);
            border-radius: 12px;
            font-family: 'Amiri', serif;
            transition: all 0.3s ease;
            outline: none;
        }

        #search:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(35, 75, 110, 0.1);
        }

        .loader {
            display: none;
            text-align: center;
            padding: 1rem;
        }

        .loader::after {
            content: "";
            display: inline-block;
            width: 30px;
            height: 30px;
            border: 3px solid #f3f3f3;
            border-top: 3px solid var(--primary-color);
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        #results {
            list-style: none;
        }

        #results li {
            background: var(--white);
            margin-bottom: 15px;
            padding: 20px 25px;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        #results li:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(0,0,0,0.15);
        }

        .sura-name {
            color: var(--primary-color);
            font-weight: bold;
            font-size: 1.2rem;
            font-family: 'Aref Ruqaa', serif;
        }

        .aya-number {
            color: var(--secondary-color);
            font-size: 1rem;
        }

        .aya-text {
            margin-top: 0.8rem;
            line-height: 2;
            font-size: 1.15rem;
        }

        .highlight {
            background-color: rgba(193, 123, 63, 0.2);
            color: var(--accent-color);
            padding: 0 4px;
            border-radius: 4px;
        }

        #pagination {
            margin-top: 2rem;
            text-align: center;
        }

        .pagination-btn {
            padding: 0.8rem 1.5rem;
            margin: 0 0.5rem;
            border: none;
            background: linear-gradient(45deg, var(--gradient-start), var(--gradient-end));
            color: var(--white);
            border-radius: 8px;
            cursor: pointer;
            transition: all 0.3s ease;
            font-family: 'Amiri', serif;
            font-size: 1.1rem;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        }

        .pagination-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(0,0,0,0.15);
        }

        .pagination-btn:disabled {
            background: #bdc3c7;
            cursor: not-allowed;
            transform: none;
        }

        .no-results {
            text-align: center;
            padding: 2rem;
            color: var(--text-color);
            font-size: 1.2rem;
        }

        .ayah-analysis-btn {
    padding: 10px 20px;
    background: linear-gradient(45deg, var(--gradient-start), var(--gradient-end));
    color: var(--white);
    font-family: 'Aref Ruqaa', serif;
    font-size: 1rem;
    border: none;
    border-radius: 8px;
    cursor: pointer;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    transition: all 0.3s ease;
    text-align: center;
    margin-top: 15px;
    display: block;
    width: fit-content;
    margin-left: auto;
    margin-right: auto;
}
#analysis-btn {
    padding: 12px 25px;
    background: linear-gradient(45deg, var(--gradient-start), var(--gradient-end));
    color: var(--white);
    font-family: 'Aref Ruqaa', serif;
    font-size: 1.2rem;
    border: none;
    border-radius: 12px;
    cursor: pointer;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    transition: all 0.3s ease;
    display: block;
    margin: 20px auto; /* Center the button horizontally */
    width: fit-content;
    text-align: center;
}

#analysis-btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 20px rgba(0, 0, 0, 0.15);
}

#analysis-btn:disabled {
    background: #bdc3c7;
    cursor: not-allowed;
    transform: none;
}

#analysis-btn:focus {
    outline: none;
    border-color: var(--primary-color);
    box-shadow: 0 0 0 3px rgba(35, 75, 110, 0.2);
}

/* Container for the text that will be shown */
.analysis-text-container {
    display: none;  /* Initially hidden */
    margin-top: 20px;
    padding: 20px;
    background: linear-gradient(45deg, var(--gradient-start), var(--gradient-end));
    color: var(--white);
    font-family: 'Aref Ruqaa', serif;
    border-radius: 12px;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    font-size: 1.2rem;
    line-height: 1.8;
    text-align: center;
    opacity: 0;
    transform: translateY(-20px);
    transition: opacity 0.5s ease, transform 0.5s ease;
}

.analysis-text-container.show {
    display: block;
    opacity: 1;
    transform: translateY(0);
}

.analysis-text-container h3 {
    font-size: 1.5rem;
    font-weight: bold;
    color: var(--accent-color);
}

.analysis-text-container p {
    margin-top: 10px;
    font-size: 1.2rem;
}

.analysis-result {
            background-color: #f4f4f9;
            padding: 15px;
            border-radius: 8px;
            margin-top: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            display: none;
        }

        .analysis-result h4 {
            color: var(--primary-color);
            font-size: 1.2rem;
            margin-bottom: 10px;
        }

        .analysis-result p {
            font-size: 1rem;
            color: var(--text-color);
        }


.ayah-analysis-btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 20px rgba(0, 0, 0, 0.15);
}

.ayah-analysis-btn:disabled {
    background: #bdc3c7;
    cursor: not-allowed;
    transform: none;
}

.ayah-analysis-btn:focus {
    outline: none;
    border-color: var(--primary-color);
    box-shadow: 0 0 0 3px rgba(35, 75, 110, 0.2);
}


        .footer {
            background: linear-gradient(45deg, var(--gradient-start), var(--gradient-end));
            color: var(--white);
            text-align: center;
            padding: 2rem;
            margin-top: auto;
            position: relative;
            overflow: hidden;
            font-family: 'Aref Ruqaa', serif;
        }

        @media (max-width: 768px) {
            .container {
                padding: 15px;
                margin: 20px auto;
            }

            header h1 {
                font-size: 2.2rem;
            }

            #search {
                font-size: 1rem;
                padding: 12px 15px;
            }
        }
    </style>
</head>
<body>
    <header>
        
        <h1>البحث في القرآن الكريم</h1>
    </header>

    <div class="container">
        
        <div class="search-container">
            <input 
                type="text" 
                id="search" 
                placeholder="ابحث عن كلمة أو آية..." 
                autocomplete="off"
            >
        </div>
       <!-- Add this button inside your container before the search bar -->
<button id="analysis-btn" class="pagination-btn">
    تحليل
</button>
<div id="analysis-text-container" class="analysis-text-container"></div>


        <div class="loader" id="loader"></div>
        <div id="ayah-analyze-results"></div>
        <ul id="results"></ul>
        <div id="pagination"></div>
    </div>

    <footer class="footer">
        <p>© جميع الحقوق محفوظة للقرآن الكريم</p>
    </footer>

    <script>
      let searchTimeout;
let currentQuery = '';
let searchResults = []; // Store the original search results

function highlightText(text, query) {
    if (!query) return text;
    const regex = new RegExp(`(${query})`, 'gi');
    return text.replace(regex, '<span class="highlight">$1</span>');
}

function applyAnalysis(results) {
    // Replace 'ب' with 'ا'
    let modifiedResults = results.map(aya => {
        let modifiedText = aya.text.replace(/ٰ/g, 'ا');
        
        // Replace characters with shadda and diacritic
        modifiedText = replaceShadda(modifiedText);

          // Remove all sukoons from the text
          modifiedText = removeSukoon(modifiedText);


        
        return {
            ...aya,
            text: modifiedText
        };
    });

    return modifiedResults;
}

function replaceShadda(text) {
    // Regular expression to match characters followed by shadda
    return text.replace(/([^\s])ّ/g, (match, p1) => {
        // Duplicate the consonant and add the diacritic (vowel)
        // Example: "دُّ" -> "ددُ"
        return p1 + p1 + match.slice(2); // p1 is the consonant, match.slice(1) is the diacritic
    });
}


function removeSukoon(text) {
    // Remove all sukoons (ْ) from the text
    return text.replace(/ْ/g, '');
}

function fetchResults(query, page = 1) {
    if (query === '') return;
    
    $('#loader').show();
    $('#results, #pagination').empty();

    $.ajax({
        url: '/search',
        type: 'GET',
        data: { query: query, page: page },
        success: function(response) {
            $('#loader').hide();
            searchResults = response.data; // Store the original search results

            if (searchResults.length === 0) {
                $('#results').html('<div class="no-results">لا توجد نتائج</div>');
                return;
            }

            displayResults(searchResults); // Display the results as usual
        },
        error: function() {
            $('#loader').hide();
            $('#results').html('<div class="no-results">حدث خطأ في البحث</div>');
        }
    });
}

function displayResults(results) {
    $('#results').empty();

    results.forEach(aya => {
        const highlightedText = highlightText(aya.text, currentQuery);
        $('#results').append(`
            <li>
                <div class="sura-name">${aya.sura_name}</div>
                <span class="aya-number">آية ${aya.aya}</span>
                <div class="aya-text">${highlightedText}</div>
                <button class="ayah-analysis-btn" data-query="${aya.text}" data-aya-id="${aya.index}">تحليل الاية</button>
                                        <div class="analysis-result" id="analysis-result-${aya.index}"></div>


            </li>
        `);
    });
}

$(document).ready(function() {
    // Handle search input
    $('#search').on('input', function() {
        const query = $(this).val().trim();
        
        clearTimeout(searchTimeout);
        
        if (query === currentQuery) return;
        currentQuery = query;

        if (query.length === 0) {
            $('#results, #pagination').empty();
            return;
        }

        searchTimeout = setTimeout(() => {
            fetchResults(query);
        }, 300);
    });
    

    // Handle the "تحليل" button click
    $('#analysis-btn').on('click', function() {
        if (searchResults.length === 0) return;

                // Show the analysis text container with a smooth animation
                $('#analysis-text-container').addClass('show').html(`
            <h3>تحليل نتائج البحث</h3>
            <p> تم استبدال الألف الخنجرية بالألف العادية , تم استبدال الشدة وحركتها بحرف ساكن وحرف متحرك , تمت ازالة جميع اشارات السكون</p>
        `);


        const modifiedResults = applyAnalysis(searchResults); // Apply analysis (replace ب with ا and shadda transformation)
        displayResults(modifiedResults); // Display the modified results
    });
});


// =========== ayah analysis button handling ===========
$(document).on('click', '.ayah-analysis-btn', function () {
    const query = $(this).data('query');
    const ayaId = $(this).data('aya-id');

    $('#loader').show();
    $('#analysis-result-' + ayaId).empty();

    $.ajax({
        url: '/analyze-ayah-results/' + ayaId,
        type: 'GET',
        data: { query: query, aya_id: ayaId },
        success: function (response) {
            $('#loader').hide();
            const analysisContainer = $('#analysis-result-' + ayaId);
            const results = response.results || [];
            if (results.length === 0) {
                analysisContainer.html('<p>لا توجد نتائج للتحليل.</p>');
            } else {
                let resultHtml = '';
                results.forEach(result => {
                    // Render each match name and all words that match it
                    const matchedWords = result.matched_words.join(', '); // Combine words into a comma-separated list
                    resultHtml += `
                        <div>
                            <h4>${result.name} : في كلمة (${matchedWords})</h4>
                            <p>${result.table}</p>
                            <p></p>
                        </div>
                    `;
                });
                analysisContainer.html(resultHtml);
            }
            analysisContainer.fadeIn();
        },
        error: function (response) {
            console.log(response);
            $('#loader').hide();
            alert('حدث خطأ أثناء تحليل الآية');
        }
    });
});



// =========== ayah analysis button handling ===========




    </script>
</body>
</html>