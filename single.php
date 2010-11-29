<?php get_header() ?>

<div id="container">

	<?php h6e_minimal_menu() ?>

	<div id="content">
		<div <?php h6e_block_class('inner-content') ?>>
			<?php get_template_part( 'loop', 'single' ); ?>
			<?php comments_template() ?>
		</div>

	</div> <!-- #content -->

	<?php get_sidebar() ?>

</div> <!-- #container -->

<?php get_footer() ?>
