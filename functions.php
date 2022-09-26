<?php
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

// BEGIN ENQUEUE PARENT ACTION
// AUTO GENERATED - Do not modify or remove comment markers above or below:

if ( !function_exists( 'chld_thm_cfg_locale_css' ) ):
    function chld_thm_cfg_locale_css( $uri ){
        if ( empty( $uri ) && is_rtl() && file_exists( get_template_directory() . '/rtl.css' ) )
            $uri = get_template_directory_uri() . '/rtl.css';
        return $uri;
    }
endif;
add_filter( 'locale_stylesheet_uri', 'chld_thm_cfg_locale_css' );

// END ENQUEUE PARENT ACTION


if( !function_exists( 'add_field')):
    function add_field(){
        
    }
endif;
add_filter( 'wp_footer', 'add_field');

add_action('learndash_registration_form_fields_after','mss_add_country_field');
function mss_add_country_field(){
        $url = "https://restcountries.com/v2/all";
        $data = file_get_contents($url);
        $countries = json_decode($data, true);
        echo '<select class="learndash-registration-field learndash-registration-field-country" width="100%">
                <option value="">'.esc_html("Select Country").'</option>';
        foreach($countries as $name){
            echo "<option value=".$name['name'].">".$name['name']." </option>";
        }
        echo '</select>';                        
}

