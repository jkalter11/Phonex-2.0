<?php


function chat_support_plugin_scripts() {

//importing chat-js.js file by usin gwp_enqueue_script function 
wp_enqueue_script( 'chat-js','/wp-content/plugins/chat-support-plugin/js/chat-js.js', array( 'jquery' ), '20150330', true );

//creating php array 
$data = array("id"=>get_current_user_id());

// Passing above array to chat-js file
wp_localize_script( "chat-js", "blog", $data );
}


add_action( 'wp_enqueue_scripts', 'chat_support_plugin_scripts' );
?>