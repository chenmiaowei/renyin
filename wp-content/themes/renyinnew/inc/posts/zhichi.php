<?php
/**
 * Created by PhpStorm.
 * User: air
 * Date: 12/07/2017
 * Time: 8:55 PM
 */

/**
 * 添加荣耀管理 post-type
 */
function zhichi_create_post_type()
{

    $args = array(
        'labels' => array(
            'name' => "支持单位",
            'singular_name' => "支持单位",
        ),
        'hierarchical' => false,
        'description' => '支持单位',
        'supports' => array(
            'title', 'editor', 'excerpt', 'thumbnail'
//        , 'comments', 'revisions', 'post-formats', 'custom-fields', 'author'
        ),
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 5,
        'show_in_nav_menus' => true,
        'publicly_queryable' => true,
        'exclude_from_search' => false,
        'query_var' => true,
        'can_export' => true,
        'rewrite' => array('slug' => 'zhichis', 'with_front' => FALSE),
        'public' => true,
        'has_archive' => 'zhichis',
        'capability_type' => 'post'
    );

    register_post_type('wp_zhichis',
        $args
    );
}

add_action('init', 'zhichi_create_post_type');

function zhichi_themes_taxonomy()
{
    register_taxonomy(
        'zhichis_categories',  //The name of the taxonomy. Name should be in slug form (must not contain capital letters or spaces).
        'wp_zhichis',        //post type name
        array(
            'hierarchical' => true,
            'label' => '支持单位分类',  //Display name
            'query_var' => true,
            'rewrite' => array(
                'slug' => 'zhichis_categories', // This controls the base slug that will display before each term
                'with_front' => false // Don't display the category base before
            )
        )
    );
}

add_action('init', 'zhichi_themes_taxonomy');

function zhichis_limit_posts_per_archive_page()
{
    global $wp_query;
    if($wp_query) {
        if (is_tax('zhichis_categories')) {
            $limit = 3;
        } else if ($wp_query) {
            $limit = get_query_var("posts_per_archive_page") ? get_query_var("posts_per_archive_page") : null;
        } else {
            $limit = null;
        }
        set_query_var('posts_per_archive_page', $limit);
    }
}
add_filter('pre_get_posts', 'zhichis_limit_posts_per_archive_page');



add_action( 'init', 'zhichi_create_tag_taxonomies', 0 );

//create two taxonomies, genres and tags for the post type "tag"
function zhichi_create_tag_taxonomies()
{
    // Add new taxonomy, NOT hierarchical (like tags)
    $labels = array(
        'name' => _x( 'Tags', 'taxonomy general name' ),
        'singular_name' => _x( 'Tag', 'taxonomy singular name' ),
        'search_items' =>  __( 'Search Tags' ),
        'popular_items' => __( 'Popular Tags' ),
        'all_items' => __( 'All Tags' ),
        'parent_item' => null,
        'parent_item_colon' => null,
        'edit_item' => __( 'Edit Tag' ),
        'update_item' => __( 'Update Tag' ),
        'add_new_item' => __( 'Add New Tag' ),
        'new_item_name' => __( 'New Tag Name' ),
        'separate_items_with_commas' => __( 'Separate tags with commas' ),
        'add_or_remove_items' => __( 'Add or remove tags' ),
        'choose_from_most_used' => __( 'Choose from the most used tags' ),
        'menu_name' => __( 'Tags' ),
    );

    register_taxonomy('wp_zhichis_tag','wp_zhichis',array(
        'hierarchical' => false,
        'labels' => $labels,
        'show_ui' => true,
        'update_count_callback' => '_update_post_term_count',
        'query_var' => true,
        'rewrite' => array( 'slug' => 'tag' ),
    ));
}


/**
 * Register meta box(es).
 */
function price_register_meta_boxes()
{
    add_meta_box('price-extra', "额外属性", 'price_my_display_callback', 'wp_zhichis');
}

add_action('add_meta_boxes', 'price_register_meta_boxes');
/**
 * Meta box display callback.
 *
 * @param WP_Post $post Current post object.
 */
function price_my_display_callback($post, $meta)
{
    $editor_id = "link";
    $value = wp_specialchars(get_post_meta($post->ID, $editor_id, true), 1);
    echo <<<STR
    <p>
		<label for="second-excerpt">链接</label>
		<br />
		<input name="{$editor_id}" value="{$value}" id="{$editor_id}" style="width: 100%">
	</p>
STR;
}


function save_postdata($postid)
{
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return false;
    if (!current_user_can('edit_page', $postid)) return false;
    if (empty($postid)
//        || $_POST['post_type'] != 'article'
    ) return false;


    foreach (['link'] as $field) {
        if ($_POST['action'] == 'editpost') {
            delete_post_meta($postid, $field);
        }
        add_post_meta($postid, $field, $_POST[$field]);
    }
}

add_action('save_post', 'save_postdata');