<?php
/**
 * Template Name: Kidz Korner
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
	<div class="page-content">
		<div class="container container--narrow">
			<div class="text-container">
				<?php if ( $logo = get_field( 'logo' ) ) : ?>
					<img 
						class="kidz-corner-logo"
						src="<?php echo esc_url( $logo['url'] ); ?>" 
						alt="<?php echo $logo['alt'] ? esc_attr( $logo['alt'] ) : esc_attr( $logo['title'] ); ?>">
				<?php endif; ?>
				<?php the_content(); ?>
				<div class="kidz-buttons">
					<?php
					$btn1_text = get_field( 'button_1_text' );
					$btn1_file = get_field( 'button_1_file' );
					$btn2_text = get_field( 'button_2_text' );
					$btn2_file = get_field( 'button_2_file' );

					if ( $btn1_text && $btn1_file ) : ?>
						<a href="<?php echo esc_url( $btn1_file['url'] ); ?>" class="button" target="_blank"><?php echo esc_html( $btn1_text ); ?></a>
					<?php endif; ?>

					<?php if ( $btn2_text && $btn2_file ) : ?>
						<a href="<?php echo esc_url( $btn2_file['url'] ); ?>" class="button" target="_blank"><?php echo esc_html( $btn2_text ); ?></a>
					<?php endif; ?>
				</div>
				
			</div>					
		</div>
	</div>
<?php endwhile; ?>


<?php get_template_part( 'modules/join', 'banner' ); ?>
<?php get_footer();
