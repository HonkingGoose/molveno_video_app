@extends('layout.app')

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
      if(event.keyCode === 13){
          startstop(event);
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

    <div>
        <p>title: {{ $video->title }}</p>
        <p>description: {{ $video->description }}</p>
        <p>category: {{ $video->category }}</p>
    </div>
@endsection