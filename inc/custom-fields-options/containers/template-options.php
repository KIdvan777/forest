<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
use Carbon_Fields\Container;
use Carbon_Fields\Field;

Container::make( 'post_meta', __( 'Homepage Settings' ) )
    ->where( 'post_type', '=', 'page' )
    ->where( 'post_template', '=', 'templates/new.php' )
    ->add_fields([
        Field::make('text','my_template_1','text 1'),
        Field::make('textarea', 'my_template_2', 'text 2'),
		Field::make( 'rich_text', 'crb_sidenote', __( 'Sidenote Content' ) )
    ]);
