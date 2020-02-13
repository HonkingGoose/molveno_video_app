@extends('layout.app')

@section('title', $video->title)

@section('sidebar')
    @parent
    <p>This is appended to the master sidebar.</p>
@endsection

@section('content')
    <div>
        <iframe width="560" height="315" src="https://www.youtube.com/embed/{{ $video->uid }}?controls=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    </div>
    <div>
        <p>title: {{ $video->title }}</p>
        <p>description: {{ $video->description }}</p>
        <p>category: {{ $video->category }}</p>
    </div>
@endsection