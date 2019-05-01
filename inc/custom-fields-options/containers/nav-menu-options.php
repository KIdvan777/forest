<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
use Carbon_Fields\Container;
use Carbon_Fields\Field;

Container::make( 'nav_menu_item', __( 'Menu Settings' ) )
    ->add_fields( array(
        Field::make( 'color', 'crb_color', __( 'Color' ) ),
    ));
