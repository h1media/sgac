<?php
/**
 * Template Name: Contact
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
		<div class="container container--narrow">
			<div class="text-container">
				<div class="contact__form">
				</div>
				<?php the_content(); ?>
			</div>					
		</div>
		<?php if ( $map = get_field( 'map' ) ) : ?>
			<div class="contact__map">
				<div class="marker" 
					data-lat="<?php echo esc_attr( $map['lat'] ); ?>" 
					data-lng="<?php echo esc_attr( $map['lng'] ); ?>">
				</div>	
			</div>
		<?php endif; ?>
	</div>
<?php endwhile; ?>
	
<?php get_footer();
