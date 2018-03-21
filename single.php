<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package selfish
 */

get_header();
?>

	<div id="primary" class="content-area my-4">
        <main id="main">

            <?php while (have_posts()) : ?>

                <?php the_post(); ?>
                <?php get_template_part('template-parts/content', get_post_type()); ?>

                <div class="container my-4">
                    <?php the_post_navigation(); ?>
                </div>

                <?php selfish_related_post() ?>

                <div class="container my-4">
                    <div class="row">
                        <div class="col-12 col-md-10 col-lg-8 m-auto">
                            <?php if (comments_open() || get_comments_number()) : ?>
                                <?php comments_template(); ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>

        </main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
