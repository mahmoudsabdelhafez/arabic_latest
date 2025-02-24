@extends('layouts.app')

@section('title', 'إضافة لهجة جديدة')
@section('header', 'إضافة لهجة جديدة')

@section('content')
<div class="container">
        <h2>إضافة لهجة جديدة</h2>
        <form action="{{ route('dialects.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label>اسم اللهجة</label>
                <input type="text" name="dialect_name" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">إضافة</button>
        </form>
    </div>
@endsection