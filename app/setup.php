<?php

/**
 * Theme setup.
 */

namespace App;

	
@ini_set( 'upload_max_size' , '256M' );
@ini_set( 'post_max_size', '256M');
@ini_set( 'max_execution_time', '300' );

header('Access-Control-Allow-Origin: *');

add_action( 'init', function () {

$template = array(
array('core/cover', array('minHeight'=>600, 'dimRatio'=>0), array()),
array('webmodu/section', array(), array(
  
  array( 'core/columns', array(), array(
      array( 'core/column', array('width'=>'66.66%'), array(
          array( 'core/paragraph', array() ),
      ) ),
      array( 'core/column', array('width'=>'33.33%'), array(
          array( 'webmodu/sidebar', array(), array(
            array( 'core/paragraph', array() ),
          ) ),
      ) ),
  ) )
))

);
  $post_type_object = get_post_type_object( 'page' );
  $post_type_object->template = $template;
} );

use function Roots\bundle;

/**
 * Register the theme assets.
 *
 * @return void
 */
add_action('wp_enqueue_scripts', function () {
  bundle('app')->enqueue();
}, 100);

/**
 * Register the theme assets with the block editor.
 *
 * @return void
 */
add_action('enqueue_block_editor_assets', function () {
  bundle('editor')->enqueue();
}, 100);

/**
 * Register the initial theme setup.
 *
 * @return void
 */
add_action('after_setup_theme', function () {
  /**
   * Enable features from the Soil plugin if activated.
   *
   * @link https://roots.io/plugins/soil/
   */
  add_theme_support('soil', [
    'clean-up',
    'nav-walker',
    'nice-search',
    'relative-urls',
  ]);

  /**
   * Disable full-site editing support.
   *
   * @link https://wptavern.com/gutenberg-10-5-embeds-pdfs-adds-verse-block-color-options-and-introduces-new-patterns
   */
  remove_theme_support('block-templates');

  /**
   * Register the navigation menus.
   *
   * @link https://developer.wordpress.org/reference/functions/register_nav_menus/
   */
  register_nav_menus([
    'primary_navigation' => __('Primary Navigation', 'sage'),
  ]);

  /**
   * Disable the default block patterns.
   *
   * @link https://developer.wordpress.org/block-editor/developers/themes/theme-support/#disabling-the-default-block-patterns
   */
  remove_theme_support('core-block-patterns');

  /**
   * Enable plugins to manage the document title.
   *
   * @link https://developer.wordpress.org/reference/functions/add_theme_support/#title-tag
   */
  add_theme_support('title-tag');

  /**
   * Enable post thumbnail support.
   *
   * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
   */
  add_theme_support('post-thumbnails');

  /**
   * Enable post wide alignment support.
   *
   * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
   */
  add_theme_support('align-wide');
  /**
   * Enable responsive embed support.
   *
   * @link https://developer.wordpress.org/block-editor/how-to-guides/themes/theme-support/#responsive-embedded-content
   */
  add_theme_support('responsive-embeds');

  /**
   * Enable HTML5 markup support.
   *
   * @link https://developer.wordpress.org/reference/functions/add_theme_support/#html5
   */
  add_theme_support('html5', [
    'caption',
    'comment-form',
    'comment-list',
    'gallery',
    'search-form',
    'script',
    'style',
  ]);

  /**
   * Enable selective refresh for widgets in customizer.
   *
   * @link https://developer.wordpress.org/reference/functions/add_theme_support/#customize-selective-refresh-widgets
   */
  add_theme_support('customize-selective-refresh-widgets');
}, 20);

/**
 * Register the theme sidebars.
 *
 * @return void
 */
add_action('widgets_init', function () {
  $config = [
    'before_widget' => '<section class="widget %1$s %2$s">',
    'after_widget' => '</section>',
    'before_title' => '<h3>',
    'after_title' => '</h3>',
  ];

  register_sidebar([
    'name' => __('Footer', 'sage'),
    'id' => 'sidebar-footer',
  ] + $config);

  register_sidebar([
    'name' => __('Identiteit', 'sage'),
    'id' => 'sidebar-identity',
  ] + $config);


});
