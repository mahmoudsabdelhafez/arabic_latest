<div class="form-group">
    <label for="surface_form">الشكل السطحي</label>
    <input type="text" name="surface_form" id="surface_form" class="form-control" value="{{ old('surface_form', $functionalWord->surface_form ?? '') }}" required>
</div>

<div class="form-group">
    <label for="root">الجذر</label>
    <input type="text" name="root" id="root" class="form-control" value="{{ old('root', $functionalWord->root ?? '') }}">
</div>

<div class="form-group">
    <label for="domain_id">المجال الدلالي</label>
    <select name="domain_id" id="domain_id" class="form-control">
        <option value="">-- اختر المجال الدلالي --</option>
        @foreach ($domains as $domain)
            <option value="{{ $domain->id }}" {{ old('domain_id', $functionalWord->domain_id ?? '') == $domain->id ? 'selected' : '' }}>{{ $domain->domain_name }}</option>
        @endforeach
    </select>
</div>

<div class="form-group">
    <label for="dialect_id">اللهجة</label>
    <select name="dialect_id" id="dialect_id" class="form-control">
        <option value="">-- اختر اللهجة --</option>
        @foreach ($dialects as $dialect)
            <option value="{{ $dialect->id }}" {{ old('dialect_id', $functionalWord->dialect_id ?? '') == $dialect->id ? 'selected' : '' }}>{{ $dialect->dialect_name }}</option>
        @endforeach
    </select>
</div>

<div class="form-group">
    <label for="is_relative">هل الكلمة موصولية؟</label>
    <input type="checkbox" name="is_relative" id="is_relative" value="1" {{ old('is_relative', $functionalWord->is_relative ?? false) ? 'checked' : '' }}>
</div>

<div class="form-group">
    <label for="is_interrogative">هل الكلمة استفهامية؟</label>
    <input type="checkbox" name="is_interrogative" id="is_interrogative" value="1" {{ old('is_interrogative', $functionalWord->is_interrogative ?? false) ? 'checked' : '' }}>
</div>

<div class="form-group">
    <label for="is_conditional">هل الكلمة شرطية؟</label>
    <input type="checkbox" name="is_conditional" id="is_conditional" value="1" {{ old('is_conditional', $functionalWord->is_conditional ?? false) ? 'checked' : '' }}>
</div>

<div class="form-group">
    <label for="is_fully_declinable">هل الكلمة قابلة للإعراب بالكامل؟</label>
    <input type="checkbox" name="is_fully_declinable" id="is_fully_declinable" value="1" {{ old('is_fully_declinable', $functionalWord->is_fully_declinable ?? false) ? 'checked' : '' }}>
</div>

<div class="form-group">
    <label for="is_partially_declinable">هل الكلمة قابلة للإعراب جزئياً؟</label>
    <input type="checkbox" name="is_partially_declinable" id="is_partially_declinable" value="1" {{ old('is_partially_declinable', $functionalWord->is_partially_declinable ?? false) ? 'checked' : '' }}>
</div>

<div class="form-group">
    <label for="notes">ملاحظات</label>
    <textarea name="notes" id="notes" class="form-control">{{ old('notes', $functionalWord->notes ?? '') }}</textarea>
</div>
