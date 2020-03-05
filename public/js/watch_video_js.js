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
    width: '80%',
    videoId: config.youtubeId,
    events: {
      'onReady': onPlayerReady,
      'onStateChange': onPlayerStateChange
    }
  });
}

// 4. The API will call this function when the video player is ready.
function onPlayerReady(event) {
  document.getElementById('player').setAttribute('tabindex', -1);
}

// 5. The API calls this function when the player's state changes.
//    The function indicates that when playing a video (state=1),
//    the player should play for six seconds and then stop.

function onPlayerStateChange(event) {
  if(player.getPlayerState() === 0){
    document.exitFullscreen();
  }
}

// document.addEventListener('keyup', (event) => {
//     // keycode 13 = enter
//     if(event.keyCode === 13 && document.getElementById('watchButton').classList.contains('focused')){
//         startstop(event);
//         console.log('gevonden!');
//     }
//     // keycode 39 = pijltje naar rechts
//     if(event.keyCode === 39){
//       let controlsDiv = document.getElementById('controls');
//       let index = -1;
//       for(let i = 1; i < controlsDiv.childNodes.length; i += 2){
//         if(controlsDiv.childNodes[i].classList.contains('focused')){
//           index = i;
//           controlsDiv.childNodes[i].classList.remove('focused');
//         }
//       }
//       if((controlsDiv.childNodes.length - (index +2)) < 2){
//         index = -1;
//       }
//       controlsDiv.childNodes[index+2].classList.add('focused');

//       //console.log(document.getElementById('controls').childNodes);
//     }
// });

document.addEventListener('keyup', (event) => {
    // keycode 13 = enter
    if(event.keyCode === 13 && player.getPlayerState() === 1){
        startstop();
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