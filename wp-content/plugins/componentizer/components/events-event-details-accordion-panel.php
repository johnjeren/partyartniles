<div class="panel panel-default wow fadeInUp  animated" data-wow-offset="120" data-wow-duration="1.5s" style="visibility: visible; animation-duration: 1.5s; -webkit-animation-duration: 1.5s; animation-name: fadeInUp; -webkit-animation-name: fadeInUp;"><!-- Start: Tab-1 -->
  <div class="panel-heading" id="heading<?=@strtolower(str_replace(' ','-',$title))?>">
    <h4 class="panel-title">
      <!-- Tab-1 Title Goes Here  -->
      <a data-toggle="collapse" data-parent="#accordion" data-target="#<?=@strtolower(str_replace(' ','-',preg_replace("/[^a-zA-Z 0-9]+/",'',$title)))?>" class="collapsed">
        <?=@$title?>
        <span class="bar hidden-xs"></span>
      </a>
    </h4>
  </div>
  <div id="<?=@strtolower(str_replace(' ','-',preg_replace("/[^a-zA-Z 0-9]+/",'',$title)))?>" class="panel-collapse collapse">
    <!-- Tab-1 Detail Goes Here  -->
    <div class="panel-body">
      <?=@$text?>
    </div>

  </div>
</div>
