<?php


/// These hooks will be used if you're using this plugin with famous BBPress Plugin. This file will replace the original templates of BBPress with this one given below.

add_filter( 'bbp_get_template_stack',function($stack){

    if ( is_array( $stack ) ) {
            $stack[] =CHAT_SUPPORT_PLUGIN_DIR.'/templates';
        }

        return $stack;

});
    

add_filter( 'bbp_get_template_part',function($templates, $slug, $name){
  
    if ( 'single-topic' === $name && 'content' === $slug)
    {
        $template_file = "cont-single-topic.php";
    }
   array_unshift( $templates, $template_file );

    return $templates;

},10,3);


