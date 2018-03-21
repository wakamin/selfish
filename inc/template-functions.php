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

function selfish_post_excerpt_length($length)
{
    return 35;
}
add_filter('excerpt_length', 'selfish_post_excerpt_length', 999);

function selfish_post_category($post)
{
    $category = get_the_category($post);
    if (!empty($category)) {
        $cats = array_values($category);
        // Get last category post is in
        return end($cats);
    } else {
        return '';
    }
}

function selfish_home_grid_body_class($classes)
{
    $classes[] = 'home-grid';
    return $classes;
}
if (esc_attr(get_option('homepage')) == 'grid') {
    add_filter('body_class', 'selfish_home_grid_body_class');
}

function selfish_post_grid_wide($post)
{
    ?>
    <div class="wide py-3 col-12">
        <a href="<?php echo get_the_permalink($post) ?>" title="<?php echo get_the_title($post) ?>">
            <div class="inner p-3 h-100" style="background: url('<?php echo get_the_post_thumbnail_url($post) ?>') no-repeat center; background-size: cover;">
                <?php if (selfish_post_category($post) != ''): ?>
                    <div class="category small"><?php echo selfish_post_category($post)->name ?></div>
                <?php endif; ?>
                <h2><?php echo get_the_title($post) ?></h2>
                <button type="button" class="btn btn-primary"><?php _e('Read more', 'selfish') ?></button>
            </div>
        </a>
    </div>
    <?php

}

function selfish_post_grid_tall($post)
{
    ?>
    <div class="tall py-3 col-12 col-md-6">
        <a href="<?php echo get_the_permalink($post) ?>" title="<?php echo get_the_title($post) ?>">
            <div class="inner p-3 h-100" style="background: url('<?php echo get_the_post_thumbnail_url($post) ?>') no-repeat center; background-size: cover;">
                <?php if (selfish_post_category($post) != ''): ?>
                    <div class="category small"><?php echo selfish_post_category($post)->name ?></div>
                <?php endif; ?>
                <h2><?php echo get_the_title($post) ?></h2>
                <button type="button" class="btn btn-primary"><?php _e('Read more', 'selfish') ?></button>
            </div>
        </a>
    </div>
    <?php

}
