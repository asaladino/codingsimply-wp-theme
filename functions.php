<?php
/** *
 * @package CodingSimply
 * @subpackage Coding_Simply
 * @since Coding Simply 1.0
 */

/**
 * Production URL
 */
function prefix_production_url($url)
{
    return 'https://codingsimply.com';
}

add_filter('be_media_from_production_url', 'prefix_production_url');


/**
 * Set the content width based on the theme's design and stylesheet.
 *
 * @since Coding Simply 1.0
 */
if (!isset($content_width)) {
    $content_width = 660;
}

/**
 * Coding Simply only works in CodingSimply 4.1 or later.
 */
if (version_compare($GLOBALS['wp_version'], '4.1-alpha', '<')) {
    require get_template_directory() . '/inc/back-compat.php';
}

if (!function_exists('codingsimply_setup')) :
    /**
     * Sets up theme defaults and registers support for various CodingSimply features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     *
     * @since Coding Simply 1.0
     */
    function codingsimply_setup()
    {

        /*
         * Make theme available for translation.
         * Translations can be filed at CodingSimply.org. See: https://translate.CodingSimply.org/projects/wp-themes/codingsimply
         * If you're building a theme based on codingsimply, use a find and replace
         * to change 'codingsimply' to the name of your theme in all the template files
         */
        load_theme_textdomain('codingsimply');

        // Add default posts and comments RSS feed links to head.
        add_theme_support('automatic-feed-links');

        /*
         * Let CodingSimply manage the document title.
         * By adding theme support, we declare that this theme does not use a
         * hard-coded <title> tag in the document head, and expect CodingSimply to
         * provide it for us.
         */
        add_theme_support('title-tag');

        /*
         * Enable support for Post Thumbnails on posts and pages.
         *
         * See: https://codex.CodingSimply.org/Function_Reference/add_theme_support#Post_Thumbnails
         */
        add_theme_support('post-thumbnails');
        set_post_thumbnail_size(825, 510, true);

        // This theme uses wp_nav_menu() in two locations.
        register_nav_menus(array(
            'primary' => __('Primary Menu', 'codingsimply'),
            'social' => __('Social Links Menu', 'codingsimply'),
        ));

        /*
         * Switch default core markup for search form, comment form, and comments
         * to output valid HTML5.
         */
        add_theme_support('html5', array(
            'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
        ));

        /*
         * Enable support for Post Formats.
         *
         * See: https://codex.CodingSimply.org/Post_Formats
         */
        add_theme_support('post-formats', array(
            'aside', 'image', 'video', 'quote', 'link', 'gallery', 'status', 'audio', 'chat'
        ));

        /*
         * Enable support for custom logo.
         *
         * @since Coding Simply 1.5
         */
        add_theme_support('custom-logo', array(
            'height' => 248,
            'width' => 248,
            'flex-height' => true,
        ));

        $color_scheme = codingsimply_get_color_scheme();
        $default_color = trim($color_scheme[0], '#');

        // Setup the CodingSimply core custom background feature.
        add_theme_support('custom-background', apply_filters('codingsimply_custom_background_args', array(
            'default-color' => $default_color,
            'default-attachment' => 'fixed',
        )));

        /*
         * This theme styles the visual editor to resemble the theme style,
         * specifically font, colors, icons, and column width.
         */
        add_editor_style(array('css/editor-style.css', 'genericons/genericons.css', codingsimply_fonts_url()));

        // Indicate widget sidebars can use selective refresh in the Customizer.
        add_theme_support('customize-selective-refresh-widgets');
    }
endif; // codingsimply_setup
add_action('after_setup_theme', 'codingsimply_setup');

/**
 * Register widget area.
 *
 * @since Coding Simply 1.0
 *
 * @link https://codex.CodingSimply.org/Function_Reference/register_sidebar
 */
