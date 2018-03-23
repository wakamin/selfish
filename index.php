<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
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
				<?php if (have_posts()) : ?>
                    <?php while (have_posts()) : ?>
                        <?php the_post(); ?>
                         <?php get_template_part('template-parts/list'); ?>
                    <?php endwhile; ?>
                    <?php the_posts_navigation(); ?>
                <?php else : ?>
                    <?php get_template_part('template-parts/content', 'none'); ?>
                <?php endif; ?>
            </main><!-- #main -->
            
            <?php get_sidebar(); ?>
        </row><!-- .row -->
	</div><!-- #primary -->

<?php get_footer(); ?>
