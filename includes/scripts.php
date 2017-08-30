

<?php
/**
* File to load and register scripts and CSS files to the iBot Plugin
*/


/**
* Funtion to load CSS of "iBot" (admin page) 
**/

function loadHTMLiBot(){
	?>
	<img id="img-circle" src=<?php echo IBOT_PLUGIN_URL. "assets/images/robot.png" ?> data-toggle="tooltip" data-animation="true" data-placement="top" title="¿Necesitas ayuda?" />
	<div id="chatContent"></div>
	<script>
       function initChat(){
            var chat = new iCharBot(document.getElementById('chatContent'));
            initParamsChat("img-circle");
            sendMsgApi('hola');
            setTimeout(function(){document.getElementById('mainContainerBot').style.display='block'},2000);
            jQuery('#img-circle').fadeIn(2000);
       }
	</script>

	<?php

}

function loadAdminCSS(){
	wp_register_style( 'admin-page-style', IBOT_PLUGIN_URL.'assets/css/'.'admin_style.css', array(), 1.0, 'all');
	wp_enqueue_style('admin-page-style');
	wp_enqueue_style('iBot-style');

}

function loadCSSiBot(){
	wp_register_style( 'iBot-style', IBOT_PLUGIN_URL.'assets/css/'.'ibot_style.css', array(), 1.0, 'all');
	wp_enqueue_style('iBot-style');


}

function loadJSFrontEnd(){
	wp_register_script( 'frontEnd-Script', IBOT_PLUGIN_URL.'assets/js/'.'frontEnd.js', array( 'jquery' ), 1.0 );
	wp_enqueue_script( 'frontEnd-Script' );
}


/**
* Funtion to load Font Awesome (Icons)
*/

function loadFontAwesome(){
    wp_enqueue_style("fontawesome", 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css');
}


function loadBootstrapJS(){
	wp_register_script("bootstrap-js", 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js');
	wp_enqueue_script("bootstrap-js");

}

function loadJS_iBot(){
	wp_register_script("iBot-js", 'http://10.10.30.82:8080/api/js.php?key=AAA&callback=initChat');
	wp_enqueue_script("iBot-js");

}




add_action( 'admin_enqueue_scripts', 'loadAdminCSS' );
add_action( 'wp_enqueue_scripts', 'loadHTMLiBot' );

add_action('wp_enqueue_scripts', 'loadCSSiBot');
add_action('wp_enqueue_scripts', 'loadJSFrontEnd');
//Load fontAwesome, Bootstrap, script 
add_action( 'wp_enqueue_scripts', 'loadFontAwesome' );
add_action('wp_enqueue_scripts', 'loadBootstrapJS');
add_action('wp_enqueue_scripts','loadJS_iBot' );

?>