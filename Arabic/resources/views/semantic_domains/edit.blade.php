
@extends('layouts.app')

@section('title', 'تعديل نوع الكلمة')
@section('header', 'تعديل نوع الكلمة')

@section('content')
<div class="container">
    <h2>إضافة مجال دلالي جديد</h2>
    <form action="{{ route('semantic_domains.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="domain_name" class="form-label">اسم المجال</label>
            <input type="text" class="form-control" id="domain_name" name="domain_name" value="{{ $semanticDomain->domain_name }}" required>
        </div>
        <button type="submit" class="btn btn-primary ">حفظ</button>
        <a href="{{ route('semantic_domains.index') }}" class="btn btn-warning ">رجوع</a>
    </form>
</div>
@endsection
