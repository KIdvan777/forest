<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
use Carbon_Fields\Container;
use Carbon_Fields\Field;

// Default options page
$basic_options_container = Container::make( 'theme_options', __( 'Basic Options' ) )
	->add_tab( __( 'Notification' ), array(
		Field::make( 'text', 'crb_email', __( 'Notification Email' ) ),
		Field::make( 'text', 'crb_phone', __( 'Phone Number' ) ),
	) )
	->add_tab( 'Headers', array(
		Field::make( 'text', 'forest_headers', ' Header'  ),
		Field::make( 'checkbox', 'crb_phone_3', ' Number' ),
		Field::make( 'checkbox', 'crb_phone_5', ' slider' ),
	) )
	->add_tab( 'Section-1', array(
		Field::make( 'text', 'forest_section_one', ' Section'  ),
		Field::make( 'text', 'crb_phone_4', ' Section' ),
	) )
    ->add_fields( array(
        Field::make( 'header_scripts', 'crb_header_script', __( 'Header Script' ) ),
        Field::make( 'footer_scripts', 'crb_footer_script', __( 'Footer Script' ) ),
    ) );

// Add second options page under 'Basic Options'
Container::make( 'theme_options', __( 'Social Links' ) )
    ->set_page_parent( $basic_options_container ) // reference to a top level container
    ->add_fields( array(
        Field::make( 'text', 'crb_facebook_link', __( 'Facebook Link' ) ),
        Field::make( 'text', 'crb_twitter_link', __( 'Twitter Link' ) ),
    ) );

// Add third options page under "Appearance"
Container::make( 'theme_options', __( 'Customize Background' ) )
    ->set_page_parent( 'themes.php' ) // identificator of the "Appearance" admin section
    ->add_fields( array(
        Field::make( 'color', 'crb_background_color', __( 'Background Color' ) ),
        Field::make( 'image', 'crb_background_image', __( 'Background Image' ) ),
    ) );
