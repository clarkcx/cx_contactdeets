<?php
/*************************************
* Shortcodes
*************************************/

function cx_sc_contactdeets_email($atts, $content = null) {
	extract(shortcode_atts(array(
		"link" => 'true',
		"linktext" => 'false'
	), $atts));
	
	$contact_details = get_option( 'cx_contactdeets' );
	if (isset($contact_details['main_email'])) {
		$user_email = $contact_details['main_email'];
	} else {
		$user_email = '#';
	}
	
	if ( ($link == 'true') && ($linktext != 'false') ) {
		$email = '<a href="mailto:' . $user_email . '">' . $linktext . '</a>';
	} elseif ($link == 'true') {
		$email = '<a href="mailto:' . $user_email . '">' . $user_email . '</a>';
	} else {
		$email = $user_email;
	}
	
	return $email;  
}

function cx_sc_contactdeets_address($atts, $content = null) {
	extract(shortcode_atts(array(
		"postcode" => 'true',
		"map" => 'false'
	), $atts));
	
	$contact_details = get_option( 'cx_contactdeets' );
	
	if ($map == 'true') {
		$address = '<iframe class="map" src="' . $contact_details['address_1_map'] . '" frameborder="0" style="border:0"></iframe>';
	} elseif ($postcode == 'true') {
		$address = $contact_details['address_1'] . ' ' . $contact_details['address_1_pc'];
	} elseif ($postcode == 'only') {
		$address = $contact_details['address_1_pc'];		
	} elseif ($postcode == 'false') {
		$address = $contact_details['address_1'];		
	}
		
	return $address;  
}

