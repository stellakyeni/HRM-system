@extends('layouts.main')

@section('content')
    <main>
        <div class="container-fluid px-4 mt-5">
            <div class="bs-stepper-content">
                <h5>General Information
                    <button type="submit" class="btn btn-warning btn-sm"> <i class="fas fa-edit"></i>Edit</button>
                </h5>
                <hr>
                <div class="row g-3">
                    <div class="col-md-3">
                        <label class="form-label">General Information</label>
                        <input type="text" class="form-control" aria-label="general information" name="general_information"
                            required>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Number of Employees</label>
                        <input type="text" class="form-control" aria-label="numberOfEmployees" name="number_of_employees"
                            required>
                    </div>

                    <div class="col-md-3">
                        <label class="form-label">Registration Number</label>
                        <input type="text" class="form-control" aria-label="registration Number"
                            name="registraion_number" required>
                    </div>

                    <div class="col-md-3">
                        <label class="form-label">Tax Id</label>
                        <input type="text" class="form-control" class="form-control" aria-label="taxId"
                            name="tax_id"required>
                    </div>

                    <div class="col-md-3">
                        <label class="form-label">Phone</label>
                        <input type="text" class="form-control" aria-label="phoneNumber" name="phone_number" required>
                    </div>

                    <div class="col-md-3">
                        <label class="form-lable">Fax</label>
                        <input type="text" class="form-control" aria-label="fax" name="fax" required>
                    </div>

                    <div class="col-md-3">
                        <label class="form-lable">Email</label>
                        <input type="email" class="form-control" aria-label="fax" name="fax" required>
                    </div>
                </div>

                <div class="row g-3">
                    <div class="col-md-3">
                        <label class="form-lable">Address Street 1</label>
                        <input type="text" class="form-control" aria-label="addressStreet1" name="address_street1"
                            required>
                    </div>

                    <div class="col-md-3">
                        <label class="form-lable">Address Street 2</label>
                        <input type="text" class="form-control" aria-label="addressStreet2" name="address_street2"
                            required>
                    </div>

                    <div class="col-md-3">
                        <label class="form-lable">City</label>
                        <input type="text" class="form-control" aria-label="city" name="city" required>
                    </div>

                    <div class="col-md-3">
                        <label class="form-lable">State/Provice</label>
                        <input type="text" class="form-control" aria-label="state" name="state" required>
                    </div>

                    <div class="col-md-3">
                        <label class="form-lable">Zip</label>
                        <input type="text" class="form-control" aria-label="zip" name="zip" required>
                    </div>

                    <div class="col-md-3">
                        <label class="form-lable">Country</label>
                        <input type="text" class="form-control" aria-label="country" name="country" required>
                    </div>

                    <div class="col-md-3">
                        <label class="form-lable">Notes</label>
                        <input type="text" class="form-control" aria-label="fax" name="notes" required>
                    </div>

                </div>

            </div>



        </div>
    </main>
@endsection
