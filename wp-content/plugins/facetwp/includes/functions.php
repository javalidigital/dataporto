<?php

/**
 * An alternate to using do_shortcode()
 * @since 1.7.5
 */
function facetwp_display() {
    $args = func_get_args();
    $atts = isset( $args[1] ) ?
        array( $args[0] => $args[1] ) :
        array( $args[0] => true );

    return FWP()->display->shortcode( $atts );
}
