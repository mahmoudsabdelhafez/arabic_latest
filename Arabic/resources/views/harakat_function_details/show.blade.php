@extends('layouts.harakat')

@section('content')
<div class="container">
    <div class="content-card">
        <div class="card-header">
            <h2 class="card-title">عرض تفاصيل الوظيفة</h2>
            <div>
                <a href="{{ route('harakat-functions.details.edit', [$harakatFunction, $detail]) }}" class="btn btn-edit">تعديل</a>
                <a href="{{ route('harakat-functions.details.index', $harakatFunction) }}" class="btn">العودة إلى القائمة</a>
            </div>
        </div>

        <div style="margin-top: 1rem;">
            <h3 style="color: var(--primary-color); margin-bottom: 1rem;">معلومات تفاصيل الوظيفة</h3>
            
            <div style="margin-bottom: 1rem; padding: 1rem; background-color: rgba(35, 75, 110, 0.05); border-radius: 8px;">
                <div style="display: flex; margin-bottom: 0.5rem;">
                    <div style="width: 200px; font-weight: bold;">نوع الوظيفة:</div>
                    <div>{{ $detail->function_type }}</div>
                </div>
                
                <div style="display: flex; margin-bottom: 0.5rem;">
                    <div style="width: 200px; font-weight: bold;">الوظيفة:</div>
                    <div>{{ $detail->function }}</div>
                </div>
                
                <div style="display: flex; margin-bottom: 0.5rem;">
                    <div style="width: 200px; font-weight: bold;">تم التعديل بواسطة:</div>
                    <div>{{ $detail->editor->name ?? 'غير محدد' }}</div>
                </div>
                
                <div style="display: flex; margin-bottom: 0.5rem;">
                    <div style="width: 200px; font-weight: bold;">تاريخ الإنشاء:</div>
                    <div>{{ $detail->created_at ?? 'غير محدد' }}</div>
                </div>
                
                <div style="display: flex;">
                    <div style="width: 200px; font-weight: bold;">تاريخ آخر تحديث:</div>
                    <div>{{ $detail->updated_at ?? 'غير محدد' }}</div>
                </div>
            </div>
            
            <div style="margin-top: 2rem;">
                <h4 style="color: var(--secondary-color); margin-bottom: 0.5rem;">الوصف:</h4>
                <div style="padding: 1rem; background-color: rgba(58, 126, 113, 0.05); border-radius: 8px; margin-bottom: 1.5rem;">
                    {{ $detail->description }}
                </div>
                
                <h4 style="color: var(--secondary-color); margin-bottom: 0.5rem;">المثال:</h4>
                <div style="padding: 1rem; background-color: rgba(58, 126, 113, 0.05); border-radius: 8px;">
                    {{ $detail->example }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection