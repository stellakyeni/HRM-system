@extends('layouts.main')

@section('content')
    <main>
        <form class="border p-5">
            <div class="container-fluid px-4 mt-3">
                <div class="container text-left">
                    <div class="row align-items-center">
                        <div class="col">
                            <hr>
                            <h6>Note:</h6>

                            <ul>
                                <li>Column order should not be changed
                                <li> First Name and Last Name are compulsory</li>
                                <li> All date fields should be in YYYY-MM-DD format</li>
                                <li> If gender is specified, value should be either Male or Female
                                </li>
                                <li> Each import file should be configured for 100 records or less
                                </li>
                                <li> Multiple import files may be required</li>
                                <li></i>Sample CSV file : <button class="btn btn btn-link btn-sm">Download</button></li>
                            </ul>
                        </div>
                        <hr>
                        <div class="col">
                            <label for="photo">Select File*</label>
                            <input type="file" id="photo" name="photo" accept="image/*">


                            <div id="liveAlertPlaceholder"></div>
                            <button type="button" class="btn btn-danger btn-sm" id="liveAlertBtn">Accepts upto
                                1Mb</button><br>
                        </div>

                        <div class="col">
                            <button type="submit" class="btn btn-success btn-sm"> <i
                                    class="fas fa-upload"></i>Upload</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </main>
@endsection
