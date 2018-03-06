<?php
/**
 * Classes type list
 *
 * @package sgac
 */

$uri = get_template_directory_uri();

$classes = get_terms([
	'taxonomy' => 'wcs-type',
	'hide_empty' => false,
]);

if ( is_array( $classes ) ) : ?>
	<div class="class-list">
		<?php if ( $class_title = get_field( 'class_list_title' ) ) : ?>
			<h2><?php echo esc_html( $class_title ); ?></h2>
		<?php endif; ?>
		<div class="row">
			<?php foreach ( $classes as $class ) :
				$class_link = get_term_link( $class );
				$tax_option = 'taxonomy_' . $class->term_id;
				$term_options = get_option( $tax_option );
				$class_thumb = get_field( 'image_thumb', 'term_' . $class->term_id );
				$class_colour = isset( $term_options['color'] ) ? $term_options['color'] : false; ?>

				<div class="col-lg-3 col-md-4 col-sm-6">
					<div class="class-list__item">
						<div class="class-thumbnail" <?php echo isset( $class_thumb['url'] ) ? 'style="background-image:url(' . $class_thumb['url'] . ');"' : ''; ?> >
							<div class="class-thumbnail__overlay"></div>

							<?php if ( $class_colour ) : ?>
								<div class="class-thumbnail__hover" style="background-color: <?php echo esc_attr( $class_colour ); ?>"></div>
							<?php endif; ?>

							<h3 class="class-thumbnail__title">
								<?php echo esc_html( $class->name ); ?>
							</h3>

							<?php if ( $class_colour ) : ?>
								<div class="class-thumbnail__colour" style="background-color: <?php echo esc_attr( $class_colour ); ?>"></div>
							<?php endif; ?>

							<a href="<?php echo esc_html( $class_link ); ?>" class="class-thumbnail__link"></a>
						</div>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
<?php else : ?>
	<div class="notice"><?php esc_html_e( 'Sorry, no classes' ); ?></div>
<?php endif;