function codingsimply_widgets_init()
{
    register_sidebar(array(
        'name' => __('Widget Area', 'codingsimply'),
        'id' => 'sidebar-1',
        'description' => __('Add widgets here to appear in your sidebar.', 'codingsimply'),
        'before_widget' => '<div class="large-6 columns"><aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside></div>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ));
}

add_action('widgets_init', 'codingsimply_widgets_init');

if (!function_exists('codingsimply_fonts_url')) :
    /**
     * Register Google fonts for Coding Simply.
     *
     * @since Coding Simply 1.0
     *
     * @return string Google fonts URL for the theme.
     */
    function codingsimply_fonts_url()
    {
        $fonts_url = '';
        $fonts = array();
        $subsets = 'latin,latin-ext';

        /*
         * Translators: If there are characters in your language that are not supported
         * by Noto Sans, translate this to 'off'. Do not translate into your own language.
         */
        if ('off' !== _x('on', 'Noto Sans font: on or off', 'codingsimply')) {
            $fonts[] = 'Noto Sans:400italic,700italic,400,700';
        }

        /*
         * Translators: If there are characters in your language that are not supported
         * by Noto Serif, translate this to 'off'. Do not translate into your own language.
         */
        if ('off' !== _x('on', 'Noto Serif font: on or off', 'codingsimply')) {
            $fonts[] = 'Noto Serif:400italic,700italic,400,700';
        }

        /*
         * Translators: If there are characters in your language that are not supported
         * by Inconsolata, translate this to 'off'. Do not translate into your own language.
         */
        if ('off' !== _x('on', 'Inconsolata font: on or off', 'codingsimply')) {
            $fonts[] = 'Inconsolata:400,700';
        }

        /*
         * Translators: To add an additional character subset specific to your language,
         * translate this to 'greek', 'cyrillic', 'devanagari' or 'vietnamese'. Do not translate into your own language.
         */
        $subset = _x('no-subset', 'Add new subset (greek, cyrillic, devanagari, vietnamese)', 'codingsimply');

        if ('cyrillic' == $subset) {
            $subsets .= ',cyrillic,cyrillic-ext';
        } elseif ('greek' == $subset) {
            $subsets .= ',greek,greek-ext';
        } elseif ('devanagari' == $subset) {
            $subsets .= ',devanagari';
        } elseif ('vietnamese' == $subset) {
            $subsets .= ',vietnamese';
        }

        if ($fonts) {
            $fonts_url = add_query_arg(array(
                'family' => urlencode(implode('|', $fonts)),
                'subset' => urlencode($subsets),
            ), 'https://fonts.googleapis.com/css');
        }

        return $fonts_url;
    }
endif;

/**
 * JavaScript Detection.
 *
 * Adds a `js` class to the root `<html>` element when JavaScript is detected.
 *
 * @since Coding Simply 1.1
 */
function codingsimply_javascript_detection()
{
    echo "<script>(function(html){html.className = html.className.replace(/\bno-js\b/,'js')})(document.documentElement);</script>\n";
}

add_action('wp_head', 'codingsimply_javascript_detection', 0);

/**
 * Enqueue scripts and styles.
 *
 * @since Coding Simply 1.0
 */
function codingsimply_scripts()
{
    // Add custom fonts, used in the main stylesheet.
    wp_enqueue_style('codingsimply-fonts', codingsimply_fonts_url(), [], null);

    // Load our main stylesheet.
    wp_enqueue_style('codingsimply-style', get_stylesheet_uri(), [], '6.4.1');

    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }

    wp_deregister_script('jquery');
    wp_register_script('jquery', get_template_directory_uri() . '/js/libs/jquery.min.js', false, '3.1.1');
    wp_enqueue_script('codingsimply-foundation', get_template_directory_uri() . '/js/libs/foundation.min.js', ['jquery'], '6.4.1', true);
    wp_enqueue_script('codingsimply-script', get_template_directory_uri() . '/js/functions.js', array('jquery'), '20150330', true);
    wp_localize_script('codingsimply-script', 'screenReaderText', array(
        'expand' => '<span class="screen-reader-text">' . __('expand child menu', 'codingsimply') . '</span>',
        'collapse' => '<span class="screen-reader-text">' . __('collapse child menu', 'codingsimply') . '</span>',
    ));
}

add_action('wp_enqueue_scripts', 'codingsimply_scripts');

/**
 * Add featured image as background image to post navigation elements.
 *
 * @since Coding Simply 1.0
 *
 * @see wp_add_inline_style()
 */
function codingsimply_post_nav_background()
{
    if (!is_single()) {
        return;
    }

    $previous = (is_attachment()) ? get_post(get_post()->post_parent) : get_adjacent_post(false, '', true);
    $next = get_adjacent_post(false, '', false);
    $css = '';

    if (is_attachment() && 'attachment' == $previous->post_type) {
        return;
    }

    if ($previous && has_post_thumbnail($previous->ID)) {
        $prevthumb = wp_get_attachment_image_src(get_post_thumbnail_id($previous->ID), 'post-thumbnail');
        $css .= '
			.post-navigation .nav-previous { background-image: url(' . esc_url($prevthumb[0]) . '); }
			.post-navigation .nav-previous .post-title, .post-navigation .nav-previous a:hover .post-title, .post-navigation .nav-previous .meta-nav { color: #fff; }
			.post-navigation .nav-previous a:before { background-color: rgba(0, 0, 0, 0.4); }
		';
    }

    if ($next && has_post_thumbnail($next->ID)) {
        $nextthumb = wp_get_attachment_image_src(get_post_thumbnail_id($next->ID), 'post-thumbnail');
        $css .= '
			.post-navigation .nav-next { background-image: url(' . esc_url($nextthumb[0]) . '); border-top: 0; }
			.post-navigation .nav-next .post-title, .post-navigation .nav-next a:hover .post-title, .post-navigation .nav-next .meta-nav { color: #fff; }
			.post-navigation .nav-next a:before { background-color: rgba(0, 0, 0, 0.4); }
		';
    }

    wp_add_inline_style('codingsimply-style', $css);
}

add_action('wp_enqueue_scripts', 'codingsimply_post_nav_background');

/**
 * Display descriptions in main navigation.
 *
 * @since Coding Simply 1.0
 *
 * @param string $item_output The menu item output.
 * @param WP_Post $item Menu item object.
 * @param int $depth Depth of the menu.
 * @param array $args wp_nav_menu() arguments.
 * @return string Menu item with possible description.
 */
function codingsimply_nav_description($item_output, $item, $depth, $args)
{
    if ('primary' == $args->theme_location && $item->description) {
        $item_output = str_replace($args->link_after . '</a>', '<div class="menu-item-description">' . $item->description . '</div>' . $args->link_after . '</a>', $item_output);
    }

    return $item_output;
}

add_filter('walker_nav_menu_start_el', 'codingsimply_nav_description', 10, 4);

/**
 * Add a `screen-reader-text` class to the search form's submit button.
 *
 * @since Coding Simply 1.0
 *
 * @param string $html Search form HTML.
 * @return string Modified search form HTML.
 */
function codingsimply_search_form_modify($html)
{
    return '<form action="/" type="GET">
                <div class="input-group">
                    <input class="input-group-field"
                           type="text"
                           name="s"
                           placeholder="term..."
                           value="' . (isset($_GET['s']) ? $_GET['s'] : '') . '">
                    <div class="input-group-button">
                        <input type="submit" class="button" value="Search">
                    </div>
                </div></form>';
}

add_filter('get_search_form', 'codingsimply_search_form_modify');

/**
 * Implement the Custom Header feature.
 *
 * @since Coding Simply 1.0
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 *
 * @since Coding Simply 1.0
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Customizer additions.
 *
 * @since Coding Simply 1.0
 */
require get_template_directory() . '/inc/customizer.php';
