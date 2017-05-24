<?php namespace App\Controller;

class ConfigController
{
    public function themeSupport()
    {
        // Thumbnail support
        add_theme_support('post-thumbnails');
    }

    public function removeActions()
    {
        // Remove DNS Prefetching
        remove_action('wp_head', 'wp_resource_hints', 2);

        // Remove emoji scripts
        remove_action('wp_head', 'print_emoji_detection_script', 7);
        remove_action('wp_print_styles', 'print_emoji_styles');

        // Remove shortlink
        remove_action('wp_head', 'wp_shortlink_wp_head');

        // Remove REST API
        remove_action('wp_head', 'rest_output_link_wp_head');

        // Remove EditURI
        remove_action('wp_head', 'rsd_link');

        // Remove wlwmanifest
        remove_action('wp_head', 'wlwmanifest_link');

        // Remove generator
        remove_action('wp_head', 'wp_generator');

        // Remove oEmbed
        remove_action('wp_head', 'wp_oembed_add_discovery_links');
        remove_action('wp_head', 'wp_oembed_add_host_js');
    }
}
