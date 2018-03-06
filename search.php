<?php
/**
 * The main template file
 *
 * @package sgac
 */

get_header(); ?>


<div class="intro-section">
	<div class="container container--narrow">
		<div class="row">
			<div class="col-sm-12">
				<div class="intro-section__inner">
					<h1>
						<?php printf( __( 'Search results for: "%s"', 'one55' ), get_search_query() ); ?>
					</h1>
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
		


<?php get_footer();
