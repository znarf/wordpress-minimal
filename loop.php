<?php while ( have_posts() ) : the_post() ?>

	<?php if (!is_page()) the_date(__('F jS, Y', 'minimal'), '<h3 class="day-date h6e-day-date">', '</h3>'); ?>

	<div <?php post_class() ?> id="post-<?php the_ID(); ?>">

		<?php if (function_exists('bm_is_a_mark') && bm_is_a_mark()) : ?>

			<?php bm_the_mark() ?>

		<?php else : ?>

			<h2 class="entry-title h6e-entry-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php printf(__('Permanent Link to %s', 'minimal'), the_title_attribute('echo=0')); ?>"><?php the_title(); ?></a></h2>

			<div class="h6e-post-info">
				<?php h6e_minimal_the_author() ?>
			</div>

			<div class="entry h6e-post-content">
				<?php the_content(__('Read the rest of this entry &raquo;', 'minimal')); ?>
			</div>

			<p class="postmetadata">
				<?php the_tags(__('Tags:', 'minimal') . ' ', ', ', '<br />'); ?>
				<?php if (!is_page()) { printf(__('Posted in %s', 'minimal'), get_the_category_list(', ')); echo ' | '; } ?>
				<?php edit_post_link(__('Edit', 'minimal'), '', ' | '); ?>
				<?php comments_popup_link(
					__('No Comments &#187;', 'minimal'), __('1 Comment &#187;', 'minimal'),
					__('% Comments &#187;', 'minimal'), '', __('Comments Closed', 'minimal')
				); ?>
			</p>

		<?php endif; ?>

	</div>

<?php endwhile; ?>