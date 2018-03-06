<?php
/**
 * The main template file
 *
 * @package sgac
 */

$blog_page = get_option( 'page_for_posts' );

get_header(); ?>

<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">
		<div class="intro-section">
			<div class="container container--narrow">
				<div class="row">
					<div class="col-sm-12">
						<div class="intro-section__inner">
							<?php if ( $intro_title = get_field( 'title', $blog_page ) ) : ?>
								<h1><?php echo esc_html( $intro_title ); ?></h1>
							<?php else :
								the_archive_title( '<h1>', '</h1>' );
							endif; ?>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<?php get_template_part( 'modules/utilities', 'blog' ); ?>
	
		<div class="page-content">
			<div class="blog-list">
				<div class="container">
					<?php get_template_part( 'modules/blog', 'list' ); ?>	
				</div>	
			</div>
		</div>
		
	</main>
</div>

<?php get_footer();
