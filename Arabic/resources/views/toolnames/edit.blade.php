
@extends('layouts.app')

@section('title', 'Edit Tool Name')
@section('header', 'Edit Tool Name')

@section('content')

    <h1>Edit Tool Name</h1>
    <form action="{{ route('toolnames.update', $toolName->id) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" class="form-control" value="{{ old('name', $toolName->name) }}" required>
        </div>

        <div class="form-group">
            <label for="connective_category_id">Connective ID:</label>
            <input type="number" id="connective_category_id" name="connective_category_id" class="form-control" value="{{ old('connective_id', $toolName->connective_id) }}">
        </div>

        <div class="form-group">
            <label for="arabic_table_id">Arabic Table ID:</label>
            <input type="number" id="arabic_table_id" name="arabic_table_id" class="form-control" value="{{ old('arabic_table_id', $toolName->arabic_table_id) }}">
        </div>

        <button type="submit" class="btn btn-warning mt-3">Update</button>
    </form>
    <a href="{{ route('toolnames.index') }}" class="btn btn-secondary mt-3">Back to List</a>
@endsection
