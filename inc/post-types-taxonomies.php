<?php
/**
 * Functions that add custom post types and custom taxonomies.
 *
 * @package Marzeotti_Base
 */

if ( ! function_exists( 'marzeotti_base_register_custom_post_types' ) ) {

	/**
	 * Register custom post types.
	 */
	function marzeotti_base_register_custom_post_types() {

		/**
		 * Returns array to be turned into custom post types.
		 *
		 * @return array $post_types {
		 *     An array of individual posts types to create
		 *
		 *     @type array $post_type {
		 *         An individual post type
		 *
		 *         @param text  slug          The slug the post type will use
		 *         @param text  url_base      The URL base the post type will use as a rewrite
		 *         @param text  name_singular The singular name the post type will use - required
		 *         @param text  name_plural   The plural name the post type will use
		 *         @param text  icon          The dashicons icon the post type will use
		 *         @param array taxonomies    An array of taxonomy slugs the post type will use
		 *         @param bool  has_archive   If the post type will allow an archive page
		 *     }
		 * }
		 */
		$post_types = apply_filters( 'marzeotti_base_custom_post_types', $post_types );

		if ( isset( $post_types ) && ! empty( $post_types ) && is_array( $post_types ) ) :

			foreach ( $post_types as $post_type ) :

				if ( isset( $post_type['name_singular'] ) ) :

					$slug          = $post_type['slug'] ? sanitize_title( $post_type['slug'] ) : sanitize_title( $post_type['name_singular'] );
					$url_base      = $post_type['url_base'] ? sanitize_title( $post_type['url_base'] ) : sanitize_title( $post_type['name_singular'] ) . 's';
					$name_singular = sanitize_text_field( $post_type['name_singular'] );
					$name_plural   = $post_type['name_plural'] ? sanitize_text_field( $post_type['name_plural'] ) : sanitize_text_field( $post_type['name_plural'] ) . 's';
					$icon          = $post_type['icon'] ? sanitize_text_field( $post_type['icon'] ) : 'dashicons-admin-post';
					$taxonomies    = $post_type['taxonomies'] && is_array( $post_type['taxonomies'] ) ? $post_type['taxonomies'] : array();
					$has_archive   = $post_type['has_archive'] ? $post_type['has_archive'] : true;

					// /* translators: %s: post type name plural */
					// sprintf( __( '%s', 'marzeotti_base' ), $name_plural )
					// /* translators: %s: post type name plural */
					// sprintf( _e( '%s', 'Post Type General Name', 'marzeotti_base' ), $name_plural )

					$labels = array(
						'name'                  => _x( $name_plural, 'Post Type General Name', 'marzeotti_base' ),
						'singular_name'         => _x( $name_singular, 'Post Type Singular Name', 'marzeotti_base' ),
						'menu_name'             => __( $name_plural, 'marzeotti_base' ),
						'name_admin_bar'        => __( $name_plural, 'marzeotti_base' ),
						'archives'              => __( $name_singular . ' Archives', 'marzeotti_base' ),
						'attributes'            => __( $name_singular . ' Attributes', 'marzeotti_base' ),
						'parent_item_colon'     => __( 'Parent ' . $name_singular . ':', 'marzeotti_base' ),
						'all_items'             => __( 'All ' . $name_plural, 'marzeotti_base' ),
						'add_new_item'          => __( 'Add New ' . $name_singular, 'marzeotti_base' ),
						'add_new'               => __( 'Add New', 'marzeotti_base' ),
						'new_item'              => __( 'New ' . $name_singular, 'marzeotti_base' ),
						'edit_item'             => __( 'Edit ' . $name_singular, 'marzeotti_base' ),
						'update_item'           => __( 'Update ' . $name_singular, 'marzeotti_base' ),
						'view_item'             => __( 'View ' . $name_singular, 'marzeotti_base' ),
						'view_items'            => __( 'View ' . $name_plural, 'marzeotti_base' ),
						'search_items'          => __( 'Search ' . $name_singular, 'marzeotti_base' ),
						'not_found'             => __( 'Not found', 'marzeotti_base' ),
						'not_found_in_trash'    => __( 'Not found in Trash', 'marzeotti_base' ),
						'featured_image'        => __( 'Featured Image', 'marzeotti_base' ),
						'set_featured_image'    => __( 'Set featured image', 'marzeotti_base' ),
						'remove_featured_image' => __( 'Remove featured image', 'marzeotti_base' ),
						'use_featured_image'    => __( 'Use as featured image', 'marzeotti_base' ),
						'insert_into_item'      => __( 'Insert into ' . $name_singular, 'marzeotti_base' ),
						'uploaded_to_this_item' => __( 'Uploaded to this ' . $name_singular, 'marzeotti_base' ),
						'items_list'            => __( $name_plural . ' list', 'marzeotti_base' ),
						'items_list_navigation' => __( $name_plural . ' list navigation', 'marzeotti_base' ),
						'filter_items_list'     => __( 'Filter ' . $name_plural . ' list', 'marzeotti_base' ),
					);

					$args = array(
						'label'                 => __( $name_singular, 'marzeotti_base' ),
						'description'           => __( $name_plural . ' description', 'marzeotti_base' ),
						'labels'                => $labels,
						'supports'              => array( 'title', 'editor', 'thumbnail', 'excerpt', 'author' ),
						'taxonomies'            => $taxonomies,
						'hierarchical'          => false,
						'public'                => true,
						'show_ui'               => true,
						'show_in_menu'          => true,
						'show_in_rest'          => true,
						'menu_position'         => 5,
						'menu_icon'             => $icon,
						'show_in_admin_bar'     => true,
						'show_in_nav_menus'     => true,
						'can_export'            => true,
						'has_archive'           => $has_archive,
						'rewrite'               => array(
							'slug'              => $url_base,
							'with_front'        => false,
						),
						'exclude_from_search'   => false,
						'publicly_queryable'    => true,
						'capability_type'       => 'page',
					);
					register_post_type( $slug, $args );

				endif;

			endforeach;

		endif;

	}
	add_action( 'init', 'marzeotti_base_register_custom_post_types', 0 );

}

