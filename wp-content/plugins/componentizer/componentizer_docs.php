
<?php

getHeader();

?>

<?php
getComponent('components.heroes.full-screen-billboard',[
  'light_dark'=>'light',
  'text_alignment'=>'center',
  'background_image'=>image('background',TRUE),
  'title'=>'Component Docs',
  'height'=>'not-full',
  'padding_top'=>20,
  'padding_bottom'=>10,
]);

?>
<div class="container">
  <?php
  getComponent('components.title-bars.basic',['title'=>'Heroes']);
  ?>
</div>
<?php

getComponent('components.heroes.full-screen-billboard',[
  'light_dark'=>'light',
  'text_alignment'=>'center',
  'background_image'=>image('background',TRUE),
  'title'=>text(3),
  'subtitle'=>text(5),
  'action_buttons'=>[
    [
      'button_link'=>'/',
      'button_style'=>'white-on-primary',
      'button_text'=>'Go Do This'
    ]
  ]
]);

getComponent('components.heroes.full-screen-billboard',[
  'light_dark'=>'dark',
  'text_alignment'=>'left',
  'background_color'=>"#EEE",
  'title'=>text(3),
  'subtitle'=>text(5),
  'action_buttons'=>[
    [
      'button_link'=>'/',
      'button_style'=>'white-on-primary',
      'button_text'=>'Go Do This'
    ]
  ]
]);

?>
<div class="container">
  <?php
  getComponent('components.title-bars.basic',['title'=>'Action Billboards']);
  ?>
</div>
<?php


getComponent('components.billboards.action',[
  'light_dark'=>'dark',
  'text_alignment'=>'left',
  'title'=>text(3),
  'subtitle'=>text(5),
  'text'=>text(50),
  'background_color'=>"#EEE",
  'action_buttons'=>[
    [
      'button_link'=>'/',
      'button_style'=>'white-on-primary',
      'button_text'=>'Go Do This'
    ]
  ]
]);

getComponent('components.billboards.action',[
  'light_dark'=>'light',
  'text_alignment'=>'center',
  'title'=>text(3),
  'subtitle'=>text(5),
  'text'=>text(50),
  'background_image'=>image('background',TRUE),
  'action_buttons'=>[
    [
      'button_link'=>'/',
      'button_style'=>'white-on-primary',
      'button_text'=>'Go Do This'
    ]
  ]
]);


?>
<div class="container">
  <?php
  getComponent('components.title-bars.basic',['title'=>'Partial Width Content w/ Backgrounds']);
  ?>
</div>
<?php


getComponent('components.content-layouts.partial-width-content-background',[
  'text-color'=>'dark',
  'block_width'=>6,
  'background_image'=>image('background',TRUE),
  'title'=>text(3),
  'subtitle'=>text(5),
  'content'=>text(50),
  'action_buttons'=>[
    [
      'button_link'=>'/',
      'button_style'=>'white-on-primary',
      'button_text'=>'Go Do This'
    ]
  ]
]);
getComponent('components.content-layouts.partial-width-content-background',[
  'text-color'=>'dark',
  'text_alignment'=>'center',
  'block_alignment'=>'center',
  'block_width'=>8,
  'background_image'=>image('background',TRUE),
  'title'=>text(3),
  'subtitle'=>text(5),
  'content'=>text(50),
  'action_buttons'=>[
    [
      'button_link'=>'/',
      'button_style'=>'white-on-primary',
      'button_text'=>'Go Do This'
    ]
  ]
]);
getComponent('components.content-layouts.partial-width-content-background',[
  'text_alignment'=>'right',
  'block_alignment'=>'right',
  'block_width'=>4,
  'background_color'=>'#DDD',
  'title'=>text(3),
  'content'=>text(20),
  'action_buttons'=>[
    [
      'button_link'=>'/',
      'button_style'=>'white-on-primary',
      'button_text'=>'Go Do This'
    ]
  ]
]);


?>
<div class="container">
  <?php
  getComponent('components.title-bars.basic',['title'=>'Content Columns']);
  ?>
</div>
<?php


getComponent('components.content-layouts.content-columns',[
  'columns'=>[
    [
      'column_width'=>8,
      'title'=>text(2),
      'content'=>text(50)
    ], [
      'column_width'=>4,
      'content'=>text(50)
    ]
  ]
]);

getComponent('components.content-layouts.content-columns',[
  'text_color'=>'light',
  'background_color'=>'#777',
  'columns'=>[
    [
      'column_width'=>6,
      'title'=>text(2),
      'content'=>text(100)
    ], [
      'column_width'=>6,
      'title'=>'&nbsp;',
      'content'=>image('16x9')."<br />".text(50)
    ]
  ]
]);


?>
<div class="container">
  <?php
  getComponent('components.title-bars.basic',['title'=>'Clickable Image Rows']);
  ?>
</div>
<?php


$grid_blocks = [];
for ($i=0; $i<=2; $i++){
  $grid_blocks[] = [
    'link'=>'/',
    'title'=>text(2),
    'text'=>text(6),
    'background_image'=>image('background',TRUE)
  ];
}
getComponent('components.content-layouts.no-margin-grid-block',[
  'cols'=>4,
  'height'=>50,
  'grid_block'=>$grid_blocks
]);
?>


<div class="container">
  <?php
  getComponent('components.title-bars.basic',['title'=>'Grid Blocks']);
  ?>
</div>
<?php
$grid_items = [];
for($i=0; $i<=6; $i++){
  $grid_items[] = [
    'title'=>text(2),
    'text'=>text(5),
    'image'=>image('16x9',TRUE)
  ];
}
?>
<div class="container">
  <div class="row">
  <?php
  foreach ($grid_items as $key=>$item){
    if ( $key>0 && $key%3==0 ){
      ?></div><div class="row"><?php
    }
    ?>
    <div class="col-md-4">
      <?php getComponent('components.content-layouts.grid-block-image-title-text',$item); ?>
    </div>
    <?php
  }
  ?>
  </div>
</div>



<div class="container">
  <?php
  getComponent('components.title-bars.basic',['title'=>'Polaroids']);
  ?>
</div>
<?php

$grid_items = [];
for($i=0; $i<=6; $i++){
  $grid_items[] = [
    'title'=>text(2),
    'text'=>text(5),
    'image'=>image('square',TRUE)
  ];
}
?>
<div class="container">
  <div class="row">
  <?php
  foreach ($grid_items as $key=>$item){
    if ( $key>0 && $key%3==0 ){
      ?></div><div class="row"><?php
    }
    ?>
    <div class="col-md-4">
      <?php getComponent('components.content-layouts.polaroid',$item); ?>
    </div>
    <?php
  }
  ?>
  </div>
</div>

<?php


getFooter();

?>
