<?php

use App\Models\Menu;

function init_menu($parent = 0)
{
    $menus =  Menu::where('parent_id', $parent)->get();
    foreach ($menus as  $menu) {
        $hasChild = Menu::where('parent_id', $menu->id)->count();
        $menuHtml = '<li>
                    <a href="' . $menu->url . '">' . $menu->name . ' ' . ($hasChild ? '<span class="fe fe-chevron-down"></span>' : '') . '</a>' .
                     ($hasChild ? '<ul class="sub-menu"></ul>' : '') .
        '</li>';
        echo  $menuHtml;
    }
}
