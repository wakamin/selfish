<?php

if (! function_exists('selfish_related_post')) :

    /**
     * Display breadcrumb
     */
    
     function selfish_related_post()
     {
         if (is_single() && esc_attr(get_option('related_post')) == 'yes'):
            $cats = array_values(get_the_category());
            // Get last category post is in
            $last_category = end($cats);
         $posts = get_posts(array(
                'exclude' => get_the_ID(),
                'numberposts' => 4,
                'category' => $last_category->term_id,
                'post_type' => 'post',
                'orderby' => 'rand'
            )); ?>

            <div id="related-post" class="bg-light">
                <div class="container-fluid my-4 py-4">
                    <div class="section-title text-center mb-4">
                        <h3><?php _e('Related Post', 'selfish') ?></h3>
                        <div class="section-line w-25 m-auto border-dark"></div>
                    </div>
                    <div class="row">
                        <?php foreach ($posts as $post): ?>
                            <?php 
                                $excerpt = $post->post_excerpt;
         if (empty($excerpt)) {
             $excerpt = str_replace('&hellip;', '', wp_kses_post(wp_trim_words($post->post_content, 25)));
         }

         $date = get_the_date('d', $post);
         $month = get_the_date('m', $post);
         $year = get_the_date('Y', $post);
         $date_archive_link = get_day_link($year, $month, $date); ?>

                            <div class="col-12 col-sm-6 col-md-3 my-3 my-md-0">
                                <div class="card">
                                    <?php if (has_post_thumbnail($post)): ?>
                                        <a href="<?php echo get_the_permalink($post) ?>" title="<?php echo get_the_title($post) ?>">
                                            <img class="card-img-top" src="<?php echo get_the_post_thumbnail_url($post) ?>" alt="<?php echo get_the_title($post) ?>">
                                        </a>
                                    <?php endif; ?>
                                    <div class="card-body">
                                        <a href="<?php echo get_the_permalink($post) ?>" title="<?php echo get_the_title($post) ?>">
                                            <h5 class="card-title"><?php echo get_the_title($post) ?></h5>
                                        </a>
                                        <p class="card-text"><?php echo $excerpt ?></p>
                                    </div>
                                    <div class="card-footer">
                                        <small class="text-muted">
                                            <a href="<?php echo $date_archive_link ?>" title="<?php echo get_the_date('', $post) ?>">
                                                <?php echo get_the_date('', $post) ?>
                                            </a>
                                            <?php echo _e('by', 'selfish') ?>
                                            <a href="<?php echo get_author_posts_url($post->post_author) ?>" title="<?php echo get_the_author_meta('display_name', $post->post_author) ?>">
                                                <?php echo get_the_author_meta('display_name', $post->post_author) ?>
                                            </a>
                                        </small>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        <?php
        endif;
     }

endif;
