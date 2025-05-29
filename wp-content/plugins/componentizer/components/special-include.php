<?php if(@$file){
  $include_vars = [];
  if ( @$variables ){
    foreach ($variables as $var){
      if ( strtolower($var['variable_value']) == 'false'){
        $var['variable_value'] = FALSE;
      } else if (  strtolower($var['variable_value']) == 'true' ) {
        $var['variable_value'] = TRUE;
      }
      $include_vars[$var['variable_name']] = $var['variable_value'];
    }
  }
 
  getComponent($file,$include_vars,@$section_id);
}?>
