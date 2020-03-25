@extends('layout.app')

@push('styles')
    <link href="{{ asset('css/watch_video_css.css') }}" rel="stylesheet">
@endpush

@section('title', $video->title)

@section('sidebar')
    @parent
    <p>This is appended to the master sidebar.</p>
@endsection

@section('content')
<div class="flexCont">
  <div id="videoCont">
    <div id="player"></div>
    <script>
      var config = {
        youtubeId: '{{ $video->youtube_uid }}',
        score: '{{ $score }}'
      }
    </script>
    <script src="{{ asset('js/watch_video_js.js') }}"></script>
    <div id="controls">
      <button id="watchButton" class="buttonFancy">Watch</button>
      <a id="doNotHover" href="/guest/watch_video"><button class="buttonFancy">Back to index</button></a>
      <button onclick="showRatingsDiv()" class="buttonFancy">Rate</button>
    </div>
    <div id="ratingsDiv">
      <div class="stars" id="stars" data-rating="3" data-video-id="{{ $video->id }}">
        <span class="star">&nbsp;</span>
        <span class="star">&nbsp;</span>
        <span class="star">&nbsp;</span>
        <span class="star">&nbsp;</span>
        <span class="star">&nbsp;</span>
      </div>
      <button class="buttonFancy" onclick="performRating(event)" data-video-id="{{ $video->id }}">Post rating</button>
      <span id="scoreMessage"></span>
    </div>
  </div>
  <div id="side">
    <div>
        <h1 id="sideTitle">{{ $video->title }}</h1>
        <h4 class="sideSubTitle">description</h4>
        <p>{{ $video->description }}</p>
        <p>category: {{ $video->category }}</p>
        <p>average rating: {{ $video->getAverageRating() }}</p>
    </div>
  </div>
</div>
<script>
  document.getElementById('watchButton').addEventListener("click", function(event) {
  startstop(event);
  });
</script>
@endsection
