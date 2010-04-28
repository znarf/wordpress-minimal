<?php get_header() ?>

<div id="container">

	<div id="content">

		<?php get_template_part( 'loop', 'single' ); ?>

		<?php comments_template() ?>

	</div> <!-- #content -->

	<?php get_sidebar() ?>
	
</div> <!-- #container -->

<?php get_footer() ?>
