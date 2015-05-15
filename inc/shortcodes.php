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
		"icon" => 'false',
		"user" => 'false'
	), $atts));
	
	#$svg = '<svg xmlns="http://www.w3.org/2000/svg" version="1.1" x="0" y="0" viewBox="0 0 72 67.2" enable-background="new 0 0 72 67.235" xml:space="preserve"><defs><rect x="1.5" width="272" height="67.3"/></defs><clipPath><use overflow="hidden"/></clipPath><path clip-path="url(#SVGID_2_)" d="M273.5 12.6C273.5 5.7 267.8 0 260.7 0h-42.7c-7.1 0-12.8 5.7-12.8 12.6v42.1c0 7 5.7 12.6 12.8 12.6h42.7c7.1 0 12.8-5.7 12.8-12.6V12.6zM256.4 32.2v7h-2.9v-7h-5.7l0-2.8h5.7v-5.6h2.9v5.6h5.7v2.8H256.4zM243.5 12.6h-3.7c2.5 2.5 4.2 4.5 4.2 8.3 0 7.2-6.7 8.1-6.7 11.7 0 3.6 8.7 5 8.7 12.8 0 8-8.9 11.4-15.7 11.4 -5.4 0-12.9-2.1-12.9-8.7 0-3.1 2-5.7 4.6-7.4 3.3-2 7.6-2.5 11.4-2.8 -1-1.3-1.8-2.5-1.8-4.1 0-0.8 0.2-1.6 0.6-2.4 -0.6 0.1-1.3 0.1-1.9 0.1 -5.5 0-9.9-3.9-9.9-9.5 0-8 7.8-12.4 15.1-12.4h11.8L243.5 12.6zM238.7 23.9c0-4.1-2.4-11.1-7.5-11.1 -3.8 0-5.5 3.2-5.5 6.4 0 4.2 2.4 10.7 7.5 10.7C236.8 30 238.7 27.2 238.7 23.9M242 47.8c0-3.8-3.8-6-6.5-8 -0.5-0.1-0.9-0.1-1.4-0.1 -4.6 0-11.4 1.4-11.4 7.2 0 5.4 5.9 7.4 10.5 7.4C237.4 54.3 242 52.6 242 47.8M172.1 54.7V12.6C172.1 5.7 166.4 0 159.3 0h-42.7c-7.1 0-12.8 5.7-12.8 12.6v42.1c0 7 5.7 12.6 12.8 12.6h24.2V40.7h-10v-9.8h10v-7.3c0-8.7 5.5-13.4 13.4-13.4 3.7 0 6.6 0.3 8 0.4v9.1l-5.9 0c-4.3 0-5.5 2-5.5 4.9v6.3h10.4l-1.3 9.8h-9v26.6h8.5C166.4 67.3 172.1 61.6 172.1 54.7M71.6 14.3c-2.6 1.1-5.4 1.9-8.3 2.2 3-1.8 5.3-4.5 6.3-7.8 -2.8 1.6-5.9 2.8-9.1 3.4 -2.6-2.8-6.4-4.5-10.5-4.5 -8 0-14.4 6.4-14.4 14.1 0 1.1 0.1 2.2 0.4 3.2C24.1 24.4 13.5 18.8 6.4 10.2c-1.2 2.1-2 4.5-2 7.1 0 4.9 2.5 9.2 6.4 11.8 -2.4-0.1-4.6-0.7-6.5-1.8v0.2c0 6.9 4.9 12.6 11.5 13.9 -1.2 0.3-2.5 0.5-3.8 0.5 -0.9 0-1.8-0.1-2.7-0.2 1.8 5.6 7.1 9.7 13.4 9.8 -4.9 3.8-11.1 6-17.8 6 -1.2 0-2.3 0-3.5-0.2 6.4 4 13.9 6.4 22.1 6.4 26.4 0 40.9-21.6 40.9-40.3 0-0.6 0-1.2 0-1.8C67.2 19.6 69.7 17.1 71.6 14.3"/></svg>';

	$svg = '<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 612 792" enable-background="new 0 0 612 792" xml:space="preserve">';
	$svg .= '<g>';
	$svg .= '<path d="M608.6,231.95c-22.1,9.35-45.899,16.15-70.55,18.7c25.5-15.3,45.05-38.25,53.55-66.3c-23.8,13.6-50.149,23.8-77.35,28.9 C492.15,189.45,459.85,175,425,175c-68,0-122.4,54.4-122.4,119.85c0,9.35,0.851,18.7,3.4,27.2 C204.85,317.8,114.75,270.2,54.4,197.1c-10.2,17.85-17,38.25-17,60.35c0,41.65,21.25,78.2,54.4,100.3 c-20.4-0.85-39.1-5.95-55.25-15.3v1.7c0,58.65,41.65,107.1,97.75,118.15c-10.2,2.55-21.25,4.25-32.3,4.25 c-7.65,0-15.3-0.85-22.95-1.7c15.3,47.601,60.35,82.45,113.9,83.301c-41.65,32.3-94.35,51-151.3,51c-10.2,0-19.55,0-29.75-1.7 c54.4,34,118.15,54.399,187.85,54.399c224.4,0,347.65-183.6,347.65-342.55c0-5.1,0-10.2,0-15.3 C571.2,277,592.45,255.75,608.6,231.95"/>';
	$svg .= '</g>';
	$svg .= '</svg>';

	$contact_details = get_option( 'cx_contactdeets' );
	
	if ($user == 'false') {
		$username = $contact_details['twitter'];
	} else {
		$username = esc_attr( $user );
	}
	$url = 'https://twitter.com/';
	
	if ( ($icon == 'true') && ($linktext == 'false') ) {
		$social_link = '<a href="' . $url . $username . '" class="social-tw icon notext">'.$svg.'<span style="display:none;" class="svg-fallback">Follow @'.$username.' on Twitter</span></a>';
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
function cx_sc_contactdeets_linkedin($atts, $content = null) {
	extract(shortcode_atts(array(
		"link" => 'true',
		"linktext" => 'Follow us on LinkedIn',
		"icon" => 'false'
	), $atts));
	
    $svg = '<svg xmlns="http://www.w3.org/2000/svg" version="1.1" x="0" y="0" viewBox="0 0 100 100" enable-background="new 0 0 100 100" xml:space="preserve"><path d="M92.5 0.2H7.5c-4.1 0-7.4 3.2-7.4 7.2v85.3c0 4 3.3 7.2 7.4 7.2h84.9c4.1 0 7.4-3.2 7.4-7.2V7.3C99.8 3.4 96.5 0.2 92.5 0.2zM29.7 85.1h-14.8V37.5h14.8V85.1zM22.3 31c-4.7 0-8.6-3.8-8.6-8.6 0-4.7 3.8-8.6 8.6-8.6 4.7 0 8.6 3.8 8.6 8.6C30.9 27.2 27.1 31 22.3 31zM85.1 85.1H70.3V62c0-5.5-0.1-12.6-7.7-12.6 -7.7 0-8.9 6-8.9 12.2v23.5H39V37.5H53.2v6.5h0.2c2-3.7 6.8-7.7 14-7.7 15 0 17.7 9.8 17.7 22.7v26.1H85.1z"/></svg>';
			
	$contact_details = get_option( 'cx_contactdeets' );
	$pagename = $contact_details['linkedin'];
	$url = '';
	
	if ( ($icon == 'true') && ($linktext == 'false') ) {
		$social_link = '<a href="' . $url . $pagename . '" class="social-li icon notext">'.$svg.'<span style="display:none;" class="svg-fallback">Follow on LinkedIn</span></a>';
	} elseif ($icon == 'true') {
		$social_link = '<a href="' . $url . $pagename . '" class="social-li icon cx-social-icon">' . $svg . $linktext . '</a>';
	} else {
		$social_link = '<a class="social-li noicon" href="' . $url . $pagename . '">'. $linktext .'</a>';
	}

	return $social_link;
}

function cx_sc_contactdeets_facebook($atts, $content = null) {
	extract(shortcode_atts(array(
		"link" => 'true',
		"linktext" => 'Find us on Facebook',
		"page" => 'false',
		"icon" => 'false'
	), $atts));
	
	#$svg = '<svg xmlns="http://www.w3.org/2000/svg" version="1.1" x="0" y="0" viewBox="0 0 68.8 67.2" enable-background="new 0 0 68.833 67.235" xml:space="preserve"><defs><rect x="-102" width="272" height="67.3"/></defs><clipPath><use overflow="visible"/></clipPath><path clip-path="url(#SVGID_2_)" d="M170 12.6C170 5.7 164.3 0 157.2 0h-42.7c-7.1 0-12.8 5.7-12.8 12.6v42.1c0 7 5.7 12.6 12.8 12.6h42.7c7.1 0 12.8-5.7 12.8-12.6V12.6zM152.9 32.2v7h-2.9v-7h-5.7l0-2.8h5.7v-5.6h2.9v5.6h5.7v2.8H152.9zM140 12.6h-3.7c2.5 2.5 4.2 4.5 4.2 8.3 0 7.2-6.7 8.1-6.7 11.7 0 3.6 8.7 5 8.7 12.8 0 8-8.9 11.4-15.7 11.4 -5.4 0-12.9-2.1-12.9-8.7 0-3.1 2-5.7 4.6-7.4 3.3-2 7.6-2.5 11.4-2.8 -1-1.3-1.8-2.5-1.8-4.1 0-0.8 0.2-1.6 0.6-2.4 -0.6 0.1-1.3 0.1-1.9 0.1 -5.5 0-9.9-3.9-9.9-9.5 0-8 7.8-12.4 15.1-12.4h11.8L140 12.6zM135.2 23.9c0-4.1-2.4-11.1-7.5-11.1 -3.8 0-5.5 3.2-5.5 6.4 0 4.2 2.4 10.7 7.5 10.7C133.3 30 135.2 27.2 135.2 23.9M138.5 47.8c0-3.8-3.8-6-6.5-8 -0.5-0.1-0.9-0.1-1.4-0.1 -4.6 0-11.4 1.4-11.4 7.2 0 5.4 5.9 7.4 10.5 7.4C133.9 54.3 138.5 52.6 138.5 47.8M68.6 54.7V12.6C68.6 5.7 62.9 0 55.8 0H13.1C6 0 0.3 5.7 0.3 12.6v42.1c0 7 5.7 12.6 12.8 12.6h24.2V40.7h-10v-9.8h10v-7.3c0-8.7 5.5-13.4 13.4-13.4 3.7 0 6.6 0.3 8 0.4v9.1l-5.9 0c-4.3 0-5.5 2-5.5 4.9v6.3h10.4l-1.3 9.8h-9v26.6h8.5C62.9 67.3 68.6 61.6 68.6 54.7M-31.9 14.3c-2.6 1.1-5.4 1.9-8.3 2.2 3-1.8 5.3-4.5 6.3-7.8 -2.8 1.6-5.9 2.8-9.1 3.4 -2.6-2.8-6.4-4.5-10.5-4.5 -8 0-14.4 6.4-14.4 14.1 0 1.1 0.1 2.2 0.4 3.2 -11.9-0.6-22.6-6.2-29.6-14.8 -1.2 2.1-2 4.5-2 7.1 0 4.9 2.5 9.2 6.4 11.8 -2.4-0.1-4.6-0.7-6.5-1.8v0.2c0 6.9 4.9 12.6 11.5 13.9 -1.2 0.3-2.5 0.5-3.8 0.5 -0.9 0-1.8-0.1-2.7-0.2 1.8 5.6 7.1 9.7 13.4 9.8 -4.9 3.8-11.1 6-17.8 6 -1.2 0-2.3 0-3.5-0.2 6.4 4 13.9 6.4 22.1 6.4 26.4 0 40.9-21.6 40.9-40.3 0-0.6 0-1.2 0-1.8C-36.3 19.6-33.8 17.1-31.9 14.3"/></svg>';
	$svg = '<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 612 792" enable-background="new 0 0 612 792" xml:space="preserve"><g><path d="M596.275,575.35V217.5c0-58.65-48.449-107.1-108.801-107.1h-362.95c-60.35,0-108.8,48.45-108.8,107.1v357.85 c0,59.5,48.45,107.101,108.8,107.101h205.7V456.35h-85v-83.3h85V311c0-73.95,46.75-113.9,113.9-113.9c31.451,0,56.1,2.55,68,3.4 v77.35h-50.15c-36.549,0-46.75,17-46.75,41.65v53.55h88.4l-11.049,83.3h-76.5V682.45h72.25 C547.826,682.45,596.275,634,596.275,575.35"/></g></svg>';

	$contact_details = get_option( 'cx_contactdeets' );
	$pagename = $contact_details['facebook'];

	if ($page == 'false') {
		$pagename = $contact_details['facebook'];
	} else {
		$pagename = esc_attr( $page );
	}

	$url = '';
	
	if ( ($icon == 'true') && ($linktext == 'false') ) {
		$social_link = '<a href="' . $url . $pagename . '" class="social-fb icon notext">'.$svg.'<span style="display:none;" class="svg-fallback">Find us on Facebook</span></a>';
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
	
	#$svg = '<svg xmlns="http://www.w3.org/2000/svg" version="1.1" x="0" y="0" viewBox="0 0 68.7 67.2" enable-background="new 0 0 68.667 67.235" xml:space="preserve"><defs><rect x="-203.3" /></defs><clipPath><use overflow="visible"/></clipPath><path clip-path="url(#SVGID_2_)" d="M68.7 12.6C68.7 5.7 62.9 0 55.9 0H13.1C6 0 0.3 5.7 0.3 12.6v42.1c0 7 5.7 12.6 12.8 12.6h42.7c7.1 0 12.8-5.7 12.8-12.6V12.6zM51.6 32.2v7h-2.9v-7h-5.7L43 29.4h5.7v-5.6h2.9v5.6h5.7v2.8H51.6zM38.6 12.6h-3.7c2.5 2.5 4.2 4.5 4.2 8.3 0 7.2-6.7 8.1-6.7 11.7 0 3.6 8.7 5 8.7 12.8 0 8-8.9 11.4-15.7 11.4 -5.4 0-12.9-2.1-12.9-8.7 0-3.1 2-5.7 4.6-7.4 3.3-2 7.6-2.5 11.4-2.8 -1-1.3-1.8-2.5-1.8-4.1 0-0.8 0.2-1.6 0.6-2.4 -0.6 0.1-1.3 0.1-1.9 0.1 -5.5 0-9.9-3.9-9.9-9.5 0-8 7.8-12.4 15.1-12.4h11.8L38.6 12.6zM33.9 23.9c0-4.1-2.4-11.1-7.5-11.1 -3.8 0-5.5 3.2-5.5 6.4 0 4.2 2.4 10.7 7.5 10.7C32 30 33.9 27.2 33.9 23.9M37.2 47.8c0-3.8-3.8-6-6.5-8 -0.5-0.1-0.9-0.1-1.4-0.1 -4.6 0-11.4 1.4-11.4 7.2 0 5.4 5.9 7.4 10.5 7.4C32.6 54.3 37.2 52.6 37.2 47.8M-32.7 54.7V12.6C-32.7 5.7-38.4 0-45.5 0H-88.2c-7.1 0-12.8 5.7-12.8 12.6v42.1c0 7 5.7 12.6 12.8 12.6h24.2V40.7h-10v-9.8h10v-7.3c0-8.7 5.5-13.4 13.4-13.4 3.7 0 6.6 0.3 8 0.4v9.1l-5.9 0c-4.3 0-5.5 2-5.5 4.9v6.3h10.4l-1.3 9.8h-9v26.6h8.5C-38.4 67.3-32.7 61.6-32.7 54.7M-133.2 14.3c-2.6 1.1-5.4 1.9-8.3 2.2 3-1.8 5.3-4.5 6.3-7.8 -2.8 1.6-5.9 2.8-9.1 3.4 -2.6-2.8-6.4-4.5-10.5-4.5 -8 0-14.4 6.4-14.4 14.1 0 1.1 0.1 2.2 0.4 3.2 -11.9-0.6-22.6-6.2-29.6-14.8 -1.2 2.1-2 4.5-2 7.1 0 4.9 2.5 9.2 6.4 11.8 -2.4-0.1-4.6-0.7-6.5-1.8v0.2c0 6.9 4.9 12.6 11.5 13.9 -1.2 0.3-2.5 0.5-3.8 0.5 -0.9 0-1.8-0.1-2.7-0.2 1.8 5.6 7.1 9.7 13.4 9.8 -4.9 3.8-11.1 6-17.8 6 -1.2 0-2.3 0-3.5-0.2 6.4 4 13.9 6.4 22.1 6.4 26.4 0 40.9-21.6 40.9-40.3 0-0.6 0-1.2 0-1.8C-137.6 19.6-135.1 17.1-133.2 14.3"/></svg>';
	$svg = '<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 612 792" enable-background="new 0 0 612 792" xml:space="preserve"><g><path d="M594.275,217.5c0-58.65-48.451-107.1-108.801-107.1h-362.95c-60.35,0-108.8,48.45-108.8,107.1v357.85 c0,59.5,48.45,107.101,108.8,107.101h362.95c60.35,0,108.801-48.45,108.801-107.101V217.5z M448.926,384.1v59.5h-24.65v-59.5 h-48.451v-23.8h48.451v-47.6h24.65v47.6h48.449v23.8H448.926z M339.275,217.5h-31.451c21.25,21.25,35.701,38.25,35.701,70.55 c0,61.2-56.951,68.85-56.951,99.45c0,30.6,73.951,42.5,73.951,108.8c0,68-75.651,96.9-133.451,96.9 c-45.899,0-109.649-17.851-109.649-73.95c0-26.35,17-48.45,39.1-62.9c28.05-17,64.601-21.25,96.9-23.8 c-8.5-11.05-15.301-21.25-15.301-34.85c0-6.8,1.7-13.6,5.101-20.4c-5.101,0.85-11.05,0.85-16.15,0.85 c-46.75,0-84.149-33.15-84.149-80.75c0-68,66.3-105.4,128.35-105.4h100.301L339.275,217.5z M298.475,313.55 c0-34.85-20.4-94.35-63.75-94.35c-32.3,0-46.75,27.2-46.75,54.4c0,35.7,20.399,90.95,63.75,90.95 C282.325,365.4,298.475,341.6,298.475,313.55 M326.525,516.7c0-32.3-32.3-51-55.25-68c-4.25-0.851-7.65-0.851-11.9-0.851 c-39.1,0-96.899,11.9-96.899,61.2c0,45.9,50.149,62.9,89.25,62.9C287.425,571.95,326.525,557.5,326.525,516.7"/></g></svg>';
	$contact_details = get_option( 'cx_contactdeets' );
	$pagename = $contact_details['gplus'];
	$url = '';
	
	if ( ($icon == 'true') && ($linktext == 'false') ) {
		$social_link = '<a href="' . $url . $pagename . '" class="social-gplus icon notext">'.$svg.'<span style="display:none;" class="svg-fallback">Find us on Google Plus</span></a>';
	} elseif ($icon == 'true') {
		$social_link = '<a href="' . $url . $pagename . '" class="social-gplus icon cx-social-icon">' . $svg . $linktext . '</a>';
	} else {
		$social_link = '<a class="social-gplus noicon" href="' . $url . $pagename . '">'. $linktext .'</a>';
	}

	return $social_link;
}

function cx_sc_contactdeets_youtube($atts, $content = null) {
	extract(shortcode_atts(array(
		"link" => 'true',
		"linktext" => 'Find us on Youtube',
		"channel" => 'false',
		"icon" => 'false'
	), $atts));
	
	$svg = '<svg xmlns="http://www.w3.org/2000/svg" version="1.1" x="0" y="0" viewBox="0 0 1024 721" enable-background="new 0 0 1024 721" xml:space="preserve"><path d="M1013 156.3c0 0-10-70.4-40.6-101.4 -38.8-40.7-82.4-40.9-102.3-43.3C727.1 1.3 512.7 1.3 512.7 1.3h-0.4c0 0-214.4 0-357.3 10.3 -20 2.4-63.5 2.6-102.3 43.3C22 85.9 12 156.3 12 156.3S1.8 238.9 1.8 321.6v77.5c0 82.7 10.2 165.3 10.2 165.3s10 70.4 40.6 101.4c38.9 40.7 89.9 39.4 112.6 43.7 81.7 7.8 347.3 10.3 347.3 10.3s214.6-0.3 357.6-10.7c20-2.4 63.5-2.6 102.3-43.3 30.6-31 40.6-101.4 40.6-101.4s10.2-82.7 10.2-165.3V321.6C1023.2 238.9 1013 156.3 1013 156.3zM407 493L407 206l276 144L407 493z"/></svg>';
			
	$contact_details = get_option( 'cx_contactdeets' );
	
	if (($channel == 'false') && (isset($contact_details['youtube']))) {
		$channel = $contact_details['youtube'];
	} else {
		$channel = esc_attr( $channel );
	}

	$url = '';
	
	if ( ($icon == 'true') && ($linktext == 'false') ) {
		$social_link = '<a href="' . $url . $channel . '" class="social-yt icon notext">'.$svg.'<span style="display:none;" class="svg-fallback">Find us on YouTube</span></a>';
	} elseif ($icon == 'true') {
		$social_link = '<a href="' . $url . $channel . '" class="social-yt icon cx-social-icon">' . $svg . $linktext . '</a>';
	} else {
		$social_link = '<a class="social-yt noicon" href="' . $url . $channel . '">'. $linktext .'</a>';
	}

	return $social_link;
}


add_shortcode('contact-email', 'cx_sc_contactdeets_email');
add_shortcode('contact-address', 'cx_sc_contactdeets_address');
add_shortcode('contact-postcode', 'cx_sc_contactdeets_address_pc');
add_shortcode('contact-phone', 'cx_sc_contactdeets_phone');

add_shortcode('social-twitter', 'cx_sc_contactdeets_twitter');
add_shortcode('social-linkedin', 'cx_sc_contactdeets_linkedin');
add_shortcode('social-facebook', 'cx_sc_contactdeets_facebook');
add_shortcode('social-youtube', 'cx_sc_contactdeets_youtube');
add_shortcode('social-gplus', 'cx_sc_contactdeets_gplus');

/*************************************
* Shortcodes Part 2: Add button to Tiny MCE
*************************************/

function register_button_cx_contactdeets( $buttons ) {
   array_push( $buttons, "deets_email", "deets_phone", "deets_address", "deets_tw", "deets_li", "deets_fb", "deets_gplus" );
   return $buttons;
}

function add_plugin_cx_contactdeets( $plugin_array ) {
	$plugin_array['deets_email'] = plugins_url('/js/contactdeets.js',__file__);
	$plugin_array['deets_phone'] = plugins_url('/js/contactdeets.js',__file__);
	$plugin_array['deets_address'] = plugins_url('/js/contactdeets.js',__file__);
   $plugin_array['deets_tw'] = plugins_url('/js/contactdeets.js',__file__);
   $plugin_array['deets_li'] = plugins_url('/js/contactdeets.js',__file__);
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