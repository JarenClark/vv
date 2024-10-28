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

/**
 * Disabling Core Blocks
 * 
 */
require_once get_template_directory() . '/disable-core-blocks.php';


/**
 * Doesnt display "virtue" taxonomies if they are empty
 * 
 */
function remove_empty_category_from_menu_item($items, $menu, $args)
{

    if (!is_admin()) {
        // Get all categories that have products
        $categories_with_products = get_categories(
            array(
                'taxonomy' => 'virtue',
                'hide_empty' => true,
                'hierarchical' => true,
            ));

        // Extract category IDs and add them to $categories_to_keep array
        foreach ($categories_with_products as $category) {
            $categories_to_keep[] = $category->term_id;
        }

        // Loop through each menu item
        foreach ($items as $key => $item) {

            // Check if the menu item is of type 'taxonomy' and object is 'product_cat'
            if ('taxonomy' == $item->type && 'virtue' == $item->object) {

                // If the menu item's object_id is not in $categories_to_keep array, remove it
                if (!in_array($item->object_id, $categories_to_keep)) {
                    // unset frome the menu
                    unset($items[$key]);
                }

            }

        }
    }
    return $items;

}
//add_filter('wp_get_nav_menu_items', 'remove_empty_category_from_menu_item', 10, 3);

/**
 * Remove comments from admin menu
 */
function remove_comments_menu() {
    remove_menu_page('edit-comments.php');
}
add_action('admin_menu', 'remove_comments_menu');

/**
 * Add custom query vars
 */
function custom_query_vars($vars)
{
    $vars[] = 'level';
    return $vars;
}
add_filter('query_vars', 'custom_query_vars');
