<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
class Whatsapp_Action_After_Submit extends \ElementorPro\Modules\Forms\Classes\Action_Base {
	public function get_name() {
		return 'whatsapp';
	}
	public function get_label() {
		return __( 'WhatsApp', 'whatsapp-redirect' );
	}
	public function register_settings_section( $widget ) {
		$widget->start_controls_section(
			'section_whatsapp-redirect',
			[
				'label' => __( 'WhatsApp', 'whatsapp-redirect' ),
				'condition' => [
					'submit_actions' => $this->get_name(),
				],
			]
		);
		$widget->add_control(
			'whatsapp_to',
			[
				'label' => __( 'Campo do telefone', 'whatsapp-redirect' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'placeholder' => __( '[field id="phone"]', 'whatsapp-redirect' ),
				'label_block' => true,
				'render_type' => 'none',
				'classes' => 'elementor-control-whats-phone-direction-ltr',
				'description' => __( 'Digite o campo de telefone', 'whatsapp-redirect' ),
			]
		);
		$widget->add_control(
			'whatsapp_message',
			[
				'label' => __( 'Mensagem automática', 'whatsapp-redirect' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'placeholder' => __( 'Utilize shortcodes para personalizar a mensagem que seu lead irá receber.', 'whatsapp-redirect' ),
				'label_block' => true,
				'render_type' => 'none',
				'classes' => 'elementor-control-whats-direction-ltr',
				'description' => __( 'Utiliza \n para quebra de linha.<br/>Utilize shortcodes para personalizar a mensagem que seu lead irá receber.', 'whatsapp-redirect' ),
			]
		);
		$widget->end_controls_section();
		
	}
	public function on_export( $element ) {
		unset(
			$element['settings']['whatsapp_to'],
			$element['settings']['whatsapp_message']
		);
		return $element;
	}
	public function run( $record, $ajax_handler ) {
		$whatsapp_to = $record->get_form_settings( 'whatsapp_to' );
		$whatsapp_message = $record->get_form_settings( 'whatsapp_message' );
		$whatsapp_to = $record->replace_setting_shortcodes( $whatsapp_to, true );
		$whatsapp_message = $record->replace_setting_shortcodes( $whatsapp_message, true );
		$whatsapp_message = str_replace('+', ' ', $whatsapp_message);
		$whatsapp_to = preg_replace('/[^0-9]/', '', $whatsapp_to);
		if(substr($whatsapp_to,0,2)>=30){
			$whatsapp_to = substr($whatsapp_to,0,2)."".substr($whatsapp_to,3,9);
		}else{
			$whatsapp_to = substr($whatsapp_to,0,2)."".substr($whatsapp_to,2,9);
		}
	    $data = array(
            'session' => get_option('mwp_end_point'),
            'token' => get_option('mwp_key_api'),
            'url' => get_bloginfo('url'),
            'phone' => "".get_option('mwp_whatsapp_ddi')."".$whatsapp_to,
            'message' => $whatsapp_message
        );
		$send = wp_remote_post('https://whatstotal.com.br/sender/', array(
			'method' => 'POST',
			'body' => $data
		));

	}
}