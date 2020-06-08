<?php

/**
 * Plugin Name: nForced.uk - Gutenberg Block: Featured Image Block
 * Plugin URI: https://github.com/nForced-uk/wp-glutenburg-block-featured-image
 * Description: A Gutenberg block for displaying the post or page featured image.
 * Author: nForced.uk
 * Author URI: https://nforced.uk
 * Version: 1.0.0
 * License: GNU General Public License v3.0
 * License File: LICENSE
 */

defined( 'ABSPATH' ) || exit;

function wp_glutenburg_block_featured_image_render_callback($attributes, $content) {
    return get_the_post_thumbnail();
}

function wp_glutenburg_block_featured_image() {
    wp_register_script(
        'wp_glutenburg_block_featured_image',
        plugins_url('block.js', __FILE__),
        array('wp-blocks', 'wp-i18n', 'wp-element', 'wp-editor')
    );

    register_block_type('nforced-uk/wp-glutenburg-block-featured-image', array(
        'editor_script' => 'wp_glutenburg_block_featured_image',
        'render_callback' => 'wp_glutenburg_block_featured_image_render_callback'
    ));

}
add_action('init', 'wp_glutenburg_block_featured_image');