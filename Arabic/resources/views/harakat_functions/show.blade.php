@extends('layouts.harakat')

@section('content')
<div class="container">
    <div class="content-card">
        <div class="card-header">
            <h2 class="card-title">عرض وظيفة الحركة</h2>
            <div>
                <a href="{{ route('harakat-functions.edit', $harakatFunction) }}" class="btn btn-edit">تعديل</a>
                <a href="{{ route('harakat-functions.index') }}" class="btn">العودة إلى القائمة</a>
            </div>
        </div>

        <div style="margin-top: 1rem;">
            <h3 style="color: var(--primary-color); margin-bottom: 1rem;">معلومات وظيفة الحركة</h3>
            
            <div style="margin-bottom: 1rem; padding: 1rem; background-color: rgba(35, 75, 110, 0.05); border-radius: 8px;">
                <div style="display: flex; margin-bottom: 0.5rem;">
                    <div style="width: 200px; font-weight: bold;">الحركة:</div>
                    <div>{{ $harakatFunction->haraka->name ?? 'غير محدد' }}</div>
                </div>
                
                <div style="display: flex; margin-bottom: 0.5rem;">
                    <div style="width: 200px; font-weight: bold;">الوظيفة النحوية:</div>
                    <div>{{ $harakatFunction->grammatical_function }}</div>
                </div>
                
                <div style="display: flex; margin-bottom: 0.5rem;">
                    <div style="width: 200px; font-weight: bold;">الوظيفة الصرفية:</div>
                    <div>{{ $harakatFunction->morphological_function }}</div>
                </div>
                
                <div style="display: flex; margin-bottom: 0.5rem;">
                    <div style="width: 200px; font-weight: bold;">تم التعديل بواسطة:</div>
                    <div>{{ $harakatFunction->editor->name ?? 'غير محدد' }}</div>
                </div>
                
                <div style="display: flex; margin-bottom: 0.5rem;">
                    <div style="width: 200px; font-weight: bold;">تاريخ الإنشاء:</div>
                    <div>{{ $harakatFunction->created_at ??  'غير محدد'}}</div>
                </div>
                
                <div style="display: flex;">
                    <div style="width: 200px; font-weight: bold;">تاريخ آخر تحديث:</div>
                    <div>{{ $harakatFunction->updated_at ??  'غير محدد'}}</div>
                </div>
            </div>
            
            <h3 style="color: var(--primary-color); margin: 2rem 0 1rem;">تفاصيل الوظيفة</h3>
            
            <div style="margin-bottom: 1rem;">
                <a href="{{ route('harakat-functions.details.create', $harakatFunction) }}" class="btn">إضافة تفاصيل جديدة</a>
            </div>
            
            <div class="responsive-table">
                <table>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>نوع الوظيفة</th>
                            <th>الوظيفة</th>
                            <th>الوصف</th>
                            <th>المثال</th>
                            <th>الإجراءات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($harakatFunction->details as $detail)
                            <tr>
                                <td>{{ $detail->id }}</td>
                                <td>{{ $detail->function_type }}</td>
                                <td>{{ $detail->function }}</td>
                                <td>{{ \Illuminate\Support\Str::limit($detail->description, 50) }}</td>
                                <td>{{ \Illuminate\Support\Str::limit($detail->example, 50) }}</td>
                                <td class="actions">
                                    <a href="{{ route('harakat-functions.details.show', [$harakatFunction, $detail]) }}" class="btn btn-sm btn-info">عرض</a>
                                    <a href="{{ route('harakat-functions.details.edit', [$harakatFunction, $detail]) }}" class="btn btn-sm btn-edit">تعديل</a>
                                    <form action="{{ route('harakat-functions.details.destroy', [$harakatFunction, $detail]) }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-delete" onclick="return confirm('هل أنت متأكد من الحذف؟')">حذف</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" style="text-align: center;">لا توجد تفاصيل لهذه الوظيفة</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            
            <!-- Mobile cards for responsive design -->
            <div class="d-none">
                @forelse($harakatFunction->details as $detail)
                    <div class="card-data">
                        <div class="card-data-item">
                            <span class="card-data-label">الرقم:</span>
                            <span>{{ $detail->id }}</span>
                        </div>
                        <div class="card-data-item">
                            <span class="card-data-label">نوع الوظيفة:</span>
                            <span>{{ $detail->function_type }}</span>
                        </div>
                        <div class="card-data-item">
                            <span class="card-data-label">الوظيفة:</span>
                            <span>{{ $detail->function }}</span>
                        </div>
                        <div class="card-data-item">
                            <span class="card-data-label">الوصف:</span>
                            <span>{{ \Illuminate\Support\Str::limit($detail->description, 50) }}</span>
                        </div>
                        <div class="card-data-item">
                            <span class="card-data-label">المثال:</span>
                            <span>{{ \Illuminate\Support\Str::limit($detail->example, 50) }}</span>
                        </div>
                        <div class="card-data-actions">
                            <a href="{{ route('harakat-functions.details.show', [$harakatFunction, $detail]) }}" class="btn btn-sm btn-info">عرض</a>
                            <a href="{{ route('harakat-functions.details.edit', [$harakatFunction, $detail]) }}" class="btn btn-sm btn-edit">تعديل</a>
                            <form action="{{ route('harakat-functions.details.destroy', [$harakatFunction, $detail]) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-delete" onclick="return confirm('هل أنت متأكد من الحذف؟')">حذف</button>
                            </form>
                        </div>
                    </div>
                @empty
                    <div class="card-data">
                        <div class="card-data-item">
                            <span>لا توجد تفاصيل لهذه الوظيفة</span>
                        </div>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</div>
@endsection