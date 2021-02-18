<?php

namespace PropertyWP\Components\Map;

class Manager {

  public function init() {

    //require_once( PROPERTYWP_PATH . 'components/map/inc/.php');
    //require_once( PROPERTYWP_PATH . 'components/map/inc/.php');

    // enqueue scripts
    add_action('wp_enqueue_scripts', function() {

      wp_enqueue_script(
        'propertywp-component-map',
        PROPERTYWP_URL . '/components/map/js/map.js',
        ['jquery'],
        time(),
        true
      );

    });

    $GLOBALS['map'] = $this;

  }

  public function renderTemplate( $templateName ) {

    require_once( PROPERTYWP_PATH . 'components/map/templates/' . $templateName . '.php');
  }

}
