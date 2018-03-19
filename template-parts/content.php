<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package selfish
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header container mb-4">
        <div class="row">
            <div class="col-12 col-md-10 col-lg-8 m-auto">
                <?php if (is_singular()): ?>
                    <?php selfish_breadcrumb() ?>
                <?php endif; ?>

                <?php the_title('<h1 class="entry-title">', '</h1>'); ?>

                <div class="entry-meta">
                    <?php
                        selfish_posted_on();
                        selfish_posted_by();
                    ?>
                </div><!-- .entry-meta -->
            </div>
        </div>
	</header><!-- .entry-header -->

   	<?php selfish_post_thumbnail(); ?>

       <div class="entry-content container border-bottom mb-4">
        <div class="row">
            <div class="col-12 col-md-10 col-lg-8 m-auto">
                <?php
                the_content(sprintf(
                    wp_kses(
                        /* translators: %s: Name of current post. Only visible to screen readers */
                        __('Continue reading<span class="screen-reader-text"> "%s"</span>', 'selfish'),
                        array(
                            'span' => array(
                                'class' => array(),
                            ),
                        )
                    ),
                    get_the_title()
                ));

                wp_link_pages(array(
                    'before' => '<div class="page-links">' . esc_html__('Pages:', 'selfish'),
                    'after'  => '</div>',
                ));
                ?>
            </div>
        </div>
	</div><!-- .entry-content -->

	<footer class="entry-footer container">
        <div class="row">
            <div class="col-12 col-md-10 col-lg-8 m-auto">
                 <?php selfish_entry_footer(); ?>
            </div>
        </div>
    </footer><!-- .entry-footer -->
    
</article><!-- #post-<?php the_ID(); ?> -->