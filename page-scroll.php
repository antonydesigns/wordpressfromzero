<!-- A TEST PAGE FOR SCROLLING -->

<?php get_header(); ?>

<main>
    <div class="cols col-mid">

        <div id="ajax-posts">
            <?php
            $postsPerPage = 3;
            $args = array(
                'post_type' => 'post',
                'posts_per_page' => $postsPerPage,
            );

            $loop = new WP_Query($args);

            while ($loop->have_posts()) : $loop->the_post();
            ?>

                <?php
                locate_template('template-parts/content/content-listing.php', true, false, [
                    'title_char_limit' => $title_char_limit,
                    'excerpt_char_limit' => $excerpt_char_limit,
                ]);
                ?>

            <?php
            endwhile;
            wp_reset_postdata();
            ?>
            <div id="more_posts">Load More</div>
        </div>

    </div>
</main>

<?php get_footer(); ?>