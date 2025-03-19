@extends('layouts.harakat')

@section('content')
<div class="container">
    <div class="content-card">
        <div class="card-header">
            <h2 class="card-title">إضافة فعل ثلاثي جديد</h2>
            <a href="{{ route('basic-trilateral-verbs.index') }}" class="btn btn-sm">العودة للقائمة</a>
        </div>

        <form action="{{ route('basic-trilateral-verbs.store') }}" method="POST">
            @csrf
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 1rem;">
                <div style="margin-bottom: 1rem;">
                    <label for="pattern" style="display: block; margin-bottom: 0.5rem; font-weight: bold; color: var(--primary-color);">الوزن</label>
                    <input type="text" name="pattern" id="pattern" value="{{ old('pattern') }}" required 
                        style="width: 100%; padding: 0.75rem; border: 1px solid rgba(0,0,0,0.2); border-radius: 6px; font-family: 'Amiri', serif;">
                    @error('pattern')
                        <span style="color: #dc3545; font-size: 0.9rem; display: block; margin-top: 0.5rem;">{{ $message }}</span>
                    @enderror
                </div>

                <div style="margin-bottom: 1rem;">
                    <label for="past_tense" style="display: block; margin-bottom: 0.5rem; font-weight: bold; color: var(--primary-color);">الماضي</label>
                    <input type="text" name="past_tense" id="past_tense" value="{{ old('past_tense') }}" required
                        style="width: 100%; padding: 0.75rem; border: 1px solid rgba(0,0,0,0.2); border-radius: 6px; font-family: 'Amiri', serif;">
                    @error('past_tense')
                        <span style="color: #dc3545; font-size: 0.9rem; display: block; margin-top: 0.5rem;">{{ $message }}</span>
                    @enderror
                </div>

                <div style="margin-bottom: 1rem;">
                    <label for="present_tense" style="display: block; margin-bottom: 0.5rem; font-weight: bold; color: var(--primary-color);">المضارع</label>
                    <input type="text" name="present_tense" id="present_tense" value="{{ old('present_tense') }}" required
                        style="width: 100%; padding: 0.75rem; border: 1px solid rgba(0,0,0,0.2); border-radius: 6px; font-family: 'Amiri', serif;">
                    @error('present_tense')
                        <span style="color: #dc3545; font-size: 0.9rem; display: block; margin-top: 0.5rem;">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div style="margin-bottom: 1rem;">
                <label for="syntactic_analysis" style="display: block; margin-bottom: 0.5rem; font-weight: bold; color: var(--primary-color);">التحليل النحوي</label>
                <textarea name="syntactic_analysis" id="syntactic_analysis" rows="3"
                    style="width: 100%; padding: 0.75rem; border: 1px solid rgba(0,0,0,0.2); border-radius: 6px; font-family: 'Amiri', serif;">{{ old('syntactic_analysis') }}</textarea>
                @error('syntactic_analysis')
                    <span style="color: #dc3545; font-size: 0.9rem; display: block; margin-top: 0.5rem;">{{ $message }}</span>
                @enderror
            </div>

            <div style="margin-bottom: 1rem;">
                <label for="example_sentence" style="display: block; margin-bottom: 0.5rem; font-weight: bold; color: var(--primary-color);">جملة كمثال</label>
                <textarea name="example_sentence" id="example_sentence" rows="3"
                    style="width: 100%; padding: 0.75rem; border: 1px solid rgba(0,0,0,0.2); border-radius: 6px; font-family: 'Amiri', serif;">{{ old('example_sentence') }}</textarea>
                @error('example_sentence')
                    <span style="color: #dc3545; font-size: 0.9rem; display: block; margin-top: 0.5rem;">{{ $message }}</span>
                @enderror
            </div>

            <div style="margin-bottom: 1rem;">
                <label for="notes" style="display: block; margin-bottom: 0.5rem; font-weight: bold; color: var(--primary-color);">ملاحظات</label>
                <textarea name="notes" id="notes" rows="3"
                    style="width: 100%; padding: 0.75rem; border: 1px solid rgba(0,0,0,0.2); border-radius: 6px; font-family: 'Amiri', serif;">{{ old('notes') }}</textarea>
                @error('notes')
                    <span style="color: #dc3545; font-size: 0.9rem; display: block; margin-top: 0.5rem;">{{ $message }}</span>
                @enderror
            </div>

            <div style="text-align: center; margin-top: 1.5rem;">
                <button type="submit" class="btn" style="min-width: 200px;">حفظ</button>
            </div>
        </form>
    </div>
</div>
@endsection