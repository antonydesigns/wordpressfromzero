<?php

/**
 * Template part for entry meta
 *
 * @package CryptoExplainer
 */

$post_date = cryptoexplainer_post_time();
$updated_datetime_attr = $post_date['updated_datetime_attr'];
$updated_datetime_val = $post_date['updated_datetime_val'];
?>

<div class="updated">
    <time datetime="<?php echo $updated_datetime_attr ?>"><?php echo $updated_datetime_val ?></time>
</div>