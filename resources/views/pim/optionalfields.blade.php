@extends('layouts.main')

@section('content')
    <main>
        <div class="container-fluid px-4 mt-5">
            <div class="container text-center">
                <div class="row align-items-start">
                    <b>
                        <h4>Optional Fields</h4><b>
                            <div class="col">
                                <b>
                                    <h5>Show Deprecated Fields</h5>
                                </b>
                            </div>
                            <p> Show Nick Name, Smoker and Military Service in Personal Details</p><input type="checkbox"
                                class="checkbox">Yes
                            <hr>

                            <div class="col">

                                <h4>Contry Specific Information</h4>

                            </div>
                            <p>Show SSN fields in personal details</p> <input type="checkbox" class="checkbox">Yes
                            <p>Show SIN fields in personal details</p><input type="checkbox" class="checkbox">Yes
                            <p>Show US tax Exemptions Menu</p> <input type="checkbox" class="checkbox"> yes
                            <hr>
                            <div class="col">
                                <button type="button" class="btn btn-success btn-sm" style="border-radius:40%">
                                    Save</button>
                            </div>
                </div>
            </div>
        </div>
    </main>
@endsection
