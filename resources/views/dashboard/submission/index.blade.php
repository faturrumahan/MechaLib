@extends('dashboard.layout.main')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Your Submission</h1>
        <a class="btn btn-primary" href="/dashboard/submissions/create" role="button">Add Submission</a>
    </div>
    <div class="col-lg-8">
        @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <input type="text" class="form-control" id="nameSearch" onkeyup="tableSearch()" placeholder="Find your submission">
    </div>
    <div class="table-responsive col-lg-8 mt-1">
        <table class="table table-striped table-sm" id="submissionTable">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Switch</th>
                    <th scope="col">Keycaps</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($submissions as $submission)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $submission->name }}</td>
                    <td>{{ $submission->switch_name }}</td>
                    <td>{{ $submission->keycaps_name }}</td>
                    <td style="display: none">{{ $submission->case_name }}</td>
                    <td style="display: none">{{ $submission->stab_name }}</td>
                    <td style="display: none">{{ $submission->pcb_name }}</td>
                    <td style="display: none">{{ $submission->kit_name }}</td>
                    <td style="display: none">{{ $submission->plate_name }}</td>
                    <td>
                        <a href="/items/submission-detail/{{$submission->slug}}" class="badge bg-info"><span data-feather="eye"></span></a>
                        <a href="/dashboard/submissions/{{ $submission->slug }}/edit" class="badge bg-warning"><span data-feather="edit"></span></a>
                        <form action="/dashboard/submissions/{{ $submission->slug }}" method="post" class="d-inline">
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
