<?php
/**
 * Plugin Name:       WordPress BCE Plugin
 * Plugin URI:        https://wordpress.org/plugins/wordpress-bce-plugin/
 * Description:       Display Euro exchange rates from the European Central Bank (ECB/BCE) using the [cotizacion_euro] shortcode.
 * Version:           1.0.0
 * Requires at least: 5.0
 * Requires PHP:      7.4
 * Author:            Your Name
 * Author URI:        https://yourwebsite.com/
 * License:           GPLv2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       wordpress-bce-plugin
 * Domain Path:       /languages
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
// Include the necessary files
require_once plugin_dir_path( __FILE__ ) . 'includes/api-connection.php';
// Registrar y encolar el archivo CSS
function wbce_enqueue_styles() {
    wp_enqueue_style( 'wbce-styles', plugins_url( 'wbce-styles.css', __FILE__ ) );
}
add_action( 'wp_enqueue_scripts', 'wbce_enqueue_styles' );

// Shortcode handler function
function wbce_shortcode_handler( $atts, $content = null ) {
    // URL del servicio XML
    $api_url = 'https://www.ecb.europa.eu/stats/eurofxref/eurofxref-daily.xml';

    // Realizar la solicitud GET
    $response = wp_remote_get( $api_url );
    $output = '';
    // Verificar si la solicitud fue exitosa
    if ( is_wp_error( $response ) ) {
        $output = 'Error al conectar con el servicio: ' . $response->get_error_message();
    } else {
        $output = wbce_get_response( $response );
    }

    return $output;
}

// Registrar el shortcode [cotizacion_euro]
add_shortcode( 'cotizacion_euro', 'wbce_shortcode_handler' );
