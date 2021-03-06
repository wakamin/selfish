<?php
/**
 * Sample implementation of the Custom Header feature
 *
 * You can add an optional custom header image to header.php like so ...
 *
    <?php the_header_image_tag(); ?>
 *
 * @link https://developer.wordpress.org/themes/functionality/custom-headers/
 *
 * @package selfish
 */

/**
 * Set up the WordPress core custom header feature.
 *
 * @uses selfish_header_style()
 */
function selfish_custom_header_setup()
{
    add_theme_support('custom-header', apply_filters('selfish_custom_header_args', array(
        'default-image'          => '',
        'default-text-color'     => '000000',
        'width'                  => 1500,
        'height'                 => 100,
        'flex-height'            => true,
        'wp-head-callback'       => 'selfish_header_style',
    )));
}
add_action('after_setup_theme', 'selfish_custom_header_setup');

if (! function_exists('selfish_header_style')) :
    /**
     * Styles the header image and text displayed on the blog.
     *
     * @see selfish_custom_header_setup().
     */
    function selfish_header_style()
    {
        $header_text_color = get_header_textcolor(); ?>
		<style type="text/css">
		<?php
        // Has the text been hidden?
        if (! display_header_text()) :
            ?>
			.site-title,
			.site-description {
				position: absolute;
				clip: rect(1px, 1px, 1px, 1px);
			}
		<?php
        // If the user has set a custom color for the text use that.
        else :
            ?>
			.site-title a,
			.site-description {
				color: #<?php echo esc_attr($header_text_color); ?> !important;
			}
		<?php endif; ?>
		</style>
		<?php

    }
endif;
