@extends('layouts.harakat')

@section('content')
<div class="container">
    <div class="content-card">
        <div class="card-header">
            <h2 class="card-title">تفاصيل قاعدة الحذف</h2>
            <div>
                <a href="{{ route('deletion-rules.index') }}" class="btn">العودة للقائمة</a>
                @auth
                <a href="{{ route('deletion-rules.edit', $deletionRule) }}" class="btn btn-edit">تعديل</a>
                @endauth
            </div>
        </div>

        <div style="margin-bottom: 2rem;">
            <div style="margin-bottom: 1.5rem;">
                <h3 style="color: var(--primary-color); margin-bottom: 0.5rem;">نوع الحالة</h3>
                <p style="font-size: 1.1rem;">{{ $deletionRule->case_type }}</p>
            </div>

            <div style="margin-bottom: 1.5rem;">
                <h3 style="color: var(--primary-color); margin-bottom: 0.5rem;">الشروط</h3>
                <div style="background: #f9f9f9; padding: 1rem; border-radius: 8px; white-space: pre-line;">{{ $deletionRule->conditions }}</div>
            </div>

            @if($deletionRule->examples)
            <div style="margin-bottom: 1.5rem;">
                <h3 style="color: var(--primary-color); margin-bottom: 0.5rem;">أمثلة</h3>
                <div style="background: #f9f9f9; padding: 1rem; border-radius: 8px; white-space: pre-line;">{{ $deletionRule->examples }}</div>
            </div>
            @endif

            <div style="margin-bottom: 1.5rem;">
                <h3 style="color: var(--primary-color); margin-bottom: 0.5rem;">التفسير</h3>
                <div style="background: #f9f9f9; padding: 1rem; border-radius: 8px; white-space: pre-line;">{{ $deletionRule->explanation }}</div>
            </div>

            @if($deletionRule->notes)
            <div style="margin-bottom: 1.5rem;">
                <h3 style="color: var(--primary-color); margin-bottom: 0.5rem;">ملاحظات</h3>
                <div style="background: #f9f9f9; padding: 1rem; border-radius: 8px; white-space: pre-line;">{{ $deletionRule->notes }}</div>
            </div>
            @endif

            <div style="margin-bottom: 1.5rem;">
                <h3 style="color: var(--primary-color); margin-bottom: 0.5rem;">سبب الحذف</h3>
                <div style="background: #f9f9f9; padding: 1rem; border-radius: 8px; white-space: pre-line;">{{ $deletionRule->deletion_reason }}</div>
            </div>

            <div style="margin-bottom: 1.5rem;">
                <h3 style="color: var(--primary-color); margin-bottom: 0.5rem;">معلومات إضافية</h3>
                <p><strong>الحالة:</strong> {{ $deletionRule->is_deleted ? 'محذوف' : 'نشط' }}</p>
                <p><strong>تم التعديل بواسطة:</strong> {{ $deletionRule->editedBy ? $deletionRule->editedBy->name : 'غير محدد' }}</p>
                <p><strong>تم الإنشاء في:</strong> {{ $deletionRule->created_at->format('Y-m-d H:i') }}</p>
                <p><strong>آخر تحديث:</strong> {{ $deletionRule->updated_at->format('Y-m-d H:i') }}</p>
            </div>

            @auth
            <div style="margin-top: 2rem; display: flex; gap: 1rem; justify-content: flex-end;">
                <form action="{{ route('deletion-rules.destroy', $deletionRule) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-delete" onclick="return confirm('هل أنت متأكد من حذف هذه القاعدة؟')">حذف القاعدة</button>
                </form>
            </div>
            @endauth
        </div>
    </div>
</div>
@endsection