<!-- Property Search -->
<div class="container-fluid" id="property-search-wrap">
  <div id="property-search" class="container">

    <div class="row my-5 p-0" id="slider-left">

      <div class="col-md-12 d-flex align-items-center justify-content-center">
        <h2>Simply Rethinking Real Estate.</h2>
      </div>

    </div>

  <!-- Search Form v2 -->
  <div id="property-search-form">
    <div class="row">

      <div class="col-6">

        <!-- Search Type buy/rent toggle -->
        <div id="search-type-toggle">
          <div class="search-buy-rent m-0">
            <!-- Rounded switch -->
            <span>Buy</span>
            <label class="switch-buy-rent" id="switch-buy-rent">
                <input type="checkbox" id="field-search-type" name="field-search-type">
                <span class="slider-buy-rent round"></span>
            </label>
            <span>Rent</span>
          </div>
        </div>

        <!-- ./ Search Type buy/rent toggle -->

      </div><!-- ./ col-6 -->

      <div id="search-filter-counter" class="col-md-6 d-flex justify-content-end align-items-center">
          <h3 class="align-self-center" style="color: #FFF; font-size: 0.90em; font-weight: 300; margin:0 6px 0 0;"><span id="home-search-count"></span> Properties Found</h3>
      </div>

    </div><!-- ./ row -->

        <div id="row2" class="search-home-grid">

          <div id="field-neighborhood"></div>
          <div id="field-property-type"></div>
          <div id="field-move-in-date"></div>
          <div id="field-bedrooms"></div>
          <div id="field-bathrooms"></div>
          <div id="field-price-minimum"></div>
          <div id="field-price-maximum"></div>

          <!-- Search Button -->
          <div class="d-flex justify-content-center align-items-center" id="search-button"><i class="far fa-search"></i> SEARCH</div>

        </div><!-- ./search-home-grid -->

        <!-- Scroll Down -->
        <div id="scroll-down-button">
          <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Layer_1" x="0px" y="0px" viewBox="0 0 512.011 512.011" style="enable-background:new 0 0 512.011 512.011;" xml:space="preserve">
            <g>
              <g>
                <path d="M505.755,123.592c-8.341-8.341-21.824-8.341-30.165,0L256.005,343.176L36.421,123.592c-8.341-8.341-21.824-8.341-30.165,0    s-8.341,21.824,0,30.165l234.667,234.667c4.16,4.16,9.621,6.251,15.083,6.251c5.462,0,10.923-2.091,15.083-6.251l234.667-234.667    C514.096,145.416,514.096,131.933,505.755,123.592z"/>
              </g>
            </g>
          </svg>
        </div>

      </div><!-- ./col -->
    </div><!-- ./row -->
  </div><!-- ./container -->
  <!-- ./ Search Form v2 -->

<script>

jQuery(document).ready(function($) {

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
    }
  ];
  $("#field-bathrooms").select({
    label: "Bathrooms",
    items: bathroomSelectOptions
  });

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
  $("#field-property-type").select( {
      label: "Property Type",
      items: propertyTypeSelectOptions
  } );

  $("#field-neighborhood").select( {
      label: "Neighborhood",
      items: aabTheme.areas,
      multiple: true,
      filter: true
  } );

  $("#field-move-in-date").select( {
      label: "Move-in Date",
      items: aabTheme.moveInDates
  } );

});

</script>
