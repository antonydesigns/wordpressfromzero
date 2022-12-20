<?php

add_action('wp_ajax_loadmore', 'loadmore');
add_action('wp_ajax_nopriv_loadmore', 'loadmore');


function loadmore()
{

    if (!check_ajax_referer('loadmore_nonce', 'ajaxnonce', false)) {
        wp_send_json_error(__('Invalid security token sent.', 'text-domain'));
        wp_die('0', 400);
    }

    // $page_no = get_query_var('paged') ? get_query_var('paged') : 1;

    $paged = $_POST['page'] + 1;

    $args = [
        'post_type'      => 'post',
        'post_status'    => 'publish',
        'posts_per_page' => 3,
        'paged'          => $paged,
    ];

    $query = new WP_Query($args);

    if ($query->have_posts()) :

        require(get_template_directory() . "./inc/functions/a-user-defined-vars.php");


        // Loop Posts.
        while ($query->have_posts()) :
            $query->the_post() ?>

            <article class="post-preview gap">

                <?php
                locate_template('template-parts/content/content-listing.php', true, false, [
                    'title_char_limit' => $title_char_limit,
                    'excerpt_char_limit' => $excerpt_char_limit,
                ]); ?>

            </article>
<?php
        endwhile;
        wp_reset_postdata();

        // Pagination for Google.
        if (!$is_ajax_request) {
            /* get_template_part('template-parts/pagination', null, [
                'total_pages'  => $total_pages,
                'current_page' => $page_no,
            ]); */
        } else wp_die();
    endif;
    wp_die();
}
