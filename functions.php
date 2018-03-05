<?php
/**
 * Functions and definitions
 *
 * @package one55
 */


/**
 * Include other files
 *
 */
require_once( 'inc/personal-trainer-taxonomy.php' );


/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 */

function one55_setup() {
	/*
	 * Make theme available for translation.
	 */
	load_theme_textdomain( 'one55' );

	/*
	 * Let WordPress manage the document title.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	add_image_size( 'featured-image', 2000, 1200, true );

	add_image_size( 'facility-carousel-thumb', 285, 190, true );

	add_image_size( 'thumbnail-avatar', 100, 100, true );

	add_image_size( 'blog-list', 770, 184, true );

	set_post_thumbnail_size( 311, 207, true );

	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'side'    => __( 'Side Menu', 'one55' ),
		'footer' => __( 'Footer Menu', 'one55' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Add theme support for Custom Logo.
	add_theme_support( 'custom-logo', array(
		'width'       => 250,
		'height'      => 250,
		'flex-width'  => true,
		'flex-height' => true,
	) );

	/*
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, and column width.
	 */
	add_editor_style( array( 'dist/css/editor-style.min.css', one55_fonts_url() ) );

}
add_action( 'init', 'one55_setup' );

/**
 * Register custom fonts.
 */
function one55_fonts_url() {
	$fonts_url = '';

	$roboto = _x( 'on', 'Roboto font: on or off', 'one55' );

	if ( 'off' !== $roboto ) {
		$font_families = array();

		$font_families[] = 'Roboto:300,400,500,700';
		$font_families[] = 'Poppins:300,400,500,600,700';

		$query_args = array(
			'family' => urlencode( implode( '|', $font_families ) ),
			'subset' => urlencode( 'latin' ),
		);

		$fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
	}

	return esc_url_raw( $fonts_url );
}

/**
 * Add preconnect for Google Fonts.
 *
 * @since Twenty Seventeen 1.0
 *
 * @param array  $urls           URLs to print for resource hints.
 * @param string $relation_type  The relation type the URLs are printed.
 * @return array $urls           URLs to print for resource hints.
 */
function one55_resource_hints( $urls, $relation_type ) {
	if ( 'preconnect' === $relation_type ) {
		$urls[] = array(
			'href' => 'https://fonts.gstatic.com',
			'crossorigin',
		);
	}

	return $urls;
}
add_filter( 'wp_resource_hints', 'one55_resource_hints', 10, 2 );


/**
 * Replaces "[...]" (appended to automatically generated excerpts) with ... and
 * a 'Read more' link.
 */
function one55_excerpt_more( $link ) {
	if ( is_admin() ) {
		return $link;
	}

	$link = sprintf( '<a href="%1$s" class="more-link">%2$s</a>',
		esc_url( get_permalink( get_the_ID() ) ),
		/* translators: %s: Name of current post */
		sprintf( __( 'Read more', 'one55' ) )
	);
	return ' &hellip; ' . $link;
}
add_filter( 'excerpt_more', 'one55_excerpt_more', 999 );

/**
 * Excerpt lenght
 */
function one55_excerpt_lenght( $length ) {
	return 35;
}
add_filter( 'excerpt_length', 'one55_excerpt_lenght', 999 );


/**
 * Enqueue scripts and styles.
 */
function one55_scripts() {

	// Add custom fonts, used in the main stylesheet.
	wp_enqueue_style( 'one55_fonts', one55_fonts_url(), array(), null );

	// Theme stylesheet.
	wp_enqueue_style( 'one55_style', get_theme_file_uri( '/dist/css/app.min.css' ) );

	// Load the hubform script
	wp_enqueue_script( 'one55_hubform', '//js.hsforms.net/forms/v2.js', '', '1.0', true );

	// Google maps
	wp_enqueue_script( 'google_map', '//maps.googleapis.com/maps/api/js?key=AIzaSyARYncUED8pBBIxc4veV91qP-ezwz9gdeE', '1.0', true );

	// Load the scrips
	wp_enqueue_script( 'one55_scripts', get_theme_file_uri( '/dist/js/app.min.js' ), array( 'jquery', 'one55_hubform' ), '1.0', true );

	/*
	 * Variables for javascript.
	 */
	$js_array = array(
		'ajaxurl' => admin_url( 'admin-ajax.php' ),
	);
	wp_localize_script( 'one55_scripts', 'wp', $js_array );
}
add_action( 'wp_enqueue_scripts', 'one55_scripts' );



