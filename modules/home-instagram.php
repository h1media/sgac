<?php
/**
 * Homepage invitation
 *
 * @package one55
 */


?>
<div class="home-instagram-section">
	<div class="container">
		<?php if ( $title = get_field( 'insta_title' ) ) : ?>
			<h2><?php echo esc_html( $title ); ?></h2>
		<?php endif; ?>
		<?php if ( $text = get_field( 'insta_text' ) ) : ?>
			<p><?php echo esc_html( $text ); ?></p>
		<?php endif; ?>

		<?php if ( $shortcode = get_field( 'insta_shortcode' ) ) : ?>
			<div class="insta-feed-wrap">
				<?php echo do_shortcode( $shortcode ); ?>
			</div>
		<?php endif; ?>
	</div>
</div>
