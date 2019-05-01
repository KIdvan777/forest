<?php

add_action( 'customize_register', 'forest_custom_footers_register' );
function forest_custom_footers_register($wp_customize) {

    $wp_customize->add_panel('forest_footers_panel',array(
        'title'=>' Forest Footers',
        'description'=> 'This is panel Description',
        'priority'=> 12,
    ));

    $wp_customize->add_section('forest_footers_section',[
        'title'=>__('Forest footers options'),
        'priority'=>10,
        'panel'=>'forest_footers_panel',
    ]);

    $wp_customize->add_section('forest_footers_one_section',[
        'title'=>__('Forest footers one', 'forest'),
        'priority'=>11,
        'panel'=>'forest_footers_pannel',
    ]);

    $wp_customize->add_setting( 'forest_footers_settings', array(
        'transport'=>'refresh'
    ));

    $wp_customize->add_control(new WP_Customize_Control(
        $wp_customize,
        'forest_footers_control',
            array(
                'label'          => __( 'Choose footer', 'theme_name' ),
                'section'        => 'forest_footers_section',
                'settings'       => 'forest_footers_settings',
                'type'           => 'radio',
                'choices'        => array(
                    'one'   => __( 'Footer-1' ),
                    'two'  => __( 'Footer-2' ),
                    'three'   => __( 'Footer-3' ),
                    'four'  => __( 'Footer-4' )
                )
            )
        )
    );

    $wp_customize->add_control(new WP_Customize_Control(
        $wp_customize,
        'forest_footers_one_control',
            array(
                'label'          => __( 'Forest footers one', 'theme_name' ),
                'section'        => 'forest_footers_one_section',
                'settings'       => 'forest_footers_settings',
                'type'           => 'radio',
                'choices'        => array(
                    'one'   => __( 'Header-1' ),
                    'two'  => __( 'Header-2' ),
                    'three'   => __( 'Header-3' ),
                    'four'  => __( 'Header-4' )
                )
            )
        )
    );

}

add_action('wp_head','forest_footer_sections_options');

function forest_footer_sections_options(){
    $one =  get_theme_mod('forest_footers_settings');
}
