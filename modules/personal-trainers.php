<?php
/**
 * Personal Trainers Grid
 *
 * @package one55
 */

$trainers = get_terms([
	'taxonomy' => 'wcs-personal-trainer',
	'hide_empty' => false,
]);

if ( is_array( $trainers ) ) : ?>
<div class="container">
	<div class="row">
		<div class="instructors__row">
			<?php $i = 0; ?>
			<?php foreach ( $trainers as $trainer ) : ?>
				<?php $thumb_img = get_field( 'profile_image', 'term_' . $trainer->term_id ); ?>
				<div class="instructor__col">
					<div class="person-thumbnail" <?php echo $thumb_img ? 'style="background-image:url(\'' . $thumb_img['url'] . '\')"' : ''; ?>>
						
						<div class="person-thumbnail__hover">
							<h3 class="person-thumbnail__title">
								<?php echo esc_html( $trainer->name ); ?>
							</h3>
						</div>
						<div class="person-thumbnail__icon">
							<span class="icon__line line--h"></span>
							<span class="icon__line line--v"></span>
						</div>

						<a href="#" class="person-thumbnail__link" data-instructor-id="<?php echo esc_attr( $trainer->term_id ); ?>" data-person-type="<?php echo esc_attr( $trainer->taxonomy ); ?>" data-position=<?php echo $i; ?>></a>
					</div>
				</div>
				<?php $i++; ?>
			<?php endforeach; ?>
		</div>
	</div>
</div>
<?php endif; ?>
