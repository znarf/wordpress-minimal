<?php

load_theme_textdomain( 'minimal' );

if (!function_exists('h6e_widgets_init')) {
	function h6e_widgets_init()
	{
		if ( !function_exists('register_sidebars') ) {
			echo 'This theme is supposed to run on WP 2.7+. register_sidebars function is missing.';
			return;
		}

		// code from the WP Sandbox theme - GPL
		// http://www.plaintxt.org/themes/sandbox/

		// Formats the widgets, adding readability-improving whitespace
		$p = array(
			'before_widget'  =>   "\n\t\t\t" . '<li id="%1$s" class="h6e-extra-widget %2$s">',
			'after_widget'   =>   "\n\t\t\t</li>\n",
			'before_title'   =>   "\n\t\t\t\t". '<h3 class="h6e-extra-title">',
			'after_title'    =>   "</h3>\n"
		);

		// Table for how many? Two? This way, please.
		register_sidebars( 2, $p );
	}
}

add_action( 'init', 'h6e_widgets_init' );

if (!function_exists('h6e_next_posts_link_attributes')) {
	function h6e_next_posts_link_attributes($attributes)
	{
		$attributes = 'class="h6e-page next" rel="next"';
		return $attributes;
	}
}

add_filter('next_posts_link_attributes', 'h6e_next_posts_link_attributes');

if (!function_exists('h6e_previous_posts_link_attributes')) {
	function h6e_previous_posts_link_attributes($attributes)
	{
		$attributes = 'class="h6e-page prev" rel="prev"';
		return $attributes;
	}
}

add_filter('previous_posts_link_attributes', 'h6e_previous_posts_link_attributes');

function h6e_minimal_css()
{
	$h6e_css_path = defined('H6E_CSS') ? H6E_CSS : get_bloginfo('stylesheet_directory');
	echo $h6e_css_path . '/h6e-minimal/h6e-minimal.css';	
}


add_action('admin_menu', 'h6e_minimal_add_theme_page');

function h6e_minimal_add_theme_page()
{
	if ( isset( $_GET['page'] ) && $_GET['page'] == basename(__FILE__) ) {
		if ( isset( $_REQUEST['action'] ) && 'save' == $_REQUEST['action'] ) {
			check_admin_referer('minimal-customize');
			if ( isset($_REQUEST['titlecolor']) ) {
				if ( '' == $_REQUEST['titlecolor'] )
					delete_option('h6e_minimal_titlecolor');
				else {
					$titlecolor = preg_replace('/^.*?(#[0-9a-fA-F]{6})?.*$/', '$1', $_REQUEST['titlecolor']);
					update_option('h6e_minimal_titlecolor', $titlecolor);
				}
			}
			if ( isset($_REQUEST['pagewidth']) ) {
				if ( '' == $_REQUEST['pagewidth'] )
					delete_option('h6e_minimal_pagewidth');
				else {
					$pagewidth = $_REQUEST['pagewidth'];
					update_option('h6e_minimal_pagewidth', $pagewidth);
				}
			}
			if ( isset($_REQUEST['fontsize']) ) {
				if ( '' == $_REQUEST['fontsize'] )
					delete_option('h6e_minimal_fontsize');
				else {
					$fontsize = $_REQUEST['fontsize'];
					update_option('h6e_minimal_fontsize', $fontsize);
				}
			}
			if ( isset($_REQUEST['footertext']) ) {
				if ( '' == $_REQUEST['footertext'] )
					delete_option('h6e_minimal_footertext');
				else {
					$footertext = stripslashes($_REQUEST['footertext']);
					update_option('h6e_minimal_footertext', $footertext);
				}
			}
			wp_redirect("themes.php?page=functions.php&saved=true");
			die;
		}
	}
	add_theme_page(
		__('Customize Theme', 'minimal'), __('Customize Theme', 'minimal'),
		'edit_themes', basename(__FILE__), 'h6e_minimal_theme_page'
	);
}


function h6e_minimal_theme_page() {
	if ( isset( $_REQUEST['saved'] ) )
		echo '<div id="message" class="updated fade"><p><strong>'.__('Options saved.').'</strong></p></div>';
?>
<div class='wrap'>
	<h2><?php _e('Customize Theme', 'minimal'); ?></h2>
	<div id="minimal-customize">
		<form method="post" action="">

			<?php wp_nonce_field('minimal-customize'); ?>

			<table class="form-table">
			<tr>
				<td><label>Page Width</label></td>
				<td>
				<input class="regular-text" type="text" name="pagewidth" value="<?php
					$pagewidth = get_option('h6e_minimal_pagewidth');
					echo $pagewidth ? $pagewidth : '60em';
				?>" />
				eg: <em>auto</em>, <em>60em</em>, <em>720px</em>
				</td>
			</tr>
			<tr>
				<td><label>Font Size</label></td>
				<td><input class="regular-text" type="text" name="fontsize" value="<?php
					$fontsize = get_option('h6e_minimal_fontsize');
					echo $fontsize ? $fontsize : '1.2em';
				?>" />
				eg: <em>1.2em</em>, <em>12px</em>
				</td>
			</tr>
			<tr>
				<td><label>Title Color</label></td>
				<td><input class="regular-text" type="text" name="titlecolor" value="<?php
					$titlecolor = get_option('h6e_minimal_titlecolor');
					echo $titlecolor ? $titlecolor : '#009DFF';
				?>" />
				eg: <em>#009DFF</em>, <em>#FF6448</em>, <em>green</em>
				</td>
			</tr>
			<tr>
				<td><label>Footer Text</label></td>
				<td><textarea cols="60" rows="3" class="regular-text" name="footertext"><?php
					$footertext = get_option('h6e_minimal_footertext');
					echo $footertext ? htmlspecialchars($footertext) :
						htmlspecialchars('Powered by <a href="http://wordpress.org/">WordPress</a>' . "\n" .
							'with a touch of <a href="http://h6e.net/">h6e</a>');
				?></textarea></td>
			</tr>
			</table>

			<p class="submit">
				<input type="hidden" name="action" value="save" />
				<input class="button-primary" type="submit" value="Update options" />
			</p>

		</form>
	</div>
</div>
<?php }

function h6e_minimal_head() {
	$head = "<style type='text/css'>\n<!--";
	$output = '';
	if ( false !== ( $titlecolor = get_option('h6e_minimal_titlecolor') ) ) {
		$output .= ".h6e-entry-title, .h6e-entry-title a, .h6e-entry-title a:visited { color: $titlecolor; }\n";
	}
	if ( false !== ( $pagewidth = get_option('h6e_minimal_pagewidth') ) && $pagewidth != 'auto' ) {
		$output .= ".h6e-main-content { width: $pagewidth; }\n";
	}
	if ( false !== ( $fontsize = get_option('h6e_minimal_fontsize') ) ) {
		$output .= ".h6e-main-content { font-size: $fontsize; }\n";
	} else {
		$output .= ".h6e-main-content { font-size: 1.2em; }\n";
	}
	$foot = "--></style>\n";
	if ( '' != $output )
		echo $head . $output . $foot;
}

add_action('wp_head', 'h6e_minimal_head');
