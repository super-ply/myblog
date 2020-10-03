<?php

add_filter(
	'woocommerce_format_sale_price',
	function ($price, $regular_price, $sale_price) {
		return '<span class="sale-price">' . $price . '</span>';
	},
	10,
	3
);

add_action(
	'woocommerce_before_quantity_input_field',
	function () {
		if ((is_product() || wp_doing_ajax()) && blocksy_get_post_editor() === 'brizy') {
			return;
		}

		echo '<span class="ct-increase"></span>';
		echo '<span class="ct-decrease"></span>';
	}
);

add_action(
	'woocommerce_before_main_content',
	function () {
		$prefix = blocksy_manager()->screen->get_prefix();

		if ($prefix === 'woo_categories') {
			/**
			 * Note to code reviewers: This line doesn't need to be escaped.
			 * Function blocksy_output_hero_section() used here escapes the value properly.
			 */
			echo blocksy_output_hero_section('type-2');
		}

		$container_class = 'ct-container';

		if (blocksy_get_page_structure() === 'narrow') {
			$container_class = 'ct-container-narrow';
		}

		echo '<section id="primary" class="content-area" ' . blocksy_get_v_spacing() . '>';
		echo '<div class="' . $container_class . '"' . wp_kses(blocksy_sidebar_position_attr(), []) . '>';
		echo '<section>';

		if (is_product()) {
			$breadcrumbs_builder = new Blocksy_Breadcrumbs_Builder();
			$breadcrumbs_content = $breadcrumbs_builder->render();

			if (get_theme_mod('has_product_breadcrumbs', 'yes') === 'yes') {
				echo $breadcrumbs_content;
			}

			if (is_customize_preview()) {
				blocksy_add_customizer_preview_cache(blocksy_html_tag(
					'div',
					['data-id' => 'shop-breadcrumbs'],
					$breadcrumbs_content
				));
			}
		}

		if ($prefix === 'woo_categories') {
			/**
			 * Note to code reviewers: This line doesn't need to be escaped.
			 * Function blocksy_output_hero_section() used here escapes the value properly.
			 */
			echo blocksy_output_hero_section('type-1');
		}
	}
);

add_action(
	'woocommerce_after_main_content',
	function () {
		echo '</section>';
		get_sidebar();
		echo '</div>';
		echo '</section>';
	}
);

