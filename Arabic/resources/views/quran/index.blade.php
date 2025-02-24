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
            --sidebar-width: 300px;
            --sidebar-bg: #f8f9fa;
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
            line-height: 1.8;
        }

        /* Layout Structure */
        .page-wrapper {
            display: flex;
            min-height: 100vh;
            flex-direction: column;
        }

        .content-wrapper {
            display: flex;
            flex: 1;
            position: relative;
        }

        .main-content {
            flex: 1;
            margin-right: var(--sidebar-width);
            padding: 2rem;
            width: calc(100% - var(--sidebar-width));
        }

        /* Sidebar Styles */
        .sidebar {
            width: var(--sidebar-width);
            background: var(--sidebar-bg);
            position: fixed;
            right: 0;
            top: 0;
            height: 100vh;
            border-left: 1px solid rgba(0,0,0,0.1);
            padding: 20px;
            overflow-y: auto;
            box-shadow: -2px 0 10px rgba(0,0,0,0.05);
        }

        .analysis-options {
            background: var(--white);
            border-radius: 15px;
            padding: 25px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.05);
            margin-top: 80px; /* Space for header */
        }

        /* Header Styles */
        header {
            background: linear-gradient(45deg, var(--gradient-start), var(--gradient-end));
            padding: 2rem;
            position: relative;
            overflow: hidden;
            box-shadow: 0 4px 12px rgba(0,0,0,0.15);
            z-index: 10;
        }

        header h1 {
            color: var(--white);
            font-size: 2.5rem;
            text-align: center;
            font-family: 'Aref Ruqaa', serif;
            margin-right: var(--sidebar-width);
            position: relative;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.2);
        }

        /* Search Container Styles */
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
        }

        /* Analysis Button Styles */
        #analysis-btn {
            padding: 12px 30px;
            background: linear-gradient(45deg, var(--gradient-start), var(--gradient-end));
            color: var(--white);
            font-family:  serif;
            font-size: 1.2rem;
            border: none;
            border-radius: 12px;
            cursor: pointer;
            margin: 20px 0;
            transition: all 0.3s ease;
        }

        #analysis-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(0,0,0,0.15);
        }

        /* Toggle Buttons Styles */
        .toggle-buttons {
            display: flex;
            gap: 10px;
            margin: 20px 0;
        }

        .toggle-btn {
            padding: 10px 20px;
            border: none;
            background-color: var(--white);
            cursor: pointer;
            border-radius: 8px;
            font-family: 'Amiri', serif;
            transition: all 0.3s ease;
            flex: 1;
        }

        .toggle-btn.active {
            background: var(--primary-color);
            color: var(--white);
            box-shadow: 0 4px 10px rgba(35, 75, 110, 0.2);
        }

        /* Checkbox Styles */
        .checkbox-group {
            display: flex;
            align-items: center;
            gap: 12px;
            flex-direction: row-reverse;
            justify-content: flex-end;
            padding: 12px 0;
            transition: all 0.3s ease;
        }

        .checkbox-group:hover {
            background: rgba(35, 75, 110, 0.05);
            border-radius: 8px;
            padding-right: 8px;
        }

        .custom-checkbox {
            appearance: none;
            width: 22px;
            height: 22px;
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

        /* Results Styles */
        #results {
            list-style: none;
        }

        #results li {
            background: var(--white);
            margin-bottom: 15px;
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
            transition: transform 0.3s ease;
        }

        #results li:hover {
            transform: translateY(-3px);
        }

        /* Responsive Design */
        @media (max-width: 1024px) {
            :root {
                --sidebar-width: 250px;
            }
        }

        @media (max-width: 768px) {
            .content-wrapper {
                flex-direction: column;
            }

            .main-content {
                margin-right: 0;
                width: 100%;
                padding: 1rem;
            }

            .sidebar {
                position: relative;
                width: 100%;
                height: auto;
                margin-top: 0;
            }

            header h1 {
                margin-right: 0;
                font-size: 2rem;
            }

            .analysis-options {
                margin-top: 0;
            }
        }


        /* Results Container */
#results {
    display: flex;
    flex-direction: column;
    gap: 20px;
    padding: 10px 0;
}

/* Individual Result Item */
#results li {
    background: linear-gradient(to right, rgba(255, 255, 255, 0.95), rgba(255, 255, 255, 0.98));
    border-radius: 15px;
    padding: 25px;
    box-shadow: 0 4px 20px rgba(35, 75, 110, 0.08);
    border: 1px solid rgba(35, 75, 110, 0.1);
    transition: all 0.3s ease;
    position: relative;
    overflow: hidden;
}

