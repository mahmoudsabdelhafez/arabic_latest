@extends('layouts.harakat')

@section('content')
<div class="container">
    <div class="content-card">
        <div class="card-header">
            <h2 class="card-title">عرض بيانات الفعل الثلاثي</h2>
            <div>
                <a href="{{ route('basic-trilateral-verbs.index') }}" class="btn btn-sm">العودة للقائمة</a>
                @auth
                <a href="{{ route('basic-trilateral-verbs.edit', $basicTrilateralVerb) }}" class="btn btn-sm btn-edit">تعديل</a>
                @endauth
            </div>
        </div>

        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(350px, 1fr)); gap: 2rem;">
            <div style="border-right: 1px solid rgba(0,0,0,0.1); padding-right: 1rem;">
                <h3 style="color: var(--primary-color); margin-bottom: 1rem;">معلومات الفعل</h3>
                <div style="margin-bottom: 1.5rem;">
                    <h4 style="color: var(--secondary-color);">الوزن</h4>
                    <p>{{ $basicTrilateralVerb->pattern }}</p>
                </div>
                <div style="margin-bottom: 1.5rem;">
                    <h4 style="color: var(--secondary-color);">الماضي</h4>
                    <p>{{ $basicTrilateralVerb->past_tense }}</p>
                </div>
                <div style="margin-bottom: 1.5rem;">
                    <h4 style="color: var(--secondary-color);">المضارع</h4>
                    <p>{{ $basicTrilateralVerb->present_tense }}</p>
                </div>
            </div>
            
            <div>
                <h3 style="color: var(--primary-color); margin-bottom: 1rem;">تفاصيل إضافية</h3>
                <div style="margin-bottom: 1.5rem;">
                    <h4 style="color: var(--secondary-color);">التحليل النحوي</h4>
                    <p>{{ $basicTrilateralVerb->syntactic_analysis ?: 'لا يوجد' }}</p>
                </div>
                <div style="margin-bottom: 1.5rem;">
                    <h4 style="color: var(--secondary-color);">جملة كمثال</h4>
                    <p>{{ $basicTrilateralVerb->example_sentence ?: 'لا يوجد' }}</p>
                </div>
                <div style="margin-bottom: 1.5rem;">
                    <h4 style="color: var(--secondary-color);">ملاحظات</h4>
                    <p>{{ $basicTrilateralVerb->notes ?: 'لا توجد ملاحظات' }}</p>
                </div>
                <div style="margin-bottom: 1.5rem;">
                    <h4 style="color: var(--secondary-color);">آخر تعديل بواسطة</h4>
                    <p>{{ $basicTrilateralVerb->editor ? $basicTrilateralVerb->editor->name : 'غير معروف' }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection