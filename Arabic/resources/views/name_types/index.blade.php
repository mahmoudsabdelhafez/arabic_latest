
@extends('layouts.app')

@section('title', 'أنواع الكلمات')
@section('header', 'أنواع الكلمات')

@section('content')
<div class="container">
    <a href="{{ route('name_types.create') }}" class="btn btn-primary mb-3">إضافة نوع جديد</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>الاسم</th>
                <th>الإجراءات</th>
            </tr>
        </thead>
        <tbody>
            @foreach($nameTypes as $type)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $type->type_name }}</td>
                    <td>
                        <a href="{{ route('name_types.edit', $type->id) }}" class="btn btn-warning">تعديل</a>
                        <form action="{{ route('name_types.destroy', $type->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('هل أنت متأكد؟')">حذف</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
