@extends('layouts.harakat')

@section('content')
<div class="container">
    <div class="content-card">
        <div class="card-header">
            <h2 class="card-title">إدارة الأفعال الثلاثية</h2>
            @auth
            <a href="{{ route('basic-trilateral-verbs.create') }}" class="btn">إضافة فعل جديد</a>
            @endauth
        </div>

        @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif

        <!-- Desktop View -->
        <div class="responsive-table">
            <table>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>الوزن</th>
                        <th>الماضي</th>
                        <th>المضارع</th>
                        <th>عمليات</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($verbs as $verb)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $verb->pattern }}</td>
                        <td>{{ $verb->past_tense }}</td>
                        <td>{{ $verb->present_tense }}</td>
                        <td>
                            <div class="actions">
                                <a href="{{ route('basic-trilateral-verbs.show', $verb) }}" class="btn btn-sm btn-info">عرض</a>
                                @auth
                                <a href="{{ route('basic-trilateral-verbs.edit', $verb) }}" class="btn btn-sm btn-edit">تعديل</a>
                                <form action="{{ route('basic-trilateral-verbs.destroy', $verb) }}" method="POST" onsubmit="return confirm('هل أنت متأكد من الحذف؟');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-delete">حذف</button>
                                </form>
                                @endauth
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" style="text-align: center">لا توجد أفعال ثلاثية مضافة</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Mobile View -->
        <div class="d-none">
            @forelse($verbs as $verb)
            <div class="card-data">
                <div class="card-data-item">
                    <span class="card-data-label">الوزن:</span>
                    <span>{{ $verb->pattern }}</span>
                </div>
                <div class="card-data-item">
                    <span class="card-data-label">الماضي:</span>
                    <span>{{ $verb->past_tense }}</span>
                </div>
                <div class="card-data-item">
                    <span class="card-data-label">المضارع:</span>
                    <span>{{ $verb->present_tense }}</span>
                </div>
                <div class="card-data-actions">
                    <a href="{{ route('basic-trilateral-verbs.show', $verb) }}" class="btn btn-sm btn-info">عرض</a>
                    @auth
                    <a href="{{ route('basic-trilateral-verbs.edit', $verb) }}" class="btn btn-sm btn-edit">تعديل</a>
                    <form action="{{ route('basic-trilateral-verbs.destroy', $verb) }}" method="POST" onsubmit="return confirm('هل أنت متأكد من الحذف؟');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-delete">حذف</button>
                    </form>
                    @endauth
                </div>
            </div>
            @empty
            <div style="text-align: center; padding: 2rem;">
                لا توجد أفعال ثلاثية مضافة
            </div>
            @endforelse
        </div>

        <div class="pagination">
            {{ $verbs->links() }}
        </div>
    </div>
</div>
@endsection