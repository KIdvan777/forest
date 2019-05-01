<?php

add_action( 'customize_register', 'forest_custom_headers_register' );
function forest_custom_headers_register($wp_customize) {

    $wp_customize->add_panel('forest_headers_pannel',array(
        'title'=>' Forest Headers',
        'description'=> 'This is panel Description',
        'priority'=> 10,
    ));

    $wp_customize->add_section('forest_headers_section',[
        'title'=>__('Forest headers options', 'forest'),
        'priority'=>10,
        'panel'=>'forest_headers_pannel',
    ]);

    $wp_customize->add_section('forest_headers_one_section',[
        'title'=>__('Forest header one', 'forest'),
        'priority'=>11,
        'panel'=>'forest_headers_pannel',
    ]);

    $wp_customize->add_setting( 'forest_headers_settings', array(
        'transport'=>'refresh'
    ));

    $wp_customize->add_control(new WP_Customize_Control(
        $wp_customize,
        'forest_headers_control',
            array(
                'label'          => __( 'Choose header', 'theme_name' ),
                'section'        => 'forest_headers_section',
                'settings'       => 'forest_headers_settings',
                'type'           => 'radio',
                'choices'        => array(
                    '1'   => __( 'Header-1' ),
                    '2'  => __( 'Header-2' ),
                    '3'   => __( 'Header-3' ),
                    '4'  => __( 'Header-4' )
                )
            )
        )
    );

    $wp_customize->add_control(new WP_Customize_Control(
        $wp_customize,
        'forest_header_one_control',
            array(
                'label'          => __( 'Forest header one', 'theme_name' ),
                'section'        => 'forest_headers_one_section',
                'settings'       => 'forest_headers_settings',
            )
        )
    );

}

add_action('wp_head','forest_customize_headers_options');
function forest_customize_headers_options(){

    $header =  get_theme_mod('forest_headers_settings');

    if($header=='1'){
        get_template_part('/inc/customizer/headers/templates/header_1');
    }
    if($header=='2'){
        get_template_part('/inc/customizer/headers/templates/header_2');
    }
    if($header=='3'){
        get_template_part('/inc/customizer/headers/templates/header_3');
    }
    if($header=='4'){
        get_template_part('/inc/customizer/headers/templates/header_4');
    }

}
