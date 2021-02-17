<?php

namespace PropertyWP\Components\Search;

class SearchQuery {

  public function init() {

    // Full Search Query
    add_action('wp_ajax_propertywp_search', [$this, 'fullSearch'] );
    add_action('wp_ajax_nopriv_propertywp_search', [$this, 'fullSearch'] );

    // Count Search Query
    add_action('wp_ajax_propertywp_home_filter_count', [$this, 'propertyHomeFilterCount'] );
    add_action('wp_ajax_nopriv_propertywp_home_filter_count', [$this, 'propertyHomeFilterCount'] );


  }

  public function fullSearch() {

    // get search data
    $searchData = filter_input_array( INPUT_POST );

    // add wpdb
    global $wpdb;
    $this->wpdb = $wpdb;

    // set query
    $this->query = "SELECT id, address_street FROM property WHERE 1=1";

    // run query
    $this->queryResult = $this->wpdb->get_results( $this->query );

    // parse query results into SearchResult object
    $this->parseQueryResult();

    // send response
    $response = new \stdClass();
    $response->search = $this;
    $response->code = 200;
    wp_send_json_success( $response );

  }

  public function parseQueryResult() {

    $this->result = new SearchResult();

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
