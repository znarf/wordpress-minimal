<div id="sidebar">
	<div class="h6e-block">

		<div id="primary" class="widget-area sidebar">
			<ul class="xoxo">
				<?php if ( ! dynamic_sidebar( 'primary-widget-area' ) ) : ?>

					<li id="search" class="widget-container h6e-extra-widget widget_search">
						<?php get_search_form(); ?>
					</li>

					<li id="meta" class="widget-container h6e-extra-widget">
						<h3 class="widget-title h6e-extra-title"><?php _e( 'Meta', 'twentyten' ); ?></h3>
						<ul>
							<?php wp_register(); ?>
							<li><?php wp_loginout(); ?></li>
							<?php wp_meta(); ?>
						</ul>
					</li>

				<?php endif ?>
			</ul>
		</div>

	</div>
</div>