<?php
/**
 * Template Name: Membership
 *
 * @package one55
 */

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
		<div class="container container--narrow">
			<div class="text-container">
				<?php the_content(); ?>
			</div>

			<?php if ( have_rows( 'box' ) ) : ?>
				<div class="text-container">
					<?php if ( $membership_title = get_field( 'prices_title' ) ) : ?>
						<h2><?php echo esc_html( $membership_title ); ?></h2>
					<?php endif; ?>
				</div>
				<?php
				$banner_title = get_field( 'price_banner_title' );
				$banner_list = get_field( 'price_banner_list' );

				if ( $banner_title && $banner_list ) : ?>
					<div class="membership-prices__banner">
						<h5><?php echo esc_html( $banner_title ); ?></h5>
						<div class="list">
							<?php echo wp_kses_post( $banner_list ); ?>
						</div>
					</div>
				<?php endif; ?>
				<div class="membership-prices">
						
					<?php while ( have_rows( 'box' ) ) : the_row(); ?>
						<div class="membership-box">
							<div class="box__title">
								<?php the_sub_field( 'title' ); ?>
							</div>
							<div class="box__content">
								<span class="box__price">
									<?php the_sub_field( 'price' ); ?>
								</span>
								<span class="box__period">
									<?php the_sub_field( 'period' ); ?>
								</span>
								<?php if ( $popular = get_sub_field( 'most_popular' ) ) : ?>
									<span class="box__badge"><?php esc_html_e( 'Most popular', 'one55' ); ?></span>
								<?php endif; ?>
							</div>
						</div>
					<?php endwhile; ?>
				</div>
				<div class="text-container">
					<?php the_field( 'prices_text' ); ?>
					<?php if ( $join_link = get_field( 'join_now_link', 'option' ) ) : ?>
						<a href="<?php echo esc_url( $join_link ); ?>" class="button button--normal" target="_blank">
							<?php the_field( 'prices_button_text' ); ?>
						</a>
					<?php endif; ?>
				</div>
			<?php endif; ?>
			<?php if ( have_rows( 'perks' ) ) : ?>
				<?php if ( $perks_title = get_field( 'perks_title' ) ) : ?>
					<div class="text-container">
						<h2 class="perks-title"><?php echo esc_html( $perks_title ); ?></h2>
					</div>
				<?php endif; ?>
				<div class="perks-list">
					<?php while ( have_rows( 'perks' ) ) : the_row(); ?>
						<?php $colour = get_sub_field( 'colour' ); ?>

						<div class="perk__col">
							<div class="perk__item" <?php echo $colour ? 'style="background-color:' . $colour . ' "' : ''; ?> >

								<?php if ( $icon = get_sub_field( 'icon' ) ) : ?>
									<div class="perk__icon">
										<img src="<?php echo esc_url( $icon['url'] ); ?>" alt="<?php echo $icon['alt'] ? esc_attr( $icon['alt'] ) : esc_attr( $icon['title'] ); ?>">
									</div>
								<?php endif; ?>

								<?php if ( $title = get_sub_field( 'title' ) ) : ?>
									<span class="perk__title"><?php echo esc_html( $title ); ?></span>
								<?php endif; ?>
							</div>
						</div>
					<?php endwhile; ?>

				</div>
			<?php endif; ?>
			
		</div>
	</div>
<?php endwhile; ?>


<?php get_template_part( 'modules/join', 'banner' ); ?>
<?php get_template_part( 'modules/modal', 'membership' ); ?>
<?php get_footer();
