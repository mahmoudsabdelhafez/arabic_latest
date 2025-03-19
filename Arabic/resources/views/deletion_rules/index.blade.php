@extends('layouts.harakat')

@section('content')
<div class="container">
    <div class="content-card">
        <div class="card-header">
            <h2 class="card-title">قواعد الحذف</h2>
            @auth
            <a href="{{ route('deletion-rules.create') }}" class="btn">إضافة قاعدة جديدة</a>
            @endauth
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
                        <th>نوع الحالة</th>
                        <th>سبب الحذف</th>
                        <th>إجراءات</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($deletionRules as $rule)
                    <tr>
                        <td>{{ $rule->id }}</td>
                        <td>{{ $rule->case_type }}</td>
                        <td>{{ Str::limit($rule->deletion_reason, 50) }}</td>
                        <td class="actions">
                            <a href="{{ route('deletion-rules.show', $rule) }}" class="btn btn-sm btn-info">عرض</a>
                            @auth
                            <a href="{{ route('deletion-rules.edit', $rule) }}" class="btn btn-sm btn-edit">تعديل</a>
                            <form action="{{ route('deletion-rules.destroy', $rule) }}" method="POST" style="display:inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-delete" onclick="return confirm('هل أنت متأكد من الحذف؟')">حذف</button>
                            </form>
                            @endauth
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" style="text-align: center;">لا توجد قواعد حذف حتى الآن</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Mobile Card View -->
        <div class="d-none">
            @forelse($deletionRules as $rule)
            <div class="card-data">
                <div class="card-data-item">
                    <span class="card-data-label">رقم القاعدة:</span>
                    <span>{{ $rule->id }}</span>
                </div>
                <div class="card-data-item">
                    <span class="card-data-label">نوع الحالة:</span>
                    <span>{{ $rule->case_type }}</span>
                </div>
                <div class="card-data-item">
                    <span class="card-data-label">سبب الحذف:</span>
                    <span>{{ Str::limit($rule->deletion_reason, 50) }}</span>
                </div>
                <div class="card-data-actions">
                    <a href="{{ route('deletion-rules.show', $rule) }}" class="btn btn-sm btn-info">عرض</a>
                    @auth
                    <a href="{{ route('deletion-rules.edit', $rule) }}" class="btn btn-sm btn-edit">تعديل</a>
                    <form action="{{ route('deletion-rules.destroy', $rule) }}" method="POST" style="display:inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-delete" onclick="return confirm('هل أنت متأكد من الحذف؟')">حذف</button>
                    </form>
                    @endauth
                </div>
            </div>
            @empty
            <div style="text-align: center; padding: 2rem;">
                لا توجد قواعد حذف حتى الآن
            </div>
            @endforelse
        </div>

        <div class="pagination">
            {{ $deletionRules->links() }}
        </div>
    </div>
</div>
@endsection