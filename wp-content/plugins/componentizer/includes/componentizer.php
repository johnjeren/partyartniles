<?php

function getComponent($slug, array $namedVariables = [],$section_id=FALSE)
{
  if ( stripos($slug, '.') !== FALSE ){
    $slug_explode = explode('.',$slug);
    $last_str = end($slug_explode);
    array_pop($slug_explode);
    $slug = implode('/', $slug_explode).'-'.$last_str;
  }


  // Taken from standard get_template_part function

  // Initialize $name to empty string if not set
  $name = isset($name) ? (string)$name : '';
  \do_action("get_template_part_{$slug}", $slug, $name);
  $templates = array();
  if ('' !== $name)
  $templates[] = "{$slug}-{$name}.php";
  $templates[] = "{$slug}.php";

  $template = FALSE;
  foreach ($templates as $t){
    $plugin_template_path = __DIR__.'/../'.$t;
    if ( file_exists($plugin_template_path) ){
      $template = $plugin_template_path;
    }
    //override for theme
    $theme_template_path = get_template_directory().'/'.$t;
    if ( file_exists($theme_template_path) ){
      $template = $theme_template_path;
    }

    //override for child theme
    if ( is_child_theme() ){
      $theme_template_path = get_stylesheet_directory().'/'.$t;
      if ( file_exists($theme_template_path) ){
        $template = $theme_template_path;
      }
    }
  }

  if (empty($template)) {
    return;
  }

  // @see load_template (wp-includes/template.php) - these are needed for WordPress to work.
  global $posts, $post, $wp_did_header, $wp_query, $wp_rewrite, $wpdb, $wp_version, $wp, $id, $comment, $user_ID;
  if (is_array($wp_query->query_vars)) {
    \extract($wp_query->query_vars, EXTR_SKIP);
  }
  if (isset($s)) {
    $s = \esc_attr($s);
  }
  // End standard WordPress behavior
  foreach ($namedVariables as $variableName => $value) {

    /*
    if (isset($$variableName)) {
      trigger_error("$variableName already existed, probably set by WordPress, so it wasn't set to $value like you wanted. Instead it is set to: " . print_r($$variableName, true));
      continue;
    }
    */
    $$variableName = $value;
  }
    require $template;
}

function getHeader(){
  getComponent(config('header'));
}

function getFooter(){
  getComponent(config('footer'));
}

function config($item){
  $config = (include get_template_directory().'/config/site.php');

  return $config[$item];
}

function cp_config($item){
  $item = explode('.', $item);
  return config(end($item));
}

function build_image($img,$size, $rel = '', $misc = []){
  // Initialize $img_str variable
  $img_str = '';
  
  if($misc['lightbox'] != FALSE){
    $img_str .= '<a href="'.$img['sizes']['large'].'" id="'.$misc['id'].'"  data-lightbox="'.$rel.'" data-title="'.$img['title'].'">';
  }

  if ( $size == 'full' ){
    $img_str .= '<img src="'.$img['url'].'" id="'.$misc['id'].'" class="img-responsive" alt="'.$img['alt'].'" />';
  } else {
    $img_str .= '<img src="'.$img['sizes'][$size].'" id="'.$misc['id'].'" class="img-responsive" alt="'.$img['alt'].'" />';
  }


  if($misc['lightbox'] != FALSE){
    $img_str .= '</a>';
  }
  return $img_str;
}
function image($shape,$src_only=FALSE){
  if ( !is_array($shape) ){
    $shapes = [
      'square'=>[750,750],
      '16x9'=>[750,420],
      '16x9full'=>[1500, 672],
      'background'=>[1800,1800],
      'parallax'=>[1400,1400]
    ];

    if ( !array_key_exists($shape, $shapes) ){
      throw new \Exception('Invalid Shape Size: '.$shape.'. Must be '.implode(', ', array_keys($shapes)));
    }
    $shape = $shapes[$shape];
  }



  $width = $shape[0];
  $height = $shape[1];
  $src_str = 'https://unsplash.it/'.$width.'/'.$height.'/?saf='.rand(0,100).'&random';

  if ( $src_only ){
    return $src_str;
  }

  $img_str = '<img data-src="'.$src_str.'" class="lazyload img-responsive">';
  return $img_str;

}

