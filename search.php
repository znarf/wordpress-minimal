<?php get_header() ?>

<div id="container">

	<?php $menu = wp_nav_menu( array( 'fallback_cb' => '', 'echo' => false, 'container' => '', 'container_class' => 'menu-principal', 'menu_class' => 'h6e-tabs', 'theme_location' => 'primary', 'depth' => 1 ) ); ?>
	<?php if ($menu) { echo $menu; } ?>

	<div id="content">
		<div class="h6e-block bm-mark-list autopagerize_page_element <?php if ($menu) echo "hasmenu" ?>">
<?php if ( have_posts() ) : ?>
				<?php get_template_part( 'loop', 'search' ); ?>
<?php else : ?>
				<div id="post-0" class="post no-results not-found">
					<h2 class="entry-title h6e-entry-title"><?php _e( 'Nothing Found', 'minimal' ); ?></h1>
					<div class="entry-content h6e-post-content">
						<p><?php _e( 'Sorry, but nothing matched your search criteria. Please try again with some different keywords.', 'minimal' ); ?></p>
						<?php get_search_form(); ?>
					</div>
				</div>
<?php endif; ?>
		</div>
	</div> <!-- #content -->

	<?php get_sidebar() ?>

</div> <!-- #container -->

<?php get_footer() ?>
