<?php
/**
 * The template for displaying Comments.
 *
 * @package one55
 */


if ( post_password_required() ) {
	return;
}?>

<div id="comments" class="comments-area">

	<?php if ( have_comments() ) : ?>
		<h4 class="comments-title">
		<?php
		printf( _nx( '1 thought on "%2$s"', '%1$s thoughts on "%2$s"', get_comments_number(), 'comments title', 'whollygrail' ),
			number_format_i18n( get_comments_number() ), '<span>' . get_the_title() . '</span>' );
		?>
		</h4>
		<ol class="comment-list">
			<?php
			wp_list_comments( [
				'style'       => 'ol',
				'short_ping'  => true,
				'callback'    => 'one55_custom_comments',
			] );
			?>
		</ol>
		<?php
		if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :
		?>
			<nav class="navigation comment-navigation" role="navigation">
				<h1 class="screen-reader-text section-heading"><?php _e( 'Comment navigation', 'whollygrail' ); ?></h1>
				<div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'whollygrail' ) ); ?></div>
				<div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'whollygrail' ) ); ?></div>
			</nav>
		<?php endif; // Check for comment navigation ?>
		<?php if ( ! comments_open() && get_comments_number() ) : ?>
			<p class="no-comments"><?php _e( 'Comments are closed.' , 'whollygrail' ); ?></p>
		<?php endif; ?>
	<?php endif; // have_comments() ?>

	<?php
	$args = [
		'comment_notes_before' => '',
		'title_reply_after' => '</h3><p class="comment-notice">' . __( 'Your email address will not be published. Required fields are marked *', 'one55' ) . '</p>',
		'label_submit' => __( 'Submit' ),
		'comment_field' => '<p class="comment-form-comment"><label for="comment">' . _x( 'Comment', 'noun' ) .' <span class="required">*</span></label><textarea id="comment" name="comment" cols="45" rows="8" aria-required="true">' .
		  '</textarea></p>',
		''
	];
	?>

	<p class="comment-notes"><?php  ?></p>
	
	<?php comment_form( $args ); ?>

</div>
