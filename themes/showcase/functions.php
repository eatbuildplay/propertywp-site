<?php

require_once( get_template_directory() . '/inc/search.php' );
require_once( get_template_directory() . '/inc/kirki/kirki.php' );

Kirki::add_config( 'theme_config_id', array(
	'capability'    => 'edit_theme_options',
	'option_type'   => 'theme_mod',
));

Kirki::add_panel( 'panel_id', array(
  'priority'    => 10,
  'title'       => esc_html__( 'My Panel', 'kirki' ),
  'description' => esc_html__( 'My panel description', 'kirki' ),
));

Kirki::add_section( 'section_id', array(
  'title'          => esc_html__( 'My Section', 'kirki' ),
  'description'    => esc_html__( 'My section description.', 'kirki' ),
  'panel'          => 'panel_id',
  'priority'       => 160,
) );

Kirki::add_field( 'theme_config_id', [
	'type'        => 'repeater',
	'label'       => esc_html__( 'Repeater Control', 'kirki' ),
	'section'     => 'section_id',
	'priority'    => 10,
	'row_label' => [
		'type'  => 'text',
		'value' => esc_html__( 'Your Custom Value', 'kirki' ),
	],
	'button_label' => esc_html__('"Add new" button label (optional) ', 'kirki' ),
	'settings'     => 'my_repeater_setting',
	'default'      => [
		[
			'link_text' => esc_html__( 'Kirki Site', 'kirki' ),
			'link_url'  => 'https://kirki.org/',
		],
		[
			'link_text' => esc_html__( 'Kirki Repository', 'kirki' ),
			'link_url'  => 'https://github.com/aristath/kirki',
		],
	],
	'fields' => [
		'link_text' => [
			'type'        => 'text',
			'label'       => esc_html__( 'Link Text', 'kirki' ),
			'description' => esc_html__( 'This will be the label for your link', 'kirki' ),
			'default'     => '',
		],
		'link_url'  => [
			'type'        => 'text',
			'label'       => esc_html__( 'Link URL', 'kirki' ),
			'description' => esc_html__( 'This will be the link URL', 'kirki' ),
			'default'     => '',
		],
	]
] );

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
    'showcase-main-script',
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
    'showcase-main-style',
    get_template_directory_uri() . '/style.css',
    ['bootstrap', 'propertywp-select'],
    time()
  );

  /* end scripts and styles single property */
  $localVars = [
    'templateUrl' 	=> get_stylesheet_directory_uri(),
    'userId'      	=> get_current_user_id(),
    'areas'       	=> getAreas(),
		'searchDefaultPropertyTypes'  	=> searchDefaultPropertyTypes(),
		'searchDefaultBedrooms' 				=> searchDefaultBedrooms(),
		'searchDefaultBathrooms' 				=> searchDefaultBathrooms(),
		'searchDefaultPriceMinimumBuy' 	=> searchDefaultPriceMinimumBuy(),
		'searchDefaultPriceMaximumBuy' 	=> searchDefaultPriceMaximumBuy(),
		'searchDefaultPriceMinimumRent' => searchDefaultPriceMinimumRent(),
		'searchDefaultPriceMaximumRent' => searchDefaultPriceMaximumRent(),
		'moveInDates' => getMoveInDates()
  ];

  wp_localize_script( 'showcase-main-script', 'showcase', $localVars );

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
add_action('customize_register', 'theme_home_customizer');

function theme_home_customizer( $wp_customize ) {

  $wp_customize->add_section('home_settings_section',
  array(
    'title' => 'Home'
  ));

  // Home > Hero Header
  $wp_customize->add_setting('hero_heading', array(
    'default' => 'Helping People Find Homes.',
  ));

  $wp_customize->add_control('hero_heading', array(
    'label'   => 'Hero Heading',
    'section' => 'home_settings_section',
    'type'    => 'text',
  ));

  // Home > Properties Found
  $wp_customize->add_setting('home_properties_found', array(
    'default' => 1,
  ));

  $wp_customize->add_control('home_properties_found', array(
    'label'   => 'Show Properties Found?',
    'section' => 'home_settings_section',
    'type'    => 'checkbox',
  ));

}

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

/*
 * Move-in Dates for search forms
 * Returns an array for use in selectors
 */
function getMoveInDates( $months = 13 ) {

  $start = new DateTime();
  $start->modify('first day of this month');
  $end = new DateTime("+" . $months . " months");
  $end->modify('first day of this month');

  $interval = DateInterval::createFromDateString('1 month');
  $period   = new DatePeriod($start, $interval, $end);

  $moveInDates = [];

  foreach( $period as $d ) {
    $date = new stdClass;
    $date->title = $d->format('F, Y');
    $date->value = $d->format('Y-m');
    $moveInDates[] = $date;
  }

  return $moveInDates;

}

function getAreas() {

  /*
  $args_area = [
    'post_type' => 'acfg_area',
    'numberposts' => -1,
    'orderby' => 'title',
    'order' => 'ASC'
  ];
  $posts_area = get_posts($args_area);

  $areas = [];
  foreach( $posts_area as $post_area ) {

    $area = new stdClass;
    $area->title = get_post_meta( $post_area->ID, 'title', true );
    $area->title = $area->title ? $area->title : $post_area->post_title;
    $area->value = $post_area->ID;
    $areas[] = $area;

  }

  */

  $area1 = new stdClass;
  $area1->title = 'Quito';
  $area1->value = 945;
  $area2 = new stdClass;
  $area2->title = 'Bogota';
  $area2->value = 946;
  $areas = [
    $area1, $area2
  ];

  return $areas;

}


/**
 * Register our sidebars and widgetized areas.
 *
 */
function arphabet_widgets_init() {

	register_sidebar( array(
		'name'          => 'Home right sidebar',
		'id'            => 'home_right_1',
		'before_widget' => '<div>',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="rounded">',
		'after_title'   => '</h2>',
	) );

}
add_action( 'widgets_init', 'arphabet_widgets_init' );
