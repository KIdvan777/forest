<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
use Carbon_Fields\Container;
use Carbon_Fields\Field;


Container::make( 'network', 'crb_network_container', 'Network Settings' )
  ->add_fields( array(
    Field::make( 'text', 'crb_title' ) ,
    Field::make( 'checkbox', 'crb_disable_feature' )
  )
);
