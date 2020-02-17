@extends('layout.admin')

@section('title', 'Video admin-create video')

@section('sidebar')
    @parent
    <p>This is appended to the master sidebar.</p>
@endsection

@section('content')
    <div>
        <h2>Create video</h2>
        <form method="POST">
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

            <label for="title">Title:</label>
                <input id="title" type="text" name="title">
                <br>
            <label for="description">Description:</label>
                <input id="description" type="text" name="description">
                <br>

                <label for="category-select">Choose a category:</label>
                    <select name="category" id="category-select">
                        <option value="">--Please choose an option--</option>
                        @foreach ($categories as $category)
                        <option value="{{ $category }}">{{ $category }}</option>
                        @endforeach
                    </select>
                <br>
            <label for="youtube_uid">YouTube UID:</label>
                <input id="youtube_uid" type="text" name="youtube_uid">
                <br>
            <label for="suitableKids">Video is suitable for kids:</label>
                <input type="checkbox" id="suitableKids" name="suitableKids">
                <br>

            <label for="available_to_watch">Video is available to watch:</label>
                <input type="checkbox" id="available_to_watch" name="available_to_watch">
                <br>

            <button class="btn btn-primary">Create video</button>
        </form>
    </div>
@endsection
