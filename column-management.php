<?php

/**
 * Plugin Name:       Column Management
 * Plugin URI:        https://github.com/sinhamizan/col-add-filter-in-post  
 * Description:       Add QR Code in your posts or pages.
 * Version:           1.0
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Mizanur Rahaman
 * Author URI:        https://github.com/sinhamizan
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Update URI:        https://github.com/sinhamizan/col-add-filter-in-post
 * Text Domain:       column-management
 * Domain Path:       /languages
 */



class Column_Management {

  function __construct(){
    add_action( 'plugin_loaded', array($this, 'clm_text_domain') );
    add_filter( 'manage_posts_columns', array($this, 'clm_manage_post_col') );
    add_action( 'manage_posts_custom_column', array($this, 'clm_manage_post_custom_col'), 10, 2 );
  }

  function clm_text_domain() {
    load_plugin_textdomain( 'column-management', false, plugin_dir_url( __FILE__ ) . '/languages' );
  }

  // Added new Column in all post
  function clm_manage_post_col($columns) {
    $columns['id'] = __( 'Post ID', 'column-management' );
    return $columns;
  }

  // Show post ID in custom cols
  function clm_manage_post_custom_col($column, $post_id) {
    echo $post_id;
  }





}

new Column_Management();
