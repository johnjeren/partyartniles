<?php
/***
title:: Centered Article
description:: Centered Article Content
variables:: $style, $title, $text, $date, $author
exvars:: {"title": "Item Title", "text": "randtext50", "date": "2017-01-01"}
***/
?>
<div style="clear:both;"></div>
<section id="article" class="wrapper wrapper-<?=esc_attr(@$style)?> wrapper-sm">
  <div class="container text-center">
    <div class="row">
      <div class="col-md-6 col-md-offset-3 ">
        <article>
          <small><?=esc_html($date)?></small>
          <h2><?=esc_html($title)?></h2>
          <hr/>
          <?php
          if ( @$author ){
            ?>
            <p>
              <small>- By <?=esc_html($author)?> -</small>
            </p>
            <?php
          }
          ?>
          <p class="lead">
            <?=wp_kses_post($text)?>
          </p>
        </article>
      </div>
    </div>
  </div>
</section>
