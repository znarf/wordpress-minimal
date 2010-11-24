<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<title><?php h6e_minimal_the_title() ?></title>
<link rel="stylesheet" href="<?php h6e_minimal_css() ?>" type="text/css" media="screen" />
<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>?v=3.0.0" type="text/css" media="screen" />
<?php wp_head() ?>
</head>

<body class="h6e-layout">

<?php do_action('minimal_top') ?>

<div id="wrapper" class="hfeed h6e-main-content">

	<div id="header">
		<h1 class="h6e-page-title" id="blog-title"><span>
			<a href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php
				bloginfo('name') ?></a>
		</span></h1>
		<div id="blog-description"><?php bloginfo('description') ?></div>
	</div><!-- #header -->

	<?php do_action('minimal_html_header') ?>

