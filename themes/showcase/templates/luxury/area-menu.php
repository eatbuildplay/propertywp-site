<div class="row">
  <div class="col-md-12">
    <ul id="luxury-area-menu">
        <li class="property-luxury" data-id="" data-permalink="" ><h3 class="text-start">All</h3></li>
      <?php foreach( $areas as $a ) { ?>
        <li class="property-luxury" data-id="<?php print $a->id; ?>" data-permalink="<?php print $a->permalink; ?>"><h3 class="text-start"><?php print $a->title; ?></h3></li>
      <?php } ?>
    </ul>
  </div>
</div>

<style>

#luxury-area-menu {
  margin: 0;
  padding: 0;
}

#luxury-area-menu li {
  cursor: pointer;
  background: #BBB;
  text-align: right;
  margin: 0;
  padding: 12px 8px;
  border-bottom: solid 1px #D8D8D8;
}

#luxury-area-menu li:last-child {
  border-bottom: none;
}

#luxury-area-menu li:hover {
  background: #CCC;
}

#luxury-area-menu li h3 {
  margin: 0;
  font-size: 1.3em;
  font-weight: 500;
}

</style>
