// To avoid $ conflict with Wordpress 

var $ = jQuery;

/*Resize Facebook Page Feed Plugin according to screen size 
https://www.mugo.ca/Blog/How-to-make-the-Facebook-Page-Plugin-fully-responsive*/

function resizeFBPlugin(){

  var container_width = ($('.fb-column').width() - parseInt($('.fb-column').css('padding-left'))).toFixed(0);
  
  if (!isNaN(container_width)) {
      $(".fb-page").attr("data-width", container_width);
  }
  if (typeof FB !== 'undefined' ) {
      FB.XFBML.parse();
  }
}
  
//You Tube Channel Embed

      var tag = document.createElement('script');

      tag.src = "https://www.youtube.com/iframe_api";
      var firstScriptTag = document.getElementsByTagName('script')[0];
      firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

      var player;
      function onYouTubeIframeAPIReady() {
        player = new YT.Player('player', {
          height: '390',
          width: '640',
          videoId: 'M7lc1UVf-VE',
          events: {
            'onReady': onPlayerReady,
            'onStateChange': onPlayerStateChange
          }
        });
      }

      function onPlayerReady(event) {
        event.target.playVideo();
      }

      var done = false;
      function onPlayerStateChange(event) {
        if (event.data == YT.PlayerState.PLAYING && !done) {
          setTimeout(stopVideo, 6000);
          done = true;
        }
      }
      function stopVideo() {
        player.stopVideo();
      }