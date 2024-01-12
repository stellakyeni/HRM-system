@extends('layouts.main')

@section('content')
    <main>
        <div class="container-fluid px-4 mt-5">
            <div class="container mt-5">
                <h3>Add Job Title </h3>
                <form action="{{ route('update-jobTitle', $job_title->id) }}" enctype="multipart/form-data" method="POST"
                    class="job_title-form">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="jobTitle">Job Title</label>
                        <input type="text" name="job_title"class="form-control" id="jobTitle"
                            value="{{ $job_title->job_title }}" placeholder="Enter Job Title" required>
                    </div>
                    <div class="form-group">
                        <label for="jobDescription">Job Description</label>
                        <textarea class="form-control" id="jobDescription" name="job_description" rows="3"
                            placeholder="Enter Job Description" required>{{ $job_title->job_description }}</textarea>
                    </div>
                    <h5>Previous File<a href="{{ asset('storage/documents/' . $job_title->job_specification) }}"
                            target="_blank">{{ $job_title->job_specification }}</a></h5>
                    <div class="form-group">
                        <label for="jobSpecification">Job Specification (Upload File-PDF only)</label>
                        <input type="file" class="form-control-file" name="job_specification" id="jobSpecification">
                    </div>

                    <button type="submit" class="btn btn-success">Update</button>
                </form>
            </div>
        </div>
    </main>
@endsection
