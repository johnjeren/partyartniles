<?php

$components = function_exists('get_field_object') ? get_field_object('page_components',$component->ID) : null;
$components = $components['value'];

foreach ($components as $c){
    getComponent('components/'.$c['acf_fc_layout'],$c);
}
