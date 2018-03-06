<?php
/**
 * Membership plan details modal
 *
 * @package sgac
 */

$uri = get_template_directory_uri();

?>
<div id="modal-membership" class="modal">
	<div class="modal__overlay"></div>
	<div class="modal__content">
		<button class="modal__close" id="modal-close">
			<span class="icon-ico-close-modal"></span>
		</button>
		<button class="gallery-alt-btn gallery-btn__prev prev-membership">
			<span class="icon-left-open"></span>
		</button>
		<button class="gallery-alt-btn gallery-btn__next next-membership">
			<span class="icon-right-open"></span>
		</button>
		<div class="modal-membership__title">
			<span></span>
		</div>
		<div class="modal-membership__inner">
			 <div class="modal-membership__top">
			 	<span class="box__price"></span>
			 	<span class="box__period"></span>
			 </div>
			<div class="modal-membership__content"></div>
			<?php if ( $join_link = get_field( 'join_now_link', 'option' ) ) : ?>
				<div class="modal-membership__join">
					<a href="<?php echo esc_url( $join_link ); ?>" class="button button--small button--join" target="_blank">
						<?php esc_html_e( 'Join now', 'one55' ); ?>
					</a>
				</div>
			<?php endif; ?>
		</div>
		<div class="modal__loader">
			<span class="icon-spin1"></span>
		</div>
	</div>
</div>
