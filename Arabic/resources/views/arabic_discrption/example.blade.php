<div class="container">
    <h2>Add New Example</h2>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('examples.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="word_type_id" class="form-label">Word Type</label>
            <select name="word_type_id" id="word_type_id" class="form-control" required>
                @foreach($wordTypes as $wordType)
                    <option value="{{ $wordType->id }}">{{ $wordType->type_name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="example_text" class="form-label">Example Text</label>
            <input type="text" name="example_text" id="example_text" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Save Example</button>
    </form>
</div>