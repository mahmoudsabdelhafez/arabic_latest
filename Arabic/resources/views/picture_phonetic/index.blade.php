<!DOCTYPE html>
<html lang="en" dir="auto">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تحكم بطبقات الصور</title>
    <style>
        /* تحسينات عامة */
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            text-align: center;
            margin: 20px;
            background-color: #f5f5f5;
            color: #333;
        }

        /* تحسين تصميم الحاوية */
        .container {
            position: relative;
            display: inline-block;
            width: 400px;
            height: 400px;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            margin: 20px auto;
        }

        /* تحسينات طبقات الصور */
        .layer {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            filter: grayscale(100%) brightness(0.8);
            transition: all 0.4s ease;
            opacity: 0.7;
            object-fit: cover;
        }

        .layer.visible {
            filter: none;
            opacity: 1;
        }

        /* تحسين أزرار التحكم */
        .controls {
            margin: 20px 0;
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 10px;
        }

        .controls button {
            padding: 12px 24px;
            font-size: 16px;
            cursor: pointer;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .controls button:hover {
            background-color: #45a049;
        }

        .controls button.active {
            background-color: #2E7D32;
        }

        /* تحسين عرض الصور المرفوعة */
        .uploaded-images {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(120px, 1fr));
            gap: 15px;
            padding: 20px;
            max-width: 800px;
            margin: 0 auto;
        }

        .uploaded-images img {
            width: 100%;
            height: 120px;
            object-fit: cover;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s;
        }

        .uploaded-images img:hover {
            transform: scale(1.05);
        }

        /* إضافة تأثيرات التحميل */
        .loading {
            position: relative;
        }

        .loading::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
            animation: loading 1.5s infinite;
        }

        @keyframes loading {
            0% { transform: translateX(-100%); }
            100% { transform: translateX(100%); }
        }
    </style>
</head>
<body>
    <h1>تحكم بطبقات الصور</h1>
    
    <div class="container" id="imageContainer">
        @foreach ($images as $index => $image)
            <img 
                id="layer{{ $index + 1 }}"
                class="layer"
                src="{{ asset($image->path) }}"
                alt="طبقة {{ $index + 1 }}"
                style="z-index: {{ $index + 1 }}"
                loading="lazy">
        @endforeach
    </div>

    <div class="controls">
        @foreach ($images as $index => $image)
            <button 
                id="btn{{ $index + 1 }}"
                onclick="toggleLayer({{ $index + 1 }})"
                class="layer-btn">
                طبقة {{ $index + 1 }}
            </button>
        @endforeach
        <button onclick="resetLayers()" class="reset-btn">إعادة تعيين</button>
    </div>

    <h2>الصور المرفوعة</h2>
    <div class="uploaded-images">
        @foreach ($images as $image)
            <img 
                src="{{ asset($image->path) }}"
                alt="{{ $image->name }}"
                loading="lazy"
                onclick="showFullSize(this.src)">
        @endforeach
    </div>

    <script>
        // تحسين وظيفة التبديل
        function toggleLayer(layerNumber) {
            const layer = document.getElementById(`layer${layerNumber}`);
            const button = document.getElementById(`btn${layerNumber}`);
            
            if (layer && button) {
                layer.classList.toggle('visible');
                button.classList.toggle('active');
            }
        }

        // إضافة وظيفة إعادة التعيين
        function resetLayers() {
            const layers = document.querySelectorAll('.layer');
            const buttons = document.querySelectorAll('.layer-btn');
            
            layers.forEach(layer => layer.classList.remove('visible'));
            buttons.forEach(button => button.classList.remove('active'));
        }

        // إضافة وظيفة عرض الصورة بالحجم الكامل
        function showFullSize(src) {
            const modal = document.createElement('div');
            modal.style.cssText = `
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background: rgba(0,0,0,0.9);
                display: flex;
                justify-content: center;
                align-items: center;
                z-index: 1000;
                cursor: pointer;
            `;

            const img = document.createElement('img');
            img.src = src;
            img.style.cssText = `
                max-width: 90%;
                max-height: 90%;
                object-fit: contain;
            `;

            modal.appendChild(img);
            document.body.appendChild(modal);

            modal.onclick = () => modal.remove();
        }

        // إضافة معالجة الأخطاء للصور
        document.querySelectorAll('img').forEach(img => {
            img.onerror = function() {
                this.src = 'path/to/fallback-image.jpg';
                this.alt = 'صورة غير متوفرة';
            };
        });
    </script>
</body>
</html>