#results li:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 30px rgba(35, 75, 110, 0.12);
}

/* Sura Name Styling */
.sura-name {
    color: var(--primary-color);
    font-family: 'Aref Ruqaa', serif;
    font-size: 1.4rem;
    margin-bottom: 10px;
    display: flex;
    align-items: center;
    gap: 10px;
}

.sura-name::before {
    content: '◈';
    color: var(--accent-color);
    font-size: 1.2rem;
}

/* Aya Number */
.aya-number {
    background: var(--primary-color);
    color: white;
    padding: 4px 12px;
    border-radius: 20px;
    font-size: 0.9rem;
    display: inline-block;
    margin-bottom: 15px;
    box-shadow: 0 2px 8px rgba(35, 75, 110, 0.2);
}

/* Aya Text */
.aya-text {
    font-size: 1.25rem;
    line-height: 2.2;
    padding: 15px;
    background: rgba(255, 255, 255, 0.7);
    border-radius: 12px;
    border-right: 4px solid var(--secondary-color);
    margin: 15px 0;
}

/* Highlighted Text */
.highlight {
    background: linear-gradient(120deg, rgba(193, 123, 63, 0.2) 0%, rgba(193, 123, 63, 0.1) 100%);
    color: var(--accent-color);
    padding: 2px 5px;
    border-radius: 4px;
    font-weight: bold;
}

.pagination-btn {
    background: var(--secondary-color);
    color: white;
    padding: 8px 20px;
    border: none;
    border-radius: 8px;
    cursor: pointer;
    font-family: 'Amiri', serif;
    font-size: 1rem;
    margin-top: 10px;
    transition: all 0.3s ease;
}

.pagination-btn:hover {
    background: var(--primary-color);
    transform: translateY(-2px);
}


/* Analysis Button */
.ayah-analysis-btn {
    background: linear-gradient(45deg, var(--primary-color), var(--secondary-color));
    color: white;
    padding: 10px 25px;
    border: none;
    border-radius: 10px;
    cursor: pointer;
    font-family:  serif;
    font-size: 1.1rem;
    transition: all 0.3s ease;
    margin-top: 15px;
    box-shadow: 0 4px 15px rgba(35, 75, 110, 0.15);
}

.ayah-analysis-btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 20px rgba(35, 75, 110, 0.2);
}

/* Analysis Results */
.analysis-result {
    margin-top: 20px;
    padding: 20px;
    background: rgba(248, 249, 250, 0.9);
    border-radius: 12px;
    display: none;
}

.analysis-result > div {
    border-right: 4px solid var(--primary-color);
    margin-bottom: 20px;
    padding: 15px;
    background: white;
    border-radius: 0 10px 10px 0;
    transition: all 0.3s ease;
}

.analysis-result > div:hover {
    transform: translateX(-5px);
    box-shadow: 0 4px 15px rgba(35, 75, 110, 0.1);
}

.analysis-result h4 {
    color: var(--primary-color);
    font-family:  serif;
    font-size: 1.2rem;
    margin-bottom: 15px;
    display: flex;
    align-items: center;
    gap: 10px;
}

/* Phoneme Details Button */
.phoneme-details-btn {
    background: var(--secondary-color);
    color: white;
    padding: 8px 20px;
    border: none;
    border-radius: 8px;
    cursor: pointer;
    font-family: 'Amiri', serif;
    font-size: 1rem;
    margin-top: 10px;
    transition: all 0.3s ease;
}

.phoneme-details-btn:hover {
    background: var(--primary-color);
    transform: translateY(-2px);
}

/* Phoneme Details Container */
.phoneme-details-container {
    margin-top: 15px;
    padding: 15px;
    background: rgba(255, 255, 255, 0.8);
    border-radius: 10px;
    display: none;
}

.phoneme-details-container > div {
    padding: 15px;
    border-bottom: 1px solid rgba(35, 75, 110, 0.1);
}

.phoneme-details-container > div:last-child {
    border-bottom: none;
}

.phoneme-details-container h5 {
    color: var(--primary-color);
    font-size: 1.1rem;
    margin-bottom: 10px;
}

