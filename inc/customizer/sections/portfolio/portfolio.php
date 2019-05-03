<?php

add_action( 'customize_register', 'forest_sections_portfolio_register' );
function forest_sections_portfolio_register($wp_customize) {

$wp_customize->add_section('forest_sections_portfolio_section',[
    'title'=>__('Forest Portfolio Sections', 'forest'),
    'priority'=>15,
    'panel'=>'forest_sections_panel',
]);

$wp_customize->add_setting( 'forest_sections_portfolio_settings', array(
    'transport'=>'refresh'
));

    $wp_customize->add_control(new WP_Customize_Control(
        $wp_customize,
        'forest_sections_portfolio_control',
            array(
                'label'          => __( 'Choose section', 'theme_name' ),
                'section'        => 'forest_sections_portfolio_section',
                'settings'       => 'forest_sections_portfolio_settings',
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

// add_action('wp_head','forest_customize_sections_introduction_options');
//
// function forest_customize_sections_introduction_options(){
// // $section =  get_theme_mod('forest_sections_introduction_settings');
// }