/**
 * Add Option Page with ACF
 */
if ( function_exists( 'acf_add_options_page' ) ) {
	acf_add_options_page( 'Site' );
	acf_add_options_page( [
		'page_title' => 'Precinct Bar',
		'icon_url' => 'dashicons-slides',
		'position' => 10,
	] );

}

/**
 * Convert Phone number to valid wc3 tel link
 */
function phone_to_link( $string ) {
	$string = str_replace( '+', '00', $string );
	$string = str_replace( '-', '', $string );
	$string = str_replace( ' ', '', $string );
	$string = str_replace( '.', '', $string );

	return $string;
}


/**
 * Allow upload SVG
 */
function cc_mime_types( $mimes ) {
	$mimes['svg'] = 'image/svg+xml';
	return $mimes;
}
add_filter( 'upload_mimes', 'cc_mime_types' );


/**
 * Allow HTML in term description (class type)
 */
foreach ( array( 'pre_term_description' ) as $filter ) {
	remove_filter( $filter, 'wp_filter_kses' );
}

foreach ( array( 'term_description' ) as $filter ) {
	remove_filter( $filter, 'wp_kses_data' );
}


function person_modal_data() {
	$person_id = $_REQUEST['person_id'];
	$tax = $_REQUEST['person_type'];

	if ( $person_id && $tax ) {
		$term = get_term( $person_id, $tax );
	}

	if ( ! empty( $term ) ) {
		$person['name'] = $term->name;
		$person['description'] = get_field( 'description', 'term_' . $term->term_id );

		if ( $image = get_field( 'profile_image', 'term_' . $person_id ) ) {
			$person['image'] = $image['url'];
		}

		$person['status'] = 1;
	} else {
		$person['status'] = 0;
	}

	if ( defined( 'DOING_AJAX' ) && DOING_AJAX && ! empty( $person ) ) {
		wp_send_json( $person );
		die();
	} else {
		wp_redirect( home_url( '/' ) );
		die();
	}
}
add_action( 'wp_ajax_nopriv_person_modal_data', 'person_modal_data' );
add_action( 'wp_ajax_person_modal_data', 'person_modal_data' );

function membership_modal_data() {
	$index = $_REQUEST['index'];

	if ( $id = get_field( 'membership_page', 'option' ) ) {
		$a_membership = get_field( 'box', $id );
		$person = $a_membership[$index];
	} else {
		$person = 'Error, something went wrong';
	}

	if ( defined( 'DOING_AJAX' ) && DOING_AJAX && ! empty( $person ) ) {
		wp_send_json( $person );
	}
	die();
}
add_action( 'wp_ajax_nopriv_membership_modal_data', 'membership_modal_data' );
add_action( 'wp_ajax_membership_modal_data', 'membership_modal_data' );

function new_modal_data() {
	$term_id = $_REQUEST['term_id'];

	$return = [];

	if ( $term_id ) {
		$a_image = get_field( 'profile_image', 'term_' . $term_id );
		$join_link = get_field( 'join_now_link', 'option' );

		if ( $a_image ) {
			$return['image_thumb'] = $a_image['sizes']['thumbnail-avatar'];
			$return['status'] = 1;
		} else {
			$return['status'] = 0;
		}

		if ( $join_link ) {
			$return['join_link'] = $join_link;
			$return['join_link_label'] = __( 'Join now', 'one55' );
			$return['status'] = 1;
		} else {
			$return['status'] = 0;
		}
	}
	if ( defined( 'DOING_AJAX' ) && DOING_AJAX ) {
		wp_send_json( $return );
		wp_die();
	}
}
add_action( 'wp_ajax_nopriv_new_modal_data', 'new_modal_data' );
add_action( 'wp_ajax_new_modal_data', 'new_modal_data' );

