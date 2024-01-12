@extends('layouts.main')

@section('content')
    <main>
        <div class="container-fluid px-4 mt-3">
            <!-- MultiStep Form -->
            <div class="container-fluid" id="grad1">
                <div class="row justify-content-center mt-0">
                    <div class="col-11 col-sm-9 col-md-7 col-lg-6 text-center p-0 mt-3 mb-2">
                        <div class="card px-0 pt-4 pb-0 mt-3 mb-3">
                            <h2><strong>Sign Up Your User Account</strong></h2>
                            <p>Fill all form field to go to next step</p>
                            <div class="row">
                                <div class="col-md-12 mx-0">
                                    <form id="msform">
                                        <!-- progressbar -->
                                        <ul id="progressbar">
                                            <li class="active" id="employeeDetails"><strong>Employee Details</strong></li>
                                            <li id="personalDetails"><strong>Personal Details</strong></li>
                                            <li id="contactDetails"><strong>Contact Details</strong></li>
                                            <li id="JobDetails"><strong>Job Details</strong></li>
                                            <li id="confirm"><strong>Finish</strong></li>
                                        </ul>
                                        <!-- fieldsets -->
                                        <fieldset>
                                            <div class="form-card">
                                                <h2 class="fs-title">EmployeeDetails</h2>


                                                <input type="text" placeholder="Employee First Name" name="first_name"
                                                    required />
                                                <input type="text" placeholder="Middle Name" id="employee_name"
                                                    name="middle_name" required />
                                                <input type="text" name="employee_id" placeholder="Employee ID"
                                                    required />

                                                <input type="button" name="next" class="next action-button"
                                                    value="Next Step" />
                                        </fieldset>

                                        <fieldset>
                                            <div class="form-card">
                                                <h2 class="fs-title">Personal Details</h2>

                                                <input type="text" name="first_name" placeholder="First Name" required />
                                                <input type="text" name="last_name" placeholder="Last Name" required />
                                                <input type="text" name="Employee_Id" placeholder="Employee Id."
                                                    required />
                                                <input type="text" name="National_Id" placeholder="National Id"
                                                    required />
                                                <input type="text" name="driving_licence"
                                                    placeholder="Driving Licence Number" required />
                                                <div class="col-3">
                                                    <label class="pay">Expiry Date*</label>
                                                </div>
                                                <div class="col-9">
                                                    <select class="list-dt" id="month" name="expmonth">
                                                        <option selected>Month</option>
                                                        <option>January</option>
                                                        <option>February</option>
                                                        <option>March</option>
                                                        <option>April</option>
                                                        <option>May</option>
                                                        <option>June</option>
                                                        <option>July</option>
                                                        <option>August</option>
                                                        <option>September</option>
                                                        <option>October</option>
                                                        <option>November</option>
                                                        <option>December</option>
                                                    </select>
                                                    <select class="list-dt" id="year" name="expyear">
                                                        <option selected>Year</option>
                                                    </select>
                                                </div>


                                                <input type="text" name="snn" placeholder="SNN " required />
                                                <input type="text" name="sin" placeholder="SIN" required />
                                                <input type="text" name= "military_service"
                                                    placeholder="Military Service">

                                                <div class="col-3">
                                                    <label class="pay">Expiry Date*</label>
                                                </div>
                                                <div class="col-9">
                                                    <select class="list-dt" id="nationality" name="expmonth">
                                                        <option selected>Nationality</option>
                                                        <option>Kenya</option>
                                                        <option>Fagason</option>
                                                    </select>
                                                </div>
                                                <div class="col-3">
                                                    <label>Marital Status:</label>
                                                    <select id="maritalStatus" name="marital_status" class="form-conotrol">
                                                        <option>...select your marital status</option>
                                                        <option value="married">Married</option>
                                                        <option value="single">single</option>
                                                        <option value="divorced">Divorced</option>
                                                        <option value="window">Window</option>
                                                    </select>
                                                </div>
                                                <div class="col-3">
                                                    <label>Gender</label>
                                                    <input type="radio" id="gender" name="gender" value="male">
                                                    <label for="male">Male</label>
                                                    <input type="radio" id="gender" name="gender" value="female">
                                                    <label for="female">Female</label>
                                                </div>
                                                <div class="col-3">
                                                    <input type="text" name= "military_service" class="form-control"
                                                        placeholder="Military Service">
                                                </div>
                                                <div class="col-3">
                                                    <label>Blood Type:</label>
                                                    <select id="bloodGroup" name="blood_type">
                                                        <option>...your Blood Type</option>
                                                        <option value="A+"> A+</option>
                                                        <option value="A-">A-</option>
                                                        <option value="B+">B+</option>
                                                        <option value="B-">B-</option>
                                                        <option value="O+">O+</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <input type="button" name="previous" class="previous action-button-previous"
                                                value="Previous" />
                                            <input type="button" name="next" class="next action-button"
                                                value="Next Step" />
                                        </fieldset>


                                        <fieldset>
                                            <div class="form-card">
                                                <h2 class="fs-title">Job employee Details</h2>
                                                <div class="radio-group">
                                                    <div class='radio' data-value="credit"><img
                                                            src="https://i.imgur.com/XzOzVHZ.jpg" width="200px"
                                                            height="100px">
                                                    </div>

                                                    <br>
                                                </div>
                                                <label class="pay">Joined Date*</label>
                                                <input type="date" id="" class="form-control"
                                                    placeholder="Joined Date">


                                                <div class="row">
                                                    <div class="col-9">
                                                        <label>Job Title:</label>
                                                        <select id="jobTitle" name="job_tittle" class="form-conotrol">
                                                            <option>...Job Tittle</option>
                                                            <option value="accounts"> Accounts</option>
                                                            <option value="it Officer-">IT officer</option>
                                                    </div>

                                                    <div class="col-3">
                                                        <label>Job Category:</label>
                                                        <select id="jobTitle" name="job_tittle" class="form-conotrol">
                                                            <option>...Job Category</option>
                                                            <option value="accounts"> Manager</option>
                                                            <option value="it Officer-">Director</option>
                                                    </div>

                                                    <div class="col-3">
                                                        <label>Sub Unit:</label>
                                                        <select id="jobTitle" name="sub_unit" class="form-conotrol">
                                                            <option>...Sub Unit</option>
                                                            <option value="accounts"> Administarion</option>
                                                            <option value="it Officer-">Engineering</option>
                                                        </select>
                                                    </div>

                                                    <div class="col-3">
                                                        <label>Employment Status:</label>
                                                        <select id="jobTitle" name="job_tittle" class="form-conotrol">
                                                            <option>...Employemt Status</option>
                                                            <option value="accounts"> Contract</option>
                                                            <option value="it Officer-">Full Time Permanent</option>
                                                    </div>
                                                </div>



                                            </div>
                                            <input type="button" name="previous" class="previous action-button-previous"
                                                value="Previous" />
                                            <input type="button" name="make_payment" class="next action-button"
                                                value="Confirm" />
                                        </fieldset>


                                        <fieldset>
                                            <div class="form-card">
                                                <h2 class="fs-title">Contact Details</h2>
                                                <div class="radio-group">
                                                    <div class='radio' data-value="credit"><img
                                                            src="https://i.imgur.com/XzOzVHZ.jpg" width="200px"
                                                            height="100px">
                                                    </div>

                                                    <br>
                                                </div>
                                                <label class="pay">Country*</label>
                                                <i class="zmdi zmdi-map"></i><input type="text" class="form-control"
                                                    name="country" placeholder="Country">

                                                <div class="row">
                                                    <div class="col-9">
                                                        <label class="pay">State*</label>
                                                        <i class="zmdi zmdi-pin"></i><input type="text"
                                                            class="form-control" placeholder="State">
                                                    </div>
                                                    <div class="col-3">
                                                        <label class="pay">City*</label>
                                                        <i class="zmdi zmdi-pin-drop"></i> <input type="text"
                                                            class="form-control" placeholder="City">
                                                    </div>
                                                    <div class="col-3">
                                                        <label class="pay">Phone Number*</label>
                                                        <i class="zmdi zmdi-smartphone-android"></i>
                                                        <input type="text" class="form-control"
                                                            placeholder="Phone Number">
                                                    </div>

                                                    <div class="col-3">
                                                        <label class="pay">Email*</label>
                                                        <i class="zmdi zmdi-email"></i>
                                                        <input type="text" name="email"class="form-control"
                                                            placeholder="Email ">

                                                    </div>
                                                </div>
                                                <input type="button" name="previous"
                                                    class="previous action-button-previous" value="Previous" />
                                                <input type="button" name="make_payment" class="next action-button"
                                                    value="Confirm" />
                                        </fieldset>

                                        <fieldset>
                                            <div class="form-card">
                                                <h2 class="fs-title text-center">Success !</h2>
                                                <br><br>
                                                <div class="row justify-content-center">
                                                    <div class="col-3">
                                                        <img src="https://img.icons8.com/color/96/000000/ok--v2.png"
                                                            class="fit-image">
                                                    </div>
                                                </div>
                                                <br><br>
                                                <div class="row justify-content-center">
                                                    <div class="col-7 text-center">
                                                        <h5>You Have Successfully Added the Employee</h5>
                                                    </div>
                                                </div>
                                            </div>
                                        </fieldset>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
