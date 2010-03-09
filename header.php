<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes() ?>>
<head profile="http://gmpg.org/xfn/11">

<title><?php wp_title('&laquo;', true, 'right'); ?> <?php bloginfo('name'); ?> - <?php bloginfo('description') ?></title>

<meta http-equiv="content-type" content="<?php bloginfo('html_type') ?>; charset=<?php bloginfo('charset') ?>" />

<link rel="stylesheet" href="<?php h6e_minimal_css() ?>" type="text/css" media="screen" />
<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="alternate" type="application/atom+xml" title="<?php bloginfo('name'); ?> Atom Feed" href="<?php bloginfo('atom_url'); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

<?php wp_head() ?>

</head>

<body class="h6e-layout">
    
<?php
if (get_option('topbar') == 'never') {
    $top_bar = false;
} else if (get_option('topbar') == 'connected' && !is_user_logged_in()) {
    $top_bar = false;
} else {
    $top_bar = true;
}
?>

<?php
if (class_exists('Ld_Ui') && method_exists('Ld_Ui', 'top_bar') && $top_bar) {
    Ld_Ui::top_bar(array(
        'loginUrl' => wp_login_url(), 'logoutUrl' => wp_logout_url($_SERVER["REQUEST_URI"])
    ));
}
?>

<div id="wrapper" class="hfeed h6e-main-content">

	<div id="access">
		<div class="skip-link">
			<a href="#content" title="<?php _e( 'Skip to content', 'sandbox' ) ?>"><?php _e( 'Skip to content', 'sandbox' ) ?></a>
		</div>
	</div><!-- #access -->

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
