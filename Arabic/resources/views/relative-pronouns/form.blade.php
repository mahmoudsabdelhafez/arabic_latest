<div class="form-group">
    <label for="surface_form">الاسم الموصول</label>
    <input type="text" name="surface_form" id="surface_form" class="form-control" value="{{ old('surface_form', $relativePronoun->surface_form ?? '') }}" required>
</div>

<div class="form-group">
    <label for="gender">الجنس</label>
    <select name="gender" id="gender" class="form-control">
        <option value="masc" {{ old('gender', isset($relativePronoun->gender)? $relativePronoun->gender : '') == 'masc' ? 'selected' : '' }}>مذكر</option>
        <option value="fem" {{ old('gender', isset($relativePronoun->gender)? $relativePronoun->gender : '') == 'fem' ? 'selected' : '' }}>مؤنث</option>
    </select>
</div>

<div class="form-group">
    <label for="number">العدد</label>
    <select name="number" id="number" class="form-control">
        <option value="singular" {{ old('number', isset($relativePronoun->number)? $relativePronoun->number : '') == 'singular' ? 'selected' : '' }}>مفرد</option>
        <option value="dual" {{ old('number', isset($relativePronoun->number)? $relativePronoun->number : '') == 'dual' ? 'selected' : '' }}>مثنى</option>
        <option value="plural" {{ old('number', isset($relativePronoun->number)? $relativePronoun->number : '') == 'plural' ? 'selected' : '' }}>جمع</option>
    </select>
</div>

<div class="form-group">
    <label for="case">الحالة</label>
    <select name="case" id="case" class="form-control">
        <option value="nominative" {{ old('case', isset($relativePronoun->case)? $relativePronoun->case : '') == 'nominative' ? 'selected' : '' }}>مرفوع</option>
        <option value="accusative" {{ old('case', isset($relativePronoun->case)? $relativePronoun->case : '') == 'accusative' ? 'selected' : '' }}>منصوب</option>
        <option value="genitive" {{ old('case', isset($relativePronoun->case)? $relativePronoun->case : '') == 'genitive' ? 'selected' : '' }}>مجرور</option>
    </select>
</div>

<div class="form-group">
    <label for="dialect_id">اللغة أو اللهجة</label>
    <select name="dialect_id" id="dialect_id" class="form-control">
        <option value="">-- اختر اللهجة --</option>
        @foreach ($dialects as $dialect)
            <option value="{{ $dialect->id }}" {{ old('dialect_id', isset($relativePronoun->dialect_id)? $relativePronoun->dialect_id : '') == $dialect->id ? 'selected' : '' }}>{{ $dialect->dialect_name }}</option>
        @endforeach
    </select>
</div>

<div class="form-group">
    <label for="notes">ملاحظات</label>
    <textarea name="notes" id="notes" class="form-control">{{ old('notes', isset($relativePronoun->notes)? $relativePronoun->notes : '') }}</textarea>
</div>
