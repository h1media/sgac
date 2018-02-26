<?php
/**
 * Blog Utility Bar
 *
 * @package one55
 */

?>
<div class="utilities-section">
	<div class="container">
		<div class="utilities">
			<div class="blog-categories">

				<?php if ( ! is_search() ) : ?>
					<ul class="blog-categories__list">
						<?php wp_list_categories([
							'hide_empty' => false,
							'title_li' => '',
						]); ?>
					</ul>
					<div class="blog-categories__mobile">
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
				<?php endif; ?>
				
			</div>
			<div class="blog-search">
				<form action="<?php echo esc_url( home_url( '/' ) ); ?>" class="blog-search__form">
					<div class="search__field">
						<input type="text" name="s" id="s" placeholder="Looking for something?" class="input-search" value="<?php echo esc_attr( get_search_query() ); ?>"/>
						<input type="hidden" name="post_type" value="post" />
						<button class="blog-search__button">
							<span class="icon-ico-search"></span>
						</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
