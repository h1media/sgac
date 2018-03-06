<?php
/**
 * Template Name: Classes
 *
 * @package sgac
 */

$uri = get_template_directory_uri();

get_header(); ?>


<div class="intro-section">
	<div class="container container--narrow">
		<div class="row">
			<div class="col-sm-12">
				<div class="intro-section__inner">
					<h1><?php the_field( 'title' ); ?></h1>
					<?php the_field( 'text' ); ?>
				</div>
			</div>
		</div>
	</div>
</div>
<?php while ( have_posts() ) : the_post(); ?>
	<div class="page-content">
		<div class="container container--narrow">
			<div class="text-container">
				<?php the_content(); ?>
			</div>
		</div>
		<div class="container">
			<?php get_template_part( 'modules/classes-type', 'list' ); ?>
		</div>
		<div class="container container--narrow">
			<div class="text-container">
				<?php if ( $schedule_title = get_field( 'schedule_title' ) ) : ?>
					<h2 class="check-schedule"><?php echo esc_html( $schedule_title ); ?></h2>
				<?php endif; ?>

				<?php
				$schedule_btn = get_field( 'schedule_button' );
				$schedule_link = get_field( 'schedule_page' );
				if ( $schedule_btn && $schedule_link ) : ?>
					<a href="<?php echo esc_url( $schedule_link ); ?>" class='button button--schedule'>
						<?php echo esc_html( $schedule_btn ); ?>
					</a>
				<?php endif; ?>

			</div>
		</div>
	</div>
<?php endwhile; ?>


<?php get_template_part( 'modules/join', 'banner' ); ?>
<?php get_footer();
