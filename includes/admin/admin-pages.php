<?php
/**
 * Admin Function pages
 **/

if( ! defined( 'ABSPATH' ))
	exit;

/**
 * Function to attach the plugin settings page in the admin menu console.
 */
function iBot_add_content_admin_page(){
	global $iBot_settings_page;

	$iBot_settings_page = add_menu_page(
		'iBot - Chat bot', 				//Title of the page 
		'iBot', 						//Dashboard Menu Title
		'administrator', 				//Rol access
		'ibot_presentation_id',			//Id for the settings page
		'ibot_presentation_content',	//Function that allow to create the content with HTML
		'dashicons-format-chat'			//Icon Menu
	);
}

/**
* Funtion to create the content when the menu "iBot" is pressed in the admnin menu console. (Advertising: INTERLANCOMPU)
*/
function ibot_presentation_content(){
	?>
	<!-- Here start HTML Content-->
	<div id=container_admin >
		<div id= container_img_presentation_admin>
			<img id="img_presentation_admin" src="../wp-content/plugins/iBot/assets/images/presentation.jpg">
		</div>
		<div id="container_description_admin">
			<h2 id="title_ibot_admin">Welcome to iBot</h2>
			<p id="description_ibot_admin">Customizable chatbot plugin for Wordpress platform powered by Interlancompu</p>
		</div>

	</div>
	<?php
}

//Register the function in WP
add_action( 'admin_menu', 'iBot_add_content_admin_page', 10 );
?>

