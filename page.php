<?php
/**
 * Page template file
 *
 * @package one55
 */

get_header(); ?>


<div class="intro-section">
	<div class="container container--narrow">
		<div class="row">
			<div class="col-sm-12">
				<div class="intro-section__inner">
					<?php if ( $intro_title = get_field( 'title' ) ) : ?>
						<h1><?php the_field( 'title' ); ?></h1>
					<?php else :
						the_title( '<h1>', '</h1>' );
					endif; ?>
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
	</div>
<?php endwhile; ?>


<?php get_template_part( 'modules/join', 'banner' ); ?>
<?php get_footer();
