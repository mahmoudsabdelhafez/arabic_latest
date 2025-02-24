@extends('layouts.app')

@section('title', 'إضافة كلمة وظيفية جديدة')
@section('header', 'إضافة كلمة وظيفية جديدة')

@section('content')
    <div class="container">
        <form action="{{ route('functional_words.store') }}" method="POST">
            @csrf
            @include('functional_words.form')
            <button type="submit" class="btn btn-primary">حفظ</button>
        </form>
    </div>
@endsection
