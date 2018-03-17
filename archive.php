<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package selfish
 */

get_header();
?>

	<div id="primary" class="content-area my-4 container">
        <div class="row">

            <main id="main" class="site-main col-md-9">
                <div class="post-list">

                    <?php if (have_posts()) : ?>
                        <header class="page-header border-bottom mb-4">
                            <?php
                            the_archive_title('<h1 class="page-title">', '</h1>');
                            the_archive_description('<div class="archive-description">', '</div>');
                            ?>
                        </header><!-- .page-header -->

                        <?php while (have_posts()) : ?>
                            <?php the_post(); ?>
                            <?php get_template_part('template-parts/content', get_post_type()); ?>
                        <?php endwhile; ?>
                        <?php the_posts_navigation(); ?>
                    <?php else : ?>
                        <?php get_template_part('template-parts/content', 'none'); ?>
                    <?php endif; ?>

                </div>

            </main><!-- #main -->

            <?php get_sidebar(); ?>

        </div>
	</div><!-- #primary -->

<?php get_footer(); ?>
