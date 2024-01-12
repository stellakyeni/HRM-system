@extends('layouts.main')

@section('content')
    <main>
        <div class="container-fluid px-4 mt-3">
            <form class="row g-3" method="post" action="{{ route('add-user') }}">
                @csrf
                <div class="col-md-6">
                    <label for="username" class="form-label">User Name</label>
                    <input type="username" class="form-control" id="username" name="user_name" required>
                </div>
                <div class="col-md-6">
                    <label for="userRole" class="form-label">User Role</label>
                    <select id="inputUserRole" class="form-select" name="user_role" required>
                        <option value="">...Choose...</option>
                        <option value="admin">Admin</option>
                        <option value="ess">ESS</option>
                    </select>
                </div>
                <div class="col-6">
                    <label for="inputEmployeeName" class="form-label">Employee Name</label>
                    <select class="form-control" name="employee_name" id="employement_status">s
                        <option value="">Select Employee Name</option>
                        @foreach ($employees as $employee)
                            @php
                                $fullName = $employee->first_name . ' ' . $employee->last_name;
                            @endphp
                            <option value="{{ $fullName }}"
                                {{ session('selected_employee') == $fullName ? 'disabled' : '' }}>
                                {{ $fullName }}
                            </option>
                        @endforeach
                    </select>

                </div>
                <div class="col-6">
                    <label for="inputStatus" class="form-label">Status</label>
                    <select id="inputStatus" name="status" class="form-select">
                        <option value="">...Choose...</option>
                        <option value="enabled">Enabled</option>
                        <option value="disabled">Disabled</option>
                    </select>
                </div>

                <div class="col-6">
                    <button type="submit" class="btn btn-success btn-sm">Submit</button>


                </div>
            </form>
        </div>
    </main>
@endsection
