<?php
    /**
     * Plugin Name: UG GEO APIS
     * Description: Access resourceful data from this open api to ease the development of your next project
     * version: 0.0.1
     * tags: Regions, Districts, Counties, Sub counties, Parish, Sub Parishes, Villages
     * Plugin URI: https://ugopenapis.com
    */

    // Get the path to the plugin directory
    $plugin_dir = plugin_dir_path( __FILE__ );

    // Modify REST API URL prefix
    function my_rest_url_prefix( $slug ) {
        return 'api'; // Change 'api' to your desired prefix
    }

    add_filter( 'rest_url_prefix', 'my_rest_url_prefix' );

    // Function to flush rewrite rules on activation
    function plugin_activation() {
        // Register your custom endpoint here if needed

        // Flush rewrite rules
        flush_rewrite_rules();

    }

    register_activation_hook( __FILE__, 'plugin_activation' );

    // Function to flush rewrite rules on deactivation
    function plugin_deactivation() {
        // Flush rewrite rules
        flush_rewrite_rules();
    }
    register_deactivation_hook( __FILE__, 'plugin_deactivation' );

    require_once $plugin_dir . "/endpoints/regions.php";
    require_once $plugin_dir . "/endpoints/districts.php";
    require_once $plugin_dir . "/endpoints/villages.php";
