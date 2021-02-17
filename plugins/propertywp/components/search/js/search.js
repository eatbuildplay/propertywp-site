/*
 * Search JS Class
 */
class Search {

  formSubmitBlock() {

    jQuery('form').submit( function( e ) {
      e.preventDefault();
    });

  }


}
// end Search class




jQuery(document).ready(function($) {

  /* init search class */
  var search = new Search();
  search.formSubmitBlock();

  /*
   * Append search result element to #content
   */
  var searchResultTemplate = $('#search-result');
  searchResultEl = $( searchResultTemplate.html() );
  searchResultEl.find('h2').html('Search Results');
  searchResultEl.appendTo('#search-results-wrap');

  /*
   * Build search results grid elements
   */
  var searchResultItemTemplate = $('#search-result-item');

  $.each( searchResultItems, function( index, item ) {

    var searchResultItemEl = $( searchResultItemTemplate.html() );
    searchResultItemEl.find('h3').html( item.id );
    searchResultItemEl.find('h4').html( item.address_street );
    searchResultEl.find('section').append( searchResultItemEl );

  });

});
