<?php

return [
    'company_name'=>'Componentizer',
    'site_title'=>'Base Theme',
    'theme_title'=>'Base Theme',
    'pages' => [
        '/about'=>'About',
    ],
    'header'=>'components.headers.base',
    'footer'=>'components.footers.base',
    'find_replace'=>[
      'stringtofind'=>'String To Replace With'
    ],
    'enqueued_styles'=>[
      [
      'name'=>'bootsnav-css',
      'href'=>templatePath().'/js/bootsnav/css/bootsnav.css'
      ],
      [
      'name'=>'animate',
      'href'=>'https://daneden.github.io/animate.css'
      ],
      [
        'name'=>'Open Sans',
        'href'=>'https://fonts.googleapis.com/css?family=Open+Sans'
      ]
    ],
    'enqueued_scripts'=>[
      [
      'name'=>'bootsnav-js',
      'href'=>templatePath().'/js/bootsnav/js/bootsnav.js'
      ]
    ]
];
