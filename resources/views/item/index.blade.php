@extends('layout.main')

@section('content')
    @include('item.partial.navbar')
    <div class="container">
        <div class="top">
            <div class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img
                        @if (request('category') === 'keyboard')
                        src= "https://images.unsplash.com/photo-1584727151652-d09b17ebf23f?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1822&q=80"
                        @elseif (request('category') === 'switch')
                        src= "https://images.unsplash.com/photo-1635135449698-dbf56dd1dd0c?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1170&q=80"
                        @elseif (request('category') === 'keycap')
                        src= "https://images.unsplash.com/photo-1626139383894-c850e0ea9334?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1233&q=80"
                        @else src="https://images.unsplash.com/photo-1619244723532-3d57041db7d4?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1170&q=80"
                        @endif

                        class="d-block w-100" alt="...">
                    </div>
                </div>
            </div>
        </div>
        <div class="more-card">
            <div class="searchbar">
                <div class="container">
                    <h1 class="display-4 mb-3">Items : {{$from}}</h1>
                    <div class="row justify-content-center">
                        <div class="col-lg-6">
                            <form action="/items">
                                @if (request('category'))
                                    <input type="hidden" name="category" value="{{ request('category') }}">
                                @endif
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" placeholder="Search {{ $from }}..." name="search">
                                    <button class="btn btn-danger" type="submit" ><i class="bi bi-search"></i></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            @if ($items->isEmpty())
                <h3 class="text-light" style="text-align: center; margin-top:150px">No Items Found</h3>
            @endif
            <div class="row data" data-aos="fade-up">
                @foreach ($items->sortBy('name') as $item)
                <div class="col-lg-3 col-6 mx-auto" >
                    <div class="card border-0 bg-dark text-light mt-4">
                        @foreach ($images as $img)
                                @if ($img->item_id == $item->id)
                                    <img src="{{ asset('storage/' . $img->image) }}" class="card-img-top" alt="{{$item->name}}">
                                @break
                                @endif
                            @endforeach
                        <div class="card-body">
                            <h5 class="card-title">{{ $item->name }}</h5>
                            <a href="/items/item-detail/{{ $item->slug }}" class="stretched-link"></a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <div class="container d-flex justify-content-end">
            {{ $items ->links() }}
        </div>
    </div>
@endsection
