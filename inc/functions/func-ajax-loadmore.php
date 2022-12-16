<?php

add_action('wp_ajax_load_more', 'load_more');
add_action('wp_ajax_nopriv_load_more', 'load_more');


function load_more()
{

    // Check if it's an ajax call.
    $is_ajax_request = isset($_POST['page']);
    /**
     * Page number.
     * If get_query_var( 'paged' ) is 2 or more, its a number pagination query.
     * If $_POST['page'] has a value which means its a loadmore request, which will take precedence.
     */
    $page_no = get_query_var('paged') ? get_query_var('paged') : 1;
    $page_no = !empty($_POST['page']) ? filter_var($_POST['page'], FILTER_VALIDATE_INT) + 1 : $page_no;

    // Default Argument.
    $args = [
        'post_type'      => 'post',
        'post_status'    => 'publish',
        'posts_per_page' => 2, // Number of posts per page - default
        'paged'          => $page_no,
    ];

    $query = new WP_Query($args);;

    if ($query->have_posts()) {

        require(get_template_directory() . "./inc/functions/a-user-defined-vars.php");


        // Loop Posts.
        while ($query->have_posts()) {
            $query->the_post();
            locate_template('template-parts/content/content-listing.php', true, false, [
                'title_char_limit' => $title_char_limit,
                'excerpt_char_limit' => $excerpt_char_limit,
            ]);
        }

        // Pagination for Google.
        if (!$is_ajax_request) {
            $total_pages = $query->max_num_pages;
            get_template_part('template-parts/pagination', null, [
                'total_pages'  => $total_pages,
                'current_page' => $page_no,
            ]);
        }
    } else {
        // Return response as zero, when no post found.
        wp_die('0');
    }

    wp_reset_postdata();


    if ($is_ajax_request && !$initial_request) {
        wp_die();
    }
}
