<?php
/**
 * Homepage invitation
 *
 * @package sgac
 */


?>
<div class="home-invitation-section">
	<div class="container">
		<div class="invitation-row">
			<?php if ( $logo = get_field( 'cta_logo' ) ) : ?>
				<div class="invitation__logo">
					<img src="<?php echo esc_url( $logo['url'] ); ?>" alt="<?php echo $logo['alt'] ? esc_attr( $logo['alt'] ) : esc_attr( $logo['title'] ); ?>" />
				</div>
			<?php endif; ?>
			<?php if ( $text = get_field( 'cta_text') ) : ?>
				<div class="inivitation__text">
					<?php echo wp_kses_post( $text ); ?>
				</div>
			<?php endif; ?>
			<?php if ( $join = get_field( 'join_now_link', 'option' ) ) : ?>
				<div class="invitation__cta">
					<a href="<?php echo esc_url( $join ); ?>" class="button button--join" target="_blank"><?php esc_html_e( 'Join now', 'one55' ); ?></a>
				</div>
			<?php endif; ?>
		</div>
	</div>
</div>
