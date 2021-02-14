<?php

/* Scripts */
add_action('wp_enqueue_scripts', function() {

  /* Bootstrap 5 CSS */
  wp_enqueue_style(
    'bootstrap',
    'https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css',
    array(),
    true
  );

  /* Bootstrap 5 JS */
  wp_enqueue_script(
    'bootstrap',
    'https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js',
    array('jquery'),
    '5.0.0',
    true
  );

  wp_enqueue_script(
    'select',
    get_template_directory_uri() . '/js/select.js',
    ['jquery'],
    '1.0.0'
  );

  wp_enqueue_script(
    'search',
    get_template_directory_uri() . '/js/search.js',
    ['jquery', 'select'],
    '1.0.0'
  );

  wp_enqueue_script(
    'propertywp-main-script',
    get_template_directory_uri() . '/js/script.js',
    ['jquery', 'select', 'search'],
    '1.0.0'
  );



  wp_enqueue_style(
    'propertywp-fontawesome',
    'https://use.fontawesome.com/releases/v5.15.2/css/all.css',
    [],
    '5.15.2'
  );

  wp_enqueue_style(
    'propertywp-select',
    get_template_directory_uri() . '/css/select.css',
    ['bootstrap'],
    time()
  );

  wp_enqueue_style(
    'propertywp-main-styles',
    get_template_directory_uri() . '/style.css',
    ['bootstrap', 'propertywp-select'],
    time()
  );

});


/**
 * Register Custom Navigation Walker
 */
function register_navwalker(){
  require_once get_template_directory() . '/class-wp-bootstrap-navwalker.php';
}
add_action( 'after_setup_theme', 'register_navwalker' );

if ( ! file_exists( get_template_directory() . '/class-wp-bootstrap-navwalker.php' ) ) {
  // File does not exist... return an error.
  return new WP_Error( 'class-wp-bootstrap-navwalker-missing', __( 'It appears the class-wp-bootstrap-navwalker.php file may be missing.', 'wp-bootstrap-navwalker' ) );
} else {
  require_once get_template_directory() . '/class-wp-bootstrap-navwalker.php';
}

register_nav_menus( array(
  'primary' => __( 'Primary Menu', get_template() ),
));
