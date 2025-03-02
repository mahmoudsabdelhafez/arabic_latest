<!-- resources/views/pronouns/index.blade.php -->
@extends('layouts.pronoun')
@section('header', 'إدارة الضمائر')

@section('content')

<div class="main-content">
    <div class="section-header">
        <h2>قائمة الضمائر</h2>
        <button class="btn btn-edit" onclick="openAddModal()">إضافة ضمير جديد</button>
    </div>

    <!-- Filter Section -->
    <div class="filter-section">
        <h3 class="filter-title">تصفية النتائج</h3>
        <div class="filter-options">
            <button class="filter-category active" data-filter="all">الكل</button>
            <button class="filter-category" data-filter="type">نوع الضمير</button>
            <button class="filter-category" data-filter="person">الشخص</button>
            <button class="filter-category" data-filter="number">العدد</button>
            <button class="filter-category" data-filter="gender">الجنس</button>
            <button class="filter-category" data-filter="position">الموقع</button>
        </div>

        <input type="text" class="search-box" placeholder="ابحث عن ضمير...">

        <div class="filter-tags" style="display: none;">
            <div class="type-tags">
                <div class="filter-tag" data-type="attached">متصل</div>
                <div class="filter-tag" data-type="detached">منفصل</div>
                <div class="filter-tag" data-type="hidden">مستتر</div>
            </div>
            <div class="person-tags">
                <div class="filter-tag" data-person="first">متكلم</div>
                <div class="filter-tag" data-person="second">مخاطب</div>
                <div class="filter-tag" data-person="third">غائب</div>
            </div>
            <div class="number-tags">
                <div class="filter-tag" data-number="single">مفرد</div>
                <div class="filter-tag" data-number="dual">مثنى</div>
                <div class="filter-tag" data-number="plural">جمع</div>
            </div>
            <div class="gender-tags">
                <div class="filter-tag" data-gender="m">مذكر</div>
                <div class="filter-tag" data-gender="f">مؤنث</div>
                <div class="filter-tag" data-gender="both">للجنسين</div>
            </div>
            <div class="position-tags">
                <div class="filter-tag" data-position="start">بداية</div>
                <div class="filter-tag" data-position="middle">وسط</div>
                <div class="filter-tag" data-position="end">نهاية</div>
            </div>
        </div>

        <div class="active-filters">
            <span>المرشحات النشطة:</span>
        </div>
    </div>

    <!-- Pronouns List -->
    <div class="pronouns-list">
        @foreach($pronouns as $pronoun)
        <div class="content-card pronoun-card" data-definition="{{ $pronoun->definition }}"
            data-type="{{ $pronoun->type }}" data-person="{{ $pronoun->person }}" data-number="{{ $pronoun->number }}"
            data-gender="{{ $pronoun->gender }}" data-position="{{ $pronoun->position ?? '' }}">
            <div class="pronoun-header">
                <h3>{{ $pronoun->name }}</h3>
                <div class="pronoun-actions">
                    <button class="btn btn-edit" onclick="openEditModal({{ $pronoun->id }})">تعديل</button>
                    <button class="btn btn-delete" onclick="confirmDelete({{ $pronoun->id }})">حذف</button>
                </div>
            </div>

            <div class="pronoun-details">
                <p><strong>وصف الضمير:</strong>
                    {{ $pronoun->definition }}
                </p>
                <p><strong>نوع الضمير:</strong>
                    {{ $pronoun->type == 'attached' ? 'متصل' : ($pronoun->type == 'detached' ? 'منفصل' : 'مستتر') }}
                </p>
                <p><strong>الشخص:</strong>
                    {{ $pronoun->person == 'first' ? 'متكلم' : ($pronoun->person == 'second' ? 'مخاطب' : 'غائب') }}
                </p>
                <p><strong>العدد:</strong>
                    {{ $pronoun->number == 'single' ? 'مفرد' : ($pronoun->number == 'dual' ? 'مثنى' : 'جمع') }}
                </p>
                <p><strong>الجنس:</strong>
                    {{ $pronoun->gender == 'm' ? 'مذكر' : ($pronoun->gender == 'f' ? 'مؤنث' : 'للجنسين') }}
                </p>
                @if($pronoun->position)
                <p><strong>الموقع:</strong>
                    {{ $pronoun->position == 'start' ? 'بداية' : ($pronoun->position == 'middle' ? 'وسط' : 'نهاية') }}
                </p>
                @endif
                @if($pronoun->estimated_for_hidden)
                <p><strong>التقدير للمستتر:</strong> {{ $pronoun->estimated_for_hidden }}</p>
                @endif
            </div>

            @if($pronoun->parsing)
            <div class="effect-section">
                <h4 class="effect-title">الإعراب</h4>
                <div class="effect-content">
                    <div class="effect-item">{{ $pronoun->parsing->status }} : {{ $pronoun->parsing->rule }}</div>
                    <div class="effect-item"><span style="font-weight: 900;">مثال : </span>{{ $pronoun->parsing->example }}</div>
                </div>
            </div>
            @endif

            @if($pronoun->syntacticEffects)
            <div class="effect-section">
                <h4 class="effect-title">الأثر النحوي</h4>
                <div class="effect-content">
                    <div class="effect-item"><span style="font-weight: 900;">يطبق على : </span>{{ $pronoun->syntacticEffects->applied_on }}</div>
                    <div class="effect-item"><span style="font-weight: 900;">الحالة الناتجة : </span>{{ $pronoun->syntacticEffects->result_case }}</div>
                    <div class="effect-item"><span style="font-weight: 900;">شرط السياق : </span>{{ $pronoun->syntacticEffects->context_condition }}</div>
                    <div class="effect-item"><span style="font-weight: 900;">ترتيب الأولوية : </span>{{ $pronoun->syntacticEffects->priority_order }}</div>
                    <div class="effect-item"><span style="font-weight: 900;">ملاحظات : </span>{{ $pronoun->syntacticEffects->notes }}</div>
                </div>
            </div>
            @endif

            @if($pronoun->semanticLogicalEffects)
            <div class="effect-section">
                <h4 class="effect-title">الأثر الدلالي والمنطقي</h4>
                <div class="effect-content">
                    <div class="effect-item"><span style="font-weight: 900;">الشروط : </span>{{ $pronoun->semanticLogicalEffects->conditions }}</div>
                    <div class="effect-item"><span style="font-weight: 900;">الأدوار الدلالية : </span>{{ $pronoun->semanticLogicalEffects->semantic_roles }}</div>
                    <div class="effect-item"><span style="font-weight: 900;">نوع النسبة : </span>{{ $pronoun->semanticLogicalEffects->nisbah_type }}</div>
                    <div class="effect-item"><span style="font-weight: 900;">العلاقة النموذجية : </span>{{ $pronoun->semanticLogicalEffects->typical_relation }}</div>
                    <div class="effect-item"><span style="font-weight: 900;">ملاحظات : </span>{{ $pronoun->semanticLogicalEffects->notes }}</div>
                </div>
            </div>
            @endif
        </div>
        @endforeach
    </div>
