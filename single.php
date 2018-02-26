<?php
/**
 * Single Post Page
 *
 * @package one55
 */

get_header(); ?>


<div class="intro-section">
	<div class="container container--narrow">
		<div class="row">
			<div class="col-sm-12">
				<div class="intro-section__inner">
					<?php the_title( '<h1>','</h1>' ); ?>
					<div class="addthis_inline_share_toolbox"></div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php while ( have_posts() ) : the_post(); ?>

	<div class="page-content">
		<div class="blog-categories__mobile single-post--select">
			<h4><?php esc_html_e( 'Categories', 'one55' ); ?></h4>
			<?php
			$cats = get_categories();
			if ( ! empty( $cats ) ) : ?>
				<select class="blog-categories__mobile-select" data-dropdown-css-class="studio-select__dropdown">
					<?php foreach ( $cats as $cat ) : ?>
						<option value="<?php echo esc_url( get_category_link( $cat->term_id ) ); ?>"><?php echo esc_html( $cat->name ); ?></option>
					<?php endforeach; ?>
				</select>
			<?php endif; ?>
		</div>
		<div class="container container--narrow">
			<div class="blog-row">
				<div class="blog-post">
					<?php the_content(); ?>
					<?php comments_template();?>
					<?php 
					$next = get_adjacent_post( true, '', false, 'category' );
					$prev = get_adjacent_post( true, '', true, 'category' );
					
					?>
					<?php if ( $next || $prev ) : ?>
						<div class="single-post__nav">
							<div class="post-nav__prev">
								<?php if ( $prev ) : ?>
									<a href="<?php echo esc_url( get_permalink( $prev->ID ) ); ?>" class="post-nav__title">
										<span class="icon-ico-left-arrow"></span>
										<?php esc_html_e( 'previous' ); ?>
									</a>
									<a href="<?php echo esc_url( get_permalink( $prev->ID ) ); ?>" class="post-nav__post-title">
										<?php echo esc_html( $prev->post_title ); ?>
									</a>
								<?php endif; ?>
							</div>
							<div class="post-nav__next">
								<?php if ( $next ) : ?>
									<a href="<?php echo esc_url( get_permalink( $next->ID ) ); ?>" class="post-nav__title">
										<?php esc_html_e( 'next', 'one55' ); ?>
										<span class="icon-ico-right-arrow"></span>

									</a>
									<a href="<?php echo esc_url( get_permalink( $next->ID ) ); ?>" class="post-nav__post-title">
										<?php echo esc_html( $next->post_title ); ?>
									</a>
								<?php endif; ?>
							</div>
						</div>
					<?php endif; ?>
				</div>
				<aside class="blog-sidebar">
					<div class="blog-sidebar__block">
						<h4 class="sidebar-block__title"><?php esc_html_e( 'Categories' ); ?></h4>
						<ul class="sidebar-block__list">
							<?php wp_list_categories([
								'hide_empty' => false,
								'title_li' => '',
								'current_category' => '',
							]); ?>
						</ul>
					</div>
					<div class="blog-sidebar__block">
						<div class="sidebar-block__subscribe">
							<span class="icon-ico-mailing-list"></span>
							<?php if ( $sub_text = get_field( 'sidebar_subscribe_text', 'option' ) ) : ?>
								<p><?php echo wp_kses_post( $sub_text ); ?></p>
							<?php endif; ?>
							<div class="sidebar-form"></div>
						</div>
						
					</div>
					
				</aside>	
			</div>
			
		</div>
	</div>
<?php endwhile; ?>


<?php get_footer();
