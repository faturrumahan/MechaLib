@extends('dashboard.layout.main')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Add Category</h1>
</div>

<div class="col-lg-8">
    <form method="post" action="/dashboard/categories/{{ $category->slug }}" enctype="multipart/form-data">
        @method('put')
        @csrf
        <input type="hidden" class="form-control" id="slug" name="slug">
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control @error('name')
                is-invalid
            @enderror" id="name" name="name" required autofocus value="{{ old('name', $category->name) }}" required>
            @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="description" class="form-label @error('description')
                is-invalid
            @enderror">Description</label>
            <input id="description" type="hidden" name="description" value="{{ old('description', $category->description) }}" required>
            <trix-editor input="description"></trix-editor>
            @error('description')
                <div class="invalid-feedback">
                    <p class="text-danger">{{ $message }}</p>
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="image" class="form-label @error('image')
                is-invalid
            @enderror">Upload Image</label>
            <input type="hidden" name="old_img" value="{{ $category->image }}">
            <img class="img-preview img-fluid mb-3 col-sm-5" src="{{ asset('storage/' . $category->image) }}" style="display:block">
            <input class="form-control" type="file" id="image" name="image" onchange="previewImage()">
            @error('image')
                <div class="invalid-feedback">
                    <p class="text-danger">{{ $message }}</p>
                </div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary mb-3">Submit</button>
    </form>
</div>
@endsection