</div>

<!-- Add/Edit Modal -->
<div id="pronounModal" class="modal">
    <div class="modal-content">
        <h2 class="modal-title" id="modalTitle">إضافة ضمير جديد</h2>

        <form id="pronounForm" method="POST" action="{{ route('pronouns.store') }}">
            @csrf
            <input type="hidden" id="pronounId" name="id">
            <input type="hidden" name="_method" id="formMethod" value="POST">

            <div class="form-section">
                <h3 class="form-section-title">المعلومات الأساسية</h3>
                <div class="form-grid">
                    <div class="form-group">
                        <label for="name">اسم الضمير</label>
                        <input type="text" id="name" name="name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="definition">وصف الضمير</label>
                        <input type="text" id="definition" name="definition" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="type">نوع الضمير</label>
                        <select id="type" name="type" class="form-control" required>
                            <option value="attached">متصل</option>
                            <option value="detached">منفصل</option>
                            <option value="hidden">مستتر</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="person">الشخص</label>
                        <select id="person" name="person" class="form-control" required>
                            <option value="first">متكلم</option>
                            <option value="second">مخاطب</option>
                            <option value="third">غائب</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="number">العدد</label>
                        <select id="number" name="number" class="form-control" required>
                            <option value="single">مفرد</option>
                            <option value="dual">مثنى</option>
                            <option value="plural">جمع</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="gender">الجنس</label>
                        <select id="gender" name="gender" class="form-control" required>
                            <option value="m">مذكر</option>
                            <option value="f">مؤنث</option>
                            <option value="both">للجنسين</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="position">الموقع</label>
                        <select id="position" name="position" class="form-control">
                            <option value="">غير محدد</option>
                            <option value="start">بداية</option>
                            <option value="middle">وسط</option>
                            <option value="end">نهاية</option>
                        </select>
                    </div>

                    <div class="form-group hidden-pronoun-field" style="display: none;">
                        <label for="estimated_for_hidden">التقدير للمستتر</label>
                        <input type="text" id="estimated_for_hidden" name="estimated_for_hidden" class="form-control">
                    </div>
                </div>
            </div>

            <div class="form-section">
                <h3 class="form-section-title">المعلومات النحوية والدلالية</h3>
                <div class="form-grid">
                    <!-- Parsing field with add new option -->
                    <div class="form-group">
                        <label for="parsing_id">الإعراب</label>
                        <select id="parsing_id" name="parsing_id" class="form-control"
                            onchange="handleFieldSelection('parsing')">
                            <option value="">غير محدد</option>
                            <option value="add_new">إضافة إعراب جديد +</option>
                            @foreach($parsings as $parsing)
                            <option value="{{ $parsing->id }}">{{ $parsing->status }}</option>
                            @endforeach
                        </select>

                        <div id="parsing_add_container"
                            style="display: none;"
                            class="mt-2">
                            <input type="text" id="new_parsing_status" name="new_parsing_status"
                                class="form-control mb-2" placeholder="الحالة الإعرابية"
                                value="">
                            <textarea id="new_parsing_rule" name="new_parsing_rule" class="form-control mb-2"
                                placeholder="القاعدة النحوية"></textarea>
                            <textarea id="new_parsing_example" name="new_parsing_example" class="form-control"
                                placeholder="مثال توضيحي"></textarea>
                        </div>
                    </div>

                    <!-- Syntactic effects field (simplified) -->
                    <div class="form-group">
                        <label for="syntactic_effects_id">الأثر النحوي</label>
                        <select id="syntactic_effects_id" name="syntactic_effects_id" class="form-control"
                            onchange="handleFieldSelection('syntactic')">
                            <option value="">غير محدد</option>
                            <option value="add_new">إضافة أثر نحوي جديد +</option>
                            @foreach($syntacticEffects as $effect)
                            <option value="{{ $effect->id }}">{{ $effect->result_case }}</option>
                            @endforeach
                        </select>

                        <div id="syntactic_add_container"
                            style="display:  none;"
                            class="mt-2">
                            <input type="text" id="new_syntactic_applied_on" name="new_syntactic_applied_on"
                                class="form-control mb-2" placeholder="يطبق على">
                            <input type="text" id="new_syntactic_result_case" name="new_syntactic_result_case"
                                class="form-control mb-2" placeholder="الحالة الناتجة">
                            <textarea id="new_syntactic_context_condition" name="new_syntactic_context_condition"
                                class="form-control mb-2"
                                placeholder="شرط السياق (اختياري)"></textarea>
                            <textarea id="new_syntactic_priority_order" name="new_syntactic_priority_order"
                                class="form-control mb-2"
                                placeholder="ترتيب الأولوية (اختياري)"></textarea>
                            <textarea id="new_syntactic_notes" name="new_syntactic_notes" class="form-control"
                                placeholder="ملاحظات إضافية (اختياري)"></textarea>
                        </div>
                    </div>

                    <!-- Semantic logical effects field (simplified) -->
                    <div class="form-group">
                        <label for="semantic_logical_effects_id">الأثر الدلالي والمنطقي</label>
                        <select id="semantic_logical_effects_id" name="semantic_logical_effects_id" class="form-control"
                            onchange="handleFieldSelection('semantic_logical')">
                            <option value="">غير محدد</option>
                            <option value="add_new">إضافة أثر دلالي جديد +</option>
                            @foreach($semanticEffects as $effect)
                            <option value="{{ $effect->id }}">{{ $effect->typical_relation }} : {{ $effect->nisbah_type }}</option>
                            @endforeach
                        </select>

                        <div id="semantic_logical_add_container" style="display: none;" class="mt-2">
                            <input type="hidden" id="update_semantic_logical" name="update_semantic_logical" value="">
                            <input type="text" id="new_semantic_typical_relation" name="new_semantic_typical_relation"
                                class="form-control mb-2" placeholder="العلاقة النموذجية">
                            <input type="text" id="new_semantic_nisbah_type" name="new_semantic_nisbah_type"
                                class="form-control mb-2" placeholder="نوع النسبة">
                            <textarea id="new_semantic_roles" name="new_semantic_roles" class="form-control mb-2"
                                placeholder="الأدوار الدلالية"></textarea>
                            <textarea id="new_semantic_conditions" name="new_semantic_conditions"
                                class="form-control mb-2" placeholder="الشروط"></textarea>
                            <textarea id="new_semantic_notes" name="new_semantic_notes" class="form-control"
                                placeholder="ملاحظات إضافية"></textarea>
                        </div>
                    </div>
                    <!-- Attached Type field (with add new option) -->
                    <div class="form-group attached-pronoun-field" style="display: none;">
                        <label for="attached_type_effects_id">نوع المتصل</label>
                        <select id="attached_type_effects_id" name="attached_type_id" class="form-control"
                            onchange="handleFieldSelection('attached_type')">
                            <option value="">غير محدد</option>
                            <option value="add_new">إضافة نوع متصل جديد +</option>
                            @foreach($attachedTypes as $type)
                            <option value="{{ $type->id }}">{{ $type->type }}</option>
                            @endforeach
                        </select>
                        <div id="attached_type_add_container" style="display: none;" class="mt-2">
                            <input type="text" id="new_attached_type_type" name="new_attached_type_type"
                                class="form-control mb-2" placeholder="نوع المتصل">
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-actions">
                <button type="button" class="btn" onclick="closeModal()">إلغاء</button>
                <button type="submit" class="btn btn-edit">حفظ</button>
            </div>
        </form>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Initialize the filter state
    updateActiveFilters();

    // Add event listeners for filter buttons and tags
    initializeFilters();

    // Initialize form field behaviors
    initializeFormFields();
});

