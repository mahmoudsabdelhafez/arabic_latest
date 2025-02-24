@extends('layouts.app')

@section('title', 'إدارة اللهجات')
@section('header', 'إدارة اللهجات')

@section('content')
<div class="container">
        <div class="content-section">
            <a href="{{ route('dialects.create') }}" class="btn btn-primary">إضافة لهجة جديدة</a>
            
            <table class="table">
                <thead>
                    <tr>
                        <th>الرقم</th>
                        <th>اسم اللهجة</th>
                        <th>الإجراءات</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($dialects as $dialect)
                        <tr>
                            <td>{{ $dialect->id }}</td>
                            <td>{{ $dialect->dialect_name }}</td>
                            <td>
                                <a href="{{ route('dialects.edit', $dialect->id) }}" class="btn btn-warning">تعديل</a>
                                <form action="{{ route('dialects.destroy', $dialect->id) }}" method="POST" style="display:inline;">
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
    </div>
@endsection
