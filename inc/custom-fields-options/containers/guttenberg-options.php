<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
use Carbon_Fields\Container;
use Carbon_Fields\Field;
use Carbon_Fields\Block;

Block::make( __( 'Custom Gutenberg Block' ) )
    ->add_fields( array(
        Field::make( 'text', 'heading', __( 'Block Heading' ) ),
        Field::make( 'image', 'image', __( 'Block Image' ) ),
        Field::make( 'rich_text', 'content', __( 'Block Content' ) ),
    ) )
    ->set_render_callback( function ( $fields, $attributes, $inner_blocks ) {
        ?>

        <div class="block">
            <div class="block__heading">
                <h1><?php echo esc_html( $fields['heading'] ); ?>111</h1>
            </div><!-- /.block__heading -->

            <div class="block__image">
                <?php echo wp_get_attachment_image( $fields['image'], 'full' ); ?>
            </div><!-- /.block__image -->

            <div class="block__content">
                <?php echo apply_filters( 'the_content', $fields['content'] ); ?>
            </div><!-- /.block__content -->
        </div><!-- /.block -->

        <?php
    } );
