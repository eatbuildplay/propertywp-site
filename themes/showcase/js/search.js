jQuery(document).ready(function($) {

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

});


/*
 * Property Type Field Init
 */
function initFieldPropertyType() {

  let propertyTypeSelectOptions = [
    {
      value: 'any',
      title: "Any Property Type"
    },
    {
      value: 'condo',
      title: "Condo"
    },
    {
      value: 'single_family',
      title: "Single Family"
    }
  ];

  jQuery("#field-property-type").select( {
    label: "Property Type",
    items: propertyTypeSelectOptions
  });

}
