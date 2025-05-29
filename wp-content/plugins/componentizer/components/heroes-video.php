<script src="http://pupunzi.com/mb.components/mb.YTPlayer/demo/inc/jquery.mb.YTPlayer.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function () {
    $('.player').mb_YTPlayer();
});
</script>

<section class="content-section video-billboard">
  <div class="pattern-overlay">
  <a id="bgndVideo" class="player" data-property="{videoURL:'https://www.youtube.com/watch?v=fdJc1_IBKJA',containment:'.video-section', quality:'large', startAt: 8,autoPlay:true, mute:true, opacity:1}">bg</a>
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <?=@$title?"<h2>".$title."</h2>":""?>
        <?=@$text?"<h3>".$text."</h3>":""?>
          <div class="row">
            <div class="col-sm-4 col-sm-offset-8">
              <a href="#" class="btn btn-primary btn-lg btn-block">Find out more</a>
            </div>
          </div>
        </div>
	     </div>
      </div>
    </div>
  </div>
</section>