function opening_hours( $atts ) {

	ob_start();

	if ( have_rows( 'opening_hours',  get_the_ID() ) ) : ?>
		<table class="opening-hours">
			<?php while ( have_rows( 'opening_hours', get_the_ID() ) ) : the_row(); ?>
				<tr>
					<td><?php the_sub_field( 'label' ); ?></td>
					<td><?php the_sub_field( 'hours' ); ?></td>
				</tr>
			<?php endwhile; ?>
		</table>
	<?php endif;
		//var_dump(get_the_ID());
	return ob_get_clean();
}
add_shortcode( 'opening_hours', 'opening_hours' );

function personal_training_form( $atts ) {
	return '<div class="personal-training-form form-wrap"></div>';
}
add_shortcode( 'personal_training_form', 'personal_training_form' );

function personal_trainers_grid( $atts ) {
	ob_start();
	get_template_part( 'modules/personal', 'trainers' );
	return ob_get_clean();
}
add_shortcode( 'personal_trainers_grid', 'personal_trainers_grid' );

function blog_pagination() {
	if ( is_singular() ) {
		return;
	}

	global $wp_query;

	if ( $wp_query->max_num_pages <= 1 ) {
		return;
	}

	$paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
	$max   = intval( $wp_query->max_num_pages );

	if ( $paged >= 1 ) {
		$links[] = $paged;
	}

	if ( $paged >= 3 ) {
		$links[] = $paged - 1;
		$links[] = $paged - 2;
	}

	if ( ( $paged + 2 ) <= $max ) {
		$links[] = $paged + 2;
		$links[] = $paged + 1;
	}

	echo '<ul class="page-numbers__list">' . "\n";

	if ( get_previous_posts_link() ) {
		printf( '<li>%s</li>' . "\n", get_previous_posts_link( '<span class="icon-ico-left-chevron-sml"></span>' ) );
	}

	if ( ! in_array( 1, $links ) ) {
		$class = 1 == $paged ? 'current' : '';
		printf( '<li><a href="%s" class="page-numbers %s">%s</a></li>' . "\n", esc_url( get_pagenum_link( 1 ) ), $class, '1' );

		if ( ! in_array( 2, $links ) ) {
			echo '<li>…</li>';
		}
	}

	sort( $links );

	foreach ( (array) $links as $link ) {
		$class = $paged == $link ? 'current' : '';
		printf( '<li><a href="%s" class="page-numbers %s">%s</a></li>' . "\n", esc_url( get_pagenum_link( $link ) ), $class, $link );
	}

	if ( ! in_array( $max, $links ) ) {
		if ( ! in_array( $max - 1, $links ) ) {
			echo '<li>…</li>' . "\n";
		}

		$class = $paged == $max ? ' current' : '';
		printf( '<li><a class="page-numbers %s" href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $max ) ), $max );
	}

	if ( get_next_posts_link() ) {
		printf( '<li>%s</li>' . "\n", get_next_posts_link( '<span class="icon-ico-right-chevron-sml"></span>' ) );
	}

	echo '</ul></div>' . "\n";

}



function posts_link_attributes_prev() {
	return 'class="prev page-numbers"';
}
add_filter( 'next_posts_link_attributes', 'posts_link_attributes_prev' );

function posts_link_attributes_next() {
	return 'class="next page-numbers"';
}
add_filter( 'previous_posts_link_attributes', 'posts_link_attributes_next' );


function rewrite_category_base() {
	add_rewrite_rule(
		'fitness-advice/page/([0-9]+)/?$',
		'index.php?pagename=fitness-advice&paged=$matches[1]',
		'top'
	);
}
add_action( 'init', 'rewrite_category_base' );



function one55_custom_comments( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case 'pingback' :
		case 'trackback' : ?>
				<li <?php comment_class(); ?> id="comment<?php comment_ID(); ?>">
				<div class="back-link">< ?php comment_author_link(); ?></div>
			<?php break;
		default : ?>
				 <li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
					<article <?php comment_class(); ?> class="comment">
						<div class="comment-body">
						<div class="author vcard">
								<?php echo get_avatar( $comment ); ?>
								<div class="autor-meta">
									<span class="author-name"><?php comment_author(); ?></span> <br  />
									<time <?php comment_time( 'c' ); ?> class="comment-time">
										<span class="date"><?php comment_date( 'F j, Y' ); ?></span>
										<span class="time"> at <?php comment_time(); ?></span>
									</time>
								</div>
						</div><!-- .vcard -->
						<div class="comment-content">
								<?php comment_text(); ?>
						</div>
						</div><!-- comment-body -->
						<footer class="comment-footer">
						<div class="reply"><?php
							comment_reply_link( array_merge( $args, array(
								'reply_text' 	=> 'Reply',
								'depth' 		=> $depth,
								'max_depth' 	=> $args['max_depth'],
							) ) ); ?>
							 </div><!-- .reply -->
						 </footer><!-- .comment-footer -->
					 </article><!-- #comment-<?php comment_ID(); ?> -->
					<?php // End the default styling of comment
		break;
	endswitch;
}

function acf_googlemap_api_key() {
	acf_update_setting( 'google_api_key', 'AIzaSyARYncUED8pBBIxc4veV91qP-ezwz9gdeE' );
}

add_action( 'acf/init', 'acf_googlemap_api_key' );


function generate_phone( $string ) {
	$string = str_replace( '(', '', $string );
	$string = str_replace( ')', '', $string );

	echo 'tel:' . stripslashes( str_replace( ' ', '', $string ) );
}



function maintenance_redirect() {
	if ( ! is_user_logged_in() && $GLOBALS['pagenow'] !== 'wp-login.php' ) {
		wp_redirect( site_url( 'temp.html' ), 302 );
		exit();
	}
}
//add_action( 'init', 'maintenance_redirect' );


add_action( 'init', 'create_class_type_taxonomies', 0 );

function create_class_type_taxonomies() {
	$labels = array(
		'name'              => _x( 'Class Types', 'Class Types', 'SGAC' ),
		'singular_name'     => _x( 'Class Type', 'Class Type', 'SGAC' ),
		'search_items'      => __( 'Search Class Types', 'SGAC' ),
		'all_items'         => __( 'All Class Types', 'SGAC' ),
		'parent_item'       => __( 'Parent Class Type', 'SGAC' ),
		'parent_item_colon' => __( 'Parent Class Type:', 'SGAC' ),
		'edit_item'         => __( 'Edit Class Type', 'SGAC' ),
		'update_item'       => __( 'Update Class Type', 'SGAC' ),
		'add_new_item'      => __( 'Add New Class Type', 'SGAC' ),
		'new_item_name'     => __( 'New Class Type Name', 'SGAC' ),
		'menu_name'         => __( 'Class Types', 'SGAC' ),
	);

	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'class-type' ),
	);

	register_taxonomy( 'class-type', array( 'class-type' ), $args );
}

