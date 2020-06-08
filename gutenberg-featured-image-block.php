<?php

/**
 * Plugin Name: Gutenberg Block: Featured Image Block
 * Plugin URI: https://modularwp.com/
 * Description: A Gutenberg block for displaying and modifying featured images.
 * Author: ModularWP
 * Author URI: https://modularwp.com/
 * Version: 1.0.0
 * License: GPL2+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 */

defined( 'ABSPATH' ) || exit;

function gutenberg_examples_dynamic_render_callback( $attributes, $content ) {
    return get_the_post_thumbnail();
}
 
function gutenberg_examples_dynamic() {
    wp_register_script(
        'random-image-block',
        plugins_url( 'block.js', __FILE__ ),
        array('wp-blocks', 'wp-i18n', 'wp-element', 'wp-editor')
    );
 
    register_block_type('nforced-uk/random-image', array(
        'editor_script' => 'random-image-block',
        'render_callback' => 'gutenberg_examples_dynamic_render_callback'
    ) );
 
}
add_action( 'init', 'gutenberg_examples_dynamic' );
