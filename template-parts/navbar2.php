<?php

use CryptoExplainer\Inc\Classes\Menus;

$menus = Menus::instantiate(); // singleton design
$header_menu_id = $menus->get_menu_id('cryptoexplainer_header_menu');
$header_menu_items = wp_get_nav_menu_items($header_menu_id);

function nav_link_has_child($item, $child_menu_items)
{
    locate_template('template-parts/nav/nav-has-child', true, false, [
        'item' => $item,
        'child_menu_items' => $child_menu_items
    ]);
}

function nav_link_no_child($item)
{
    get_template_part('template-parts/nav/nav-has-child', null, [
        'item' => $item
    ]);
}
?>

<?php if (!empty($header_menu_items) && is_array($header_menu_items)) : ?>
    <nav class="navbar mid b">

        <?php foreach ($header_menu_items as $item) { // Top level

            if (!$item->menu_item_parent) { // if parent-less

                $child_menu_items = $menus->get_child_menu_items($header_menu_items, $item->ID);
                $has_children = !empty($child_menu_items) && is_array($child_menu_items);

                $has_children ? nav_link_has_child($item, $child_menu_items) : nav_link_no_child($item);

                foreach ($child_menu_items as $item) {  // Sub level
                    $child2_menu_items = $menus->get_child_menu_items($child_menu_items, $item->ID);
                    $has_children = !empty($child2_menu_items) && is_array($child2_menu_items);
                    $has_children ? nav_link_has_child($item, $child2_menu_items) : nav_link_no_child($item);

                    foreach ($child_menu_items as $item) {  // Sub level 2
                        $child3_menu_items = $menus->get_child_menu_items($child_menu_items, $item->ID);
                        $has_children = !empty($child3_menu_items) && is_array($child3_menu_items);
                        $has_children ? nav_link_has_child($item, $child3_menu_items) : nav_link_no_child($item);

                        foreach ($child_menu_items as $item) {  // Sub level 3
                            $child4_menu_items = $menus->get_child_menu_items($child_menu_items, $item->ID);
                            $has_children = !empty($child4_menu_items) && is_array($child4_menu_items);
                            $has_children ? nav_link_has_child($item, $child4_menu_items) : nav_link_no_child($item);

                            foreach ($child_menu_items as $item) {  // Sub level 4
                                $child5_menu_items = $menus->get_child_menu_items($child_menu_items, $item->ID);
                                $has_children = !empty($child5_menu_items) && is_array($child5_menu_items);
                                $has_children ? nav_link_has_child($item, $child5_menu_items) : nav_link_no_child($item);
                            }
                        }
                    }
                }
            }
        } ?>

    </nav>
<?php endif ?>