@extends('layouts.harakat')

@section('content')
<div class="container">
    <div class="content-card">
        <div class="card-header">
            <h2 class="card-title">إنشاء قاعدة حذف جديدة</h2>
            <a href="{{ route('deletion-rules.index') }}" class="btn">العودة للقائمة</a>
        </div>

        @if($errors->any())
        <div style="background-color: #f8d7da; border-right: 4px solid #dc3545; color: #721c24; padding: 1rem; border-radius: 8px; margin-bottom: 1.5rem;">
            <strong>يرجى تصحيح الأخطاء التالية:</strong>
            <ul style="margin-top: 0.5rem; padding-right: 1.5rem;">
                @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form action="{{ route('deletion-rules.store') }}" method="POST">
            @csrf

            <div style="margin-bottom: 1.5rem;">
                <label for="case_type" style="display: block; margin-bottom: 0.5rem; font-weight: bold;">نوع الحالة</label>
                <input type="text" name="case_type" id="case_type" value="{{ old('case_type') }}" 
                    style="width: 100%; padding: 0.75rem; border: 1px solid #ddd; border-radius: 8px;" required>
            </div>

            <div style="margin-bottom: 1.5rem;">
                <label for="conditions" style="display: block; margin-bottom: 0.5rem; font-weight: bold;">الشروط</label>
                <textarea name="conditions" id="conditions" rows="5" 
                    style="width: 100%; padding: 0.75rem; border: 1px solid #ddd; border-radius: 8px;" required>{{ old('conditions') }}</textarea>
            </div>

            <div style="margin-bottom: 1.5rem;">
                <label for="examples" style="display: block; margin-bottom: 0.5rem; font-weight: bold;">أمثلة</label>
                <textarea name="examples" id="examples" rows="4" 
                    style="width: 100%; padding: 0.75rem; border: 1px solid #ddd; border-radius: 8px;">{{ old('examples') }}</textarea>
            </div>

            <div style="margin-bottom: 1.5rem;">
                <label for="explanation" style="display: block; margin-bottom: 0.5rem; font-weight: bold;">التفسير</label>
                <textarea name="explanation" id="explanation" rows="5" 
                    style="width: 100%; padding: 0.75rem; border: 1px solid #ddd; border-radius: 8px;" required>{{ old('explanation') }}</textarea>
            </div>

            <div style="margin-bottom: 1.5rem;">
                <label for="notes" style="display: block; margin-bottom: 0.5rem; font-weight: bold;">ملاحظات</label>
                <textarea name="notes" id="notes" rows="3" 
                    style="width: 100%; padding: 0.75rem; border: 1px solid #ddd; border-radius: 8px;">{{ old('notes') }}</textarea>
            </div>

            <div style="margin-bottom: 1.5rem;">
                <label for="deletion_reason" style="display: block; margin-bottom: 0.5rem; font-weight: bold;">سبب الحذف</label>
                <textarea name="deletion_reason" id="deletion_reason" rows="4" 
                    style="width: 100%; padding: 0.75rem; border: 1px solid #ddd; border-radius: 8px;" required>{{ old('deletion_reason') }}</textarea>
            </div>

            <div style="text-align: left; margin-top: 2rem;">
                <button type="submit" class="btn">حفظ القاعدة</button>
            </div>
        </form>
    </div>
</div>
@endsection