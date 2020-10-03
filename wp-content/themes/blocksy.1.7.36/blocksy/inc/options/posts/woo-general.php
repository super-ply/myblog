<?php

$options = [
	'woo_general_section_options' => [
		'type' => 'ct-options',
		'setting' => [ 'transport' => 'postMessage' ],
		'inner-options' => [

			blocksy_rand_md5() => [
				'title' => __( 'General', 'blocksy' ),
				'type' => 'tab',
				'options' => [

					'sale_badge_shape' => [
						'type' => 'ct-radio',
						'label' => __( 'Sale Badge Shape', 'blocksy' ),
						'value' => 'square',
						'view' => 'text',
						'design' => 'block',
						'setting' => [ 'transport' => 'postMessage' ],
						'choices' => [
							'square' => __( 'Square', 'blocksy' ),
							'circle' => __( 'Circle', 'blocksy' ),
						],
					],

					'sale_badge_value' => [
						'type' => 'ct-radio',
						'label' => __( 'Sale Badge Value', 'blocksy' ),
						'value' => 'default',
						'view' => 'text',
						'design' => 'block',
						'setting' => [ 'transport' => 'postMessage' ],
						'choices' => [
							'default' => __( 'Default', 'blocksy' ),
							'custom' => __( 'Custom', 'blocksy' ),
						],
						'sync' => blocksy_sync_whole_page([
							'prefix' => 'woo_categories',
							'loader_selector' => '#primary.content-area .onsale'
						]),
					],

					blocksy_rand_md5() => [
						'type' => 'ct-condition',
						'condition' => [ 'sale_badge_value' => 'custom' ],
						'options' => [
							'sale_badge_custom_value' => [
								'label' => false,
								'type' => 'text',
								'design' => 'block',
								'value' => '-[value]%',
								'disableRevertButton' => true,
								'sync' => blocksy_sync_whole_page([
									'prefix' => 'woo_categories',
									'loader_selector' => '#primary.content-area .onsale'
								]),
							],
						],
					],

					blocksy_rand_md5() => [
						'type' => 'ct-divider',
					],

					'woocommerce_demo_store' => [
						'label' => __( 'Store Notice', 'blocksy' ),
						'type' => 'ct-switch',
						'value' => 'no',
						'desc' => __( 'Show events or promotions to your visitors.', 'blocksy' ),
						'setting' => [
							'sanitize_callback' => 'wc_bool_to_string',
							'sanitize_js_callback' => 'wc_bool_to_string',
							'type' => 'option'
						],
					],

					blocksy_rand_md5() => [
						'type' => 'ct-condition',
						'condition' => [ 'woocommerce_demo_store' => 'yes' ],
						'options' => [

							'woocommerce_demo_store_notice' => [
								'label' => false,
								'type' => 'textarea',
								'value' => __( 'This is a demo store for testing purposes &mdash; no orders shall be fulfilled.', 'blocksy' ),
								'setting' => [
									'type' => 'option',
									'transport' => 'postMessage'
								],
								'disableRevertButton' => true,
							],

							'store_notice_position' => [
								'type' => 'ct-radio',
								'label' => __( 'Notice Position', 'blocksy' ),
								'value' => 'bottom',
								'view' => 'text',
								'disableRevertButton' => true,
								'setting' => [ 'transport' => 'postMessage' ],
								'choices' => [
									'top' => __('Top', 'blocksy'),
									'bottom' => __('Bottom', 'blocksy'),
								],
							],

						],
					],

				],
			],


			blocksy_rand_md5() => [
				'title' => __( 'Design', 'blocksy' ),
				'type' => 'tab',
				'options' => [

					'saleBadgeColor' => [
						'label' => __( 'Sale Badge Color', 'blocksy' ),
						'type'  => 'ct-color-picker',
						'design' => 'inline',
						'setting' => [ 'transport' => 'postMessage' ],

						'value' => [
							'text' => [
								'color' => '#ffffff',
							],

							'background' => [
								'color' => 'var(--paletteColor1)',
							],
						],

						'pickers' => [
							[
								'title' => __( 'Text', 'blocksy' ),
								'id' => 'text',
							],

							[
								'title' => __( 'Background', 'blocksy' ),
								'id' => 'background',
							],
						],
					],

					'starRatingColor' => [
						'label' => __( 'Star Rating Color', 'blocksy' ),
						'type'  => 'ct-color-picker',
						'design' => 'inline',
						'divider' => 'top',
						'setting' => [ 'transport' => 'postMessage' ],

						'value' => [
							'default' => [
								'color' => '#FDA256',
							],

							'inactive' => [
								'color' => '#F9DFCC',
							],
						],

						'pickers' => [
							[
								'title' => __( 'Active', 'blocksy' ),
								'id' => 'default',
							],

							[
								'title' => __( 'Inactive', 'blocksy' ),
								'id' => 'inactive',
							],
						],
					],

					'infoMessageColor' => [
						'label' => __( 'Info Message Color', 'blocksy' ),
						'type'  => 'ct-color-picker',
						'design' => 'inline',
						'divider' => 'top',
						'setting' => [ 'transport' => 'postMessage' ],

						'value' => [
							'text' => [
								'color' => Blocksy_Css_Injector::get_skip_rule_keyword('DEFAULT'),
							],

							'background' => [
								'color' => '#F0F1F3',
							],
						],

						'pickers' => [
							[
								'title' => __( 'Text', 'blocksy' ),
								'id' => 'text',
								'inherit' => 'var(--color)'
							],

							[
								'title' => __( 'Background', 'blocksy' ),
								'id' => 'background',
							],
						],
					],

					'errorMessageColor' => [
						'label' => __( 'Error Message Color', 'blocksy' ),
						'type'  => 'ct-color-picker',
						'design' => 'inline',
						'setting' => [ 'transport' => 'postMessage' ],

						'value' => [
							'text' => [
								'color' => '#ffffff',
							],

							'background' => [
								'color' => 'rgba(218, 0, 28, 0.7)',
							],
						],

						'pickers' => [
							[
								'title' => __( 'Text', 'blocksy' ),
								'id' => 'text',
							],

							[
								'title' => __( 'Background', 'blocksy' ),
								'id' => 'background',
							],
						],
					],

					blocksy_rand_md5() => [
						'type' => 'ct-condition',
						'condition' => [ 'woocommerce_demo_store' => 'yes' ],
						'options' => [

							'wooNoticeContent' => [
								'label' => __( 'Notice Font Color', 'blocksy' ),
								'type'  => 'ct-color-picker',
								'design' => 'inline',
								'divider' => 'top',
								'skipEditPalette' => true,
								'setting' => [ 'transport' => 'postMessage' ],

								'value' => [
									'default' => [
										'color' => '#ffffff',
									],
								],

								'pickers' => [
									[
										'title' => __( 'Initial', 'blocksy' ),
										'id' => 'default',
									],
								],
							],

							'wooNoticeBackground' => [
								'label' => __( 'Notice Background Color', 'blocksy' ),
								'type'  => 'ct-color-picker',
								'design' => 'inline',
								'skipEditPalette' => true,
								'setting' => [ 'transport' => 'postMessage' ],

								'value' => [
									'default' => [
										'color' => 'var(--paletteColor1)',
									],
								],

								'pickers' => [
									[
										'title' => __( 'Initial', 'blocksy' ),
										'id' => 'default',
									],
								],
							],							

						],
					],

				],
			],

		],
	],
];
