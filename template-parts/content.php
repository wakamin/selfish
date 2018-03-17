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

    <div class="row">
        <div class="<?php echo (has_post_thumbnail()) ? 'col-8' : 'col-12' ?>">
            <header class="entry-header">
                <?php
                if (is_singular()) :
                    the_title('<h1 class="entry-title">', '</h1>');
                else :
                    the_title('<h2 class="entry-title"><a href="' . esc_url(get_permalink()) . '" title="' . get_the_title() . '" rel="bookmark">', '</a></h2>');
                endif;

                if ('post' === get_post_type()) :
                    ?>
                <?php endif; ?>
            </header><!-- .entry-header -->

            <div class="entry-content">
                <a href="<?php esc_url(get_permalink()) ?>" title="<?php echo get_the_title() ?>" class="excerpt-link-wrapper">
                    <?php the_excerpt() ?>
                </a>
            </div><!-- .entry-content -->

            <footer class="entry-footer">
                <div class="entry-meta">
                    <?php
                    selfish_posted_on();
                    selfish_posted_by();
                    ?>
                </div><!-- .entry-meta -->
                <?php selfish_entry_footer(); ?>
            </footer><!-- .entry-footer -->
        </div>
        <?php if (has_post_thumbnail()): ?>
            <div class="col-4">
                <a href="<?php esc_url(get_permalink()) ?>" title="<?php echo get_the_title() ?>">
                    <img src="<?php echo get_the_post_thumbnail_url() ?>" alt="<?php echo get_the_title() ?>" class="img-fluid">
                </a>
            </div>
        <?php endif; ?>
    </div>

</article><!-- #post-<?php the_ID(); ?> -->