<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
add_action( 'elementor_pro/init', function() {
	require( dirname(__FILE__).'/includes/class-messages-action.php' );
	$whats_action = new Whatsapp_Action_After_Submit;
	\ElementorPro\Plugin::instance()->modules_manager->get_modules( 'forms' )->add_form_action( $whats_action->get_name(), $whats_action );
});
