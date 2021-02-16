<?php get_header(); ?>

<script>
  var searchResultItems = <?php print $search->result->getItemsJson(); ?>;
</script>

<div id="content" style="margin-top: 150px;">
<?php

$search = $GLOBALS['search'];


?>

</div>

<?php

$search->renderTemplate('search_result');
$search->renderTemplate('search_result_item');

?>

<?php get_footer(); ?>
