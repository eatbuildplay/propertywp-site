jQuery(document).ready(function($) {

  /*
  *  Toggle search form
  */
  $('#field-search-type').on('click', function( e ) {

    var switchBuyRent =  document.getElementById('field-search-type').checked;

    if (switchBuyRent) {
      toggleSearchTypeRent();
    } else {
      toggleSearchTypeBuy();
    }

  });

  // Bedrooms Field
  initFieldBedrooms();

  // Bathrooms Field
  initFieldBathrooms()

  initFieldPriceMinimum();
  initFieldPriceMaximum();

  /* Init property type field */
  initFieldPropertyType();

  /* Move-in Date Field */
  $("#field-move-in-date").select( {
    label: "Move-in Date",
    items: showcase.moveInDates
  });

  /* Areas */
  $("#field-neighborhood").select( {
    label: "Neighborhood",
    items: showcase.areas,
    multiple: true,
    filter: true
  });

});


/*
 * Property Type Field Init
 */
function initFieldPropertyType() {

  jQuery("#field-property-type").select( {
    label: "Property Type",
    items: showcase.searchDefaultPropertyTypes
  });

}

/*
 * Bedrooms Field Init
 */
function initFieldBedrooms() {

  jQuery("#field-bedrooms").select( {
    label: "Bedrooms",
    items: showcase.searchDefaultBedrooms
  });

}

/*
 * Bathrooms Field Init
 */
function initFieldBathrooms() {

  jQuery("#field-bathrooms").select( {
    label: "Bathrooms",
    items: showcase.searchDefaultBathrooms
  });

}

function initFieldPriceMinimum() {

  jQuery("#field-price-minimum").select( {
    label: "Minimum $",
    items: showcase.searchDefaultPriceMinimumBuy
  });

}

function initFieldPriceMaximum() {

  jQuery("#field-price-maximum").select( {
    label: "Maximum $",
    items: showcase.searchDefaultPriceMaximumBuy
  });

}

/*
* Toggle search type to buy form
*/
function toggleSearchTypeBuy() {

  jQuery('#field-move-in-date').hide();
  jQuery('#field-property-type').show();

  jQuery('#field-price-minimum').select({
    action: 'setChoices',
    choices: showcase.searchDefaultPriceMinimumBuy
  });

  jQuery('#field-price-maximum').select({
    action: 'setChoices',
    choices: showcase.searchDefaultPriceMaximumBuy
  });

}

/*
 * Toggle search type to rent form
 */
function toggleSearchTypeRent() {

  jQuery('#field-move-in-date').show();
  jQuery('#field-property-type').hide();

  jQuery('#field-price-minimum').select({
    action: 'setChoices',
    choices: showcase.searchDefaultPriceMinimumRent
  });

  jQuery('#field-price-maximum').select({
    action: 'setChoices',
    choices: showcase.searchDefaultPriceMaximumRent
  });

}
