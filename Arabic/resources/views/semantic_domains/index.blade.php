
@extends('layouts.app')

@section('title', 'المجالات الدلالية')
@section('header', 'المجالات الدلالية')

@section('content')
    <a href="{{ route('semantic_domains.create') }}" class="btn btn-primary mb-3">إضافة مجال جديد</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>اسم المجال</th>
                <th>الإجراءات</th>
            </tr>
        </thead>
        <tbody>
            @foreach($semanticDomains as $domain)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $domain->domain_name }}</td>
                    <td>
                        <a href="{{ route('semantic_domains.edit', $domain->id) }}" class="btn btn-warning">تعديل</a>
                        <form action="{{ route('semantic_domains.destroy', $domain->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('هل أنت متأكد؟')">حذف</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
