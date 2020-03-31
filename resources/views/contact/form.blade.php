@extends('layout.app')


@section('title', 'contact form')

@section('content')
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form method="post" id="contact_form" class="form-horizontal">
        @csrf
        <div class="form-group">
            <label class="control-label col-md-4" for="firstName">First name:</label>
                <div class="col-md-8">
                    <input class="form-control" id="FirstName_id" type="text" name="firstName" class="form-control @error('firstName') is-invalid @enderror" value="{{ old('firstName') }}" required autocomplete="firstName" autofocus>
                </div>
        </div>

        <div class="form-group">
            <label class="control-label col-md-4" for="lastName">Last name:</label>
                <div class="col-md-8">
                    <input class="form-control" id="lastName_id" type="text" name="lastName" class="form-control @error('lastName') is-invalid @enderror" value="{{ old('lastName') }}" required autocomplete="lastName" autofocus>
                </div>
        </div>

        <div class="form-group">
            <label class="control-label col-md-4" for="roomNumber">Room number:</label>
                <div class="col-md-8">
                    <input class="form-control" id="RoomNumber_id" type="number" name="roomNumber" class="form-control @error('roomNumber') is-invalid @enderror" value="{{ old('roomNumber') }}" required autocomplete="roomNumber" autofocus>
                </div>
        </div>

        <div class="form-group">
            <label class="control-label col-md-4" for="category">Choose a category:</label>
                <div class="col-md-8">
                    <select multiple class="form-control" id="category_id" name="category" class="form-control @error('category') is-invalid @enderror" value="{{ old('category') }}" required autocomplete="category" autofocus>
                        <option value="roomServes">room service</option>
                        <option value="complaint">complaint</option>
                        <option value="video">video</option>
                        <option value="others">others</option>
                    </select>
                </div>
        </div>

        <div class="form-group">
            <label class="control-label col-md-4" for="message">Message:</label>
                <div class="col-md-8">
                    <input class="form-control" id="Message_id" type="text" name="message" class="form-control @error('message') is-invalid @enderror" value="{{ old('message') }}" required autocomplete="message" autofocus>
                </div>
        </div>

        <br />
        <div class="form-group" align="center">
            <a class="btn btn-success btn-md" href="/guest">Back to home</a>
            <input type="submit" name="action_button" id="action_button" class="btn btn-warning" value="Send form" />
        </div>
    </form>
@endsection
