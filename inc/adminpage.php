<?php
class CXSettingsPageContactDeets
{
    /**
     * Holds the values to be used in the fields callbacks
     */
    private $options;

    /**
     * Start up
     */
    public function __construct()
    {
        add_action( 'admin_menu', array( $this, 'add_plugin_page_cx_contactdeets' ) );
        add_action( 'admin_init', array( $this, 'page_init_cx_contactdeets' ) );
    }

    /**
     * Add options page
     */
    public function add_plugin_page_cx_contactdeets()
    {
        // This page will be under "Settings"
        add_options_page(
            'Settings Admin', 
            'Contact Details', 
            'manage_options', 
            'cx-contactdeets-admin', 
            array( $this, 'create_admin_page_cx_contactdeets' )
        );
    }

    /**
     * Options page callback
     */
    public function create_admin_page_cx_contactdeets()
    {
        // Set class property
        $this->options = get_option( 'cx_contactdeets' );
        ?>
        <div class="wrap">
            <?php screen_icon(); ?>
            <h2>Contact details</h2>           
            <form method="post" action="options.php">
            <?php
                // This prints out all hidden setting fields
                settings_fields( 'cx_option_group_contactdeets' );   
                do_settings_sections( 'cx-contactdeets-admin' );
                submit_button();
            ?>
            </form>
            
				<?php 
				
				if (isset( $this->options['main_email'] )) {
					$user_email = esc_attr($this->options['main_email']);
				} else {
					$user_email = 'my.name@example.com';
				}
				
				if (isset( $this->options['address_1'] )) {
					$user_address = esc_attr($this->options['address_1']);
				} else {
					$user_address = 'My House, My Street, My Town.';
				}
				
				if (isset( $this->options['address_1_pc'] )) {
					$user_address_pc = esc_attr($this->options['address_1_pc']);
				} else {
					$user_address_pc = 'XX1 1XX.';
				}

                if (isset( $this->options['address_1_map'] )) {
                    $user_address_map = esc_attr($this->options['address_1_map']);
                } else {
                    $user_address_map = '';
                }
				
				
				if (isset( $this->options['phone_1_ac'] )) {
					$user_phone_ac = esc_attr($this->options['phone_1_ac']);
				} else {
					$user_phone_ac = '00000';
				}
				if (isset( $this->options['phone_1'] )) {
					$user_phone = esc_attr($this->options['phone_1']);
				} else {
					$user_phone = '000000';
				}
				
				if (isset( $this->options['twitter'] )) {
					$user_tw = esc_attr($this->options['twitter']);
				} else {
					$user_tw = 'ablewild';
				}
				if (isset( $this->options['facebook'] )) {
					$link_fb = esc_attr($this->options['facebook']);
				} else {
					$link_fb = '#';
				}
				if (isset( $this->options['gplus'] )) {
					$gplus = esc_attr($this->options['gplus']);
				} else {
					$gplus = '#';
				}
				
				$svg_tw = '<svg style="height: 100%; margin-right:.25em" xmlns="http://www.w3.org/2000/svg" version="1.1" x="0" y="0" viewBox="0 0 72 67.2" enable-background="new 0 0 72 67.235" xml:space="preserve"><defs><rect x="1.5" width="272" height="67.3"/></defs><clipPath><use overflow="visible"/></clipPath><path clip-path="url(#SVGID_2_)" d="M273.5 12.6C273.5 5.7 267.8 0 260.7 0h-42.7c-7.1 0-12.8 5.7-12.8 12.6v42.1c0 7 5.7 12.6 12.8 12.6h42.7c7.1 0 12.8-5.7 12.8-12.6V12.6zM256.4 32.2v7h-2.9v-7h-5.7l0-2.8h5.7v-5.6h2.9v5.6h5.7v2.8H256.4zM243.5 12.6h-3.7c2.5 2.5 4.2 4.5 4.2 8.3 0 7.2-6.7 8.1-6.7 11.7 0 3.6 8.7 5 8.7 12.8 0 8-8.9 11.4-15.7 11.4 -5.4 0-12.9-2.1-12.9-8.7 0-3.1 2-5.7 4.6-7.4 3.3-2 7.6-2.5 11.4-2.8 -1-1.3-1.8-2.5-1.8-4.1 0-0.8 0.2-1.6 0.6-2.4 -0.6 0.1-1.3 0.1-1.9 0.1 -5.5 0-9.9-3.9-9.9-9.5 0-8 7.8-12.4 15.1-12.4h11.8L243.5 12.6zM238.7 23.9c0-4.1-2.4-11.1-7.5-11.1 -3.8 0-5.5 3.2-5.5 6.4 0 4.2 2.4 10.7 7.5 10.7C236.8 30 238.7 27.2 238.7 23.9M242 47.8c0-3.8-3.8-6-6.5-8 -0.5-0.1-0.9-0.1-1.4-0.1 -4.6 0-11.4 1.4-11.4 7.2 0 5.4 5.9 7.4 10.5 7.4C237.4 54.3 242 52.6 242 47.8M172.1 54.7V12.6C172.1 5.7 166.4 0 159.3 0h-42.7c-7.1 0-12.8 5.7-12.8 12.6v42.1c0 7 5.7 12.6 12.8 12.6h24.2V40.7h-10v-9.8h10v-7.3c0-8.7 5.5-13.4 13.4-13.4 3.7 0 6.6 0.3 8 0.4v9.1l-5.9 0c-4.3 0-5.5 2-5.5 4.9v6.3h10.4l-1.3 9.8h-9v26.6h8.5C166.4 67.3 172.1 61.6 172.1 54.7M71.6 14.3c-2.6 1.1-5.4 1.9-8.3 2.2 3-1.8 5.3-4.5 6.3-7.8 -2.8 1.6-5.9 2.8-9.1 3.4 -2.6-2.8-6.4-4.5-10.5-4.5 -8 0-14.4 6.4-14.4 14.1 0 1.1 0.1 2.2 0.4 3.2C24.1 24.4 13.5 18.8 6.4 10.2c-1.2 2.1-2 4.5-2 7.1 0 4.9 2.5 9.2 6.4 11.8 -2.4-0.1-4.6-0.7-6.5-1.8v0.2c0 6.9 4.9 12.6 11.5 13.9 -1.2 0.3-2.5 0.5-3.8 0.5 -0.9 0-1.8-0.1-2.7-0.2 1.8 5.6 7.1 9.7 13.4 9.8 -4.9 3.8-11.1 6-17.8 6 -1.2 0-2.3 0-3.5-0.2 6.4 4 13.9 6.4 22.1 6.4 26.4 0 40.9-21.6 40.9-40.3 0-0.6 0-1.2 0-1.8C67.2 19.6 69.7 17.1 71.6 14.3"/></svg>';
				
				$svg_fb = '<svg style="height: 100%; margin-right:.25em" xmlns="http://www.w3.org/2000/svg" version="1.1" x="0" y="0" viewBox="0 0 68.8 67.2" enable-background="new 0 0 68.833 67.235" xml:space="preserve"><defs><rect x="-102" width="272" height="67.3"/></defs><clipPath><use overflow="visible"/></clipPath><path clip-path="url(#SVGID_2_)" d="M170 12.6C170 5.7 164.3 0 157.2 0h-42.7c-7.1 0-12.8 5.7-12.8 12.6v42.1c0 7 5.7 12.6 12.8 12.6h42.7c7.1 0 12.8-5.7 12.8-12.6V12.6zM152.9 32.2v7h-2.9v-7h-5.7l0-2.8h5.7v-5.6h2.9v5.6h5.7v2.8H152.9zM140 12.6h-3.7c2.5 2.5 4.2 4.5 4.2 8.3 0 7.2-6.7 8.1-6.7 11.7 0 3.6 8.7 5 8.7 12.8 0 8-8.9 11.4-15.7 11.4 -5.4 0-12.9-2.1-12.9-8.7 0-3.1 2-5.7 4.6-7.4 3.3-2 7.6-2.5 11.4-2.8 -1-1.3-1.8-2.5-1.8-4.1 0-0.8 0.2-1.6 0.6-2.4 -0.6 0.1-1.3 0.1-1.9 0.1 -5.5 0-9.9-3.9-9.9-9.5 0-8 7.8-12.4 15.1-12.4h11.8L140 12.6zM135.2 23.9c0-4.1-2.4-11.1-7.5-11.1 -3.8 0-5.5 3.2-5.5 6.4 0 4.2 2.4 10.7 7.5 10.7C133.3 30 135.2 27.2 135.2 23.9M138.5 47.8c0-3.8-3.8-6-6.5-8 -0.5-0.1-0.9-0.1-1.4-0.1 -4.6 0-11.4 1.4-11.4 7.2 0 5.4 5.9 7.4 10.5 7.4C133.9 54.3 138.5 52.6 138.5 47.8M68.6 54.7V12.6C68.6 5.7 62.9 0 55.8 0H13.1C6 0 0.3 5.7 0.3 12.6v42.1c0 7 5.7 12.6 12.8 12.6h24.2V40.7h-10v-9.8h10v-7.3c0-8.7 5.5-13.4 13.4-13.4 3.7 0 6.6 0.3 8 0.4v9.1l-5.9 0c-4.3 0-5.5 2-5.5 4.9v6.3h10.4l-1.3 9.8h-9v26.6h8.5C62.9 67.3 68.6 61.6 68.6 54.7M-31.9 14.3c-2.6 1.1-5.4 1.9-8.3 2.2 3-1.8 5.3-4.5 6.3-7.8 -2.8 1.6-5.9 2.8-9.1 3.4 -2.6-2.8-6.4-4.5-10.5-4.5 -8 0-14.4 6.4-14.4 14.1 0 1.1 0.1 2.2 0.4 3.2 -11.9-0.6-22.6-6.2-29.6-14.8 -1.2 2.1-2 4.5-2 7.1 0 4.9 2.5 9.2 6.4 11.8 -2.4-0.1-4.6-0.7-6.5-1.8v0.2c0 6.9 4.9 12.6 11.5 13.9 -1.2 0.3-2.5 0.5-3.8 0.5 -0.9 0-1.8-0.1-2.7-0.2 1.8 5.6 7.1 9.7 13.4 9.8 -4.9 3.8-11.1 6-17.8 6 -1.2 0-2.3 0-3.5-0.2 6.4 4 13.9 6.4 22.1 6.4 26.4 0 40.9-21.6 40.9-40.3 0-0.6 0-1.2 0-1.8C-36.3 19.6-33.8 17.1-31.9 14.3"/></svg>';
				
				$svg_gplus = '<svg style="height: 100%; margin-right:.25em" xmlns="http://www.w3.org/2000/svg" version="1.1" x="0" y="0" viewBox="0 0 68.7 67.2" enable-background="new 0 0 68.667 67.235" xml:space="preserve"><defs><rect x="-203.3" /></defs><clipPath><use overflow="visible"/></clipPath><path clip-path="url(#SVGID_2_)" d="M68.7 12.6C68.7 5.7 62.9 0 55.9 0H13.1C6 0 0.3 5.7 0.3 12.6v42.1c0 7 5.7 12.6 12.8 12.6h42.7c7.1 0 12.8-5.7 12.8-12.6V12.6zM51.6 32.2v7h-2.9v-7h-5.7L43 29.4h5.7v-5.6h2.9v5.6h5.7v2.8H51.6zM38.6 12.6h-3.7c2.5 2.5 4.2 4.5 4.2 8.3 0 7.2-6.7 8.1-6.7 11.7 0 3.6 8.7 5 8.7 12.8 0 8-8.9 11.4-15.7 11.4 -5.4 0-12.9-2.1-12.9-8.7 0-3.1 2-5.7 4.6-7.4 3.3-2 7.6-2.5 11.4-2.8 -1-1.3-1.8-2.5-1.8-4.1 0-0.8 0.2-1.6 0.6-2.4 -0.6 0.1-1.3 0.1-1.9 0.1 -5.5 0-9.9-3.9-9.9-9.5 0-8 7.8-12.4 15.1-12.4h11.8L38.6 12.6zM33.9 23.9c0-4.1-2.4-11.1-7.5-11.1 -3.8 0-5.5 3.2-5.5 6.4 0 4.2 2.4 10.7 7.5 10.7C32 30 33.9 27.2 33.9 23.9M37.2 47.8c0-3.8-3.8-6-6.5-8 -0.5-0.1-0.9-0.1-1.4-0.1 -4.6 0-11.4 1.4-11.4 7.2 0 5.4 5.9 7.4 10.5 7.4C32.6 54.3 37.2 52.6 37.2 47.8M-32.7 54.7V12.6C-32.7 5.7-38.4 0-45.5 0H-88.2c-7.1 0-12.8 5.7-12.8 12.6v42.1c0 7 5.7 12.6 12.8 12.6h24.2V40.7h-10v-9.8h10v-7.3c0-8.7 5.5-13.4 13.4-13.4 3.7 0 6.6 0.3 8 0.4v9.1l-5.9 0c-4.3 0-5.5 2-5.5 4.9v6.3h10.4l-1.3 9.8h-9v26.6h8.5C-38.4 67.3-32.7 61.6-32.7 54.7M-133.2 14.3c-2.6 1.1-5.4 1.9-8.3 2.2 3-1.8 5.3-4.5 6.3-7.8 -2.8 1.6-5.9 2.8-9.1 3.4 -2.6-2.8-6.4-4.5-10.5-4.5 -8 0-14.4 6.4-14.4 14.1 0 1.1 0.1 2.2 0.4 3.2 -11.9-0.6-22.6-6.2-29.6-14.8 -1.2 2.1-2 4.5-2 7.1 0 4.9 2.5 9.2 6.4 11.8 -2.4-0.1-4.6-0.7-6.5-1.8v0.2c0 6.9 4.9 12.6 11.5 13.9 -1.2 0.3-2.5 0.5-3.8 0.5 -0.9 0-1.8-0.1-2.7-0.2 1.8 5.6 7.1 9.7 13.4 9.8 -4.9 3.8-11.1 6-17.8 6 -1.2 0-2.3 0-3.5-0.2 6.4 4 13.9 6.4 22.1 6.4 26.4 0 40.9-21.6 40.9-40.3 0-0.6 0-1.2 0-1.8C-137.6 19.6-135.1 17.1-133.2 14.3"/></svg>';
				
				
				 ?>
            
            
            <h2>How to display your contact details</h2>
            <p>There are several shortcodes available to you to include your various contact details, many of which have options which change the way your information is displayed. Shortcodes can be typed (or copy/pasted) into any page or blogpost on your website. The following examples should help.</p>
            <h3>Contact details: Email Address</h3>
            <p><code>[contact-email]</code> <b>Result: </b><a href="mailto:<?php echo $user_email; ?>"><?php echo $user_email; ?></a></p>
            <p><code>[contact-email linktext="Email me anytime"]</code> <b>Result: </b><a href="mailto:<?php echo $user_email; ?>">Email me anytime</a></p>
            <p><code>[contact-email link="false"]</code> <b>Result: </b><?php echo $user_email; ?></p>
            <h3>Contact details: Address</h3>
            <p><code>[contact-address]</code> <b>Result: </b><?php echo $user_address . ' ' . $user_address_pc; ?></p>
            <p><code>[contact-address postcode="false"]</code> <b>Result: </b><?php echo $user_address; ?></p>
            <p><code>[contact-address postcode="only"]</code> <b>Result: </b><?php echo $user_address_pc; ?></p>
            <p><code>[contact-address map="true"]</code> <b>Result: </b>An iframe with embedded map will be displayed</p>
            <h3>Contact details: Phone</h3>
            <p><code>[contact-phone]</code> <b>Result: </b>Your phone number as a clickable link which will work on smartphones and desktops through Skype. e.g. <a href="callto://<?php echo $user_phone_ac . $user_phone; ?>"><?php echo $user_phone_ac . ' ' . $user_phone; ?></a></p>
            <p><code>[contact-phone linktext="Call us now"]</code> <b>Result: </b>Your phone number as a clickable link with custom text e.g. <a href="callto://<?php echo $user_phone_ac . $user_phone; ?>">Call us now</a>.</p>
            <p><code>[contact-phone link="false"]</code> <b>Result: </b><?php echo $user_phone_ac . $user_phone; ?></p>
            
            <h3>Social media: Twitter</h3>
            <p><code>[social-twitter]</code> <b>Result: </b><a href="https://twitter.com/<?php echo $user_tw; ?>">@<?php echo $user_tw; ?></a></p>
            <p><code>[social-twitter link="false"]</code> <b>Result: </b>@<?php echo $user_tw; ?></p>
            <p><code>[social-twitter linktext="Follow us on Twitter"]</code> <b>Result: </b><a href="https://twitter.com/<?php echo $user_tw; ?>">Follow us on Twitter</a></p>
            <p><code>[social-twitter icon="true"]</code> <b>Result: </b><a href="https://twitter.com/<?php echo $user_tw; ?>" class="icon" style="height: 1em;  display: inline-block;"><?php echo $svg_tw; ?>Follow us on Twitter</a></p>
            <p><code>[social-twitter icon="true" linktext="false"]</code> <b>Result: </b><a href="https://twitter.com/<?php echo $user_tw; ?>" class="icon" style="height: 3em;  display: inline-block;"><?php echo $svg_tw; ?></a></p>
            
            <h3>Social media: Facebook</h3>
            <p><code>[social-facebook]</code> <b>Result: </b><a href="<?php echo $link_fb; ?>">Find us on Facebook</a></p>
            <p><code>[social-facebook linktext="Like us!"]</code> <b>Result: </b>As above but with link text of your choice. e.g. <a href="<?php echo $link_fb; ?>">Like us!</a></p>
            <p><code>[social-facebook icon="true"]</code> <b>Result: </b><a href="<?php echo $link_fb; ?>" class="icon" style="height: 1em;  display: inline-block;"><?php echo $svg_fb; ?>Find us on Facebook</a></p>
            <p><code>[social-facebook icon="true" linktext="false"]</code> <b>Result: </b><a href="<?php echo $link_fb; ?>" class="icon" style="height: 3em;  display: inline-block;"><?php echo $svg_fb; ?></a></p>
            
            <h3>Social media: Google Plus</h3>
            <p><code>[social-gplus]</code> <b>Result: </b><a href="<?php echo $gplus; ?>">Find us on Google Plus</a></p>
            <p><code>[social-gplus linktext="Like us!"]</code> <b>Result: </b>As above but with link text of your choice. e.g. <a href="<?php echo $gplus; ?>">Like us!</a></p>
            <p><code>[social-gplus icon="true"]</code> <b>Result: </b><a href="<?php echo $gplus; ?>" class="icon" style="height: 1em;  display: inline-block;"><?php echo $svg_gplus; ?>Find us on Google Plus</a></p>
            <p><code>[social-gplus icon="true" linktext="false"]</code> <b>Result: </b><a href="<?php echo $gplus; ?>" class="icon" style="height: 3em; display: inline-block;"><?php echo $svg_gplus; ?></a></p>
            
        </div>
        <?php
    }

