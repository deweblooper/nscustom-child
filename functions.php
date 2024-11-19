<?php

/*
* Add your own functions here. You can also copy some of the theme functions into this file. 
* Wordpress will use those functions instead of the original functions then.
*/

// disable default scripts and join child theme scripts
function wp_override_scripts() {
    wp_dequeue_style( 'genericons' );
    wp_deregister_style( 'genericons' );

    wp_dequeue_style( 'fonts' );
    wp_dequeue_style( 'fonts' );

    wp_enqueue_style( 'ns_custom_child_fonts', get_template_directory_uri().'-child/fonts/fonts.css' );
}
add_action( 'wp_enqueue_scripts', 'wp_override_scripts', 20 );


// override default footer credits
function my_custom_credits(){ 
$copy = '';
$credits = '';
echo '
<span class="copy">
	&copy;&nbsp;<a href="'.esc_url( home_url() ).'" title="'.esc_attr(get_bloginfo()).'" rel="bookmark">'.esc_attr(get_bloginfo()).'</a>&nbsp;'.esc_attr( date( 'Y' ) ).' '.($copy ? $copy : '').'
</span>
<span class="credits">
	'.($credits ? '<br />'.$credits.'' : '<a href="http://www.netsuccess.sk/webdesign" target="_blank">webdesign</a>, <a href="http://www.netsuccess.sk/ppc" target="_blank">ppc</a> &rsaquo; <a href="http://www.netsuccess.sk/" target="_blank" class="ns_color">netsuccess.sk</a>').'
</span>
';
}
add_action('ns_custom_credits', 'my_custom_credits');

