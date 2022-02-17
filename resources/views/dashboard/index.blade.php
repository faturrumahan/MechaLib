@extends('dashboard.layout.main')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Hello {{ auth()->user()->name }}</h1>
    </div>
    <a href="/" class="btn btn-primary"><span data-feather="arrow-left"></span> Back to home</a>
    <form action="/logout" method="post">
        @csrf
        <button type="submit" class="btn btn-danger mt-2">Logout</button>
    </form>
@endsection
