<?php
/**
 * Template Name: Health and Fitness
 *
 * @package one55
 */

get_header(); ?>


<div class="intro-section-no-bg">
	<div class="container container--narrow">
		<div class="row">
			<div class="col-sm-12 col-md-10 col-md-offset-1">
				<h1><?php the_field( 'title' ); ?></h1>
				<?php the_field( 'text' ); ?>
			</div>
		</div>
	</div>
</div>
<?php
while ( have_posts() ) :
	the_post();
?>
	<div class="container h-f-offer-description">
			<div class="row">
				<div class="col-sm-12 col-md-10 col-md-offset-1">
						<?php the_content(); ?>
				</div>
			</div>
		</div>

	<?php
	$h_f_offer = get_field( 'h_f_offer' );

	if ( ! empty( $h_f_offer ) ) {
	?>
	<div class="h-f-offer-container">
		<?php foreach ( $h_f_offer as $key => $offer ) { ?>
			<div class="offer-container">
				<div class="photo" 
				<?php if ( ! empty( $offer['image'] ) ) { ?>
					style="background-image: url('<?php echo esc_url( $offer['image'] ); ?>');"
				<?php } ?>></div>
				<div class="container">
						<div class="row">
							<div class="col-sm-12">
								<div class="description">
									<?php if ( ! empty( $offer['title'] ) ) { ?>
										<h3>
											<?php echo esc_html( $offer['title'] ); ?>
										</h3>
									<?php } ?>
									<?php if ( ! empty( $offer['content'] ) ) { ?>
										<?php echo wp_kses_post( $offer['content'] ); ?>
									<?php } ?>
									<?php if ( ! empty( $offer['button_text'] ) ) { ?>
										<a href="<?php echo esc_url( $offer['button_link'] ); ?>" class="offer-button">
											<?php echo esc_html( $offer['button_text'] ); ?>
										</a>
									<?php } ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		<?php } ?>
	</div>
	<?php } ?>
	<?php
	$f_h_movie = get_field( 'f_h_movie' );
	if ( ! empty( $f_h_movie ) ) {
	?>
	<div class="container h-f-movie">
		<div class="row">
			<div class="col-sm-12 col-md-8 col-md-offset-2">
				<div class="video-wrapper">
					<?php echo $f_h_movie; ?>
				</div>
			</div>
		</div>
	</div>
	<?php } ?>
	<?php
	$h_f_logo = get_field( 'h_f_logo' );
	$f_h_slogan = get_field( 'f_h_slogan' );
	?>
	<div class="container h-f-slogan">
		<div class="row">
			<div class="col-sm-12">
				<?php if ( ! empty( $h_f_logo ) ) { ?>
					<img src="<?php echo esc_url( $h_f_logo ); ?>" alt="<?php the_title(); ?>">
				<?php } ?>
				<?php if ( ! empty( $f_h_slogan ) ) { ?>
					<?php echo wp_kses_post( $f_h_slogan ); ?>
				<?php } ?>
			</div>
		</div>
	</div>

<?php endwhile; ?>
<?php
get_footer();
