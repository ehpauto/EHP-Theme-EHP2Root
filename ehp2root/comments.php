<?php
/**
 * The template for displaying Comments
 * The area of the page that contains comments and the comment form.
 * @package WordPress
 * @subpackage ehp2
 */

/*
 * If the current post is protected by a password and the visitor has not yet
 * entered the password we will return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<div id="ehp-comments-area">
	<?php if ( have_comments() ) : ?>
    <h3><span class="icon-240"></span>&nbsp;&nbsp;COMMENTS:</h3>
    <ul class="ehp-comment-list">
		<?php
			wp_list_comments( array(
				'style'         => 'ul',
				'short_ping'    => true,
				'avatar_size'   => 0,
                'type'          => 'comment',
                'callback'      =>  ehp2_comment
			) );
            //wp_list_comments( 'type=comment&callback=ehp2_comment' );
		?>
	</ul>
    <?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
	<nav id="comment-nav-below" class="navigation comment-navigation" role="navigation">
		<h1 class="screen-reader-text"><?php _e( 'Comment navigation' ); ?></h1>
		<div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments' ) ); ?></div>
		<div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;') ); ?></div>
	</nav><!-- #comment-nav-below -->
	<?php endif; // Check for comment navigation. ?>
    <?php endif; // have_comments() ?>
    
    <?php 
        $args = array(
          'id_form'           => 'commentform',
          'id_submit'         => 'submit',
          'title_reply'       => __( '<span class="icon-17"></span> Input your comments:' ),
          'title_reply_to'    => __( 'Leave a Reply to %s' ),
          'cancel_reply_link' => __( 'Cancel Reply' ),
          'label_submit'      => __( 'Post Comment' ),

          'comment_field' =>  '<p class="comment-form-comment"><label for="comment">' . _x( '', 'noun' ) .
            '</label><textarea id="comment" name="comment" rows="8" aria-required="true">' .
            '</textarea></p>',

          'must_log_in' => '<p class="must-log-in">' .
            sprintf(
              __( 'You must be <a href="%s">logged in</a> to post a comment.' ),
              wp_login_url( apply_filters( 'the_permalink', get_permalink() ) )
            ) . '</p>',

          'logged_in_as' => '<p class="logged-in-as" style="display: none">' .
            sprintf(
            __( 'Logged in as <a href="%1$s">%2$s</a>. <a href="%3$s" title="Log out of this account">Log out?</a>' ),
              admin_url( 'profile.php' ),
              $user_identity,
              wp_logout_url( apply_filters( 'the_permalink', get_permalink( ) ) )
            ) . '</p>',

          'comment_notes_before' => '<p class="comment-notes">' .
            __( 'Your email address will not be published.' ) . ( $req ? $required_text : '' ) .
            '</p>',

          'comment_notes_after' => '<p class="form-allowed-tags ehp-2ndColor" style="display: none">' .
            sprintf(
              __( '* <i>You may use these <abbr title="HyperText Markup Language">HTML</abbr> tags and attributes: %s' ),
              ' <code>' . allowed_tags() . '</code></i>'
            ) . '</p>',

          'fields' => apply_filters( 'comment_form_default_fields', array(

            'author' =>
              '<p class="comment-form-author">' .
              '<label for="author">' . __( 'Name', 'domainreference' ) . '</label> ' .
              ( $req ? '<span class="required">*</span>' : '' ) .
              '<input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) .
              '" size="30"' . $aria_req . ' /></p>',

            'email' =>
              '<p class="comment-form-email"><label for="email">' . __( 'Email', 'domainreference' ) . '</label> ' .
              ( $req ? '<span class="required">*</span>' : '' ) .
              '<input id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) .
              '" size="30"' . $aria_req . ' /></p>',

            'url' =>
              '<p class="comment-form-url"><label for="url">' .
              __( 'Website', 'domainreference' ) . '</label>' .
              '<input id="url" name="url" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) .
              '" size="30" /></p>'
            )
          ),
        );
        comment_form($args); ?>
</div>
