@extends('layout.admin')


@section('content')
    <div>
        <h2>Create video</h2>
        <form class="form-horizontal" method="POST">
            @csrf

            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <div class="form-group">
                <label class="control-label col-sm-2" for="title">Title:</label>
                    <div class="col-sm-10">
                        <input class="form-control" id="title" type="text" name="title" placeholder="Enter title">
                    </div>
            </div>

            <div class="form-group">
                <label class="control-label col-sm-2" for="description">Description:</label>
                    <div class="col-sm-10">
                        <input class="form-control" id="description" type="text" name="description" placeholder="Enter descrption">
                    </div>
            </div>

            <div class="form-group">
                <label class="control-label col-sm-2" for="category-select">Choose a category:</label>
                    <div class="col-sm-10">
                        <select multiple class="form-control" name="category" id="category-select" multiple>
                            <option value="">--Please choose an option--</option>
                            @foreach ($categories as $category)
                            <option value="{{ $category }}">{{ $category }}</option>
                            @endforeach
                        </select>
                    </div>
            </div>

            <div class="form-group">
                <label class="control-label col-sm-2" for="youtube_uid">Youtube UID:</label>
                    <div class="col-sm-10">
                        <input class="form-control" id="youtube_uid" type="text" name="youtube_uid" placeholder="Enter Youtube UID">
                    </div>
            </div>

            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <div class="checkbox">
                        <label for="suitableKids"><input type="checkbox" id="suitableKids" name="suitableKids">Suitable for kids:</label>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <div class="checkbox">
                        <label for="available_to_watch"><input type="checkbox" id="available_to_watch" name="available_to_watch">Video is available to watch</label>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-default">Submit</button>
                </div>
            </div>
        </form>
    </div>
@endsection
