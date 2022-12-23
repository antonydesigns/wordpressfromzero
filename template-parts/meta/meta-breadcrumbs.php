<?php
function cryptoexplainer_breadcrumbs()
{
    global $post;
    echo '<nav aria-label="breadcrumb">';
    echo '<ol class="breadcrumbs" itemscope itemtype="http://schema.org/BreadcrumbList">';
    echo '<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="' . get_bloginfo('url') . '"><span itemprop="name">Home</span></a><meta itemprop="position" content="1" /></li>';
    $categories = wp_get_post_terms($post->ID, 'category', array('orderby' => 'parent', 'order' => 'ASC'));
    if ($categories) {
        $catcount = 2;
        foreach ($categories as $cat) {
            echo '<li class="breadcrumb-list" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="' . get_category_link($cat->term_id) . '"><span itemprop="name">' . $cat->name . '</span></a><meta itemprop="position" content="' . $catcount . '" /></li>';
            $catcount++;
        }
    }


    echo '<li class="breadcrumb-list" aria-current="page">' . get_the_title() . '</li>';
    echo '</ol>';
    echo '</nav>';
}
