<?php

/* Javascript
Summary:
    Set jQuery first, as a primary dependency, from the default Wordpress Key.
    Check the JS Directory, for all files in there ending in dot js.
    Create a name, a path, and set a dependency array for each individual script found, enque each one.
    Finally, register and enque the main dot js once all others have been configured.
 --------------------------------------------------------------------------------------- */
add_action('wp_enqueue_scripts', function(){
  //! Required Enqueues
  wp_enqueue_script('jquery'); // Do not deregister, jQ is updated and registered automatically by WP

  $dirJS = new DirectoryIterator(get_stylesheet_directory() . '/js');

  foreach ($dirJS as $file) {
      if (pathinfo($file, PATHINFO_EXTENSION) === 'js') {
          $fullName = basename($file);
          $name = substr(basename($fullName), 0, strpos(basename($fullName), '.'));

          // Set Dependencies for any script.
          // Since jQuery is already set as a priority requirement no need to list it as a dependency here.
          switch($name) {

              // case 'examplename':
              //     $deps = array('exampleDependency');
              //     break;

              default:
                  $deps = null;
                  break;

          }

          wp_enqueue_script( $name, get_template_directory_uri() . '/js/' . $fullName, $deps, '', true );
      }
  }

  // Main is Custom Coded by the 1P21 Team.
  // ( Used with an IF Statement, for Legacy Compatability )
  if(file_exists(get_template_directory() .'/main.js')):
      wp_register_script('mainjs', get_template_directory_uri() .'/main.js', '', '', true);
      wp_enqueue_script('mainjs');
  endif;
},10);

add_action('init', function() {
  register_nav_menus(array( // Using array to specify more menus if needed
    'header-menu' => __('Main Menu', ''),
  ));
});

/*External Files
--------------------------------------------------------------------------------------- */
require_once trailingslashit( dirname(__FILE__) ) . 'includes/custom-functions.php';

/* Combine all css, minify and inject in the head
 --------------------------------------------------------------------------------------- */

add_action( 'wp_head', 'merge_include_css' );
function merge_include_css() {
  $cssDirLastMod = filemtime(get_stylesheet_directory().'/css');
  $styleLastMod = filemtime(get_stylesheet_directory().'/style.css');
  $_cssLastMod = filemtime(get_stylesheet_directory().'/speed/_css.php');

  if ($cssDirLastMod > $_cssLastMod || $styleLastMod > $_cssLastMod) {
    $theme = wp_get_theme();
    $mergedCSS = '';

    $cssFiles = glob(get_stylesheet_directory() . '/css/*.css');

    foreach($cssFiles as $file) {
      $mergedCSS .= file_get_contents($file);
    }

    $styles = file_get_contents( get_stylesheet_directory().'/style.css' );
    $styles = str_replace( "images", site_url()."/wp-content/themes/$theme->template/images", $styles );
    $styles = str_replace( "fonts", site_url()."/wp-content/themes/$theme->template/fonts", $styles );

    $mergedCSS .= $styles;

    $mergedCSS = preg_replace('!/\*[^*]*\*+([^/][^*]*\*+)*/!', '', $mergedCSS);
    $mergedCSS = str_replace(': ', ':', $mergedCSS);
    $mergedCSS = str_replace(array("\r\n", "\r", "\n", "\t", '  ', '    ', '    '), '', $mergedCSS);

    file_put_contents( get_stylesheet_directory().'/speed/_css.php', $mergedCSS );

    echo '<style>';
    include_once get_stylesheet_directory().'/speed/_css.php';
    echo '</style>';
  } else {
    echo '<style>';
    include_once get_stylesheet_directory().'/speed/_css.php';
    echo '</style>';
  }
}





/**
 * Gravity Forms Tab Conflict Fix
 */
