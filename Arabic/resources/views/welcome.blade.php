
@extends('layout')

@section('title', 'الصفحة الرئيسية')
@section('header', 'موارد اللغة العربية')
@section('content')

    <div class="container">
        <div class="category">
            <div class="category-header" onclick="toggleCategory(this)">
                أساسيات اللغة العربية
            </div>
            <div class="subcategories">
                <div class="button-container">
                    <a href="{{ url('/arabic-letters') }}" class="button">الأحرف العربية</a>
                    <a href="{{ url('/arabic-diacritics') }}" class="button">الحركات</a>
                </div>
            </div>
        </div>

        <div class="category">
            <div class="category-header" onclick="toggleCategory(this)">
                القران الكريم والتجويد
            </div>
            <div class="subcategories">
                <div class="button-container">
                    <a href="{{ url('/refuge-basmala') }}" class="button">الاستعاذة والبسملة</a>
                    <a href="{{ url('/tajweed-concept') }}" class="button">مفهوم التجويد</a>
                    <a href="{{ url('/tajweedcategories') }}" class="button">أحكام التجويد كاملة</a>
                    <a href="{{ url('/tajweeds') }}" class="button">أحرف التجويد</a>
                    <a href="{{ url('/ayah') }}" class="button">احكام التجويد في الاية</a>
                    <a href="{{ url('/quran') }}" class="button">البحث في المصحف</a>
                </div>
            </div>
        </div>
        <div class="category">
            <div class="category-header" onclick="toggleCategory(this)">
                 الصوتيات
            </div>
            <div class="subcategories">
                <div class="button-container">
                    <a href="{{ url('/phonemes-menu') }}" class="button">الصوتيات</a>
                </div>
            </div>
        </div>

        <div class="category">
            <div class="category-header" onclick="toggleCategory(this)">
                تركيب الكلمات
            </div>
            <div class="subcategories">
                <div class="button-container">
                    <a href="{{ url('/three-letter-combinations') }}" class="button">الكلمات الثلاثية</a>
                    <a href="{{ url('/four-letter-combinations') }}" class="button">الكلمات الرباعية</a>
                    <a href="{{ url('/pronouns') }}" class="button">الضمائر</a>
                </div>
            </div>
        </div>

        <div class="category">
            <div class="category-header" onclick="toggleCategory(this)">
                الجذور
            </div>
            <div class="subcategories">
                <div class="button-container">
                    <a href="{{ url('/root-words') }}" class="button">الجذور الثلاثية د. حسين</a>
                    <a href="{{ url('/roots') }}" class="button">الجذور الثلاثة 2 - د حسين</a>
                </div>
            </div>
        </div>

        <div class="category">
            <div class="category-header" onclick="toggleCategory(this)">
                السوابق واللواحق
            </div>
            <div class="subcategories">
                <div class="button-container">
                    <a href="{{ url('/prefixes-suffixes') }}" class="button">السوابق واللواحق</a>
                    <a href="{{ url('/root-words-view2') }}" class="button">الجذور الثلاثية مع سوابقها ولواحقها</a>
                    <a href="{{ url('/words') }}" class="button">الجذور الثلاثية مع سوابقها ولواحقها 2</a>
                    <a href="{{ url('/verb-suffix') }}" class="button">اضافة الفعل إلى الضمائر</a>
                </div>
            </div>
        </div>

        <div class="category">
            <div class="category-header" onclick="toggleCategory(this)">
                إدارة المحتوى
            </div>
            <div class="subcategories">
                <div class="button-container">
                    <a href="/phonemecategories" class="button">إضافة مخرج حروف رئيسي</a>
                    <a href="/upload" class="button">إضافة صورة مخرج</a>
                </div>
            </div>
        </div>
    </div>

 

    <script>
        function toggleCategory(element) {
            const category = element.parentElement;
            const subcategories = element.nextElementSibling;
            const isOpen = category.classList.contains('active');
            
            // Close all categories
            document.querySelectorAll('.category').forEach(cat => {
                cat.classList.remove('active');
                cat.querySelector('.subcategories').style.maxHeight = null;
            });

            // Open clicked category if it wasn't open
            if (!isOpen) {
                category.classList.add('active');
                subcategories.style.maxHeight = subcategories.scrollHeight + "px";
            }
        }

        // Open first category by default
        document.addEventListener('DOMContentLoaded', function() {
            const firstCategory = document.querySelector('.category');
            if (firstCategory) {
                const header = firstCategory.querySelector('.category-header');
                toggleCategory(header);
            }
        });
    </script>

@endsection

