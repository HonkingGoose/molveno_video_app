@extends('layout.admin')

@section('content')
<div>
    <h2>Properties Video</h2>
    <p>type: {{ $video->title }}</p>
    <p>naam: {{ $video->description }}</p>
    <button onclick="window.history.back()">Back to previous page</button><br>
    <a href="{{ route('admin_video.index') }}">Back to index</a><br>
    <a href="{{ route('admin_video.edit', [$video->id]) }}">Edit</a>
</div>
@endsection