function custom_post_type() {
	$labels = array(
		'name'                => _x( 'Classes', 'Post Type General Name', 'SGAC' ),
		'singular_name'       => _x( 'Class', 'Post Type Singular Name', 'SGAC' ),
		'menu_name'           => __( 'Classes', 'SGAC' ),
		'parent_item_colon'   => __( 'Parent Class', 'SGAC' ),
		'all_items'           => __( 'All Classes', 'SGAC' ),
		'view_item'           => __( 'View Class', 'SGAC' ),
		'add_new_item'        => __( 'Add New Class', 'SGAC' ),
		'add_new'             => __( 'Add New', 'SGAC' ),
		'edit_item'           => __( 'Edit Class', 'SGAC' ),
		'update_item'         => __( 'Update Class', 'SGAC' ),
		'search_items'        => __( 'Search Classes', 'SGAC' ),
		'not_found'           => __( 'Not Found', 'SGAC' ),
		'not_found_in_trash'  => __( 'Not found in Trash', 'SGAC' ),
	);
	$args = array(
		'label'               => __( 'classes', 'SGAC' ),
		'description'         => __( 'SGAC Classes and Programms', 'SGAC' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'editor', 'author', 'thumbnail', 'revisions', 'custom-fields', ),
		'hierarchical'        => true,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 5,
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'page',
		'taxonomies'          => array( 'class-type' ),
	);
	register_post_type( 'classes', $args );

}
add_action( 'init', 'custom_post_type', 0 );