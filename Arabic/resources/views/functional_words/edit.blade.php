@extends('layouts.app')

@section('title', 'تعديل الكلمة الوظيفية')
@section('header', 'تعديل الكلمة الوظيفية')

@section('content')
        <form action="{{ route('functional_words.update', $functionalWord->id) }}" method="POST">
            @csrf
            @method('PUT')
            @include('functional_words.form', ['functionalWord' => $functionalWord])
            <button type="submit" class="btn btn-primary">تحديث</button>
        </form>
@endsection
