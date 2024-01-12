@extends('layouts.main')

@section('content')
    <main>
        <div class="container-fluid px-4 mt-5">
            <div class="bs-stepper-content">
                <div class="row g-3">
                    <div class="col-md-3">
                        <label class="form-label">Name</label>
                        <input type="text" class="form-control" aria-label="general information" name="name" required>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">City</label>
                        <input type="text" class="form-control" aria-label="numberOfEmployees" name="city" required>
                    </div>

                    <div class="col-md-3">
                        <label class="form-label">Country</label>
                        <input type="text" class="form-control" aria-label="country" name="registraion_number"
                            required><br>
                    </div>
                </div>
                <div class="col-lg-4">
                    <button type="submit" class="btn btn-success btn-sm">Search</button>
                    <button type="submit" class="btn btn-info btn-sm">Reset</button><br>
                </div>
            </div>

            <div>
                <p>Location</p>
                <button type="submit" class="btn btn-danger "> <i class="fas fa-plus"></i>Add</button>
            </div>
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
                                    <th>Name</th>
                                    <th>City</th>
                                    <th>Country</th>
                                    <th>Phone</th>
                                    <th>No. Employees</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tr>

                                <td> <input type="checkbox" class="checkbox"></td>
                                <td>Canadian</td>
                                <td>Ottawa</td>
                                <td>Ottawa</td>
                                <td>254 715576395</td>
                                <td>10</td>
                                <td>
                                    <button type="button" class="btn btn-default" data-bs-toggle="modal"
                                        data-bs-target="#exampleModal">
                                        <i class="fas fa-trash" style= "color:red;"></i>
                                        Delete
                                    </button>

                                    <button type="button" class="btn btn-default">
                                        <i class="fas fa-edit" style="color: #00796b;"></i>Edit</button>
                                </td>
                            </tr>
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
