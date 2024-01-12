@extends('layouts.main')

@section('content')
    <main>
        <div class="container-fluid px-4 mt-3">
            @if (session()->has('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
            @endif
            <form class="row g-3" method="post" action="{{ route('update-user', $add_user->id) }}">
                @csrf
                @method('PUT')
                <div class="col-md-6">
                    <label for="username" class="form-label">User Name</label>
                    <input type="username" class="form-control" id="username" name="user_name"
                        value="{{ $add_user->user_name }}" required>
                </div>
                <div class="col-md-6">
                    <label for="userRole" class="form-label">User Role</label>
                    <select id="inputUserRole" class="form-select" name="user_role" value="{{ $add_user->user_role }}"
                        required>
                        <option value="">...Choose...</option>
                        <option value="admin">Admin</option>
                        <option value="ess">ESS</option>
                    </select>
                </div>
                <div class="col-6">
                    <label for="inputEmployeeName" class="form-label">Employee Name</label>
                    <select class="form-control" name="employee_name" id="employement_status"
                        value="{{ $add_user->employee_name }}">
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
                    <select id="inputStatus" name="status" class="form-select" value="{{ $add_user->status }}">
                        <option value="">...Choose...</option>
                        <option value="enabled">Enabled</option>
                        <option value="disabled">Disabled</option>
                    </select>
                </div>

                <div class="col-6">
                    <button type="submit" class="btn btn-success btn-sm" style ="border-radius:50%">Update</button>


                </div>
            </form>
        </div>
    </main>
@endsection