function cx_sc_contactdeets_phone($atts, $content = null) {
	extract(shortcode_atts(array(
		"link" => 'true',
		"linktext" => 'false',
		"class" => ''
	), $atts));
	
	$contact_details = get_option( 'cx_contactdeets' );
	
	if ( ($link == 'true') && ($linktext != 'false') ) {
		$phone = '<a class="'.$class.'" href="tel:' . $contact_details['phone_1_ac'] . $contact_details['phone_1'] . '">' . $linktext . '</a>';
	} elseif ($link == 'true') {
		$phone = '<a class="'.$class.'" href="tel:' . $contact_details['phone_1_ac'] . $contact_details['phone_1'] . '">' . $contact_details['phone_1_ac'] . ' ' . $contact_details['phone_1'] . '</a>';
	} else {
		$phone = $contact_details['phone_1_ac'] . ' ' . $contact_details['phone_1'];
	}
	
	return $phone;  
}
function cx_sc_contactdeets_twitter($atts, $content = null) {
	extract(shortcode_atts(array(
		"link" => 'true',
		"linktext" => 'username',
		"icon" => 'false'
	), $atts));
	
	$svg = '<svg xmlns="http://www.w3.org/2000/svg" version="1.1" x="0" y="0" viewBox="0 0 72 67.2" enable-background="new 0 0 72 67.235" xml:space="preserve"><defs><rect x="1.5" width="272" height="67.3"/></defs><clipPath><use overflow="visible"/></clipPath><path clip-path="url(#SVGID_2_)" d="M273.5 12.6C273.5 5.7 267.8 0 260.7 0h-42.7c-7.1 0-12.8 5.7-12.8 12.6v42.1c0 7 5.7 12.6 12.8 12.6h42.7c7.1 0 12.8-5.7 12.8-12.6V12.6zM256.4 32.2v7h-2.9v-7h-5.7l0-2.8h5.7v-5.6h2.9v5.6h5.7v2.8H256.4zM243.5 12.6h-3.7c2.5 2.5 4.2 4.5 4.2 8.3 0 7.2-6.7 8.1-6.7 11.7 0 3.6 8.7 5 8.7 12.8 0 8-8.9 11.4-15.7 11.4 -5.4 0-12.9-2.1-12.9-8.7 0-3.1 2-5.7 4.6-7.4 3.3-2 7.6-2.5 11.4-2.8 -1-1.3-1.8-2.5-1.8-4.1 0-0.8 0.2-1.6 0.6-2.4 -0.6 0.1-1.3 0.1-1.9 0.1 -5.5 0-9.9-3.9-9.9-9.5 0-8 7.8-12.4 15.1-12.4h11.8L243.5 12.6zM238.7 23.9c0-4.1-2.4-11.1-7.5-11.1 -3.8 0-5.5 3.2-5.5 6.4 0 4.2 2.4 10.7 7.5 10.7C236.8 30 238.7 27.2 238.7 23.9M242 47.8c0-3.8-3.8-6-6.5-8 -0.5-0.1-0.9-0.1-1.4-0.1 -4.6 0-11.4 1.4-11.4 7.2 0 5.4 5.9 7.4 10.5 7.4C237.4 54.3 242 52.6 242 47.8M172.1 54.7V12.6C172.1 5.7 166.4 0 159.3 0h-42.7c-7.1 0-12.8 5.7-12.8 12.6v42.1c0 7 5.7 12.6 12.8 12.6h24.2V40.7h-10v-9.8h10v-7.3c0-8.7 5.5-13.4 13.4-13.4 3.7 0 6.6 0.3 8 0.4v9.1l-5.9 0c-4.3 0-5.5 2-5.5 4.9v6.3h10.4l-1.3 9.8h-9v26.6h8.5C166.4 67.3 172.1 61.6 172.1 54.7M71.6 14.3c-2.6 1.1-5.4 1.9-8.3 2.2 3-1.8 5.3-4.5 6.3-7.8 -2.8 1.6-5.9 2.8-9.1 3.4 -2.6-2.8-6.4-4.5-10.5-4.5 -8 0-14.4 6.4-14.4 14.1 0 1.1 0.1 2.2 0.4 3.2C24.1 24.4 13.5 18.8 6.4 10.2c-1.2 2.1-2 4.5-2 7.1 0 4.9 2.5 9.2 6.4 11.8 -2.4-0.1-4.6-0.7-6.5-1.8v0.2c0 6.9 4.9 12.6 11.5 13.9 -1.2 0.3-2.5 0.5-3.8 0.5 -0.9 0-1.8-0.1-2.7-0.2 1.8 5.6 7.1 9.7 13.4 9.8 -4.9 3.8-11.1 6-17.8 6 -1.2 0-2.3 0-3.5-0.2 6.4 4 13.9 6.4 22.1 6.4 26.4 0 40.9-21.6 40.9-40.3 0-0.6 0-1.2 0-1.8C67.2 19.6 69.7 17.1 71.6 14.3"/></svg>';
			
	$contact_details = get_option( 'cx_contactdeets' );
	$username = $contact_details['twitter'];
	$url = 'https://twitter.com/';
	
	if ( ($icon == 'true') && ($linktext == 'false') ) {
		$social_link = '<a href="' . $url . $username . '" class="social-tw icon notext">'.$svg.'</a>';
	} elseif ($icon == 'true') {
		$social_link = '<a href="' . $url . $username . '" class="social-tw icon cx-social-icon">'.$svg.'Follow us on Twitter</a>';
	} elseif ($link == 'false') {
		$social_link = '@'.$username;
	} elseif ($linktext != 'username') {
		$social_link = '<a class="social-tw noicon" href="' . $url . $username . '">'. $linktext .'</a>';
	} else {
		$social_link = '<a class="social-tw noicon" href="' . $url . $username . '">@'. $username .'</a>';
	}

	return $social_link;
}
function cx_sc_contactdeets_facebook($atts, $content = null) {
	extract(shortcode_atts(array(
		"link" => 'true',
		"linktext" => 'Find us on Facebook',
		"icon" => 'false'
	), $atts));
	
	$svg = '<svg xmlns="http://www.w3.org/2000/svg" version="1.1" x="0" y="0" viewBox="0 0 68.8 67.2" enable-background="new 0 0 68.833 67.235" xml:space="preserve"><defs><rect x="-102" width="272" height="67.3"/></defs><clipPath><use overflow="visible"/></clipPath><path clip-path="url(#SVGID_2_)" d="M170 12.6C170 5.7 164.3 0 157.2 0h-42.7c-7.1 0-12.8 5.7-12.8 12.6v42.1c0 7 5.7 12.6 12.8 12.6h42.7c7.1 0 12.8-5.7 12.8-12.6V12.6zM152.9 32.2v7h-2.9v-7h-5.7l0-2.8h5.7v-5.6h2.9v5.6h5.7v2.8H152.9zM140 12.6h-3.7c2.5 2.5 4.2 4.5 4.2 8.3 0 7.2-6.7 8.1-6.7 11.7 0 3.6 8.7 5 8.7 12.8 0 8-8.9 11.4-15.7 11.4 -5.4 0-12.9-2.1-12.9-8.7 0-3.1 2-5.7 4.6-7.4 3.3-2 7.6-2.5 11.4-2.8 -1-1.3-1.8-2.5-1.8-4.1 0-0.8 0.2-1.6 0.6-2.4 -0.6 0.1-1.3 0.1-1.9 0.1 -5.5 0-9.9-3.9-9.9-9.5 0-8 7.8-12.4 15.1-12.4h11.8L140 12.6zM135.2 23.9c0-4.1-2.4-11.1-7.5-11.1 -3.8 0-5.5 3.2-5.5 6.4 0 4.2 2.4 10.7 7.5 10.7C133.3 30 135.2 27.2 135.2 23.9M138.5 47.8c0-3.8-3.8-6-6.5-8 -0.5-0.1-0.9-0.1-1.4-0.1 -4.6 0-11.4 1.4-11.4 7.2 0 5.4 5.9 7.4 10.5 7.4C133.9 54.3 138.5 52.6 138.5 47.8M68.6 54.7V12.6C68.6 5.7 62.9 0 55.8 0H13.1C6 0 0.3 5.7 0.3 12.6v42.1c0 7 5.7 12.6 12.8 12.6h24.2V40.7h-10v-9.8h10v-7.3c0-8.7 5.5-13.4 13.4-13.4 3.7 0 6.6 0.3 8 0.4v9.1l-5.9 0c-4.3 0-5.5 2-5.5 4.9v6.3h10.4l-1.3 9.8h-9v26.6h8.5C62.9 67.3 68.6 61.6 68.6 54.7M-31.9 14.3c-2.6 1.1-5.4 1.9-8.3 2.2 3-1.8 5.3-4.5 6.3-7.8 -2.8 1.6-5.9 2.8-9.1 3.4 -2.6-2.8-6.4-4.5-10.5-4.5 -8 0-14.4 6.4-14.4 14.1 0 1.1 0.1 2.2 0.4 3.2 -11.9-0.6-22.6-6.2-29.6-14.8 -1.2 2.1-2 4.5-2 7.1 0 4.9 2.5 9.2 6.4 11.8 -2.4-0.1-4.6-0.7-6.5-1.8v0.2c0 6.9 4.9 12.6 11.5 13.9 -1.2 0.3-2.5 0.5-3.8 0.5 -0.9 0-1.8-0.1-2.7-0.2 1.8 5.6 7.1 9.7 13.4 9.8 -4.9 3.8-11.1 6-17.8 6 -1.2 0-2.3 0-3.5-0.2 6.4 4 13.9 6.4 22.1 6.4 26.4 0 40.9-21.6 40.9-40.3 0-0.6 0-1.2 0-1.8C-36.3 19.6-33.8 17.1-31.9 14.3"/></svg>';
			
	$contact_details = get_option( 'cx_contactdeets' );
	$pagename = $contact_details['facebook'];
	$url = '';
	
	if ( ($icon == 'true') && ($linktext == 'false') ) {
		$social_link = '<a href="' . $url . $pagename . '" class="social-fb icon notext">'.$svg.'</a>';
	} elseif ($icon == 'true') {
		$social_link = '<a href="' . $url . $pagename . '" class="social-fb icon cx-social-icon">' . $svg . $linktext . '</a>';
	} else {
		$social_link = '<a class="social-fb noicon" href="' . $url . $pagename . '">'. $linktext .'</a>';
	}

	return $social_link;
}

