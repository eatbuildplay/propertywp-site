<?php

namespace PropertyWP\Components\Search;

class Manager {

  public function init() {

    require_once( PROPERTYWP_PATH . 'components/search/inc/SearchQuery.php');
    require_once( PROPERTYWP_PATH . 'components/search/inc/SearchResult.php');

    // enqueue scripts
    add_action('wp_enqueue_scripts', function() {

      wp_enqueue_script(
        'propertywp-component-search',
        PROPERTYWP_URL . '/components/search/js/search.js',
        ['jquery'],
        time(),
        true
      );

    });

    $GLOBALS['search'] = $this;

  }

  public function renderTemplate( $templateName ) {

    require_once( PROPERTYWP_PATH . 'components/search/templates/' . $templateName . '.php');
  }

}
