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
//require_once get_template_directory() . '/disable-core-blocks.php';

/**
 * Add Consent checkbox to data sent to zapier
 * 
 */
function pmpro_add_custom_data_to_zapier( $data, $user_id, $level, $order ) {
	$data['subscribe_for_updates']   = get_user_meta( $user_id, 'subscribe_for_updates', true );
	return $data;
}
//add_filter( 'pmproz_after_checkout_data', 'pmpro_add_custom_data_to_zapier', 10, 4 );

/**
 * 
 * Manually fill out subscribe form
 */
function programmatically_submit_gravity_form($user_id, $morder) {
    // The form ID you want to submit
    $form_id = 6;

    // Get user data
    $user = get_userdata($user_id);
    if (!$user) {
        error_log('User not found for ID: ' . $user_id);
        return;
    }

    $email = $user->user_email; // Get email from user object
    $first_name = get_user_meta($user_id, 'first_name', true);
    $last_name = get_user_meta($user_id, 'last_name', true);
    $is_subscribed = get_user_meta($user_id, 'subscribe_for_updates', true);

//     if ($is_subscribed) {
        // Array of field values. Use field IDs as keys.
        $field_values = [
            '2' => $first_name, // First Name field ID
            '3' => $last_name,  // Last Name field ID
            '1' => $email       // Email field ID
        ];

        // Submit the form
        $result = GFAPI::submit_form($form_id, $field_values);

        if (is_wp_error($result)) {
            // Handle errors
            error_log('Gravity Form submission error: ' . $result->get_error_message());
        } else {
            // Success
            error_log('Gravity Form submitted successfully. Entry ID: ' . print_r($result));
        }
//     }

}

/**
 * Disabling Core Blocks
 * 
 */
require_once get_template_directory() . '/disable-core-blocks.php';

/**
 * Disable comments
 * 
 */
require_once get_template_directory() . '/disable-comments.php';

/**
 * Register custom block category
 */
function register_layout_category($categories)
{

    $custom_category = array(
        array(
            'slug' => 'custom',
            'title' => __('Custom Blocks', 'text-domain'),
            'icon' => null,
        ),
    );
    return array_merge($custom_category, $categories);
}

if (version_compare(get_bloginfo('version'), '5.8', '>=')) {
    add_filter('block_categories_all', 'register_layout_category');
} else {
    add_filter('block_categories', 'register_layout_category');
}

/**
 * create discount code after gform 5 checkout
 */
add_action('gform_after_submission_5', 'generate_pmpro_discount_code_on_gform', 10, 2);
function generate_pmpro_discount_code_on_gform($entry, $form) {
    global $wpdb;

    // Make sure PMPro is active
    if (!defined('PMPRO_VERSION')) {
error_log('PMPRO_VERSION not defined ');
        return;
    }

    // Get current user
//     $user = wp_get_current_user();
//     if (!$user || !$user->ID) {
//         return;
//     }

    // Generate unique code
    $code = 'DC' . date("Ymdhis") . wp_rand(1000, 9999);

    // Insert into pmpro_discount_codes table
    $wpdb->insert(
        $wpdb->prefix . 'pmpro_discount_codes',
        array(
            'code' => $code,
            'starts' => current_time('mysql'),
            'expires' => date('Y-m-d', strtotime('+30 days')),
            'uses' => 1,
        ),
        array('%s', '%s', '%s', '%d')
    );

    $code_id = $wpdb->insert_id;

    if ($code_id) {
        // Attach to a membership level
        $level_id = 3; // Change to your desired membership level ID
        $wpdb->insert(
            $wpdb->prefix . 'pmpro_discount_codes_levels',
            array(
                'code_id' => $code_id,
                'level_id' => $level_id,
                'initial_payment' => 0.00,
                'billing_amount' => 0.00,
                'cycle_number' => 0,
                'cycle_period' => '',
                'billing_limit' => 0,
                'trial_amount' => 0.00,
                'trial_limit' => 0,
            ),
            array('%d', '%d', '%f', '%f', '%d', '%s', '%d', '%f', '%d')
        );

        // Optional: save to user meta
//         update_user_meta($user->ID, 'pmpro_discount_code', $code);
		error_log('SUCCESS'.print_r($code));
// Get the recipient's email from the form entry
$recipient_email = rgar($entry, '11'); // Replace X with the field ID for recipients_email

if ($recipient_email && is_email($recipient_email)) {
    $subject = "You've Been Gifted a Year of Values & Virtues Premium Membership";
    $link = 'https://valuesandvirtues.org/membership-checkout/?level=3&discount_code=' . urlencode($code);
    
    $message = "Hi there,\n\nYou’ve been gifted a one-year premium membership to the Values & Virtues character education library!\n\n**Join here**: $link\n\n(Your unique code will expire in 30 days and can only be used once.)\n\n**What’s included with your premium membership?**\n\n - Downloadable guiding questions for every story\n - Printable hands-on activities to bring each story’s lesson to life\n\nWishing you health and happiness,\nThe Values & Virtues Team";
    
    $headers = array('Content-Type: text/plain; charset=UTF-8');
    
    wp_mail($recipient_email, $subject, $message, $headers);
}

    }
}


