@extends('layouts.app')

@section('title', 'تعديل الاسم الموصول')
@section('header', 'تعديل الاسم الموصول')

@section('content')


<h1>تعديل الاسم الموصول</h1>
<form action="{{ route('relative_pronouns.update', $relativePronoun->id) }}" method="POST">
    @csrf
    @method('PUT')
    @include('relative_pronouns.form', ['relativePronoun' => $relativePronoun])
    <button type="submit" class="btn btn-primary">تحديث</button>
</form>
@endsection