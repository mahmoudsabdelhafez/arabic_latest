<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Places of Articulation</title>
    <style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        background-color: #f7f7f7;
        color: #333;
        text-align: center;
    }

    h1 {
        background-color: #4CAF50;
        color: white;
        padding: 20px;
        margin: 0;
        text-align: center;
    }

    .container {
        display: flex;
        flex-direction: row;
        justify-content: space-between;
        max-width: 70%;
        margin: 30px auto;
        background: #fff;
        border-radius: 12px;
        box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
        overflow: hidden;
    }

    #imageContainer {
        flex: 6;
        position: relative;
        height: 700px;
        display: flex;
        align-items: center;
        justify-content: center;
        overflow: hidden;
    }

    .layer {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 80%;
        height: auto;
        max-height: 100%;
        filter: grayscale(100%) brightness(0.8);
        transition: all 0.4s ease;
        opacity: 0.7;
    }

    .layer.visible {
        filter: none;
        opacity: 1;
    }

    .first {
        flex: 4;
    }

    ul {
        list-style-type: none;
        margin: 0;
        padding: 20px;
        background: #fafafa;
    }

    li div {
        display: flex;
        justify-content: space-between;
        padding: 15px;
        margin: 10px 0;
        border: 1px solid #ddd;
        border-radius: 8px;
        background: #fff;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        transition: all 0.3s ease;
    }

    li div:hover {
        background-color: #e8f5e9;
        transform: translateY(-3px);
    }

    li div.active {
        background-color: #e8f5e9;
        border-color: #4CAF50;
        box-shadow: 0 4px 8px rgba(76, 175, 80, 0.2);
    }

    a {
        text-decoration: none;
        color: #333;
        font-weight: bold;
        display: block;
        transition: color 0.3s ease;
    }

    a:hover {
        color: #4CAF50;
    }

    .layer-btn,
    .reset-btn {
        padding: 12px 24px;
        font-size: 14px;
        margin: 10px;
        cursor: pointer;
        background-color: #4CAF50;
        color: white;
        border: none;
        border-radius: 5px;
        transition: all 0.3s ease;
        font-weight: bold;
    }

    .layer-btn:hover,
    .reset-btn:hover {
        background-color: #45a049;
        transform: translateY(-2px);
    }

    .layer-btn.active {
        background-color: #2E7D32;
    }
    </style>
</head>

<body>
    <h1>Places of Articulation</h1>

    <div class="container">
        <div id="imageContainer">
            @foreach ($images as $index => $image)
            <img class="layer" data-id="{{ $image->phonemeCategory->id }}" src="{{ asset($image->path) }}"
                alt="Layer {{ $image->phonemeCategory->id }}" loading="lazy" style="z-index: {{ $index + 1 }};">
            @endforeach
        </div>

        <div class="first">
            <button class="layer-btn" id="toggleButton" onclick="toggleView()">المخارج الرئيسية</button>

            <ul id="placesList">
                @foreach ($places as $place)
                <li>
                    <div dir="rtl" class="place-item" data-category-id="{{ $place->phoneme_category_id }}">
                        <a href="#" class="toggle-link" data-category-id="{{ $place->phoneme_category_id }}">
                            مخرج الصوت في الشكل المجاور
                        </a>
                        <a href="{{ route('phonemes.showByPlace', $place->place_of_articulation) }}">
                            {{ $place->place_of_articulation }}
                        </a>
                    </div>
                </li>
                @endforeach
            </ul>

            <ul id="categoriesList" style="display: none;">
                @foreach ($categories as $category)
                <li>
                    <div class="category-item" data-category-id="{{ $category->id }}">
                        <a href="#" class="toggle-link" data-category-id="{{ $category->id }}">
                            {{ $category->name }}
                        </a>
                    </div>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
    <script>
document.addEventListener('DOMContentLoaded', function() {
    // Store references to commonly used elements
    const categoriesList = document.getElementById('categoriesList');
    const placesList = document.getElementById('placesList');
    
    // Track active elements
    let activeCategory = null;
    let activePlacesList = null;
    
    // Hide places list by default
    placesList.style.display = 'none';
    
    // Handle all category link clicks
    document.querySelectorAll('.category-link').forEach(link => {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            const categoryId = this.dataset.categoryId;
            
            // Hide the previous active places list
            if (activePlacesList) {
                activePlacesList.style.display = 'none';
            }
            
            // Find the places list associated with the categoryId
            const newPlacesList = document.querySelector(`.places[data-category-id="${categoryId}"]`);
            
            // Toggle active state
            if (activeCategory !== this) {
                if (activeCategory) {
                    activeCategory.classList.remove('active');
                }
                this.classList.add('active');
                activeCategory = this;
                
                // Show the new places list
                if (newPlacesList) {
                    newPlacesList.style.display = 'block';
                    activePlacesList = newPlacesList;
                }
            } else {
                this.classList.remove('active');
                activeCategory = null;
                activePlacesList = null;
            }
        });
    });
});
</script>
    <!-- <script>
    document.addEventListener('DOMContentLoaded', function() {
        // Store references to commonly used elements
        const toggleButton = document.getElementById('toggleButton');
        const placesList = document.getElementById('placesList');
        const categoriesList = document.getElementById('categoriesList');
        
        // Track active elements
        let activeItem = null;
        
        // Handle all toggle link clicks
        document.querySelectorAll('.toggle-link').forEach(link => {
            link.addEventListener('click', function(e) {
                e.preventDefault();
                const categoryId = this.dataset.categoryId;
                
                // Remove active class from previous item
                if (activeItem) {
                    activeItem.classList.remove('active');
                }
                
                // Find the parent div of the clicked link
                const parentDiv = this.closest('div');
                
                // Toggle active state
                if (activeItem !== parentDiv) {
                    parentDiv.classList.add('active');
                    activeItem = parentDiv;
                    showLayer(categoryId);
                } else {
                    activeItem = null;
                    hideAllLayers();
                }
            });
        });

        function showLayer(categoryId) {
            // Hide all layers first
            hideAllLayers();
            
            // Show the selected layer
            const layers = document.querySelectorAll(`.layer[data-id='${categoryId}']`);
            layers.forEach(layer => layer.classList.add('visible'));
        }

        function hideAllLayers() {
            document.querySelectorAll('.layer').forEach(layer => {
                layer.classList.remove('visible');
            });
        }

        // Toggle between views
        toggleButton.addEventListener('click', function() {
            const isShowingPlaces = placesList.style.display !== 'none';
            
            // Update button text
            this.textContent = isShowingPlaces ? 'مخارج الحروف' : 'المخارج الرئيسية';
            
            // Toggle lists
            placesList.style.display = isShowingPlaces ? 'none' : 'block';
            categoriesList.style.display = isShowingPlaces ? 'block' : 'none';
            
            // Reset active states
            if (activeItem) {
                activeItem.classList.remove('active');
                activeItem = null;
            }
            hideAllLayers();
        });
    });
    </script> -->
</body>
</html>