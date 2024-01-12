@extends('layouts.main')

@section('content')
    <main>
        <div class="container-fluid px-4 mt-5">
            <div class="container mt-5">
                <h3>Add Employment status</h3>
                <form action="{{ route('store-employment-status') }}" method="POST" class="job-category-form">
                    @csrf
                    <div class="form-group">
                        <label for="jobCategory">Employement Status</label>
                        <input type="text" name="employment_status"class="form-control" id="jobCategories"
                            placeholder="Enter Employement Status" required>
                    </div>
                    <button type="submit" class="btn btn-success">Save</button>
                </form>
            </div>
        </div>
    </main>
@endsection
