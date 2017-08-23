

<?php
/**
* File to load and register scripts and CSS files to the iBot Plugin
*/


/**
* Funtion to load CSS of "iBot" (admin page) 
**/
function loadAdminCSS(){
		wp_register_style( 'admin-page-style', IBOT_PLUGIN_URL.'assets/css/'.'admin_style.css', array(), 1.0, 'all');
		wp_enqueue_style('admin-page-style');
}


/**
* Funtion to load Font Awesome (Icons)
*/

function loadFontAwesome(){
    wp_enqueue_style("fontawesome", 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css');
}




add_action( 'admin_enqueue_scripts', 'loadAdminCSS' );
add_action( 'wp_enqueue_scripts', 'loadFontAwesome' );

?>