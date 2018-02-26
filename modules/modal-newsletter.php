<?php
/**
 * Newsletter modal
 *
 * @package one55
 */

?>
<div id="modal-subscribe" class="modal">
	<div class="modal__overlay"></div>
	<div class="modal__content">
		<div class="modal__inner">
			<button class="modal__close" id="modal-close">
				<span class="icon-ico-close-modal"></span>
			</button>

			<?php
			$custom_logo_id = get_theme_mod( 'custom_logo' );
			$logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );
			?>
			<?php if ( $logo ) : ?>
				<div class="modal-subscribe__logo">
					<img src="<?php echo esc_url( $logo[0] ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>">
				</div>
			<?php endif; ?>
			
			<?php if ( $subscribe_text = get_field( 'modal_text', 'option' ) ) : ?>
				<div class="modal-subscribe__text">
					<?php echo wp_kses_post( $subscribe_text ); ?>
				</div>
			<?php endif; ?>
			<div class="modal-subscribe__form"></div>
		</div>
	</div>
</div>
