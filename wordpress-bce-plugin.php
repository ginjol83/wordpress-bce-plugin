<?php
/**
 * Plugin Name: WordPress BCE Plugin
 * Description: A plugin to connect to the BCE API and fetch data.
 * Version: 1.0
 * Author: Your Name
 * License: GPL2
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
// Include the necessary files
include plugin_dir_path( __FILE__ ) . 'includes/api-connection.php';
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
        $output = getResponse($response);   
    }

    return $output;
}

// Registrar el shortcode [cotizacion_euro]
add_shortcode( 'cotizacion_euro', 'wbce_shortcode_handler' );
