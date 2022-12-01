<?php

use CryptoExplainer\Inc\Classes\Menus;

$menus = Menus::instantiate(); // singleton design
$header_menu_id = $menus->get_menu_id('cryptoexplainer_header_menu');
$header_menu_items = wp_get_nav_menu_items($header_menu_id); // returns array

?>

<!-- 
    Navbar is divided into three (or more) levels (parent > child > grandchild).
    Reuse the loop where necessary.
 -->

<?php if (!empty($header_menu_items) && is_array($header_menu_items)) :  // if empty, doesn't print out anything
?>

    <nav class="navbar mid b">

        <?php foreach ($header_menu_items as $item) : ?>
            <?php if (!$item->menu_item_parent) :  // Filter for all PARENT ITEMS 

                // TODO: When parent, then list down its child items
                // HOW: using the current parent's id ($item->ID)
                // and matching the $item->ID with the $item->menu_item_parent

                $child_menu_items = $menus->get_child_menu_items($header_menu_items, $item->ID);
                $has_children = !empty($child_menu_items) && is_array($child_menu_items); ?>

                <?php if (!$has_children) : // a childless menu item a.k.a. "normal"
                ?>

                    <div class="normal txt-mid"><a href="<?php echo $item->url ?>"><?php echo $item->title ?></a></div>

                <?php else :                // if it's a parent menu item, echo parent then child.
                ?>

                    <div class="parent txt-mid"> <a href="<?php echo $item->url ?>"><?php echo $item->title ?></a>

                        <?php foreach ($child_menu_items as $child_item) : ?>

                            <div class="child txt-mid"> <a href="<?php echo $child_item->url ?>"><?php echo $child_item->title ?></a></div>

                        <?php endforeach ?>

                    </div>
                <?php endif ?>
            <?php endif ?>
        <?php endforeach ?>
    <?php endif ?>

    </nav>