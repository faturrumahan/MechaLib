<div class="other mt-5" id="other">
    <div class="row">
        <div class="col">
            <h3 data-aos="fade-right">Category</h3>
        </div>
    </div>
    <div class="row">
        @foreach ($categories->skip(1) as $category)
        <div class="col-lg-3 col-6">
            <div class="card border-0 mx-auto m-3 bg-dark text-light">
                <img src="{{ asset('storage/' . $category->image) }}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">{{$category->name}}</h5>
                    <p class="card-text">{{$category->desc}}</p>
                    <a href="/items?category={{$category->slug}}" class="stretched-link"></a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
