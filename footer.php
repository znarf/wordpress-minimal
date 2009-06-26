<div class="h6e-simple-footer" id="footer">
	<p>
		<span id="generator-link">
		<?php
		if ( false !== ( $footertext = get_option('h6e_minimal_footertext') ) ) {
			echo $footertext;
		} else {
		?>
		Powered by <a href="http://wordpress.org/">WordPress</a>
		with a touch of <a href="http://h6e.net/">h6e</a>
		<?php } ?>
		</span>
	</p>
</div>

</div><!-- #wrapper .hfeed -->

<?php wp_footer() ?>

<?php
if (get_option('topbar') == 'never') {
    $top_bar = false;
} else if (get_option('topbar') == 'connected' && !is_user_logged_in()) {
    $top_bar = false;
} else {
    $top_bar = true;
}
?>

<?php if (function_exists('ld_top_bar') && $top_bar) { ld_top_bar(); } ?>

</body>
</html>