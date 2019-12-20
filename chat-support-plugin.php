<?php
/**
* @package chat-support-plugin
*/
/*
Plugin Name: Chat Support Plugin
Description: This plugin provides live chat functionality.
Author: Rida
Text Domain: chat-support-plugin
*/


if ( ! defined( 'CHAT_SUPPORT_PLUGIN_DIR' ) ) {
	define( 'CHAT_SUPPORT_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
}

include(CHAT_SUPPORT_PLUGIN_DIR.'/includes/main-functions.php' );
include(CHAT_SUPPORT_PLUGIN_DIR.'/includes/header-functions.php' );
include(CHAT_SUPPORT_PLUGIN_DIR.'/includes/bbpress-content-single-topic.php');




