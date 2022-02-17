@extends('layout.main')

@section('content')
    @include('item.partial.navbar')
        <div class="container" style="color:#fff; margin-top:100px;">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="row">
                        @if ($submission->id > 11)
                            <div class="gallery">
                                <img src="https://images.unsplash.com/photo-1595044426077-d36d9236d54a?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1170&q=80" alt="default" class="jumbo-bg rounded">
                                <img src="https://images.unsplash.com/photo-1595044426077-d36d9236d54a?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1170&q=80" alt="default" class="jumbo">
                                <div class="row justify-content-center thumbnail">
                                    <div class="col-4 p-1">
                                        <img src="https://images.unsplash.com/photo-1595044426077-d36d9236d54a?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1170&q=80" alt="default" class="thumb selected">
                                    </div>
                                    <div class="col-4 p-1">
                                        <img src="https://images.unsplash.com/photo-1595225476474-87563907a212?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1171&q=80" alt="default" class="thumb">
                                    </div>
                                </div>
                            </div>
                        @else
                        <div class="gallery">
                            @foreach ($images as $img)
                                <img src="{{ asset('storage/' . $img->image) }}" alt="{{$submission->name}}" class="jumbo-bg rounded">
                                <img src="{{ asset('storage/' . $img->image) }}" alt="{{$submission->name}}" class="jumbo">
                                @break
                            @endforeach
                            <div class="row justify-content-center thumbnail">
                                @foreach ($images as $img)
                                    <div class="col-4 p-1">
                                        <img src="{{ asset('storage/' . $img->image) }}" alt="{{$submission->name}}" class="thumb selected">
                                    </div>
                                    @break
                                @endforeach
                                @foreach ($images->skip(1) as $img)
                                    <div class="col-4 p-1">
                                        <img src="{{ asset('storage/' . $img->image) }}" alt="{{$submission->name}}" class="thumb">
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        @endif
                    </div>
                </div>
                <div class="col-lg-6 detail">
                    <h1>{{$submission->name}}</h1>
                    <small>by {{$submission->user->name}}</small>
                    <ul class="nav nav-tabs mt-2" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="desc-tab" data-bs-toggle="tab" data-bs-target="#desc" type="button" role="tab" aria-controls="desc" aria-selected="true">Description</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="spec-tab" data-bs-toggle="tab" data-bs-target="#spec" type="button" role="tab" aria-controls="spec" aria-selected="false">Specification</button>
                        </li>
                        @if ($submission->video)
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="vid-tab" data-bs-toggle="tab" data-bs-target="#vid" type="button" role="tab" aria-controls="vid" aria-selected="false">Typing Test</button>
                            </li>
                        @endif
                    </ul>
                    <div class="tab-content mt-2" id="myTabContent">
                        <div class="tab-pane fade show active" id="desc" role="tabpanel" aria-labelledby="desc-tab">
                            <p>{!!$submission->description!!}</p>
                        </div>
                        <div class="tab-pane fade" id="spec" role="tabpanel" aria-labelledby="spec-tab">
                            <table class="table table-sm table-dark">
                                <tbody>
                                    <tr>
                                        <th scope="row">Kit</th>
                                        <td>{{$submission->kit_name}}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">PCB</th>
                                        <td>{{$submission->pcb_name}}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Switch</th>
                                        <td>{{$submission->switch_name}}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Keycaps</th>
                                        <td>{{$submission->keycaps_name}}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Stablizer</th>
                                        <td>{{$submission->stab_name}}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Plate</th>
                                        <td>{{$submission->plate_name}}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Case</th>
                                        <td>{{$submission->case_name}}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        @if ($submission->video)
                            <div class="tab-pane fade" id="vid" role="tabpanel" aria-labelledby="vid-tab">
                                <div class="row justify-content-center mt-3">
                                    <iframe class="sub-vid" src="{{ $submission->link }}"></iframe>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
@endsection
