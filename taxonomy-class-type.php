<?php
/**
 *
 *
 * @package SGAC
 */


get_header();

$term = get_queried_object();

$term_id = get_queried_object()->term_id;
$term_name = get_queried_object()->name;

$single_desc = term_description();
$single_details = get_field( 'class_details', $term );

$class_image = get_field( 'class_image' );
$class_enq_text = get_field( 'class_enq_text' );
$class_enq_url = get_field( 'class_enq_url' );

$single_footer = get_field( 'class_footer_text', $term );

?>

    <div class="intro-section classes-intro">
        <div class="container container--narrow">
            <div class="row">
                <div class="col-lg-12">
                    <div class="intro-section__inner">
                        <?php
                        if( ! empty( $term_name ) ) {
                            ?>
                            <h2 class="class-headline"><?php echo esc_html( $term_name ); ?></h2>
                            <?php
                        }
                        if( ! empty( $single_desc ) ) {
                            echo wp_kses_post( $single_desc );
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="classes-narrow classes-header">
        <div class="container container--narrow">
            <div class="row">
                <div class="col-lg-offset-1 col-lg-10">
                    <div class="intro-section__inner">
                        <?php
                        if( ! empty( $single_details ) ) {
                        ?>
                        <div class="term-details">
		                    <?php echo wp_kses_post( $single_details ); ?>
                        </div>
                        <?php
	                    }
	                    ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container container--wide">
        <?php
        if ( have_posts() ) {
            while ( have_posts() ) {
                the_post();
                ?>
                <div class="row row--no-gutter classes-list">
                        <div class="col-lg-6 class-img" style="background-image:url(<?php echo esc_url( $class_image[url] ); ?>);">
                        </div>
                        <div class="col-lg-6 class-body">
                            <h3 class="class-headline"><?php echo the_title(); ?></h3>
                            <?php echo the_content(); ?>
                            <?php
                                if( ! empty( $class_enq_text ) && ! empty( $class_enq_url ) ) {
                                    ?>
                                    <a class="class-enq-button" href="<?php echo esc_url( $class_enq_url ); ?>"><?php echo esc_html( $class_enq_text ); ?></a>
                                    <?php
                                }
                            ?>
                        </div>
                    </div>
                <?php
            }
        }
        ?>
    </div>

    <div class="classes-narrow classes-footer">
        <div class="container container--narrow">
            <div class="row">
                <div class="col-lg-offset-1 col-lg-10">
                    <div class="intro-section__inner">
	                    <?php
	                    if( ! empty( $single_footer ) ) {
		                    echo wp_kses_post( $single_footer );
	                    }
	                    ?>
                    </div>
                </div>
            </div>
        </div>
    </div>


<?php get_footer();
