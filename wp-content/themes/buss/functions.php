<?php
/**
 * buss functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package buss
 */

if (!defined('_S_VERSION')) {
    // Replace the version number of the theme on each release.
    define('_S_VERSION', '1.0.0');
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function buss_setup()
{
    /*
        * Make theme available for translation.
        * Translations can be filed in the /languages/ directory.
        * If you're building a theme based on buss, use a find and replace
        * to change 'buss' to the name of your theme in all the template files.
        */
    load_theme_textdomain('buss', get_template_directory() . '/languages');

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
    register_nav_menus(
        array(
            'menu-1' => esc_html__('Primary', 'buss'),
        )
    );

    /*
        * Switch default core markup for search form, comment form, and comments
        * to output valid HTML5.
        */
    add_theme_support(
        'html5',
        array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
            'style',
            'script',
        )
    );

    // Set up the WordPress core custom background feature.
    add_theme_support(
        'custom-background',
        apply_filters(
            'buss_custom_background_args',
            array(
                'default-color' => 'ffffff',
                'default-image' => '',
            )
        )
    );

    // Add theme support for selective refresh for widgets.
    add_theme_support('customize-selective-refresh-widgets');

    /**
     * Add support for core custom logo.
     *
     * @link https://codex.wordpress.org/Theme_Logo
     */
    add_theme_support(
        'custom-logo',
        array(
            'height' => 250,
            'width' => 250,
            'flex-width' => true,
            'flex-height' => true,
        )
    );
}

add_action('after_setup_theme', 'buss_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function buss_content_width()
{
    $GLOBALS['content_width'] = apply_filters('buss_content_width', 640);
}

add_action('after_setup_theme', 'buss_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function buss_widgets_init()
{
    register_sidebar(
        array(
            'name' => esc_html__('Sidebar', 'buss'),
            'id' => 'sidebar-1',
            'description' => esc_html__('Add widgets here.', 'buss'),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget' => '</section>',
            'before_title' => '<h2 class="widget-title">',
            'after_title' => '</h2>',
        )
    );
}

add_action('widgets_init', 'buss_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function buss_scripts()
{
    wp_enqueue_style('buss-style', get_stylesheet_uri(), array(), _S_VERSION);
    wp_enqueue_style('buss-style-main', get_template_directory_uri() . "/css/style.css", array('buss-style'), _S_VERSION);
    wp_enqueue_style('buss-swiper', "https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css", array('buss-style', 'buss-style-main'), _S_VERSION);
    wp_style_add_data('buss-style', 'rtl', 'replace');

    wp_enqueue_script('buss-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true);
    wp_enqueue_script('buss-swiper', 'https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js', array('jquery'), _S_VERSION, true);
    wp_enqueue_script('buss-main', get_template_directory_uri() . '/js/main.js', array('jquery', 'buss-swiper'), _S_VERSION, true);

    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}

add_action('wp_enqueue_scripts', 'buss_scripts');

function add_type_attribute($tag, $handle, $src)
{
    // if not your script, do nothing and return original $tag
    if ('buss-main' !== $handle) {
        return $tag;
    }
    // change the script tag by adding type="module" and return it.
    $tag = '<script type="module" src="' . esc_url($src) . '"></script>';
    return $tag;
}

add_filter('script_loader_tag', 'add_type_attribute', 10, 3);

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
 * ACF Blocks.
 */
require get_template_directory() . '/inc/blocks.php';

/**
 * Load Jetpack compatibility file.
 */
if (defined('JETPACK__VERSION')) {
    require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Load WooCommerce compatibility file.
 */
if (class_exists('WooCommerce')) {
    require get_template_directory() . '/inc/woocommerce.php';
}

/* Disable WordPress Admin Bar for all users */
// todo: remove in the future. for development purpose
add_filter('show_admin_bar', '__return_false');

// Allow SVG
add_filter('wp_check_filetype_and_ext', function ($data, $file, $filename, $mimes) {
    $filetype = wp_check_filetype($filename, $mimes);

    return [
        'ext' => $filetype['ext'],
        'type' => $filetype['type'],
        'proper_filename' => $data['proper_filename']
    ];

}, 10, 4);

function cc_mime_types($mimes)
{
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}

add_filter('upload_mimes', 'cc_mime_types');

function fix_svg()
{
    echo '<style type="text/css">
        .attachment-266x266, .thumbnail img {
             width: 100% !important;
             height: auto !important;
        }
        </style>';
}

add_action('admin_head', 'fix_svg');

add_filter('wpcf7_form_elements', function ($content) {
    $content = preg_replace('/<(span).*?class="\s*(?:.*\s)?wpcf7-form-control-wrap(?:\s[^"]+)?\s*"[^\>]*>(.*)<\/\1>/i', '\2', $content);

    return $content;
});

//add_action( 'enqueue_block_editor_assets', function() {
//    wp_enqueue_style( 'buss-style-editor-main', get_stylesheet_directory_uri() . "/css/style.css", false, '1.0', 'all' );
//} );

function acf_filter_rest_api_preload_paths($preload_paths)
{
    global $post;
    $rest_path = rest_get_route_for_post($post);
    $remove_paths = array(
        add_query_arg('context', 'edit', $rest_path),
        sprintf('%s/autosaves?context=edit', $rest_path),
    );

    return array_filter(
        $preload_paths,
        function ($url) use ($remove_paths) {
            return !in_array($url, $remove_paths, true);
        }
    );
}

add_filter('block_editor_rest_api_preload_paths', 'acf_filter_rest_api_preload_paths', 10, 1);

function add_to_context($context)
{
    $context['primary_menu'] = new Timber\Menu('Menu Header');
    $context['footer_menu'] = new Timber\Menu('Menu Footer');

    return $context;
}

add_filter('timber/context', 'add_to_context');

if (function_exists('acf_add_options_page')) {

    acf_add_options_page(array(
        'page_title' => 'Theme General Settings',
        'menu_title' => 'Theme Settings',
        'menu_slug' => 'theme-general-settings',
        'capability' => 'edit_posts',
        'redirect' => false
    ));
}