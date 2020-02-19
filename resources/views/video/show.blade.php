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
<div id="player"></div>

<script>
  // 2. This code loads the IFrame Player API code asynchronously.
  var tag = document.createElement('script');

  tag.src = "https://www.youtube.com/iframe_api";
  var firstScriptTag = document.getElementsByTagName('script')[0];
  firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

  // 3. This function creates an <iframe> (and YouTube player)
  //    after the API code downloads.
  var player;
  function onYouTubeIframeAPIReady() {
    player = new YT.Player('player', {
      height: '390',
      width: '640',
      videoId: '{{ $video->youtube_uid }}',
      events: {
        'onReady': onPlayerReady,
        'onStateChange': onPlayerStateChange
      }
    });
  }

  // 4. The API will call this function when the video player is ready.
  function onPlayerReady(event) {
    
  }

  // 5. The API calls this function when the player's state changes.
  //    The function indicates that when playing a video (state=1),
  //    the player should play for six seconds and then stop.
  
  function onPlayerStateChange(event) {
    
  }
  

  document.addEventListener('keyup', (event) => {
      // keycode 13 = enter
      if(event.keyCode === 13 && document.getElementById('watchButton').classList.contains('focused')){
          startstop(event);
          console.log('gevonden!');
      }
      
      if(event.keyCode === 39){
        // for(let i = 0; i < document.getElementById('controls').childNodes.length; i++){
        //   console.log('2 van deze aub');
        // }
        let controlsDiv = document.getElementById('controls');
        let index = -1;
        
        for(let i = 1; i < controlsDiv.childNodes.length; i += 2){
          if(controlsDiv.childNodes[i].classList.contains('focused')){
            index = i;
            controlsDiv.childNodes[i].classList.remove('focused');
          }
        }
        if((controlsDiv.childNodes.length - (index +2)) < 2){
          index = -1;
        }
        controlsDiv.childNodes[index+2].classList.add('focused');
        //let length = document.
        console.log(document.getElementById('controls').childNodes);
      }
  });

  function startstop(event){
      // playerstate 1 = playing
      if(player.getPlayerState() === 1){
          player.stopVideo();
          document.exitFullscreen();
      } else {
        document.getElementById('player').requestFullscreen();
        player.playVideo();
      
      }
      
  }
</script>
    <div id="controls">
      <div id="watchButton" class="btn btn-primary focused">watch</div>
      <div class="btn btn-primary">back to index</div>
      <div class="btn btn-primary">rate</div>
    </div>
    <div>
        <p>title: {{ $video->title }}</p>
        <p>description: {{ $video->description }}</p>
        <p>category: {{ $video->category }}</p>
    </div>
@endsection