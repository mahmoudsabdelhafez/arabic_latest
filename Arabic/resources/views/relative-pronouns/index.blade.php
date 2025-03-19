@extends('layouts.harakat')

@section('content')
<div class="container">
    <div class="content-card">
        <div class="card-header">
            <h2 class="card-title">الأسماء الموصولة</h2>
            @auth
            <a href="{{ route('relative-pronouns.create') }}" class="btn">إضافة اسم موصول</a>
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
                        <th>الاسم</th>
                        <th>العدد</th>
                        <th>الجنس</th>
                        <th>التحليل النحوي</th>
                        <th>الإجراءات</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($relativePronouns as $index => $pronoun)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $pronoun->name }}</td>
                        <td>{{ $pronoun->number }}</td>
                        <td>{{ $pronoun->gender }}</td>
                        <td>{{ $pronoun->grammatical_analysis }}</td>
                        <td class="actions">
                            <a href="{{ route('relative-pronouns.show', $pronoun) }}" class="btn btn-sm btn-info">عرض</a>
                            @auth
                            <a href="{{ route('relative-pronouns.edit', $pronoun) }}" class="btn btn-sm btn-edit">تعديل</a>
                            <form action="{{ route('relative-pronouns.destroy', $pronoun) }}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-delete" onclick="return confirm('هل أنت متأكد من الحذف؟')">حذف</button>
                            </form>
                            @endauth
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" style="text-align: center;">لا توجد أسماء موصول</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Mobile View Cards -->
        <div class="d-none">
            @forelse($relativePronouns as $index => $pronoun)
            <div class="card-data">
                <div class="card-data-item">
                    <span class="card-data-label">الاسم:</span>
                    <span>{{ $pronoun->name }}</span>
                </div>
                <div class="card-data-item">
                    <span class="card-data-label">العدد:</span>
                    <span>{{ $pronoun->number }}</span>
                </div>
                <div class="card-data-item">
                    <span class="card-data-label">الجنس:</span>
                    <span>{{ $pronoun->gender }}</span>
                </div>
                <div class="card-data-actions">
                    <a href="{{ route('relative-pronouns.show', $pronoun) }}" class="btn btn-sm btn-info">عرض</a>
                    @auth
                    <a href="{{ route('relative-pronouns.edit', $pronoun) }}" class="btn btn-sm btn-edit">تعديل</a>
                    <form action="{{ route('relative-pronouns.destroy', $pronoun) }}" method="POST" style="display: inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-delete" onclick="return confirm('هل أنت متأكد من الحذف؟')">حذف</button>
                    </form>
                    @endauth
                </div>
            </div>
            @empty
            <div class="card-data">
                <div class="card-data-item">
                    <span>لا توجد أسماء موصول</span>
                </div>
            </div>
            @endforelse
        </div>

        <div class="pagination">
    <nav aria-label="Page navigation">
        {{ $relativePronouns->links('pagination::bootstrap-4') }}
    </nav>
</div>

    </div>
</div>
@endsection