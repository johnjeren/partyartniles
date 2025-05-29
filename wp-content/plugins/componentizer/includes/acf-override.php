<?php

add_action('admin_head', 'acf_hide');

function acf_hide() {
  return;
  if ( !$_REQUEST['admin'] ){
    ?>
    <style type="text/css">
    .admin-only, .acf-field-58b5afbc017d9{
      display: none !important;
    }
    </style>
    <?php
  }
}
