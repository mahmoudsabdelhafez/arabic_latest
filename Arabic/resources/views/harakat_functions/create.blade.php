@extends('layouts.harakat')

@section('content')
<div class="container">
    <div class="content-card">
        <div class="card-header">
            <h2 class="card-title">إضافة وظيفة حركة جديدة</h2>
            <a href="{{ route('harakat-functions.index') }}" class="btn">العودة إلى القائمة</a>
        </div>

        <form action="{{ route('harakat-functions.store') }}" method="POST">
            @csrf
            
            <div class="form-group" style="margin-bottom: 1rem;">
                <label for="haraka_id" style="display: block; margin-bottom: 0.5rem; font-weight: bold;">الحركة</label>
                <select name="haraka_id" id="haraka_id" style="width: 100%; padding: 0.75rem; border-radius: 8px; border: 1px solid rgba(0, 0, 0, 0.1);" required>
                    <option value="">اختر الحركة</option>
                    @foreach($harakats as $haraka)
                        <option value="{{ $haraka->id }}">{{ $haraka->name }}</option>
                    @endforeach
                </select>
                @error('haraka_id')
                    <div style="color: #dc3545; margin-top: 0.25rem;">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="form-group" style="margin-bottom: 1rem;">
                <label for="grammatical_function" style="display: block; margin-bottom: 0.5rem; font-weight: bold;">الوظيفة النحوية</label>
                <input type="text" name="grammatical_function" id="grammatical_function" style="width: 100%; padding: 0.75rem; border-radius: 8px; border: 1px solid rgba(0, 0, 0, 0.1);" value="{{ old('grammatical_function') }}" required>
                @error('grammatical_function')
                    <div style="color: #dc3545; margin-top: 0.25rem;">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="form-group" style="margin-bottom: 1rem;">
                <label for="morphological_function" style="display: block; margin-bottom: 0.5rem; font-weight: bold;">الوظيفة الصرفية</label>
                <input type="text" name="morphological_function" id="morphological_function" style="width: 100%; padding: 0.75rem; border-radius: 8px; border: 1px solid rgba(0, 0, 0, 0.1);" value="{{ old('morphological_function') }}" required>
                @error('morphological_function')
                    <div style="color: #dc3545; margin-top: 0.25rem;">{{ $message }}</div>
                @enderror
            </div>
            
            <div style="margin-top: 2rem;">
                <button type="submit" class="btn">حفظ وظيفة الحركة</button>
            </div>
        </form>
    </div>
</div>
@endsection