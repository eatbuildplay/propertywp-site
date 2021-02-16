<?php

namespace PropertyWP\Components\Search;

class SearchResult {

  private $items = [];

  public function setItems( $items ) {
    $this->items = $items;
  }

  public function getItems() {
    return $this->items;
  }

  public function getItemsJson() {
    return json_encode( $this->items );
  }

}
