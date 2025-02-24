
@extends('layouts.app')

@section('title', 'إضافة نوع جديد')
@section('header', 'إضافة نوع جديد')

@section('content')
<div class="container">
    <form action="{{ route('name_types.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="type_name" class="form-label">اسم النوع</label>
            <input type="text" class="form-control" id="type_name" name="type_name" required>
        </div>
        <button type="submit" class="btn btn-primary ">حفظ</button>
        <a href="{{ route('name_types.index') }}" class="btn btn-warning ">رجوع</a>
    </form>
</div>
@endsection