<?php
/**
 * Blog List Loop
 *
 * @package one55
 */

if ( have_posts() ) : ?>
	<div class="row">
		<?php while ( have_posts() ) : the_post(); ?>
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
		<div class="col-sm-12">
			<div class="blog-pagination">
				<?php blog_pagination(); ?>
			</div>
			
		</div>
	</div>
<?php else : ?>
	<h3 class="notice">
		<?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. ', 'one55' ); ?>
	</h3>
<?php endif;
