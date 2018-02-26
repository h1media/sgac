<?php
/**
 * Fitness Class Description
 *
 * @package one55
 */

$uri = get_template_directory_uri();


$term_id = get_queried_object()->term_id;
$term_name = get_queried_object()->name;

$tax_option = 'taxonomy_' . $term_id;
$term_options = get_option( $tax_option );
$class_colour = isset( $term_options['color'] ) ? $term_options['color'] : false;

if ( $class_colour ) : ?>
	<style type="text/css">
		.class-stripe, .event__colour { background-color: <?php echo esc_html( $class_colour ); ?> }
	</style>
<?php endif;

get_header( 'class-type' ); ?>


<div class="intro-section">
	<div class="container container--narrow">
		<div class="row">
			<div class="col-sm-12">
				<div class="intro-section__inner">
					<h1><?php echo esc_html( $term_name ); ?></h1>
					<p><?php the_field( 'intro' ); ?></p>
				</div>
			</div>
		</div>
	</div>
	<?php if ( $class_colour ) : ?>
		<span class="class-stripe"></span>
	<?php endif; ?>
</div>
<div class="page-content">
	<div class="container container--narrow">
		<div class="text-container">
			<?php if ( $class_logo = get_field( 'class_logo' ) ) : ?>
				<div class="class-logo">
					<img src="<?php echo esc_url( $class_logo['url'] ); ?>" alt="<?php echo get_queried_object()->name; ?>">
				</div>
			<?php endif; ?>
			<h2><?php the_field( 'sub_heading' ); ?></h2>
			<?php echo wp_kses_post( term_description( $term_id ) ); ?>
		</div>
		<?php get_template_part( 'modules/class-description', 'specification' ); ?>
	</div>
	<div class="container">
		<?php get_template_part( 'modules/class-description', 'events' ); ?>
		
		<?php if ( $join_text = get_field( 'join_now_class_text', 'option' ) ) : ?>
			<div class="class-join">
				<h3><?php echo esc_html( $join_text ); ?></h3>
				<?php if ( $join_link = get_field( 'join_now_link', 'option' ) ) : ?>
					<a href="<?php echo esc_url( $join_link ); ?>" class="button button--small" target="_blank"><?php esc_html_e( 'Join Now', 'one55' ); ?></a>
				<?php endif; ?>
			</div>
		<?php endif; ?>

	</div>
</div>


<?php get_template_part( 'modules/join', 'banner' ); ?>
<?php get_footer();
