<?php 
/**
 * Personal Trainers Taxonomy
 *
 * @package sgac
 */

if ( class_exists( 'WeeklyClass' ) ) {
	
	function register_personal_trainers_taxonomy() {
		$labels = [
			'name'                       => _x( 'Personal Trainers', 'taxonomy general name', 'one55' ),
			'singular_name'              => _x( 'Personal Trainer', 'taxonomy singular name', 'one55' ),
			'search_items'               => __( 'Search  Personal Trainers', 'one55' ),
			'popular_items'              => __( 'Popular Personal Trainers', 'one55' ),
			'all_items'                  => __( 'All Personal Trainers', 'one55' ),
			'parent_item'                => null,
			'parent_item_colon'          => null,
			'edit_item'                  => __( 'Edit Personal Trainer', 'one55' ),
			'update_item'                => __( 'Update Personal Trainer', 'one55' ),
			'add_new_item'               => __( 'Add New Personal Trainer', 'one55' ),
			'new_item_name'              => __( 'New Personal Trainer Name', 'one55' ),
			'separate_items_with_commas' => __( 'Separate Personal Trainers with commas', 'one55' ),
			'add_or_remove_items'        => __( 'Add or remove Personal Trainers', 'one55' ),
			'choose_from_most_used'      => __( 'Choose from the most used Personal Trainers', 'one55' ),
			'not_found'                  => __( 'No Personal Trainers found.', 'one55' ),
			'menu_name'                  => __( 'Personal Trainers', 'one55' )
		];


		$args = [
			'hierarchical'          => false,
			'labels'                => $labels,
			'show_ui'               => true,
			'show_admin_column'     => true,
			'update_count_callback' => '_update_post_term_count',
			'query_var'             => false,
			'wcs_icon'          	=> 'ti-location',
			'wcs_labels'        	=> [
				'all'   => __( 'All', 'one55' )
			],
		];

		register_taxonomy( 'wcs-personal-trainer', 'class', $args );
	}
	add_action( 'init', 'register_personal_trainers_taxonomy', 0 );

	function remove_default_category_description(){

	    global $current_screen;

	    if ( isset( $current_screen->id ) && in_array( $current_screen->id, array( 'edit-wcs-room', 'edit-wcs-type', 'edit-wcs-instructor', 'edit-wcs-personal-trainer' ) ) && in_array( $current_screen->taxonomy, array( 'wcs-room', 'wcs-type', 'wcs-instructor', 'wcs-personal-trainer' ) ) ){
		    wp_enqueue_media();

	    ?>
	        <script type="text/javascript">
	        jQuery(function($) {
	            jQuery('textarea#description').closest('tr.form-field').remove();
	        });
	        </script>
	    <?php
	    }
	}
	add_action( 'admin_head', 'remove_default_category_description' );

	function cat_description($tag){
    ?>
        <table class="form-table">
            <tr class="form-field">
                <th scope="row" valign="top"><label for="description"><?php _ex('Description', 'Taxonomy Description'); ?></label></th>
                <td>
                <?php
                    $settings = array('wpautop' => true, 'media_buttons' => true, 'quicktags' => true, 'textarea_rows' => '15', 'textarea_name' => 'description' );
                    wp_editor(wp_kses_post($tag->description , ENT_QUOTES, 'UTF-8'), 'cat_description', $settings);
                ?>
                <br />
                <p class="description"><?php _e('The description is not prominent by default; however, some themes may show it.'); ?></p>
                </td>
            </tr>
        </table>
    <?php
	}
	add_filter( 'wcs-personal-trainer_edit_form_fields', 'cat_description', 10, 2 );
}
