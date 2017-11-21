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
        include('views/vreme.php');
        // always return
        return $content;
    }
    add_shortcode('arso_vreme', 'arso_vreme_shortcode');
}
add_action('init', 'arso_vreme_shortcodes_init');
