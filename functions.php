<?php

/*
|--------------------------------------------------------------------------
| Register The Auto Loader
|--------------------------------------------------------------------------
|
| Composer provides a convenient, automatically generated class loader for
| our theme. We will simply require it into the script here so that we
| don't have to worry about manually loading any of our classes later on.
|
*/

if (!file_exists($composer = __DIR__ . '/vendor/autoload.php')) {
  wp_die(__('Error locating autoloader. Please run <code>composer install</code>.', 'sage'));
}

require $composer;

/*
|--------------------------------------------------------------------------
| Register The Bootloader
|--------------------------------------------------------------------------
|
| The first thing we will do is schedule a new Acorn application container
| to boot when WordPress is finished loading the theme. The application
| serves as the "glue" for all the components of Laravel and is
| the IoC container for the system binding all of the various parts.
|
*/

if (!function_exists('\Roots\bootloader')) {
  wp_die(
    __('You need to install Acorn to use this theme.', 'sage'),
    '',
    [
      'link_url' => 'https://roots.io/acorn/docs/installation/',
      'link_text' => __('Acorn Docs: Installation', 'sage'),
    ]
  );
}

\Roots\bootloader()->boot();

/*
|--------------------------------------------------------------------------
| Register Sage Theme Files
|--------------------------------------------------------------------------
|
| Out of the box, Sage ships with categorically named theme files
| containing common functionality and setup to be bootstrapped with your
| theme. Simply add (or remove) files from the array below to change what
| is registered alongside Sage.
|
*/

collect(['setup', 'filters'])
  ->each(function ($file) {
    if (!locate_template($file = "app/{$file}.php", true, true)) {
      wp_die(
        /* translators: %s is replaced with the relative file path */
        sprintf(__('Error locating <code>%s</code> for inclusion.', 'sage'), $file)
      );
    }
  });

include_once 'resources/includes/functions/create-menu.php';
include_once 'resources/includes/classes/custom_posttype.php';

/**
 * Font Awesome Kit Setup
 * 
 * This will add your Font Awesome Kit to the front-end, the admin back-end,
 * and the login screen area.
 */
if (!function_exists('fa_custom_setup_kit')) {
  function fa_custom_setup_kit($kit_url = '')
  {
    foreach (['wp_enqueue_scripts', 'admin_enqueue_scripts', 'login_enqueue_scripts'] as $action) {
      add_action(
        $action,
        function () use ($kit_url) {
          wp_enqueue_script('font-awesome-kit', $kit_url, [], null);
        }
      );
    }
  }
}

fa_custom_setup_kit('https://kit.fontawesome.com/3ad920e0b0.js');

/**
 *  Custom post types 
 */

new CustomPostType("Portfolio");