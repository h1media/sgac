<?php
/**
 * Homepage offers boxes
 *
 * @package one55
 */

?>
<div class="home-promo-boxes">
	<div class="container">
		<div class="promo-row">
			<?php
			$f_offer_title = get_field( 'featured_offer_title' );
			$f_offer_text = get_field( 'featured_offer_text' );
			$f_offer_link = get_field( 'featured_offer_link' );


			if ( $f_offer_title && $f_offer_text && $f_offer_link ) : ?>
				<div class="offer-col offer-col--featured">
					<div class="offer-box offer--featured">
						<div class="featured-inner">
							<div class="offer-box__title">
								<?php echo wp_kses_post( $f_offer_title ); ?>
							</div>
							<div class="offer-box__content">
								<?php echo wp_kses_post( $f_offer_text ); ?>
							</div>
						</div>
					</div>
				</div>
				
			<?php endif; ?>

			<?php while ( have_rows( 'standard_offers' ) ) : the_row(); ?>
				<div class="offer-col">
					<div class="offer-box">
						<?php if ( $title = get_sub_field( 'title' ) ) : ?>
							<div class="offer-box__title">
								<?php echo wp_kses_post( $title ); ?>	
							</div>
						<?php endif; ?>
						<?php if ( $link = get_sub_field( 'link' ) ) : ?>
							<a href="<?php echo esc_url( $link ); ?>" class="offer-box__link"></a>
						<?php endif; ?>
					</div>
				</div>
				
			<?php endwhile; ?>
			<?php wp_reset_postdata(); ?>
		</div>				
	</div>
</div>
