<?php

function getResponse($response){
    $output = '';
    // Obtener el cuerpo de la respuesta
    $body = wp_remote_retrieve_body( $response );

    // Cargar el XML
    $xml = simplexml_load_string( $body );

    if ( $xml === false ) {
        $output = 'Error al procesar el XML.';
    } else {
        // Extraer los datos del XML
        $output .= '<table class="wbce-exchange-rates-table">';
        $output .= '<thead><tr><th>Tasa de Cambio con el Euro</th></tr></thead>';
        $output .= '<tbody>';
        foreach ( $xml->Cube->Cube->Cube as $rate ) {
            $currency = (string) $rate['currency'];
            $img = '';
            if ( $currency === 'USD' ) {
                $img = '<img src="https://flagcdn.com/us.svg" width="25" alt="Bandera de USD">';
            } elseif ( $currency === 'GBP' ) {
                $img = '<img src="https://flagcdn.com/gb.svg" width="25" alt="Bandera de GBP">';
            } elseif ( $currency === 'JPY' ) {
                $img = '<img src="https://flagcdn.com/jp.svg" width="25" alt="Bandera de JPY">';
            } elseif ( $currency === 'AUD' ) {
                $img = '<img src="https://flagcdn.com/au.svg" width="25" alt="Bandera de AUD">';
            } elseif ( $currency === 'CAD' ) {
                $img = '<img src="https://flagcdn.com/ca.svg" width="25" alt="Bandera de CAD">';
            } elseif ( $currency === 'CHF' ) {
                $img = '<img src="https://flagcdn.com/ch.svg" width="25" alt="Bandera de CHF">';
            } elseif ( $currency === 'CNY' ) {  
                $img = '<img src="https://flagcdn.com/cn.svg" width="25" alt="Bandera de CNY">';
            } elseif ( $currency === 'SEK' ) {
                $img = '<img src="https://flagcdn.com/se.svg" width="25" alt="Bandera de SEK">';
            } elseif ( $currency === 'NZD' ) {
                $img = '<img src="https://flagcdn.com/nz.svg" width="25" alt="Bandera de NZD">';
            } elseif ( $currency === 'SGD' ) {
                $img = '<img src="https://flagcdn.com/sg.svg" width="25" alt="Bandera de SGD">';
            } elseif ( $currency === 'HKD' ) {
                $img = '<img src="https://flagcdn.com/hk.svg" width="25" alt="Bandera de HKD">';
            } elseif ( $currency === 'NOK' ) {
                $img = '<img src="https://flagcdn.com/no.svg" width="25" alt="Bandera de NOK">';
            } elseif ( $currency === 'MXN' ) {
                $img = '<img src="https://flagcdn.com/mx.svg" width="25" alt="Bandera de MXN">';
            } elseif ( $currency === 'ZAR' ) {
                $img = '<img src="https://flagcdn.com/za.svg" width="25" alt="Bandera de ZAR">';
            } elseif ( $currency === 'BRL' ) {
                $img = '<img src="https://flagcdn.com/br.svg" width="25" alt="Bandera de BRL">';
            } elseif ( $currency === 'INR' ) {
                $img = '<img src="https://flagcdn.com/in.svg" width="25" alt="Bandera de INR">';
            } elseif ( $currency === 'RUB' ) {
                $img = '<img src="https://flagcdn.com/ru.svg" width="25" alt="Bandera de RUB">';
            } elseif ( $currency === 'TRY' ) {
                $img = '<img src="https://flagcdn.com/tr.svg" width="25" alt="Bandera de TRY">';
            } elseif ( $currency === 'PLN' ) {
                $img = '<img src="https://flagcdn.com/pl.svg" width="25" alt="Bandera de PLN">';
            } elseif ( $currency === 'THB' ) {
                $img = '<img src="https://flagcdn.com/th.svg" width="25" alt="Bandera de THB">';
            } elseif ( $currency === 'AED' ) {
                $img = '<img src="https://flagcdn.com/ae.svg" width="25" alt="Bandera de AED">';
            } elseif ( $currency === 'MYR' ) {
                $img = '<img src="https://flagcdn.com/my.svg" width="25" alt="Bandera de MYR">';
            } elseif ( $currency === 'PHP' ) {
                $img = '<img src="https://flagcdn.com/ph.svg" width="25" alt="Bandera de PHP">';
            } elseif ( $currency === 'IDR' ) {
                $img = '<img src="https://flagcdn.com/id.svg" width="25" alt="Bandera de IDR">';
            } elseif ( $currency === 'CZK' ) {
                $img = '<img src="https://flagcdn.com/cz.svg" width="25" alt="Bandera de CZK">';
            } elseif ( $currency === 'HUF' ) {
                $img = '<img src="https://flagcdn.com/hu.svg" width="25" alt="Bandera de HUF">';
            } elseif ( $currency === 'ILS' ) {
                $img = '<img src="https://flagcdn.com/il.svg" width="25" alt="Bandera de ILS">';
            } elseif ( $currency === 'CLP' ) {
                $img = '<img src="https://flagcdn.com/cl.svg" width="25" alt="Bandera de CLP">';
            } elseif ( $currency === 'COP' ) {
                $img = '<img src="https://flagcdn.com/co.svg" width="25" alt="Bandera de COP">';
            } elseif ( $currency === 'PEN' ) {
                $img = '<img src="https://flagcdn.com/pe.svg" width="25" alt="Bandera de PEN">';
            } elseif ( $currency === 'VND' ) {
                $img = '<img src="https://flagcdn.com/vn.svg" width="25" alt="Bandera de VND">';
            } elseif ( $currency === 'SAR' ) {
                $img = '<img src="https://flagcdn.com/sa.svg" width="25" alt="Bandera de SAR">';
            } elseif ( $currency === 'QAR' ) {
                $img = '<img src="https://flagcdn.com/qa.svg" width="25" alt="Bandera de QAR">';
            } elseif ( $currency === 'KWD' ) {
                $img = '<img src="https://flagcdn.com/kw.svg" width="25" alt="Bandera de KWD">';
            } elseif ( $currency === 'BHD' ) {
                $img = '<img src="https://flagcdn.com/bh.svg" width="25" alt="Bandera de BHD">';        
            } else {
                continue; // Omitir monedas no deseadas
            }
            // Obtener el valor de la tasa de cambio
            $value = (string) $rate['rate'];
            $output .= '<tr>';
            $output .= '<td> EUR -> ' . esc_html( $currency ) . '</td>';
            $output .= '<td>' . $img . '</td>';
            $output .= '<td>' . esc_html( $value ) . '</td>';
            $output .= '</tr>';
            }
        $output .= '<tr><td>Fuente: BCE</td></tr>';
        $output .= '</tbody>';
        $output .= '</table>';
        return $output;
    }
}
?>