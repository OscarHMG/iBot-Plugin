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
		'ibotHTMLSettingsForm',			//Function that allow to create the content with HTML(Settings Form)
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

/**
 * Function to create 'Settings Page' 
 */
function ibotHTMLSettingsForm(){
	?>
    <div class="wrap">
        <h2>iBot Settings</h2>
        <br>
        <form method="POST" action="options.php">
            <?php 
                settings_fields('iBot-content-settings-group');
                do_settings_sections( 'iBot-content-settings-group' ); 
            ?>
            <label>Token API.AI:</label>
            <input  type="text" 
                    name="maxValue" 
                    id="maxValue"
                    value="<?php echo get_option('maxValue'); ?>" />

            <?php submit_button(); ?>
        </form>
    </div>
<?php
}

/*
* Funtion to register the configurable options in the form to save them ind DB of WP
*/
function iBot_content_settings(){
    //Save the maxValueField in the DB (Wp-Options table like string (strval))
    register_setting('iBot-content-settings-group','maxValue','strval');
}



add_action('admin_init','iBot_content_settings');
//Register the function in WP
add_action( 'admin_menu', 'iBot_add_content_admin_page', 10 );
?>

