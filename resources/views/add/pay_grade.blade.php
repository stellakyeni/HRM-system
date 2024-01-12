@extends('layouts.main')

@section('content')
    <main>
        <div class="container-fluid px-4 mt-5">
            <div class="container mt-5">
                <h3>Add Pay Grade</h3>
                <form action="{{ route('store-pay-grade') }}" method="POST" class="job_title-form">
                    @csrf
                    <div class="form-group">
                        <label for="jobTitle">Country Name</label>
                        <input type="text" name="country_name"class="form-control" id="jobTitle"
                            placeholder="Enter Country Name" required>
                    </div>

                    <div class="form-group">
                        <label for="currency">Currency</label>
                        <input type="text" name="currency_name"class="form-control" id="currency_name"
                            placeholder="Enter Currency Name" required>
                    </div>
                    <button type="submit" class="btn btn-success">Save</button>
                </form>
            </div>
        </div>
    </main>
@endsection
