@extends('layouts.main')

@section('content')
    <main>
        <div class="container-fluid px-4 mt-4">
            <form class="row g-3">
                <h4>Employee Reports</h4>
                <hr>
                <div class="col-md-5">
                    <label for="employee_name" class="form-label">Employee Name:</label>
                    <input type="employee_name" class="form-control" id="employee_name" name="employee_name"
                        placeholder="type Hints" required><br>
                </div>

                <div class="col-5">
                    <button type="submit" class="btn btn-info btn-sm">Reset</button>
                    <button type="submit" class="btn btn-success btn-sm">Search</button>
                </div>
            </form>


            <div class="row">
                <div class="card mb-2">
                    <div class="card-header">
                        <i class="fas fa-table me-1"></i>
                        <h5>(1) Records Found
                            <button type="submit" class="btn btn-success btn-sm"> <i class="fas fa-plus"></i>Add</button>
                        </h5>
                    </div>
                    <div class="card-body">
                        <table id="datatablesSimple">
                            <thead>
                                <tr>
                                    <th scope="row"><input type="checkbox" id="select"></th>
                                    <th>Name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tr>
                                <td> <input type="checkbox" class="checkbox"></td>
                                <td>All Employee Sub Unit Hierarchy Report</td>
                                <td><button class="btn btn btn-default"><i class="fas fa-trash" style= "color:red;"></i>
                                        <i class="fas fa-edit" style="color: #00796b;"></i></button>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
