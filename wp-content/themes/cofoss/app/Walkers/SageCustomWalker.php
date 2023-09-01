<?php

// app/Walkers/SageCustomWalker.php

namespace App\Walkers;

use Walker_Nav_Menu;

class SageCustomWalker extends Walker_Nav_Menu
{
    function start_lvl(&$output, $depth = 0, $args = null)
    {
        // Start of a sub-menu
        $output .= '<ul class="sub-menu" style="">';
    }

    function end_lvl(&$output, $depth = 0, $args = null)
    {
        // End of a sub-menu
        $output .= '</ul>';
    }

    function start_el(&$output, $item, $depth = 0, $args = null, $id = 0)
    {
        // Start of a menu item
        $output .= '<li id="menu-item-' . esc_attr($item->ID) . '" class="' . esc_attr(implode(' ', $item->classes)) . '">';

        // Add a button for sub-menu toggle if item has children
//        if ($args->walker->has_children) {
//            $output .= '<button class="sub-menu-toggle ionicons-before ion-ios-arrow-down" aria-expanded="false" aria-pressed="false"><span class="screen-reader-text">Submenu</span></button>';
//        }

        // Generate the menu item link
        $output .= '<a href="' . esc_url($item->url) . '" itemprop="url" class="sf-with-ul"><span itemprop="name">' . esc_html($item->title) . '</span></a>';
    }

    function end_el(&$output, $item, $depth = 0, $args = null)
    {
        // End of a menu item
        $output .= '</li>';
    }
}