    /**
     * Register and add settings
     */
    public function page_init_cx_contactdeets()
    {        
        register_setting(
            'cx_option_group_contactdeets', // Option group
            'cx_contactdeets', // Option name
            array( $this, 'sanitize' ) // Sanitize
        );

        add_settings_section(
            'cx_section_deets', // ID
            '', // Title
            array( $this, 'print_section_info_cx_contactdeets' ), // Callback
            'cx-contactdeets-admin' // Page
        );  
        add_settings_section(
            'cx_section_deets_social', // ID
            '', // Title
            array( $this, 'print_section_info_cx_social' ), // Callback
            'cx-contactdeets-admin' // Page
        );
        
        add_settings_field(
            'main_email', // ID
            'Email', // Title 
            array( $this, 'cx_contactdeets_main_email_callback' ), // Callback
            'cx-contactdeets-admin', // Page
            'cx_section_deets' // Section           
        );

        add_settings_field(
            'address_1', // ID
            'Address', // Title 
            array( $this, 'cx_contactdeets_address_1_callback' ), // Callback
            'cx-contactdeets-admin', // Page
            'cx_section_deets' // Section           
        );
        add_settings_field(
            'address_1_pc', // ID
            'Postcode', // Title 
            array( $this, 'cx_contactdeets_address_1_pc_callback' ), // Callback
            'cx-contactdeets-admin', // Page
            'cx_section_deets' // Section           
        );
        add_settings_field(
            'address_1_map', // ID
            'Map', // Title 
            array( $this, 'cx_contactdeets_address_1_map_callback' ), // Callback
            'cx-contactdeets-admin', // Page
            'cx_section_deets' // Section           
        );
        add_settings_field(
            'phone_1', // ID
            'Phone', // Title 
            array( $this, 'cx_contactdeets_callback_phone_1' ), // Callback
            'cx-contactdeets-admin', // Page
            'cx_section_deets' // Section           
        );
        add_settings_field(
            'twitter', // ID
            'Twitter', // Title 
            array( $this, 'cx_contactdeets_callback_twitter' ), // Callback
            'cx-contactdeets-admin', // Page
            'cx_section_deets_social' // Section           
        );
        add_settings_field(
            'facebook', // ID
            'Facebook page', // Title 
            array( $this, 'cx_contactdeets_callback_facebook' ), // Callback
            'cx-contactdeets-admin', // Page
            'cx_section_deets_social' // Section           
        );
        add_settings_field(
            'gplus', // ID
            'Google Plus page', // Title 
            array( $this, 'cx_contactdeets_callback_gplus' ), // Callback
            'cx-contactdeets-admin', // Page
            'cx_section_deets_social' // Section           
        );    

    }

