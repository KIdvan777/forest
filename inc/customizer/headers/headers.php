<?php

function forest_customizer_headers_register($wp_customize){
// Has to be at the top
  $wp_customize->register_panel_type( 'PE_WP_Customize_Panel' );
  $wp_customize->register_section_type( 'PE_WP_Customize_Section' );


  $headers_panel = new PE_WP_Customize_Panel($wp_customize, 'lvl_1_parent_panel', array(
    'title'=>'Forest Headers',
    'priority'=>5,
  ));
  $wp_customize->add_panel($headers_panel);
require get_template_directory() . '/inc/customizer/headers/header_1/header_1.php';
require get_template_directory() . '/inc/customizer/headers/header_2/header_2.php';
require get_template_directory() . '/inc/customizer/headers/header_3/header_3.php';
require get_template_directory() . '/inc/customizer/headers/header_4/header_4.php';

}
add_action( 'customize_register', 'forest_customizer_headers_register' );
