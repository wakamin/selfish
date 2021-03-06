<?php
/**
 * selfish functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package selfish
 */

include_once(ABSPATH . 'wp-admin/includes/plugin.php');

if (! function_exists('selfish_setup')) :
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    function selfish_setup()
    {
        /*
         * Make theme available for translation.
         * Translations can be filed in the /languages/ directory.
         * If you're building a theme based on selfish, use a find and replace
         * to change 'selfish' to the name of your theme in all the template files.
         */
        load_theme_textdomain('selfish', get_template_directory() . '/languages');

        // Add default posts and comments RSS feed links to head.
        add_theme_support('automatic-feed-links');

        /*
         * Let WordPress manage the document title.
         * By adding theme support, we declare that this theme does not use a
         * hard-coded <title> tag in the document head, and expect WordPress to
         * provide it for us.
         */
        add_theme_support('title-tag');

        /*
         * Enable support for Post Thumbnails on posts and pages.
         *
         * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
         */
        add_theme_support('post-thumbnails');

        // This theme uses wp_nav_menu() in one location.
        register_nav_menus(array(
            'top-nav-menu' => esc_html__('Top Navigation Menu', 'selfish'),
            'footer-menu' => esc_html__('Footer Menu', 'selfish'),
        ));

        /*
         * Switch default core markup for search form, comment form, and comments
         * to output valid HTML5.
         */
        add_theme_support('html5', array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
        ));

        // Set up the WordPress core custom background feature.
        add_theme_support('custom-background', apply_filters('selfish_custom_background_args', array(
            'default-color' => 'ffffff',
            'default-image' => '',
        )));

        // Add theme support for selective refresh for widgets.
        add_theme_support('customize-selective-refresh-widgets');

        /**
         * Add support for core custom logo.
         *
         * @link https://codex.wordpress.org/Theme_Logo
         */
        add_theme_support('custom-logo', array(
            'height'      => 250,
            'width'       => 250,
            'flex-width'  => true,
            'flex-height' => true,
        ));
    }
endif;
add_action('after_setup_theme', 'selfish_setup');

if (! isset($content_width)) {
    $content_width = 730;
}

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function selfish_widgets_init()
{
    register_sidebar(array(
        'name'          => esc_html__('Sidebar', 'selfish'),
        'id'            => 'sidebar-1',
        'description'   => esc_html__('Add widgets here.', 'selfish'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ));
}
add_action('widgets_init', 'selfish_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function selfish_scripts()
{
    //wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css?family=Karma:400,700');
    wp_enqueue_style('bootstrap', get_template_directory_uri() . '/assets/css/main.min.css');
    wp_enqueue_style('font-awesome', get_template_directory_uri() . '/assets/css/font-awesome/css/fontawesome-all.min.css');
    // wp_enqueue_style('selfish-style', get_stylesheet_uri());

    wp_enqueue_script('selfish-jquery', get_template_directory_uri() . '/assets/js/jquery.min.js', array(), '20151215', true);
    wp_enqueue_script('bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.bundle.min.js', array(), '20151215', true);
    wp_enqueue_script('selfish-navigation', get_template_directory_uri() . '/assets/js/navigation.js', array(), '20151215', true);
    wp_enqueue_script('selfish-skip-link-focus-fix', get_template_directory_uri() . '/assets/js/skip-link-focus-fix.js', array(), '20151215', true);
    wp_enqueue_script('selfish', get_template_directory_uri() . '/assets/js/theme.min.js', array(), '20151215', true);

    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}
add_action('wp_enqueue_scripts', 'selfish_scripts');

/**
* Registers WYSIWYG editor stylesheet for the theme.
*/
function selfish_wysiwyg_editor_styles()
{
    add_editor_style('assets/css/wysiwyg.css');
}
add_action('admin_init', 'selfish_wysiwyg_editor_styles');

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Bootstrap nav walker.
 */
require get_template_directory() . '/inc/nav-menu-walker.php';

/**
 * Load Jetpack compatibility file.
 */
if (defined('JETPACK__VERSION')) {
    require get_template_directory() . '/inc/jetpack.php';
}
