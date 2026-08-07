<?php
/***
title:: Page Title
description:: This element will show a page title
variables:: $title, $subtitle
exvars:: {"title": "Title Goes here", "subtitle": "Subtitle For Article"}
***/
?>

<div class="row page-title-basic">
  <div class="col-md-12">
    <h1><?=@$title?"<span>".esc_html($title)."</span>":""?><?=@$subtitle?"<small>".esc_html($subtitle)."</small>":""?></h1>
    <hr />
  </div>
</div>
