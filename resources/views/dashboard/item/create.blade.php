@extends('dashboard.layout.main')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Add Item</h1>
</div>

<div class="col-lg-8">
    <form method="post" action="/dashboard/items" enctype="multipart/form-data">
        @csrf
        <input type="hidden" class="form-control" id="slug" name="slug">
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control @error('name')
                is-invalid
            @enderror" id="name" name="name" required autofocus value="{{ old('name') }}" required>
            @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="category_id" class="form-label">Category</label>
            <select type="text" class="form-select" id="category_id" name="category_id">
                @foreach ($categories->skip(1) as $category)
                    @if (old('category_id') == $category->id)
                        <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                    @else
                        <option value="{{ $category->id }}" >{{ $category->name }}</option>
                    @endif
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label @error('description')
                is-invalid
            @enderror">Description</label>
            <input id="description" type="hidden" name="description" value="{{ old('description') }}" required>
            <trix-editor input="description"></trix-editor>
            @error('description')
                <div class="invalid-feedback">
                    <p class="text-danger">{{ $message }}</p>
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="input-b6b" class="form-label @error('images.*')
                is-invalid
            @enderror">Upload Image</label>
            <div class="file-loading">
                <input id="input-b6b" name="images[]" type="file" multiple>
            </div>
            @error('images.*')
                <div class="invalid-feedback">
                    <p class="text-danger">{{ $message }}</p>
                </div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary mb-3">Submit</button>
    </form>
</div>
@endsection
