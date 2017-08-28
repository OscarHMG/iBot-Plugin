<?php
/**
* Plugin Name: iBot
* Plugin URI: http://www.interlancompu.com/
* Description: Customizable chatbot plugin for Wordpress platform powered by Interlancompu 
* Author: Oscar Moncayo
* Author URI: https://github.com/OscarHMG
* Version: 1.0
**/



//Exit, if you directly access this PATH
if (!defined( 'ABSPATH')) 
    exit;

if(! class_exists('iBot')):


/**
* iBot Main Class
*/
final class iBot{

    //Singleton pattern
    private static $instance;
    public $api;

    /**
    * Instansce of iBot.
    * This function allow to create only one instance in memory. Also, define globals. -- Pending :support multilanguages. --
    */
    public static function instance(){
        //
        if(! isset(self::$instance) && !(self::$instance instanceof iBot)){
            self::$instance = new iBot;

            //Load the constants needed
            self::$instance->setupConstants();
            self::$instance->includeFiles();
            //self::$instance->api = new iBotAPI();
        }
        return self::$instance;

    }


    
    /**
    * Function to forbid cloning instances of the iBot class.
    */
    /*
    public function __clone(){
        _doing_it_wrong(__FUNCTION__, __('Nope, forbidden', 'my-iBot'),1.0);
    }

    /**
     *Disable unserializing iBot objects(Forbidden)
     */
    /*
    public function __wakeup(){
        _doing_it_wrong( __FUNCTION__, __('Nope, forbidden', 'my-iBot'), 1.0 );
    }/*


    /**
     * Setup the constants to the iBot plugin.
     */
    private function setupConstants(){
        //Define plugin version.
        if(!defined('IBOT_VERSION'))
            define('IBOT_VERSION', 1.0);

        //Plugin folder path
        if(!defined('IBOT_PLUGIN_DIRECTORY'))
            define('IBOT_PLUGIN_DIRECTORY', plugin_dir_path(__FILE__));

        //Plugin folder URL
        if(!defined('IBOT_PLUGIN_URL'))
            define('IBOT_PLUGIN_URL', plugin_dir_url(__FILE__));

        //Plugin root file
        if(!defined('IBOT_PLUGIN_FILE'))
            define('IBOT_PLUGIN_FILE', __FILE__);
    }

    /**
     * Function to include the required files.
     *
     */
    private function includeFiles(){
        global $iBot_global_Opt;
        if ( is_admin() ) {
            require_once IBOT_PLUGIN_DIRECTORY . 'includes/admin/admin-pages.php';
            require_once IBOT_PLUGIN_DIRECTORY . 'includes/admin/settings/display-settings.php';
            require_once IBOT_PLUGIN_DIRECTORY . 'includes/admin/welcome.php';
        }
        require_once IBOT_PLUGIN_DIRECTORY . 'includes/install.php';
        //Here include JS and CSS
        require_once IBOT_PLUGIN_DIRECTORY . 'includes/scripts.php';
        //require_once IBOT_PLUGIN_DIRECTORY . 'includes/templates/iBot_UI.php';

 
    }

}
endif; //End definition of the Class 'iBot'


/**
 * Return the global instance iBot ()
 */
function iBotAPI(){
    return iBot::instance();
}


//Runn the iBot instance
iBotAPI();





