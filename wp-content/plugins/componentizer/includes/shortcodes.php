<?php

function shortcode_randtext_func( $atts ){
	return text($atts['words']);
}
add_shortcode( 'randtext', 'shortcode_randtext_func' );
