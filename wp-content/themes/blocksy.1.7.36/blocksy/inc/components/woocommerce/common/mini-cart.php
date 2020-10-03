<?php

remove_action('woocommerce_cart_collaterals', 'woocommerce_cross_sell_display');
add_action('wp_ajax_blocksy_get_woo_minicart', 'blocksy_get_woocommerce_minicart');
add_action('wp_ajax_nopriv_blocksy_get_woo_minicart', 'blocksy_get_woocommerce_minicart');

if (! function_exists('blocksy_get_woocommerce_minicart')) {
	function blocksy_get_woocommerce_minicart() {
		ob_start();
		woocommerce_mini_cart();
		$content = ob_get_clean();

		wp_send_json_success([
			'count' => WC()->cart->get_cart_contents_count(),
			'minicart' => blocksy_html_tag(
				'div',
				['class' => 'ct-cart-content'],
				$content
			)
		]);
	}
}