    /**
     * Sanitize each setting field as needed
     *
     * @param array $input Contains all settings fields as array keys
     */
    public function sanitize( $input )
    {
        $new_input = array();
        if( isset( $input['address_1'] ) )
            $new_input['address_1'] = sanitize_text_field( $input['address_1'] );
            
        if( isset( $input['main_email'] ) )
            $new_input['main_email'] = sanitize_text_field( $input['main_email'] );
        
        if( isset( $input['address_1_pc'] ) )
            $new_input['address_1_pc'] = sanitize_text_field( $input['address_1_pc'] );

        if( isset( $input['address_1_map'] ) )
            $new_input['address_1_map'] = $input['address_1_map'];
            
        if( isset( $input['phone_1_ac'] ) )
            $new_input['phone_1_ac'] = sanitize_text_field( $input['phone_1_ac'] );
        if( isset( $input['phone_1'] ) )
            $new_input['phone_1'] = sanitize_text_field( $input['phone_1'] );
            
        if( isset( $input['twitter'] ) )
            $new_input['twitter'] = sanitize_text_field( $input['twitter'] );
            
        if( isset( $input['facebook'] ) )
            $new_input['facebook'] = sanitize_text_field( $input['facebook'] );
            
        if( isset( $input['gplus'] ) )
            $new_input['gplus'] = sanitize_text_field( $input['gplus'] );
        
        return $new_input;
    }

