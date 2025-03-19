@extends('layouts.augmented_verbs')

@section('content')
<div class="container">
    <div class="content-card">
        <div class="card-header">
            <h2 class="card-title">الأفعال الثلاثية المزيدة</h2>
            <a href="{{ route('augmented-three-letter-verbs.create') }}" class="btn">إضافة فعل ثلاثي مزيد</a>
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
                        <th>الجذر</th>
                        <th>النوع</th>
                        <th>نوع الزيادة</th>
                        <th>الوزن</th>
                        <th>اسم الوزن</th>
                        <th>مثال</th>
                        <th>الإجراءات</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($verbs as $verb)
                    <tr>
                        <td>{{ $verb->root->root ?? 'غير محدد' }}</td>
                        <td>{{ $verb->wordType->type_name ?? 'غير محدد' }}</td>
                        <td>{{ $verb->addition_type }}</td>
                        <td>{{ $verb->pattern }}</td>
                        <td>{{ $verb->pattern_name }}</td>
                        <td>{{ $verb->example }}</td>
                        <td>
                            <div class="actions">
                                <a href="{{ route('augmented-three-letter-verbs.show', $verb->id) }}" class="btn btn-sm btn-info">عرض</a>
                                <a href="{{ route('augmented-three-letter-verbs.edit', $verb->id) }}" class="btn btn-sm btn-edit">تعديل</a>
                                <form action="{{ route('augmented-three-letter-verbs.destroy', $verb->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-delete" onclick="return confirm('هل أنت متأكد من رغبتك في حذف هذا الفعل؟')">حذف</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        
        <!-- Mobile Cards View -->
        <div class="d-none">
            @foreach($verbs as $verb)
            <div class="card-data">
                <div class="card-data-item">
                    <span class="card-data-label">الجذر:</span>
                    <span>{{ $verb->root->name ?? 'غير محدد' }}</span>
                </div>
                <div class="card-data-item">
                    <span class="card-data-label">النوع:</span>
                    <span>{{ $verb->wordType->name ?? 'غير محدد' }}</span>
                </div>
                <div class="card-data-item">
                    <span class="card-data-label">نوع الزيادة:</span>
                    <span>{{ $verb->addition_type }}</span>
                </div>
                <div class="card-data-item">
                    <span class="card-data-label">الوزن:</span>
                    <span>{{ $verb->pattern }}</span>
                </div>
                <div class="card-data-item">
                    <span class="card-data-label">اسم الوزن:</span>
                    <span>{{ $verb->pattern_name }}</span>
                </div>
                <div class="card-data-item">
                    <span class="card-data-label">مثال:</span>
                    <span>{{ $verb->example }}</span>
                </div>
                <div class="card-data-actions">
                    <a href="{{ route('augmented-three-letter-verbs.show', $verb->id) }}" class="btn btn-sm btn-info">عرض</a>
                    <a href="{{ route('augmented-three-letter-verbs.edit', $verb->id) }}" class="btn btn-sm btn-edit">تعديل</a>
                    <form action="{{ route('augmented-three-letter-verbs.destroy', $verb->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-delete" onclick="return confirm('هل أنت متأكد من رغبتك في حذف هذا الفعل؟')">حذف</button>
                    </form>
                </div>
            </div>
            @endforeach
        </div>
        
        <div class="pagination">
            {{ $verbs->links() }}
        </div>
    </div>
</div>
@endsection