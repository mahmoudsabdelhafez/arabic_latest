@extends('layouts.app')

@section('title', 'تعديل اللهجة')
@section('header', 'تعديل اللهجة')

@section('content')
<div class="content-card">
    <form action="{{ route('dialects.update', $dialect->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="dialect_name">اسم اللهجة</label>
            <input type="text" id="dialect_name" name="dialect_name" class="form-control"
                value="{{ $dialect->dialect_name }}" required>
        </div>
        <button type="submit" class="btn btn-primary">حفظ التعديلات</button>
    </form>
</div>
@endsection