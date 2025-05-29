<?php

     $fields[] = array(
        'type'        => 'toggle',
        'settings'    => 'universal_widget_footer',
        'label'       => __( 'Widgets Footer', 'universal-wp' ),
        'section'     => 'universal_footer',
        'default'     => true,
        'priority'    => 10,
        'choices'     => array(
            'on'  => esc_attr__( 'Enable', 'universal-wp' ),
            'off' => esc_attr__( 'Disable', 'universal-wp' ),
        ),
);

     
     $fields[] = array(
        'type'        => 'select',
        'settings'    => 'universal_widget_footer_count',
        'label'       => __( 'Count Of Widgets', 'universal-wp' ),
        'section'     => 'universal_footer',
        'default'     => 'one',
        'priority'    => 10,
        'choices'     => array(
            'one'   => esc_attr__( '1/3 + 1/4 + 1/6 + 1/4', 'universal-wp' ),
            'three'   => esc_attr__( '1/4 + 1/4 + 1/4', 'universal-wp' ),
            'four' => esc_attr__( '1/3 + 1/3 + 1/3 + 1/3', 'universal-wp' ),
            'five' => esc_attr__( '1/4 + 2/4 + 1/4', 'universal-wp' ),
        ),
);

     $fields[] = array(
        'type'        => 'toggle',
        'settings'    => 'universal_author_footer',
        'label'       => __( 'Bottom Footer', 'universal-wp' ),
        'section'     => 'universal_footer',
        'default'     => '1',
        'priority'    => 10,
        'choices'     => array(
            'on'  => esc_attr__( 'Enable', 'universal-wp' ),
            'off' => esc_attr__( 'Disable', 'universal-wp' ),
        ),
);

     $fields[] = array(
        'type'        => 'select',
        'settings'    => 'universal_author_footer_color',
        'label'       => __( 'Bottom Footer Color', 'universal-wp' ),
        'section'     => 'universal_footer',
        'default'     => '1',
        'priority'    => 10,
        'choices'     => array(
            'white' => esc_attr__( 'White', 'universal-wp' ),
            'grey' => esc_attr__( 'Grey', 'universal-wp' ),
            'dark' => esc_attr__( 'Dark', 'universal-wp' ),
        ),
);

     $fields[] = array(
        'type'        => 'select',
        'settings'    => 'universal_widget_footer_2_count',
        'label'       => __( 'Count Of Row', 'universal-wp' ),
        'section'     => 'universal_footer',
        'default'     => 'three',
        'priority'    => 10,
        'choices'     => array(
            'one'   => esc_attr__( '1/12', 'universal-wp' ),
            'two'   => esc_attr__( '1/6 + 1/6', 'universal-wp' ),
            'three' => esc_attr__( '1/4 + 1/4 + 1/4', 'universal-wp' ),
            ),
);
     $fields[] = array(
        'type'        => 'toggle',
        'settings'     => 'universal_fot_arrow',
        'label'       => __( 'Show arrow to up?', 'universal-wp' ),
        'section'     => 'universal_footer',
        'default'     => '1',
        'priority'    => 10,
        'choices'     => array(
            'on'  => esc_attr__( 'Yes', 'universal-wp' ),
            'off' => esc_attr__( 'No', 'universal-wp' ),
        ),
        'active_callback'  => array(
            array(
                'setting'  => 'universal_widget_footer_2_count',
                'operator' => '==',
                'value'    => 'one',
            ),
    ),
 );

     $fields[] = array(
        'type'        => 'toggle',
        'settings'     => 'universal_fot_button',
        'label'       => __( 'Button', 'universal-wp' ),
        'section'     => 'universal_footer',
        'default'     => '1',
        'priority'    => 10,
        'choices'     => array(
            'on'  => esc_attr__( 'Yes', 'universal-wp' ),
            'off' => esc_attr__( 'No', 'universal-wp' ),
        ),
        'active_callback'  => array(
            array(
                'setting'  => 'universal_widget_footer_2_count',
                'operator' => '==',
                'value'    => 'one',
            ),
    ),
 );

     $fields[] = array(
        'type'        => 'textarea',
        'settings'     => 'universal_fot_button_link',
        'description' => __( 'Button Link', 'universal-wp' ),
        'section'     => 'universal_footer',
        'default'     => '<a href="https://themeforest.net/item/universal-smart-multipurpose-html5-template/17268942" class="btn btn-lg btn-gray">Purchase now</a>',
        'priority'    => 10,
        'active_callback'  => array(
            array(
                'setting'  => 'universal_widget_footer_2_count',
                'operator' => '==',
                'value'    => 'one',
            ),
    ),
 );
     $fields[] = array(
        'type'        => 'textarea',
        'settings'    => 'universal_footer_copy_1',
        'label'       => __( 'Copyright Text', 'universal-wp' ),
        'section'     => 'universal_footer',
        'default'     => 'Powered by <a href="https://themeforest.net/user/forbetterweb" target="_blank">forbetterweb.com</a>',
        'priority'    => 10,
        'active_callback'  => array(
            array(
                'setting'  => 'universal_widget_footer_2_count',
                'operator' => '==',
                'value'    => 'three',
            ),
    ),
 );

     $fields[] = array(
        'type'        => 'textarea',
        'settings'    => 'universal_footer_copy_2',
        'label'       => __( 'Copyright Text', 'universal-wp' ),
        'section'     => 'universal_footer',
        'default'     => 'Powered by <a href="https://themeforest.net/user/forbetterweb" target="_blank">forbetterweb.com</a>',
        'priority'    => 10,
        'active_callback'  => array(
            array(
                'setting'  => 'universal_widget_footer_2_count',
                'operator' => '==',
                'value'    => 'two',
            ),
    ),
 );

     $fields[] = array(
        'type'        => 'textarea',
        'settings'    => 'universal_footer_copy_3',
        'label'       => __( 'Copyright Text', 'universal-wp' ),
        'section'     => 'universal_footer',
        'default'     => '<a href="http://forbetterweb.com">©2017 <i class="fa fa-heart fa-fw"></i> forbetterweb.com</a>',
        'priority'    => 10,
        'active_callback'  => array(
            array(
                'setting'  => 'universal_widget_footer_2_count',
                'operator' => '==',
                'value'    => 'one',
            ),
    ),
 );

     $fields[] = array(
        'type'        => 'textarea',
        'settings'    => 'universal_footer_love',
        'label'       => __( 'Middle Text', 'universal-wp' ),
        'section'     => 'universal_footer',
        'default'     => 'We <i class="fa fa-heart fa-fw"></i> creative people',
        'priority'    => 10,
        'active_callback'  => array(
            array(
                'setting'  => 'universal_widget_footer_2_count',
                'operator' => '==',
                'value'    => 'three',
            ),
    ),
 );

     $fields[] = array(
        'type'        => 'text',
        'settings'     => 'universal_fot_soc_twitter',
        'label'       => __( 'Social Media', 'universal-wp' ),
        'description' => __( 'Twitter', 'universal-wp' ),
        'section'     => 'universal_footer',
        'default'     => 'http://twitter.com/',
        'priority'    => 10,
    );

     $fields[] = array(
        'type'        => 'text',
        'settings'     => 'universal_fot_soc_facebook',
        'description' => __( 'Facebook', 'universal-wp' ),
        'section'     => 'universal_footer',
        'default'     => 'http://facebook.com/',
        'priority'    => 10,
    );

     $fields[] = array(
        'type'        => 'text',
        'settings'     => 'universal_fot_soc_googleplus',
        'description' => __( 'Google Plus', 'universal-wp' ),
        'section'     => 'universal_footer',
        'default'     => 'http://plus.google.com/',
        'priority'    => 10,
    );

     $fields[] = array(
        'type'        => 'text',
        'settings'     => 'universal_fot_soc_linkedin',
        'description' => __( 'LinkedIn', 'universal-wp' ),
        'section'     => 'universal_footer',
        'default'     => 'http://linkedin.com/',
        'priority'    => 10,
    );


     $fields[] = array(
        'type'        => 'text',
        'settings'     => 'universal_fot_soc_dribbble',
        'description' => __( 'Dribbble', 'universal-wp' ),
        'section'     => 'universal_footer',
        'default'     => '',
        'priority'    => 10,
    );

     $fields[] = array(
        'type'        => 'text',
        'settings'     => 'universal_fot_soc_instagram',
        'description' => __( 'Instagram', 'universal-wp' ),
        'section'     => 'universal_footer',
        'default'     => '',
        'priority'    => 10,
    );

     $fields[] = array(
        'type'        => 'text',
        'settings'     => 'universal_fot_soc_youtube',
        'description' => __( 'YouTube', 'universal-wp' ),
        'section'     => 'universal_footer',
        'default'     => '',
        'priority'    => 10,
    );

     $fields[] = array(
        'type'        => 'text',
        'settings'     => 'universal_fot_soc_flickr',
        'description' => __( 'Flickr', 'universal-wp' ),
        'section'     => 'universal_footer',
        'default'     => '',
        'priority'    => 10,
    );


     $fields[] = array(
        'type'        => 'text',
        'settings'     => 'universal_fot_soc_tumblr',
        'description' => __( 'Tumblr', 'universal-wp' ),
        'section'     => 'universal_footer',
        'default'     => '',
        'priority'    => 10,
    );



     $fields[] = array(
        'type'        => 'text',
        'settings'     => 'universal_fot_soc_foursquare',
        'description' => __( 'Foursquare', 'universal-wp' ),
        'section'     => 'universal_footer',
        'default'     => '',
        'priority'    => 10,
    );

     $fields[] = array(
        'type'        => 'text',
        'settings'     => 'universal_fot_soc_vk',
        'description' => __( 'VK', 'universal-wp' ),
        'section'     => 'universal_footer',
        'default'     => '',
        'priority'    => 10,
    );

     $fields[] = array(
        'type'        => 'text',
        'settings'     => 'universal_fot_soc_behance',
        'description' => __( 'Behance', 'universal-wp' ),
        'section'     => 'universal_footer',
        'default'     => '',
        'priority'    => 10,
    );

     $fields[] = array(
        'type'        => 'text',
        'settings'     => 'universal_fot_soc_pinterest',
        'description' => __( 'Pinterest', 'universal-wp' ),
        'section'     => 'universal_footer',
        'default'     => '',
        'priority'    => 10,
    );

     $fields[] = array(
        'type'        => 'text',
        'settings'     => 'universal_fot_soc_github',
        'description' => __( 'GitHub', 'universal-wp' ),
        'section'     => 'universal_footer',
        'default'     => '',
        'priority'    => 10,
    );


     $fields[] = array(
        'type'        => 'text',
        'settings'     => 'universal_fot_soc_rss',
        'description' => __( 'RSS', 'universal-wp' ),
        'section'     => 'universal_footer',
        'default'     => '',
        'priority'    => 10,
    );


?>