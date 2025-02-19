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
    /* font-family: 'Aref Ruqaa', serif; */
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

.toggle-buttons {
    margin: 10px 0;
}

.toggle-btn {
    padding: 10px 20px;
    margin: 5px;
    border: none;
    background-color: #f0f0f0;
    cursor: pointer;
    border-radius: 5px;
}

.toggle-btn.active {
    background-color:var(--primary-color);
    color: white;
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

        /* <!------------------------------------- check boxes style ---------------------------------------------> */
        .analysis-options {
    background: var(--white);
    border-radius: 20px;
    padding: 20px;
    margin: 20px 0;
    box-shadow: 0 4px 15px rgba(0,0,0,0.1);
}

.analysis-options-title {
    color: var(--primary-color);
    font-family: 'Aref Ruqaa', serif;
    font-size: 1.3rem;
    margin-bottom: 15px;
    text-align: right;
}

.checkbox-container {
    display: grid;
    grid-template-columns: repeat(3, 1fr); /* Two columns */
    gap: 12px 20px; /* Adjust spacing between checkboxes */
    align-items: center;
}


.checkbox-group {
    display: flex;
    align-items: center;
    gap: 10px;
    flex-direction: row-reverse;
    justify-content: flex-end;
}

.custom-checkbox {
    appearance: none;
    -webkit-appearance: none;
    width: 20px;
    height: 20px;
    border: 2px solid var(--primary-color);
    border-radius: 6px;
    cursor: pointer;
    position: relative;
    transition: all 0.3s ease;
    background: var(--white);
}

.custom-checkbox:checked {
    background: var(--primary-color);
}

.custom-checkbox:checked::after {
    content: '✓';
    position: absolute;
    color: white;
    font-size: 14px;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
}

.custom-checkbox:hover {
    border-color: var(--secondary-color);
    box-shadow: 0 0 5px rgba(58, 126, 113, 0.3);
}

label {
    font-family: 'Amiri', serif;
    font-size: 1.1rem;
    color: var(--text-color);
    cursor: pointer;
}

@media (max-width: 768px) {
    .analysis-options {
        padding: 15px;
    }
    
    .checkbox-group {
        padding: 8px 0;
    }
    
    .custom-checkbox {
        width: 18px;
        height: 18px;
    }
    
    label {
        font-size: 1rem;
    }

    .checkbox-container {
        grid-template-columns: repeat(1, 1fr); /* Switch to one column on smaller screens */
    }







    .analysis-result {
    background: linear-gradient(to left, rgba(255, 255, 255, 0.95), rgba(255, 255, 255, 0.98));
    border-radius: 15px;
    margin-top: 20px;
    padding: 20px;
    box-shadow: 0 4px 20px rgba(35, 75, 110, 0.1);
    border: 1px solid rgba(35, 75, 110, 0.1);
    transition: all 0.3s ease;
    opacity: 0;
    transform: translateY(20px);
    animation: slideIn 0.5s ease forwards;
}

@keyframes slideIn {
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.analysis-result > div {
    border-right: 4px solid var(--primary-color);
    margin-bottom: 20px;
    padding: 15px;
    background: rgba(255, 255, 255, 0.7);
    border-radius: 0 15px 15px 0;
    transition: all 0.3s ease;
}

.analysis-result > div:hover {
    transform: translateX(-5px);
    background: rgba(255, 255, 255, 0.9);
    box-shadow: 0 4px 15px rgba(35, 75, 110, 0.1);
}

.analysis-result h4 {
    color: var(--primary-color);
    font-family: 'Aref Ruqaa', serif;
    font-size: 1.2rem;
    margin-bottom: 12px;
    display: flex;
    align-items: center;
    gap: 10px;
}

.analysis-result h4::before {
    content: '⦿';
    color: var(--accent-color);
    font-size: 1.4rem;
}

.analysis-result .matched-words {
    display: flex;
    flex-wrap: wrap;
    gap: 8px;
    margin: 10px 0;
}

.analysis-result .word-chip {
    background: var(--primary-color);
    color: white;
    padding: 5px 12px;
    border-radius: 20px;
    font-size: 0.9rem;
    display: inline-block;
    transition: all 0.3s ease;
}

.analysis-result .word-chip:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 8px rgba(35, 75, 110, 0.2);
    background: var(--secondary-color);
}

.analysis-result .analysis-table {
    margin-top: 15px;
    padding: 10px;
    background: rgba(255, 255, 255, 0.8);
    border-radius: 10px;
    font-size: 1rem;
    line-height: 1.6;
    color: var(--text-color);
}

.analysis-result .table-row {
    display: flex;
    padding: 8px 0;
    border-bottom: 1px solid rgba(35, 75, 110, 0.1);
}

.analysis-result .table-row:last-child {
    border-bottom: none;
}

.analysis-result .table-label {
    font-weight: bold;
    color: var(--secondary-color);
    width: 120px;
    flex-shrink: 0;
}

.analysis-result .table-value {
    flex: 1;
}

/* Add this to your existing loader styles */
.analysis-loader {
    display: inline-block;
    width: 50px;
    height: 50px;
    border: 3px solid rgba(35, 75, 110, 0.1);
    border-radius: 50%;
    border-top-color: var(--primary-color);
    animation: spin 1s linear infinite;
    margin: 20px auto;
}

@keyframes spin {
    to {
        transform: rotate(360deg);
    }
}

/* Mobile responsiveness */
@media (max-width: 768px) {
    .analysis-result {
        padding: 15px;
    }

    .analysis-result > div {
        padding: 10px;
    }

    .analysis-result h4 {
        font-size: 1.1rem;
    }

    .analysis-result .table-row {
        flex-direction: column;
    }

    .analysis-result .table-label {
        width: 100%;
        margin-bottom: 5px;
    }
}
}
        /* <!------------------------------------- check boxes style ---------------------------------------------> */


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

        <div class="toggle-buttons">
    <button id="quran-btn" class="toggle-btn active">عرض الايات مع تشكيل</button>
    <button id="quran-text-clean-btn" class="toggle-btn">عرض الايات بدون تشكيل</button>
</div>

<!------------------------------------- check boxes --------------------------------------------->
<div class="analysis-options">
    <h3 class="analysis-options-title">خيارات التحليل</h3>
    <div class="checkbox-container">
        
        <!-- Select All Checkbox -->
        <div class="checkbox-group">
        <label for="select-all">جميع الأدوات</label>
            <input type="checkbox" id="select-all" class="custom-checkbox">
        </div>

        <!-- Dynamic Category Checkboxes -->
        @foreach ($categories as $category)
            <div class="checkbox-group">
            <label for="category-{{ $category->id }}">{{ $category->arabic_name }}</label>

                <input type="checkbox" id="category-{{ $category->id }}" class="custom-checkbox category-checkbox" data-category-id="{{ $category->id }}">
            </div>
        @endforeach
    </div>
</div>


<!------------------------------------- check boxes --------------------------------------------->


<div id="result-count"></div> <!-- This will display the number of results -->




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

// =================== highlightText ====================



// =================== applyAnalysis ====================
function applyAnalysis(results) {
    // Replace 'ب' with 'ا'
    let modifiedResults = results.map(aya => {

        let modifiedText = aya.text.replace(/ىٰ/g, 'ا');

       modifiedText = modifiedText.replace(/ٰ/g, 'ا');
        
        // Replace characters with shadda and diacritic
        modifiedText = replaceShadda(modifiedText);

        
        modifiedText = replaceFirstAlifWithHamza(modifiedText);
        
        
        modifiedText = removeAlifFromWords(modifiedText);


        modifiedText = replaceHamzaWithMadd(modifiedText);


        modifiedText = removeAlifBeforeSukoon(modifiedText);


        // Add sukoon to letters that do not have any diacritic
        modifiedText = addSukoonToBareLetters(modifiedText);

        
        
        // Remove all sukoons from the text
        // modifiedText = removeSukoon(modifiedText);

        
        return {
            ...aya,
            text: modifiedText
        };
    });

    return modifiedResults;
}


// Function to add sukoon to letters that don't have a diacritic
function addSukoonToBareLetters(text) {
    return text.replace(/([\u0621-\u064A])(?=\s|$|[\u0621-\u064A])/g, (match, letter) => {
        // Check if the letter is followed by a diacritic
        return letter + 'ْ';
    });
}

function replaceShadda(text) {
    return text.replace(/([^\s])ّ/g, (match, p1) => {
        // Duplicate the consonant and add the diacritic (vowel)
        // Example: "دُّ" -> "ددُ"
        return p1 + p1 + match.slice(2); // p1 is the consonant, match.slice(1) is the diacritic
    });
}


function removeSukoon(text) {
    
    return text.replace(/ْ/g, '');
}


// Function to process the first word based on conditions
function replaceFirstAlifWithHamza(text) {
    let words = text.split(' '); // Split text into words
    if (words.length === 0) return text; // Return if empty

    let firstWord = words[0]; 

    // Case 1: If first word starts with "الْ" (with sukoon), replace "ا" with "ءَ"
    if (firstWord.startsWith('ال')) {
        words[0] = 'ءَ' + firstWord.slice(1);
    } 
    // Case 2: If first word starts with "ال" (without sukoon), remove "ال"
    // else if (firstWord.startsWith('ال')) {
    //     words[0] = firstWord.slice(2);
    // }

    return words.join(' '); // Join words back into a single string
}


// Function to remove the first "ا" from each word except the first word
// Function to process words by removing "ال" or modifying "ألْ"
function removeAlifFromWords(text) {
    // Split the ayah into words
    let words = text.split(' ');

    // Loop through each word, starting from the second word
    for (let i = 1; i < words.length; i++) {
        let word = words[i];

        // Case 1: If word starts with "ألْ" (with sukoon), remove only "ا"
        if (word.startsWith('الْ')) {
            words[i] = 'لْ' + word.slice(2);
        }
        // Case 2: If word starts with "ال" (without sukoon), remove "ال" completely
        else if (word.startsWith('ال')) {
            words[i] = word.slice(2);
        }
    }

    // Join the words back into a string and return it
    return words.join(' ');
}


function replaceHamzaWithMadd(text) {
    return text.replace(/أَ/g, 'ءَ').replace(/أُ/g, 'ءُ').replace(/إِِ/g, 'ءِ');
}

function removeAlifBeforeSukoon(text) {
    return text.replace(/ا([^\s])ْ/g, '$1ْ');
}




function replaceMaqsouraWithAlef(text) {
    return text.replace(/ٰ/g, 'ا');
}



// =================== applyAnalysis ====================


// ===================== Fetch Results =======================
function fetchResults(query, page = 1) {
    if (query === '') return;
    
    $('#loader').show();
    $('#results, #pagination, #result-count').empty();

    $.ajax({
        url: '/search',
        type: 'GET',
        data: { query: query, page: page },
        success: function(response) {
            $('#loader').hide();
            searchResults = response.data; // Store the original search results
            searchResultsTextClean = response.clean_data; // Store clean search results

            // Save the results in both formats
            currentSearchResults = searchResults; // Store original results
            currentSearchResultsClean = searchResultsTextClean; // Store clean results

            // Display total number of search results
            $('#result-count').html(`
                <p>عدد النتائج في القران الكريم المشكّل: <strong>${response.total_results_count}</strong></p>
                <p>عدد النتائج في القران الكريم غير المشكّل: <strong>${response.total_clean_results_count}</strong></p>
            `);



            if (searchResults.length === 0) {
                $('#results').html('<div class="no-results">لا توجد نتائج</div>');
                return;
            }

            // Display the correct results based on the toggle state
            displayResults(isCleanText ? currentSearchResultsClean : currentSearchResults); 
            
            // Handle pagination
            $('#pagination').empty();

            if (response.current_page > 1) {
                $('#pagination').append(`
                    <button id="prev-page" data-page="${response.current_page - 1}" class="pagination-btn">
                        السابق
                    </button>
                `);
            }

            if (response.current_page < response.last_page) {
                $('#pagination').append(`
                    <button id="next-page" data-page="${response.current_page + 1}" class="pagination-btn">
                        التالي
                    </button>
                `);
            }
        },
        error: function() {
            $('#loader').hide();
            $('#results').html('<div class="no-results">حدث خطأ في البحث</div>');
        }
    });
}
// ===================== Fetch Results =======================





// ========================= Display Results =========================
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
let isCleanText = false; // Track whether clean text is being displayed
let currentSearchResults = []; // To store the current search results in original format
let currentSearchResultsClean = []; // To store the current search results in clean format

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
           <ul class="list-group">
        <li class="list-group-item">✅ تم استبدال الألف الخنجرية بالألف العادية</li>
        <li class="list-group-item">✅ تم استبدال الشدة وحركتها بحرف ساكن وحرف متحرك</li>
        <li class="list-group-item">✅ تمت اضافة السكون على جميع الاحرف غير المتحركة</li>
        <li class="list-group-item">✅ تم استبدال همزء القطع بهمزة بهمزة نبرة وازالة همزات الوصل بما يتناسب مع اللفظ</li>
        
    </ul>
        `);

        const modifiedResults = applyAnalysis(searchResults); // Apply analysis (replace ب with ا and shadda transformation)
        currentSearchResults = modifiedResults; // Save modified results
        displayResults(modifiedResults); // Display the modified results
    });

    // Handle the toggle button click for Quran text
    $('#quran-btn').on('click', function() {
        if (!isCleanText) return; // If already showing original text, do nothing
        isCleanText = false;
        displayResults(currentSearchResults); // Display the original search results
        $(this).addClass('active');
        $('#quran-text-clean-btn').removeClass('active');
    });

    // Handle the toggle button click for Quran clean text
    $('#quran-text-clean-btn').on('click', function() {
        if (isCleanText) return; // If already showing clean text, do nothing
        isCleanText = true;
        displayResults(currentSearchResultsClean); // Display the clean text search results
        $(this).addClass('active');
        $('#quran-btn').removeClass('active');
    });

    // Handle pagination
    $(document).on('click', '#next-page', function() {
        let nextPage = $(this).data('page');
        fetchResults(currentQuery, nextPage);
    });

    $(document).on('click', '#prev-page', function() {
        let prevPage = $(this).data('page');
        fetchResults(currentQuery, prevPage);
    });
});
// ========================= Display Results =========================


// ============ Select all from ceckboxes ============
document.addEventListener("DOMContentLoaded", function () {
    const selectAllCheckbox = document.getElementById("select-all");
    const categoryCheckboxes = document.querySelectorAll(".category-checkbox");

    selectAllCheckbox.addEventListener("change", function () {
        categoryCheckboxes.forEach(checkbox => {
            checkbox.checked = selectAllCheckbox.checked;
        });
    });

    categoryCheckboxes.forEach(checkbox => {
        checkbox.addEventListener("change", function () {
            if (!this.checked) {
                selectAllCheckbox.checked = false; // Uncheck "جميع الأدوات" if any checkbox is unchecked
            } else if (Array.from(categoryCheckboxes).every(cb => cb.checked)) {
                selectAllCheckbox.checked = true; // Check "جميع الأدوات" if all are checked
            }
        });
    });
});
// ============ Select all from ceckboxes ============

// =========== ayah analysis button handling ===========
$(document).on('click', '.ayah-analysis-btn', function () {
    const query = $(this).data('query');
    const ayaId = $(this).data('aya-id');

    // Capture selected categories
    const selectedCategories = [];
    $('.checkbox-container input:checked').each(function() {
        selectedCategories.push($(this).data('category-id'));
    });

    $('#loader').show();
    $('#analysis-result-' + ayaId).empty();

    $.ajax({
        url: '/analyze-ayah-results/' + ayaId,
        type: 'GET',
        data: { query: query, aya_id: ayaId, categories: selectedCategories },
        success: function (response) {
            $('#loader').hide();
            const analysisContainer = $('#analysis-result-' + ayaId);
            console.log(response);  // Log the full response to inspect its structure

            const results = response.results || [];  // Ensure results is an array

            if (results.length === 0) {
                analysisContainer.html('<p>لا توجد نتائج للتحليل.</p>');
            } else {
                let resultHtml = '';
                results.forEach(result => {
                    const matchedWords = result.matched_words ? result.matched_words.join(', ') : '';  // Ensure matched_words is displayed
                    const definition = result.definition ? `<p><strong>التعريف:</strong> ${result.definition}</p>` : '';  // Display definition

                    resultHtml += `
                        <div>
                            <h4>${result.name} : في كلمات (${matchedWords})</h4>
                            <p>${result.table}</p>
                            ${definition}
                            <button class="phoneme-details-btn" data-matched-words="${result.name}">تفاصيل الحرف </button>
                            <div class="phoneme-details-container"></div>
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

// Phoneme details button click handler
$(document).on('click', '.phoneme-details-btn', function () {
    const matchedWords = $(this).data('matched-words');
    const detailsContainer = $(this).next('.phoneme-details-container');

    // Hide details if already shown
    if (detailsContainer.is(':visible')) {
        detailsContainer.empty().hide();
        return;
    }

    // Show loader while fetching data
    detailsContainer.html('<p>جاري تحميل التفاصيل...</p>').show();

    // Loop through the matched words (e.g., "بس") and split into individual Arabic letters
    const arabicText = matchedWords.replace(/[^ء-ي]/g, ''); // Only Arabic letters
    const letters = arabicText.split(''); // Split the matched words into letters

    // Loop through each letter to fetch phoneme details
    const phonemeDetailsPromises = letters.map(letter => {
        return getPhonemeDetailsForLetter(letter);
    });

    // Wait for all AJAX requests to complete
    Promise.all(phonemeDetailsPromises)
        .then(results => {
            // Render the phoneme details
            const phonemeHtml = results.map(phoneme => {
                return `
                    <div>
                        <h5>الحرف: ${phoneme.letter}</h5>
                        <p><strong>IPA:</strong> ${phoneme.ipa}</p>
                        <p><strong>النوع:</strong> ${phoneme.type}</p>
                        <p><strong>مكان النطق:</strong> ${phoneme.place_of_articulation}</p>
                        <p><strong>طريقة النطق:</strong> ${phoneme.manner_of_articulation}</p>
                        <p><strong>التأثيرات الصوتية:</strong> ${phoneme.sound_effects}</p>
                        <p><strong>التعريف:</strong> ${phoneme.notes}</p>
                        <p><strong>التصنيف:</strong> ${phoneme.articulation_arabic_name}</p>
                    </div>
                `;
            }).join('');

            detailsContainer.html(phonemeHtml);
        })
        .catch(error => {
            detailsContainer.html('<p>حدث خطأ أثناء تحميل التفاصيل.</p>');
        });
});

// Helper function to get phoneme details for each letter
function getPhonemeDetailsForLetter(letter) {
    return new Promise((resolve, reject) => {
        // Send AJAX request to fetch the Arabic letter ID from the arabic_letters table
        $.ajax({
            url: '/get-arabic-letter-id',  // Endpoint to get the Arabic letter ID
            type: 'GET',
            data: { letter: letter },
            success: function(response) {
                console.log(response); // Log the response to confirm the structure
                if (response.error) {
                    reject('لم يتم العثور على تفاصيل الحرف');
                } else {
                    // Now, send another request to get the phoneme details using the Arabic letter ID
                    const letterId = response.letter_id;

                    $.ajax({
    url: '/get-phoneme-details',  // Endpoint to get phoneme details by letter ID
    type: 'GET',
    data: { letter_id: letterId },
    success: function(phonemeResponse) {
        console.log(phonemeResponse); // Log the response to confirm the structure

        if (phonemeResponse.error) {
            reject('لم يتم العثور على تفاصيل الحرف');
        } else {
            // Assuming phonemeResponse is an array or an object of phoneme details
            const firstLetter = phonemeResponse[0] || phonemeResponse;  // Retrieve the first element if it's an array

            // Now, check if the first letter exists and has the required properties
            const phoneme = firstLetter;

            resolve({
                letter: phoneme.letter || 'N/A',
                ipa: phoneme.ipa || 'N/A',
                type: phoneme.type || 'N/A',
                place_of_articulation: phoneme.place_of_articulation || 'N/A',
                manner_of_articulation: phoneme.manner_of_articulation || 'N/A',
                sound_effects: phoneme.sound_effects || 'N/A',
                notes: phoneme.notes || 'N/A',
                articulation_arabic_name: phoneme.articulation_arabic_name || 'N/A'
            });
        }
    },
    error: function() {
        reject('حدث خطأ أثناء تحميل التفاصيل');
    }
});


                }
            },
            error: function() {
                reject('حدث خطأ أثناء تحميل التفاصيل');
            }
        });
    });
}




// =========== ayah analysis button handling ===========




    </script>
</body>
</html>