// Initialize form event handlers
function initializeFormFields() {
    // Show/hide fields based on pronoun type
    document.getElementById('type').addEventListener('change', function() {
        const hiddenFields = document.querySelectorAll('.hidden-pronoun-field');
        const attachedFields = document.querySelectorAll('.attached-pronoun-field');

        if (this.value === 'hidden') {
            hiddenFields.forEach(field => field.style.display = 'block');
            attachedFields.forEach(field => field.style.display = 'none');
        } else if (this.value === 'attached') {
            hiddenFields.forEach(field => field.style.display = 'none');
            attachedFields.forEach(field => field.style.display = 'block');
        } else {
            hiddenFields.forEach(field => field.style.display = 'none');
            attachedFields.forEach(field => field.style.display = 'none');
        }
    });

    // Form submission handler with AJAX
    document.getElementById('pronounForm').addEventListener('submit', function(event) {
        event.preventDefault();

        // Create FormData object from the form
        const formData = new FormData(this);

        // Get the form method (POST for new, PUT for edit)
        const method = document.getElementById('formMethod').value;

        // Set up the AJAX request
        const url = this.getAttribute('action');
        const xhr = new XMLHttpRequest();

        // Open the request with the correct method
        xhr.open(method === 'PUT' ? 'POST' : method, url, true);
        xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');

        xhr.onload = function() {
            if (xhr.status >= 200 && xhr.status < 400) {
                // Success, refresh the page
                window.location.reload();
            } else {
                // Try to parse response as JSON
                try {
                    const response = JSON.parse(xhr.responseText);
                    alert('حدث خطأ: ' + (response.message || 'يرجى التحقق من البيانات المدخلة'));
                } catch (e) {
                    alert('حدث خطأ أثناء معالجة البيانات');
                }
            }
        };

        xhr.onerror = function() {
            alert('حدث خطأ أثناء الاتصال بالخادم');
        };

        xhr.send(formData);
    });
}

