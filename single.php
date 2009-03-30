<?php get_header() ?>

<div id="container">
	<div id="content">

		<?php the_post() ?>

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

		<?php comments_template() ?>

	</div><!-- #content -->

	<?php get_sidebar() ?>
	
</div><!-- #container -->

<?php get_footer() ?>
