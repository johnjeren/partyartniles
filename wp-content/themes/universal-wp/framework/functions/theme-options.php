<?php
/**
* Configure Kirki 
*/
function universal_customizer_config() {
     
    $args = array(
        'textdomain'   => 'universal-wp',
    );
    return $args;
}
add_filter( 'kirki/config', 'universal_customizer_config' );

function universal_sections( $wp_customize ) {

    $wp_customize->add_section( 'universal_logo_section', array(
        'title'       => __( 'Header & Logo & Favicon', 'universal-wp' ),
        'priority'    => 10,
    ) );

    $wp_customize->add_section( 'universal_content', array(
        'title'       => __( 'Blog', 'universal-wp' ),
        'priority'    => 10,
    ) );

    $wp_customize->add_section( 'universal_portfolio', array(
        'title'       => __( 'Single Portfolio', 'universal-wp' ),
        'priority'    => 10,
    ) );

    $wp_customize->add_section( 'universal_footer', array(
        'title'       => __( 'Footer', 'universal-wp' ),
        'priority'    => 10,
    ) );

    $wp_customize->add_section( 'universal_404', array(
        'title'       => __( '404 Error', 'universal-wp' ),
        'priority'    => 10,
    ) );

    $wp_customize->add_section( 'universal_other', array(
        'title'       => __( 'Other', 'universal-wp' ),
        'priority'    => 10,
    ) );
    
    if ( class_exists( 'WooCommerce' ) ) {
    $wp_customize->add_section( 'universal_woocommerce', array(
        'title'       => __( 'WooCommerce', 'universal-wp' ),
        'priority'    => 10,
    ) );        
    };

}
add_action( 'customize_register', 'universal_sections' );

function universal_demo_fields( $fields ) {

        include( get_template_directory() . '/framework/functions/options/logo.php');
        include( get_template_directory() . '/framework/functions/options/content.php');
        include( get_template_directory() . '/framework/functions/options/portfolio.php');
        include( get_template_directory() . '/framework/functions/options/footer.php');
        if ( class_exists( 'WooCommerce' ) ) {
        include( get_template_directory() . '/framework/functions/options/woo.php');
        };
        include( get_template_directory() . '/framework/functions/options/404.php');
        include( get_template_directory() . '/framework/functions/options/other.php');

    return $fields;
    
}
add_filter( 'kirki/fields', 'universal_demo_fields' );

?>