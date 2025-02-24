@extends('layouts.app')

@section('title', 'إضافة اسم موصول جديد')
@section('header', 'إضافة اسم موصول جديد')

@section('content')
<form action="{{ route('relative_pronouns.store') }}" method="POST">
    @csrf
    @include('relative_pronouns.form')
    <button type="submit" class="btn btn-primary">حفظ</button>
</form>
@endsection