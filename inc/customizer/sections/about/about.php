<?php

add_action( 'customize_register', 'forest_custom_about_sections_register' );
function forest_custom_about_sections_register($wp_customize) {

    $wp_customize->add_section('forest_about_sections_section',[
        'title'=>__('Forest About Sections', 'forest'),
        'priority'=>12,
        'panel'=>'forest_sections_panel'
    ]);

    $wp_customize->add_setting( 'forest_about_sections_settings', array(
        'transport'=>'refresh'
    ));

    $wp_customize->add_control(new WP_Customize_Control(
        $wp_customize,
        'forest_about_sections_control',
            array(
                'label'          => __( 'Choose section', 'theme_name' ),
                'section'        => 'forest_about_sections_section',
                'settings'       => 'forest_about_sections_settings',
                'type'           => 'radio',
                'choices'        => array(
                    'one'   => __( 'Section-1' ),
                    'two'  => __( 'Section-2' ),
                    'three'   => __( 'Section-3' ),
                    'four'  => __( 'Section-4' )
                )
            )
        )
    );
}

add_action('wp_head','forest_customize_about_sections_options');
function forest_customize_about_sections_options(){
    $section =  get_theme_mod('forest_about_sections_settings');
    if($section=='one'){
         get_template_part('/inc/customizer/sections/about/templates/about-one');
    }

}
