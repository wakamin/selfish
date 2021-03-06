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
        <div id="top-header" class="d-inline-block text-center">
            <?php if (get_header_image()) : ?>
                <div id="header-image">
                    <img src="<?php header_image(); ?>"  height="100px" alt="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>">
                </div>
            <?php endif; ?>
            <?php if (selfish_site_logo_url() != ''): ?>
                <div class="site-logo <?php echo (get_header_image()) ? 'contain-image' : '' ?>">
                    <a href="<?php echo get_home_url() ?>" title="<?php echo bloginfo('name') ?>">
                        <img src="<?php echo selfish_site_logo_url() ?>" alt="<?php echo bloginfo('name') ?>" class="img-fluid">
                    </a>
                </div>
            <?php endif; ?>
            <div class="name-desc <?php echo (get_header_image()) ? 'contain-image' : '' ?>">
                <?php if (is_front_page() && is_home()) : ?>
                    <h1 class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a></h1>
                <?php else : ?>
                    <p class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a></p>
                <?php endif; ?>
                <?php $selfish_description = get_bloginfo('description', 'display'); ?>
                <?php if ($selfish_description || is_customize_preview()) : ?>
                    <p class="site-description"><?php echo $selfish_description; /* WPCS: xss ok. */ ?></p>
                <?php endif; ?>
            </div>
        </div>

		<div class="site-branding">
			<nav class="top-nav navbar navbar-expand-lg navbar-light bg-light">
				<div class="container">
	                <a href="<?php echo get_home_url() ?>" class="navbar-brand d-lg-none" title="<?php echo bloginfo('name') ?>" rel="home">
                        <?php if (selfish_site_logo_url() != ''): ?>
                            <div class="site-logo">
                                <img src="<?php echo selfish_site_logo_url() ?>" alt="<?php echo bloginfo('name') ?>" class="img-fluid">
                            </div>
                        <?php else: ?>
                            <?php bloginfo('name'); ?>
                        <?php endif; ?>
                    </a>
    
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
					</button>

				  	<div class="collapse navbar-collapse" id="navbarSupportedContent">
						<?php
                        wp_nav_menu(array(
                            'theme_location' => 'top-nav-menu',
                            'container' => '',
                            'menu_id'        => 'top-nav-menu',
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
