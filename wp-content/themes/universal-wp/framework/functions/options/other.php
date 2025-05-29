<?php

    $fields[] = array(
        'type'        => 'image',
        'settings'     => 'universal_search_image',
        'label' =>    esc_html__( 'Search Image', 'universal-wp' ),
        'section'     => 'universal_other',
        'default'     => get_template_directory_uri() . '/assets/images/10.jpg',
        'priority'    => 10,
    );

     $fields[] = array(
        'type'        => 'toggle',
        'settings'    => 'universal_scroll_up',
        'label'       => __( 'Scroll Up', 'universal-wp' ),
        'section'     => 'universal_other',
        'default'     => '1',
        'priority'    => 10,
        'choices'     => array(
            'on'  => esc_attr__( 'Show', 'universal-wp' ),
            'off' => esc_attr__( 'Hide', 'universal-wp' ),
        ),
);

     $fields[] = array(
        'type'        => 'toggle',
        'settings'    => 'universal_preloader',
        'label'       => __( 'Preloader', 'universal-wp' ),
        'section'     => 'universal_other',
        'default'     => '1',
        'priority'    => 10,
        'choices'     => array(
            'on'  => esc_attr__( 'Show', 'universal-wp' ),
            'off' => esc_attr__( 'Hide', 'universal-wp' ),
        ),
);

     