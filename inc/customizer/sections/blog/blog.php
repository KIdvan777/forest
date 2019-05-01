<?php

add_action( 'customize_register', 'forest_custom_blog_sections_register' );
function forest_custom_blog_sections_register($wp_customize) {

    $wp_customize->add_section('forest_blog_sections_section',[
        'title'=>__('Forest Blog Sections', 'forest'),
        'priority'=>10,
        'panel'=>'forest_sections_panel'
    ]);

    $wp_customize->add_setting( 'forest_blog_sections_settings', array(
        'transport'=>'refresh'
    ));

    $wp_customize->add_control(new WP_Customize_Control(
        $wp_customize,
        'forest_blog_sections_control',
            array(
                'label'          => __( 'Choose section', 'theme_name' ),
                'section'        => 'forest_blog_sections_section',
                'settings'       => 'forest_blog_sections_settings',
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

add_action('wp_head','forest_customize_blog_sections_options');
function forest_customize_blog_sections_options(){
    $section =  get_theme_mod('forest_blog_sections_settings');
    if($section=='one'){
         get_template_part('/inc/customizer/sections/blog/templates/blog-one');
    }

}
