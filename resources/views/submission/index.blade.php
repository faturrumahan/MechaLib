@extends('layout.main')

@section('content')
    @include('item.partial.navbar')

    <div class="container">
        @include('submission.partial.banner')
        <div class="more-card">
            @include('submission.partial.searchbar')
            <div class="row data" data-aos="fade-up">
                @foreach ($submissions as $submission)
                <div class="col-lg-3 col-6">
                    <div class="card border-0 mx-auto bg-dark text-light mt-4">
                        @foreach ($images as $img)
                            @if ($img->submission_id == $submission->id)
                                <img src="{{ asset('storage/' . $img->image) }}" class="card-img-top" alt="{{$submission->name}}">
                            @break
                            @endif
                        @endforeach
                        <div class="card-body">
                            <h5 class="card-title">{{ $submission->name }}</h5>
                            <p class="card-text">by {{$submission->user->name}}</p>
                            <a href="/items/submission-detail/{{ $submission->slug }}" class="stretched-link"></a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <div class="container d-flex justify-content-end">
            {{ $submissions ->links() }}
        </div>
    </div>
@endsection
