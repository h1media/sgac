<?php
/**
 * Class Description Events
 *
 * @package one55
 */

$locations = get_terms([
	'taxonomy' => 'wcs-room',
	'hide_empty' => false,
]);

$term_id = get_queried_object()->term_id;
$term_name = get_queried_object()->name;
$instructors = [];

if ( is_array( $locations ) ) : ?>
	<div class="classes-events">
		<?php foreach ( $locations as $location ) : ?>
			<?php
			$args = [
				'post_type' => 'class',
				'posts_per_page' => -1,
				'nopaging' => true,
				'meta_key' => '_wcs_timestamp',
				'orderby' => 'meta_value',
				'order' => 'ASC',
				'tax_query' => [
					'relation' => 'AND',
					[
						'taxonomy' => 'wcs-room',
						'field' => 'term_id',
						'terms' => $location->term_id,
					],
					[
						'taxonomy' => 'wcs-type',
						'field' => 'term_id',
						'terms' => $term_id,
					],
				],
			];

			$events = new WP_Query( $args ); ?>

			
			<?php if ( $events->have_posts() ) : ?>
				<h2><?php printf( __( '%s Class Times', 'one55' ), $location->name ); ?></h2>

				<div class="classes-events__row">
					<?php while ( $events->have_posts() ) : $events->the_post();
						$start_stamp = get_post_meta( get_the_ID(), '_wcs_timestamp' );
						$duration = get_post_meta( get_the_ID(), '_wcs_duration' );
						if ( $start_stamp ) {
							$day = date( 'l', $start_stamp[0] );
							$start = date( 'g:iA', $start_stamp[0] );
							$end_time = strtotime( '+' . $duration[0] . ' minutes', strtotime( $start ) );
							$end = date( 'g:iA', $end_time );
						}
						$event_instructors = wp_get_post_terms( get_the_ID(), 'wcs-instructor' );
						$event_instructor_name = $event_instructors[0]->name;

						$instructors[ $event_instructors[0]->slug ] = $event_instructors[0];
						?>
						<div class="event__col">
							<div class="event">
								<span class="event__colour"></span>
								<span class="event__day"><?php echo esc_html( $day ); ?></span>
								<span class="event__time">
									<?php echo esc_html( $start . ' - ' . $end ); ?>
								</span>
								<span class="event__instructor">
									<?php echo esc_html( $event_instructor_name ); ?>
								</span>
							</div>
						</div>
					<?php endwhile; ?>
					<?php wp_reset_postdata(); ?>
				</div>
			<?php endif; ?>
		<?php endforeach; ?>
	</div>
<?php endif; ?>

<?php if ( ! empty( $instructors ) ) : ?>
	<div class="class-instructors">
		<h2>
			<?php
			printf( __( 'Meet your %s Instructors', 'one55' ), $term_name );
			?>
		</h2>
		<div class="instructors__row">
			<?php $i = 0; ?>
			<?php foreach ( $instructors as $instructor ) : ?>
				<?php $thumb_img = get_field( 'profile_image', 'term_' . $instructor->term_id ); ?>
				<div class="instructor__col">
					<div class="person-thumbnail" <?php echo $thumb_img ? 'style="background-image:url(\'' . $thumb_img['url'] . '\')"' : ''; ?>>
						
						<div class="person-thumbnail__hover">
							<h3 class="person-thumbnail__title">
								<?php echo esc_html( $instructor->name ); ?>
							</h3>
						</div>
						<div class="person-thumbnail__icon">
							<span class="icon__line line--h"></span>
							<span class="icon__line line--v"></span>
						</div>
						<a href="#" data-instructor-id="<?php echo esc_attr( $instructor->term_id ); ?>" data-person-type="<?php echo esc_attr( $instructor->taxonomy ); ?>" data-position=<?php echo $i; ?> class="person-thumbnail__link"></a>
					</div>
				</div>
				<?php $i++; ?>
			<?php endforeach; ?>
		</div>
	</div>
<?php endif;
