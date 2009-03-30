<?php get_header() ?>

<div id="container">
	<div class="bm-mark-list" id="content">
		<div class="autopagerize_page_element">

			<?php while ( have_posts() ) : the_post() ?>

				<?php the_date('', '<h3 class="day-date">', '</h3>'); ?>

				<div <?php post_class() ?> id="post-<?php the_ID(); ?>">

					<?php if (function_exists('bm_is_a_mark') && bm_is_a_mark()) : ?>

						<?php bm_the_mark() ?>

					<?php else : ?>

					<h2 class="entry-title h6e-entry-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
					<div class="h6e-post-info"><?php the_time('F jS, Y') ?> by <?php the_author() ?></div>

					<div class="entry h6e-post-content">
						<?php the_content('Read the rest of this entry &raquo;'); ?>
					</div>

					<p class="postmetadata"><?php the_tags('Tags: ', ', ', '<br />'); ?> Posted in <?php the_category(', ') ?> | <?php edit_post_link('Edit', '', ' | '); ?>  <?php comments_popup_link('No Comments &#187;', '1 Comment &#187;', '% Comments &#187;'); ?></p>

					<?php endif; ?>

				</div>

			<?php endwhile; ?>

		</div><!-- .autopagerize_page_element -->
	</div><!-- #content -->

	<?php get_sidebar() ?>

	<div class="navigation autopagerize_insert_before">
		<?php previous_posts_link() ?>
		<?php next_posts_link() ?>
	</div>

</div><!-- #container -->

<?php get_footer() ?>
