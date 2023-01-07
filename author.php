<?php

/**
 * Archive Page template 
 * 
 * Displays posts written by the same author
 *
 * @package CryptoExplainer
 */
get_header();
$author = get_queried_object();
?>

<!-- Title and intro content -->

<header class="">
    <h1 class="author-title mid">
        Articles by
        <?php if (!empty(get_the_author())) {
            echo get_the_author();
        } ?>
    </h1>
</header>


<!-- The list of posts -->


<main class="cols col-mid">
    <?php if (have_posts()) : ?>
        <?php while (have_posts()) : the_post() ?>

            <article class="post-preview gap" id="post-<?php the_ID(); ?>">

                <!-- Content Listing template -->

                <?php get_template_part('template-parts/content/content-listing') ?>

            </article>
        <?php endwhile; ?>
    <?php else : get_template_part('template-parts/content-none') ?>
    <?php endif ?>

</main>

<div class="mid gap pagination">
    <?php
    echo crexp_pagination()
    ?>
</div>


<?php

get_footer();
