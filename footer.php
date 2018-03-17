<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package selfish
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer text-center bg-light border-top py-4">
		<div class="site-info">
            Copyright <i class="far fa-copyright"></i> <?php echo date('Y') ?> <strong><?php echo bloginfo('name') ?></strong>
			<span class="sep"> | </span>
				<?php
                /* translators: 1: Theme name, 2: Theme author. */
                printf(esc_html__('Theme: %1$s by %2$s.', 'selfish'), 'Selfish', '<a href="https://www.samudradigital.com/">Samudra Digital</a>');
                ?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
