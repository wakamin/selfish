<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package selfish
 */

if (! function_exists('selfish_posted_on')) :
    /**
     * Prints HTML with meta information for the current post-date/time.
     */
    function selfish_posted_on()
    {
        $time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
        // if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
        // 	$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
        // }

        $time_string = sprintf($time_string,
            esc_attr(get_the_date('c')),
            esc_html(get_the_date()),
            esc_attr(get_the_modified_date('c')),
            esc_html(get_the_modified_date())
        );

        $posted_on = sprintf(
            /* translators: %s: post date. */
            esc_html_x('%s', 'post date', 'selfish'),
            '<a href="' . esc_url(get_permalink()) . '" rel="bookmark">' . $time_string . '</a>'
        );

        echo '<span class="posted-on">' . $posted_on . '</span>'; // WPCS: XSS OK.
    }
endif;

if (! function_exists('selfish_posted_by')) :
    /**
     * Prints HTML with meta information for the current author.
     */
    function selfish_posted_by()
    {
        $byline = sprintf(
            /* translators: %s: post author. */
            '<span class="author vcard"><a class="url fn n" href="' . esc_url(get_author_posts_url(get_the_author_meta('ID'))) . '">'. _e(' by ', 'selfish') . esc_html(get_the_author()) . '</a></span>'
        );

        echo '<span class="byline"> ' . $byline . '</span>'; // WPCS: XSS OK.
    }
endif;

if (! function_exists('selfish_entry_footer')) :
    /**
     * Prints HTML with meta information for the categories, tags and comments.
     */
    function selfish_entry_footer()
    {
        // Hide category and tag text for pages.
        if ('post' === get_post_type()) {
            /* translators: used between list items, there is a space after the comma */
            $categories_list = get_the_category_list(esc_html__(', ', 'selfish'));
            if ($categories_list) {
                /* translators: 1: list of categories. */
                printf('<div class="cat-links mb-2">' . esc_html__('Posted in %1$s', 'selfish') . '</div>', $categories_list); // WPCS: XSS OK.
            }

            /* translators: used between list items, there is a space after the comma */
            $tags_list = get_the_tag_list();
            if ($tags_list) {
                /* translators: 1: list of tags. */
                printf('<div class="tags-links mb-2">' . esc_html__('Tagged %1$s', 'selfish') . '</div>', $tags_list); // WPCS: XSS OK.
            }
        }

        if (! is_single() && ! post_password_required() && (comments_open() || get_comments_number())) {
            if (!is_archive() && !is_front_page()) {
                echo '<div class="comments-link">';
                comments_popup_link(
                    sprintf(
                        wp_kses(
                            /* translators: %s: post title */
                            __('Leave a Comment<span class="screen-reader-text"> on %s</span>', 'selfish'),
                            array(
                                'span' => array(
                                    'class' => array(),
                                ),
                            )
                        ),
                        get_the_title()
                    )
                );
                echo '</div>';
            }
        }

        edit_post_link(
            sprintf(
                wp_kses(
                    /* translators: %s: Name of current post. Only visible to screen readers */
                    __('Edit <div class="screen-reader-text">%s</div>', 'selfish'),
                    array(
                        'span' => array(
                            'class' => array(),
                        ),
                    )
                ),
                get_the_title()
            ),
            '<div class="edit-link">',
            '</div>'
        );
    }
endif;

if (! function_exists('selfish_post_thumbnail')) :
    /**
     * Displays an optional post thumbnail.
     *
     * Wraps the post thumbnail in an anchor element on index views, or a div
     * element when on single views.
     */
    function selfish_post_thumbnail()
    {
        if (post_password_required() || is_attachment() || ! has_post_thumbnail()) {
            return;
        }

        if (is_singular()) :
            ?>

			<div class="post-thumbnail text-center mb-4">
				<?php the_post_thumbnail(); ?>
			</div><!-- .post-thumbnail -->

		<?php else : ?>

            <a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true">
                <?php
                the_post_thumbnail('post-thumbnail', array(
                    'alt' => the_title_attribute(array(
                        'echo' => false,
                    )),
                )); ?>
            </a>

            <?php
        endif; // End is_singular().
    }
endif;
