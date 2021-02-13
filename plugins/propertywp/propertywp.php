<?php

/**
 *
 * Plugin Name: PropertyWP
 * Plugin URI: https://eatbuildplay.com/plugins/propertywp/
 * Description: the most powerful real estate plugin for WordPress.
 * Version: 1.0.0
 * Author: Eat/Build/Play
 * Author URI: https://eatbuildplay.com/
 * License: GPL3
 * License URI: https://www.gnu.org/licenses/gpl-3.0.html
 *
 */

namespace PropertyWP;

define( 'PROPERTYWP_PATH', plugin_dir_path( __FILE__ ) );
define( 'PROPERTYWP_URL', plugin_dir_url( __FILE__ ) );
define( 'PROPERTYWP_VERSION', '1.0.0' );

/**
 ** Make a singleton so each run has one instance
 ** Singleton creates 1 post
 **/

class Plugin {

  public function __construct() {


  }

}

new Plugin();
