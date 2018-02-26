<?php
/**
 * Precinct Bar
 *
 * @package one55
 */

?>
<div class="precinct-bar-wrap">
	
		<div class="precinct-bar">
			<div class="precint-bar__promo open">
				<div class="bar__title">
					<div class="left-width">
						<?php echo esc_html_e( 'Promotions', 'one55' ); ?>
						<span class="bar__icon icon-up-open"></span>
					</div>
				</div>
				<div class="bar__content">
					<div class="left-width">
						<div class="content-flex-row">
						
							<?php if ( $promo_image = get_field( 'precinct_promo_image', 'option' ) ) : ?>
								<div class="promo__image">
									<img 
										src="<?php echo esc_url( $promo_image['url'] ); ?>" 
										alt="<?php echo $promo_image['alt'] ? esc_attr( $promo_image['alt'] ) : esc_attr( $promo_image['title'] ); ?>" >
								</div>
							<?php endif; ?>
						
							<div class="promo__content">
								<?php the_field( 'precinct_promo_content', 'option' ); ?>
								<?php 
								$promo_url = get_field( 'precinct_promo_url', 'option' );
								$promo_btn = get_field( 'precinct_promo_btn', 'option' );
								if ( $promo_url && $promo_btn ) : ?>
									<a href="<?php echo esc_url( $promo_url ); ?>" class="button button--small button--promo" target="_blank">
										<?php echo esc_html( $promo_btn ); ?>
									</a>
								<?php endif; ?>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="precint-bar__partners open">
				<div class="bar__title">
					<div class="right-width">
						<?php esc_html_e( 'Precinct Partners', 'one55' ); ?>
						<span class="bar__icon icon-up-open"></span>
					</div>
				</div>
				<div class="bar__content">
					<div class="partners__content">
						<div class="content-flex-row">

							<?php if ( have_rows( 'precinct_logos', 'option' ) ) : ?>
								<ul class="partners-logos__list">
									<?php while ( have_rows( 'precinct_logos', 'option' ) ) : the_row(); ?>

										<?php if ( $logo = get_sub_field( 'logo' ) ) : ?>
											<li class="logo__item">
												<a href="<?php the_sub_field( 'url' ); ?>" target="_blank">
													<img 
														src="<?php echo esc_url( $logo['url'] ); ?>" 
														alt="<?php echo $logo['alt'] ? esc_attr( $logo['alt'] ) : esc_attr( $logo['title'] ); ?>">
												</a>
											</li>
										<?php endif; ?>

									<?php endwhile; ?>
								</ul>
							<?php endif; ?>

						</div>
					</div>
					
				</div>
			</div>
		</div>
		
	</div>
</div>
