<?php
  $footer_nav_layout = function_exists('get_field') ? get_field('footer_nav_layout','option') : '';
  if($footer_nav_layout == ''){
    $footer_nav_layout = 2;
  }
  ?>
  <footer class="base-footer">
    <div class="container">
      <div class="row">
        <div class="col-md-4 col-sm-6">
          <p>
            <?=function_exists('the_field') ? the_field('street_address','option') : '';?>
          </p>
          <p>
            <?=function_exists('the_field') ? the_field('city','option') : '';?>,&nbsp;<?=function_exists('the_field') ? the_field('state','option') : '';?>&nbsp;&nbsp;<?=function_exists('the_field') ? the_field('zip_code','option') : '';?>
          </p>
          <p>
            <?=function_exists('the_field') ? the_field('phone_number','option') : '';?>
          </p>
          <p>
            <a href="mailto:<?=function_exists('the_field') ? the_field('email_address','option') : '';?>"><?=function_exists('the_field') ? the_field('email_address','option') : '';?></a>
          </p>
        </div>
        <div class="col-md-8 col-sm-6">
          <?php getComponent('components.navigation.footer-nav-'.$footer_nav_layout,[
            'menu'=>function_exists('get_field') ? get_field('footer_nav','option') : '',
            'column_width'=>[
              'xs'=>6,
              'sm'=>6,
              'md'=>4
            ]
          ]);?>
        </div>
      </div>
    </div>
  </footer>
<?php wp_footer()?>
</body>
</html>
