<?php get_header() ?>

<div id="container">

	<?php h6e_minimal_menu() ?>

	<div id="content">
		<div <?php h6e_block_class('inner-content bm-mark-list autopagerize_page_element') ?>>
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
