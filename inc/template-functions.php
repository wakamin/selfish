<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package selfish
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function selfish_body_classes($classes)
{
    // Adds a class of hfeed to non-singular pages.
    if (! is_singular()) {
        $classes[] = 'hfeed';
    }

    return $classes;
}
add_filter('body_class', 'selfish_body_classes');

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function selfish_pingback_header()
{
    if (is_singular() && pings_open()) {
        echo '<link rel="pingback" href="', esc_url(get_bloginfo('pingback_url')), '">';
    }
}
add_action('wp_head', 'selfish_pingback_header');

function site_logo_url()
{
    $custom_logo_id = get_theme_mod('custom_logo');
    $image = wp_get_attachment_image_src($custom_logo_id, 'full');
    return $image[0];
}

function post_excerpt_length($length)
{
    return 35;
}
add_filter('excerpt_length', 'post_excerpt_length', 999);
