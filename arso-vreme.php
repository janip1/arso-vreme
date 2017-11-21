<?php
/*
Plugin name: ARSO Vreme
*/
?>
<?php

function arso_vreme_shortcodes_init()
{
    function arso_vreme_shortcode($atts = [], $content = null)
    {
        // do something to $content
        include('views/razmere-zgoraj.php');
        // always return
        return $content;
    }
    add_shortcode('arso_vreme_zgoraj', 'arso_vreme_shortcode');

    function arso_vreme_shortcode_two($atts = [], $content = null)
    {
        // do something to $content
        include('views/razmere-spodaj.php');
        // always return
        return $content;
    }
    add_shortcode('arso_vreme_spodaj', 'arso_vreme_shortcode_two');
}
add_action('init', 'arso_vreme_shortcodes_init');
