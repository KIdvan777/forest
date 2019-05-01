<?php
/**
 * forest Theme Customizer
 *
 * @package forest
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function forest_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport = 'refresh';

       $wp_customize->get_setting( 'blogdescription' )->transport = 'refresh';
       $wp_customize->get_control( 'blogdescription' )->priority = '12';

       $wp_customize->get_setting( 'header_textcolor' )->default = '#f44336';
       $wp_customize->get_setting( 'header_textcolor' )->transport = 'refresh';

       // Checkbox to Display Blogname
       $wp_customize->add_setting( 'display_blogname', array(
           'transport' => 'postMessage',
       ) );

       $wp_customize->add_control( 'display_blogname', array(
           'label'     => __( 'Display Site Title', 'tuts' ),
           'section'   => 'title_tagline',
           'type'      => 'checkbox',
           'priority'  => 11,
       ) );

       // Add main text color setting and control.
       $wp_customize->add_setting( 'header_textcolor_hover', array(
           'default'           => '#C62828',
           'sanitize_callback' => 'sanitize_hex_color',
           'transport'         => 'postMessage',
       ) );

       $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_textcolor_hover', array(
           'label'    => __( 'Header Text Color: Hover', 'tuts' ),
           'section'  => 'colors',
           'priority' => '11'
       ) ) );
}
add_action( 'customize_register', 'forest_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function forest_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function forest_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function forest_customize_preview_js() {
	wp_enqueue_script( 'forest-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'forest_customize_preview_js' );
