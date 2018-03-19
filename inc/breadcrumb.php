<?php

if (! function_exists('selfish_breadcrumb')) :

/**
 * Display breadcrumb
 */

 function selfish_breadcrumb()
 {
     ?>

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo get_home_url() ?>"><?php _e('Home', 'selfish') ?></a></li>

            <?php if (is_single()): ?>
                <?php 
                    // Get post category info
                    $category = get_the_category(); ?>

                <?php
                    if (!empty($category)) {
                        // Get last category post is in
                        $last_category = end(array_values($category));
                        // Get parent any categories and create array
                        $get_cat_parents = rtrim(get_category_parents($last_category->term_id, true, ','), ',');
                        $cat_parents = explode(',', $get_cat_parents);
                        // Loop through parent categories and store in variable $cat_display
                        $cat_display = '';
                        foreach ($cat_parents as $parents) {
                            $cat_display .= '<li class="breadcrumb-item">'.$parents.'</li>';
                        }
                    } ?>

                <?php
                    // If it's a custom post type within a custom taxonomy
                    $taxonomy_exists = taxonomy_exists($custom_taxonomy); ?>

                <?php
                    if (empty($last_category) && !empty($custom_taxonomy) && $taxonomy_exists) {
                        $taxonomy_terms = get_the_terms($post->ID, $custom_taxonomy);
                        $cat_id         = $taxonomy_terms[0]->term_id;
                        $cat_nicename   = $taxonomy_terms[0]->slug;
                        $cat_link       = get_term_link($taxonomy_terms[0]->term_id, $custom_taxonomy);
                        $cat_name       = $taxonomy_terms[0]->name;
                    }
                    // Check if the post is in a category
                    if (!empty($last_category)) {
                        echo $cat_display;
                    // Else if post is in a custom taxonomy
                    } elseif (!empty($cat_id)) {
                        echo '<li class="breadcrumb-item"><a href="' . $cat_link . '" title="' . $cat_name . '">' . $cat_name . '</a></li>';
                    } ?>

                <li class="breadcrumb-item active"><?php echo get_the_title() ?></li>
            <?php endif; ?>

            <?php if (is_page()): ?>
                <li class="breadcrumb-item active"><?php echo get_the_title() ?></li>
            <?php endif; ?>

            <?php if (is_archive() && !is_author() && !is_date()): ?>
                <li class="breadcrumb-item active"><?php echo single_term_title('', false) ?></li>
            <?php endif; ?>

            <?php if (is_author()): ?>
                <li class="breadcrumb-item active"><?php echo get_author_name('', false) ?></li>
            <?php endif; ?>

            <?php if (is_date()): ?>
                <li class="breadcrumb-item active"><?php echo the_archive_title('', false) ?></li>
            <?php endif; ?>

        </ol>
    </nav>
 <?php

 }

endif;
