<?php
function componentizerCustomizeComponents($field){

  $config = require(get_template_directory().'/includes/siteconfig.php');

  //limit to only allowed components
  $allowed_components = @$config['allowed_components'] ? $config['allowed_components'] : FALSE;
  if ( $allowed_components ){
    foreach ($field['layouts'] as $key=>$component){
      if ( array_search($component['name'], $allowed_components) === FALSE ){
        unset($field['layouts'][$key]);
      }
    }
  }

  //hide hidden components
  $hidden_components = @$config['hidden_components'] ? $config['hidden_components'] : FALSE;
  if ( $hidden_components ){
    foreach ($field['layouts'] as $key=>$component){
      if ( array_search($component['name'], $hidden_components) !== FALSE ){
        unset($field['layouts'][$key]);
      }
    }
  }

  //$custom_components = @$config['custom_components'] ? $config['custom_components'] : [];
  $json_dir = get_template_directory().'/acf-json/';
  $component_files = glob($json_dir."component*");
  //print_r($component_files);
  //$custom_components = [];
  foreach ($component_files as $cc){
    if ( is_string($cc) ){ //if we're going to use ACF JSON file
      $json = json_decode(file_get_contents($cc),TRUE);
      foreach ($json['fields'] as $key=>$jsf){
          $json['fields'][$key]['_name'] = $jsf['name']; //_name field is required /shrug
      }
      $subfields = $json['fields'];

      array_unshift($subfields, [
        "label"=>"Component Title",
        "name"=>"component_title_display",
        "_name"=>"component_title_display",
        "type"=>"text"
      ]);


      // Add proper field name atts to subfields
      foreach ($subfields as $sk=>$sf){
        if ( @$sf['sub_fields'] && is_array($sf['sub_fields']) ){
          foreach ($sf['sub_fields']  as $ssk=>$ssf){
            $subfields[$sk]['sub_fields'][$ssk]['_name'] = $subfields[$sk]['sub_fields'][$ssk]['name'];
          }
        }
      }

      $new_field_arr = [
        'key'=>'custom_component_'.sanitize_title($json['title']),
        'name'=>'components-'.sanitize_title($json['title']),
        'label'=>$json['title'],
        'display'=>'block',
        'sub_fields'=>$subfields,
        'min' => '',
        'max' => '',
      ];

      $field['layouts'][] = $new_field_arr;
    } else { //we're building from config
      $subfields = [ //get the component title as the first subfield
        [
          'key' => 'field_sub_title_'.$key,
          'label' => 'Component Title',
          'name' => 'component_title_display',
          'type' => 'text',
          '_name'=>'component_title_display'
        ]
      ];
      foreach ($cc['fields'] as $field_key=>$subfield){ //add the fields from config as the subfields
        $subfields[] = [
          'key' => 'custom_component_'.$key.'_sub_'.$field_key,
          'label' => $subfield['title'],
          'name' => $field_key,
          'type' => $subfield['type'],
          '_name'=>$field_key
        ];
      }
      $new_field_arr = [ //put the field together
        'key'=>'custom_component_'.$key,
        'name'=>'component-'.$key,
        'label'=>$cc['title'],
        'display'=>'block',
        'sub_fields'=>$subfields,
        '_sub_fields'=>$subfields,
        'min' => '',
        'max' => '',
      ];
      $field['layouts'][] = $new_field_arr; //add it to the layouts object
    }

  }
  //print_r($field);exit;
  return $field;
}
add_filter('acf/load_field/name=page_components','componentizerCustomizeComponents');
