<?php

/**
 * Front page template
 * @package CryptoExplainer
 */
?>

<?php get_header(); ?>

<!-- Title and intro content -->

<header class="">
    <h1 class=" page-title mid">
        Welcome!
    </h1>
</header>

<main>

    <!-- Latest posts by date -->

    <?php
    $conditions = [
        'post_type' => 'post',
        'post_status' => 'publish'
    ];
    $custom_query = new WP_Query($conditions); ?>

    <div class="latest-posts cols col-mid">
        <?php if ($custom_query->have_posts()) :
            $counter = 0;
        ?>
            <?php while ($custom_query->have_posts() && $counter < $user_defined_post_count) :
                $custom_query->the_post();
                $counter++;
            ?>

                <article class="post-preview gap" id="post-<?php the_ID(); ?>">

                    <!-- Standard Content Listing template -->

                    <?php
                    locate_template('template-parts/content/content-listing.php', true, false, [
                        'title_char_limit' => $title_char_limit,
                        'excerpt_char_limit' => $excerpt_char_limit,
                    ]);
                    ?>
                </article>

            <?php endwhile;
            wp_reset_postdata(); ?>
        <?php endif ?>
    </div>

    <!-- Latest posts by theme (category) -->

    <?php

    $themes = $user_defined_featured_themes;
    $post_count = $user_defined_post_count;
    $posts_per_theme = $user_defined_posts_per_theme;

    foreach ($themes as $theme) :

        $conditions = [
            'post_type' => 'post',
            'post_status' => 'publish',
            'category_name' => $theme
        ];
        $custom_query = new WP_Query($conditions); ?>


        <?php if ($custom_query->have_posts() && $custom_query->found_posts >= $posts_per_theme) :
            $counter = 0; ?>

            <header class="">
                <h1 class="theme-title mid">
                    <?php echo $theme ?>
                </h1>
            </header>

            <div class="by-theme cols col-mid">

                <?php while ($custom_query->have_posts() && $counter < $user_defined_post_count) : ?>

                    <article class="post-preview gap" id="post-<?php the_ID(); ?>">
                        <?php $custom_query->the_post();
                        $counter++; ?>

                        <!-- Standard Content Listing template -->

                        <?php locate_template('template-parts/content/content-listing.php', true, false, [
                            'title_char_limit' => $title_char_limit,
                            'excerpt_char_limit' => $excerpt_char_limit,
                        ]); ?>

                    </article>

                <?php endwhile;
                wp_reset_postdata(); ?>
            <?php endif ?>
            </div>

        <?php endforeach; ?>
</main>


<?php get_footer(); ?>