// Initialize filter functionality
function initializeFilters() {
    // Filter category button clicks
    document.querySelectorAll('.filter-category').forEach(button => {
        button.addEventListener('click', function() {
            // Remove active class from all buttons
            document.querySelectorAll('.filter-category').forEach(btn => {
                btn.classList.remove('active');
            });

            // Add active class to clicked button
            this.classList.add('active');

            // Hide all tag sections
            document.querySelectorAll('.filter-tags > div').forEach(section => {
                section.style.display = 'none';
            });

            // Show selected tag section
            const filter = this.getAttribute('data-filter');
            if (filter !== 'all') {
                document.querySelector('.filter-tags').style.display = 'block';
                document.querySelector(`.${filter}-tags`).style.display = 'flex';
            } else {
                document.querySelector('.filter-tags').style.display = 'none';
            }

            // Apply filters
            applyFilters();
        });
    });

    // Tag click handlers
    document.querySelectorAll('.filter-tag').forEach(tag => {
        tag.addEventListener('click', function() {
            this.classList.toggle('active');
            applyFilters();
            updateActiveFilters();
        });
    });

    // Search functionality
    document.querySelector('.search-box').addEventListener('input', function() {
        applyFilters();
    });
}

// Apply all active filters
function applyFilters() {
    const searchTerm = document.querySelector('.search-box').value.toLowerCase();
    const activeTypeTags = Array.from(document.querySelectorAll('.type-tags .filter-tag.active'))
        .map(tag => tag.getAttribute('data-type'));
    const activePersonTags = Array.from(document.querySelectorAll('.person-tags .filter-tag.active'))
        .map(tag => tag.getAttribute('data-person'));
    const activeNumberTags = Array.from(document.querySelectorAll('.number-tags .filter-tag.active'))
        .map(tag => tag.getAttribute('data-number'));
    const activeGenderTags = Array.from(document.querySelectorAll('.gender-tags .filter-tag.active'))
        .map(tag => tag.getAttribute('data-gender'));
    const activePositionTags = Array.from(document.querySelectorAll('.position-tags .filter-tag.active'))
        .map(tag => tag.getAttribute('data-position'));

    document.querySelectorAll('.pronoun-card').forEach(card => {
        const name = card.querySelector('h3').textContent.toLowerCase();
        const definition = card.getAttribute('data-definition').toLowerCase();
        const type = card.getAttribute('data-type');
        const person = card.getAttribute('data-person');
        const number = card.getAttribute('data-number');
        const gender = card.getAttribute('data-gender');
        const position = card.getAttribute('data-position');

        // Check if the card matches search term (either in name or definition)
        const matchesSearch = searchTerm === '' ||
            name.includes(searchTerm) ||
            definition.includes(searchTerm);

        // Check if the card matches all active filters
        const matchesType = activeTypeTags.length === 0 || activeTypeTags.includes(type);
        const matchesPerson = activePersonTags.length === 0 || activePersonTags.includes(person);
        const matchesNumber = activeNumberTags.length === 0 || activeNumberTags.includes(number);
        const matchesGender = activeGenderTags.length === 0 || activeGenderTags.includes(gender);
        const matchesPosition = activePositionTags.length === 0 ||
            (position && activePositionTags.includes(position));

        // Show or hide based on all criteria
        if (matchesSearch && matchesType && matchesPerson && matchesNumber && matchesGender &&
            matchesPosition) {
            card.style.display = 'block';
        } else {
            card.style.display = 'none';
        }
    });
}

