<?php
/**
 * Template Name: Our People
 *
 * @package one55
 */

$uri = get_template_directory_uri();

get_header(); ?>


<div class="intro-section">
	<div class="container container--narrow">
		<div class="row">
			<div class="col-sm-12">
				<div class="intro-section__inner">
					<h1><?php the_field( 'title' ); ?></h1>
					<?php the_field( 'text' ); ?>
				</div>
			</div>
		</div>
	</div>
</div>
<?php while ( have_posts() ) : the_post(); ?>
	<div class="page-content">
		<div class="container">
			<div class="people-nav">
				<div class="tabs-secondary">
					<ul class="tabs__list">
						<li class="tab__item active"><?php esc_html_e( 'Personal Trainers', 'one55' ); ?></li>
						<li class="tab__item"><?php esc_html_e( 'Group Class Instructors', 'one55' ); ?></li>
					</ul>
				</div>
			</div>
			<div class="tabs-container-wrapper people-tabs">
				<button class="mobile-tab-trigger active"><?php esc_html_e( 'Personal Trainers', 'one55' ); ?>
					<span class="icon-down-open"></span>
				</button>
				<div class="tab-container active" data-tab="0">
					<div class="container container--narrow">
						<div class="text-container">
							<?php the_field( 'personal_trainers_text' ); ?>
						</div>
						
					</div>

					<?php get_template_part( 'modules/personal', 'trainers' ); ?>
				</div>
				<button class="mobile-tab-trigger"><?php esc_html_e( 'Group Class Instructors', 'one55' ); ?>
					<span class="icon-down-open"></span>
				</button>
				<div class="tab-container" data-tab="1">
					<div class="container container--narrow">
						<div class="text-container">
							<?php the_field( 'group_class_instructors_text' ); ?>
						</div>
					</div>
					<?php
					$instructors = get_terms([
						'taxonomy' => 'wcs-instructor',
						'hide_empty' => false,
					]);

					if ( is_array( $instructors ) ) : ?>
					<div class="container">
						<div class="row">
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
											<a href="#" class="person-thumbnail__link" data-instructor-id="<?php echo esc_attr( $instructor->term_id ); ?>" data-person-type="<?php echo esc_attr( $instructor->taxonomy ); ?>" data-position=<?php echo $i; ?> ></a>
										</div>
									</div>
									<?php $i++; ?>
								<?php endforeach; ?>
							</div>
						</div>
					</div>
					<?php endif; ?>
				</div>
			</div>
			<div class="container">
				<div class="people-buttons">
					<?php if ( $schedule_title = get_field( 'schedule_title' ) ) : ?>
						<div class="text-container">
							<h2><?php echo esc_html( $schedule_title ); ?></h2>
						</div>
					<?php endif; ?>

					<?php
					$timetable_page = get_field( 'timetable_page' );
					$timetable_btn = get_field( 'timetable_button' );
					$classes_page = get_field( 'classes_page' );
					$classes_btn = get_field( 'classes_button' );

					if ( $timetable_page && $timetable_btn ) : ?>
						<a href="<?php echo esc_url( $timetable_page ); ?>" class="button">
							<?php echo esc_html( $timetable_btn ); ?>
						</a>
					<?php endif; ?>

					<?php if ( $classes_page && $classes_btn ) : ?>
						<a href="<?php echo esc_url( $classes_page ); ?>" class="button">
							<?php echo esc_html( $classes_btn ); ?>
						</a>
					<?php endif; ?>
				
				</div>
			</div>
		</div>
	
	</div>
<?php endwhile; ?>


<?php get_template_part( 'modules/join', 'banner' ); ?>
<?php get_template_part( 'modules/modal', 'instructor' ); ?>
<?php get_footer();
