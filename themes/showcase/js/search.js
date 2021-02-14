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
  var bedroomSelectOptions = [
    {
      value: "0",
      title: "0"
    },
    {
      value: "1",
      title: "1"
    },
    {
      value: "2",
      title: "2"
    },
    {
      value: "3",
      title: "3"
    },
    {
      value: "4",
      title: "4"
    }
  ];

  $("#field-bedrooms").select({
    label: "Bedrooms",
    items: bedroomSelectOptions
  });

  // Bathrooms Field
  var bathroomSelectOptions = [
    {
      value: "1",
      title: "1+"
    },
    {
      value: "2",
      title: "2+"
    },
    {
      value: "3",
      title: "3+"
    },
    {
      value: "4",
      title: "4+"
    }
  ];

  $("#field-bathrooms").select({
    label: "Bathrooms",
    items: bathroomSelectOptions
  });

  // Price Minimum
  let priceMinimumSelectOptions = [
    {
      value: 500,
      title: "500"
    },
    {
      value: 1000,
      title: "1000"
    }
  ];
  $("#field-price-minimum").select( {
      label: "Minimum $",
      items: priceMinimumSelectOptions
  } );

  // Price Maximum
  let priceMaximumSelectOptions = [
    {
      value: 500,
      title: "500"
    },
    {
      value: 1000,
      title: "1000"
    }
  ];
  $("#field-price-maximum").select( {
      label: "Maximum $",
      items: priceMaximumSelectOptions
  } );

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
    items: showcase.propertyTypes
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
    choices: [
      {
        value: 1,
        title: 'Uno'
      }
    ]
  });

}

/*
 * Toggle search type to rent form
 */
function toggleSearchTypeRent() {

  jQuery('#field-move-in-date').show();
  jQuery('#field-property-type').hide();

}
