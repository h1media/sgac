<?php
/**
 * The footer
 *
 * @package SGAC
 */

?>
		<?php get_template_part( 'modules/precinct', 'bar' ); ?>
	</main>
	<footer id="colophon" class="site-footer">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 col-sm-6">
					<div class="site-footer__left">
						<?php
						$custom_logo_id = get_theme_mod( 'custom_logo' );
						$logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );
						?>
						<?php if ( $logo ) : ?>
							<div class="footer__logo">
								<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
									<img src="<?php echo esc_url( $logo[0] ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>">
								</a>
							</div>
						<?php endif; ?>
                        <div class="footer-contact">
                            <h3 class="footer__heading">
								<?php esc_html_e( 'Phone', 'SGAC' ); ?>
								<?php if ( $phone = get_field( 'phone', 'option' ) ) : ?>
                                    <a href="<?php generate_phone( $phone ); ?>"><?php echo esc_html( $phone ); ?></a>
								<?php endif; ?>
                            </h3>

							<?php if ( $address = get_field( 'address', 'option' ) ) : ?>
                                <address class="footer-address">
									<?php echo wp_kses_post( $address ); ?>
                                </address>
								<?php $address_link = str_replace('<br />', ' ', $address); ?>
                                <a href="http://maps.apple.com/?q=<?php echo urlencode( $address_link ); ?>" target="_blank" class="footer-contact__view-address"><?php esc_html_e( 'View Map', 'SGAC' ); ?></a>
							<?php endif; ?>
                        </div>
					</div>
				</div>
				<div class="col-lg-3 col-sm-6">
					<div class="footer-links">
						<h3 class="footer__heading"><?php esc_html_e( 'Quick Links', 'SGAC' ); ?></h3>
						<?php
						wp_nav_menu([
							'menu' => 'footer',
							'container' => 'ul',
							'items_wrap' => '<ul class="footer-links__list">%3$s</ul>',
						]);
						?>
					</div>
				</div>
                <div class="col-lg-3 col-sm-6">
                    <div class="footer-connect">
                        <h3 class="footer__heading"><?php esc_html_e( 'Connect', 'SGAC' ); ?></h3>
                        <ul class="social-icons socials--big">
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
                        </ul>
                    </div>
                </div>
				<div class="col-lg-3 col-sm-6">
					<div class="footer-subscribe">
						<h3 class="footer__heading">Subscribe</h3>
						<p><?php echo esc_html_e( 'Receive our exclusive offers and promotions', 'SGAC' ); ?></p>
						<div class="footer-subscribe__form">
							
						</div>
					</div>
				</div>
				<div class="col-sm-12">
					<div class="footer__copyright">
						<p>
							<?php
							$year = date( 'Y' );
							$sitename = get_bloginfo( 'name' );
							$icon = '<span class="icon-ico-redfox"></span>';

							printf(
								wp_kses_post( __( 'Copyright &copy; %1$s %2$s. <a href="https://www.redfoxmedia.com.au" alt="Digital Agency Sydney" target="_blank">Digital Agency Sydney %3$s</a>', 'SGAC' ) ),
								$year, $sitename, $icon
							);
							?>
						</p>
					</div>
				</div>
			</div>
		</div>
	</footer>
	<?php get_template_part( 'modules/modal', 'newsletter' ); ?>
	<?php get_template_part( 'modules/modal', 'refer' ); ?>
	<?php
	if ( is_tax( 'wcs-type' ) ) {
		get_template_part( 'modules/modal', 'instructor' );
	} ?>
</div>
<?php wp_footer(); ?>
<?php the_field( 'scripts', 'option' ); ?>
</body>
</html>
