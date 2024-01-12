@extends('layouts.main')

@section('content')
    <main>
        <div class="container-fluid px-4 mt-5">
            <div>
                <h4>Skills
                    <a href="{{ route('get-skill') }}"> <button type="submit" class="btn btn-success btn-sm"> <i
                                class="fas fa-plus"></i>Add</button>
                    </a>
                </h4>
                @if (session()->has('success'))
                    <div class="alert alert-success">
                        {{ session()->get('success') }}
                    </div>
                @endif
            </div>
            <div class="row">
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-table me-1"></i>
                        ( {{ $totalEntries }}) Records Found

                    </div>
                    <div class="card-body">
                        <table id="datatablesSimple">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($skills as $skill)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $skill->skill_name }}</td>
                                        <td>{{ $skill->skill_description }}</td>
                                        <td>
                                            <button type="button" class="btn btn-default btn-sm" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal">
                                                <i class="fas fa-trash" style= "color:red;"></i>
                                                Delete
                                            </button>
                                            {{-- 
                                    <button type="button" class="btn btn-default btn-sm">
                                        <i class="fas fa-edit" style="color: #00796b;"></i>Edit</button> --}}
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
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Are you sure?</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p>The selected record will be permanently deleted. Are you sure you want to continue?
                            <p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No,Cancel</button>
                            <button type="button" class="btn btn-primary"><i class="fas fa-trash"
                                    style= "color:red;"></i>Delete</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
