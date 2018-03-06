<?php
/**
 * Template Name: Sports Academy
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
	$sa_title = get_field( 'sa_title' );
	$sa_content = get_field( 'sa_content' );
	$sa_background_image = get_field( 'sa_background_image' );
	if ( ! empty( $sa_title ) ) {
	?>
	<div class="text-over-image"
		<?php if ( ! empty( $sa_background_image ) ) { ?>
			style="background-image: url('<?php echo esc_url( $sa_background_image ); ?>');"
		<?php } ?>>
		<?php if ( ! empty( $sa_content ) ) { ?>
			<div class="container">
				<div class="row">
					<div class="col-sm-12">
						<div class="over-text">
							<?php if ( ! empty( $sa_title ) ) { ?>
								<h2 class="title">
									<?php echo esc_html( $sa_title ); ?>
								</h2>
							<?php } ?>
							<?php echo wp_kses_post( $sa_content ); ?>
						</div>
					</div>
				</div>
			</div>
		<?php } ?>
	</div>
	<?php } ?>
	<?php
	$sa_form = get_field( 'sa_form' );
	if ( ! empty( $sa_form ) ) {
	?>
	<div class="sa-forms">
		<div class="tabs-secondary">
			<ul class="tabs__list">
				<?php foreach ( $sa_form as $key => $form ) { ?>
					<li class="tab__item"><?php echo esc_html( $form['title'] ); ?></li>
				<?php } ?>
			</ul>
		</div>
		<div class="tabs-container-wrapper">
			<?php foreach ( $sa_form as $key => $form ) { ?>
				<div class="tab-container" data-tab="<?php echo $key; ?>">
					<div class="container container--narrow form-tab">
						<div class="row">
							<div class="col-sm-12 col-md-10 col-md-offset-1">
								<?php if ( ! empty( $form['title'] ) ) { ?>
									<div class="title-container">
										<h3>
											<?php echo esc_html( $form['title'] ); ?>
										</h3>
									</div>
								<?php } ?>
								<div class="form">
									<?php echo esc_html( $form['code'] ); ?>
								</div>
							</div>
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
