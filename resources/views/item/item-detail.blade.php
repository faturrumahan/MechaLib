@extends('layout.main')

@section('content')
    @include('item.partial.navbar')
        <div class="container" style="color:#fff; margin-top:100px;">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="row justify-content-center">
                        <div class="gallery">
                            @foreach ($images as $img)
                                @if ($img->item_id == $item->id)
                                    <img src="{{ asset('storage/' . $img->image) }}" alt="{{$item->name}}" class="jumbo-bg rounded">
                                    <img src="{{ asset('storage/' . $img->image) }}" alt="{{$item->name}}" class="jumbo">
                                @break
                                @endif
                            @endforeach
                            <div class="row justify-content-center thumbnail">
                                @foreach ($images as $img)
                                    <div class="col-4 p-1">
                                        <img src="{{ asset('storage/' . $img->image) }}" alt="{{$item->name}}" class="thumb selected">
                                    </div>
                                    @break
                                @endforeach
                                @foreach ($images->skip(1) as $img)
                                    <div class="col-4 p-1">
                                        <img src="{{ asset('storage/' . $img->image) }}" alt="{{$item->name}}" class="thumb">
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 detail">
                    <h1>{{$item->name}}</h1>
                    <p>{!!$item->description!!}</p>
                </div>
            </div>
        </div>
@endsection
