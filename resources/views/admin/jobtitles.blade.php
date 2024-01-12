@extends('layouts.main')

@section('content')
    <main>
        <div class="container-fluid px-4 mt-5">
            <div class="column">
                <h4>Job Titles
                    <a href="{{ route('get-job-title') }}"> <button type="submit" style="float-left"
                            class="btn btn-success btn-sm"> <i class="fas fa-plus"></i>Add</button></a>
                </h4>
            </div>
            @if (session()->has('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
            @endif
            <div class="row">
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-table me-1"></i>
                        Records Found- <button class="btn btn btn-info">{{ $totalEntries }}</button>

                    </div>

                    <div class="card-body">
                        <table id="datatablesSimple">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th>Job Titles</th>
                                    <th>Description</th>
                                    <th>Job Specification</th>
                                    <th>Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($job_titles as $job_title)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $job_title->job_title }}</td>
                                        <td>{{ $job_title->job_description }}</td>
                                        <td><a href="{{ asset('storage/documents/' . $job_title->job_specification) }}"
                                                target="_blank">{{ $job_title->job_specification }}</a></td>
                                        <td>
                                            <button type="button" class="btn btn-default" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal-{{ $job_title->id }}">
                                                <i class="fas fa-trash" style= "color:red;"></i>
                                                Delete
                                            </button>

                                            <a href={{ route('edit-jobTitle', $job_title->id) }}> <button type="button"
                                                    class="btn btn-default">
                                                    <i class="fas fa-edit" style="color: #00796b;"></i>Edit</button></a>
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
            @foreach ($job_titles as $job_title)
                <div class="modal fade" id="exampleModal-{{ $job_title->id }}" tabindex="-1"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <form action="{{ route('delete-jobTitle', $job_title->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Are you sure?</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <p>The selected record will be permanently deleted. Are you sure you want to continue?
                                    <p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">No,Cancel</button>
                                    <button type="submit" class="btn btn-primary"><i class="fas fa-trash"
                                            style= "color:red;"></i>Delete</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            @endforeach
        </div>
    @endsection
