@extends('layouts.main')

@section('content')


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <h1>Business Central Employees</h1>

    @foreach($employees as $employee)
    <li>
        <strong>No:</strong> {{ $employee['No'] }}<br>
        <strong>Name:</strong> {{ $employee['First_Name'] }}<br>

    </li>
    @endforeach
</body>

</html>

@endsection
