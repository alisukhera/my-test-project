<?php


// Add custom post type
function custom_post_type_books() {
    $labels = array(
        'name'               => 'Books',
        'singular_name'      => 'Book',
        'menu_name'          => 'Books',
        'name_admin_bar'     => 'Book',
        'add_new'            => 'Add New',
        'add_new_item'       => 'Add New Book',
        'new_item'           => 'New Book',
        'edit_item'          => 'Edit Book',
        'view_item'          => 'View Book',
        'all_items'          => 'All Books',
        'search_items'       => 'Search Books',
        'parent_item_colon'  => 'Parent Books:',
        'not_found'          => 'No books found.',
        'not_found_in_trash' => 'No books found in Trash.'
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'books' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'supports'           => array( 'title', 'editor', 'thumbnail' ),
    );

    register_post_type( 'books', $args );
}
add_action( 'init', 'custom_post_type_books' );


// Add custom taxonomy
function custom_taxonomy_genres() {
    $labels = array(
        'name'                       => 'Genres',
        'singular_name'              => 'Genre',
        'menu_name'                  => 'Genres',
        'all_items'                  => 'All Genres',
        'edit_item'                  => 'Edit Genre',
        'view_item'                  => 'View Genre',
        'update_item'                => 'Update Genre',
        'add_new_item'               => 'Add New Genre',
        'new_item_name'              => 'New Genre Name',
        'parent_item'                => 'Parent Genre',
        'parent_item_colon'          => 'Parent Genre:',
        'search_items'               => 'Search Genres',
        'popular_items'              => 'Popular Genres',
        'separate_items_with_commas' => 'Separate genres with commas',
        'add_or_remove_items'        => 'Add or remove genres',
        'choose_from_most_used'      => 'Choose from the most used genres',
        'not_found'                  => 'No genres found.',
    );

    $args = array(
        'labels'            => $labels,
        'hierarchical'      => true,
        'public'            => true,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'genre' ),
    );

    register_taxonomy( 'genre', array( 'books' ), $args );
}
add_action( 'init', 'custom_taxonomy_genres' );
