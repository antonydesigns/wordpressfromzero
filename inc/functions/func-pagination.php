<?php

/**
 * Aquila Pagination.
 *
 * @return void
 */
function crexp_pagination($add_args = null)
{
    $args = [
        'before_page_number' => '<span class="pagination-number gap">',
        'after_page_number' => '</span>',
    ];

    return paginate_links($args, $add_args);
}
