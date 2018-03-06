<?php
/**
 * Template Name: Timetable
 *
 * @package sgac
 */

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
		<div class="utilities-section">
			<div class="container container--narrow">
				<div class="utilities">
					<div class="studio-select">
						<label class="studio-select__label"><?php esc_html_e( 'Select studio', 'one55' ); ?></label>
					</div>
					<?php if ( $timetable_pdf = get_field( 'pdf_timetable' ) ) : ?>
						<div class="studio-timetable">
							<a href="<?php echo esc_url( $timetable_pdf['url'] ); ?>" target="_blank" class="studio-timetable__download">
								<span class="icon-ico-download"></span>
								<?php esc_html_e( 'Download Timetable' ); ?>
							</a>
						</div>
					<?php endif; ?>
				</div>
			</div>
		</div>
		<div class="container">
			<?php the_content(); ?>
		</div>
	
	</div>
<?php endwhile; ?>


<?php get_template_part( 'modules/join', 'banner' ); ?>
<?php get_footer();
