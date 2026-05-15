<?php
// This file contains utility functions that assist with various tasks in the plugin

/**
 * Format data for display.
 *
 * @param mixed $data The data to format.
 * @return string The formatted data.
 */
function wbce_format_data( $data ) {
    return is_array( $data ) ? implode( ', ', $data ) : (string) $data;
}

/**
 * Handle errors by logging them and displaying a user-friendly message.
 *
 * @param string $error_message The error message to log.
 */
function wbce_handle_error( $error_message ) {
    error_log( $error_message );
    echo '<div class="error"><p>' . esc_html( $error_message ) . '</p></div>';
}

/**
 * Sanitize input data.
 *
 * @param mixed $input The input data to sanitize.
 * @return mixed The sanitized data.
 */
function wbce_sanitize_input( $input ) {
    return sanitize_text_field( $input );
}
