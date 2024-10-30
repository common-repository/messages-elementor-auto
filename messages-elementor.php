<?php
/**
 * Plugin Name: Messages for Elementor Auto
 * Plugin URI: https://mestresdowp.com.br
 * Description: Envie mensagens através do WhatsApp para seus leads através do Elementor.
 * Author: Mestres do WP
 * Version: 2.3
 * License: GPLv2 or later
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
require dirname(__FILE__).'/admin/messages-elementor.php';
require dirname(__FILE__).'/init-messages-action.php';
function mwpel_extensions_check_elementorpro_active () {
	if ( ! is_plugin_active( 'elementor-pro/elementor-pro.php' ) ) {
	  	echo "<div class='error'><p><strong>Messages for Elementor</strong> requires <strong> Elementor Pro plugin</strong> </p></div>";
		}
	}
add_action('admin_notices', 'mwpel_extensions_check_elementorpro_active');