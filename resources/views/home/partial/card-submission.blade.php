@if ($submissions->isEmpty())
@else
<div class="submission" id="submission">
    <div class="row">
        <div class="col" >
            <h3 data-aos="fade-left">Latest Submission</h3>
        </div>
    </div>
    <div class="row justify-content-center">
        @if ($submissions->count() < 5)
            @foreach ($submissions as $submission)
            <div class="col-lg-3">
                <div class="card border-0 mx-auto m-3 bg-dark text-light">
                    @if ($submission->id > 11)
                        <img src="https://images.unsplash.com/photo-1595044426077-d36d9236d54a?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1170&q=80" class="card-img-top" alt="default">
                    @endif
                    @foreach ($images as $img)
                        @if ($img->submission_id == $submission->id)
                            <img src="{{ asset('storage/' . $img->image) }}" class="card-img-top" alt="{{$submission->name}}">
                        @break
                        @endif
                    @endforeach
                    <div class="card-body">
                        <h5 class="card-title">{{$submission->name}}</h5>
                        <p class="card-text">by {{$submission->user->name}}</p>
                        <a href="/items/submission-detail/{{$submission->slug}}" class="stretched-link"></a>
                    </div>
                </div>
            </div>
            @endforeach
        @else
            <div class="swiper mySwiper">
                <div class="swiper-wrapper">
                    @foreach ($submissions as $submission)
                    <div class="swiper-slide">
                        <div class="card border-0 mx-auto m-3 bg-dark text-light">
                            @if ($submission->id > 11)
                                <img src="https://images.unsplash.com/photo-1595044426077-d36d9236d54a?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1170&q=80" class="card-img-top" alt="default">
                            @endif
                            @foreach ($images as $img)
                                @if ($img->submission_id == $submission->id)
                                    <img src="{{ asset('storage/' . $img->image) }}" class="card-img-top" alt="{{$submission->name}}">
                                @break
                                @endif
                            @endforeach
                            <div class="card-body">
                                <h5 class="card-title">{{$submission->name}}</h5>
                                <p class="card-text">by {{$submission->user->name}}</p>
                                <a href="/items/submission-detail/{{$submission->slug}}" class="stretched-link"></a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        @endif
    </div>
    @if ($submissions->count() > 4)
        <div class="row">
            <div class="col mt-3">
                <a href="/submissions" style="color: #fff; float: right;">View More</a>
            </div>
        </div>
    @endif
</div>
@endif
