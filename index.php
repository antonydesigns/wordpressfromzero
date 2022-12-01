<?php
/* 
Main template file

@package CryptoExplainer
*/
?>

<div class="gap">

    <div>
        <?php get_header(); ?>
    </div>

    <div class="global-container b invis">
        <?php if (have_posts()) :
        ?>
            <div class="content">
                <?php while (have_posts()) :
                ?>
                    <?php
                    the_post();
                    ?>
                <?php endwhile;
                ?>
            </div>
        <?php else : get_template_part('template-parts/content-none')
        ?>
        <?php endif
        ?>
    </div>

    <div>
        <?php get_footer(); ?>
    </div>

</div>