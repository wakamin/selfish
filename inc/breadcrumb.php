<?php

if (! function_exists('selfish_breadcrumb')) :

/**
 * Display breadcrumb
 */

 function selfish_breadcrumb()
 {
     if (esc_attr(get_option('breadcrumb')) == 'yes'):
        ?>

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb" itemscope itemtype="http://schema.org/BreadcrumbList">
                <li class="breadcrumb-item" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                    <a itemprop="item" href="<?php echo get_home_url() ?>"><span itemprop="name"><?php _e('Home', 'selfish') ?></span></a>
                    <meta itemprop="position" content="1" />
                </li>

                <?php if (is_single()): ?>
                    <?php 
                        // Get post category info
                        $category = get_the_category(); ?>

                    <?php
                        if (!empty($category)) {
                            $cats = array_values($category);
                            // Get last category post is in
                            $last_category = end($cats);
                            // Get parent any categories and create array
                            $get_cat_parents = rtrim(get_category_parents($last_category->term_id, false, ','), ',');
                            $cat_parents = explode(',', $get_cat_parents);
                            // Loop through parent categories and store in variable $cat_display
                            $cat_display = '';
                            foreach ($cat_parents as $key => $parent) {
                                $position = $key+2;
                                $parent_link = get_term_link(get_cat_ID($parent));
                                $cat_display .= '<li class="breadcrumb-item" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">';
                                $cat_display .= '<span itemprop="name"><a itemprop="item" href="'.$parent_link.'">'.$parent.'</a></span><meta itemprop="position" content="'.$position.'" />';
                                $cat_display .= '</li>';
                            }
                        }

                        // Check if the post is in a category
                        if (!empty($last_category)) {
                            echo $cat_display;
                        } ?>

                    <li class="breadcrumb-item active" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                        <a itemprop="item" href="<?php echo get_permalink() ?>"><span itemprop="name"><?php echo get_the_title() ?></span></a>
                        <meta itemprop="position" content="<?php echo count($cat_parents) + 2 ?>" />
                    </li>
                <?php endif; ?>

                <?php if (is_page()): ?>
                    <li class="breadcrumb-item active">
                        <a itemprop="item" href="<?php echo get_permalink() ?>"><span itemprop="name"><?php echo get_the_title() ?></span></a>
                        <meta itemprop="position" content="2" />
                    </li>
                <?php endif; ?>

                <?php if (is_archive() && !is_author() && !is_date()): ?>
                    <?php $term = get_queried_object() ?>
                    <li class="breadcrumb-item active">
                        <a itemprop="item" href="<?php echo get_term_link($term->term_id) ?>"><span itemprop="name"><?php echo single_term_title('', false) ?></span></a>
                        <meta itemprop="position" content="2" />
                    </li>
                <?php endif; ?>

                <?php if (is_author()): ?>
                    <li class="breadcrumb-item active">
                        <a itemprop="item" href="<?php echo get_the_author_link() ?>"><span itemprop="name"><?php echo get_the_author_meta('display_name') ?></span></a>
                        <meta itemprop="position" content="2" />
                    </li>
                <?php endif; ?>

                <?php if (is_date()): ?>
                    <?php
                        $year     = get_query_var('year');
     $month = get_query_var('monthnum');
     $day      = get_query_var('day');
     $link = '#';
     if (is_year()) {
         $link = get_year_link($year);
     }
     if (is_month()) {
         $link = get_month_link($year, $month);
     }
     if (is_day()) {
         $link = get_day_link($year, $month, $day);
     } ?>
                    <li class="breadcrumb-item active">
                        <a itemprop="item" href="<?php echo $link ?>"><span itemprop="name"><?php echo the_archive_title('', false) ?></span></a>
                        <meta itemprop="position" content="2" />
                    </li>
                <?php endif; ?>

            </ol>
        </nav>
     
<?php
    endif;
 }

endif;
