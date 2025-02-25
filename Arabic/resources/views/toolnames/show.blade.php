<!-- resources/views/toolnames/show.blade.php -->
@extends('layouts.app')

@section('content')
    <h1>Tool Name: {{ $toolName->name }}</h1>
    <ul>
        <li><strong>ID:</strong> {{ $toolName->id }}</li>
        <li><strong>Name:</strong> {{ $toolName->name }}</li>
        <li><strong>Connective Category ID:</strong> {{ $toolName->connective_id }}</li>
        <li><strong>Arabic Table ID:</strong> {{ $toolName->arabic_table_id }}</li>
    </ul>
    <a href="{{ route('toolnames.index') }}" class="btn btn-secondary">Back to List</a>
@endsection
