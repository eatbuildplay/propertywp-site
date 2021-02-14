<?php

namespace PropertyWP;
define('ACF_ENGINE_TEXT_DOMAIN', 'propertywp');

if ( ! defined( 'ABSPATH' ) ) {
  exit;
}

class AdminMenu {

  public function __construct() {

    $this->init();

  }

  public function init() {

    add_action('admin_menu', [$this, 'menu']);

    /* highlight ACF Engine main menu */
    add_filter('parent_file', [$this, 'setParentMenu'], 10, 2 );

  }

  public function setParentMenu( $parent_file ) {

    global $submenu_file, $current_screen;

    $cpts = [
      'acfg_post_type',
      'acfg_taxonomy',
      'acfg_options_page',
      'acfg_block_type',
      'acfg_template',
      'acfg_form',
      'acfg_component',
    ];

    if( in_array($current_screen->post_type, $cpts)) {
      $parent_file = 'acf-engine';
    }

    return $parent_file;

  }

  public function menu() {

    \add_menu_page(
     'PropertyWP',
     'PropertyWP',
     'edit_posts',
     ACF_ENGINE_TEXT_DOMAIN,
     [$this, 'pageDashboard'],
     'dashicons-airplane',
     81.987654321
   );

   \add_submenu_page(
     ACF_ENGINE_TEXT_DOMAIN,
     'ACF Engine',
     'Dashboard',
     'edit_posts',
     ACF_ENGINE_TEXT_DOMAIN
   );

   \add_submenu_page(
     ACF_ENGINE_TEXT_DOMAIN,
     'Post Types',
     'Post Types',
     'edit_posts',
     'edit.php?post_type=acfg_post_type'
   );

   \add_submenu_page(
     ACF_ENGINE_TEXT_DOMAIN,
     'Taxonomies',
     'Taxonomies',
     'edit_posts',
     'edit.php?post_type=acfg_taxonomy'
   );

   \add_submenu_page(
     ACF_ENGINE_TEXT_DOMAIN,
     'Templates',
     'Templates',
     'edit_posts',
     'edit.php?post_type=acfg_template'
   );

   \add_submenu_page(
     ACF_ENGINE_TEXT_DOMAIN,
     'Forms',
     'Forms',
     'edit_posts',
     'edit.php?post_type=acfg_form'
   );

   \add_submenu_page(
     ACF_ENGINE_TEXT_DOMAIN,
     'Filters',
     'Filters',
     'edit_posts',
     'edit.php?post_type=acfg_filter'
   );

  }

  public function pageDashboard() {
    //$d = new Dashboard();
    //$d->render();
  }

}
