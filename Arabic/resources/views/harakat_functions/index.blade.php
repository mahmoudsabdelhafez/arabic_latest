@extends('layouts.harakat')

@section('content')
<div class="container">
    <div class="content-card">
        <div class="card-header">
            <h2 class="card-title">وظائف الحركات</h2>
            <a href="{{ route('harakat-functions.create') }}" class="btn">إضافة وظيفة جديدة</a>
        </div>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="responsive-table">
            <table>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>الحركة</th>
                        <th>الوظيفة النحوية</th>
                        <th>الوظيفة الصرفية</th>
                        <th>تم التعديل بواسطة</th>
                        <th>الإجراءات</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($harakatFunctions as $function)
                        <tr>
                            <td>{{ $function->id }}</td>
                            <td>{{ $function->haraka->name ?? 'غير محدد' }}</td>
                            <td>{{ $function->grammatical_function }}</td>
                            <td>{{ $function->morphological_function }}</td>
                            <td>{{ $function->editor->name ?? 'غير محدد' }}</td>
                            <td class="actions">
                                <!-- <a href="{{ route('harakat-functions.show', $function) }}" class="btn btn-sm btn-info">عرض</a> -->
                                <a href="{{ route('harakat-functions.edit', $function) }}" class="btn btn-sm btn-edit">تعديل</a>
                                <form action="{{ route('harakat-functions.destroy', $function) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-delete" onclick="return confirm('هل أنت متأكد من الحذف؟')">حذف</button>
                                </form>
                                <a href="{{ route('harakat-functions.show', $function) }}" class="btn btn-sm">التفاصيل</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" style="text-align: center;">لا توجد وظائف للحركات</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Mobile cards for responsive design -->
        <div class="d-none">
            @forelse($harakatFunctions as $function)
                <div class="card-data">
                    <div class="card-data-item">
                        <span class="card-data-label">الرقم:</span>
                        <span>{{ $function->id }}</span>
                    </div>
                    <div class="card-data-item">
                        <span class="card-data-label">الحركة:</span>
                        <span>{{ $function->haraka->name ?? 'غير محدد' }}</span>
                    </div>
                    <div class="card-data-item">
                        <span class="card-data-label">الوظيفة النحوية:</span>
                        <span>{{ $function->grammatical_function }}</span>
                    </div>
                    <div class="card-data-item">
                        <span class="card-data-label">الوظيفة الصرفية:</span>
                        <span>{{ $function->morphological_function }}</span>
                    </div>
                    <div class="card-data-item">
                        <span class="card-data-label">تم التعديل بواسطة:</span>
                        <span>{{ $function->editor->name ?? 'غير محدد' }}</span>
                    </div>
                    <div class="card-data-actions">
                        <a href="{{ route('harakat-functions.show', $function) }}" class="btn btn-sm btn-info">عرض</a>
                        <a href="{{ route('harakat-functions.edit', $function) }}" class="btn btn-sm btn-edit">تعديل</a>
                        <form action="{{ route('harakat-functions.destroy', $function) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-delete" onclick="return confirm('هل أنت متأكد من الحذف؟')">حذف</button>
                        </form>
                        <a href="{{ route('harakat-functions.details.index', $function) }}" class="btn btn-sm">التفاصيل</a>
                    </div>
                </div>
            @empty
                <div class="card-data">
                    <div class="card-data-item">
                        <span>لا توجد وظائف للحركات</span>
                    </div>
                </div>
            @endforelse
        </div>

        <div class="pagination">
            {{ $harakatFunctions->links() }}
        </div>
    </div>
</div>
@endsection