<?php
/**
 * Today Classes Module
 *
 * @package one55
 */

$uri = get_template_directory_uri();

$locations = get_terms([
	'taxonomy' => 'wcs-room',
	'hide_empty' => false,
]);

$today = getdate();

$beginOfDay = strtotime( "midnight", $today[0] );
$endOfDay   = strtotime( "tomorrow", $beginOfDay ) - 1;

$min_time = $today[0];
$max_time = $endOfDay;
?>

<?php if ( is_array( $locations ) ) : ?>
	<div class="today-classes">
		<div class="container container--narrow">
			<div class="row">
				<div class="col-sm-12">
					<div class="today-classes__title">
						<h2><?php esc_html_e( 'Classes Today.', 'one55' ); ?></h2>
						<?php if ( $timetable = get_field( 'timetable_page' ) ) : ?>
							<a href="<?php echo esc_url( $timetable ); ?>" class="button button--small"><?php esc_html_e( 'Full timetable', 'one55' ); ?></a>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
		<div class="today-classes__nav">
			<div class="container container--narrow">
				<div class="row">
					<div class="col-lg-5 col-sm-6">
						<div class="tabs-primary">
							<ul class="tabs__list">
								<?php foreach ( $locations as $location ) : ?>
									<li class="tab__item" data-location-id="<?php echo esc_attr( $location->term_id ); ?>"><?php echo esc_html( $location->name ); ?></li>
								<?php endforeach; ?>
							</ul>
							<div class="mobile-select">
								<select class="studio-select__select-today" data-dropdown-css-class="studio-select__dropdown">
									<?php foreach ( $locations as $location ) : ?>
										<option value="<?php echo esc_attr( $location->term_id ); ?>"><?php echo esc_html( $location->name ); ?></option>
									<?php endforeach; ?>
								</select>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<?php
		$args = [
			'post_status' => array( 'publish' ),
			'post_type' => 'class',
			'posts_per_page' => -1,
			'meta_key'  => '_wcs_timestamp',
			'orderby' => 'meta_value_num',
			'order' => 'ASC',
		];
		$classes_array = array();

		$events = new WP_Query( $args );
		if ( $events->have_posts() ) :
			while ( $events->have_posts() ) : $events->the_post();
				$class = new CurlyWeeklyClassEvent( $events->post, $min_time, $max_time );
				$class_data = $class->render();
				if ( !$class_data[0] ) continue;

				$class_data[0]['terms']['wcs_type'] = wp_get_post_terms( get_the_ID(), 'wcs-type' );
				$classes_array[] = $class_data;
			endwhile;
			wp_reset_postdata();
		endif;
		
		usort( $classes_array, function( $a, $b ){
			return $a['timestamp']>$b['timestamp'];
		});

		?>

		<div class="today-classes__events">
			<div class="container container--narrow">
				<div class="row">
					<div class="col-lg-8 col-sm-6">
						<div class="today-events-wrap tabs-container-wrapper">
							<?php foreach ( $locations as $location ) : ?>
								<div class="event-group tab-container" data-location-id=<?php echo esc_attr( $location->term_id ); ?> >
									<?php $counter = 0; ?>
										<?php foreach( $classes_array as $class ) :
											$s_terms = array_column( $class[0]['terms']['wcs_room'], 'slug' );
											$search = array_search( $location->slug, $s_terms ); ?>

											<?php if ( $search !== false ) : ?>
												<div class="today-class__col">
													<div class="today-class__event">
														<?php

														$class_types = $class[0]['terms']['wcs_type'];
														
														if ( count( $class_types ) > 0 ) {
															$class_name = $class_types[0]->name;
															$class_url = get_term_link( $class_types[0] );
														}

														$start_stamp = $class[0]['timestamp'];
													
														if ( $start_stamp ) {
															$start = date( 'g.iA', $start_stamp );
														}
														?>

														<?php if ( ! empty( $class_name ) ) : ?>
															<span class="today-event__title">
																<?php echo esc_html( $class_name ); ?>
															</span>
														<?php endif; ?>

														<?php if ( ! empty( $start ) ) : ?>
															<span class="today-event__time">
																<?php echo esc_html( $start ); ?>
															</span>
														<?php endif; ?>

														<?php if ( ! empty( $class_url ) ) : ?>
															<a href="<?php echo esc_url( $class_url ); ?>"></a>
														<?php endif; ?>

													</div>
												</div>
												<?php $counter++; ?>
											<?php endif; ?>
											
									<?php endforeach; ?>	
									
									<?php if ( 0 === $counter ) : ?>
										<div class="notice"><?php esc_html_e( 'Sorry, no classes today in selected location' ); ?></div>
									<?php endif; ?>
								</div>
							<?php endforeach; ?>
						</div>
					</div>
					<div class="col-lg-4 col-sm-6">
						<?php if ( $class_image = get_field( 'classes_right_image' ) ) : ?>
							<div class="today-classes__img">
								<img src="<?php echo esc_url( $class_image['url'] ); ?>" alt="<?php echo $class_image['alt'] ? esc_attr( $class_image['alt'] ) : esc_attr( $class_image['title'] ); ?>" />
							</div>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php endif; ?>


<?php
