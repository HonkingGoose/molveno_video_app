@extends('layout.admin')

@section('content')
<h2>Set room number</h2>

@if ($currentRoom)
<p>Current room number is set to: {{ $currentRoom }}</p>
@else
<div class="alert alert-danger">
    <ul>
        <li>No current room set</li>
    </ul>
</div>
@endif

@if ($guestForRoom)
<p>Guest for room is: {{ $guestForRoom->firstName }} {{ $guestForRoom->lastName }}</p>
@else
<div class="alert alert-danger">
    <ul>
        <li>No guest found for current room number</li>
    </ul>
</div>
@endif

@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form method="POST">
    @csrf
    <div class="form-group">
        <label class="whiteTextColor" for="roomNumber">Room number:</label>
        <input class="col-sm" class="form-control" id="roomNumber" type="number" name="roomNumber">
    </div>
    <div class="form-group">
        <button class="btn btn-success btn-sm">Set room number</button>
    </div>
</form>
@endsection
