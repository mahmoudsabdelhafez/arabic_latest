@extends('layouts.app')

@section('title', 'الكلمات الوظيفية')
@section('header', 'الكلمات الوظيفية')

@section('content')
        <a href="{{ route('functional_words.create') }}" class="btn btn-primary">إضافة كلمة وظيفية</a>
        <table class="table table-bordered mt-4">
            <thead>
                <tr>
                    <th>الشكل السطحي</th>
                    <th>الجذر</th>
                    <th>المجال الدلالي</th>
                    <th>اللهجة</th>
                    <th>إجراءات</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($functionalWords as $word)
                    <tr>
                        <td>{{ $word->surface_form }}</td>
                        <td>{{ $word->root ?? 'غير محدد' }}</td>
                        <td>{{ $word->domain->domain_name ?? 'غير محدد' }}</td>
                        <td>{{ $word->dialect->dialect_name ?? 'غير محدد' }}</td>
                        <td>
                            <a href="{{ route('functional_words.edit', $word->id) }}" class="btn btn-warning">تعديل</a>
                            <form action="{{ route('functional_words.destroy', $word->id) }}" method="POST" style="display:inline-block;">
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
