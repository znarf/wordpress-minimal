<h3 class="h6e-extra-title"><?php _e("Search") ?></h3>
<form method="get" class="search-form" action="<?php bloginfo('url'); ?>/">
	<p>
		<input type="text" class="text" value="<?php the_search_query(); ?>" name="s" id="s" />
		<input type="submit" class="button" id="searchsubmit" value="<?php _e("Go") ?>" />
	</p>
</form>
