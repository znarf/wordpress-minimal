<?php get_header() ?>

<div id="container">

	<?php $menu = wp_nav_menu( array( 'fallback_cb' => '', 'echo' => false, 'container' => '', 'container_class' => 'menu-principal', 'menu_class' => 'h6e-tabs', 'theme_location' => 'primary', 'depth' => 1 ) ); ?>
	<?php if ($menu) { echo $menu; } ?>

	<div id="content">
		<div class="h6e-block bm-mark-list autopagerize_page_element <?php if ($menu) echo "hasmenu" ?>">
			<?php get_template_part( 'loop', 'index' ); ?>
		</div>
	</div><!-- #content -->

	<?php get_sidebar() ?>

	<div class="navigation autopagerize_insert_before">
		<?php previous_posts_link( __('&laquo; Previous Page', 'minimal') ); ?>
		<?php next_posts_link( __('Next Page &raquo;', 'minimal') ) ?>
	</div>

</div><!-- #container -->

<?php get_footer() ?>
