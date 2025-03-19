@extends('layouts.harakat')

@section('content')
<div class="container">
    <div class="content-card">
        <div class="card-header">
            <h2 class="card-title">بيانات الفعل الثلاثي المزيد</h2>
            <div style="display: flex; gap: 1rem;">
                <a href="{{ route('augmented-three-letter-verbs.edit', $verb->id) }}" class="btn btn-edit">تعديل</a>
                <a href="{{ route('augmented-three-letter-verbs.index') }}" class="btn">العودة إلى القائمة</a>
            </div>
        </div>
        
        <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(300px, 1fr)); gap: 2rem; margin-top: 2rem;">
            <div>
                <h3 style="color: var(--primary-color); margin-bottom: 1rem; font-size: 1.3rem;">معلومات أساسية</h3>
                <div style="background-color: rgba(0,0,0,0.02); padding: 1.5rem; border-radius: 10px;">
                    <div style="margin-bottom: 1rem;">
                        <strong>الجذر:</strong>
                        <div>{{ $verb->root->root ?? 'غير محدد' }}</div>
                    </div>
                    <div style="margin-bottom: 1rem;">
                        <strong>نوع الكلمة:</strong>
                        <div>{{ $verb->wordType->type_name ?? 'غير محدد' }}</div>
                    </div>
                    <div style="margin-bottom: 1rem;">
                        <strong>نوع الفعل:</strong>
                        <div>{{ $verb->verbType->arabic_name ?? 'غير محدد' }}</div>
                    </div>
                    <div style="margin-bottom: 1rem;">
                        <strong>تم التعديل بواسطة:</strong>
                        <div>{{ $verb->editor->name ?? 'غير محدد' }}</div>
                    </div>
                </div>
            </div>
            
            <div>
                <h3 style="color: var(--primary-color); margin-bottom: 1rem; font-size: 1.3rem;">معلومات الوزن</h3>
                <div style="background-color: rgba(0,0,0,0.02); padding: 1.5rem; border-radius: 10px;">
                    <div style="margin-bottom: 1rem;">
                        <strong>نوع الزيادة:</strong>
                        <div>{{ $verb->addition_type }}</div>
                    </div>
                    <div style="margin-bottom: 1rem;">
                        <strong>الوزن:</strong>
                        <div>{{ $verb->pattern }}</div>
                    </div>
                    <div style="margin-bottom: 1rem;">
                        <strong>اسم الوزن:</strong>
                        <div>{{ $verb->pattern_name }}</div>
                    </div>
                    <div style="margin-bottom: 1rem;">
                        <strong>مثال:</strong>
                        <div>{{ $verb->example }}</div>
                    </div>
                </div>
            </div>
            
            @if($verb->phonemePositions->count() > 0)
            <div>
                <h3 style="color: var(--primary-color); margin-bottom: 1rem; font-size: 1.3rem;">مواقع الفونيمات</h3>
                <div style="background-color: rgba(0,0,0,0.02); padding: 1.5rem; border-radius: 10px;">
                    <ul style="list-style: none; padding: 0;">
                        @foreach($verb->phonemePositions as $position)
                        <li style="margin-bottom: 0.75rem;">
                            <strong>{{ $position->phoneme->name ?? 'غير محدد' }}:</strong> {{ $position->position }}
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            @endif
            
            <div>
                <h3 style="color: var(--primary-color); margin-bottom: 1rem; font-size: 1.3rem;">ملاحظات</h3>
                <div style="background-color: rgba(0,0,0,0.02); padding: 1.5rem; border-radius: 10px; min-height: 150px;">
                    {{ $verb->notes ?? 'لا توجد ملاحظات' }}
                </div>
            </div>
        </div>
        
        <div style="margin-top: 2rem; text-align: left;">
            <form action="{{ route('augmented-three-letter-verbs.destroy', $verb->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-delete" onclick="return confirm('هل أنت متأكد من رغبتك في حذف هذا الفعل؟')">حذف</button>
            </form>
        </div>
    </div>
</div>
@endsection