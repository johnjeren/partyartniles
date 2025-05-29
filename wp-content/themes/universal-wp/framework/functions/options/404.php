<?php

     $fields[] = array(
        'type'        => 'image',
        'settings'     => 'universal_404_image',
        'label'       => __( '404 Image', 'universal-wp' ),
        'description' => __( 'Change 404 image', 'universal-wp' ),
        'section'     => 'universal_404',
        'default'     => get_template_directory_uri() . '/assets/images/0.jpg',
        'priority'    => 10,
    );

     $fields[] = array(
        'type'        => 'text',
        'settings'     => 'universal_404_text_1',
        'label'       => __( '404 Text First', 'universal-wp' ),
        'description' => __( 'Change 404 text one', 'universal-wp' ),
        'section'     => 'universal_404',
        'default'     => 'Houston we have a problem...',
        'priority'    => 10,
    );

     $fields[] = array(
        'type'        => 'text',
        'settings'     => 'universal_404_text_2',
        'label'       => __( '404 Text Second', 'universal-wp' ),
        'description' => __( 'Change 404 text two', 'universal-wp' ),
        'section'     => 'universal_404',
        'default'     => "maybe, just maybe, though, you'll be able to find what you were looking for below:",
        'priority'    => 10,
    );
     



     