/* Responsive Design */
@media (max-width: 768px) {
    #results li {
        padding: 15px;
    }

    .sura-name {
        font-size: 1.2rem;
    }

    .aya-text {
        font-size: 1.1rem;
        padding: 10px;
        line-height: 2;
    }

    .analysis-result {
        padding: 15px;
    }

    .analysis-result > div {
        padding: 10px;
    }
}

/* No Results Message */
.no-results {
    text-align: center;
    padding: 40px;
    color: var(--text-color);
    font-size: 1.2rem;
    background: white;
    border-radius: 15px;
    box-shadow: 0 4px 15px rgba(35, 75, 110, 0.1);
}

/* Loading Animation */
.loader {
    display: none;
    margin: 20px auto;
    width: 50px;
    height: 50px;
    border: 3px solid rgba(35, 75, 110, 0.1);
    border-radius: 50%;
    border-top-color: var(--primary-color);
    animation: spin 1s linear infinite;
}

@keyframes spin {
    to { transform: rotate(360deg); }
}

/* Mobile styles */
@media screen and (max-width: 768px) {
    .analysis-options-title {
        padding: 12px;
        background: var(--primary-color);
        color: white;
        border-radius: 8px;
        cursor: pointer;
        position: relative;
        margin-bottom: 0;
    }

    .analysis-options-title::after {
        content: '▼';
        position: absolute;
        left: 12px;
        transition: transform 0.3s ease;
    }

    .analysis-options.active .analysis-options-title::after {
        transform: rotate(180deg);
    }

    .checkbox-container {
        display: none;
        background: white;
        border: 1px solid #eee;
        border-radius: 8px;
        margin-top: 8px;
        padding: 8px 0;
        box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    }

    .analysis-options.active .checkbox-container {
        display: block;
    }

    .checkbox-group {
        padding: 12px 16px;
    }

    .checkbox-group:not(:last-child) {
        border-bottom: 1px solid #eee;
    }
}
    </style>
</head>
<body>
    <div class="page-wrapper">
        <header>
            <h1>البحث في القرآن الكريم</h1>
        </header>

        <div class="content-wrapper">

        <aside class="sidebar">
    <div class="analysis-options">
        <h3 class="analysis-options-title">خيارات التحليل</h3>
        <div class="checkbox-container">
            <div class="checkbox-group" id="select-all-group">
                <label for="select-all">جميع الأدوات</label>
                <input type="checkbox" id="select-all" class="custom-checkbox">
            </div>
            
            @foreach ($categories as $category)
                <div class="checkbox-group">
                    <label for="category-{{ $category->id }}">{{ $category->arabic_name }}</label>
                    <input type="checkbox" id="category-{{ $category->id }}" class="custom-checkbox category-checkbox" data-category-id="{{ $category->id }}">
                </div>
            @endforeach
        </div>
    </div>
</aside>


            <main class="main-content">
                <div class="search-container">
                    <input type="text" id="search" placeholder="ابحث عن كلمة أو آية..." autocomplete="off">
                </div>

                <button id="analysis-btn">تحليل</button>
                <div id="analysis-text-container" class="analysis-text-container"></div>

                <div class="toggle-buttons">
                    <button id="quran-btn" class="toggle-btn active">عرض الايات مع تشكيل</button>
                    <button id="quran-text-clean-btn" class="toggle-btn">عرض الايات بدون تشكيل</button>
                </div>

                <div class="loader" id="loader"></div>
                <div id="result-count"></div> <!-- This will display the number of results -->
                <div id="ayah-analyze-results"></div>
                <ul id="results"></ul>
                <div id="pagination"></div>

            </main>

        
        </div>
    </div>
    <!------------------------------------- check boxes --------------------------------------------->
    
    
   
    
    
    
    
    <ul id="results"></ul>
    <div id="pagination"></div>
</div>

<footer class="footer">
    <p>© جميع الحقوق محفوظة للقرآن الكريم</p>
</footer>
</body>
</html>

    <script>


document.addEventListener('DOMContentLoaded', function() {
    const analysisOptions = document.querySelector('.analysis-options');
    const title = document.querySelector('.analysis-options-title');

    // Only add click handler on mobile devices
    if (window.innerWidth <= 768) {
        title.addEventListener('click', function() {
            analysisOptions.classList.toggle('active');
        });
    }
});




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
                    <button id="prev-page"  data-page="${response.current_page - 1}" class="pagination-btn">
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
    // const arabicText = matchedWords.replace(/[^ء-ي]/g, ''); // Only Arabic letters
    const letters = matchedWords.split(''); // Split the matched words into letters

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