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
        'post_status' => 'publish',
        'posts_per_page' => 6
    ];
    $custom_query = new WP_Query($conditions); ?>

    <div class="latest-posts cols col-mid">
        <?php if ($custom_query->have_posts()) :
        ?>
            <?php while ($custom_query->have_posts()) :
                $custom_query->the_post();
            ?>

                <article class="post-preview gap" id="post-<?php the_ID(); ?>">

                    <!-- Standard Content Listing template -->

                    <?php get_template_part('template-parts/content/content-listing'); ?>

                </article>

            <?php endwhile;
            wp_reset_postdata(); ?>
        <?php endif ?>
    </div>

    <!-- Latest posts by theme (category) -->

    <?php

    $themes = $user_defined_featured_themes;
    $posts_per_theme = $user_defined_posts_per_theme;

    foreach ($themes as $theme) :

        $conditions = [
            'post_type' => 'post',
            'post_status' => 'publish',
            'category_name' => $theme,
            'posts_per_page' => 6
        ];
        $custom_query = new WP_Query($conditions); ?>


        <?php if ($custom_query->have_posts() && $custom_query->found_posts >= $posts_per_theme) : ?>

            <header class="">
                <h1 class="theme-title mid">
                    <?php echo $theme ?>
                </h1>
            </header>

            <div class="by-theme cols col-mid">

                <?php while ($custom_query->have_posts()) : ?>

                    <article class="post-preview gap" id="post-<?php the_ID(); ?>">
                        <?php $custom_query->the_post(); ?>

                        <!-- Standard Content Listing template -->

                        <?php get_template_part('template-parts/content/content-listing'); ?>


                    </article>

                <?php endwhile;
                wp_reset_postdata(); ?>
            <?php endif ?>
            </div>

        <?php endforeach; ?>
</main>


<?php get_footer(); ?>