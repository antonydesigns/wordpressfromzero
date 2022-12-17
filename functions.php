<?php
/* 
Theme functions

@package CryptoExplainer
*/

// Theme classes and autoloader

require_once(get_template_directory() . "./inc/helpers/autoloader.php");

use CryptoExplainer\Inc\Classes as Classes;

function instantiate_theme()
{
    Classes\ThemeControl::instantiate();
}
instantiate_theme();

// Functions

require_once(get_template_directory() . "./inc/functions/a-user-defined-vars.php");
require_once(get_template_directory() . "./inc/functions/func-author.php");
require_once(get_template_directory() . "./inc/functions/func-post-time.php");
require_once(get_template_directory() . "./inc/functions/func-post-title.php");
require_once(get_template_directory() . "./inc/functions/func-post-excerpt.php");
require_once(get_template_directory() . "./inc/functions/func-pagination.php");
require_once(get_template_directory() . "./inc/functions/func-search-exclude.php");

add_action('wp_ajax_php_ajax_function', 'php_ajax_function');
add_action('wp_ajax_nopriv_php_ajax_function', 'php_ajax_function');


function php_ajax_function()
{
    if (isset($_REQUEST)) {
        $name = strtolower($_REQUEST['name']);
        switch ($name) {
            case 'ursula';
                echo ucfirst($name) . " is cute!";
                break;
            case 'gio';
                echo ucfirst($name) . " is smart.";
                break;
            case 'marco';
                echo ucfirst($name) . " is creative.";
                break;
            case 'anton';
                echo ucfirst($name) . " is pecicilan.";
                break;
        }
    }

    die();
}

add_action('wp_ajax_loadmore', 'loadmore');
add_action('wp_ajax_nopriv_loadmore', 'loadmore');

function loadmore()
{

    // $page_no = get_query_var('paged') ? get_query_var('paged') : 1;
    $page_no = $_REQUEST['page'];


    $args = [
        'post_type'      => 'post',
        'post_status'    => 'publish',
        'posts_per_page' => 1,
        'paged'          => $page_no,
    ];

    $query = new WP_Query($args);

    if ($query->have_posts()) {

        // require(get_template_directory() . "./inc/functions/a-user-defined-vars.php");


        // Loop Posts.
        while ($query->have_posts()) {
            $query->the_post();
            the_title();
            /* locate_template('template-parts/content/content-listing.php', true, false, [
                //'title_char_limit' => $title_char_limit,
                //'excerpt_char_limit' => $excerpt_char_limit,
            ]); */
        }

        // Pagination for Google.
        /* if (!$is_ajax_request) {
            $total_pages = $query->max_num_pages;
            get_template_part('template-parts/pagination', null, [
                'total_pages'  => $total_pages,
                'current_page' => $page_no,
            ]);
        } */
    }

    wp_reset_postdata();
}

add_action('wp_ajax_loadmore2', 'loadmore2');
add_action('wp_ajax_nopriv_loadmore2', 'loadmore2');

function loadmore2()
{
    $page_no = $_REQUEST['page'];


    $conditions = [
        'post_type'      => 'post',
        'post_status'    => 'publish',
        'posts_per_page' => 1,
        'paged'          => $page_no,
    ];

    $custom_query = new WP_Query($conditions);

    if ($custom_query->have_posts()) {
        while ($custom_query->have_posts()) {
            $custom_query->the_post();
        }
        wp_reset_postdata();
    }
}
