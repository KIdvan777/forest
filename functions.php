<?php

/**
 * forest functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package forest
 */

use Carbon_Fields\Container;
use Carbon_Fields\Field;

add_action( 'carbon_fields_register_fields', 'crb_attach_theme_options' );
function crb_attach_theme_options() {
    Container::make( 'theme_options', __( 'Theme Options' ) )
        ->add_fields( array(
            Field::make( 'text', 'crb_text', 'Text Field' ),
        ) );
}

add_action('carbon_fields_register_fields', 'forest_register_crb');
function forest_register_crb(){
	require get_template_directory() . '/inc/custom-fields-options/containers/theme-options.php';
    require get_template_directory() . '/inc/custom-fields-options/containers/page-options.php';
    require get_template_directory() . '/inc/custom-fields-options/containers/post-options.php';
    require get_template_directory() . '/inc/custom-fields-options/containers/template-options.php';
    require get_template_directory() . '/inc/custom-fields-options/containers/nav-menu-options.php';
    require get_template_directory() . '/inc/custom-fields-options/containers/comment-options.php';
    require get_template_directory() . '/inc/custom-fields-options/containers/guttenberg-options.php';
    require get_template_directory() . '/inc/custom-fields-options/containers/network-options.php';
    require get_template_directory() . '/inc/custom-fields-options/containers/term-options.php';
    require get_template_directory() . '/inc/custom-fields-options/containers/user-options.php';
    require get_template_directory() . '/inc/custom-fields-options/containers/widgets-options.php';
}

add_action( 'widgets_init', 'load_widgets' );

// Adding a custom color to the links
add_filter( 'nav_menu_link_attributes', 'crb_nav_menu_link_attributes', 10, 4 );
function crb_nav_menu_link_attributes( $atts, $item, $args, $depth ) {
    $crb_color = carbon_get_nav_menu_item_meta( $item->ID, 'crb_color' );
    $atts['style'] = ! empty( $crb_color ) ? 'color: ' . $crb_color . '; ' : '';

    return $atts;
}


if ( ! function_exists( 'forest_setup' ) ) :
    if ( class_exists( 'WP_Customize_Panel' ) ) {
      class PE_WP_Customize_Panel extends WP_Customize_Panel {
        public $panel;
        public $type = 'pe_panel';
        public function json() {
          $array = wp_array_slice_assoc( (array) $this, array( 'id', 'description', 'priority', 'type', 'panel', ) );
          $array['title'] = html_entity_decode( $this->title, ENT_QUOTES, get_bloginfo( 'charset' ) );
          $array['content'] = $this->get_content();
          $array['active'] = $this->active();
          $array['instanceNumber'] = $this->instance_number;
          return $array;
        }
      }
    }
    if ( class_exists( 'WP_Customize_Section' ) ) {
      class PE_WP_Customize_Section extends WP_Customize_Section {
        public $section;
        public $type = 'pe_section';
        public function json() {
          $array = wp_array_slice_assoc( (array) $this, array( 'id', 'description', 'priority', 'panel', 'type', 'description_hidden', 'section', ) );
          $array['title'] = html_entity_decode( $this->title, ENT_QUOTES, get_bloginfo( 'charset' ) );
          $array['content'] = $this->get_content();
          $array['active'] = $this->active();
          $array['instanceNumber'] = $this->instance_number;
          if ( $this->panel ) {
            $array['customizeAction'] = sprintf( 'Customizing &#9656; %s', esc_html( $this->manager->get_panel( $this->panel )->title ) );
          } else {
            $array['customizeAction'] = 'Customizing';
          }
          return $array;
        }
      }
    }
    // Enqueue our scripts and styles
    function pe_customize_controls_scripts() {
      wp_enqueue_script( 'pe-customize-controls', get_theme_file_uri( '/assets/js/pe-customize-controls.js' ), array(), '1.0', true );
    }
    add_action( 'customize_controls_enqueue_scripts', 'pe_customize_controls_scripts' );
    function pe_customize_controls_styles() {
      wp_enqueue_style( 'pe-customize-controls', get_theme_file_uri( '/assets/css/pe-customize-controls.css' ), array(), '1.0' );
    }
    add_action( 'customize_controls_print_styles', 'pe_customize_controls_styles' );
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function forest_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on forest, use a find and replace
		 * to change 'forest' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'forest', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'forest' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'forest_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'forest_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function forest_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'forest_content_width', 640 );
}
add_action( 'after_setup_theme', 'forest_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function forest_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'forest' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'forest' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'forest_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function forest_scripts() {
	wp_enqueue_style( 'forest-style', get_stylesheet_uri() );
	wp_enqueue_style( 'forest-bts-cdn', 'https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css' );
	wp_enqueue_style( 'forest-fw-cdn',"https://use.fontawesome.com/releases/v5.8.1/css/all.css");
	wp_enqueue_script( 'forest-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'forest-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'forest_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Customizer.
 */
require get_template_directory() . '/inc/options-ui.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Load WooCommerce compatibility file.
 */
if ( class_exists( 'WooCommerce' ) ) {
	require get_template_directory() . '/inc/woocommerce.php';
}



if ( ! function_exists( 'get_pr' ) ) {
	/**
	 * Debug function print_r
	 *
	 * @param mixed $var
	 * @param boolean $die
	 */
	function get_pr( $var, $die = true ) {
		echo '<pre>';
		print_r( $var );
		echo '</pre>';
		if ( $die ) {
			die();
		}
	}
}
if ( ! function_exists( 'get_vd' ) ) {
	/**
	 * Debug function var_dump
	 *
	 * @param mixed $var
	 * @param boolean $die
	 */
	function get_vd( $var, $die = true ) {
		echo '<pre>';
		var_dump( $var );
		echo '</pre>';
		if ( $die ) {
			die();
		}
	}
}
// 1. customizer-preview.js
function forest_customizer_preview_js() {
    wp_enqueue_script( 'forest_customizer_preview', get_template_directory_uri() . '/js/customizer-preview.js', array( 'customize-preview' ), null, true );
}
add_action( 'customize_preview_init', 'forest_customizer_preview_js' );

// 2. customizer-control.js
function forest_customize_control_js() {
    wp_enqueue_script( 'forest_customizer_control', get_template_directory_uri() . '/js/customizer-control.js', array( 'customize-controls', 'jquery' ), null, true );
}
add_action( 'customize_controls_enqueue_scripts', 'forest_customize_control_js' );
