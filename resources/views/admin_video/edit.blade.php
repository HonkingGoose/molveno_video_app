@extends('layout.admin')


@section('content')
    <div>
        <h2>Edit video</h2>
        <form method="POST">
            @csrf
            @method('PUT')

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
                        <input class="form-control" id="title" type="text" name="title" value="{{ $video->title }}">
                    </div>
            </div>

            <div class="form-group">
                <label class="control-label col-sm-2" for="description">Description:</label>
                    <div class="col-sm-10">
                        <input class="form-control" id="description" type="text" name="description" value="{{ $video->description }}">
                    </div>
            </div>

            <div class="form-group">
                <label class="control-label col-sm-2" for="category-select">Choose a category:</label>
                    <div class="col-sm-10">
                        <select multiple class="form-control" name="category" id="category-select" multiple>
                            <option value="">--Please choose an option--</option>
                            @foreach ($categories as $category)
                            <option value="{{ $category }}" @if ($category === $video->category)selected @endif>{{ $category }}</option>
                            @endforeach
                        </select>
                    </div>
            </div>

            <div class="form-group">
                <label class="control-label col-sm-2" for="youtube_uid">Youtube UID:</label>
                    <div class="col-sm-10">
                        <input class="form-control" id="youtube_uid" type="text" name="youtube_uid" value="{{ $video->youtube_uid }}">
                    </div>
            </div>

            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <div class="checkbox">
                        <label for="suitableKids"><input type="checkbox" id="suitableKids" name="suitableKids" @if ($video->suitable_for_kids) checked @endif>Video is suitable for kids:</label>
                    </div>
                </div>
            </div>


            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <div class="checkbox">
                        <label for="available_to_watch"><input type="checkbox" id="available_to_watch" name="available_to_watch"  @if ($video->available_to_watch) checked @endif>Video is available to watch</label>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-default">Update video</button>
                </div>
            </div>

        </form>
    </div>
@endsection
