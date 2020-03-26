@extends('layout.app')


@section('title', 'contact form')

@section('content')
    <form method="post" id="contact_form" class="form-horizontal">
        <!-- weet niet wat @csrf betekent -->
        @csrf
        <div class="form-group">
            <label class="control-label col-md-4" for="firstName">First name:</label>
                <div class="col-md-8">
                    <input class="form-control" id="FirstName_id" type="text" name="firstName">
                </div>
        </div>

        <div class="form-group">
            <label class="control-label col-md-4" for="lastName">Last name:</label>
                <div class="col-md-8">
                    <input class="form-control" id="lastName_id" type="text" name="lastName">
                </div>
        </div>

        <div class="form-group">
            <label class="control-label col-md-4" for="roomNumber">Room number:</label>
                <div class="col-md-8">
                    <input class="form-control" id="RoomNumber_id" type="number" name="roomNumber">
                </div>
        </div>

        <div class="form-group">
            <label class="control-label col-md-4" for="category">Choose a category:</label>
                <div class="col-md-8">
                    <select multiple class="form-control" id="category_id" name="category">
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
                    <input class="form-control" id="Message_id" type="text" name="message">
                </div>
        </div>
  
        <br />
        <div class="form-group" align="center">
            <!-- <input type="hidden" name="action" id="action" value="Add" />
            <input type="hidden" name="id" id="hidden_id" /> -->
            <input type="submit" name="action_button" id="action_button" class="btn btn-warning" value="Add" />
        </div>  
    </form>
@endsection