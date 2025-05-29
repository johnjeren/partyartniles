<?php

    $fields[] = array(
        'type'        => 'image',
        'settings'     => 'universal_woo_image',
        'label' =>    esc_html__( 'Shop Image', 'universal-wp' ),
        'section'     => 'universal_woocommerce',
        'default'     => get_template_directory_uri() . '/assets/images/woo.jpg',
        'priority'    => 10,
    );


    $fields[] = array(
        'type'        => 'toggle',
        'settings'    => 'universal_cart_disable',
        'label'       =>  esc_html__( 'Shop Cart In Menu', 'universal-wp' ),
        'section'     => 'universal_woocommerce',
        'default'     => '1',
        'priority'    => 10,
        'choices'     => array(
            'on'  => esc_attr__( 'Enable', 'universal-wp' ),
            'off' => esc_attr__( 'Disable', 'universal-wp' ),
        ),
);

    $fields[] = array(    
        'type'        => 'text',
        'settings'    => 'universal_shop_max_posts',
        'label'       => esc_html__( 'The number of posts displayed', 'universal-wp' ),
        'section'     => 'universal_woocommerce',
        'default'     => '12',
);
    
    $fields[] = array(
        'type'        => 'radio-image',
        'settings'    => 'universal_woo_sidebars',
        'label'       => esc_html__( 'Shop Sidebar Position', 'universal-wp' ),
        'section'     => 'universal_woocommerce',
        'default'     => 'sidebar-no',
        'priority'    => 10,
        'choices'     => array(
            'sidebar-left' => get_template_directory_uri() . '/assets/images/2cl.jpg',
            'sidebar-no'  => get_template_directory_uri() . '/assets/images/1c.jpg',
            'sidebar-right'  => get_template_directory_uri() . '/assets/images/2cr.jpg',
        )
);

?>