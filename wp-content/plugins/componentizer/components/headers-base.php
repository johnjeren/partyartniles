<?php getComponent('components.core.header');
	$header_nav = function_exists('get_field') ? (get_field('header_nav','option') ? get_field('header_nav','option') : '') : '';
	$header_nav_style = function_exists('get_field') ? get_field('header_nav_style','option') : '';
?>
<nav class="navbar navbar-default navbar-<?=$header_nav_style=='fixed'?'fixed no-background':$header_nav_style;?> bootsnav on no-full">
	<div class="container">
	    <!-- Start Header Navigation -->
	    <div class="navbar-header">
	        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
	            <i class="fa fa-bars"></i>
	        </button>
	        <a class="navbar-brand" href="/"><img src="<?=get_img_src(function_exists('get_field') ? get_field('header_logo_dark','option') : '','16x9');?>" class="logo img-responsive" alt=""></a>
	    </div>
	    <!-- End Header Navigation -->

	    <!-- Collect the nav links, forms, and other content for toggling -->
	    <div class="collapse navbar-collapse" id="navbar-menu">
				<?php
            wp_nav_menu( array(
                'menu'              => $header_nav,
                'depth'             => 2,
                'container'         => 'ul',
                'menu_class'        => 'nav navbar-nav navbar-'.(function_exists('get_field') ? get_field('header_nav_layout','option') : '').' header-nav-navigation',
                'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
                'walker'            => new WP_Bootstrap_Navwalker())
            );
        ?>
	    </div><!-- /.navbar-collapse -->
	</div>

	<?php
		if(@$side_nav){
		?>
	<!-- Start Side Menu -->
	<div class="side">
	    <a href="#" class="close-side"><i class="fa fa-times"></i></a>
	    <div class="widget">
	        <h6 class="title">Custom Pages</h6>
	        <ul class="link">
	            <li><a href="#">About</a></li>
	            <li><a href="#">Services</a></li>
	            <li><a href="#">Blog</a></li>
	            <li><a href="#">Portfolio</a></li>
	            <li><a href="#">Contact</a></li>
	        </ul>
	    </div>
	    <div class="widget">
	        <h6 class="title">Additional Links</h6>
	        <ul class="link">
	            <li><a href="#">Retina Homepage</a></li>
	            <li><a href="#">New Page Examples</a></li>
	            <li><a href="#">Parallax Sections</a></li>
	            <li><a href="#">Shortcode Central</a></li>
	            <li><a href="#">Ultimate Font Collection</a></li>
	        </ul>
	    </div>
	</div>
	<!-- End Side Menu -->
	<?php
		}
	 ?>
</nav>
