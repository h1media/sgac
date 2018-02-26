<?php
/**
 * Class Description Specification Boxes
 *
 * @package one55
 */

$uri = get_template_directory_uri();
$term_id = get_queried_object()->term_id;

if ( have_rows( 'attributes', 'term_' . $term_id ) ) : ?>
<div class="class-spec-list">
	<?php while ( have_rows( 'attributes' ) ) : the_row(); ?>
		<div class="spec__item">
			<?php if ( $icon = get_sub_field( 'icon' ) ) : ?>
			<div class="spec__icon">
				<img src="<?php echo esc_url( $icon['url'] ); ?>" alt="<?php the_field( 'title' ); ?>">
			</div>
			<?php endif; ?>
			<div class="spec__title">
				<h4><?php the_sub_field( 'title' ); ?></h4>
			</div>
			<div class="spec__desc">
				<?php the_sub_field( 'content' ); ?>
			</div>	
		</div>
	<?php endwhile; ?>
</div>
<?php endif;
