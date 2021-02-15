<?php

class WidgetHome extends WP_Widget {

  public function __construct() {

    parent::WP_Widget( false, $name = 'Home Widget');

  }

  public function widget( $args, $instance ) {

    var_dump( $instance );

    extract( $args );
    print '<h2>';
    print $heading;
    print '</h2>';

  }

  public function form( $instance ) {

    $heading = $instance['heading'];
  ?>

    <p>
      <label for="heading">Heading</label>
      <input class="widefat" type="text" id="heading" name="heading" value="<?php echo esc_attr( $heading ); ?>">
    </p>

  <?php }

  public function update( $new_instance, $old_instance ) {

    $instance = $old_instance;
    $instance['heading'] = strip_tags( $new_instance['heading'] );
    return $instance;

  }


}
