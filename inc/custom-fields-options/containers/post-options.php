<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
use Carbon_Fields\Container;
use Carbon_Fields\Field;

Container::make('post_meta', 'Настройки записи')
	->where('post_type','=','post')
    ->add_fields([
        Field::make('text','my_text_1','text 1'),
        Field::make('textarea', 'my_text_2', 'text 2')
    ]);