if ( ! function_exists( 'marzeotti_base_register_custom_taxonomies' ) ) {

	/**
	 * Register custom taxonomies.
	 */
	function marzeotti_base_register_custom_taxonomies() {

		/**
		 * Returns array to be turned into custom taxonomies.
		 *
		 * @return array $taxonomies {
		 *     An array of individual taxonomies to create
		 *
		 *     @type array $taxonomy {
		 *         An individual taxonomy
		 *
		 *         @param text  slug              The slug the taxonomy will use
		 *         @param text  url_base          The URL base the taxonomy will use as a rewrite
		 *         @param text  name_singular     The singular name the taxonomy will use - required
		 *         @param text  name_plural       The plural name the taxonomy will use
		 *         @param array post_types        An array of post type slugs the taxonomy will be used on
		 *         @param bool  show_admin_column If the taxonomy will get an admin column
		 *     }
		 * }
		 */
		$taxonomies = apply_filters( 'marzeotti_base_custom_taxonomies', $taxonomies );

		if ( isset( $taxonomies ) && ! empty( $taxonomies ) && is_array( $taxonomies ) ) :

			foreach ( $taxonomies as $taxonomy ) :

				if ( isset( $post_type['name_singular'] ) ) :

					$slug              = $taxonomy['slug'] ? sanitize_title( $taxonomy['slug'] ) : sanitize_title( $taxonomy['name_singular'] );
					$url_base          = $taxonomy['url_base'] ? sanitize_title( $taxonomy['url_base'] ) : sanitize_title( $taxonomy['name_singular'] ) . 's';
					$name_singular     = sanitize_text_field( $taxonomy['name_singular'] );
					$name_plural       = $taxonomy['name_plural'] ? sanitize_text_field( $taxonomy['name_plural'] ) : sanitize_text_field( $taxonomy['name_plural'] ) . 's';
					$taxonomies        = $taxonomy['taxonomies'] && is_array( $taxonomy['taxonomies'] ) ? $taxonomy['taxonomies'] : array();
					$show_admin_column = $taxonomy['show_admin_column'] ? $taxonomy['show_admin_column'] : true;

					$labels = array(
						'name'                       => _x( $name_plural, 'Taxonomy General Name', 'marzeotti_base' ),
						'singular_name'              => _x( $name_singular, 'Taxonomy Singular Name', 'marzeotti_base' ),
						'menu_name'                  => __( $name_plural, 'marzeotti_base' ),
						'all_items'                  => __( 'All ' . $name_plural, 'marzeotti_base' ),
						'parent_item'                => __( 'Parent ' . $name_singular, 'marzeotti_base' ),
						'parent_item_colon'          => __( 'Parent ' . $name_singular . ':', 'marzeotti_base' ),
						'new_item_name'              => __( 'New ' . $name_singular . ' Name', 'marzeotti_base' ),
						'add_new_item'               => __( 'Add New ' . $name_singular, 'marzeotti_base' ),
						'edit_item'                  => __( 'Edit ' . $name_singular, 'marzeotti_base' ),
						'update_item'                => __( 'Update ' . $name_singular, 'marzeotti_base' ),
						'view_item'                  => __( 'View ' . $name_singular, 'marzeotti_base' ),
						'separate_items_with_commas' => __( 'Separate ' . $name_plural . ' with commas', 'marzeotti_base' ),
						'add_or_remove_items'        => __( 'Add or remove ' . $name_plural, 'marzeotti_base' ),
						'choose_from_most_used'      => __( 'Choose from the most used', 'marzeotti_base' ),
						'popular_items'              => __( 'Popular ' . $name_plural, 'marzeotti_base' ),
						'search_items'               => __( 'Search ' . $name_plural, 'marzeotti_base' ),
						'not_found'                  => __( 'Not Found', 'marzeotti_base' ),
						'no_terms'                   => __( 'No ' . $name_plural, 'marzeotti_base' ),
						'items_list'                 => __( $name_plural . ' list', 'marzeotti_base' ),
						'items_list_navigation'      => __( $name_plural . ' list navigation', 'marzeotti_base' ),
					);

					$args = array(
						'labels'                     => $labels,
						'hierarchical'               => true,
						'rewrite'                    => array(
							'slug'                   => $url_base,
							'with_front'             => false,
						),
						'public'                     => true,
						'show_ui'                    => true,
						'show_in_rest'               => true,
						'show_admin_column'          => $show_admin_column,
						'show_in_nav_menus'          => true,
						'show_tagcloud'              => false,
					);

					register_taxonomy( $slug, $post_types, $args );

				endif;

			endforeach;

		endif;

	}
	add_action( 'init', 'marzeotti_base_register_custom_taxonomies', 0 );

}
