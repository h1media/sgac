<?php
/**
 * Template Name: Gymnastics NSW
 *
 * @package sgac
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
	<?php
	$swsm_content = get_field( 'swsm_content' );
	$swsm_background_image = get_field( 'swsm_background_image' );
	if ( ! empty( $swsm_content ) ) {
	?>
	<div class="text-over-image"
		<?php if ( ! empty( $swsm_background_image ) ) { ?>
			style="background-image: url('<?php echo esc_url( $swsm_background_image ); ?>');"
		<?php } ?>>
		<div class="container">
			<?php foreach ( $swsm_content as $key => $content ) { ?>	
				<div class="row row-<?php echo $key; ?>">
					<div class="col-sm-12">
						<div class="over-text">
							<?php if ( ! empty( $content['title'] ) ) { ?>
								<h2 class="title">
									<?php echo esc_html( $content['title'] ); ?>
								</h2>
							<?php } ?>
							<?php if ( ! empty( $content['content'] ) ) { ?>
								<?php echo wp_kses_post( $content['content'] ); ?>
							<?php } ?>
						</div>
					</div>
				</div>
		<?php } ?>
		</div>
	</div>
	<?php } ?>
<?php endwhile; ?>
<?php
get_footer();
