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
  'footer' => __( 'Footer Menu', get_template() ),
));


/***
*** Customizer
***/

add_action('customize_register', 'theme_footer_customizer');
add_action('customize_register', 'theme_header_customizer');

function theme_header_customizer( $wp_customize ) {

  $wp_customize->add_section('header_settings_section',
  array(
    'title' => 'Header'
  ));

  // Header > Logo

  $wp_customize->add_setting( 'header_logo',
    array(
      'default' => '',
      'transport' => 'refresh',
      'sanitize_callback' => 'esc_url_raw'
    )
  );

$wp_customize->add_control( new WP_Customize_Image_Control(
  $wp_customize, 'header_logo',
   array(
    'label' => __( 'Header Logo' ),
    'description' => esc_html__( 'This is the description for the Image Control' ),
    'section' => 'header_settings_section',
    'button_labels' => array( // Optional.
      'select' => __( 'Select Image' ),
      'change' => __( 'Change Image' ),
      'remove' => __( 'Remove' ),
      'default' => __( 'Default' ),
      'placeholder' => __( 'No image selected' ),
      'frame_title' => __( 'Select Image' ),
      'frame_button' => __( 'Choose Image' ),
      )
    )
  ));

}

function theme_footer_customizer( $wp_customize ) {

  //adding section in wordpress customizer
  $wp_customize->add_section('footer_settings_section',
  array(
    'title' => 'Footer Text Section'
  ));

  //adding setting for footer text area
  $wp_customize->add_setting('street_address', array(
    'default' => '123 Charter Blvd.',
  ));

  $wp_customize->add_control('street_address', array(
    'label'   => 'Footer Text Here',
    'section' => 'footer_settings_section',
    'type'    => 'textarea',
  ));

  // Footer > Email
  $wp_customize->add_setting('email', array(
    'default' => '',
  ));

  $wp_customize->add_control('email', array(
    'label'   => 'Email to display',
    'section' => 'footer_settings_section',
    'type'    => 'text',
  ));

  // Footer > Phone
  $wp_customize->add_setting('phone', array(
    'default' => '',
  ));

  $wp_customize->add_control('phone', array(
    'label'   => 'Phone to display',
    'section' => 'footer_settings_section',
    'type'    => 'text',
  ));

  // Footer > Fax
  $wp_customize->add_setting('fax', array(
    'default' => '',
  ));

  $wp_customize->add_control('fax', array(
    'label'   => 'Fax to display',
    'section' => 'footer_settings_section',
    'type'    => 'text',
  ));

  // Footer > Copyright Statement

  $wp_customize->add_setting('copyright', array(
    'default' => '&copy; PropertyWP. All Rights Reserved 2021.',
  ));

  $wp_customize->add_control('copyright', array(
    'label'   => 'Copyright statement',
    'section' => 'footer_settings_section',
    'type'    => 'text',
  ));

  // Footer > Sitemap Page Selection

  $wp_customize->add_setting('sitemap_page');

  $wp_customize->add_control('sitemap_page', array(
    'label'   => 'Select Sitemap Page',
    'section' => 'footer_settings_section',
    'type'    => 'dropdown-pages',
  ));

  // Footer > Privacy Policy Page Selection

  $wp_customize->add_setting('privacy_policy_page');

  $wp_customize->add_control('privacy_policy_page', array(
    'label'   => 'Select Privacy Policy Page',
    'section' => 'footer_settings_section',
    'type'    => 'dropdown-pages',
  ));

  // Footer > Logo

  $wp_customize->add_setting( 'footer_logo',
    array(
      'default' => '',
      'transport' => 'refresh',
      'sanitize_callback' => 'esc_url_raw'
    )
  );

$wp_customize->add_control( new WP_Customize_Image_Control(
  $wp_customize, 'footer_logo',
   array(
    'label' => __( 'Footer Logo' ),
    'description' => esc_html__( 'This is the description for the Image Control' ),
    'section' => 'footer_settings_section',
    'button_labels' => array( // Optional.
      'select' => __( 'Select Image' ),
      'change' => __( 'Change Image' ),
      'remove' => __( 'Remove' ),
      'default' => __( 'Default' ),
      'placeholder' => __( 'No image selected' ),
      'frame_title' => __( 'Select Image' ),
      'frame_button' => __( 'Choose Image' ),
      )
    )
  ));

}
