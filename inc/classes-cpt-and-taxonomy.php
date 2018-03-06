<?php

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
add_action( 'init', 'create_class_type_taxonomies', 0 );

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
'publicly_queryable'  => false,
'capability_type'     => 'page',
'taxonomies'          => array( 'class-type' ),
);
register_post_type( 'classes', $args );

}
add_action( 'init', 'custom_post_type', 0 );

?>