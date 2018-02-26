<?php
/**
 * Template Name: Facilities
 *
 * @package one55
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
	

	<?php
	$sgac_image = get_field( 'sgac_image' );
	$sgac_content = get_field( 'sgac_content' );

	if ( is_array( $sgac_image ) && $sgac_content ) : ?>
		<div class="facility facility--image-below">
			<div class="container container--narrow">
				<div class="row">
					<div class="col-sm-12">
						<style>.embed-container { position: relative; padding-bottom: 56.25%; height: 0; overflow: hidden; max-width: 100%; } .embed-container iframe, .embed-container object, .embed-container embed { position: absolute; top: 0; left: 0; width: 100%; height: 100%; }</style><div class='embed-container'><iframe src='https://www.youtube.com/embed/vtrIE4ADSJI' frameborder='0' allowfullscreen></iframe></div>
						<div style="padding-top: 30px"></div>
					</div>
				</div>
			</div>
		</div>
	<?php endif; ?>




<?php endwhile; ?>
	

<?php get_template_part( 'modules/join', 'banner' ); ?>
<?php get_footer();
