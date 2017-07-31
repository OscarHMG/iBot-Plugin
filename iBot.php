<?php
/**
*Plugin Name: iBot
*Description: Creating my first plugin in Wordpress
* Author: OscarHMG
* Author URI: https://github.com/OscarHMG
* Version: 1.0
* Text Domain: my-ibot
**/

/*
* Function to add the plugin in the Dashboard admin menu
*/
function iBot_plugin_attach_menu_dashboard(){
    init();
	add_menu_page('iBot - Chat bot', 	//Title of the page 
		'iBot', 						//Dashboard Menu Title
		'administrator', 				//Rol access
		'ibot_settings_content',		//Id for the settings page
		'ibot_settings_HTML_Content',	//Function that allow to create the content
		'dashicons-admin-generic'		//Icon Menu
	);

}
//Allow to attach the 'iBot' option in the Admin menu
add_action('admin_menu','iBot_plugin_attach_menu_dashboard');


/*
* Function to create the HTML content for the settings page
*/
function ibot_settings_HTML_Content(){
?>
    <div class="wrap">
        <h2>Configuration: Save number</h2>
        <br>
        <form method="POST" action="options.php">
            <?php 
                settings_fields('iBot-content-settings-group');
                do_settings_sections( 'iBot-content-settings-group' ); 
            ?>
            <label>Token API.AI:&nbsp;</label>
            <input  type="text" 
                    name="maxValue" 
                    id="maxValue" 
                    value="<?php echo get_option('maxValue'); ?>" />

            <label>Field 2:&nbsp;</label>
            <input  type="text" 
                    name="field1" 
                    id="field1" 
                    value="<?php echo get_option('field1'); ?>" />

            <label>Field 3:&nbsp;</label>
            <input  type="text" 
                    name="field2" 
                    id="field2" 
                    value="<?php echo get_option('field2'); ?>" />

            <?php submit_button(); ?>
        </form>
    </div>
<?php
}

/*
* Funtion to register the configurable options in the form to save them
*/
function iBot_content_settings(){
    $array = array();

    //Save the maxValueField, field1, field2 in the DB (Wp-Options table)
    register_setting('iBot-content-settings-group',
                     'maxValue',
                     'intval');
    register_setting('iBot-content-settings-group',
                     'field1',
                     'intval');
    register_setting('iBot-content-settings-group',
                     'field2',
                     'intval');



}
add_action('admin_init','iBot_content_settings');


function init(){
    //wp_register_style( 'namespace', '/mycss.css' );

    //wp_register_script ( 'mysample', plugins_url ( 'js/myjs.js', __FILE__ ) );
    wp_register_style ( 'settings-stylesheet', plugins_url ( 'css/style_settings.css', __FILE__ ) );
    wp_enqueue_style('settings-stylesheet');



}

