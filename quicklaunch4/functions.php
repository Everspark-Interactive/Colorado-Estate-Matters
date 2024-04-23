<?php

/* Enqueue Scripts and Styles
 --------------------------------------------------------------------------------------- */

function theme_name_scripts() {

  //wp_enqueue_style( 'style.css', get_template_directory_uri() . '/style.css' );

  wp_deregister_script('jquery');
  wp_register_script( 'jquery', includes_url( '/js/jquery/jquery.js' ), false, NULL, true );
  wp_enqueue_script(' jquery' );

  wp_enqueue_script( 'smoothScroll.min.js', get_template_directory_uri() . '/js/smoothScroll.min.js', array( 'jquery' ), '', true );
  wp_enqueue_script( 'slick.min.js', get_template_directory_uri() . '/js/slick.min.js', array( 'jquery' ), '', true );
  wp_enqueue_script( 'wow.min.js', get_template_directory_uri() . '/js/wow.min.js', array( 'jquery' ), '', true );
  wp_enqueue_script( 'waypoints.min.js', get_template_directory_uri() . '/js/waypoints.min.js', array( 'jquery' ), '', true );
  wp_enqueue_script( 'main.js', get_template_directory_uri() . '/main.js', array( 'jquery' ), '', true );

  if( is_page_template( 'template-home.php' ) ) {
    wp_enqueue_script( 'main-homepage-only.js', get_template_directory_uri() . '/main-homepage-only.js', array( 'jquery' ), '', true );
  }

  if( !is_page_template( 'template-home.php' ) ){
      wp_enqueue_script( 'main-internals-only.js', get_template_directory_uri() . '/main-internals-only.js', array( 'jquery' ), '', true );
  }

}

add_action( 'wp_enqueue_scripts', 'theme_name_scripts' );





/* Include style.css in the head
 --------------------------------------------------------------------------------------- */

add_action( 'wp_head', 'internal_css_print' );
function internal_css_print() {
  echo '<style>';

  include_once get_template_directory() . '/style.css';

  echo '</style>';
}



/* Register Nav-Menus
 --------------------------------------------------------------------------------------- */

register_nav_menus( array(
  'main_menu' => 'Main Menu',
  'sidebar_menu' => 'Sidebar Menu',
  'practice_area_menu' => 'Practice Area Menu',
) );





/* No Tab Conflicts Gravity Forms
 --------------------------------------------------------------------------------------- */

add_filter( 'gform_tabindex', 'gform_tabindexer', 10, 2 );
function gform_tabindexer( $tab_index, $form = false ) {
  $starting_index = 1000; // if you need a higher tabindex, update this number
  if( $form )
      add_filter( 'gform_tabindex_' . $form['id'], 'gform_tabindexer' );
  return GFCommon::$tab_index >= $starting_index ? GFCommon::$tab_index : $starting_index;
}





/* Blog Sidebar Widget
 --------------------------------------------------------------------------------------- */

if(function_exists('register_sidebars')){
  register_sidebar(array(
      'name'          => 'Blog Sidebar',
      'id'            => 'blog_sidebar',
      'description'   => '',
      'before_widget' => '<div id="%1$s" class="widget %2$s">',
      'after_widget'  => '</div>',
      'before_title'  => '<h3 class="widgettitle">',
      'after_title'   => '</h3>'
  ));
}





/* Add Theme Support Page Thumbnails
 --------------------------------------------------------------------------------------- */

add_theme_support( 'post-thumbnails' );





/* Modify the_excerpt() "read more"
 --------------------------------------------------------------------------------------- */

function new_excerpt_more($more) {
  global $post;
  return '... <a href="'. get_permalink($post->ID) . '">' . 'read more' . '</a>';
}
add_filter('excerpt_more', 'new_excerpt_more');





/* Theme Options for ACF
 --------------------------------------------------------------------------------------- */

if( function_exists('acf_add_options_page') ) {

  acf_add_options_page(array(
    'page_title' 	=> 'Theme Options',
    'menu_title'	=> 'Theme Options',
    'menu_slug' 	=> 'theme-options',
    'capability'	=> 'edit_posts',
    'redirect'		=> false
  ));

}






/* Allow SVG to get uploaded to media library
 --------------------------------------------------------------------------------------- */

function cc_mime_types($mimes) {
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');






/* Remove unnecessary scripts/styles by Wordpress (for pagespeed)
 --------------------------------------------------------------------------------------- */

remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('admin_print_scripts', 'print_emoji_detection_script');
remove_action('wp_print_styles', 'print_emoji_styles');
remove_action('admin_print_styles', 'print_emoji_styles');

function my_deregister_styles() {
  if (is_user_logged_in()) {
    return true;
  } else {
    remove_action('wp_head', '_admin_bar_bump_cb');
    wp_deregister_style( 'dashicons' );
  }
}
add_action( 'wp_print_styles', 'my_deregister_styles', 100 );





/* Remove WP version parameter from any enqueued scripts or stylesheets (version number)
 --------------------------------------------------------------------------------------- */

function vc_remove_wp_ver_css_js( $src ) {
  if ( strpos( $src, 'ver=' . get_bloginfo( 'version' ) ) )
      $src = remove_query_arg( 'ver', $src );
  return $src;
}
add_filter( 'style_loader_src', 'vc_remove_wp_ver_css_js', 9999 );
add_filter( 'script_loader_src', 'vc_remove_wp_ver_css_js', 9999 );






/* Force Gravity Forms to initialize scripts in the footer and ensure that the DOM is loaded before scripts are executed
 --------------------------------------------------------------------------------------- */
add_filter( 'gform_init_scripts_footer', '__return_true' );
add_filter( 'gform_cdata_open', 'wrap_gform_cdata_open', 1 );
function wrap_gform_cdata_open( $content = '' ) {
  if ( ( defined('DOING_AJAX') && DOING_AJAX ) || isset( $_POST['gform_ajax'] ) ) {
      return $content;
  }
  $content = 'document.addEventListener( "DOMContentLoaded", function() { ';
  return $content;
}
add_filter( 'gform_cdata_close', 'wrap_gform_cdata_close', 99 );
function wrap_gform_cdata_close( $content = '' ) {
  if ( ( defined('DOING_AJAX') && DOING_AJAX ) || isset( $_POST['gform_ajax'] ) ) {
      return $content;
  }
  $content = ' }, false );';
  return $content;
}