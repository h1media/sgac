<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @package sgac
 */

get_header(); ?>

<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">
		<div class="intro-section">
			<div class="container container--narrow">
				<div class="row">
					<div class="col-sm-12">
						<div class="intro-section__inner">
							<h1><?php esc_html_e( 'Oh snap... Something went wrong...', 'one55' ); ?></h1>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<div class="page-content">
			<div class="container container--narrow">
				<div class="text-container">
					<span class="error404-big"><?php esc_html_e( '404', 'one55' ); ?></span>
					<h4><?php esc_html_e( 'Page Not Found', 'one55' ); ?></h4>
					<p>
						<?php
						$home_url = home_url( '/' );
						printf( __( 'No page could be found at this address. You may have mis-typed the URL or been directed here by an outdated link. Would you like to go back to the <a href="%s">Home Page</a> instead?', 'one55' ), $home_url );
						?>
					</p>
				</div>					
			</div>
		</div>
		
	</main>
</div>

<?php get_footer();