    /** 
     * Print the Section text
     */
    public function print_section_info_cx_contactdeets()
    {
        print 'Enter your contact information here.';
    }
    
    /** 
     * Print the Section text
     */
    public function print_section_info_cx_social()
    {
        print 'Enter your social media accounts.';
    }

    /** 
     * Get the settings option array and print one of its values
     */
    public function cx_contactdeets_main_email_callback()
    {
        printf(
            '<input type="text" id="main_email" name="cx_contactdeets[main_email]" value="%s" />',
            isset( $this->options['main_email'] ) ? esc_attr( $this->options['main_email']) : ''
        );
    }
    public function cx_contactdeets_address_1_callback()
    {
        printf(
            '<input type="text" id="address_1" name="cx_contactdeets[address_1]" value="%s" />',
            isset( $this->options['address_1'] ) ? esc_attr( $this->options['address_1']) : ''
        );
    }
    public function cx_contactdeets_address_1_pc_callback()
    {
        printf(
            '<input type="text" id="address_1_pc" name="cx_contactdeets[address_1_pc]" value="%s" />',
            isset( $this->options['address_1_pc'] ) ? esc_attr( $this->options['address_1_pc']) : ''
        );
    }
    public function cx_contactdeets_address_1_map_callback()
    {
        printf(
            '<input type="text" id="address_1_map" name="cx_contactdeets[address_1_map]" value="%s" />',
            isset( $this->options['address_1_map'] ) ? esc_attr( $this->options['address_1_map']) : ''
        );
    }
    public function cx_contactdeets_callback_phone_1()
    {
        printf(
            '<input type="text" id="phone_1_ac" name="cx_contactdeets[phone_1_ac]" value="%s" size="5" />',
            isset( $this->options['phone_1_ac'] ) ? esc_attr( $this->options['phone_1_ac']) : ''
        );
        printf(
            '<input type="text" id="phone_1" name="cx_contactdeets[phone_1]" value="%s" size="7" />',
            isset( $this->options['phone_1'] ) ? esc_attr( $this->options['phone_1']) : ''
        );
        
    }
    public function cx_contactdeets_callback_twitter()
    {
        printf(
            '<input type="text" id="twitter" name="cx_contactdeets[twitter]" value="%s" />',
            isset( $this->options['twitter'] ) ? esc_attr( $this->options['twitter']) : ''
        );
    }
    public function cx_contactdeets_callback_facebook()
    {
        printf(
            '<input type="text" id="facebook" name="cx_contactdeets[facebook]" value="%s" />',
            isset( $this->options['facebook'] ) ? esc_attr( $this->options['facebook']) : ''
        );
    }
    public function cx_contactdeets_callback_gplus()
    {
        printf(
            '<input type="text" id="gplus" name="cx_contactdeets[gplus]" value="%s" />',
            isset( $this->options['gplus'] ) ? esc_attr( $this->options['gplus']) : ''
        );
    }

}

if( is_admin() )
    $deets_settings_page = new CXSettingsPageContactDeets();
    
?>