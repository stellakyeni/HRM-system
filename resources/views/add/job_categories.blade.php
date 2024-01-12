@extends('layouts.main')

@section('content')
    <main>
        <div class="container-fluid px-4 mt-5">
            <div class="container mt-5">
                <h3>Add Job Category </h3>
                <form action="{{ route('store-job-category') }}" method="POST" class="job-category-form">
                    @csrf
                    <div class="form-group">
                        <label for="jobCategory">Job Category</label>
                        <input type="text" name="job_category"class="form-control" id="jobCategories"
                            placeholder="Enter Job category" required>
                    </div>
                    <button type="submit" class="btn btn-success">Save</button>
                </form>
            </div>
        </div>
    </main>
@endsection
