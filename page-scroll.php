<?php

/**
 * Page template
 *
 * @package Aquila
 */
?>

<?php get_header(); ?>

<div class="container">
    <h1 class="mb-4">Loadmore/Infinite Scroll Demo</h1>

    <div class="load-more-content-wrap">
        <div id="load-more-content" class="row">
            <?php

            // Default Argument.
            $args = [
                'post_type'      => 'post',
                'post_status'    => 'publish',
                'posts_per_page' => 2, // Number of posts per page - default
                'paged'          => $page_no,
            ];

            $query = new WP_Query($args);


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
            } else {
                // Return response as zero, when no post found.
                wp_die('0');
            }

            ?>
        </div>
        <button id="load-more" data-page="1" class="">
            <span>Load more posts</span>
        </button>
    </div>

</div>

<?php get_footer(); ?>