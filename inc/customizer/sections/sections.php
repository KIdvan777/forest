<?php

add_action( 'customize_register', 'forest_custom_sections_register' );
function forest_custom_sections_register($wp_customize) {

    $wp_customize->add_panel('forest_sections_panel',array(
        'title'=>' Forest Sections',
        'description'=> 'This is panel Description',
        'priority'=> 11,
    ));

    $wp_customize->add_section('forest_sections_section',[
        'title'=>__('Forest sections options', 'forest'),
        'priority'=>10,
        'panel'=>'forest_sections_panel',
    ]);

    $wp_customize->add_section('forest_sections_one_section',[
        'title'=>__('Forest sections one', 'forest'),
        'priority'=>11,
        'panel'=>'forest_sections_pannel',
    ]);

    $wp_customize->add_setting( 'forest_sections_settings', array(
        'transport'=>'refresh'
    ));

    $wp_customize->add_control(new WP_Customize_Control(
        $wp_customize,
        'forest_sections_control',
            array(
                'label'          => __( 'Choose section', 'theme_name' ),
                'section'        => 'forest_sections_section',
                'settings'       => 'forest_sections_settings',
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

    $wp_customize->add_control(new WP_Customize_Control(
        $wp_customize,
        'forest_section_one_control',
            array(
                'label'          => __( 'Forest section one', 'theme_name' ),
                'section'        => 'forest_section_one_section',
                'settings'       => 'forest_section_settings',
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

add_action('wp_head','forest_customize_sections_options');

function forest_customize_sections_options(){
    $section =  get_theme_mod('forest_sections_settings');


}
require get_template_directory() . '/inc/customizer/sections/blog/blog.php';
require get_template_directory() . '/inc/customizer/sections/about/about.php';
