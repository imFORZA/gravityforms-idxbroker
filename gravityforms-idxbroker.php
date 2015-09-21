<?php
/*
Plugin Name: Gravity Forms IDX Broker Add-On
Plugin URI: http://www.brandonhubbard.com
Description: Integrates Gravity Forms with IDX Broker allowing form submissions to be automatically sent to your IDX Broker account.
Version: 1.5.0
Author: imFORZA
textdomain: gfidxbroker
Author URI: http://www.imforza.com


IDX Broker API Documentation: http://middleware.idxbroker.com/docs/api/methods/index.html#api-Leads-putLead

*/


include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
if (!is_plugin_active('gravityforms/gravityforms.php')) {
    deactivate_plugins( 'gravityforms-idxbroker/gravityforms-idxbroker.php' );
}

// Update Feature
require_once('wp-updates-plugin.php');
new WPUpdatesPluginUpdater_714( 'http://wp-updates.com/api/2/plugin', plugin_basename(__FILE__));


// Make sure Gravity Forms is active and already loaded.
if (class_exists("GFForms")) {

    // The Add-On Framework is not loaded by default.
    // Use the following function to load the appropriate files.
    GFForms::include_addon_framework();

    class GFIDXBroker extends GFAddOn {

        // The following class variables are used by the Framework.
        // They are defined in GFAddOn and should be overridden.

        // The version number is used for example during add-on upgrades.
        protected $_version = "1.0.2";

        // The Framework will display an appropriate message on the plugins page if necessary
        protected $_min_gravityforms_version = "1.8.7";

        // A short, lowercase, URL-safe unique identifier for the add-on.
        // This will be used for storing options, filters, actions, URLs and text-domain localization.
        protected $_slug = "gfidxbroker";

        // Relative path to the plugin from the plugins folder.
        protected $_path = "gravityforms-idxbroker/gravityforms-idxbroker.php";

        // Full path the the plugin.
        protected $_full_path = __FILE__;

        // Title of the plugin to be used on the settings page, form settings and plugins page.
        protected $_title = "Gravity Forms IDX Broker Add-On";

        // Short version of the plugin title to be used on menus and other places where a less verbose string is useful.
        protected $_short_title = "IDX Broker";

        private static $_instance = null;

        public static function get_instance() {
            if ( self::$_instance == null ) {
                self::$_instance = new self;
            }

            return self::$_instance;

    }



    public function form_settings_fields($form) {
    return array(
        array(
            "title"  => __('IDX Broker Settings', 'gfidxbroker'),
            "fields" => array(
                array(
                    "label"   => __('Enable Lead Imports', 'gfidxbroker'),
                    "type"    => "checkbox",
                    "name"    => "import_leads",
                    "tooltip" => "When enabled this will import all compatible entry information as a new lead into IDX Broker as a new lead.",
                    "choices" => array(
                        array(
                            "label" => "Import Leads",
                            "name"  => "import_leads"
                        )
                    )
                ),
                array(
                    "label"   => "Email From Name",
                    "type"    => "text",
                    "name"    => "email_from",
                    "tooltip" => "The name from which the email is sent from.",
                    "class"   => "medium",
                ),
                array(
                    "label"   => "Email From Address",
                    "type"    => "text",
                    "name"    => "email_from_address",
                    "tooltip" => "The email address from which the email is sent from.",
                    "class"   => "medium",
                ),
                array(
                    "label"   => "Email Subject",
                    "type"    => "text",
                    "name"    => "email_subject",
                    "tooltip" => "The subject line of the IDX Broker Email.",
                    "class"   => "medium",
                ),
                array(
                    "label"   => "Email Body",
                    "type"    => "textarea",
                    "name"    => "email_body",
                    "tooltip" => "The body of the default email message. Note the IDX Broker Login information will be displayed below your message.",
                    "class"   => "medium merge-tag-support mt-position-right"
                ),

            )
        )
    );
}

}





/* Sends all Gravity Form Submissions to IDX Broker */
add_action('gform_after_submission', 'gravityforms_to_idxbroker_leads', 10, 2);
function gravityforms_to_idxbroker_leads($entry, $form) {

	// Declare Empty Variables
	$firstName = '';
	$lastName = '';
	$email = '';
	$street = '';
	$city = '';
	$state = '';
	$zip = '';
	$country = '';

	$enableimport = !empty($form['gfidxbroker']['import_leads']);

	if ( empty($enableimport) || $enableimport = '0'  )
	return false;

    // Check for IDX API Key
    if( !get_option('idx_broker_apikey') )
	return false;

	// Headers for API Call
	$headers = array(
		'Content-Type' => 'application/x-www-form-urlencoded',
		'accesskey' => get_option('idx_broker_apikey'),
		'outputtype' => 'json',
		'apiversion' => '1.2.1'
	);

    // IDX Broker Lead API URL
    $post_url = 'https://api.idxbroker.com/leads/lead';

    // Find Name and Email Fields to submit
	foreach($form['fields'] as &$field){


		if( !empty($field['type'] == 'name')) {
			// the first name portion of a name field is always x.3
			$firstnamepart = (string)$field['id'] . ".3";
			$firstName = $entry[$firstnamepart];
		}

		if( !empty($field['type'] == 'name')) {
			// the last name portion of a name field is always x.6
			$lastnamepart = (string)$field['id'] . ".6";
			$lastName = $entry[$lastnamepart];
		}

		if( !empty($field['type'] == 'email')) {
			$email = $entry[$field['id']];
		}

		if( !empty($field['type'] == 'phone')) {
    		$phone = $entry[$field['id']];
        }

		if( !empty($field['type'] == 'address')) {
    		$streetpart = (string)$field['id'] . ".1";
    		$street = $entry[$streetpart];
    		$citypart = (string)$field['id'] . ".3";
    		$city = $entry[$citypart];
    		$statepart = (string)$field['id'] . ".4";
    		$state = $entry[$statepart];
    		$zippart = (string)$field['id'] . ".5";
    		$zip = $entry[$zippart];
    		$countrypart = (string)$field['id'] . ".6";
    		$country = $entry[$countrypart];
        }
	}

	$idxpassword = wp_generate_password();

    // IDX Broker Fields
	$body = array(
		'firstName' => $firstName,
		'lastName' => $lastName,
		'email'=> $email,
		'address' => $street,
		'city' => $city,
		'stateProvince' => $state,
		'country' => $country,
		'zipCode' => $zip,
		'actualCategory' => 'Contact',
		'phone' => $phone,
		'password' => $idxpassword
	);


    // Send Leads to IDX Broker
    $response = wp_remote_post( $post_url, array(
	'method' => 'PUT',
	'timeout' => 45,
	//'redirection' => 5,
	//'httpversion' => '1.0',
	//'blocking' => true,
	'headers' => $headers,
	'body' => $body,
	//'cookies' => array()
    ) );


    // Display Response when in Debug Mode
   if (WP_DEBUG === true) {
        echo 'IDX Broker API Response:<pre>';
        print_r( $response );
        echo '</pre>';
    }

$from_name = $form['gfidxbroker']['email_from'];
$from_email = $form['gfidxbroker']['email_from_address'];

$idxemailsubject = $form['gfidxbroker']['email_subject'];
$idxemailmessage = $form['gfidxbroker']['email_body'];


    // Send Email to Submitter with IDX Login Info
$message_login = "

Username: ". $email ."
Password: ". $idxpassword ."

 "; // end message

 $headers = 'From: '. $from_name .' <'. $from_email .'>' . "\r\n";

 // Send
 wp_mail($email, $idxemailsubject , $idxemailmessage . $message_login, $headers);



} // end gravityforms_to_idxbroker_leads


} // end GFIDXBroker

 if (class_exists("GFForms")) {
new GFIDXBroker();
}

