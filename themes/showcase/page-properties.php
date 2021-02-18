<?php get_header(); ?>
<?php

$search = $GLOBALS['search'];

?>
<div class="container" style="margin-top: 150px;">
  <div class="row">
    <div class="col-md-6 prwp-half-map-left">
        <div id="prop-map" style="height: 500px;"></div>
    </div>
    <div class="col-md-6 prwp-half-map-right">
      <?php $search->renderTemplate('search_form'); ?>
      <div id="search-results-wrap"></div>
    </div>
  </div>
</div>

<?php

$search->renderTemplate('search_result');
$search->renderTemplate('search_result_item');

?>

<?php get_footer(); ?>