function cx_sc_contactdeets_gplus($atts, $content = null) {
	extract(shortcode_atts(array(
		"link" => 'true',
		"linktext" => 'Find us on Google Plus',
		"icon" => 'false'
	), $atts));
	
	$svg = '<svg xmlns="http://www.w3.org/2000/svg" version="1.1" x="0" y="0" viewBox="0 0 68.7 67.2" enable-background="new 0 0 68.667 67.235" xml:space="preserve"><defs><rect x="-203.3" /></defs><clipPath><use overflow="visible"/></clipPath><path clip-path="url(#SVGID_2_)" d="M68.7 12.6C68.7 5.7 62.9 0 55.9 0H13.1C6 0 0.3 5.7 0.3 12.6v42.1c0 7 5.7 12.6 12.8 12.6h42.7c7.1 0 12.8-5.7 12.8-12.6V12.6zM51.6 32.2v7h-2.9v-7h-5.7L43 29.4h5.7v-5.6h2.9v5.6h5.7v2.8H51.6zM38.6 12.6h-3.7c2.5 2.5 4.2 4.5 4.2 8.3 0 7.2-6.7 8.1-6.7 11.7 0 3.6 8.7 5 8.7 12.8 0 8-8.9 11.4-15.7 11.4 -5.4 0-12.9-2.1-12.9-8.7 0-3.1 2-5.7 4.6-7.4 3.3-2 7.6-2.5 11.4-2.8 -1-1.3-1.8-2.5-1.8-4.1 0-0.8 0.2-1.6 0.6-2.4 -0.6 0.1-1.3 0.1-1.9 0.1 -5.5 0-9.9-3.9-9.9-9.5 0-8 7.8-12.4 15.1-12.4h11.8L38.6 12.6zM33.9 23.9c0-4.1-2.4-11.1-7.5-11.1 -3.8 0-5.5 3.2-5.5 6.4 0 4.2 2.4 10.7 7.5 10.7C32 30 33.9 27.2 33.9 23.9M37.2 47.8c0-3.8-3.8-6-6.5-8 -0.5-0.1-0.9-0.1-1.4-0.1 -4.6 0-11.4 1.4-11.4 7.2 0 5.4 5.9 7.4 10.5 7.4C32.6 54.3 37.2 52.6 37.2 47.8M-32.7 54.7V12.6C-32.7 5.7-38.4 0-45.5 0H-88.2c-7.1 0-12.8 5.7-12.8 12.6v42.1c0 7 5.7 12.6 12.8 12.6h24.2V40.7h-10v-9.8h10v-7.3c0-8.7 5.5-13.4 13.4-13.4 3.7 0 6.6 0.3 8 0.4v9.1l-5.9 0c-4.3 0-5.5 2-5.5 4.9v6.3h10.4l-1.3 9.8h-9v26.6h8.5C-38.4 67.3-32.7 61.6-32.7 54.7M-133.2 14.3c-2.6 1.1-5.4 1.9-8.3 2.2 3-1.8 5.3-4.5 6.3-7.8 -2.8 1.6-5.9 2.8-9.1 3.4 -2.6-2.8-6.4-4.5-10.5-4.5 -8 0-14.4 6.4-14.4 14.1 0 1.1 0.1 2.2 0.4 3.2 -11.9-0.6-22.6-6.2-29.6-14.8 -1.2 2.1-2 4.5-2 7.1 0 4.9 2.5 9.2 6.4 11.8 -2.4-0.1-4.6-0.7-6.5-1.8v0.2c0 6.9 4.9 12.6 11.5 13.9 -1.2 0.3-2.5 0.5-3.8 0.5 -0.9 0-1.8-0.1-2.7-0.2 1.8 5.6 7.1 9.7 13.4 9.8 -4.9 3.8-11.1 6-17.8 6 -1.2 0-2.3 0-3.5-0.2 6.4 4 13.9 6.4 22.1 6.4 26.4 0 40.9-21.6 40.9-40.3 0-0.6 0-1.2 0-1.8C-137.6 19.6-135.1 17.1-133.2 14.3"/></svg>';
	
	$contact_details = get_option( 'cx_contactdeets' );
	$pagename = $contact_details['gplus'];
	$url = '';
	
	if ( ($icon == 'true') && ($linktext == 'false') ) {
		$social_link = '<a href="' . $url . $pagename . '" class="social-gplus icon notext">'.$svg.'</a>';
	} elseif ($icon == 'true') {
		$social_link = '<a href="' . $url . $pagename . '" class="social-gplus icon cx-social-icon">' . $svg . $linktext . '</a>';
	} else {
		$social_link = '<a class="social-gplus noicon" href="' . $url . $pagename . '">'. $linktext .'</a>';
	}

	return $social_link;
}

