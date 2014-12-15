<?php
/**
 * Load backstretch.js
 * @package Wordpress
 * @subpackage one-theme
 * @since 1.0
 * @author Matthew Hansen
 */

require_once dirname( __FILE__ ) . 'fag.php';

if( !function_exists( 'ot_load_faq_js' ) ) :
  function ot_load_faq_js() {
    if(!is_child_theme()){
      wp_register_script( 'faq_js', get_template_directory_uri().'/lib/modules/faq/js/faq.js', array( 'jquery' ), '1.0.0', true );
  } else {
      wp_register_script( 'faq_js', get_stylesheet_directory_uri().'/lib/modules/faq/js/faq.js', array( 'jquery' ), '1.0.0', true );
  }
    wp_enqueue_script( 'faq_js' );
  }
  add_action( 'init', 'ot_load_faq_js' );

endif;
