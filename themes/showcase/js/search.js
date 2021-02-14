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

});
