@extends('layouts.harakat')

@section('content')
<div class="container">
    <div class="content-card">
        <div class="card-header">
            <h2 class="card-title">عرض اسم الموصول: {{ $relativePronoun->name }}</h2>
            <div>
                <a href="{{ route('relative-pronouns.index') }}" class="btn">العودة للقائمة</a>
                @auth
                <a href="{{ route('relative-pronouns.edit', $relativePronoun) }}" class="btn btn-edit">تعديل</a>
                @endauth
            </div>
        </div>

        <div class="responsive-table">
            <table>
                <tr>
                    <th>الاسم</th>
                    <td>{{ $relativePronoun->name }}</td>
                </tr>
                <tr>
                    <th>العدد</th>
                    <td>{{ $relativePronoun->number }}</td>
                </tr>
                <tr>
                    <th>الجنس</th>
                    <td>{{ $relativePronoun->gender }}</td>
                </tr>
                <tr>
                    <th>المثال</th>
                    <td>{{ $relativePronoun->example }}</td>
                </tr>
                <tr>
                    <th>التحليل النحوي</th>
                    <td>{{ $relativePronoun->grammatical_analysis }}</td>
                </tr>
                @if($relativePronoun->editedBy)
                <tr>
                    <th>آخر تعديل بواسطة</th>
                    <td>{{ $relativePronoun->editedBy->name }}</td>
                </tr>
                @endif
            </table>
        </div>

        <!-- Mobile View Card -->
        <div class="d-none">
            <div class="card-data">
                <div class="card-data-item">
                    <span class="card-data-label">الاسم:</span>
                    <span>{{ $relativePronoun->name }}</span>
                </div>
                <div class="card-data-item">
                    <span class="card-data-label">العدد:</span>
                    <span>{{ $relativePronoun->number }}</span>
                </div>
                <div class="card-data-item">
                    <span class="card-data-label">الجنس:</span>
                    <span>{{ $relativePronoun->gender }}</span>
                </div>
                <div class="card-data-item">
                    <span class="card-data-label">المثال:</span>
                    <span>{{ $relativePronoun->example }}</span>
                </div>
                <div class="card-data-item">
                    <span class="card-data-label">التحليل النحوي:</span>
                    <span>{{ $relativePronoun->grammatical_analysis }}</span>
                </div>
                @if($relativePronoun->editedBy)
                <div class="card-data-item">
                    <span class="card-data-label">آخر تعديل بواسطة:</span>
                    <span>{{ $relativePronoun->editedBy->name }}</span>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection