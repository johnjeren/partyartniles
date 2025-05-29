<? /***
title:: Single Sermon for Sermon List
description::
variables:: $image, $title, $date, $sermon_series, $video, $audio, $bulletin
exvars:: {"image": "https://unsplash.it/1500/800/?saf=58&random", "title": "Title Goes Here", "date": "1/1/2017", "sermon_series": "New Series", "speaker": "The Speaker"}
exrepeat:: 2
***/?>
<article class="sermon">
    <div class="sermon-container">
    <div class="row">
      <div class="col-xs-12" >
        <img src="<?=@get_img_src($image)?>" class="img-responsive" />
      </div>
      <div class="col-xs-12">
          <h3 class="sermon-title"><span class="date"><?=$date?></span>&nbsp;<?=$title?></h3>
        <div class="sermon-detail">
          <span class="detail-type">Sermon Series:</span> <a href="/sermon-series/upside-down"><?=$sermon_series?></a> / <span class="detail-type">Speaker:</span> <?=$speaker?>
          <div class="media-links">
            <ul>
              <li>
                <a href="#w-audio" target="_self"  title="Listen" class="btn btn-primary">
                  <i class="fa fa-headphones"></i>
                  <span class="media-label">LISTEN</span>
                </a>
              </li>
              <li>
                <a href="#" target="_self" class="btn btn-primary">
                  <i class="fa fa-play-circle"></i><span class="media-label">WATCH</span>
                </a>
              </li>
              <li>
                <a href="#" class="btn btn-primary" target="_blank" title="Download">
                  <i class="fa fa-download"></i><span class="media-label">DOWNLOAD</span>
                </a>
              </li>
              <li>
                <a href="#" class="btn btn-primary" target="_self" title="Notes">
                  <i class="fa fa-book"></i><span class="media-label">BULLETIN</span>
                </a>
              </li>
            </ul>
          </div>
        </div>
        </div>
      </div>
    </div>
    <div class="row" >
      <!--<div class="col-sm-10 pr0 pl0">
        <iframe src="https://player.vimeo.com/video/203708264?color=ffffff&byline=0" width="100%" height="255" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen style="margin-bottom:-6px;"></iframe>
      </div>-->
      <div class="col-sm-12 pl0 pr0">
        <div id="">
          <!--<div class="panel panel-grey">
            <div class="panel-body pt0">
              <a href="http://newpointe.org/locations#CAN" class="btn btn-primary btn-block campus-can-hover" style="padding:8px 0;"><i class="fa fa-play-circle"></i></a>
              <a href="http://newpointe.org/locations#COS" class="btn btn-primary btn-block campus-cos-hover" style="padding:8px 0;"><i class="fa fa-headphones"></i></a>
              <a href="http://newpointe.org/locations#DOV" class="btn btn-primary btn-block campus-dov-hover" style="padding:8px 0;"><i class="fa fa-download"></i></a>
              <a href="http://newpointe.org/locations#MIL" class="btn btn-primary btn-block campus-mil-hover" style="padding:8px 0;"><i class="fa fa-book"></i></a>
            </div>
          </div>-->
          <!--<div class="media-links">
            <ul>
              <li>
                <a href="#w-audio" target="_self"  title="Listen">
                  <i class="fa fa-headphones"></i>
                  <span class="media-label">LISTEN</span>
                </a>
              </li>
              <li>
                <a href="#" target="_self">
                  <i class="fa fa-play-circle"></i><span class="media-label">WATCH</span>
                </a>
              </li>
              <li>
                <a href="#" class="" target="_blank" title="Download">
                  <i class="fa fa-download"></i><span class="media-label">DOWNLOAD</span>
                </a>
              </li>
              <li>
                <a href="#" class="" target="_self" title="Notes">
                  <i class="fa fa-book"></i><span class="media-label">READ MORE</span>
                </a>
              </li>
            </ul>
          </div>
        </div>-->
        <!--<div class="media-links">
          <ul>
            <li>
              <a href="#w-audio" target="_self"  title="Listen">
                <i class="fa fa-headphones"></i>
                <span class="media-label">LISTEN</span>
              </a>
            </li>
            <li>
              <a href="#" target="_self">
                <i class="fa fa-play-circle"></i><span class="media-label">WATCH</span>
              </a>
            </li>
            <li>
              <a href="#" class="" target="_blank" title="Download">
                <i class="fa fa-download"></i><span class="media-label">DOWNLOAD</span>
              </a>
            </li>
            <li>
              <a href="#" class="" target="_self" title="Notes">
                <i class="fa fa-book"></i><span class="media-label">READ MORE</span>
              </a>
            </li>
          </ul>
        </div>-->
      </div>
    </div>
  </div>
  </article>
