<?php

/**
 * Set character count limits
 * on the post title and the excerpt. 
 */
$title_char_limit = 60;
$excerpt_char_limit = 200;

/**
 * Choose which themes (categories) will be featured
 * on the homepage, these articles get prime visibility.
 * Be sure to use capital per word, as that gets displayed 
 * on the homepage as the theme title. 
 */
$user_defined_featured_themes = [
    'Productivity',
    'Health',
    'Emotional Damage'
];

/**
 * Set how many articles will be shown on the homepage
 * per set (i.e. a set can be sorted by theme, latest posts, post type, etc.)
 */
$user_defined_post_count = 3;

/**
 * By default, each featured theme on the homepage will not display
 * posts under a theme that has less than 3 posts.
 * You can override this limit by editing the number below.
 */
$user_defined_posts_per_theme = 3;
