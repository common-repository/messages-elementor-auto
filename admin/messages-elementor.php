<?php
define( 'MEMWP_PLUGIN_ADMIN_URL', plugin_dir_url( __FILE__ ) );
add_action('admin_menu', 'memwp_add_global_custom_options');
function memwp_add_global_custom_options(){
	global $submenu;
	if ( empty ( $GLOBALS['admin_page_hooks']['mwp_plugins'] ) ){
		add_menu_page('Mestres do WP', 'Mestres do WP', 'manage_options', 'mwp_plugins','mwp_plugins', MEMWP_PLUGIN_ADMIN_URL.'assets/images/faviconmwp.png',3);
	}
	add_submenu_page('mwp_plugins', 'Messages Elementor', 'Messages Elementor', 'manage_options', 'memwp_messages_elementor', 'memwp_messages_elementor');
	unset( $submenu['mwp_plugins'][0] );

}
add_action( 'wp_ajax_mewp_get_plugins_licensa', 'mewp_get_plugins_licensa' );
add_action( 'wp_ajax_nopriv_mewp_get_plugins_licensa', 'mewp_get_plugins_licensa' );
function mewp_get_plugins_licensa(){
	$return_licensa = wp_remote_get("https://www.mestresdowp.com.br/checkout/api-messages-for-elementor.php?email=".$_POST['email']."&product=".$_POST['product']."&url=".$_POST['url']."", array('headers' => array('Content-Type' => 'application/json')));
	$licensa_body = wp_remote_retrieve_body($return_licensa);
	if($licensa_body==true){
		update_option('cwmp_license_memwp_active','true');
		update_option('cwmp_license_memwp_email',$_POST['email']);
	}else{
		update_option('cwmp_license_memwp_active','');
		update_option('cwmp_license_memwp_email','');
	}
	wp_die();
}
add_action( 'wp_ajax_mewp_get_plugins_licensa_remove', 'mewp_get_plugins_licensa_remove' );
add_action( 'wp_ajax_nopriv_mewp_get_plugins_licensa_remove', 'mewp_get_plugins_licensa_remove' );
function mewp_get_plugins_licensa_remove(){
	$return_licensa = wp_remote_get("https://www.mestresdowp.com.br/checkout/api-messages-for-elementor.php?email=".$_POST['email']."&product=".$_POST['product']."&url=".$_POST['url']."&action=remove", array('headers' => array('Content-Type' => 'application/json')));
	$licensa_body = wp_remote_retrieve_body($return_licensa);
	if($licensa_body==true){
		update_option('cwmp_license_memwp_active','');
		update_option('cwmp_license_memwp_email','');
	}
	wp_die();
}
add_action( 'admin_init', 'memwp_load_admin_css' );
function memwp_load_admin_css() {
    wp_enqueue_style( 'cwmp_style_admin_checkout', 'https://mestresdowp.com.br/admin/administrador.css', array(), rand(111,9999), 'all' );
	wp_enqueue_script( 'cwmp_admin_get_js', 'https://mestresdowp.com.br/admin/administrador.js', array(), rand(111,9999), 'all' );
	if(get_option('cwmp_license_memwp_active')==true){
	if(isset($_GET['page'])=="memwp_messages_elementor"){
	wp_enqueue_script( 'cwmp_admin_get_socket_io', 'https://cdnjs.cloudflare.com/ajax/libs/socket.io/2.3.0/socket.io.js', array(), rand(111,9999), 'all' );
	wp_enqueue_script( 'cwmp_admin_get_js_whatsapp', 'https://mestresdowp.com.br/admin/whatsapp.js', array(), rand(111,9999), 'all' );
	}
	}
}
function memwp_messages_elementor(){ include "includes/messages-elementor-html-form.php"; }