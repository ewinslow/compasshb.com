<script src="https://f.vimeocdn.com/js/froogaloop2.min.js"></script>
<script src='//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script>

$(function() {
    var iframe = $('#vimeoplayer')[0];
    var player = $f(iframe);

    // When the player is ready, add listeners for pause, finish, and playProgress
    player.addEvent('ready', function() {

        player.addEvent('playProgress', onPlayProgress);
    });

    // Call the API when a button is pressed
    $('button').bind('click', function() {
        player.api('seekTo', 30);
    });

    function onPlayProgress(data, id) {
        //status.text(data.seconds + 's played');
    }

    $(document).on('click','.paragraph_text',function(){
      // code here
      var seekTime = $(this).attr('data-time');

      var a = seekTime.split(':'); // split it at the colons
      // minutes are worth 60 seconds. Hours are worth 60 minutes.
      var seconds = (+a[0]) * 60 * 60 + (+a[1]) * 60 + (+a[2]);

      player.api('seekTo', seconds);
    });
});

</script>