<?php
/**
 * Blog List Loop
 *
 * @package sgac
 */

?>
<?php
$allHeading = get_field( 'all_classes_heading' );
?>
<div class="home-all-classes__heading">
	<div class="container">
		<div class="row">
			<div class="col-xs-12">
                <h2><?php echo esc_html( $allHeading ); ?></h2>
			</div>
		</div>
	</div>
</div>
<div class="home-all-classes">
	<div class="container container--wide">
		<div class="row row--no-gutter">
			<?php
			if( have_rows( 'all_classes' ) ) :
			    while ( have_rows( 'all_classes' ) ) : the_row();
				$allImg = get_sub_field( 'all_image' );
				$allTitle = get_sub_field( 'all_title' );
				$allText = get_sub_field( 'all_list' );
			?>
						<div class="col-md-4 col-xs-12">
							<div class="all-classes-col">
								<?php
								if ( ! empty( $allImg['sizes']['all-classes'] ) && ! empty( $allImg['title'] ) ) { 
									?>
								<div class="classes__image">
			                        <img src="<?php echo esc_url( $allImg['sizes']['all-classes'] ); ?>" alt="<?php echo esc_html( $allImg['title'] ); ?>"/>
								</div>
									<?php
								}
								if( ! empty( $allTitle ) ) {
									?>
									<div class="classes__title">
										<h3><?php echo esc_html( $allTitle ); ?></h3>
									</div>
									<?php
								}
								if( ! empty( $allText ) ) {
									?>
									<div class="classes__list">
										<?php echo wp_kses_post( $allText ); ?>
									</div>
									<?php
								}
								?>
							</div>
						</div>
			        <?php
			    endwhile;
			endif;
			?>
		</div>
	</div>
</div>
