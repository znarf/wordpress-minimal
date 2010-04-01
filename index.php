<?php get_header() ?>

<div id="container">
	<div class="bm-mark-list" id="content">
		<div class="autopagerize_page_element">

			<?php while ( have_posts() ) : the_post() ?>

				<?php the_date(__('F jS, Y', 'minimal'), '<h3 class="day-date h6e-day-date">', '</h3>'); ?>

				<div <?php post_class() ?> id="post-<?php the_ID(); ?>">

					<?php if (function_exists('bm_is_a_mark') && bm_is_a_mark()) : ?>

						<?php bm_the_mark() ?>

					<?php else : ?>

						<h2 class="entry-title h6e-entry-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php printf(__('Permanent Link to %s', 'minimal'), the_title_attribute('echo=0')); ?>"><?php the_title(); ?></a></h2>
					
						<div class="h6e-post-info">
							<?php the_time(__('F jS, Y', 'minimal')) ?>
							<?php printf( __('by %s', 'minimal'), get_the_author() ); ?>
						</div>

						<div class="entry h6e-post-content">
							<?php the_content(__('Read the rest of this entry &raquo;', 'minimal')); ?>
						</div>

						<p class="postmetadata">
							<?php the_tags(__('Tags:', 'minimal') . ' ', ', ', '<br />'); ?>
							<?php printf(__('Posted in %s', 'minimal'), get_the_category_list(', ')); ?> |
							<?php edit_post_link(__('Edit', 'minimal'), '', ' | '); ?>
							<?php comments_popup_link(
								__('No Comments &#187;', 'minimal'), __('1 Comment &#187;', 'minimal'),
								__('% Comments &#187;', 'minimal'), '', __('Comments Closed', 'minimal')
							); ?>
						</p>
	
					<?php endif; ?>

				</div>

			<?php endwhile; ?>

		</div><!-- .autopagerize_page_element -->
	</div><!-- #content -->

	<?php get_sidebar() ?>

	<div class="navigation autopagerize_insert_before">
		<?php previous_posts_link( __('&laquo; Previous Page', 'minimal') ); ?>
		<?php next_posts_link( __('Next Page &raquo;', 'minimal') ) ?>
	</div>

</div><!-- #container -->

<?php get_footer() ?>
