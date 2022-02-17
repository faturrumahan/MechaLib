@extends('layout.main')

@section('content')
    @include('home.partial.navbar')
    @include('home.partial.carousel')
    @include('home.partial.gradient')
    @include('home.partial.searchbar')

    <div class="content">
        <div class="container">
            @include('home.partial.card-submission')
            @include('home.partial.card-category')
            <div class="about mt-5 mb-5" id="about">
                <div class="row">
                    <div class="col">
                        <h3 data-aos="fade-left">About</h3>
                    </div>
                </div>
                <div class="row">
                    <p>
                        Mechalib is a website that provides some information about mechanical keyboards and other things that reliable
                        <br>You can also find mechanical keyboard like what do you want to build from submissions section or share your keyboard with others
                        <br>Feel free to explore and if you have any questions, please contact the related person through their social media
                        <br>all content has own copyright belongs to the owner
                    </p>
                </div>
            </div>
        </div>
    </div>

    {{-- @include('home.partial.footer') --}}
@endsection

