<?php getHeader() ?>

<div class="">
  <?php getComponent('components.title-bars.image-back',['text'=>'Staff'])?>
</div>

<?php
$staff_raw = get_posts([
  'post_type'=>'staff',
  'numberposts'=>-1
]);


$staff = [];
foreach ($staff_raw as $record){
  $staff[get_field('staff_category',$record->ID)->post_title][] = $record;
}

?>

<div class="container mt30">
  <?php
  foreach ($staff as $category=>$people) {
    ?>
    <div class="row">
      <div class="col-md-12">
        <h2><?=$category?></h2>
      </div>
    </div>
    <?php

    foreach ($people as $person){
      //echo $person->ID;
      //dd($person);
        ?>
        <div class="col-md-3">
          <?php getComponent('components.staff',[
            'category'=>get_field('staff_category',$person->ID),
            'name'=>$person->post_title,
            'position'=>get_field('position',$person->ID),
            'image'=>get_field('image',$person->ID)
          ])?>
        </div>
        <?php
    }
  }
?>
</div>

<?php getFooter()?>
