<?php

/**
 * Page template
 *
 * @package Aquila
 */
?>

<?php get_header(); ?>

<div class="container">
    <h1 class="mb-4">Loadmore demo</h1>

    <div class="load-more-content-wrap">
        <div id="load-more-content" class="row">
            <?php


            // $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
            // echo $paged;
            $query = new WP_Query([
                'post_type'      => 'post',
                'post_status'    => 'publish'
                // 'posts_per_page' => 2
                // 'paged' => $paged
            ]);

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
                wp_reset_postdata();
            } else {
                // Return response as zero, when no post found.
                wp_die('0');
            }
            ?>
        </div>
        <div class="pagination mid gap"> <?php echo crexp_pagination() ?> </div>

        <button id="load-more" data-page="1" class="">
            <span>Load more posts</span>
        </button>
    </div>

</div>

<?php get_footer(); ?>