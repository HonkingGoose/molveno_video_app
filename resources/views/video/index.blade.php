@extends('layout.app')





@section('content')


<h1 class="titlePage">Molveno Video App</h1>

    <div class="videoCollectie">
        @foreach ($video as $video)
            <div class="videoItem" tabindex="1">
                <a href="watch_video/{{$video->id}}"><img src="https://img.youtube.com/vi/{{$video->youtube_uid}}/0.jpg" alt=""></a>

                <p class="videoTitle">
                    {{$video->title}}
                </p>
                <p class="videoDescription">
                    {{$video->description}}
                </p>
            </div>
        @endforeach
    </div>
@endsection
