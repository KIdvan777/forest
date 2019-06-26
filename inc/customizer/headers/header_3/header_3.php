<?php

$header_2_panel = new PE_WP_Customize_Panel($wp_customize, 'h3_lvl_2_parent_panel', array(
  'title'=>'Header 3',
  'panel'=>'lvl_1_parent_panel',
));
$wp_customize->add_panel($header_2_panel);

$header_2_panel_2 = new PE_WP_Customize_Panel($wp_customize, 'h3_lvl_3_parent_panel', array(
  'title'=>'Header 3 panel 2',
  'panel'=>'h3_lvl_2_parent_panel',
));
$wp_customize->add_panel($header_2_panel_2);

$wp_customize->add_section('h3_lvl_1_section',array(
  'title'=>'Header 3 Level 1 Section',
  'panel'=>'h3_lvl_3_parent_panel',
));

$wp_customize->add_setting('h3_lvl_1_setting', array(
  'default'=>'value',
  'sanitize_callback' => 'wp_kses_post',
  'transport'=>'postMessage',
));

$wp_customize->add_control('h3_lvl_1_control', array(
  'type'=>'text',
  'label'=>'Label',
  'section'=>'h3_lvl_1_section',
));
//////////////////////////////////////////////////////////////////////
$wp_customize->add_section('h3_lvl_2_section',array(
'title'=>'Header 3 Level 2 Section',
'panel'=>'h3_lvl_2_parent_panel',
));

$wp_customize->add_setting('h3_lvl_2_setting', array(
'default'=>'value',
'sanitize_callback' => 'wp_kses_post',
'transport'=>'postMessage',
));

$wp_customize->add_control('h3_lvl_2_control', array(
'type'=>'text',
'label'=>'Label',
'section'=>'h3_lvl_2_section',
));

$h2_lvl1ParentSection = new PE_WP_Customize_Section( $wp_customize, 'h3_lvl_1_parent_section', array(
  'title' => 'Level 1 Section',
  'panel' => 'h3_lvl_3_parent_panel',
));
$wp_customize->add_section( $h2_lvl1ParentSection );

$h2_lv21ParentSection = new PE_WP_Customize_Section( $wp_customize, 'h3_lvl_2_parent_section', array(
  'title' => 'Level 2 Section',
  'section' => 'h3_lvl_1_parent_section',
  'panel' => 'h3_lvl_3_parent_panel',
));
$wp_customize->add_section( $h2_lv21ParentSection );

$wp_customize->add_setting( 'h3_pe_test_3', array(
  'default' => 'default value here',
  'sanitize_callback' => 'wp_kses_post',
  'transport' => 'postMessage',
));
$wp_customize->add_control( 'h3_pe_test_3', array(
  'type' => 'text',
  'label' => 'Some text control 3',
  'section' => 'h3_lvl_2_parent_section',
));
