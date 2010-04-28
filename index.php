<?php get_header() ?>

<div id="container">
	<div class="bm-mark-list" id="content">
		<div class="autopagerize_page_element">

			<?php get_template_part( 'loop', 'index' ); ?>

		</div><!-- .autopagerize_page_element -->
	</div><!-- #content -->

	<?php get_sidebar() ?>

	<div class="navigation autopagerize_insert_before">
		<?php previous_posts_link( __('&laquo; Previous Page', 'minimal') ); ?>
		<?php next_posts_link( __('Next Page &raquo;', 'minimal') ) ?>
	</div>

</div><!-- #container -->

<?php get_footer() ?>
