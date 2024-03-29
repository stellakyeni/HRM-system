@extends('layouts.main')

@section('content')
    <main>
        <div class="container-fluid px-4 mt-2">
            <h4>Employement List Information</h4>

            <div class="row">
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-table me-1"></i>
                        <h5>( {{ $totalEntries }}) Records Found
                            <a href="{{ route('add-employee') }}"> <button type="submit" style="float-left"
                                    class="btn btn-success btn-sm"> <i class="fas fa-plus"></i>Add</button></a>
                        </h5>

                    </div>
                    <div class="card-body">
                        <table id="datatablesSimple">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Fist Name</th>
                                    <th>Last Name</th>
                                    <th>Job Title</th>
                                    <th>Employment Status</th>
                                    <th>Sub Unit</th>
                                    <th>Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($employees as $employee)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $employee->first_name }}</td>
                                        <td>{{ $employee->last_name }} </td>
                                        <td>{{ $employee->job_title }}</td>
                                        <td>{{ $employee->employment_status }}</td>
                                        <td>{{ $employee->sub_unit }}</td>

                                        <td>
                                            <button type="button" class="btn btn-default" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal-{{ $employee->id }}">
                                                <i class="fas fa-trash" style= "color:red;"></i>
                                            </button>
                                            <a href="{{ route('edit-employee', $employee->id) }}"> <button><i
                                                        class="fas fa-edit" style="color: #00796b;"></i></button>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            @foreach ($employees as $employee)
                <div class="modal fade" id="exampleModal-{{ $employee->id }}" tabindex="-1"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <form action="{{ route('delete-employee', $employee->id) }}" method="post">
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
    </main>
@endsection
