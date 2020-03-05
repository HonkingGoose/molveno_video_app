@extends('layout.app')





@section('content')


<h1 class="titlePage">Molveno Video App</h1>

    <div class="videoCollectie">
        @foreach ($video as $video)
            <a href="watch_video/{{$video->id}}" class="videoItem">

                <img src="https://img.youtube.com/vi/{{$video->youtube_uid}}/0.jpg" alt="">

                <p class="videoTitle">
                    {{$video->title}}
                </p>
                <p class="videoDescription">
                    {{$video->description}}
                </p>
            </a>
        @endforeach
    </div>
@endsection
