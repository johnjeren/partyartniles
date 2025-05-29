<?php

    $fields[] = array(
        'type'        => 'image',
        'settings'     => 'universal_single_portfolio_image',
        'label' =>    esc_html__( 'Top Image', 'universal-wp' ),
        'section'     => 'universal_portfolio',
        'default'     => get_template_directory_uri() . '/assets/images/22.jpg',
        'priority'    => 10,
    );
    $fields[] = array(
        'type'        => 'text',
        'settings'     => 'universal_title_portfolio',
        'label'       => __( 'Title', 'universal' ),
        'section'     => 'universal_portfolio',
        'default'     => 'Portfolio',
        'priority'    => 10,
    );
    $fields[] = array(
        'type'        => 'text',
        'settings'     => 'universal_subtitle_portfolio',
        'label'       => __( 'Name in breadcrumbs', 'universal' ),
        'section'     => 'universal_portfolio',
        'default'     => 'Single Project',
        'priority'    => 10,
    );
    $fields[] = array(
        'type'        => 'text',
        'settings'     => 'universal_link_portfolio',
        'label'       => __( 'Link to Works', 'universal-wp' ),
        'description' => __( 'Add link to "All Works"', 'universal-wp' ),
        'section'     => 'universal_portfolio',
        'default'     => 'http://google.com',
        'priority'    => 10,
    );


     