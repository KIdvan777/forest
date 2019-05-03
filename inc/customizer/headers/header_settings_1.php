<?php
add_action( 'customize_register', 'forest_custom_header_1_register' );
function forest_custom_header_1_register($wp_customize) {


// Top header color
    $wp_customize->add_section('forest_headers_1_colors_section',[
        'title'=>__('Forest header one colors', 'forest'),
        'priority'=>12,
        'panel'=>'forest_headers_pannel',
    ]);

    $wp_customize->add_setting( 'forest_headers_1_colors_setting', array(
        'transport'=>'refresh'
    ));

    $wp_customize->add_control(new Wp_Customize_Color_Control($wp_customize,'forest_header_1_top_header_color_control',array(
        'label'=>__('Top Header Color','forest'),
        'section'=>'forest_headers_1_colors_section',
        'settings'=>'forest_headers_1_colors_setting'
    )));

    add_action('wp_head', 'forest_custom_header_1_color_settings');
    function forest_custom_header_1_color_settings(){
        ?>
        <style media="screen">
            .header_one .top_header_bgc{
                background-color: <?php echo get_theme_mod('forest_headers_1_colors_setting'); ?>
            }
        </style>
        <?
    }

// Top header typography

    $wp_customize->add_setting( 'forest_headers_1_typo_style_setting', array(
        'transport'=>'refresh'
    ));

    $wp_customize->add_control(new Wp_Customize_Control($wp_customize,'forest_header_1_top_header_typo_style_control',array(
        'label'=>__('Top Header Typography','forest'),
        'section'=>'forest_headers_1_colors_section',
        'settings'=>'forest_headers_1_typo_style_setting',
        'type'=>'select',
        'choices'        => array(
            'normal'   => 'normal',
            'italic'   => 'italic',
            'oblique'  =>'oblique'
        )
    )));
    // font weight
    $wp_customize->add_setting( 'forest_headers_1_typo_wiight_setting', array(
        'transport'=>'refresh'
    ));

    $wp_customize->add_control(new Wp_Customize_Control($wp_customize,'forest_header_1_top_header_typo_wiight_control',array(
        'label'=>__('Top Header Typography','forest'),
        'section'=>'forest_headers_1_colors_section',
        'settings'=>'forest_headers_1_typo_wiight_setting',
        'type'=>'select',
        'choices'        => array(
            'normal' => 'normal',
            'bold'   => 'bold',
            '100'    => '100',
            '200'    => '200',
            '300'    =>'300',
            '400'    => '400',
            '500'    => '500',
            '600'    =>'600',
            '700'    =>'700',
            '800'    =>'800',
            '900'    =>'900'
        )
    )));
    // font style
    $wp_customize->add_setting( 'forest_headers_1_typo_wiight_setting', array(
        'transport'=>'refresh'
    ));

    $wp_customize->add_control(new Wp_Customize_Control($wp_customize,'forest_header_1_top_header_typo_wiight_control',array(
        'label'=>__('Top Header font-weight','forest'),
        'section'=>'forest_headers_1_colors_section',
        'settings'=>'forest_headers_1_typo_wiight_setting',
        'type'=>'select',
        'choices'        => array(
            'normal' => 'normal',
            'bold'   => 'bold',
            '100'    => '100',
            '200'    => '200',
            '300'    =>'300',
            '400'    => '400',
            '500'    => '500',
            '600'    =>'600',
            '700'    =>'700',
            '800'    =>'800',
            '900'    =>'900'
        )
    )));

    // font style
    $wp_customize->add_setting( 'forest_headers_1_typo_family_setting', array(
        'transport'=>'refresh'
    ));

    $wp_customize->add_control(new Wp_Customize_Control($wp_customize,'forest_header_1_top_header_typo_family_control',array(
        'label'=>__('Top Header font-family','forest'),
        'section'=>'forest_headers_1_colors_section',
        'settings'=>'forest_headers_1_typo_family_setting',
        'type'=>'select',
        'choices'        => array(
            'serif' => 'serif',
            'sans-serif'   => 'sans-serif',
            'monospace'    => 'monospace',
            'cursive'    => 'cursive',
            'Gill Sans Extrabold, sans-serif'    =>'Gill Sans Extrabold, sans-serif',
            '"Goudy Bookletter 1911", sans-serif'    => '"Goudy Bookletter 1911", sans-serif',
        )
    )));

    // font style
    $wp_customize->add_setting( 'forest_headers_1_typo_size_setting', array(
        'transport'=>'refresh'
    ));

    class Font_Size_Customize_Input_Control extends WP_Customize_Control {
    public $type = 'input';

    public function render_content() {
        ?><form class="form-control" action="" method="GET">
            <style media="screen">
                .font_size_input{
                    display: block;
                    font-size: 14px;
                    line-height: 24px;
                    font-weight: 600;
                    margin-bottom: 4px;
                }
            </style>
            <label for="font_size" class="font_size_input"> Top Header font-size</label>
            <input type="text" name="font_size"  value="" <?php $this->link(); ?><?php $this->value(); ?>>
        </form>
        <?php

        }
    }

    $wp_customize->add_control( new Font_Size_Customize_Input_Control( $wp_customize, 'forest_headers_1_typo_size_setting', array(
        'section' => 'forest_headers_1_colors_section',
        'settings'   => 'forest_headers_1_typo_size_setting',
    ) ) );

    add_action('wp_head', 'forest_headers_1_typo_function');
    function forest_headers_1_typo_function(){
        ?>
            <style media="screen">
                .header_one .top_header{
                    font-family:<?php echo get_theme_mod('forest_headers_1_typo_family_setting'); ?>;
                    font-style:<?php echo get_theme_mod('forest_headers_1_typo_style_setting'); ?>;
                    font-size:<?php echo get_theme_mod('forest_headers_1_typo_size_setting'); ?>;
                    font-weight:<?php echo get_theme_mod('forest_headers_1_typo_wiight_setting'); ?>;
                }
            </style>
        <?
    }
// Hotline setting

    $wp_customize->add_section('forest_headers_1_section',[
        'title'=>__('Forest header one', 'forest'),
        'priority'=>11,
        'panel'=>'forest_headers_pannel',
    ]);

    $wp_customize->add_setting( 'forest_headers_1_hotline_settings', array(
        'transport'=>'refresh'
    ));

    $wp_customize->add_control(new WP_Customize_Control(
        $wp_customize,
        'forest_header_1_top_header_hotline_control',
            array(
                'label'          => __( 'Top header number phone or anything', 'theme_name' ),
                'section'        => 'forest_headers_1_section',
                'settings'       => 'forest_headers_1_hotline_settings',
                'type'=>'text',
            )
        )
    );
// Social settings
    $wp_customize->add_setting( 'forest_headers_1_social_settings', array(
        'transport'=>'refresh'
    ));

    $wp_customize->add_control(new WP_Customize_Control(
        $wp_customize,
        'forest_header_1_top_header_social_control',
            array(
                'label'          => __( 'Top header social title', 'theme_name' ),
                'section'        => 'forest_headers_1_section',
                'settings'       => 'forest_headers_1_social_settings',
                'type'=>'text',
            )
        )
    );
// Social 1
    $wp_customize->add_setting( 'forest_headers_1_social_link_settings', array(
        'transport'=>'refresh'
    ));

    $wp_customize->add_control(new WP_Customize_Control(
        $wp_customize,
        'forest_header_1_top_header_social_link_control',
            array(
                'label'          => __( 'Top header social link url', 'theme_name' ),
                'section'        => 'forest_headers_1_section',
                'settings'       => 'forest_headers_1_social_link_settings',
                'type'=>'text',
            )
        )
    );

    $wp_customize->add_setting( 'forest_headers_1_social_link_icon_settings_1', array(
        'transport'=>'refresh'
    ));

    $wp_customize->add_control(new WP_Customize_Control(
        $wp_customize,
        'forest_header_1_top_header_social_icon_control',
            array(
                'label'          => __( 'Top header social link icon', 'theme_name' ),
                'section'        => 'forest_headers_1_section',
                'settings'       => 'forest_headers_1_social_link_icon_settings_1',
                'type'=>'radio',
                'choices'        => array(
                    '<i class="fab fa-facebook-square"></i>' => 'facebook',
                    '<i class="fab fa-twitter"></i>' => 'twitter',
                    '<i class="fab fa-google-plus-g"></i>' => 'google+',
                    '<i class="fab fa-instagram"></i>' => 'instagram',
                    '<i class="fab fa-linkedin-in"></i>' => 'linkedin',
                )
            )
        )
    );
// Social 2
        $wp_customize->add_setting( 'forest_headers_1_social_link_settings_2', array(
            'transport'=>'refresh'
        ));

        $wp_customize->add_control(new WP_Customize_Control(
            $wp_customize,
            'forest_header_1_top_header_social_link_control_2',
                array(
                    'label'          => __( 'Top header social link url', 'theme_name' ),
                    'section'        => 'forest_headers_1_section',
                    'settings'       => 'forest_headers_1_social_link_settings_2',
                    'type'=>'text',
                )
            )
        );

    $wp_customize->add_setting( 'forest_headers_1_social_link_icon_settings_2', array(
        'transport'=>'refresh'
    ));

    $wp_customize->add_control(new WP_Customize_Control(
        $wp_customize,
        'forest_header_1_top_header_social_icon_control_2',
            array(
                'label'          => __( 'Top header social link icon', 'theme_name' ),
                'section'        => 'forest_headers_1_section',
                'settings'       => 'forest_headers_1_social_link_icon_settings_2',
                'type'=>'radio',
                'choices'        => array(
                    '<i class="fab fa-facebook-square"></i>' => 'facebook',
                    '<i class="fab fa-twitter"></i>' => 'twitter',
                    '<i class="fab fa-google-plus-g"></i>' => 'google+',
                    '<i class="fab fa-instagram"></i>' => 'instagram',
                    '<i class="fab fa-linkedin-in"></i>' => 'linkedin',
                )
            )
        )
    );
    // Social 3
    $wp_customize->add_setting( 'forest_headers_1_social_link_settings_3', array(
        'transport'=>'refresh'
    ));

    $wp_customize->add_control(new WP_Customize_Control(
        $wp_customize,
        'forest_header_1_top_header_social_link_control_3',
            array(
                'label'          => __( 'Top header social link url', 'theme_name' ),
                'section'        => 'forest_headers_1_section',
                'settings'       => 'forest_headers_1_social_link_settings_3',
                'type'=>'text',
            )
        )
    );

    $wp_customize->add_setting( 'forest_headers_1_social_link_icon_settings_3', array(
        'transport'=>'refresh'
    ));

    $wp_customize->add_control(new WP_Customize_Control(
        $wp_customize,
        'forest_header_1_top_header_social_icon_control_3',
            array(
                'label'          => __( 'Top header social link icon', 'theme_name' ),
                'section'        => 'forest_headers_1_section',
                'settings'       => 'forest_headers_1_social_link_icon_settings_3',
                'type'=>'radio',
                'choices'        => array(
                    '<i class="fab fa-facebook-square"></i>' => 'facebook',
                    '<i class="fab fa-twitter"></i>' => 'twitter',
                    '<i class="fab fa-google-plus-g"></i>' => 'google+',
                    '<i class="fab fa-instagram"></i>' => 'instagram',
                    '<i class="fab fa-linkedin-in"></i>' => 'linkedin',
                )
            )
        )
    );
    // Social 4
    $wp_customize->add_setting( 'forest_headers_1_social_link_settings_4', array(
        'transport'=>'refresh'
    ));

    $wp_customize->add_control(new WP_Customize_Control(
        $wp_customize,
        'forest_header_1_top_header_social_link_control_4',
            array(
                'label'          => __( 'Top header social link url', 'theme_name' ),
                'section'        => 'forest_headers_1_section',
                'settings'       => 'forest_headers_1_social_link_settings_4',
                'type'=>'text',
            )
        )
    );

    $wp_customize->add_setting( 'forest_headers_1_social_link_icon_settings_4', array(
        'transport'=>'refresh'
    ));

    $wp_customize->add_control(new WP_Customize_Control(
        $wp_customize,
        'forest_header_1_top_header_social_icon_control_4',
            array(
                'label'          => __( 'Top header social link icon', 'theme_name' ),
                'section'        => 'forest_headers_1_section',
                'settings'       => 'forest_headers_1_social_link_icon_settings_4',
                'type'=>'radio',
                'choices'        => array(
                    '<i class="fab fa-facebook-square"></i>' => 'facebook',
                    '<i class="fab fa-twitter"></i>' => 'twitter',
                    '<i class="fab fa-google-plus-g"></i>' => 'google+',
                    '<i class="fab fa-instagram"></i>' => 'instagram',
                    '<i class="fab fa-linkedin-in"></i>' => 'linkedin',
                )
            )
        )
    );
    // Social 5
    $wp_customize->add_setting( 'forest_headers_1_social_link_settings_5', array(
        'transport'=>'refresh'
    ));

    $wp_customize->add_control(new WP_Customize_Control(
        $wp_customize,
        'forest_header_1_top_header_social_link_control_5',
            array(
                'label'          => __( 'Top header social link url', 'theme_name' ),
                'section'        => 'forest_headers_1_section',
                'settings'       => 'forest_headers_1_social_link_settings_5',
                'type'=>'text',
            )
        )
    );

    $wp_customize->add_setting( 'forest_headers_1_social_link_icon_settings_5', array(
        'transport'=>'refresh'
    ));

    $wp_customize->add_control(new WP_Customize_Control(
        $wp_customize,
        'forest_header_1_top_header_social_icon_control_5',
            array(
                'label'          => __( 'Top header social link icon', 'theme_name' ),
                'section'        => 'forest_headers_1_section',
                'settings'       => 'forest_headers_1_social_link_icon_settings_5',
                'type'=>'radio',
                'choices'        => array(
                    '<i class="fab fa-facebook-square"></i>' => 'facebook',
                    '<i class="fab fa-twitter"></i>' => 'twitter',
                    '<i class="fab fa-google-plus-g"></i>' => 'google+',
                    '<i class="fab fa-instagram"></i>' => 'instagram',
                    '<i class="fab fa-linkedin-in"></i>' => 'linkedin',
                )
            )
        )
    );

    $wp_customize->add_setting( 'forest_headers_1_social_link_icon_settings_5', array(
        'transport'=>'refresh'
    ));

    $wp_customize->add_control(new WP_Customize_Control(
        $wp_customize,
        'forest_header_1_top_header_social_icon_control_5',
            array(
                'label'          => __( 'Top header social link icon', 'theme_name' ),
                'section'        => 'forest_headers_1_section',
                'settings'       => 'forest_headers_1_social_link_icon_settings_5',
                'type'=>'radio',
                'choices'        => array(
                    '<i class="fab fa-facebook-square"></i>' => 'facebook',
                    '<i class="fab fa-twitter"></i>' => 'twitter',
                    '<i class="fab fa-google-plus-g"></i>' => 'google+',
                    '<i class="fab fa-instagram"></i>' => 'instagram',
                    '<i class="fab fa-linkedin-in"></i>' => 'linkedin',
                )
            )
        )
    );

// Top header color

}

add_action('wp_head', 'forest_custom_header_1_settings');
function forest_custom_header_1_settings(){
}
