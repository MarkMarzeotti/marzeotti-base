<?php
/**
 * Functions that add custom post types and custom taxonomies.
 *
 * @package Marzeotti_Base
 */

if ( ! function_exists('marzeotti_base_register_custom_post_types') ) {

    /**
     * Register custom post types.
     */
    function marzeotti_base_register_custom_post_types() {

        // Uncomment this array to quickly add additional post types.

        // $post_types = array(
        //     array( 
        //         'slug'          => 'event', 
        //         'url_base'      => 'events', 
        //         'name_singular' => 'Event', 
        //         'name_plural'   => 'Events', 
        //         'icon'          => 'dashicons-tickets-alt',
        //         'taxonomies'    => array( 'event_category' ),
        //         'has_archive'   => true 
        //     )
        // );

        /**
         * Returns array to be turned into custom post types.
         */
        $post_types = apply_filters( 'marzeotti_base_custom_post_types', $post_types );

        if ( isset( $post_types ) && ! empty( $post_types ) && is_array( $post_types ) ) {
            foreach ( $post_types as $post_type ) {
                $labels = array(
                    'name'                  => _x( $post_type['name_plural'], 'Post Type General Name', 'marzeotti_base' ),
                    'singular_name'         => _x( $post_type['name_singular'], 'Post Type Singular Name', 'marzeotti_base' ),
                    'menu_name'             => __( $post_type['name_plural'], 'marzeotti_base' ),
                    'name_admin_bar'        => __( $post_type['name_plural'], 'marzeotti_base' ),
                    'archives'              => __( $post_type['name_singular'] . ' Archives', 'marzeotti_base' ),
                    'attributes'            => __( $post_type['name_singular'] . ' Attributes', 'marzeotti_base' ),
                    'parent_item_colon'     => __( 'Parent ' . $post_type['name_singular'] . ':', 'marzeotti_base' ),
                    'all_items'             => __( 'All ' . $post_type['name_plural'], 'marzeotti_base' ),
                    'add_new_item'          => __( 'Add New ' . $post_type['name_singular'], 'marzeotti_base' ),
                    'add_new'               => __( 'Add New', 'marzeotti_base' ),
                    'new_item'              => __( 'New ' . $post_type['name_singular'], 'marzeotti_base' ),
                    'edit_item'             => __( 'Edit ' . $post_type['name_singular'], 'marzeotti_base' ),
                    'update_item'           => __( 'Update ' . $post_type['name_singular'], 'marzeotti_base' ),
                    'view_item'             => __( 'View ' . $post_type['name_singular'], 'marzeotti_base' ),
                    'view_items'            => __( 'View ' . $post_type['name_plural'], 'marzeotti_base' ),
                    'search_items'          => __( 'Search ' . $post_type['name_singular'], 'marzeotti_base' ),
                    'not_found'             => __( 'Not found', 'marzeotti_base' ),
                    'not_found_in_trash'    => __( 'Not found in Trash', 'marzeotti_base' ),
                    'featured_image'        => __( 'Featured Image', 'marzeotti_base' ),
                    'set_featured_image'    => __( 'Set featured image', 'marzeotti_base' ),
                    'remove_featured_image' => __( 'Remove featured image', 'marzeotti_base' ),
                    'use_featured_image'    => __( 'Use as featured image', 'marzeotti_base' ),
                    'insert_into_item'      => __( 'Insert into ' . $post_type['name_singular'], 'marzeotti_base' ),
                    'uploaded_to_this_item' => __( 'Uploaded to this ' . $post_type['name_singular'], 'marzeotti_base' ),
                    'items_list'            => __( $post_type['name_plural'] . ' list', 'marzeotti_base' ),
                    'items_list_navigation' => __( $post_type['name_plural'] . ' list navigation', 'marzeotti_base' ),
                    'filter_items_list'     => __( 'Filter ' . $post_type['name_plural'] . ' list', 'marzeotti_base' ),
                );
                $args = array(
                    'label'                 => __( $post_type['name_singular'], 'marzeotti_base' ),
                    'description'           => __( $post_type['name_plural'] . ' description', 'marzeotti_base' ),
                    'labels'                => $labels,
                    'supports'              => array( 'title', 'editor', 'thumbnail', 'excerpt', 'author' ),
                    'taxonomies'            => $post_type['taxonomies'],
                    'hierarchical'          => false,
                    'public'                => true,
                    'show_ui'               => true,
                    'show_in_menu'          => true,
                    'show_in_rest'          => true,
                    'menu_position'         => 5,
                    'menu_icon'             => $post_type['icon'],
                    'show_in_admin_bar'     => true,
                    'show_in_nav_menus'     => true,
                    'can_export'            => true,
                    'has_archive'           => $post_type['false'],
                    'rewrite'               => array(
                        'slug'       => $post_type['url_base'],
                        'with_front' => false,
                    ),
                    'exclude_from_search'   => false,
                    'publicly_queryable'    => true,
                    'capability_type'       => 'page',
                );
                register_post_type( $post_type['slug'], $args );
            }
        }
    
    }
    add_action( 'init', 'marzeotti_base_register_custom_post_types', 0 );
    
}

