<?php

/**
 * The Search Bar
 * 
 * @package CryptoExplainer
 */

if (is_search()) {
    $placeholder = 'Search again';
} else {
    $placeholder = 'Enter keywords';
}

?>

<form action="<?php echo esc_url(home_url('/')) ?>
" class="txt-mid">
    <input id="searchform" type="search" placeholder="<?php echo $placeholder ?>" value="<?php the_search_query() ?>" aria-label="search" name="s" onClick="formname.reset();">
    <input type="submit" value="Search" class="button gap">
</form>