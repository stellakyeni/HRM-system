@extends('layouts.main')

@section('content')
<main>
    <div class="container-fluid px-4 mt-5">
        <div>
            <h4>Job Catergory
                <a href="{{ route('get-job-category') }}"> <button type="submit" style="float-left"
                        class="btn btn-success btn-sm"> <i class="fas fa-plus"></i>Add</button></a>
            </h4>
        </div>
        @if (session()->has('success'))
        ;
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
        @endif
        <div class="row">
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    ( ) Records Found

                </div>
                <div class="card-body">
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th scope="col"><input type="checkbox" id="selectAll"></th>
                                <th>Job Category</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($job_categories as $job_category)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $job_category->job_category }}</td>
                                <td>
                                    <button type="button" class="btn btn-default" data-bs-toggle="modal"
                                        data-bs-target="#exampleModal-{{ $job_category->id }}">
                                        <i class="fas fa-trash" style="color:red;"></i>
                                        Delete
                                    </button>

                                    {{-- <button type="button" class="btn btn-default"> --}}
                                    {{-- <i class="fas fa-edit" style="color: #00796b;"></i>Edit</button> --}}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        {{-- modal --}}
        <!-- Button trigger modal -->


        <!-- Modal -->
        @foreach ($job_categories as $job_category)
        <div class="modal fade" id="exampleModal-{{ $job_category->id }}" tabindex="-1"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <form action="{{ route('delete', $job_category->id) }}" method="post">
                @csrf
                @method('DELETE')
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Are you sure?</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p>This Job Category will be permanently deleted. Are you sure you want to continue?
                            <p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No,Cancel</button>
                            <button type="submit" class="btn btn-primary"><i class="fas fa-trash"
                                    style="color:red;"></i>Delete</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        @endforeach
    </div>
</main>
@endsection