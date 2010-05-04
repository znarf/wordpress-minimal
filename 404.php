<?php get_header(); ?>

<div id="container">

	<div id="content">

		<div class="post error404 not-found">
			<h2 class="entry-title h6e-entry-title"><?php _e( 'Not Found', 'minimal' ); ?></h1>
			<div class="entry h6e-post-content">
				<p><?php _e( 'Apologies, but the page you requested could not be found.', 'minimal' ); ?></p>
			</div>
		</div>

	</div><!-- #content -->
	
	<?php get_sidebar() ?>

</div><!-- #container -->

<?php get_footer(); ?>