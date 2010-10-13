<?php
/**
 * @package WordPress
 * @subpackage Classic_Theme
 */

if ( post_password_required() ) : ?>
<p><?php _e('Enter your password to view comments.', 'minimal'); ?></p>
<?php return; endif; ?>

<div id="comments" class="h6e-comment-section">

<h3 class="h6e-comment-section-title"><?php comments_number(__('No Comments', 'minimal'), __('One Comment', 'minimal'), __('% Comments', 'minimal')); ?></h3>

<?php if ( $comments ) : ?>
<dl id="commentlist" class="h6e-comment-list">

<?php foreach ($comments as $comment) : ?>

	<dd><?php comment_text() ?></dd>

	<dt <?php comment_class(); ?> id="comment-<?php comment_ID() ?>"><?php echo get_avatar( $comment, 20 ); ?> <?php _e('by', 'minimal'); ?> <?php comment_author_link() ?> &#8212; <?php comment_date() ?> @ <a href="#comment-<?php comment_ID() ?>"><?php comment_time() ?></a><?php edit_comment_link(__("Edit This", 'minimal'), ' | '); ?></dt>

<?php endforeach; ?>

</dl>

<?php else : // If there are no comments yet ?>
	<!-- <p><?php _e('No comments yet.', 'minimal'); ?></p> -->
<?php endif; ?>

</div>

<div id="comment-form" class="h6e-comment-section">

<?php if ( comments_open() ) : ?>
<h3 class="h6e-comment-section-title"><?php _e('Leave a comment', 'minimal'); ?></h3>

<?php if ( get_option('comment_registration') && !$user_ID ) : ?>
<p><?php printf(__('You must be <a href="%s">logged in</a> to post a comment.', 'minimal'), get_option('siteurl')."/wp-login.php?redirect_to=".urlencode(get_permalink()));?></p>
<?php else : ?>

<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">

<?php if ( $user_ID ) : ?>

<p><?php printf(__('Logged in as %s.', 'minimal'), '<a href="'.get_option('siteurl').'/wp-admin/profile.php">'.$user_identity.'</a>'); ?> <a href="<?php echo wp_logout_url(get_permalink()); ?>" title="<?php _e('Log out of this account', 'minimal') ?>"><?php _e('Log out &raquo;', 'minimal'); ?></a></p>

<?php else : ?>

<p><input type="text" name="author" id="author" value="<?php echo $comment_author; ?>" size="22" tabindex="1" />
<label for="author"><small><?php _e('Name', 'minimal'); ?> <?php if ($req) _e('(required)', 'minimal'); ?></small></label></p>

<p><input type="text" name="email" id="email" value="<?php echo $comment_author_email; ?>" size="22" tabindex="2" />
<label for="email"><small><?php _e('Mail (will not be published)', 'minimal');?> <?php if ($req) _e('(required)', 'minimal'); ?></small></label></p>

<p><input type="text" name="url" id="url" value="<?php echo $comment_author_url; ?>" size="22" tabindex="3" />
<label for="url"><small><?php _e('Website', 'minimal'); ?></small></label></p>

<?php endif; ?>

<p><textarea name="comment" id="comment" cols="100%" rows="10" tabindex="4"></textarea></p>

<p><input class="submit button" name="submit" type="submit" id="submit" tabindex="5" value="<?php echo esc_attr(__('Submit Comment', 'minimal')); ?>" />
<?php
// we are not supposed to do that but $id is currently missing
$id = $post->ID;
comment_id_fields();
?>
</p>
<?php do_action('comment_form', $post->ID); ?>

</form>

<?php endif; // If registration required and not logged in ?>

<?php else : // Comments are closed ?>
<p><?php _e('Sorry, the comment form is closed at this time.', 'minimal'); ?></p>
<?php endif; ?>

</div>