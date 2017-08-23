<?php

/**
 * Install Function Plugin
 */

//Deny acces to this file via URL
if(! defined ('ABSPATH'))
	exit();


function iBot_install(){
	set_transient( 'iBot_activation_redirect', true, 30 );
}

//Register plugin in WP
register_activation_hook(IBOT_PLUGIN_FILE, 'iBot_install' );