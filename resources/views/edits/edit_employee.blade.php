@extends('layouts.main')

@section('content')
    <main>
        <div class="container-fluid px-4 mt-2">

            <h2>Fill Employee Details</h2>
            @if (session()->has('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
            @endif
            <form action="{{ route('update-employee', $employee->id) }}" method="post">
                @csrf
                @method('PUT')
                <!-- Employee Details -->
                <h3 class="fs-title">Employee Details</h3>
                <div class="row">
                    <div class="col-6">
                        <label for="first_name">First Name:</label>
                        <input class="form-control" type="text" name="first_name" placeholder="Enter your first Name"
                            value="{{ $employee->first_name }}" required>
                    </div>
                    <div class="col-6">
                        <label for="last_name">Last Name:</label>
                        <input class="form-control" type="text" name="last_name" placeholder="Enter your Last Name"
                            value="{{ $employee->last_name }}" required>
                    </div>
                    <div class="col-6">
                        <label for="employment_id">Employment Id:</label>
                        <input class="form-control" type="text" name="employee_id" value="{{ $employee->employee_id }}"
                            placeholder="Enter your Employment ID"required>
                    </div>
                    <div class="col-6">
                        <label for="national_id">National Id:</label>
                        <input class="form-control" type="text" name="national_id" placeholder="Enter your National Id"
                            value="{{ $employee->national_id }}" required>
                    </div>
                </div>
                <hr>
                <!-- Personal Details -->
                <h3 class="fs-title">Personal Details</h3>
                <div class="row">
                    <div class="col-4">
                        <label for="driving_license">Driving Licence Number:</label>
                        <input class="form-control" type="text" name="driving_license"
                            value="{{ $employee->driving_license }}" required>
                    </div>
                    <div class="col-4">
                        <label for="license_expiry">Licence Expiry Date:</label>
                        <input class="form-control" type="date" name="license_expiry" placeholder="dd/mm/yyyy"
                            value="{{ $employee->date }}" required>
                    </div>

                    <div class="col-4">
                        <label for="snn">SNN:</label>
                        <input class="form-control" type="text" name="snn" value="{{ $employee->snn }}" required>
                    </div>
                    <div class="col-4">
                        <label for="sin">SIN:</label>
                        <input class="form-control" type="text" name="sin" value="{{ $employee->sin }}" required>
                    </div>
                    <div class="col-4">
                        <label for="military_service">Military Service:</label>
                        <input class="form-control" type="text" name="military_service"
                            value="{{ $employee->military_service }}" required>
                    </div>



                    <div class="col-4">
                        <label for="marital_status">Marital Status:</label>
                        <select name="marital_status" class="form-control" value="{{ $employee->marital_status }}">
                            <option class="form-control" value="single">Single</option>
                            <option class="form-control" value="single">Single</option>
                            <option class="form-control"value="married">Married</option>
                            <option class="form-control" value="divorced">Divorced</option>
                            <!-- Add more options as needed -->
                        </select>
                    </div>
                    <div class="col-4">
                        <label for="gender">Gender:</label>
                        <div class="form-control">
                            <label><input type="radio" name="gender" value="male" required> Male</label>
                            <label><input type="radio" name="gender" value="female" required> Female</label>
                        </div>
                    </div>
                    <div class="col-4">
                        <label for="blood_type">Blood Type:</label>
                        <select name="blood_type" class="form-control" value="{{ $employee->blood_type }}">
                            <option class="form-control" value="A+">A+</option>
                            <option class="form-control" value="B+">B+</option>
                            <option class="form-control"value="O+">O+</option>
                            <!-- Add more options as needed -->
                        </select>
                    </div>
                </div>
                <hr>
                <!-- Contact Details -->
                <h3 class="fs-title">Contact Details</h3>
                <div class="row">
                    <div class="col-4">
                        <label for="country">Country:</label>
                        <select class="form-control" name="country" id="job_category"
                            value="{{ $employee->country }}">>
                            <option value="">Select your country</option>
                            @foreach ($countries as $country)
                                <option value="{{ $country->country_name }}">{{ $country->country_name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-4">
                        <label for="nationality">Nationality:</label>
                        <select class="form-control" name="nationality" id="nationality"
                            value="{{ $employee->nationality }}">
                            <option value="">Select your Nationality</option>
                            @foreach ($countries as $country)
                                <option value="{{ $country->nationality }}">{{ $country->nationality }}
                                </option>
                            @endforeach
                        </select>
                        </select>
                    </div>
                    <div class="col-4">
                        <label for="state">State:</label>
                        <input class="form-control" type="text" name="state" value="{{ $employee->state }}"
                            required>
                    </div>
                    <div class="col-4">
                        <label for="city">City:</label>
                        <input class="form-control" type="text" name="city"
                            value="{{ $employee->city }}"required>
                    </div>
                    <div class="col-4">
                        <label for="country_code">Country Code:</label>
                        <select class="form-control" name="country_code" value="{{ $employee->country_code }}"
                            id="job_category">
                            <option value="">Select your country code</option>
                            @foreach ($countries as $country)
                                <option value="{{ $country->country_code }}">{{ $country->country_code }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-4">
                        <label for="phone_number">Phone Number:</label>
                        <input class="form-control" type="text" name="phone_number"
                            value="{{ $employee->phone_number }}" required>
                    </div>
                    <div class="col-4">
                        <label for="email">Email:</label>
                        <input class="form-control" type="email" name="email" value="{{ $employee->email }}"
                            required>
                    </div>
                </div>
                <hr>
                <!-- Job Details -->
                <h3>Job Details</h3>
                <div class="row">
                    <div class="col-4">
                        <label for="joined_date">Joined Date:</label>
                        <input class="form-control" type="date" name="joined_date"
                            value="{{ $employee->joined_date }}" placeholder="dd/mm/yyyy" required>
                    </div>
                    <div class="col-4">
                        <label for="job_title">Job Title:</label>
                        <select class="form-control" name="job_title" id="job_title" value="{{ $employee->job_title }}"
                            required>
                            <option value="">Select Job Title</option>
                            @foreach ($job_titles as $job_title)
                                <option value="{{ $job_title->job_title }}">{{ $job_title->job_title }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-4">
                        <label for="job_category">Job Category:</label>
                        <select class="form-control" name="job_categories" value="{{ $employee->job_categories }}"
                            id="job_category" required>
                            <option value="">Select Job Category</option>
                            @foreach ($job_categories as $job_category)
                                <option value="{{ $job_category->job_category }}">{{ $job_category->job_category }}
                                </option>
                            @endforeach
                        </select>
                    </div>



                    <div class="col-6">
                        <label for="sub_unit">Sub Unit:</label>
                        <input class="form-control" type="text" name="sub_unit" value="{{ $employee->sub_unit }}"
                            required>
                    </div>
                    <div class="col-6">
                        <label for="employment_status">Employment Status:</label>
                        <select class="form-control" name="employment_status" value="{{ $employee->employment_status }}"
                            id="employement_status">
                            <option value="">Select Employment Status</option>
                            @foreach ($employment_statuses as $employment_status)
                                <option value="{{ $employment_status->employment_status }}">
                                    {{ $employment_status->employment_status }}
                                </option>
                            @endforeach
                        </select>
                        <br>
                    </div>
                </div>

                <!-- Submit Button -->
                <button type="submit" class="btn btn-success" style="border-radius:80%">Update</button>
            </form>

        </div>
    </main>
@endsection
