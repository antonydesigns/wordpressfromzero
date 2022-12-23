<?php

/**
 * Template part - categories & tags
 *
 * To be used inside of WordPress The Loop.
 *
 * @package CryptoExplainer
 */


$the_post_id   = get_the_ID();
$article_category = wp_get_post_terms($the_post_id, ['category']);
if (empty($article_terms) || !is_array($article_terms)) {
    return;
}

?>

<?php
foreach ($article_terms as $key => $article_term) : ?>
    <a class="category-link" href="<?php echo esc_url(get_term_link($article_term)) ?>">
        <?php
        if ($article_term !== end($article_terms)) {
            echo  esc_html($article_term->name) . ','; // Custom Separator 
        } else {
            echo  esc_html($article_term->name);
        }
        ?>
    </a>
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