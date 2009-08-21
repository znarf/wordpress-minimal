<?php get_header() ?>

<div id="container">

	<div id="content">

		<?php the_post() ?>

		<?php the_date(__('F jS, Y', 'minimal'), '<h3 class="day-date">', '</h3>'); ?>

		<div <?php post_class() ?> id="post-<?php the_ID(); ?>">

			<?php if (function_exists('bm_is_a_mark') && bm_is_a_mark()) : ?>

				<?php bm_the_mark() ?>

			<?php else : ?>

				<h2 class="entry-title h6e-entry-title"><?php the_title(); ?></h2>

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

		<?php comments_template() ?>

	</div><!-- #content -->

	<?php get_sidebar() ?>
	
</div><!-- #container -->

<?php get_footer() ?>
