<?php

/**
 * Template part for published date
 *
 * @package CryptoExplainer
 */

$post_date = cryptoexplainer_post_time();
$datetime_attr = $post_date['datetime_attr'];
$datetime_val = $post_date['datetime_val'];
$date_archive_permalink = $post_date['date_archive_permalink'];
?>

<a href="<?php echo $date_archive_permalink ?>" class="published">
    <time class="posted-on" datetime="<?php echo $datetime_attr ?>"><?php echo $datetime_val ?></time>
</a>