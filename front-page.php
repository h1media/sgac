<?php
/**
 * The front page template file
 *
 * @package SGAC
 */

get_header(); ?>



<div class="intro-home">
	<div class="container container">
		<div class="row">
			<div class="col-sm-6">
				<div class="left-intro">
					<?php if ( $left_title = get_field( 'left_title' ) ) : ?>
						<h2><?php echo esc_html( $left_title ); ?></h2>
					<?php endif; ?>

					<?php if ( $left_text = get_field( 'left_text' ) ) : ?>
						<p><?php echo wp_kses_post( $left_text ); ?></p>
					<?php endif; ?>

					<?php if ( have_rows( 'left_buttons' ) ) : ?>
                        <?php while ( have_rows( 'left_buttons' ) ) : the_row(); ?>
                            <a href="<?php the_sub_field( 'left_button_link' ); ?>" class="button">
                                <?php the_sub_field( 'left_button_text' ); ?>
                            </a>
                        <?php endwhile; ?>
					<?php endif; ?>
                </div>
			</div>
			<div class="col-sm-6">
				<div class="right-intro">
					<?php if ( $right_title = get_field( 'right_title' ) ) : ?>
						<h2><?php echo esc_html( $right_title ); ?></h2>
					<?php endif; ?>

					<?php if ( $right_text = get_field( 'right_text' ) ) : ?>
						<p><?php echo wp_kses_post( $right_text ); ?></p>
					<?php endif; ?>

					<?php if ( have_rows( 'right_buttons' ) ) : ?>
						<div class="right-buttons">
							<?php while ( have_rows( 'right_buttons' ) ) : the_row(); ?>
								<a href="<?php the_sub_field( 'button_link' ); ?>" class="button">
									<?php the_sub_field( 'button_text' ); ?>
								</a>
							<?php endwhile; ?>
						</div>
					<?php endif; ?>	
				</div>
			</div>
		</div>
	</div>
</div>

<div class="page-content">
	<?php get_template_part( 'modules/home', 'offers' ); ?>
	<?php get_template_part( 'modules/today', 'classes' ); ?>
	<?php get_template_part( 'modules/all', 'classes' ); ?>
	<?php get_template_part( 'modules/home', 'blog' ); ?>
	<?php get_template_part( 'modules/home', 'instagram' ); ?>
</div>
	
	



<?php get_footer();
