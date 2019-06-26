<?php

$header_1_panel = new PE_WP_Customize_Panel($wp_customize, 'lvl_2_parent_panel', array(
  'title'=>'Header 1',
  'panel'=>'lvl_1_parent_panel',
));
$wp_customize->add_panel($header_1_panel);

$header_2_panel = new PE_WP_Customize_Panel($wp_customize, 'lvl_3_parent_panel', array(
  'title'=>'Header 2 main options',
  'panel'=>'lvl_2_parent_panel',
));
$wp_customize->add_panel($header_2_panel);


//
// $wp_customize->add_section('header_1_lvl_1_section',array(
//   'title'=>'Header 1 Level 1 Section',
//   'panel'=>'lvl_3_parent_panel',
// ));
//
// $wp_customize->add_setting('header_1_lvl_1_setting', array(
//   'default'=>'value',
//   'sanitize_callback' => 'wp_kses_post',
//   'transport'=>'postMessage',
// ));
//
// $wp_customize->add_control('header_1_lvl_1_control', array(
//   'type'=>'text',
//   'label'=>'Label',
//   'section'=>'header_1_lvl_1_section',
// ));
// //////////////////////////////////////////////////////////////////////
// $wp_customize->add_section('header_1_lvl_2_section',array(
// 'title'=>'Header 1 Level 2 Section',
// 'panel'=>'lvl_2_parent_panel',
// ));
//
// $wp_customize->add_setting('header_1_lvl_2_setting', array(
// 'default'=>'value',
// 'sanitize_callback' => 'wp_kses_post',
// 'transport'=>'postMessage',
// ));
//
// $wp_customize->add_control('header_1_lvl_2_control', array(
// 'type'=>'text',
// 'label'=>'Label',
// 'section'=>'header_1_lvl_2_section',
// ));

$lvl1ParentSection = new PE_WP_Customize_Section( $wp_customize, 'lvl_1_parent_section', array(
  'title' => 'Level 1 Section',
  'panel' => 'lvl_3_parent_panel',
));
$wp_customize->add_section( $lvl1ParentSection );

$lv21ParentSection = new PE_WP_Customize_Section( $wp_customize, 'lvl_2_parent_section', array(
  'title' => 'Level 2 Section',
  'section' => 'lvl_1_parent_section',
  'panel' => 'lvl_3_parent_panel',
));
$wp_customize->add_section( $lv21ParentSection );

$wp_customize->add_setting( 'pe_test_3', array(
  'default' => 'default value here',
  'sanitize_callback' => 'wp_kses_post',
  'transport' => 'postMessage',
));
$wp_customize->add_control( 'pe_test_3', array(
  'type' => 'text',
  'label' => 'Some text control 3',
  'section' => 'lvl_2_parent_section',
));



$lvl4ParentSection = new PE_WP_Customize_Section( $wp_customize, 'lvl_444_parent_section', array(
  'title' => 'Level 444 Section',
  'panel' => 'lvl_3_parent_panel',
));
$wp_customize->add_section( $lvl4ParentSection );

$lv24ParentSection = new PE_WP_Customize_Section( $wp_customize, 'lvl_4_parent_section', array(
  'title' => 'Level 4 Section',
  'section' => 'lvl_444_parent_section',
  'panel' => 'lvl_3_parent_panel',
));
$wp_customize->add_section( $lv24ParentSection );

$wp_customize->add_setting( 'pe_test_4', array(
  'default' => 'default value here',
  'sanitize_callback' => 'wp_kses_post',
  'transport' => 'postMessage',
));
$wp_customize->add_control( 'pe_test_4', array(
  'type' => 'text',
  'label' => 'Some text control 4',
  'section' => 'lvl_4_parent_section',
));
