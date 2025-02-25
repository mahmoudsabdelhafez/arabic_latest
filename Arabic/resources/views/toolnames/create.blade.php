<!-- resources/views/toolnames/create.blade.php -->
@extends('layouts.app')

@section('content')
    <h1>Create Tool Name</h1>
    <form action="{{ route('toolnames.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" class="form-control" value="{{ old('name') }}" required>
        </div>

        <div class="form-group">
            <label for="connective_category_id">Connective Category:</label>
            <select id="connective_category_id" name="connective_category_id" class="form-control">
                <option value="" disabled selected>Select Connective Category</option>
                @foreach($connectiveCategories as $category)
                    <option value="{{ $category->id }}" {{ old('connective_category_id') == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="arabic_table_id">Arabic Table:</label>
            <select id="arabic_table_id" name="arabic_table_id" class="form-control">
                <option value="" disabled selected>Select Arabic Table</option>
                @foreach($arabicTables as $table)
                    <option value="{{ $table->id }}" {{ old('arabic_table_id') == $table->id ? 'selected' : '' }}>
                        {{ $table->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-success mt-3">Create</button>
    </form>
    <a href="{{ route('toolnames.index') }}" class="btn btn-secondary mt-3">Back to List</a>
@endsection
