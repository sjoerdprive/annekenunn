<?php

function menu_item_has_children($menu, $parent_id)
{
  $parent_IDs = array_column($menu, 'menu_item_parent');
  $found_menu_items = array_search($parent_id, $parent_IDs);

  return $found_menu_items;
}

function create_menu($menu_id = '')
{
  $menu = wp_get_nav_menu_items($menu_id);
  $new_menu = array();

  foreach ($menu as $item) {
    // If menu item has children
    if (menu_item_has_children($menu, $item->ID) != false) {
      $new_menu[] = [
        'ID' => url_to_postid($item->url),
        'title' => $item->title,
        'url' => $item->url,
        'children' => []
      ];
      continue;
    }

    // If menu item is a child
    if ($item->menu_item_parent != 0) {
      /** 
       * Children menu items are preceeded by their parent.
       * That means we can safely assume the last menu item is the parent
       */
      $parent = array_key_last($new_menu);
      array_push(
        $new_menu[$parent]['children'],
        [
          'ID' => url_to_postid($item->url),
          'title' => $item->title,
        'url' => $item->url,
        ]
      );
      continue;
    }

    // Just a normal menu item
    $new_menu[] = [
      'ID' => url_to_postid($item->url),
      'title' => $item->title,
        'url' => $item->url,
    ];
  }
  return $new_menu;
}
