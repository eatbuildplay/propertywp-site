<?php get_header(); ?>

<div style="margin-top: 150px;">
<?php

$search = $GLOBALS['search'];
$search->renderTemplate('search_result'); 

?>

</div>

<?php get_footer(); ?>
