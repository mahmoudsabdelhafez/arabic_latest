<!-- resources/views/quran/analysis.blade.php -->
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تحليل البحث في القرآن الكريم</title>
    <link href="https://fonts.googleapis.com/css2?family=Amiri:wght@400;700&family=Aref+Ruqaa:wght@400;700&display=swap" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <style>
        /* Add your styles here */
        /* Same as previous styles for consistency */
    </style>
</head>
<body>
    <header>
        <h1>تحليل نتائج البحث في القرآن الكريم</h1>
    </header>

    <div class="container">
        <ul id="results"></ul>
        <div id="pagination"></div>
    </div>

    <footer class="footer">
        <p>© جميع الحقوق محفوظة للقرآن الكريم</p>
    </footer>

    <script>
        let query = '{{ $query }}'; // Query passed from the controller
        let currentPage = 1;

        function fetchAnalyzedResults(query, page = 1) {
            $('#loader').show();
            $('#results, #pagination').empty();

            $.ajax({
                url: '/analyze-search',
                type: 'GET',
                data: { query: query, page: page },
                success: function(response) {
                    $('#loader').hide();
                    console.log(response.data);

                    if (response.data.length === 0) {
                        $('#results').html('<div class="no-results">لا توجد نتائج</div>');
                        return;
                    }
                    response.data.forEach(aya => {
                        const highlightedText = highlightText(aya.text, query);
                        $('#results').append(`
                            <li>
                                <div class="sura-name">${aya.sura_name}</div>
                                <span class="aya-number">آية ${aya.aya}</span>
                                <div class="aya-text">${highlightedText}</div>
                            </li>
                        `);
                    });

                    // Pagination Controls
                    const paginationHtml = [];
                    
                    if (response.prev_page_url) {
                        paginationHtml.push(`
                            <button class="pagination-btn" 
                                onclick="fetchAnalyzedResults('${query}', ${response.current_page - 1})">
                                السابق
                            </button>
                        `);
                    }

                    if (response.next_page_url) {
                        paginationHtml.push(`
                            <button class="pagination-btn" 
                                onclick="fetchAnalyzedResults('${query}', ${response.current_page + 1})">
                                التالي
                            </button>
                        `);
                    }

                    $('#pagination').html(paginationHtml.join(''));
                },
                error: function() {
                    $('#loader').hide();
                    $('#results').html('<div class="no-results">حدث خطأ في البحث</div>');
                }
            });
        }

        $(document).ready(function() {
            fetchAnalyzedResults(query);
        });
    </script>
</body>
</html>
