@extends('layout.admin')

@section('title', 'Video admin')

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
                <input id="description" type="text">
                <br>

                <label for="category-select">Choose a category:</label>
                    <select name="category" id="category-select">
                        <option value="">--Please choose an option--</option>
                        @foreach ($categories as $category)
                        <option value="{{ $category }}">{{ $category }}</option>
                        @endforeach
                    </select>
                <br>
                <!-- To build: available_to_watch checkbox
                    suitable_for_kids checkbox
                    textbox for YouTube uid -->
            <button class="btn btn-primary">Create video</button>
        </form>
    </div>
@endsection
