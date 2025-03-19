@extends('layouts.harakat')

@section('content')
<div class="container">
    <div class="content-card">
        <div class="card-header">
            <h2 class="card-title">تعديل اسم الموصول: {{ $relativePronoun->name }}</h2>
            <a href="{{ route('relative-pronouns.index') }}" class="btn">العودة للقائمة</a>
        </div>

        @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form action="{{ route('relative-pronouns.update', $relativePronoun) }}" method="POST">
            @csrf
            @method('PUT')
            <div style="margin-bottom: 1.5rem;">
                <label for="name" style="display: block; margin-bottom: 0.5rem; font-weight: bold;">الاسم</label>
                <input type="text" id="name" name="name" value="{{ old('name', $relativePronoun->name) }}" required
                    style="width: 100%; padding: 0.75rem; border: 1px solid rgba(0, 0, 0, 0.1); border-radius: 8px;">
            </div>

            <div style="margin-bottom: 1.5rem;">
                <label for="number" style="display: block; margin-bottom: 0.5rem; font-weight: bold;">العدد</label>
                <select id="number" name="number" required
                    style="width: 100%; padding: 0.75rem; border: 1px solid rgba(0, 0, 0, 0.1); border-radius: 8px;">
                    <option value="">اختر العدد</option>
                    <option value="مفرد" {{ old('number', $relativePronoun->number) == 'مفرد' ? 'selected' : '' }}>مفرد</option>
                    <option value="مثنى" {{ old('number', $relativePronoun->number) == 'مثنى' ? 'selected' : '' }}>مثنى</option>
                    <option value="جمع" {{ old('number', $relativePronoun->number) == 'جمع' ? 'selected' : '' }}>جمع</option>
                </select>
            </div>

            <div style="margin-bottom: 1.5rem;">
                <label for="gender" style="display: block; margin-bottom: 0.5rem; font-weight: bold;">الجنس</label>
                <select id="gender" name="gender" required
                    style="width: 100%; padding: 0.75rem; border: 1px solid rgba(0, 0, 0, 0.1); border-radius: 8px;">
                    <option value="">اختر الجنس</option>
                    <option value="مذكر" {{ old('gender', $relativePronoun->gender) == 'مذكر' ? 'selected' : '' }}>مذكر</option>
                    <option value="مؤنث" {{ old('gender', $relativePronoun->gender) == 'مؤنث' ? 'selected' : '' }}>مؤنث</option>
                    <option value="مشترك" {{ old('gender', $relativePronoun->gender) == 'مشترك' ? 'selected' : '' }}>مشترك</option>
                </select>
            </div>

            <div style="margin-bottom: 1.5rem;">
                <label for="example" style="display: block; margin-bottom: 0.5rem; font-weight: bold;">المثال</label>
                <textarea id="example" name="example" rows="3" required
                    style="width: 100%; padding: 0.75rem; border: 1px solid rgba(0, 0, 0, 0.1); border-radius: 8px;">{{ old('example', $relativePronoun->example) }}</textarea>
            </div>

            <div style="margin-bottom: 1.5rem;">
                <label for="grammatical_analysis" style="display: block; margin-bottom: 0.5rem; font-weight: bold;">التحليل النحوي</label>
                <textarea id="grammatical_analysis" name="grammatical_analysis" rows="5" required
                    style="width: 100%; padding: 0.75rem; border: 1px solid rgba(0, 0, 0, 0.1); border-radius: 8px;">{{ old('grammatical_analysis', $relativePronoun->grammatical_analysis) }}</textarea>
            </div>

            <div style="text-align: left;">
                <button type="submit" class="btn">تحديث</button>
            </div>
        </form>
    </div>
</div>
@endsection