<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package selfish
 */

?>

<section class="no-results not-found">
	<header class="page-header">
		<h1 class="page-title"><?php esc_html_e('Nothing Found', 'selfish'); ?></h1>
	</header><!-- .page-header -->

	<div class="page-content">
		<?php if (is_home() && current_user_can('publish_posts')) : ?>

            <div class="alert alert-warning" role="alert">
                <?php
                    printf(
                        '<p>' . wp_kses(
                            /* translators: 1: link to WP admin new post page. */
                            __('Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'selfish'),
                            array(
                                'a' => array(
                                    'href' => array(),
                                ),
                            )
                        ) . '</p>',
                        esc_url(admin_url('post-new.php'))
                    );
                ?>
            </div>

        <?php elseif (is_search()) : ?>
    
            <div class="alert alert-warning" role="alert">
			    <?php esc_html_e('Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'selfish'); ?>
            </div>
            <?php get_search_form(); ?>
        
        <?php else : ?>

            <div class="alert alert-warning" role="alert">
                <?php esc_html_e('It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'selfish'); ?>
            </div>
            <?php get_search_form(); ?>
            
        <?php endif; ?>

	</div><!-- .page-content -->
</section><!-- .no-results -->
