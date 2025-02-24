
@extends('layouts.app')

@section('title', 'تعديل نوع الكلمة')
@section('header', 'تعديل نوع الكلمة')

@section('content')
<div class="container">
    <form action="{{ route('name_types.update', $nameType->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="type_name">اسم النوع</label>
            <input type="text" class="form-control" id="type_name" name="type_name" value="{{ $nameType->type_name }}" required>
        </div>
        <button type="submit" class="btn btn-primary">تحديث</button>
        <a href="{{ route('name_types.index') }}" class="btn btn-warning">رجوع</a>
    </form>
</div>
@endsection