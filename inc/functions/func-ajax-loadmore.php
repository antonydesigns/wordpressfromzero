<?php

add_action('wp_ajax_loadmore', 'loadmore');
add_action('wp_ajax_nopriv_loadmore', 'loadmore');

function loadmore()
{
    $is_ajax_request = isset($_POST['page']);


    if (!$is_ajax_request && !check_ajax_referer('loadmore_nonce', 'ajaxnonce', false)) {
        wp_send_json_error(__('Invalid security token sent.', 'text-domain'));
        wp_die('0', 400);
    }

    // Ajax request activated

    $paged = $_POST['page'] + 1;

    $args = [
        'post_type'      => 'post',
        'post_status'    => 'publish',
        'posts_per_page' => get_option('posts_per_page'),
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
    endif;
    wp_die();
}
