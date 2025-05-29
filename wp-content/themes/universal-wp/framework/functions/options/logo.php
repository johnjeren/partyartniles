<?php

     $fields[] = array(
        'type'        => 'select',
        'settings'    => 'universal_menu_select',
        'label'       => __( 'Type of menu', 'universal-wp' ),
        'section'     => 'universal_logo_section',
        'default'     => 'standard',
        'priority'    => 10,
        'choices'     => array(
            'standard'   => esc_attr__( 'Standard', 'universal-wp' ),
            'onepage'   => esc_attr__( 'Onepage', 'universal-wp' )
        ),
);

     $fields[] = array(
        'type'        => 'image',
        'settings'     => 'universal_logo_upload',
        'description' => __( 'Add logo', 'universal-wp' ),
        'section'     => 'universal_logo_section',
        'default'     => get_template_directory_uri() . '/assets/images/logo.png',
        'priority'    => 10,
    ); 

     $fields[] = array(
        'type'        => 'image',
        'settings'     => 'universal_retina_logo_upload',
        'description' => __( 'Add retina logo (2x)', 'universal-wp' ),
        'section'     => 'universal_logo_section',
        'default'     => get_template_directory_uri() . '/assets/images/logo@2x.png',
        'priority'    => 10,
    ); 

     $fields[] = array(
        'type'        => 'image',
        'settings'     => 'universal_logo_dark_upload',
        'description' => __( 'Add dark logo', 'universal-wp' ),
        'section'     => 'universal_logo_section',
        'default'     => get_template_directory_uri() . '/assets/images/logo-dark.png',
        'priority'    => 10,
    ); 

     $fields[] = array(
        'type'        => 'image',
        'settings'     => 'universal_retina_logo_dark_upload',
        'description' => __( 'Add retina dark logo (2x)', 'universal-wp' ),
        'section'     => 'universal_logo_section',
        'default'     => get_template_directory_uri() . '/assets/images/logo-dark@2x.png',
        'priority'    => 10,
    ); 

     $fields[] = array(
        'type'        => 'image',
        'settings'     => 'universal_logo_favicon',
        'label'       => __( 'Favicon', 'universal-wp'),
        'description' => __( 'Image 16x16, ico/png', 'universal-wp' ),
        'section'     => 'universal_logo_section',
        'default'     => get_template_directory_uri() . '/assets/images/favicon.png',
        'priority'    => 10,
    );

     $fields[] = array(
        'type'        => 'image',
        'settings'     => 'universal_logo_favicon_iphone',
        'label'       => __( 'Favicon iPhone', 'universal-wp'),
        'description' => __( 'Image 114x114, ico/png', 'universal-wp' ),
        'section'     => 'universal_logo_section',
        'default'     => get_template_directory_uri() . '/assets/images/114.png',
        'priority'    => 10,
    );

     $fields[] = array(
        'type'        => 'image',
        'settings'     => 'universal_logo_favicon_ipad',
        'label'       => __( 'Favicon iPad', 'universal-wp'),
        'description' => __( 'Image 144x144, ico/png', 'universal-wp' ),
        'section'     => 'universal_logo_section',
        'default'     => get_template_directory_uri() . '/assets/images/144.png',
        'priority'    => 10,
    );

?>