# wp-custom-post-types
Allows you to easily create multiple WordPress custom post types without needing to tweak a bunch of options.

Please into your includes (or wherever you like) and include into your functions.php with:
load_template(get_template_directory() . '/includes/custom-post-types.php' );

To use simply call the 'create_custom_post_type' function, params are plural, singular, dashicon, and you must pass the $custom_post_types variable.  -- If you can think of a better way, please tell me!

Example:
create_custom_post_type('services', 'service', 'businessman', $custom_post_types);

The above example creates a custom post type called Services.

To create multiple custom post types simple call the function again and modify the names, example:

create_custom_post_type('services', 'service', 'businessman', $custom_post_types);
create_custom_post_type('testimonials', 'testimonial', 'admin-comments', $custom_post_types);

Creates two custom post types, one called Services and another called Testimonials.