add_filter( 'gform_tabindex', '__return_false' );




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
    'after_title'   => '<i></i></h3>'
  ));

  register_sidebar(array(
    'name'          => 'Default Sidebar',
    'id'            => 'default_sidebar',
    'description'   => '',
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget'  => '</div>',
    'before_title'  => '<h3 class="widgettitle">',
    'after_title'   => '<i></i></h3>'
  ));
	
	register_sidebar(array(
    'name'          => 'Faqs Sidebar',
    'id'            => 'faqs_sidebar',
    'description'   => '',
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget'  => '</div>',
    'before_title'  => '<h3 class="widgettitle">',
    'after_title'   => '<i></i></h3>'
  ));
}





/* Add Theme Support Page Thumbnails
 --------------------------------------------------------------------------------------- */

add_theme_support( 'post-thumbnails' );





/* Modify the_excerpt() "read more"
 --------------------------------------------------------------------------------------- */

function new_excerpt_more($more) {
  global $post;
  //return '... <a href="'. get_permalink($post->ID) . '">' . 'read more' . '</a>';
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







/* Remove unnecessary scripts/styles by Wordpress (for pagespeed)
 --------------------------------------------------------------------------------------- */

remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('admin_print_scripts', 'print_emoji_detection_script');
remove_action('wp_print_styles', 'print_emoji_styles');
remove_action('admin_print_styles', 'print_emoji_styles');











// Allow SVG

function cc_mime_types($mimes) {
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');

function fix_svg_thumb_display() {
  echo '
    <style>td.media-icon img[src$=".svg"], img[src$=".svg"].attachment-post-thumbnail { 
      width: 100% !important; 
      height: auto !important; 
    }
    </style>
  ';
}
add_action('admin_head', 'fix_svg_thumb_display');

function render_shortcode_blog_category_filter(){
    $terms = get_categories();
    $current_cat = false;
    if ( is_category() && is_archive() ) {
        $current_cat = single_cat_title('', false);
    }
    ob_start();
    ?>
    <div id="categories-filter-container">
        <select id="blog-categories-filter" class="blog-categories-dropdown">
            <option value="<?php echo get_permalink(get_option('page_for_posts')); ?>">All Categories</option>
            <?php
            foreach ($terms as $term) { ?>
                <option value="<?php echo get_category_link($term->term_id); ?>" <?php echo $term->name === $current_cat ? 'selected' : ''; ?>><?php echo $term->name; ?></option>
            <?php }
            ?>
        </select>
    </div>
    <?php
    wp_enqueue_script('blog-category-filter');
    return ob_get_clean();
}
add_shortcode( 'blog_category_filter', 'render_shortcode_blog_category_filter' );

function enqueue_the_scripts() {
    wp_register_script( 'blog-category-filter', get_stylesheet_directory_uri() . '//blog-category-filter.js', array( 'jquery' ), '1.0', true );
}
add_action( 'wp_enqueue_scripts', 'enqueue_the_scripts' );





function render_shortcode_faqs_category_filter() {
    $terms = get_terms(array(
        'taxonomy' => 'faqs_category',
        'hide_empty' => true,
    ));
    $current_cat = false;
    if ( is_tax('faqs_category') ) {
        $current_cat = get_queried_object()->name;
    }
    ob_start();
    ?>
    <div id="categories-filter-container">
        <select id="faqs-categories-filter" class="faqs-categories-dropdown" onchange="location = this.value;">
            <option value="<?php echo get_post_type_archive_link('faqs'); ?>">All Categories</option>
            <?php foreach ($terms as $term) { ?>
                <option value="<?php echo esc_url(get_term_link($term)); ?>" <?php echo $term->name === $current_cat ? 'selected' : ''; ?>><?php echo $term->name; ?></option>
            <?php } ?>
        </select>
    </div>
    <?php
    return ob_get_clean();
}

add_shortcode( 'faqs_category_filter', 'render_shortcode_faqs_category_filter' );





function recent_faqs_shortcode($atts) {
    // Shortcode attributes
    $atts = shortcode_atts(array(
        'number' => 5, // Default number of FAQs to display
    ), $atts, 'recent_faqs');

    // Query arguments
    $args = array(
        'post_type' => 'faqs',
        'posts_per_page' => $atts['number'],
        'orderby' => 'date',
        'order' => 'DESC',
    );

    // The Query
    $faqs_query = new WP_Query($args);

    // Check if there are any FAQs
    if ($faqs_query->have_posts()) {
        $output = '<ul>';
        // Loop through FAQs
        while ($faqs_query->have_posts()) {
            $faqs_query->the_post();
            $output .= '<li><a href="' . get_permalink() . '">' . get_the_title() . '</a></li>';
        }
        $output .= '</ul>';
        // Restore original Post Data
        wp_reset_postdata();
    } else {
        $output = 'No recent FAQs found.';
    }

    return $output;
}
add_shortcode('recent_faqs', 'recent_faqs_shortcode');

function faq_categories_shortcode($atts) {
    // Shortcode attributes
    $atts = shortcode_atts(array(
        'orderby' => 'name', // Default ordering
        'order' => 'ASC', // Default order
        'hide_empty' => false, // Show even if categories have no posts
        'taxonomy' => 'faqs_category', // Default taxonomy
    ), $atts, 'faq_categories');

    // Query arguments
    $args = array(
        'taxonomy'   => $atts['taxonomy'],
        'title_li'   => '', // Remove title
        'orderby'    => $atts['orderby'],
        'order'      => $atts['order'],
        'hide_empty' => $atts['hide_empty'],
        'echo'       => false, // Don't output directly
    );

    // Get categories list
    $categories_list = wp_list_categories($args);

    // Check if any categories exist
    if ($categories_list) {
        return '<ul>' . $categories_list . '</ul>';
    } else {
        return 'No categories found.';
    }
}
add_shortcode('faq_categories', 'faq_categories_shortcode');


/* CUSTOM POST TYPES */
function custom_post_types() {
    register_post_type( 'faqs',
    // CPT Options
        array(
            'labels' => array(
                'name' => __( 'Faqs' ),
                'singular_name' => __( 'Faq' )
            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'faqs'),
            'show_in_rest' => true,
            'menu_icon' => 'dashicons-clipboard',
            'supports' => array( 'title', 'thumbnail', 'excerpt', 'editor' )
			
        )
    );
}
add_action( 'init', 'custom_post_types' );

/* CATEGORY TAXONOMY */
add_action( 'init', 'faq_category_taxonomy', 0 );
 
function faq_category_taxonomy() {
  $labels = array(
    'name' => _x( 'Faqs', 'taxonomy general name' ),
    'singular_name' => _x( 'Faq', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search Faqs' ),
    'all_items' => __( 'All Faqs' ),
    'parent_item' => __( 'Parent faq' ),
    'parent_item_colon' => __( 'Parent faq:' ),
    'edit_item' => __( 'Edit faq' ), 
    'update_item' => __( 'Update Faq' ),
    'add_new_item' => __( 'Add New Faq' ),
    'new_item_name' => __( 'New Faq Name' ),
    'menu_name' => __( 'Categories' ),
  );    
  register_taxonomy('faqs_category',array('faqs'), array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'show_admin_column' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'faq' ),
  ));
}

function assign_faq_template_to_category_archive( $template ) {
    error_log( 'Template function called.' ); // Check if the function is called
    if ( is_tax('faqs_category') && !is_feed() ) {
        error_log( 'Inside is_tax condition.' ); // Check if the condition is met
        $new_template = locate_template( array( 'template-faqs.php' ) );
        if ( '' != $new_template ) {
            error_log( 'Template found.' ); // Check if the template file is found
            return $new_template ;
        }
    }
    error_log( 'Template not found.' ); // Check if the template file is not found
    return $template;
}
add_filter( 'template_include', 'assign_faq_template_to_category_archive' );