// Update the active filters display
function updateActiveFilters() {
    const activeFiltersContainer = document.querySelector('.active-filters');
    activeFiltersContainer.innerHTML = '<span>المرشحات النشطة:</span>';

    const activeFilters = Array.from(document.querySelectorAll('.filter-tag.active'));

    if (activeFilters.length === 0) {
        activeFiltersContainer.innerHTML += '<span>لا توجد مرشحات نشطة</span>';
    } else {
        activeFilters.forEach(filter => {
            const filterClone = filter.cloneNode(true);
            filterClone.classList.add('active-filter');
            // Add a remove option
            filterClone.addEventListener('click', function() {
                // Find the original filter and toggle it off
                const originalFilter = document.querySelector(
                    `.filter-tag[data-${this.dataset.type || this.dataset.person || this.dataset.number || this.dataset.gender || this.dataset.position}="${this.dataset.type || this.dataset.person || this.dataset.number || this.dataset.gender || this.dataset.position}"]`
                );
                if (originalFilter) {
                    originalFilter.click();
                }
            });
            activeFiltersContainer.appendChild(filterClone);
        });
    }
}

// Modal functions
function openAddModal() {
    // Reset the form completely
    document.getElementById('pronounForm').reset();

    // Reset any custom fields or containers
    document.querySelectorAll('[id$="_add_container"]').forEach(container => {
        container.style.display = 'none';
    });

    // Remove any "create new" hidden inputs
    document.querySelectorAll('[id^="create_new_"]').forEach(input => {
        input.remove();
    });

    // Set the title and method
    document.getElementById('modalTitle').textContent = 'إضافة ضمير جديد';
    document.getElementById('formMethod').value = 'POST';
    document.getElementById('pronounForm').action = "{{ route('pronouns.store') }}";

    // Show the modal
    document.getElementById('pronounModal').style.display = 'block';

    // Reset conditional fields
    const typeEvent = new Event('change');
    document.getElementById('type').dispatchEvent(typeEvent);
}