function text($words){
  $lorem = "Lorem ipsum dolor sit amet consectetur adipiscing elit Pellentesque purus tortor dignissim luctus sagittis in mattis nec turpis Proin neque purus condimentum ac lacinia in semper ac turpis Duis commodo turpis sapien varius dignissim sem finibus non Phasellus ultrices quis risus eget commodo Nullam suscipit orci eget nunc convallis placerat Pellentesque nec viverra mi a facilisis arcu Vivamus lobortis finibus neque ac tempor Integer mi nisl ornare ut porttitor eu vehicula a libero Sed vitae erat at velit interdum tristique Sed sit amet cursus risus vitae porta sapien Suspendisse bibendum dolor nec nisi commodo aliquam
  Pellentesque consequat lorem velit sed dapibus risus pellentesque at Maecenas tincidunt eros hendrerit vehicula dui et euismod nisl Phasellus scelerisque elit nec ante ultrices sed euismod massa pharetra Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas Class aptent taciti sociosqu ad litora torquent per conubia nostra per inceptos himenaeos Nulla quis ligula non felis luctus consectetur a faucibus tellus Phasellus sed dolor at diam blandit interdum Fusce lobortis sit amet lorem eu posuere Vestibulum lobortis ex in lorem laoreet rutrum
  Maecenas sed leo sed dui rutrum eleifend Quisque sodales commodo ligula vitae gravida est dapibus sed Nullam in nisi congue vestibulum libero vitae posuere diam In feugiat leo sit amet nisl sodales hendrerit Donec ex sapien hendrerit in porta eu dictum ut quam Ut egestas magna hendrerit porta tempor nisl elit bibendum erat eu vestibulum erat tellus eu nisl Morbi dictum tellus a bibendum tempus sapien lorem tempor tellus quis pretium massa tellus rutrum magna Pellentesque finibus hendrerit tincidunt Proin non lorem non mi rutrum consectetur id eget purus Sed fringilla nibh at risus sagittis tristique Mauris quis ipsum nec tortor ultricies dapibus Nulla bibendum ex libero eget luctus lectus bibendum eu
  Mauris vel risus eu diam vestibulum euismod Suspendisse ultrices sodales ante Vivamus volutpat sit amet ante vitae ultrices Morbi vulputate quis odio sed condimentum Sed at varius quam Duis condimentum nulla nec viverra venenatis diam tortor varius ipsum a sodales arcu risus ut tellus Ut a odio vel dui iaculis molestie
  Morbi ut posuere felis Praesent varius arcu rhoncus elit rutrum in tempor lacus congue Cras et erat et augue dapibus feugiat Suspendisse rhoncus enim vitae mauris posuere pretium Mauris non justo quam In hac habitasse platea dictumst Nullam ac nunc mi Integer mollis id mauris eu bibendum Vestibulum porttitor velit nisl vitae ultrices massa sollicitudin non Nam metus augue bibendum ut turpis nec eleifend viverra ante";

  $split = explode(" ",$lorem);
  shuffle($split);
  $remain = array_slice($split, 0, $words);
  $remain[0] = ucfirst($remain[0]);


  return implode(" ", $remain);
}

function templatePath(){
  return get_template_directory_uri();
}


function get_img_src($img_arr,$size=FALSE){
	if ( is_string($img_arr) ){
		return $img_arr;
	}

  if ( $size == 'full' && @$img_arr['url'] ){
    return $img_arr['url'];
  }

	return $img_arr['sizes'][$size];
}

function cc($content, $remove_p_tag=FALSE)
{
  if ( $remove_p_tag ){
    remove_filter('the_content','wpautop');
  }

  foreach ( config('find_replace') as $find=>$replace ){
    if ( stripos($content,$find) !== FALSE ){
      $content = str_ireplace($find, $replace, $content);
    }
  }

  $ret_content = apply_filters('the_content', $content);

  if ( $remove_p_tag ){
    add_filter('the_content','wpautop');
  }

	return $ret_content;
}

function getSite(){
  return;
}


add_filter( 'gform_submit_button', 'form_submit_button', 10, 2 );
function form_submit_button( $button, $form ) {
    return "<button class='button btn btn-white-on-primary gform_button' id='gform_submit_button_{$form['id']}'><span>{$form['button']['text']}</span></button>";
}

function componentizerRenderPageComponents(){
  $components = function_exists('get_field') ? get_field('page_section',get_the_ID()) : null;
  $new_components = FALSE;

  if ( !is_array($components) || isset($_REQUEST['newcomp']) && $_REQUEST['newcomp'] != '' ){
      $components_obj = function_exists('get_field_object') ? get_field_object('page_components') : null;
      $components = is_array($components_obj) && isset($components_obj['value']) ? $components_obj['value'] : null;
      $new_components = TRUE;
  }

  $component_views = [];
  if ( $components ){
      foreach($components as $c){
          if ( $new_components ){
              $component_views[] = [
                  'components/'.$c['acf_fc_layout'],
                  $c,
                  @$c['component_id']//'TITLE'//$c['section_title']
              ];
          } else {
              $component_views[] = [
                  'components/'.$c['component'],
                  $c[$c['component'].'-fields'],
                  sanitize_title($c['section_id'])
              ];
          }

      }
  }

  foreach ($component_views as $c){
      ?><a id="<?=sanitize_title(@$c[1]['component_title_display'])?>"></a><?php
      getComponent($c[0],$c[1],$c[2],$c[3]);
  }
}
