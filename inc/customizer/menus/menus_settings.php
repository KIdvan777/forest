<?php

add_action( 'customize_register', 'forest_custom_header_1_menu_1_register' );
function forest_custom_header_1_menu_1_register($wp_customize) {


// Top header color
    $wp_customize->add_section('forest_headers_1_menus_section',[
        'title'=>__('Forest header one menus', 'forest'),
        'priority'=>12,
        'panel'=>'forest_headers_pannel',
    ]);

    $wp_customize->add_setting( 'forest_headers_1_menu_1_setting', array(
        'transport'=>'refresh'
    ));

    $wp_customize->add_setting( 'forest_headers_1_menu_submenu_setting', array(
        'transport'=>'refresh'
    ));

    $wp_customize->add_control(new Wp_Customize_Image_Control($wp_customize,'forest_header_1_top_header_menu_1_submenu_control',array(
        'label'=>__('Top Header SubMenu Image','forest'),
        'section'=>'forest_headers_1_menus_section',
        'settings'=>'forest_headers_1_menu_submenu_setting',
    )));

    $wp_customize->add_control(new Wp_Customize_Control($wp_customize,'forest_header_1_top_header_menu_1_control',array(
        'label'=>__('Top Header Menu','forest'),
        'section'=>'forest_headers_1_menus_section',
        'settings'=>'forest_headers_1_menu_1_setting',
        'type'=>'select',
        'choices' => array(
            '1'  => __( 'Menu-1' ),
            '2'  => __( 'Menu-2' ),
            '3'  => __( 'Menu-3' ),
            '4'  => __( 'Menu-4' ),
        )
    )));

}

function change_menu_item_args( $args, $item, $depth ) {
    $img = get_theme_mod('forest_headers_1_menu_submenu_setting');
	if ( $depth === 1) {
		$args->before = '<li class="img_item"><img src="'.$img.'"</li>';
	}else{
        $args->before = '';
    }

	return $args;
}

add_filter( 'nav_menu_item_args', 'change_menu_item_args', 10, 3 );

add_action('wp_head','header_one_menu_1_register');
function header_one_menu_1_register(){
    $menu =  get_theme_mod('forest_headers_1_menu_1_setting');

    if($menu=='1'){
        get_template_part('/inc/customizer/menus/templates/menu_1');
    }
    if($menu=='2'){
        get_template_part('/inc/customizer/menus/templates/menu_2');
    }
    if($menu=='3'){
        get_template_part('/inc/customizer/menus/templates/menu_3');
    }
    if($menu=='4'){
        get_template_part('/inc/customizer/menus/templates/menu_4');
    }
}
