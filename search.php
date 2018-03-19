<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package selfish
 */

get_header();
?>

	<section id="primary" class="content-area my-4 container">
        <div class="row">
            <main id="main" class="site-main col-md-9">
                <div class="post-list">

                    <?php if (have_posts()) : ?>
                        <header class="page-header border-bottom mb-4">
                            <h1 class="page-title">
                                <?php
                                /* translators: %s: search query. */
                                printf(esc_html__('Search Results for: %s', 'selfish'), '<span>' . get_search_query() . '</span>');
                                ?>
                            </h1>
                        </header><!-- .page-header -->

                        <?php while (have_posts()) : ?>
                            <?php the_post(); ?>
                            <?php get_template_part('template-parts/list'); ?>
                        <?php endwhile; ?>
                    
                        <?php the_posts_navigation(); ?>
                    <?php else : ?>
                        <?php get_template_part('template-parts/content', 'none'); ?>
                    <?php endif; ?>
    
                </div>
            </main><!-- #main -->

            <?php get_sidebar(); ?>

        </div>
	</section><!-- #primary -->

<?php get_footer(); ?>
