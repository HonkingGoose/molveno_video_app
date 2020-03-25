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
function performRating(event) {
  //console.log(event);
  // event.target --> <select> html node
  let videoId = document.getElementById('stars').dataset.videoId;
  let score = document.getElementById('stars').dataset.rating;
  // AJAX request
  let url =  `/guest/watch_video/${videoId}/rate`;
  let cookie = document.cookie;
  //console.log(cookie);
  let formData = { score: score, video_id: videoId }
  fetch(
    url,
    {
        'method': "POST",
        'headers': {
            'X-CSRF-TOKEN': globalCsrfToken,
            'Content-Type': 'application/json'
        },
        'body': JSON.stringify(formData)
    }
    ).then(function(result) {
      //console.log(result);
      document.getElementById('scoreMessage').innerHTML = 'your rating has been posted!';
    }).catch(function (err) {
      //console.log(err);
      document.getElementById('scoreMessage').innerHTML = 'something went wrong with posting your rating';
  });
}

function showRatingsDiv() {
  document.getElementById('ratingsDiv').style.display="initial";
}

function setRating(ev){
  let span = ev.currentTarget;
  let stars = document.querySelectorAll('.star');
  let match = false;
  let num = 0;
  stars.forEach(function(star, index){
    if(match){
      star.classList.remove('rated');
    }else{
      star.classList.add('rated');
    }
    //are we currently looking at the span that was clicked
    if(star === span){
      match = true;
      num = index + 1;
    }
  });
  document.querySelector('.stars').setAttribute('data-rating', num);
}

document.addEventListener('DOMContentLoaded', function(){
  //set (if present) the previously posted rating, otherwise leave at 3
  document.getElementById('stars').setAttribute('data-rating', config.score)

  let stars = document.querySelectorAll('.star');
  stars.forEach(function(star){
    star.addEventListener('click', setRating); 
  });
    
  let rating = parseInt(document.querySelector('.stars').getAttribute('data-rating'));
  let target = stars[rating - 1];
  target.dispatchEvent(new MouseEvent('click'));
});