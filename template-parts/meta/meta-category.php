<?php

/**
 * Template part - categories & tags
 *
 * To be used inside of WordPress The Loop.
 *
 * @package CryptoExplainer
 */


$the_post_id   = get_the_ID();
$post_category = wp_get_post_terms($the_post_id, 'category', array('orderby' => 'parent', 'order' => 'ASC'));
if (empty($post_category) || !is_array($post_category)) {
    return;
}

echo '<!-- DEBUG -->';
echo '<pre>';
print_r($post_category);
echo  '</pre>';

$count = 0;

foreach ($post_category as $post_cat) :
    $count++; ?>
    <a class="category-link" href="<?php echo esc_url(get_term_link($post_cat)) ?>">
        <?php echo esc_html($post_cat->name); ?>
    </a>
    <?php if ($count < count($post_category)) {
        echo '>';
    } ?>
<?php endforeach

// DEBUG MODE: Check the properties in WP_Term Object array
// Click on each post to preview WP_Term Object array

/* function check_article_terms()
{
    $the_post_id   = get_the_ID();
    $article_terms = wp_get_post_terms($the_post_id, ['category', 'post_tag']);
    echo '<pre>';
    print_r($article_terms);
    wp_die();
} */

// check_article_terms();
?>