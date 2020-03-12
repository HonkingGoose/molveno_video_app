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
        youtubeId: '{{ $video->youtube_uid }}'
      }

      function performRating(event) {
          console.log(event);
          // event.target --> <select> html node
          let videoId = event.target.dataset.videoId;
          let score = event.target.options[event.target.selectedIndex].value;

          // AJAX request
          let url =  `/guest/watch_video/${videoId}`;
          fetch(
            url,
            {
                'method': "POST",
                'headers': {
                    'X-CSRF-TOKEN': globalCsrfToken
                }
            }
          ).then(function(result) {
                console.log(result);
          }).catch(function (err) {
              console.log(err);
          });
      }
    </script>
    <script src="{{ asset('js/watch_video_js.js') }}"></script>
    <div id="controls">
      <button id="watchButton" class="buttonFancy">Watch</button>
      <a id="doNotHover" href="/guest/watch_video"><button class="buttonFancy">Back to index</button></a>
      <button class="buttonFancy">Rate</button>
    </div>
    <div>
          <select name="score" id="score" data-video-id="{{ $video->id }}" onchange="performRating(event)">
               <option value="1">1 star</option>
               <option value="2">2 stars</option>
               <option value="3">3 stars</option>
               <option value="4">4 stars</option>
               <option value="5">5 stars</option>
           </select>
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
