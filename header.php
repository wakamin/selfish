<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package selfish
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="profile" href="http://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e('Skip to content', 'selfish'); ?></a>

	<header id="masthead" class="site-header">
		<div class="site-branding">
			<nav class="navbar navbar-expand-lg navbar-light bg-light">
				<div class="container">
				  	<span class="navbar-brand">
					  	<div class="site-logo">
							<a href="<?php echo get_home_url() ?>" title="<?php echo bloginfo('name') ?>">
					  			<img src="<?php echo site_logo_url() ?>" alt="<?php echo bloginfo('name') ?>" class="img-fluid">
							</a>
						</div>
						<div class="collapse">
							<?php if (is_front_page() && is_home()) :    ?>
		  						<h1 class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a></h1>
		  					<?php else : ?>
		  						<p class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a></p>
		  					<?php endif; ?>
							<?php $selfish_description = get_bloginfo('description', 'display'); ?>
		  					<?php if ($selfish_description || is_customize_preview()) :    ?>
		  						<p class="site-description"><?php echo $selfish_description; /* WPCS: xss ok. */ ?></p>
		  					<?php endif; ?>
						</div>
				  	</span>
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
					</button>

				  	<div class="collapse navbar-collapse" id="navbarSupportedContent">
						<?php
                        wp_nav_menu(array(
                            'theme_location' => 'menu-1',
                            'container' => '',
                            'menu_id'        => 'primary-menu',
                            'menu_class' => 'navbar-nav mr-auto',
                            'walker' => new Bootstrap_Walker_Nav_Menu()
                        ));
                        ?>
					    <?php get_search_form() ?>
				  </div>
			  </div>
			</nav>

		</div><!-- .site-branding -->
	</header><!-- #masthead -->

	<div id="content" class="site-content">
