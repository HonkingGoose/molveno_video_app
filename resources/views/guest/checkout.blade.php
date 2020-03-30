@extends('layout.admin')

@section('content')
<h2>Checkout guest</h2>


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
        <button class="btn btn-success btn-sm">Checkout guest from room number</button>
    </div>
</form>
@endsection
