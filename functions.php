<?php

function h6e_minimal_setup()
{
	register_nav_menus( array(
		'primary' => __( 'Primary Navigation', 'minimal' ),
	) );

	register_sidebar( array(
		'name' => 'Primary Widget Area',
		'id' => 'primary-widget-area',
		'description' => __( 'The primary widget area' , 'minimal' ),
		'before_widget' => "\n\t\t\t" . '<li id="%1$s" class="widget-container h6e-extra-widget %2$s">',
		'after_widget' => "\n\t\t\t</li>\n",
		'before_title' => "\n\t\t\t\t". '<h3 class="widget-title h6e-extra-title">',
		'after_title' => "</h3>\n"
	) );

	load_theme_textdomain( 'minimal' );

	add_theme_support( 'automatic-feed-links' );
}

add_action( 'after_setup_theme', 'h6e_minimal_setup' );

function h6e_minimal_the_author()
{
	$author_id = get_the_author_meta( 'ID' );
	echo get_avatar($author_id, 16) . ' ';
	printf(
		'<span class="meta-sep"> ' . __( 'by', 'minimal' ) . ' </span> ' .
		'<span class="author vcard"><a class="url fn n" href="%1$s" title="%2$s">%3$s</a></span>',
		get_author_posts_url( $author_id ),
		sprintf( esc_attr__( 'View all posts by %s', 'minimal' ), get_the_author() ),
		get_the_author()
	);
}

// from twentyten:functions.php:200
function h6e_minimal_the_page_number()
{
	global $paged; // Contains page number.
	if ( $paged >= 2 )
		echo ' | ' . sprintf( __( 'Page %s' , 'minimal' ), $paged );
}

// from twentyten:header.php:17
function h6e_minimal_the_title()
{
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
		$s = $_GET['s'];
		printf( __( 'Search results for "%s"', 'minimal' ), esc_html( $s ) ); h6e_minimal_the_page_number(); echo ' | '; bloginfo( 'name' );
	} elseif ( is_404() ) {
		_e( 'Not Found', 'minimal' ); echo ' | '; bloginfo( 'name' );
	} else {
		wp_title( '' ); echo ' | '; bloginfo( 'name' ); h6e_minimal_the_page_number();
	}
}

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

function h6e_body_class($classes)
{
	$classes[] = 'ld-layout';
	return $classes;
}

add_filter('body_class', 'ld_body_class');

function h6e_post_class( $class = '', $post_id = null )
{
	$classes = get_post_class( $class, $post_id );
	if (empty($classes) && !empty($class)) {
		$classes = array($class);
	}
	echo 'class="' . join( ' ', $classes ) . '"';
}

function h6e_block_class($class = '')
{
	global $menu;
	$classes = array($class);
	if ($menu) {
		$classes = array('has-menu');
	}
	$classes = apply_filters('h6e_block_class', $classes);
	echo 'class="' . join( ' ', $classes ) . '"';
}

function h6e_minimal_css()
{
	if (method_exists('Ld_Ui', 'getCssUrl')) {
		return Ld_Ui::getCssUrl('/h6e-minimal/h6e-minimal.css', 'css-h6e-minimal');
	} else if (file_exists(dirname(__FILE__) . '/h6e-minimal')) {
		return get_bloginfo('stylesheet_directory') . '/h6e-minimal/h6e-minimal.css';
	} else if (defined('H6E_CSS')) {
		return H6E_CSS . '/h6e-minimal/h6e-minimal.css';
	} else {
		return 'http://h6e.net/css/h6e-minimal/h6e-minimal.css';
	}
}

function h6e_minimal_html_header()
{
	if (class_exists('Ld_Ui') && method_exists('Ld_Ui', 'topNav')) {
		Ld_Ui::topNav();
	}
}

add_action('minimal_html_header', 'h6e_minimal_html_header');

function h6e_minimal_menu()
{
	global $menu;
	$params = array( 'fallback_cb' => '', 'echo' => false, 'container' => '', 'container_class' => 'menu-principal',
		'menu_class' => 'h6e-tabs', 'theme_location' => 'primary', 'depth' => 1 );
	$menu = wp_nav_menu($params);
	if (isset($menu)) {
		echo $menu;
	}
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
		__('Minimal options', 'minimal'), __('Minimal options', 'minimal'), 'edit_theme_options', basename(__FILE__), 'h6e_minimal_theme_page'
	);
}

function h6e_minimal_theme_page() {
	if ( isset( $_REQUEST['saved'] ) )
		echo '<div id="message" class="updated fade"><p><strong>'.__('Options saved.').'</strong></p></div>';
?>
<div class='wrap'>
	<h2><?php _e('Minimal options', 'minimal'); ?></h2>
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
	$head = '<style type="text/css">' . "\n";
	$output = '';

	$rules = array();

	if ( false !== ( $titlecolor = get_option('h6e_minimal_titlecolor') ) && $titlecolor != '#009DFF' ) {
		$rules[] = array('selectors' => array('.entry-title, .entry-title a'), 'property' => 'color', 'value' => $titlecolor);
	}
	if ( false !== ( $pagewidth = get_option('h6e_minimal_pagewidth') ) && $pagewidth != 'auto' ) {
		$rules[] = array('selectors' => array('.h6e-main-content'), 'property' => 'width', 'value' => $pagewidth);
	}
	if ( false !== ( $fontsize = get_option('h6e_minimal_fontsize') ) ) {
		$rules[] = array('selectors' => array('.h6e-main-content'), 'property' => 'font-size', 'value' => $fontsize);
	} else {
		$rules[] = array('selectors' => array('.h6e-main-content'), 'property' => 'font-size', 'value' => '1.2em');
	}

	if (defined('LD_APPEARANCE') && constant('LD_APPEARANCE')) {
		$colors = Ld_Ui::getApplicationColors();
		$rules[] = array(
			'selectors' => array('.day-date', '.entry'),
			'property' => 'color',
			'value' => '#' . $colors['ld-colors-text']);
		$rules[] = array(
			'selectors' => array('.h6e-block .day-date', '.h6e-block .entry'),
			'property' => 'color',
			'value' => '#' . $colors['ld-colors-text-3']);
		$rules[] = array(
			'selectors' => array(
				'.h6e-main-content .h6e-entry-title',
				'.h6e-main-content .h6e-entry-title a',
				'.h6e-main-content .h6e-extra-title'),
			'property' => 'color',
			'value' => '#' . $colors['ld-colors-text']);
		$rules[] = array(
			'selectors' => array(
				'.h6e-main-content .h6e-block .h6e-entry-title',
				'.h6e-main-content .h6e-block .h6e-entry-title a',
				'.h6e-main-content .h6e-block .h6e-extra-title'),
			'property' => 'color',
			'value' => '#' . $colors['ld-colors-title-3']);
		$rules[] = array(
			'selectors' => array('.h6e-main-content .h6e-tabs li.current-menu-item a'),
			'property' => 'color',
			'value' => '#' . $colors['ld-colors-background-3']);
	}

	foreach ($rules as $rule) {
		extract($rule);
		$output .= sprintf('%s {%s:%s;}'."\n", join(',', $selectors), $property, $value);
	}

	$foot = "</style>\n";
	if ( '' != $output )
		echo $head . $output . $foot;
}

add_action('wp_head', 'h6e_minimal_head');
