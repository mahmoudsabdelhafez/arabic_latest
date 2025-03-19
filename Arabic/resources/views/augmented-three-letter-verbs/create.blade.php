@extends('layouts.app')

@section('content')
<div class="container">
    <div class="content-card">
        <div class="card-header">
            <h2 class="card-title">إضافة فعل ثلاثي مزيد جديد</h2>
            <a href="{{ route('augmented-three-letter-verbs.index') }}" class="btn">العودة إلى القائمة</a>
        </div>
        
        @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        
        <form action="{{ route('augmented-three-letter-verbs.store') }}" method="POST">
            @csrf
            
            <div style="margin-bottom: 1.5rem;">
                <label for="root_id" style="display: block; margin-bottom: 0.5rem; font-weight: bold;">الجذر:</label>
                <select name="root_id" id="root_id" style="width: 100%; padding: 0.75rem; border-radius: 8px; border: 1px solid rgba(0,0,0,0.1);" required>
                    <option value="">-- اختر الجذر --</option>
                    @foreach($roots as $root)
                    <option value="{{ $root->id }}" {{ old('root_id') == $root->id ? 'selected' : '' }}>{{ $root->name }}</option>
                    @endforeach
                </select>
            </div>
            
            <div style="margin-bottom: 1.5rem;">
                <label for="word_type_id" style="display: block; margin-bottom: 0.5rem; font-weight: bold;">نوع الكلمة:</label>
                <select name="word_type_id" id="word_type_id" style="width: 100%; padding: 0.75rem; border-radius: 8px; border: 1px solid rgba(0,0,0,0.1);" required>
                    <option value="">-- اختر النوع --</option>
                    @foreach($wordTypes as $type)
                    <option value="{{ $type->id }}" {{ old('word_type_id') == $type->id ? 'selected' : '' }}>{{ $type->name }}</option>
                    @endforeach
                </select>
            </div>
            
            <div style="margin-bottom: 1.5rem;">
                <label for="verb_type_id" style="display: block; margin-bottom: 0.5rem; font-weight: bold;">نوع الفعل:</label>
                <select name="verb_type_id" id="verb_type_id" style="width: 100%; padding: 0.75rem; border-radius: 8px; border: 1px solid rgba(0,0,0,0.1);" required>
                    <option value="">-- اختر نوع الفعل --</option>
                    @foreach($verbTypes as $type)
                    <option value="{{ $type->id }}" {{ old('verb_type_id') == $type->id ? 'selected' : '' }}>{{ $type->name }}</option>
                    @endforeach
                </select>
            </div>
            
            <div style="margin-bottom: 1.5rem;">
                <label for="addition_type" style="display: block; margin-bottom: 0.5rem; font-weight: bold;">نوع الزيادة:</label>
                <input type="text" name="addition_type" id="addition_type" value="{{ old('addition_type') }}" style="width: 100%; padding: 0.75rem; border-radius: 8px; border: 1px solid rgba(0,0,0,0.1);" required>
            </div>
            
            <div style="margin-bottom: 1.5rem;">
                <label for="pattern" style="display: block; margin-bottom: 0.5rem; font-weight: bold;">الوزن:</label>
                <input type="text" name="pattern" id="pattern" value="{{ old('pattern') }}" style="width: 100%; padding: 0.75rem; border-radius: 8px; border: 1px solid rgba(0,0,0,0.1);" required>
            </div>
            
            <div style="margin-bottom: 1.5rem;">
                <label for="pattern_name" style="display: block; margin-bottom: 0.5rem; font-weight: bold;">اسم الوزن:</label>
                <input type="text" name="pattern_name" id="pattern_name" value="{{ old('pattern_name') }}" style="width: 100%; padding: 0.75rem; border-radius: 8px; border: 1px solid rgba(0,0,0,0.1);" required>
            </div>
            
            <div style="margin-bottom: 1.5rem;">
                <label for="example" style="display: block; margin-bottom: 0.5rem; font-weight: bold;">مثال:</label>
                <input type="text" name="example" id="example" value="{{ old('example') }}" style="width: 100%; padding: 0.75rem; border-radius: 8px; border: 1px solid rgba(0,0,0,0.1);" required>
            </div>
            
            <div style="margin-bottom: 1.5rem;">
                <label for="notes" style="display: block; margin-bottom: 0.5rem; font-weight: bold;">ملاحظات:</label>
                <textarea name="notes" id="notes" style="width: 100%; padding: 0.75rem; border-radius: 8px; border: 1px solid rgba(0,0,0,0.1); min-height: 150px;">{{ old('notes') }}</textarea>
            </div>
            
            <div style="text-align: left;">
                <button type="submit" class="btn">حفظ</button>
            </div>
        </form>
    </div>
</div>
@endsection