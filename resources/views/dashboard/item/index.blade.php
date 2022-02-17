@extends('dashboard.layout.main')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">All Items</h1>
        <a class="btn btn-primary" href="/dashboard/items/create" role="button">Add New Item</a>
    </div>
    <div class="col-lg-3">
        <select class="form-select form-select-sm" id="menu" oninput="filterTable()">
            <option selected>All</option>
            @foreach ($categories->skip(1) as $category)
                <option value="{{ $category->name }}">{{ $category->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="table-responsive col-lg-8">
        <table class="table table-striped table-sm" id="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Category</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($items as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->category->name }}</td>
                    <td>
                        <a href="/items/item-detail/{{$item->slug}}" class="badge bg-info"><span data-feather="eye"></span></a>
                        <a href="/dashboard/items/{{ $item->slug }}/edit" class="badge bg-warning"><span data-feather="edit"></span></a>
                        <form action="/dashboard/items/{{ $item->slug }}" method="post" class="d-inline">
                            @method('delete')
                            @csrf
                            <button class="badge bg-danger border-0" onclick="return confirm('Are you sure you want to delete this?')">
                                <span data-feather="delete"></span></button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
