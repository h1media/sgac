<?php
/**
 * Join Banner (Sweat is our theraphy)
 *
 * @package one55
 */
$banner = [];
$banner['image'] = get_field( 'join_banner_image', 'option' );
$banner['logo'] = get_field( 'join_banner_logo', 'option' );
$banner['title'] = get_field( 'join_banner_title', 'option' );
$banner['lowertext'] = get_field( 'banner_lowertext', 'option' );
$join_link = get_field( 'join_now_link', 'option' );

if ( ! empty( array_filter( $banner ) ) ) : ?>
	<div class="join-banner" style="background-image:url('<?php echo $banner['image']['url']; ?>');" >
		<div class="container">
			<div class="row">
				<div class="col-lg-8 col-md-12">
					<h3 class="banner__title">
						<?php echo wp_kses_post( $banner['title'] ); ?>
					</h3>
					<div class="banner__lowertext">
						<?php echo wp_kses_post( $banner['lowertext'] ); ?>
					</div>
				</div>
				<div class="col-lg-4 col-md-12">
					<div class="banner__logo">
						<img 
							src="<?php echo esc_html( $banner['logo']['url'] ); ?>" 
							alt="<?php echo $banner['logo']['alt'] ? esc_attr( $banner['logo']['alt'] ) : esc_attr( $banner['logo']['title'] ); ?>">
					</div>
					<?php if ( $join_link ) : ?>
						<div class="banner__join">
							<a href="<?php echo esc_url( $join_link ); ?>" class="button button--join" target="_blank"><?php esc_html_e( 'Join now', 'one55' ); ?></a>
						</div>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
<?php endif; ?>
