<?php
/**
 * Template Name: Campaign
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
	<?php $left_image = get_field( 'left_image' ); ?>
	<div class="page-content">
		<div class="image-container" <?php echo $left_image ? 'style="background-image:url(\'' . $left_image['url'] . '\');"' : ' '; ?>>
			<div class="container container--narrow">
				<div class="row">
					<div class="col-md-offset-6 col-md-6 col-sm-12">
						<div class="upper-content">
							<img src="<?php echo esc_url( $left_image['url'] ); ?>" class="campaign-mobile-image" />
							<?php the_content(); ?>
							<?php
							$button_text = get_field( 'button_join_text' );
							$button_link = get_field( 'join_now_link', 'option' );
							if ( $button_text && $button_link ) : ?>
								<a href="<?php echo esc_url( $button_link ); ?>" target="_blank" class="button button--campaign"><?php echo esc_html( $button_text ); ?></a>
							<?php endif; ?>
							<span class="decor-separator"></span>
							<?php if ( $before_form = get_field( 'before_form_content' ) ) : ?>
								<?php echo wp_kses_post( $before_form ); ?>
							<?php endif; ?>
							<div class="campaign-form form-wrap"></div>
						</div>
						
					</div>	
				</div>			
			</div>
		</div>
		<div class="facilities-carousel-section owl-carousel">
			<div class="container">
				<?php if ( $carousel_title = get_field( 'facilities_carousel_title' ) ) : ?>
					<h2><?php echo esc_html( $carousel_title ); ?></h2>
				<?php endif; ?>

				<?php if ( $gallery = get_field( 'facilities_carousel' ) ) : ?>
					<div class="carousel-wrap">
						<div class="facilities-carousel">
							<?php foreach ( $gallery as $item ) : ?>
								<div class="slide">
									<a href="<?php echo esc_url( $item['url'] ); ?>" class="facilities-carousel__zoom" data-width="<?php echo $item['width']?>" data-height="<?php echo $item['height']?>">
										<img 
											src="<?php echo esc_url( $item['sizes']['facility-carousel-thumb'] ); ?>" 
											alt="<?php echo $item['alt'] ? esc_attr( $item['alt'] ) : esc_attr( $item['title'] ); ?>">
									</a>
								</div>
								
							<?php endforeach; ?>
						</div>
						<div class="facilities-carousel__nav">
							<button class="gallery-btn gallery-btn__prev">
								<span class="icon-ico-left-chevron-sml"></span>
							</button>
							<button class="gallery-btn gallery-btn__next">
								<span class="icon-ico-right-chevron-sml"></span>
							</button>
						</div>
					</div>
				<?php endif; ?>

				<?php if ( $carousel_bottom_text = get_field( 'facilities_carousel_bottom_text' ) ) : ?>
					<div class="container--narrow">
						<p class="facilities-carousel-section__bottom-text"><?php echo wp_kses_post( $carousel_bottom_text ); ?></p>
					</div>
					
				<?php endif; ?>
			</div>
		</div>
	</div>
<?php endwhile; ?>


<?php get_template_part( 'modules/join', 'banner' ); ?>
<?php get_template_part( 'modules/carousel', 'enlargement' ); ?>
<?php get_footer();
