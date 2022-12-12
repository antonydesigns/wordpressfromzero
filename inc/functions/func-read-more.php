<?php
function cryptoexplainer_excerpt_more($more = '')
{

    if (!is_single()) {
        $more = sprintf(
            '<a class="read-more" href="%1$s">%2$s</a>',
            get_permalink(get_the_ID()),
            __('Read more', 'cryptoexplainer')
        );
    }

    return $more;
}
