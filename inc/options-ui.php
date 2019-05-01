<?php
//  Customize Appearance Options
function forest_customize_ui($wp_customize){


    $wp_customize->add_setting('frs_link_color',array(
        'default'=>'#888888',
        'transport'=>'refresh'
    ));

    $wp_customize->add_setting('frs_btn_color',array(
        'default'=>'#888888',
        'transport'=>'refresh'
    ));

    $wp_customize->add_setting('frs_link_hover_color',array(
        'default'=>'#888888',
        'transport'=>'refresh'
    ));

    $wp_customize->add_section('frs_standart_colors', array(
        'title'=>__('Standart colors', 'forest'),
        'priority'=>30
    ));

    $wp_customize->add_control(new Wp_Customize_Color_Control($wp_customize,'frs_link_color_control',array(
        'label'=>__('Link Color','forest'),
        'section'=>'frs_standart_colors',
        'settings'=>'frs_link_color'
    )));

    $wp_customize->add_control(new Wp_Customize_Color_Control($wp_customize,'frs_btn_control',array(
        'label'=>__('Button Color','forest'),
        'section'=>'frs_standart_colors',
        'settings'=>'frs_btn_color'
    )));

    $wp_customize->add_control(new Wp_Customize_Color_Control($wp_customize,'frs_link_hover_control',array(
        'label'=>__('Link hover','forest'),
        'section'=>'frs_standart_colors',
        'settings'=>'frs_link_hover_color'
    )));

    $wp_customize->add_setting( 'header_one_bgc' , array(
         'default'   => '#000000',
         'transport' => 'refresh',
     ) );

     $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_one_bgc_color', array(
 	'label'      => __( 'Header Color', 'forest' ),
 	'section'    => 'frs_standart_colors',
 	'settings'   => 'header_one_bgc',
 ) ) );

    // $wp_customize->get_setting( 'frs_link_color' )->transport = 'postMessage';
    // $wp_customize->get_setting( 'frs_btn_color' )->transport = 'postMessage';
    // $wp_customize->get_setting( 'frs_link_hover_color' )->transport = 'postMessage';
    // $wp_customize->get_setting( 'header_one_bgc' )->transport = 'postMessage';
}
add_action('customize_register','forest_customize_ui');

function forest_customize_css(){?>

    <style type="text/css">
    /* Links */
        a:link,
        a:visited{
            color:<?php echo get_theme_mod('frs_link_color'); ?>;
        }

        .header_three .nav_top li a {
            color: <?php echo get_theme_mod('frs_link_color'); ?>;

        }
        a:hover{
            color: <?php echo get_theme_mod('frs_link_hover_color'); ?>;
        }
    /* Buttons */
        button{
            background-color: <?php echo get_theme_mod('frs_btn_color'); ?>;
        }

        .header_one{ background-color: <?php echo get_theme_mod('header_one_bgc'); ?>; }
    </style>

<?}
add_action('wp_head','forest_customize_css');

function forest_edit_ui($wp_customize){
    $wp_customize->add_section('frs-edit-header',array(
        'title'=>'Edit Header'
    ));

    $wp_customize->add_setting('frs-edit-header-phone',array(
        'default'=>'Example Headline Text'
    ));

    $wp_customize->add_control(new Wp_Customize_Control(
        $wp_customize,'frs-header-edit-control',array(
            'label'=>'Headline',
            'section'=>'frs-edit-header',
            'settings'=>'frs-edit-header-phone'
        )
    ));

    $wp_customize->add_setting('frs-header-background-image');

    $wp_customize->add_control(
       new WP_Customize_Image_Control(
           $wp_customize,
           'logo',
           array(
               'label'      => __( 'Upload a logo', 'theme_name' ),
               'section'    => 'frs-edit-header',
               'settings'   => 'frs-header-background-image',
               'context'    => 'your_setting_context'
           )
       )
   );

   $wp_customize->add_setting('frs-header-upload-image');

   $wp_customize->add_control(new WP_Customize_Upload_Control($wp_customize,'Upload',
          array(
              'label'      => __( 'Upload a image', 'theme_name' ),
              'section'    => 'frs-edit-header',
              'settings'   => 'frs-header-upload-image',
              'context'    => 'your_setting_context'
          )
      )
  );
}

add_action('customize_register','forest_edit_ui');

add_action( 'customize_register', 'forest_custom_customize_register' );
function forest_custom_customize_register($wp_customize) {
    class Example_Customize_Input_Control extends WP_Customize_Control {
    public $type = 'input';

    public function render_content() {
        ?><form class="form-control" action="" method="GET" id="width_form" >
            <input type="text" name="width" id="width_form_input" value="" <?php $this->link(); ?><?php $this->value(); ?>>
        </form>
        <?php

    }
}
    $wp_customize->add_section('frs-input-section', array(
        'title'=>__('Input size', 'forest'),
        'priority'=>31
    ));


    $wp_customize->add_setting( 'width_setting', array(
    'transport'=>'refresh'
    ) );


    $wp_customize->add_control( new Example_Customize_Input_Control( $wp_customize, 'wiidth_control', array(
        'label'   => 'Input Setting',
        'section' => 'frs-input-section',
        'settings'   => 'width_setting',
    ) ) );

    $wp_customize->add_setting( 'radio_setting', array(
    'transport'=>'refresh'
    ) );


    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'your_setting_id',
            array(
                'label'          => __( 'Dark or light theme version?', 'theme_name' ),
                'section'        => 'frs-input-section',
                'settings'       => 'radio_setting',
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

function forest_customize_radio_width(){



    $one =  get_theme_mod('radio_setting');

    // echo $one;
    if($one=='one'){
        ?>
            <style media="screen">
                .header_two{
                    background-color: #e2e;
                }
                .header_two .logo h1{
                    font-size: 3em;
                }
            </style>
            <?php  get_template_part('template-parts/header-three'); ?>
        <?
    }else{
        ?>
        <style media="screen">
            .header_two{
                background-color: #e2e2e2;
            }

        </style>
        <?php  get_template_part('template-parts/header-four'); ?>
        <?
    }

}
add_action('wp_head','forest_customize_radio_width');

function forest_customize_css_width(){?>

    <style type="text/css">
    /* Links */
        .header_two form input[type=text]{
            width:<?php echo get_theme_mod('width_setting'); ?>;
        }


    </style>

<?}
add_action('wp_head','forest_customize_css_width');

require get_template_directory() . '/inc/customizer/headers/headers.php';

require get_template_directory() . '/inc/customizer/sections/sections.php';

require get_template_directory() . '/inc/customizer/footers/footers.php';
