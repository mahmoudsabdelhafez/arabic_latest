
@extends('layouts.app')

@section('title', 'إضافة مجال دلالي جديد')
@section('header', 'إضافة مجال دلالي جديد')

@section('content')
<div class="container">
    <form action="{{ route('semantic_domains.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="domain_name">اسم المجال</label>
            <input type="text" class="form-control" id="domain_name" name="domain_name" required>
        </div>
        <button type="submit" class="btn btn-primary">حفظ</button>
        <a href="{{ route('semantic_domains.index') }}" class="btn btn-warning ">رجوع</a>
    </form>
</div>
@endsection
