@extends('layouts.harakat')

@section('content')
<div class="container">
    <div class="content-card">
        <div class="card-header">
            <h2 class="card-title">تفاصيل وظيفة الحركة: {{ $harakatFunction->grammatical_function }}</h2>
            <div>
                <a href="{{ route('harakat-functions.details.create', $harakatFunction) }}" class="btn">إضافة تفاصيل جديدة</a>
                <a href="{{ route('harakat-functions.show', $harakatFunction) }}" class="btn">العودة إلى الوظيفة</a>
            </div>
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
                        <th>نوع الوظيفة</th>
                        <th>الوظيفة</th>
                        <th>الوصف</th>
                        <th>المثال</th>
                        <th>تم التعديل بواسطة</th>
                        <th>الإجراءات</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($details as $detail)
                        <tr>
                            <td>{{ $detail->id }}</td>
                            <td>{{ $detail->function_type }}</td>
                            <td>{{ $detail->function }}</td>
                            <td>{{ \Illuminate\Support\Str::limit($detail->description, 50) }}</td>
                            <td>{{ \Illuminate\Support\Str::limit($detail->example, 50) }}</td>
                            <td>{{ $detail->editor->name ?? 'غير محدد' }}</td>
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
                            <td colspan="7" style="text-align: center;">لا توجد تفاصيل لهذه الوظيفة</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Mobile cards for responsive design -->
        <div class="d-none">
            @forelse($details as $detail)
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
                    <div class="card-data-item">
                        <span class="card-data-label">تم التعديل بواسطة:</span>
                        <span>{{ $detail->editor->name ?? 'غير محدد' }}</span>
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

        <div class="pagination">
            {{ $details->links() }}
        </div>
    </div>
</div>
@endsection