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
				<?php
					$g_n_logo = get_field( 'g_n_logo' );
				if ( ! empty( $g_n_logo ) ) {
				?>
				<img src="<?php echo esc_url( $g_n_logo ); ?>" alt="<?php the_field( 'title' ); ?>">
				<?php } ?>
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
	$g_n_content = get_field( 'g_n_content' );
	if ( ! empty( $g_n_content ) ) {
	?>
	<?php foreach ( $g_n_content as $key => $content ) { ?>	
		<div class="text-over-image"
			<?php if ( ! empty( $content['background_image'] ) ) { ?>
				style="background-image: url('<?php echo esc_url( $content['background_image'] ); ?>');"
			<?php } ?>>
			<div class="container">	
				<div class="row row-gn-<?php echo $key; ?>">
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
			</div>
		</div>
	<?php } ?>
<?php } ?>
<?php
	$g_n_contact = get_field( 'g_n_contact' );
if ( ! empty( $g_n_contact ) ) {
	?>
	<div class="gn-contact">
	<?php echo wp_kses_post( $g_n_contact ); ?>
	</div>
<?php } ?>
<?php endwhile; ?>
<?php
get_footer();
