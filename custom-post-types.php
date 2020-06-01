<?php
function custom_post_type($post_type){
    add_action('init', function() use($post_type){
        $text_domain = strtolower($post_type['singular']) . '_post_type';

        if(strpos($post_type['plural'], '-') !== FALSE){
            $ucPlural = ucwords(str_replace('-', ' ', $post_type['plural']));
            $ucSingular = ucwords(str_replace('-', ' ', $post_type['singular']));
        } else {
            $ucPlural = ucfirst($post_type['plural']);
            $ucSingular = ucfirst($post_type['singular']);
        }

        register_post_type($post_type['plural'], array(
            'labels' => array(
                'name'               => _x($ucPlural, $text_domain),
                'singular_name'      => _x($ucPlural, $text_domain),
                'menu_name'          => _x($ucPlural, $text_domain),
                'name_admin_bar'     => _x($ucPlural, $text_domain),
                'add_new'            => _x('Add ' . $ucSingular, $text_domain),
                'add_new_item'       => __('Add ' . $ucSingular, $text_domain),
                'new_item'           => __('New ' . $ucSingular, $text_domain),
                'edit_item'          => __('Edit ' . $ucPlural, $text_domain),
                'view_item'          => _x('View Post', $text_domain),
                'all_items'          => __('All ' . $ucPlural, $text_domain),
                'search_items'       => __('Search ' . $ucPlural, $text_domain),
                'parent_item_colon'  => __('Parent:', $text_domain),
                'not_found'          => __('No ' . $ucPlural . ' found.', $text_domain),
                'not_found_in_trash' => __('No ' . $ucPlural . ' found in Trash.', $text_domain),
            ),
            'has_archive'           => false,
            'public'                => true,
            'publicly_queryable'    => true,
            'capability_type'       => 'page',
            'menu_icon'             => 'dashicons-' . $post_type['dashicon'],
            'query_var'             => true,
            'show_ui'               => true,
            'show_in_rest'          => true,
            'show_in_menu'          => true,
            'rest_base'             => $post_type['singular'],
            'rest_controller_class' => 'WP_REST_Posts_Controller',
            'supports' => array(
                'title',
                'editor',
                'thumbnail',
                'revisions',
                'excerpt'
            )
        ));

    });
}

$custom_post_types = [];
function create_custom_post_type($plural, $singular, $dashicon, &$custom_post_types){
    $custom_post_types[] = [
        'plural'    => $plural,
        'singular'  => $singular,
        'dashicon'  => $dashicon
    ];
}

create_custom_post_type('services', 'service', 'businessman', $custom_post_types);
create_custom_post_type('case-studies', 'case-study', 'businessman', $custom_post_types);
create_custom_post_type('testimonials', 'testimonial', 'admin-comments', $custom_post_types);
create_custom_post_type('partners', 'partner', 'groups', $custom_post_types);

array_map( 'custom_post_type', $custom_post_types );
