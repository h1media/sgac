<?php
/**
 * The header
 *
 * @package SGAC
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">

<?php wp_head(); ?>
<?php
if ( is_page() || is_single() ) {
	$header_image = wp_get_attachment_url( get_post_thumbnail_id() );
}
if ( is_tax( 'wcs-type' ) ) {
	$term_id = get_queried_object()->term_id;
	$get_term_image = get_field( 'image_feature', 'term_' . $term_id );
	if ( ! empty( $get_term_image['url'] ) ) {
		$header_image = $get_term_image['url'];
	} else {
		$header_image = false;
	}
}
$header_image_class = ! empty( $header_image ) ? 'header-image' : 'header-noimage';
?>

<body <?php body_class( $header_image_class ); ?>>
<div id="page" class="site">
	<header class="site-header">
		<?php if ( ! empty( $header_image ) ) : ?>
			<div class="site-header__image" <?php echo $header_image ? 'style="background-image:url(\' ' . $header_image . ' \');"' : '' ; ?>>
				<div class="site-header__overlay"></div>

				<?php if ( is_front_page() ) : ?>
					<div class="home-banner">
						<?php if ( $h1 = get_field( 'title' ) ) : ?>
							<h1 class="home"><?php echo wp_kses_post( $h1 ); ?></h1>
						<?php endif; ?>

						<?php if ( $join = get_field( 'join_now_link', 'option' ) ) : ?>
							<a href="<?php echo esc_url( $join ); ?>" target="_blank" class="button">
								<?php esc_html_e( 'Join now', 'SGAC' ); ?>
							</a>
						<?php endif; ?>
					</div>
				<?php endif; ?>
			</div>
		<?php else : ?>
			<div class="site-header__solid"></div>
		<?php endif; ?>

		<div class="site-header__top">
			<div class="container container--narrow">
				<div class="row">
					<div class="col-sm-4 hidden-xs">
						<ul class="social-icons">
							<?php if ( $fb = get_field( 'fb', 'option' ) ) : ?>
								<li class="icon__item">
									<a href="<?php echo esc_url( $fb ); ?>" target="_blank">
										<span class="icon-ico-facebook"></span>
									</a>
								</li>
							<?php endif; ?>

							<?php if ( $insta = get_field( 'insta', 'option' ) ) : ?>
								<li class="icon__item">
									<a href="<?php echo esc_url( $insta ); ?>" target="_blank">
										<span class="icon-ico-instagram"></span>
									</a>
								</li>
							<?php endif; ?>

							<li class="icon__item">
								<a href="#" id="subscribe-modal">
									<span class="icon-ico-envelope"></span>
								</a>
							</li>
						</ul>
					</div>
					<div class="col-sm-4 col-xs-6">
						<?php
						$custom_logo_id = get_theme_mod( 'custom_logo' );
						$logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );
						?>
						<?php if ( $logo ) : ?>
						<div class="site-header__logo">
							<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
								<img src="<?php echo esc_url( $logo[0] ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>">
							</a>
						</div>
					<?php endif; ?>
					</div>
					<div class="col-sm-4 col-xs-6">
						<div class="site-header__button">
							<?php if ( $join_link = get_field( 'join_now_link', 'option' ) ) : ?>
								<a href="<?php echo esc_url( $join_link ); ?>" target="_blank" class="button header-join">
									<?php esc_html_e( 'Join now', 'SGAC' ); ?>
								</a>
							<?php endif; ?>
							<button class="button menu-button">
								<span class="menu-button__icon">
									<span></span>
									<span></span>
									<span></span>
									<span></span>
								</span>
								<?php echo esc_html_e( 'menu', 'SGAC' ); ?>
							</button>
						</div>	
						<div class="side-menu-overlay"></div>
						<div class="side-menu">
							<div class="menu-side__inner">
								<?php
								wp_nav_menu([
									'menu' => 'side',
									'container' => 'ul',
									'items_wrap' => '<ul class="menu-side__list">%3$s</ul>',
								]);
								?>
								<?php if ( $join_link = get_field( 'join_now_link', 'option' ) ) : ?>
									<div class="menu-side__button">
										<a href="<?php echo esc_url( $join_link ); ?>" target="_blank" class="button"><?php esc_html_e( 'Join now', 'SGAC' ); ?></a>
									</div>
								<?php endif; ?>
							</div>
						</div>						
					</div>
				</div>
			</div>
		</div>
		

		
		
	</header>
	
	<main id="main" class="site-main" role="main">
