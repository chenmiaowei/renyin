<?php


//$shopbiz_theme_path = get_template_directory() . '/inc';
//
//require($shopbiz_theme_path . '/custom/md-custom-navwalker.php');
//require($shopbiz_theme_path . '/customize/ma_customize_homepage.php');

function qjwh_theme_name_scripts()
{

    // Theme stylesheet.
    wp_enqueue_style('qjwh-style', get_stylesheet_uri());

    wp_enqueue_style('style', get_template_directory_uri() . '/resources/css/style.css');
    wp_enqueue_style('goodnav', get_template_directory_uri() . '/resources/css/goodnav.css');
    wp_enqueue_style('lrtk', get_template_directory_uri() . '/resources/css/lrtk.css');

    wp_enqueue_script('litenav', get_template_directory_uri() . '/resources/js/jquery.litenav.js', array('jquery'), time(), false);
    wp_enqueue_script('koala', get_template_directory_uri() . '/resources/js/koala.min.1.5.js', array('jquery'), time(), false);
    $script_data = array(
        'image_path' => get_template_directory_uri() . '/images/'
    );
    wp_localize_script(
        'my_custom',
        'wpa_data',
        $script_data
    );
}


add_action('wp_enqueue_scripts', 'qjwh_theme_name_scripts');

function twentythirteen_wp_title($title, $sep)
{
    global $paged, $page;

    if (is_feed())
        return $title;

    // Add the site name.
    $title .= get_bloginfo('name', 'display');

    // Add the site description for the home/front page.
    $site_description = get_bloginfo('description', 'display');
    if ($site_description && (is_home() || is_front_page()))
        $title = "$title $sep $site_description";

    // Add a page number if necessary.
    if (($paged >= 2 || $page >= 2) && !is_404())
        $title = "$title $sep " . sprintf(__('Page %s', 'twentythirteen'), max($paged, $page));

    return $title;
}

add_filter('wp_title', 'twentythirteen_wp_title', 10, 2);


// This theme uses wp_nav_menu() in one location.
register_nav_menus(array(
    'top' => __('Top Right menu', 'shopbiz'),
    'primary' => __('Primary menu', 'shopbiz'),
    'footer' => __('Footer Menu', 'shopbiz'),
));


/*
 * Let WordPress manage the document title.
 * By adding theme support, we declare that this theme does not use a
 * hard-coded <title> tag in the document head, and expect WordPress to
 * provide it for us.
 */
add_theme_support('title-tag');
add_theme_support('post-thumbnails');

add_image_size('sli_thumbnail', 141, null, array('left', 'top'));
add_image_size('tou_thumbnail', 80, 100, array('left', 'top'));
add_image_size('meiti_thumbnail', 124, null, array('left', 'top'));


/**
 * Filter the except length to 20 words.
 *
 * @param int $length Excerpt length.
 * @return int (Maybe) modified excerpt length.
 */
function wpdocs_custom_excerpt_length($length)
{
    return 600;
}

add_filter('excerpt_length', 'wpdocs_custom_excerpt_length', 999);

require_once __DIR__ . "/inc/posts/xieban.php";
require_once __DIR__ . "/inc/posts/xueshu.php";
require_once __DIR__ . "/inc/posts/zhichi.php";
require_once __DIR__ . "/inc/posts/zhuban.php";
require_once __DIR__ . "/inc/posts/meiti.php";
require_once __DIR__ . "/inc/posts/zhichi.php";


function my_skip_mail($f)
{
    return true; // DO NOT SEND E-MAIL
}

add_filter('wpcf7_skip_mail', 'my_skip_mail');