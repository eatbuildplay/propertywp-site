<?php

namespace PropertyWP\Components\Search;

class Manager {

  public function init() {

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

    $this->result = new SearchResult();

    // add wpdb
    global $wpdb;
    $this->wpdb = $wpdb;

    // set query
    $this->query = "SELECT id, address_street FROM property WHERE 1=1";

    // run query
    $this->queryResult = $this->wpdb->get_results( $this->query );

    $this->parseQueryResult();

    $GLOBALS['search'] = $this;

  }


  public function renderTemplate( $templateName ) {

    require_once( PROPERTYWP_PATH . 'components/search/templates/' . $templateName . '.php');

  }

  public function parseQueryResult() {

    if( !$this->queryResult ) {
      return;
    }

    $items = [];
    foreach( $this->queryResult as $r ) {

      $item = new \stdClass;
      $item->id = $r->id;
      $item->address_street = $r->address_street;
      $items[] = $item;

    }

    $this->result->setItems( $items );

  }


}
