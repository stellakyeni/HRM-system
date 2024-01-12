@extends('layouts.main')

@section('content')
    <main>
        <div class="container-fluid px-4 mt-3">
            <h2>User Management</h2>
            @if (session()->has('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
            @endif
            <div class="row">
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-table me-1"></i>
                        <h5>( {{ $totalEntries }}) Records Found
                            <a href="{{ route('get-user') }}"> <button type="submit" class="btn btn-success btn-sm">
                                    <i class="fas fa-plus"></i>Add</button></a>
                        </h5>
                    </div>

                    <div class="card-body">
                        <table id="datatablesSimple">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>User Name</th>
                                    <th>User Role</th>
                                    <th>Employee Name</th>
                                    <th>Status</th>
                                    <th>Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($add_users as $add_user)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $add_user->user_name }}</td>
                                        <td>{{ $add_user->user_role }}</td>
                                        <td>{{ $add_user->employee_name }}</td>
                                        <td>{{ $add_user->status }}</td>
                                        <td> <button type="button" class="btn btn-default" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal-{{ $add_user->id }}">
                                                <i class="fas fa-trash" style= "color:red;"></i>
                                            </button>
                                            <a href="{{ route('edit-user', $add_user->id) }}"> <i class="fas fa-edit"
                                                    style="color: #00796b;"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>

            @foreach ($add_users as $add_user)
                <div class="modal fade" id="exampleModal-{{ $add_user->id }}" tabindex="-1"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <form action="{{ route('delete', $add_user->id) }}" method="post">
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
                                    <p>The selected User will be permanently deleted. Are you sure you want to continue?
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
