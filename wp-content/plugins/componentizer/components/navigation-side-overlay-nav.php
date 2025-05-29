<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <?php wp_nav_menu([
    'menu_class'=>'nav'
  ]); ?>
</div>
<script>
  $('.navbar-toggle').on('click',function(){
    openNav();
  })
  function openNav() {
    document.getElementById("mySidenav").style.width = "275px";
  }

  function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
  }
</script>
