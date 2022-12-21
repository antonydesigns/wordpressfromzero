<?php
// NAV ITEM HAS CHILD ITEMS

$x = wp_parse_args(
    $args,
    [
        'item' => "",
        'child_menu_items' => ""
    ]
);

echo $x['child_menu_items'];

?>

<div><a href=""><?php $x['item']['title'] ?></a>
    <?php foreach ($x['child_menu_items'] as $child_item) : ?>
        <a href=""><?php $child_item->title ?></a>
    <?php endforeach ?>
</div>