
@extends('layouts.app')

@section('title', 'الاسم الموصول')
@section('header', 'الاسم الموصول')

@section('content')
        <a href="{{ route('relative_pronouns.create') }}" class="btn btn-primary">إضافة اسم موصول</a>
        <table class="table table-bordered mt-4">
            <thead>
                <tr>
                    <th>الاسم الموصول</th>
                    <th>الجنس</th>
                    <th>العدد</th>
                    <th>الحالة</th>
                    <th>اللهجة</th>
                    <th>الإجراءات</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($relativePronouns as $pronoun)
                    <tr>
                        <td>{{ $pronoun->surface_form }}</td>
                        <td>{{ $pronoun->gender ?? 'غير محدد' }}</td>
                        <td>{{ $pronoun->number ?? 'غير محدد' }}</td>
                        <td>{{ $pronoun->case ?? 'غير محدد' }}</td>
                        <td>{{ $pronoun->dialect->dialect_name ?? 'غير محدد' }}</td>
                        <td>
                            <a href="{{ route('relative_pronouns.edit', $pronoun->id) }}" class="btn btn-warning">تعديل</a>
                            <form action="{{ route('relative_pronouns.destroy', $pronoun->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('هل أنت متأكد من الحذف؟')">حذف</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
@endsection
