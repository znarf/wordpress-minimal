<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes() ?>>
<head profile="http://gmpg.org/xfn/11">

<title><?php
    // Returns the title based on the type of page being viewed
	if ( is_single() ) {
		single_post_title(); echo ' | '; bloginfo( 'name' );
	} elseif ( is_home() || is_front_page() ) {
		bloginfo( 'name' ); 
		if( get_bloginfo( 'description' ) ) 
			echo ' | ' ; bloginfo( 'description' ); 
		h6e_minimal_the_page_number();
	} elseif ( is_page() ) {
		single_post_title( '' ); echo ' | '; bloginfo( 'name' );
	} elseif ( is_search() ) {
		printf( __( 'Search results for "%s"', 'minimal' ), esc_html( $s ) ); h6e_minimal_the_page_number(); echo ' | '; bloginfo( 'name' );
	} elseif ( is_404() ) {
		_e( 'Not Found', 'minimal' ); echo ' | '; bloginfo( 'name' );
	} else {
		wp_title( '' ); echo ' | '; bloginfo( 'name' ); h6e_minimal_the_page_number();
	}
?></title>

<meta http-equiv="content-type" content="<?php bloginfo('html_type') ?>; charset=<?php bloginfo('charset') ?>" />

<link rel="stylesheet" href="<?php h6e_minimal_css() ?>" type="text/css" media="screen" />
<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />

<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="alternate" type="application/atom+xml" title="<?php bloginfo('name'); ?> Atom Feed" href="<?php bloginfo('atom_url'); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

<?php wp_head() ?>

</head>

<body class="h6e-layout">

<?php minimal_top_bar() ?>

<div id="wrapper" class="hfeed h6e-main-content">

	<div id="header">
		<h1 class="h6e-page-title" id="blog-title"><span>
			<a href="<?php bloginfo('home') ?>/" title="<?php echo wp_specialchars( get_bloginfo('name'), 1 ) ?>" rel="home">
				<?php bloginfo('name') ?>
			</a>
		</span></h1>
		<div id="blog-description">
			<?php bloginfo('description') ?>
		</div>
	</div><!-- #header -->
