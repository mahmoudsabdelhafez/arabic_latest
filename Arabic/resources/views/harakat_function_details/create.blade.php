@extends('layouts.harakat')

@section('content')
<div class="container">
    <div class="content-card">
        <div class="card-header">
            <h2 class="card-title">إضافة تفاصيل وظيفة جديدة</h2>
            <a href="{{ route('harakat-functions.details.index', $harakatFunction) }}" class="btn">العودة إلى القائمة</a>
        </div>

        <form action="{{ route('harakat-functions.details.store', $harakatFunction) }}" method="POST">
            @csrf
            
            <div class="form-group" style="margin-bottom: 1rem;">
                <label for="function_type" style="display: block; margin-bottom: 0.5rem; font-weight: bold;">نوع الوظيفة</label>
                <input type="text" name="function_type" id="function_type" style="width: 100%; padding: 0.75rem; border-radius: 8px; border: 1px solid rgba(0, 0, 0, 0.1);" value="{{ old('function_type') }}" required>
                @error('function_type')
                    <div style="color: #dc3545; margin-top: 0.25rem;">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="form-group" style="margin-bottom: 1rem;">
                <label for="function" style="display: block; margin-bottom: 0.5rem; font-weight: bold;">الوظيفة</label>
                <input type="text" name="function" id="function" style="width: 100%; padding: 0.75rem; border-radius: 8px; border: 1px solid rgba(0, 0, 0, 0.1);" value="{{ old('function') }}" required>
                @error('function')
                    <div style="color: #dc3545; margin-top: 0.25rem;">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="form-group" style="margin-bottom: 1rem;">
                <label for="description" style="display: block; margin-bottom: 0.5rem; font-weight: bold;">الوصف</label>
                <textarea name="description" id="description" rows="5" style="width: 100%; padding: 0.75rem; border-radius: 8px; border: 1px solid rgba(0, 0, 0, 0.1);" required>{{ old('description') }}</textarea>
                @error('description')
                    <div style="color: #dc3545; margin-top: 0.25rem;">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="form-group" style="margin-bottom: 1rem;">
                <label for="example" style="display: block; margin-bottom: 0.5rem; font-weight: bold;">المثال</label>
                <textarea name="example" id="example" rows="5" style="width: 100%; padding: 0.75rem; border-radius: 8px; border: 1px solid rgba(0, 0, 0, 0.1);" required>{{ old('example') }}</textarea>
                @error('example')
                    <div style="color: #dc3545; margin-top: 0.25rem;">{{ $message }}</div>
                @enderror
            </div>
            
            <div style="margin-top: 2rem;">
                <button type="submit" class="btn">حفظ التفاصيل</button>
            </div>
        </form>
    </div>
</div>
@endsection