add_shortcode('contact-email', 'cx_sc_contactdeets_email');
add_shortcode('contact-address', 'cx_sc_contactdeets_address');
add_shortcode('contact-postcode', 'cx_sc_contactdeets_address_pc');
add_shortcode('contact-phone', 'cx_sc_contactdeets_phone');

add_shortcode('social-twitter', 'cx_sc_contactdeets_twitter');
add_shortcode('social-facebook', 'cx_sc_contactdeets_facebook');
add_shortcode('social-gplus', 'cx_sc_contactdeets_gplus');

/*************************************
* Shortcodes Part 2: Add button to Tiny MCE
*************************************/

function register_button_cx_contactdeets( $buttons ) {
   array_push( $buttons, "deets_email", "deets_phone", "deets_address", "deets_tw", "deets_fb", "deets_gplus" );
   return $buttons;
}

function add_plugin_cx_contactdeets( $plugin_array ) {
	$plugin_array['deets_email'] = plugins_url('/js/contactdeets.js',__file__);
	$plugin_array['deets_phone'] = plugins_url('/js/contactdeets.js',__file__);
	$plugin_array['deets_address'] = plugins_url('/js/contactdeets.js',__file__);
   $plugin_array['deets_tw'] = plugins_url('/js/contactdeets.js',__file__);
   $plugin_array['deets_fb'] = plugins_url('/js/contactdeets.js',__file__);
   $plugin_array['deets_gplus'] = plugins_url('/js/contactdeets.js',__file__);
   return $plugin_array;
}

function cx_contactdeets_button() {

   if ( ! current_user_can('edit_posts') && ! current_user_can('edit_pages') ) {
      return;
   }

   if ( get_user_option('rich_editing') == 'true' ) {
      add_filter( 'mce_external_plugins', 'add_plugin_cx_contactdeets' );
      add_filter( 'mce_buttons_2', 'register_button_cx_contactdeets' );
   }

}

add_action('init', 'cx_contactdeets_button');

?>