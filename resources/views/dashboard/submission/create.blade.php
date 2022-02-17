@extends('dashboard.layout.main')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Add Submission</h1>
</div>

<div class="col-lg-8">
    <form method="post" action="/dashboard/submissions" enctype="multipart/form-data">
        @csrf
        <input type="hidden" class="form-control" id="user_id" name="user_id" value="{{ auth()->user()->id }}">
        <input type="hidden" class="form-control" id="slug" name="slug">
        <input type="hidden" class="form-control" id="category_id" name="category_id" value="1">
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
            <label for="kit_name" class="form-label">Base Kit</label>
            <input type="text" class="form-control" list="kit" id="kit_name" name="kit_name" placeholder="Type to search..." value="{{ old('kit_name') }}" required>
            <datalist id="kit">
                @foreach ($kits as $kit)
                    <option value="{{ $kit->name }}" >{{ $kit->name }}</option>
                @endforeach
            </datalist>
        </div>
        <div class="mb-3">
            <label for="pcb_name" class="form-label">PCB</label>
            <input type="text" class="form-control" list="pcb" id="pcb_name" name="pcb_name" placeholder="Type to search..." value="{{ old('pcb_name') }}" required>
            <datalist id="pcb">
                @foreach ($pcbs as $pcb)
                    <option value="{{ $pcb->name }}" >{{ $pcb->name }}</option>
                @endforeach
            </datalist>
        </div>
        <div class="mb-3">
            <label for="switch_name" class="form-label">Switch</label>
            <input type="text" class="form-control" list="switch" id="switch_name" name="switch_name" placeholder="Type to search..." value="{{ old('switch_name') }}" required>
            <datalist id="switch">
                @foreach ($switches as $switch)
                    <option value="{{ $switch->name }}" >{{ $switch->name }}</option>
                @endforeach
            </datalist>
        </div>
        <div class="mb-3">
            <label for="keycaps_name" class="form-label">Keycaps</label>
            <input type="text" class="form-control" list="keycap" id="keycaps_name" name="keycaps_name" placeholder="Type to search..." value="{{ old('keycaps_name') }}" required>
            <datalist id="keycap">
                @foreach ($keycaps as $keycap)
                    <option value="{{ $keycap->name }}" >{{ $keycap->name }}</option>
                @endforeach
            </datalist>
        </div>
        <div class="mb-3">
            <label for="plate_name" class="form-label">Plate</label>
            <input type="text" class="form-control" list="plate" id="plate_name" name="plate_name" placeholder="Type to search..." value="{{ old('plate_name') }}" required>
            <datalist id="plate">
                @foreach ($plates as $plate)
                    <option value="{{ $plate->name }}" >{{ $plate->name }}</option>
                @endforeach
            </datalist>
        </div>
        <div class="mb-3">
            <label for="case_name" class="form-label">Case</label>
            <input type="text" class="form-control" list="case" id="case_name" name="case_name" placeholder="Type to search..." value="{{ old('case_name') }}" required>
            <datalist id="case">
                @foreach ($cases as $case)
                    <option value="{{ $case->name }}" >{{ $case->name }}</option>
                @endforeach
            </datalist>
        </div>
        <div class="mb-3">
            <label for="stab_name" class="form-label">Stabilizer</label>
            <input type="text" class="form-control" list="stab" id="stab_name" name="stab_name" placeholder="Type to search..." value="{{ old('stab_name') }}" required>
            <datalist id="stab">
                @foreach ($stabs as $stab)
                    <option value="{{ $stab->name }}" >{{ $stab->name }}</option>
                @endforeach
            </datalist>
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
        <div class="mb-3">
            <label for="video" class="form-label">Typing Test Youtube Video</label>
            <input type="text" class="form-control @error('video')
                is-invalid
            @enderror" id="video" name="video" value="{{ old('video') }}">
            @error('video')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary mb-3">Submit</button>
    </form>
</div>
@endsection