if ( ! function_exists( 'marzeotti_base_register_custom_taxonomies' ) ) {

    /**
     * Register custom taxonomies.
     */
    function marzeotti_base_register_custom_taxonomies() {

        // Uncomment this array to quickly add additional taxonomies.

        // $taxonomies = array(
        //     array( 
        //         'slug'              => 'event_category', 
        //         'url_base'          => 'event-category', 
        //         'name_singular'     => 'Event Category', 
        //         'name_plural'       => 'Event Categories', 
        //         'post_types'        => array( 'event' ),
        //         'show_admin_column' => true 
        //     )
        // );

        /**
         * Returns array to be turned into custom taxonomies.
         */
        $taxonomies = apply_filters( 'marzeotti_base_custom_taxonomies', $taxonomies );

        if ( isset( $taxonomies ) && ! empty( $taxonomies ) && is_array( $taxonomies ) ) {
            foreach ( $taxonomies as $taxonomy ) {
                $labels = array(
                    'name'                       => _x( $taxonomy['name_plural'], 'Taxonomy General Name', 'marzeotti_base' ),
                    'singular_name'              => _x( $taxonomy['name_singular'], 'Taxonomy Singular Name', 'marzeotti_base' ),
                    'menu_name'                  => __( $taxonomy['name_plural'], 'marzeotti_base' ),
                    'all_items'                  => __( 'All ' . $taxonomy['name_plural'], 'marzeotti_base' ),
                    'parent_item'                => __( 'Parent ' . $taxonomy['name_singular'], 'marzeotti_base' ),
                    'parent_item_colon'          => __( 'Parent ' . $taxonomy['name_singular'] . ':', 'marzeotti_base' ),
                    'new_item_name'              => __( 'New ' . $taxonomy['name_singular'] . ' Name', 'marzeotti_base' ),
                    'add_new_item'               => __( 'Add New ' . $taxonomy['name_singular'], 'marzeotti_base' ),
                    'edit_item'                  => __( 'Edit ' . $taxonomy['name_singular'], 'marzeotti_base' ),
                    'update_item'                => __( 'Update ' . $taxonomy['name_singular'], 'marzeotti_base' ),
                    'view_item'                  => __( 'View ' . $taxonomy['name_singular'], 'marzeotti_base' ),
                    'separate_items_with_commas' => __( 'Separate ' . $taxonomy['name_plural'] . ' with commas', 'marzeotti_base' ),
                    'add_or_remove_items'        => __( 'Add or remove ' . $taxonomy['name_plural'], 'marzeotti_base' ),
                    'choose_from_most_used'      => __( 'Choose from the most used', 'marzeotti_base' ),
                    'popular_items'              => __( 'Popular ' . $taxonomy['name_plural'], 'marzeotti_base' ),
                    'search_items'               => __( 'Search ' . $taxonomy['name_plural'], 'marzeotti_base' ),
                    'not_found'                  => __( 'Not Found', 'marzeotti_base' ),
                    'no_terms'                   => __( 'No ' . $taxonomy['name_plural'], 'marzeotti_base' ),
                    'items_list'                 => __( $taxonomy['name_plural'] . ' list', 'marzeotti_base' ),
                    'items_list_navigation'      => __( $taxonomy['name_plural'] . ' list navigation', 'marzeotti_base' ),
                );
                $args = array(
                    'labels'                     => $labels,
                    'hierarchical'               => true,
                    'rewrite'                    => array(
                        'slug'       => $taxonomy['url_base'], 
                        'with_front' => false
                    ),
                    'public'                     => true,
                    'show_ui'                    => true,
                    'show_in_rest'               => true,
                    'show_admin_column'          => $taxonomy['show_admin_column'],
                    'show_in_nav_menus'          => true,
                    'show_tagcloud'              => false,
                );
                register_taxonomy( $taxonomy['slug'], $taxonomy['post_types'], $args );
            }
        }
    
    }
    add_action( 'init', 'marzeotti_base_register_custom_taxonomies', 0 );
    
}
