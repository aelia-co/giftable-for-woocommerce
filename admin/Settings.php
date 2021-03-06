<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

if ( ! class_exists( 'WC_Settings_Gifts' ) ) :

/**
 * WC_Settings_Gifts.
 *
 * @since 	0.9.0
 */
class WC_Settings_Gifts extends WC_Settings_Page {

	public function __construct() {

		$this->id    = 'gifts';
		$this->label = __( 'Gifts', DGFW::TRANSLATION );

		add_filter( 'woocommerce_settings_tabs_array', array( $this, 'add_settings_page' ), 20 );
		add_action( 'woocommerce_settings_' . $this->id, array( $this, 'output' ) );
		add_action( 'woocommerce_settings_save_' . $this->id, array( $this, 'save' ) );
	}

	public function get_settings() {
		$settings = apply_filters( 'woocommerce_' . $this->id . '_settings', array(

			array(	'title' => __( 'Gifts Options', DGFW::TRANSLATION ), 'type' => 'title', 'id' => 'gift_options' ),

			array(
				'title'         => __( 'Enable Gifts', DGFW::TRANSLATION ),
				'desc'          => __( 'Enable gifts functionality for this shop', DGFW::TRANSLATION ),
				'id'            => 'woocommerce_dgfw_enable_gifts',
				'default'       => 'yes',
				'type'          => 'checkbox',
				'checkboxgroup' => 'start',
				'autoload'      => false,
			),

			array(
				'title'    => __( 'Gifts carousel title', DGFW::TRANSLATION ),
				'desc'     => __( 'The title for the gifts carousel box shown to customers.', DGFW::TRANSLATION ),
				'id'       => 'woocommerce_dgfw_carousel_title',
				'default'  => __( 'Choose your free gift', DGFW::TRANSLATION ),
				'type'     => 'text',
				'desc_tip' =>  true,
			),

			array(
				'title'    => __( 'Add gift button title', DGFW::TRANSLATION ),
				'desc'     => __( 'Text for add gift to cart buttons show to customers.', DGFW::TRANSLATION ),
				'id'       => 'woocommerce_dgfw_gift_button_title',
				'default'  => __( 'Add to cart', DGFW::TRANSLATION ),
				'type'     => 'text',
				'desc_tip' =>  true,
			),


			array( 'type' => 'sectionend', 'id' => 'gift_options'),

		) );

		return apply_filters( 'woocommerce_get_settings_' . $this->id, $settings );
	}
}

endif;

return new WC_Settings_Gifts();
