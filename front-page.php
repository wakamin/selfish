<?php
/**
 * The front page template file
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

			<main id="main" class="site-main <?php echo (esc_attr(get_option('homepage') == 'grid')) ? 'col-md-12' : 'col-md-9' ?>">
                <?php if (esc_attr(get_option('homepage')) == 'grid'): ?>
                    <div class="section-title mb-4">
                        <h3><?php _e('Latest Posts', 'selfish') ?></h3>
                        <div class="section-line w-25 border-dark"></div>
                    </div>
                    <div id="post-grid" class="row">
                        <?php 
                            $posts = get_posts(array(
                                'numberposts' => 6,
                                'post_type' => 'post',
                                'orderby' => 'date',
                                'order' => 'DESC'
                            ));
                        ?>
                        <?php if(count($posts) == 6): ?>
                            <div class="col-12 col-lg-6">
                                <div class="row">
                                    <?php selfish_post_grid_wide($posts[0]) ?>
                                    <?php selfish_post_grid_tall($posts[1]) ?>
                                    <?php selfish_post_grid_tall($posts[2]) ?>
                                </div>
                            </div>
                            <div class="col-12 col-lg-6">
                                <div class="row">
                                    <?php selfish_post_grid_tall($posts[3]) ?>
                                    <?php selfish_post_grid_tall($posts[4]) ?>
                                    <?php selfish_post_grid_wide($posts[5]) ?>
                                </div>
                            </div>
                        <?php else: ?>
                            <div class="col-12">
                                <div class="alert alert-warning" role="alert">
                                    <strong><?php _e( 'Your post is less than 6, add more post to make home grid layout available.', 'selfish' ) ?></strong>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php else: ?>
                    <div class="post-list">
                        <?php if (have_posts()) : ?>
                            <?php while (have_posts()) : ?>
                                <?php the_post(); ?>
                                <?php get_template_part('template-parts/list'); ?>
                            <?php endwhile; ?>
                            <?php the_posts_navigation(); ?>
                        <?php else : ?>
                            <?php get_template_part('template-parts/content', 'none'); ?>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
            
            </main><!-- #main -->
            
            <?php if (esc_attr(get_option('homepage')) == 'list'): ?>
    			<?php get_sidebar(); ?>
            <?php endif; ?>
        
        </row><!-- .row -->
	</div><!-- #primary -->

<?php get_footer(); ?>
