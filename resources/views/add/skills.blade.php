@extends('layouts.main')
@section('content')
    <main>
        <div class="container-fluid px-4 mt-5">
            <div class="container mt-5">
                <h3>Add Skill</h3>
                <form action="{{ route('add-skill') }}" method="POST" class="skill-form">
                    @csrf
                    <div class="form-group">
                        <label for="jobTitle">Skill Name</label>
                        <input type="text" name="skill_name"class="form-control" id="jobTitle"
                            placeholder="Enter Skill Name" required>
                    </div>
                    <div class="form-group">
                        <label for="currency">Description</label>
                        <input type="text" name="skill_description"class="form-control" id="currency_name"
                            placeholder="Enter the Skill Description" required>
                    </div>
                    <button type="submit" class="btn btn-success">Save</button>
                </form>
            </div>
        </div>
    </main>
@endsection
