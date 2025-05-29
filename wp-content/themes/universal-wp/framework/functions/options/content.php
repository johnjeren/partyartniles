<?php

     $fields[] = array(
    'type'        => 'select',
    'settings'    => 'universal_post_type',
    'label'       => __( 'Post Style', 'universal-wp' ),
    'section'     => 'universal_content',
    'default'     => 'masonry',
    'priority'    => 10,
    'multiple'    => 1,
    'choices'     => array(
        'classic' => esc_attr__( 'Classic', 'universal-wp' ),
        'medium' => esc_attr__( 'Medium', 'universal-wp' ),
        'masonry' => esc_attr__( 'Masonry', 'universal-wp' ),
    ),
 );

     $fields[] = array(
        'type'        => 'text',
        'settings'    => 'universal_post_height',
        'label'       => __( 'Post Image Height', 'universal-wp' ),
        'description'       => __( 'Set your own height of image in px (ex: 500px)', 'universal-wp' ),
        'section'     => 'universal_content',
        'default'     => '',
        'priority'    => 10,
);


     $fields[] = array(
    'type'         => 'multicheck',
    'settings'     => 'universal_soc_link',
    'label'        => esc_attr__( 'Social Media', 'universal-wp' ),
    'description' => __( 'Choose your social media in single post', 'universal-wp' ),
    'section'      => 'universal_content',
    'default'      => array('facebook', 'twitter', 'pinterest', 'tumblr', 'google', 'linkedin'),
    'priority'     => 10,
    'choices'      => array(
        'facebook' => esc_attr__( 'Facebook', 'universal-wp' ),
        'twitter'   => esc_attr__( 'Twitter', 'universal-wp' ),
        'pinterest'    => esc_attr__( 'Pinterest', 'universal-wp' ),
        'tumblr'     => esc_attr__( 'Tumblr', 'universal-wp' ),
        'google'      => esc_attr__( 'Google Plus', 'universal-wp' ),
        'linkedin'     => esc_attr__( 'LinkedIn', 'universal-wp' ),
    ),
);


     $fields[] = array(
        'type'        => 'radio-image',
        'settings'    => 'universal_sidebars',
        'label'       => esc_html__( 'Sidebar Position', 'universal-wp' ),
        'description' => __( 'Sidebars within site, except single post.', 'universal-wp' ),
        'section'     => 'universal_content',
        'default'     => 'sidebar-right',
        'priority'    => 10,
        'choices'     => array(
            'sidebar-left' => get_template_directory_uri() . '/assets/images/2cl.jpg',
            'sidebar-no'  => get_template_directory_uri() . '/assets/images/1c.jpg',
            'sidebar-right'  => get_template_directory_uri() . '/assets/images/2cr.jpg',
        ),
);
     $fields[] = array(
        'type'        => 'radio-image',
        'settings'    => 'universal_single_sidebars',
        'label'       => esc_html__( 'Single Sidebar Position', 'universal-wp' ),
        'description' => __( 'Sidebars in single post.', 'universal-wp' ),
        'section'     => 'universal_content',
        'default'     => 'sidebar-right',
        'priority'    => 10,
        'choices'     => array(
            'sidebar-left' => get_template_directory_uri() . '/assets/images/2cl.jpg',
            'sidebar-no'  => get_template_directory_uri() . '/assets/images/1c.jpg',
            'sidebar-right'  => get_template_directory_uri() . '/assets/images/2cr.jpg',
        ),

);

          $fields[] = array(
        'type'        => 'text',
        'settings'    => 'universal_single_blog',
        'label'       => __( 'Link To Blog', 'universal-wp' ),
        'description'       => __( 'Set your link to blogroll page', 'universal-wp' ),
        'section'     => 'universal_content',
        'default'     => 'http://themeforest.net/',
        'priority'    => 10,
);

?>