function openEditModal(id) {
    document.getElementById('modalTitle').textContent = 'تعديل الضمير';
    document.getElementById('pronounId').value = id;
    document.getElementById('formMethod').value = 'PUT';
    document.getElementById('pronounForm').action = `/pronouns/${id}`;

    // Reset any custom fields or containers first
    document.querySelectorAll('[id$="_add_container"]').forEach(container => {
        container.style.display = 'none';
    });

    // Remove any "create new" hidden inputs
    document.querySelectorAll('[id^="create_new_"]').forEach(input => {
        input.remove();
    });

    // Fetch pronoun data
    fetch(`/pronouns/${id}/edit`)
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {
            console.log(data);
            // Fill in the form fields
            document.getElementById('name').value = data.name || '';
            document.getElementById('definition').value = data.definition || '';
            document.getElementById('type').value = data.type || 'attached';
            document.getElementById('person').value = data.person || 'first';
            document.getElementById('number').value = data.number || 'single';
            document.getElementById('gender').value = data.gender || 'm';
            document.getElementById('position').value = data.position || '';

            document.getElementById('parsing_id').value = data.parsing_id || '';
            document.getElementById('new_parsing_status').value = data.parsing.status || '';
            document.getElementById('new_parsing_rule').value = data.parsing.rule || '';
            document.getElementById('new_parsing_example').value = data.parsing.example || '';

            document.getElementById('syntactic_effects_id').value = data.syntactic_effects_id || '';
            document.getElementById('new_syntactic_applied_on').value = data.syntactic_effects.applied_on || '';
            document.getElementById('new_syntactic_result_case').value = data.syntactic_effects.result_case || '';
            document.getElementById('new_syntactic_context_condition').value = data.syntactic_effects.context_condition || '';
            document.getElementById('new_syntactic_priority_order').value = data.syntactic_effects.priority_order || '';
            document.getElementById('new_syntactic_notes').value = data.syntactic_effects.notes || '';
            
            document.getElementById('semantic_logical_effects_id').value = data.semantic_logical_effects_id || '';
            document.getElementById('update_semantic_logical').value = data.semantic_logical_effects_id || '';
            document.getElementById('new_semantic_typical_relation').value = data.semantic_logical_effects.typical_relation || '';
            document.getElementById('new_semantic_nisbah_type').value = data.semantic_logical_effects.nisbah_type || '';
            document.getElementById('new_semantic_roles').value = data.semantic_logical_effects.semantic_roles || '';
            document.getElementById('new_semantic_conditions').value = data.semantic_logical_effects.conditions || '';
            document.getElementById('new_semantic_notes').value = data.semantic_logical_effects.notes || '';

            document.getElementById('attached_type_effects_id').value = data.attached_type_id || '';
            document.getElementById('estimated_for_hidden').value = data.estimated_for_hidden || '';
            var addContainer = document.getElementById(`semantic_logical_add_container`);
            addContainer.style.display = 'block';
            var addContainer = document.getElementById(`syntactic_add_container`);
            addContainer.style.display = 'block';
            var addContainer = document.getElementById(`parsing_add_container`);
            addContainer.style.display = 'block';

            // Trigger change events to show/hide fields
            const typeEvent = new Event('change');
            document.getElementById('type').dispatchEvent(typeEvent);

            // Show the modal
            document.getElementById('pronounModal').style.display = 'block';
        })
        .catch(error => {
            console.error('Error fetching pronoun data:', error);
            alert('حدث خطأ أثناء جلب بيانات الضمير');
        });
}

