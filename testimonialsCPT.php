<?php
// Add custom Theme Functions here



// Our custom post type function
function cayuyiTestimonials()
{

    // Set UI labels for Custom Post Type
    $labels = array(
        'name'                => _x('Testimonios', 'Post Type General Name', 'divi'),
        'singular_name'       => _x('Testimonio', 'Post Type Singular Name', 'divi'),
        'menu_name'           => __('Testimonios', 'divi'),
        'parent_item_colon'   => __('Parent Order', 'divi'),
        'all_items'           => __('Todos los testimonios', 'divi'),
        'view_item'           => __('Ver testimonio', 'divi'),
        'add_new_item'        => __('Agregar nuevo testimonio', 'divi'),
        'add_new'             => __('Agregar testimonio', 'divi'),
        'edit_item'           => __('Editar testimonio', 'divi'),
        'update_item'         => __('Actualizar testimonio', 'divi'),
        'search_items'        => __('Buscar testimonio', 'divi'),
        'not_found'           => __('No encontrado', 'divi'),
        'not_found_in_trash'  => __('No encontrado en la basura', 'divi'),
    );

    // Set other options for Custom Post Type

    $args = array(
        'label'               => __('testimonios', 'divi'),
        'description'         => __('Testimonios de nuestros clientes', 'divi'),
        'labels'              => $labels,
        // Features this CPT supports in Post Editor
        'supports'            => array(
            'title',
            'editor',
            'thumbnail',
            'revisions',
            'custom-fields',
            'page-attributes',
        ),
        // You can associate this CPT with a taxonomy or custom taxonomy. 
        'taxonomies'          => array('genres'),
        /* A hierarchical CPT is like Pages and can have
            * Parent and child items. A non-hierarchical CPT
            * is like Posts.
            */
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => 5,
        'menu_icon'       => 'dashicons-format-status',
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'post',
        'show_in_rest' => true,

    );

    // Registering your Custom Post Type
    unregister_post_type('testimonios');
    register_post_type('testimonios', $args);
}

add_action('init', 'cayuyiTestimonials');
