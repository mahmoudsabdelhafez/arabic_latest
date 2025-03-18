@extends('layouts.app') <!-- Assuming your layout file is saved as app.blade.php -->

@section('title', 'إدارة الأفعال الثلاثية') <!-- Title for the page -->

@section('header', 'قائمة الأفعال الثلاثية') <!-- Header for the page -->

@section('content')
    <!-- Example content for your page -->
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>النمط</th>
                    <th>زمن الماضي</th>
                    <th>زمن المضارع</th>
                    <th>الجملة المثال</th>
                    <th>الإجراءات</th>
                </tr>
            </thead>
            <tbody>
                <!-- Example data loop -->
                @foreach($verbs as $verb)
                    <tr>
                        <td>{{ $verb->pattern }}</td>
                        <td>{{ $verb->past_tense }}</td>
                        <td>{{ $verb->present_tense }}</td>
                        <td>{{ $verb->example_sentence }}</td>
                        <td>
                            <!-- Action buttons (edit, delete) -->
                            <a href="{{ route('basic-trilateral-verbs.edit', $verb->id) }}" class="btn btn-warning">تعديل</a>
                            <form action="{{ route('basic-trilateral-verbs.destroy', $verb->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">حذف</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
   
@endsection

@section('scripts')
    <!-- Add any JavaScript specific to this page -->
    <script>
        // Example script for handling actions on the page (like confirming deletion)
    </script>
@endsection
