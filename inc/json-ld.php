<?php

if (! function_exists('selfish_json_ld')) :

    /**
     * Display json-ld
     */
    
     function selfish_json_ld()
     {
         if (is_single()) :
            global $post;

         $excerpt = $post->post_excerpt;
         if (empty($excerpt)) {
             $excerpt = str_replace('&hellip;', '', wp_kses_post(wp_trim_words($post->post_content, 35)));
         }

         $headline = get_the_title();
         $description = $excerpt;

         if (is_plugin_active('all-in-one-seo-pack/all_in_one_seo_pack.php')) {
             if (get_post_meta($post->ID, '_aioseop_title', true) != '') {
                 $headline = get_post_meta($post->ID, '_aioseop_title', true);
             }
             if (get_post_meta($post->ID, '_aioseop_description', true) != '') {
                 $description = get_post_meta($post->ID, '_aioseop_description', true);
             }
         }

         if (is_plugin_active('wordpress-seo/wp-seo.php') || is_plugin_active('wordpress-seo-premium/wp-seo-premium.php')) {
             if (get_post_meta($post->ID, '_yoast_wpseo_title', true) != '') {
                 $headline = get_post_meta($post->ID, '_yoast_wpseo_title', true);
             }
             if (get_post_meta($post->ID, '_yoast_wpseo_metadesc', true) != '') {
                 $description = get_post_meta($post->ID, '_yoast_wpseo_metadesc', true);
             }
         } ?>

            <script type="application/ld+json">
                {
                    "@context": "http://schema.org",
                    "@type": "NewsArticle",
                    "mainEntityOfPage": {
                        "@type": "WebPage"
                    },
                    "headline": "<?php echo $headline ?>",
                    "image": [
                        "<?php echo get_the_post_thumbnail_url() ?>"
                    ],
                    "datePublished": "<?php echo get_the_date('c') ?>",
                    "dateModified": "<?php the_modified_date('c', '', '', true) ?>",
                    "author": {
                        "@type": "Person",
                        "name": "<?php echo get_the_author_meta('display_name', $post->post_author) ?>"
                    },
                    "publisher": {
                        "@type": "Organization",
                        "name": "<?php echo bloginfo('name') ?>",
                        "logo": {
                            "@type": "ImageObject",
                            "url": "<?php echo site_logo_url() ?>"
                        }
                    },
                    "description": "<?php echo $description ?>"
                }
            </script>

         <?php
        endif;
     }

endif;
