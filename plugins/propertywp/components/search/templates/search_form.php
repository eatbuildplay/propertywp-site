<div id="prop-search-form">
  <div class="accordion" id="accordionExample">
    <div class="accordion-item">
      <h2 class="accordion-header" id="accordionSearch">
        <button id="accordionSearchProperty" class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
          <span class="accordionTitleSearch">Filter Property Search</span>
        </button>
      </h2>
      <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="accordionSearch" data-bs-parent="#accordionExample">
        <div class="accordion-body">
          <form method="post" id="form-properties">

            <!-- Search Type Selector -->
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

            <div class="grid-from-prop">
              <div class="form-field form-group">
                <div id="field-neighborhood"></div>
              </div>

              <div class="form-field form-group" id="div-property-type">
                <div id="field-property-type"></div>
              </div>

              <div class="form-field form-group" id="div-move-in-date">
                <div id="field-move-in-date"></div>
              </div>

              <div class="form-field form-group">
                <div id="field-bedrooms"></div>
              </div>

              <div class="form-field form-group">
                <div id="field-bathrooms"></div>
              </div>

                  </div>
                  <!-- Price Range Selector -->
                  <div id="price-selector" class="d-block">
                    <div class="slider-price">
                      <div class="slider-range-price" >
                        <div class="slider-labels">
                          <div class="range-title-price"><span>Price</span></div>
                          <div class="max-min-price-range">
                            <span id="slider-range-value1"></span><span class="line-price-range"> - </span><span id="slider-range-value2"></span>
                          </div>
                        </div>
                      <div id="slider-range"></div>
                    </div>

                <input type="hidden" name="min-value" value="">
                <input type="hidden" name="max-value" value="">

                </div>
            </div>

            <input class="bottom-form btn-aab btn" type="submit" value="SEARCH" />

          </form>
        </div>
      </div>
    </div>
  </div>
</div>
