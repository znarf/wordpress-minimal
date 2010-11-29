<?php get_header() ?>

<div id="container">

	<?php h6e_minimal_menu() ?>

	<div id="content">
		<div <?php h6e_block_class('inner-content bm-mark-list autopagerize_page_element') ?>>
<?php if ( have_posts() ) : ?>
				<?php get_template_part( 'loop', 'search' ); ?>
<?php else : ?>
				<div id="post-0" <?php h6e_post_class('post no-results not-found') ?>>
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
