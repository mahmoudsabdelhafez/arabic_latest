<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Places of Articulation</title>
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
            font-family: 'Amiri', Arial, sans-serif;
            background: linear-gradient(135deg, #f5f7fa 0%, #e4e9f2 100%);
            color: var(--text-color);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        h1 {
            background: var(--primary-color);
            color: var(--white);
            padding: 2rem;
            margin: 0;
            font-family: 'Aref Ruqaa', serif;
            text-align: center;
            font-size: 2.5rem;
            position: relative;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.2);
        }

        h1::before {
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

        .container {
            display: flex;
            flex-direction: row;
            justify-content: space-between;
            margin: 3rem auto;
            background: var(--white);
            border-radius: 12px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            width: 90%;
        }

        #imageContainer {
            flex: 6;
            position: relative;
            height: 700px;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            background: linear-gradient(135deg, #f5f7fa 0%, #e4e9f2 100%);
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
            flex: 3;
            background: var(--white);
        }
        .sec {
            flex: 3;
            background: var(--white);
        }

        ul {
            list-style-type: none;
            margin: 0;
            padding: 20px;
        }

        li div {
            display: flex;
            justify-content: space-between;
            padding: 15px;
            margin: 10px 0;
            border: 1px solid #ddd;
            border-radius: 8px;
            background: var(--white);
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }

        li div:hover {
            background-color: var(--accent-color);
            transform: translateY(-3px);
        }

        li div.active {
            background-color: var(--secondary-color);
            border-color: var(--primary-color);
            box-shadow: 0 4px 8px rgba(26, 95, 122, 0.2);
        }

        li p {
            margin: 8px 0;
        }
        
        a {
            text-decoration: none;
            color: var(--text-color);
            font-weight: bold;
            display: block;
            transition: color 0.3s ease;
        }

        a:hover {
            color: var(--primary-color);
        }

        .layer-btn {
            padding: 12px 24px;
            font-size: 14px;
            margin: 10px;
            cursor: pointer;
            background-color: var(--primary-color);
            color: var(--white);
            border: none;
            border-radius: 5px;
            transition: all 0.3s ease;
            font-weight: bold;
        }

        .layer-btn:hover {
            background-color: #156485;
            transform: translateY(-2px);
        }

        .sub-places {
            display: none;
            margin-top: 10px;
            padding-left: 20px;
            border-left: 2px solid var(--secondary-color);
        }

        .sub-places li {
            margin: 5px 0;
        }

        .details {
            display: inline-block;
            background: linear-gradient(135deg, #f5f7fa 0%, #e4e9f2 100%);
            margin-top: 12px;
            padding: 15px;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            font-size: 18px;
            transition: transform 0.2s, background-color 0.2s;
            cursor: pointer;
            width: 100%;
            text-align: left;
        }

        @media (max-width: 1024px) {
            .container {
                width: 95%;
            }
        }

        @media (max-width: 768px) {
            .container {
                flex-direction: column;
                width: 100%;
            }

            #imageContainer {
                height: 400px;
            }

            h1 {
                font-size: 2rem;
            }
        }

        @media (prefers-reduced-motion: reduce) {
            .layer, li div, .layer-btn {
                transition: none;
            }
        }
    </style>
</head>
<body>
    <h1>Places of Articulation</h1>

    <div class="container">
    <div class="sec" id="dataContainer">
            
            </div>
        <div id="imageContainer">
            @foreach ($images as $index => $image)
            <img class="layer" data-id="{{ $image->phonemeCategory->id }}" src="{{ asset($image->path) }}"
                alt="Layer {{ $image->phonemeCategory->id }}" loading="lazy" style="z-index: {{ $index + 1 }};">
            @endforeach
        </div>

        <div class="first">
            <ul id="categoriesList">
                @foreach ($categories as $category)
                <li>
                    <div class="category-item" data-category-id="{{ $category->id }}">
                        <a href="#" class="toggle-category toggle-link" data-category-id="{{ $category->id }}">
                            {{ $category->name }}
                        </a>
                    </div>
                    <ul class="sub-places" data-category-id="{{ $category->id }}">
                        @foreach ($places as $place)
                        @if ($place->phoneme_category_id == $category->id)
                        <li>
                            <div dir="rtl" class="place-item" data-category-id="{{ $place->phoneme_category_id }}">
                                <a href="#" class="show-details" data-url="{{ route('phonemes.showByPlace', $place->place_of_articulation) }}">
                                    إظهار التفاصبل
                                </a>
                                <a href="#" class="show-details" data-url="{{ route('phonemes.showByPlace', $place->place_of_articulation) }}">
                                                {{ $place->place_of_articulation }}
                                            </a>
                            </div>
                        </li>
                        @endif
                        @endforeach
                    </ul>
                </li>
                @endforeach
            </ul>
        </div>
        
    </div>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const categoryLinks = document.querySelectorAll('.toggle-category');
        const subPlaceLists = document.querySelectorAll('.sub-places');
        let activeCategory = null;

        categoryLinks.forEach(link => {
            link.addEventListener('click', function(e) {
                e.preventDefault();
                const categoryId = this.dataset.categoryId;

                if (activeCategory && activeCategory !== categoryId) {
                    document.querySelector(`.sub-places[data-category-id='${activeCategory}']`).style.display = 'none';
                }

                const subPlaces = document.querySelector(`.sub-places[data-category-id='${categoryId}']`);

                if (subPlaces.style.display === 'block') {
                    subPlaces.style.display = 'none';
                    activeCategory = null;
                } else {
                    subPlaces.style.display = 'block';
                    activeCategory = categoryId;
                }
            });
        });

        document.querySelectorAll('.toggle-link').forEach(link => {
            link.addEventListener('click', function(e) {
                e.preventDefault();
                const categoryId = this.dataset.categoryId;
                const layers = document.querySelectorAll(`.layer[data-id='${categoryId}']`);

                document.querySelectorAll('.layer').forEach(layer => layer.classList.remove('visible'));
                layers.forEach(layer => layer.classList.add('visible'));
            });
        });
    });
    document.addEventListener('DOMContentLoaded', function () {
        

        document.querySelectorAll('.show-details').forEach(link => {
            link.addEventListener('click', function(e) {
                e.preventDefault();
                fetch(this.dataset.url)
                    .then(response => response.json())
                    .then(data => {
                        let container = document.querySelector('#dataContainer');
                        console.log(data);
                        container.innerHTML = '<ul>' + data.map(letter => `
                            <li class="details">
                            <p><strong>Letter:</strong> ${letter.arabic_letter?.letter || 'N/A'}</p>
                                <p><strong>IPA:</strong> ${letter.ipa}</p>
                                <p><strong>Type:</strong> ${letter.type}</p>
                                <p><strong>Manner of Articulation:</strong> ${letter.manner_of_articulation}</p>
                                <p><strong>Voicing:</strong> ${letter.voicing}</p>
                                <p><strong>Sound Effects:</strong> ${letter.sound_effects}</p>
                                <p><strong>Notes:</strong> ${letter.notes || 'N/A'}</p>
                            </li>
                        `).join('') + '</ul>';
                    })
                    .catch(error => console.error('Error fetching details:', error));
            });
        });
    });
    </script>
</body>
</html>