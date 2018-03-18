<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
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

                <div class="container">
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
