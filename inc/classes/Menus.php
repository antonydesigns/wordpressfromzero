<?php
/*
Registers the menu

@package CryptoExplainer 
*/

namespace CryptoExplainer\Inc\Classes;

use CryptoExplainer\Inc\Traits\Singleton;

class Menus
{
    use Singleton;

    protected function __construct()
    {

        $this->hooks();
    }

    protected function hooks()
    {
        add_action('init', [$this, 'register_menus']);
    }

    public function register_menus()
    {
        register_nav_menus(
            [
                'cryptoexplainer_header_menu' => esc_html('Header Menu'), // editor view
                'cryptoexplainer_footer_menu' => esc_html('Footer Menu')
            ]
        );
    }

    // menu locations will help get menu id

    public function get_menu_id($location)
    {
        // get all menu locations 
        $locations = get_nav_menu_locations(); // 1 or 2 locations typically

        // get menu id by location
        $menu_id = $locations[$location];


        return !empty($menu_id) ? $menu_id : '';
    }


    public function get_child_menu_items($menu_items, $parent_id)
    {
        // Loop gets activated for each Parent Item with an ID.
        // The loop looks at each item's "menu_item_parent" (id)  
        //      without knowing if it's a child or parent
        // If the item's "menu_item_parent" id matches with current Parent Item ID
        // then that item is the Parent's child items.
        // gets inserted into $child_menu_items array.  

        $child_menu_items = [];

        if (!empty($menu_items) && is_array($menu_items)) {

            foreach ($menu_items as $item) {
                if (intval($item->menu_item_parent) === $parent_id) {
                    array_push($child_menu_items, $item);
                }
            }
        }

        return $child_menu_items;
    }
}
