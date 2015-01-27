<?php
/*
Plugin Name: CX: Contact Details
Plugin URI: http://www.ablewild.com
Description: This plugin allows you to set contact information for inclusion in your website. This plugin is only licenced for the use of customers of Clark CX Ltd.
Version: 1.2
Author: Pete Clark
Author URI: http://www.ablewild.com/
*/

/*************************************
* global variables
*************************************/

$cx_contactdeets_plugin_name = 'Contact Details';

// Retrieve our plugins settings from the options table
$cx_contactdeets_options = get_option('cx_contactdeets_settings');


/*************************************
* includes
*************************************/

include('inc/adminpage.php'); // This is the plugin options page
include('inc/shortcodes.php'); // This is the plugin options page

/*************************************
* settings link
*************************************/

function cx_contactdeets_settings_link($links) { 
  $settings_link = '<a href="options-general.php?page=cx-contactdeets-admin">Settings</a>'; 
  array_unshift($links, $settings_link); 
  return $links; 
}
 
$plugin = plugin_basename(__FILE__); 
add_filter("plugin_action_links_$plugin", 'cx_contactdeets_settings_link' );

?>