// add_action('pmpro_after_checkout', 'programmatically_submit_gravity_form', 10, 2);

// add_action('pmpro_after_checkout', function($user_id, $morder) {
//     error_log('User ID: ' . print_r($user_id, true));
//     //error_log('Order: ' . print_r($morder, true));
// }, 10, 2);


// function programmatically_submit_gravity_form($user_id, $morder) {
	        
// 	// The form ID you want to submit
//     $form_id = 6;
	
// 	// Get user info
//    // $user_info = get_userdata($user_id);

//    // $is_subscribed = $user_info->subscribe_for_updates;
// 	$email = get_user_meta( $user_id, 'user_email', true );
//     $first_name = get_user_meta( $user_id, 'first_name', true );
//     $last_name = get_user_meta( $user_id, 'last_name', true );
// 	$is_subscribed = get_user_meta( $user_id, 'subscribe_for_updates', true );

// 	if($is_subscribed) {
// 	        // Array of field values. Use field IDs as keys.
//         $field_values = [
//             '2' => $first_name, // first_name
// 			'3' => $last_name, // last_name
//             '1' => $email // email
//         ];

//         // Submit the form
//         $result = GFAPI::submit_form($form_id, $field_values);

//         if (is_wp_error($result)) {
//             // Handle errors
//             error_log('Gravity Form submission error: ' . $result->get_error_message());
//         } else {
//             // Success
//             error_log('Gravity Form submitted successfully. Entry ID: ' . $result['entry_id']);
//         }
// 	}
// }
// add_action('pmpro_after_checkout', 'programmatically_submit_gravity_form');
//
/**
 * 
 * Manually  add user to constant contact
 * 
 */
function add_to_constant_contact_list($user_id, $morder) {
    // Get user info
    $user_info = get_userdata($user_id);
   // $is_subscribed = $user_info->subscribe_for_updates;
	$email = $user_info->user_email;
    $first_name = $user_info->first_name;
    $last_name = $user_info->last_name;

    // Constant Contact API credentials
    $api_key = 'your_api_key';
    $access_token = 'your_access_token';
    $list_id = '0254b0fa-7ed9-11ef-be55-fa163ecc5ca4'; // Replace with your Constant Contact list ID

    // API URL
    $url = "https://api.cc.email/v3/contacts";

    // Contact data
    $data = [
        "email_address" => [
            "address" => $email
        ],
        "first_name" => $first_name,
        "last_name" => $last_name,
        "list_memberships" => [$list_id]
    ];

    // cURL request to Constant Contact
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        "Authorization: Bearer $access_token",
        "Content-Type: application/json"
    ]);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));

    $response = curl_exec($ch);
    $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);

    curl_close($ch);

    // Log the response for debugging
    if ($http_code == 201) {
        error_log("Contact successfully added to Constant Contact: " . print_r($response, true));
    } else {
        error_log("Error adding contact to Constant Contact: " . print_r($response, true));
    }
}
//add_action('pmpro_after_checkout', 'add_to_constant_contact_list');


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

// send admin email
add_action('pmpro_after_checkout', 'send_signup_email_to_admin', 10, 2);

function send_signup_email_to_admin($user_id, $morder) {
    // Only proceed if we have a valid order object
    if (empty($morder) || !is_object($morder)) {
        return;
    }

    $user_info = get_userdata($user_id);
    $membership_level = pmpro_getLevel($morder->membership_id);

    $subject = 'New Membership Signup Notification';
    $to = 'idurst@gmail.com';

    $body = "A new user has signed up for a membership:\n\n";
    $body .= "Name: " . $morder->billing->name . "\n";
    $body .= "Email: " . $user_info->user_email . "\n";
    $body .= "Username: " . $user_info->user_login . "\n";
    $body .= "Membership Level: " . ($membership_level ? $membership_level->name : 'Unknown') . "\n\n";

    // $body .= "Order Details:\n";
    // $body .= "Order Code: " . $morder->code . "\n";
    // $body .= "Total: $" . $morder->total . "\n";
    // $body .= "Status: " . $morder->status . "\n";
    // $body .= "Payment Type: " . $morder->payment_type . "\n";
    // $body .= "Gateway: " . $morder->gateway . " (" . $morder->gateway_environment . ")\n";

    // Include billing info if available
    // if (!empty($morder->billing)) {
    //     $body .= "\nBilling Info:\n";
    //     $body .= "Address: " . $morder->billing->street . ' ' . $morder->billing->street2 . "\n";
    //     $body .= "City/State/Zip: " . $morder->billing->city . ', ' . $morder->billing->state . ' ' . $morder->billing->zip . "\n";
    //     $body .= "Country: " . $morder->billing->country . "\n";
    //     $body .= "Phone: " . $morder->billing->phone . "\n";
    // }

    wp_mail($to, $subject, $body);
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

add_action('wp_logout','auto_redirect_after_logout');

function auto_redirect_after_logout(){
  wp_safe_redirect( home_url() );
  exit;
}
