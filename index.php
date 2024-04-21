<?php
/**
 * Plugin Name: Plugin action 
 * Author: Rupom
 * Desciption: Plugin description
 * Version: 1.0
 */
add_action( 'admin_menu', function(){
    add_menu_page('action_demo', 'action_demo', 'manage_options', 'actionmenu', 'action_callback');
} );
function action_callback(){
    print('hello');
}
add_action( 'activated_plugin', function($plugin){
    if(plugin_basename(__FILE__) == $plugin){
        wp_redirect(admin_url('admin.php?page=actionmenu'));
        die();
    }
} );

function plugin_action_callback($links){
    $link = sprintf('<a href="%s" style="color: red">%s</a>',admin_url('admin.php?page=actionmenu'),'Setting');
    array_push($links,$link);
    return $links;
}
add_filter( 'plugin_action_links_'. plugin_basename(__FILE__), 'plugin_action_callback');

// row link

function plugin_row_callback($links,$plugin){
    if(plugin_basename(__FILE__) == $plugin){
    $link = sprintf('<a href="%s" style="color: red" target="_blank">%s</a>',esc_url('https://github.com/M-M-H-Rupom'),'Github');
    array_push($links,$link);
    }
    return $links;
}
add_filter( 'plugin_row_meta', 'plugin_row_callback',10,2 );
?>