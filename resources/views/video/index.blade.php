@extends('layout.app')

@section('title', 'List of videos')

@section('sidebar')
    @parent
    <p>This is appended to the master sidebar.</p>
@endsection

@section('content')
    <div class="videoCollectie">
        @foreach ($video as $video)
            <div class="videoItem">
                <a href="watch_video/{{$video->id}}"><img src="https://img.youtube.com/vi/{{$video->youtube_uid}}/0.jpg" alt=""></a>
                <p class="videoTitle">
                    {{$video->title}}
                </p>
            </div>
        @endforeach
    </div>
@endsection
