<?php get_header() ?>

<div id="container">

	<?php $menu = wp_nav_menu( array( 'fallback_cb' => '', 'echo' => false, 'container' => '', 'container_class' => 'menu-principal', 'menu_class' => 'h6e-tabs', 'theme_location' => 'primary', 'depth' => 1 ) ); ?>
	<?php if ($menu) { echo $menu; } ?>

	<div id="content">
		<div class="h6e-block <?php if ($menu) echo "hasmenu" ?>">
			<?php get_template_part( 'loop', 'single' ); ?>
			<?php comments_template() ?>
		</div>

	</div> <!-- #content -->

	<?php get_sidebar() ?>

</div> <!-- #container -->

<?php get_footer() ?>
