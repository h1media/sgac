<?php
/**
 * Homepage blog
 *
 * @package one55
 */


$blog_bg = get_field( 'blog_image' );
?>
<div class="home-blog-section" <?php echo $blog_bg ? 'style="background-image:url(\'' . $blog_bg['url'] . '\')"' : ''; ?> >
	<div class="container">
		<div class="row">
			<?php
			$args = [
				'post_type' => 'post',
				'posts_per_page' => 3,
			];
			$blog = new WP_Query( $args );

			if ( $blog->have_posts() ) : ?>
				<?php while ( $blog->have_posts() ) : $blog->the_post(); ?>
					<div class="col-md-4 col-sm-6">
						<article class="blog-list__blog-item">
							<header class="blog-item__header">
								<div class="blog-item__thumbnail">
									<a href="<?php the_permalink(); ?>">
										<?php the_post_thumbnail(); ?>
									</a>
								</div>
								<h1 class="blog-item__title same-height"><?php the_title(); ?></h1>
							</header>
							<a href="<?php the_permalink(); ?>" class="button button--blog-item">
								<?php esc_html_e( 'Read more', 'one55' ); ?>
							</a>
							<?php
							$a_cat = get_the_category( $post->ID );
							$cat_id = $a_cat[0]->term_id;
							$cat_name = $a_cat[0]->name;
							$cat_colour = get_field( 'colour', 'term_' . $cat_id );
							?>
							<footer class="blog-item__footer" <?php echo $cat_colour ? 'style="background-color:' . $cat_colour . '"' : ''; ?> >
								<div class="blog-item__date">
									<?php echo get_the_date( 'jS F Y' ); ?>
								</div>
								<div class="blog-item__cateogory">
									<a href="<?php echo esc_url( get_term_link( $cat_id ) ); ?>"><?php echo esc_html( $cat_name ); ?></a>
								</div>
							</footer>

						</article>
					</div>
				<?php endwhile; ?>
				<?php wp_reset_postdata(); ?>
			<?php endif; ?>
			
		</div>
	</div>
</div>
