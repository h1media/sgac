<?php
/**
 * Homepage about
 *
 * @package one55
 */


$enco_bg = get_field( 'enco_image' );
?>
<div class="home-about-section" <?php echo $enco_bg ? 'style="background-image:url(\'' . $enco_bg['url'] . '\')"' : ''; ?> >
	<div class="container container--narrow">
		<div class="row">
			<div class="col-sm-12">
				<?php if ( $encourage_title = get_field( 'enco_title' ) ) : ?>
					<h2><?php echo esc_html( $encourage_title ); ?></h2>
				<?php endif; ?>
				<div class="about-intro">
					<?php the_field( 'enco_intro' ); ?>
				</div>
			</div>
			<div class="col-sm-6">
				<div class="about-half">
					<div class="about-half__image">
						<?php if ( $col1_image = get_field( 'enco_col1_image' ) ) : ?>
							<img src="<?php echo esc_url( $col1_image['url'] ); ?>" alt="<?php echo $col1_image['alt'] ? esc_attr( $col1_image['alt'] ) : esc_attr( $col1_image['title'] ); ?>">
						<?php endif; ?>
					</div>
					<div class="about-half__text">
						<?php the_field( 'enco_col1_text' ); ?>
					</div>
				</div>
			</div>
			<div class="col-sm-6">
				<div class="about-half">
					<div class="about-half__image">
						<?php if ( $col2_image = get_field( 'enco_col2_image' ) ) : ?>
							<img src="<?php echo esc_url( $col2_image['url'] ); ?>" alt="<?php echo $col2_image['alt'] ? esc_attr( $col2_image['alt'] ) : esc_attr( $col2_image['title'] ); ?>" class="swim">
						<?php endif; ?>
					</div>
					<div class="about-half__text">
						<?php the_field( 'enco_col2_text' ); ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