function closeModal() {
    document.getElementById('pronounModal').style.display = 'none';
}

// Handle field selection in the form
function handleFieldSelection(field) {
    const selectField = document.getElementById(`${field}_${field === 'parsing' ? 'id' : 'effects_id'}`);
    const addContainer = document.getElementById(`${field}_add_container`);

    if (selectField.value == 'add_new') {
        addContainer.style.display = 'block';

        // Add a hidden input to indicate we're creating a new item
        const hiddenInputId = `create_new_${field}`;
        let hiddenInput = document.getElementById(hiddenInputId);

        if (!hiddenInput) {
            hiddenInput = document.createElement('input');
            hiddenInput.type = 'hidden';
            hiddenInput.name = `create_new_${field}`;
            hiddenInput.value = '1';
            hiddenInput.id = hiddenInputId;
            document.getElementById('pronounForm').appendChild(hiddenInput);
        }
    } else {
        addContainer.style.display = 'none';

        // Remove the hidden input if it exists
        const existingInput = document.getElementById(`create_new_${field}`);
        if (existingInput) {
            existingInput.remove();
        }

        // Clear the add new fields
        clearFieldInputs(field);
    }
}

// Clear fields based on the field type
function clearFieldInputs(field) {
    if (field === 'parsing') {
        document.getElementById('new_parsing_status').value = '';
        document.getElementById('new_parsing_rule').value = '';
        document.getElementById('new_parsing_example').value = '';
    } else if (field === 'syntactic') {
        document.getElementById('new_syntactic_applied_on').value = '';
        document.getElementById('new_syntactic_result_case').value = '';
        document.getElementById('new_syntactic_context_condition').value = '';
        document.getElementById('new_syntactic_priority_order').value = '';
        document.getElementById('new_syntactic_notes').value = '';
    } else if (field === 'semantic') {
        document.getElementById('update_semantic_logical').value = '';
        document.getElementById('new_semantic_typical_relation').value = '';
        document.getElementById('new_semantic_nisbah_type').value = '';
        document.getElementById('new_semantic_roles').value = '';
        document.getElementById('new_semantic_conditions').value = '';
        document.getElementById('new_semantic_notes').value = '';
    } else if (field === 'attached_type') {
        document.getElementById('new_attached_type_type').value = '';
        document.getElementById('new_attached_type_description').value = '';
        document.getElementById('new_attached_type_notes').value = '';
    }
}

function confirmDelete(id) {
    if (confirm('هل أنت متأكد من رغبتك في حذف هذا الضمير؟')) {
        const form = document.createElement('form');
        form.method = 'POST';
        form.action = `/pronouns/${id}`;
        form.style.display = 'none';

        const csrfToken = document.createElement('input');
        csrfToken.type = 'hidden';
        csrfToken.name = '_token';
        csrfToken.value = '{{ csrf_token() }}';

        const method = document.createElement('input');
        method.type = 'hidden';
        method.name = '_method';
        method.value = 'DELETE';

        form.appendChild(csrfToken);
        form.appendChild(method);
        document.body.appendChild(form);
        form.submit();
    }
}

// Close modal when clicking outside
window.onclick = function(event) {
    const modal = document.getElementById('pronounModal');
    if (event.target === modal) {
        closeModal();
    }
};
</script>
@endsection