@extends('layouts.main')

@section('content')
    <main>
        <div class="container-fluid px-4 mt-5">
            <div class="container mt-5">
                <h3>Add Job Title </h3>
                <form action="{{ route('store-job-title') }}" enctype="multipart/form-data" method="POST"
                    class="job_title-form">
                    @csrf
                    <div class="form-group">
                        <label for="jobTitle">Job Title</label>
                        <input type="text" name="job_title"class="form-control" id="jobTitle"
                            placeholder="Enter Job Title" required>
                    </div>
                    <div class="form-group">
                        <label for="jobDescription">Job Description</label>
                        <textarea class="form-control" id="jobDescription" name="job_description"rows="3" placeholder="Enter Job Description"
                            required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="jobSpecification">Job Specification (Upload File-PDF only)</label>
                        <input type="file" class="form-control-file" name="job_specification" id="jobSpecification"
                            required>
                    </div>
                    <div class="form-group">
                        <label for="notes">Notes</label>
                        <textarea class="form-control" id="notes" rows="3" name="notes" placeholder="Enter Notes"></textarea>
                    </div>
                    <button type="submit" class="btn btn-success">Save</button>
                </form>
            </div>
        </div>
    </main>
@endsection
