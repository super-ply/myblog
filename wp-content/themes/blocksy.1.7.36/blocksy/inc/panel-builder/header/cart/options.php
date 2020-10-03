<?php

$options = [

	blocksy_rand_md5() => [
		'type' => 'ct-title',
		'label' => __( 'Top Level Options', 'blocksy' ),
	],

	blocksy_rand_md5() => [
		'title' => __( 'General', 'blocksy' ),
		'type' => 'tab',
		'options' => [

			'mini_cart_type' => [
				'label' => false,
				'type' => 'ct-image-picker',
				'value' => 'type-1',
				'attr' => [
					'data-type' => 'background',
					'data-columns' => '3',
				],
				'divider' => 'bottom',
				'setting' => [ 'transport' => 'postMessage' ],
				'choices' => [

					'type-1' => [
						'src'   => blocksy_image_picker_file( 'cart-1' ),
						'title' => __( 'Type 1', 'blocksy' ),
					],

					'type-2' => [
						'src'   => blocksy_image_picker_file( 'cart-2' ),
						'title' => __( 'Type 2', 'blocksy' ),
					],

					'type-3' => [
						'src'   => blocksy_image_picker_file( 'cart-3' ),
						'title' => __( 'Type 3', 'blocksy' ),
					],
				],
			],

			'cartIconSize' => [
				'label' => __( 'Icon Size', 'blocksy' ),
				'type' => 'ct-slider',
				'min' => 5,
				'max' => 50,
				'value' => 15,
				'responsive' => true,
				'setting' => [ 'transport' => 'postMessage' ],
			],

			'has_cart_badge' => [
				'label' => __( 'Icon Badge', 'blocksy' ),
				'type' => 'ct-switch',
				'value' => 'yes',
				'setting' => [ 'transport' => 'postMessage' ],
			],

			'has_cart_subtotal' => [
				'label' => __( 'Top Level Total', 'blocksy' ),
				'type' => 'ct-switch',
				'value' => 'no',
				'divider' => 'top',
				'setting' => [ 'transport' => 'postMessage' ],
			],

		],
	],

	blocksy_rand_md5() => [
		'title' => __( 'Design', 'blocksy' ),
		'type' => 'tab',
		'options' => [
			blocksy_rand_md5() => [
				'type' => 'ct-labeled-group',
				'label' => __( 'Icon Color', 'blocksy' ),
				'responsive' => true,
				'choices' => [
					[
						'id' => 'cartHeaderIconColor',
						'label' => __('Default State', 'blocksy')
					],

					[
						'id' => 'transparentCartHeaderIconColor',
						'label' => __('Transparent State', 'blocksy'),
						'condition' => [
							'builderSettings/has_transparent_header' => 'yes',
						],
					],

					[
						'id' => 'stickyCartHeaderIconColor',
						'label' => __('Sticky State', 'blocksy'),
						'condition' => [
							'builderSettings/has_sticky_header' => 'yes',
						],
					],	
				],
				'options' => [
					'cartHeaderIconColor' => [
						'label' => __( 'Icon Color', 'blocksy' ),
						'type'  => 'ct-color-picker',
						'design' => 'block:right',
						'responsive' => true,
						'setting' => [ 'transport' => 'postMessage' ],
						'value' => [
							'default' => [
								'color' => 'var(--color)',
							],

							'hover' => [
								'color' => Blocksy_Css_Injector::get_skip_rule_keyword('DEFAULT'),
							],
						],

						'pickers' => [
							[
								'title' => __( 'Initial', 'blocksy' ),
								'id' => 'default',
							],

							[
								'title' => __( 'Hover', 'blocksy' ),
								'id' => 'hover',
								'inherit' => 'var(--linkHoverColor)'
							],
						],
					],

					'transparentCartHeaderIconColor' => [
						'label' => __( 'Icon Color', 'blocksy' ),
						'type'  => 'ct-color-picker',
						'design' => 'block:right',
						'responsive' => true,
						'setting' => [ 'transport' => 'postMessage' ],
						'value' => [
							'default' => [
								'color' => Blocksy_Css_Injector::get_skip_rule_keyword('DEFAULT'),
							],

							'hover' => [
								'color' => Blocksy_Css_Injector::get_skip_rule_keyword('DEFAULT'),
							],
						],

						'pickers' => [
							[
								'title' => __( 'Initial', 'blocksy' ),
								'id' => 'default',
							],

							[
								'title' => __( 'Hover', 'blocksy' ),
								'id' => 'hover',
							],
						],
					],

					'stickyCartHeaderIconColor' => [
						'label' => __( 'Icon Color', 'blocksy' ),
						'type'  => 'ct-color-picker',
						'design' => 'block:right',
						'responsive' => true,
						'setting' => [ 'transport' => 'postMessage' ],
						'value' => [
							'default' => [
								'color' => Blocksy_Css_Injector::get_skip_rule_keyword('DEFAULT'),
							],

							'hover' => [
								'color' => Blocksy_Css_Injector::get_skip_rule_keyword('DEFAULT'),
							],
						],

						'pickers' => [
							[
								'title' => __( 'Initial', 'blocksy' ),
								'id' => 'default',
							],

							[
								'title' => __( 'Hover', 'blocksy' ),
								'id' => 'hover',
							],
						],
					],
				],
			],


			blocksy_rand_md5() => [
				'type' => 'ct-labeled-group',
				'label' => __( 'Badge Color', 'blocksy' ),
				'responsive' => true,
				'divider' => 'top',
				'choices' => [
					[
						'id' => 'cartBadgeColor',
						'label' => __('Default State', 'blocksy'),
						'condition' => [
							'has_cart_badge' => 'yes',
						],
					],

					[
						'id' => 'transparentCartBadgeColor',
						'label' => __('Transparent State', 'blocksy'),
						'condition' => [
							'has_cart_badge' => 'yes',
							'builderSettings/has_transparent_header' => 'yes',
						],
					],

					[
						'id' => 'stickyCartBadgeColor',
						'label' => __('Sticky State', 'blocksy'),
						'condition' => [
							'builderSettings/has_sticky_header' => 'yes',
						],
					],	
				],
				'options' => [

					'cartBadgeColor' => [
						'label' => __( 'Badge Color', 'blocksy' ),
						'type'  => 'ct-color-picker',
						'design' => 'block:right',
						'responsive' => true,
						'setting' => [ 'transport' => 'postMessage' ],
						'value' => [
							'background' => [
								'color' => 'var(--paletteColor1)',
							],

							'text' => [
								'color' => '#ffffff',
							],
						],

						'pickers' => [
							[
								'title' => __( 'Background', 'blocksy' ),
								'id' => 'background',
							],

							[
								'title' => __( 'Text', 'blocksy' ),
								'id' => 'text',
							],
						],
					],

					'transparentCartBadgeColor' => [
						'label' => __( 'Badge Color', 'blocksy' ),
						'type'  => 'ct-color-picker',
						'design' => 'block:right',
						'divider' => 'top',
						'responsive' => true,
						'setting' => [ 'transport' => 'postMessage' ],
						'value' => [
							'background' => [
								'color' => Blocksy_Css_Injector::get_skip_rule_keyword('DEFAULT'),
							],

							'text' => [
								'color' => Blocksy_Css_Injector::get_skip_rule_keyword('DEFAULT'),
							],
						],

						'pickers' => [
							[
								'title' => __( 'Background', 'blocksy' ),
								'id' => 'background',
							],

							[
								'title' => __( 'Text', 'blocksy' ),
								'id' => 'text',
							],
						],
					],

					'stickyCartBadgeColor' => [
						'label' => __( 'Badge Color', 'blocksy' ),
						'type'  => 'ct-color-picker',
						'design' => 'block:right',
						'divider' => 'top',
						'responsive' => true,
						'setting' => [ 'transport' => 'postMessage' ],
						'value' => [
							'background' => [
								'color' => Blocksy_Css_Injector::get_skip_rule_keyword('DEFAULT'),
							],

							'text' => [
								'color' => Blocksy_Css_Injector::get_skip_rule_keyword('DEFAULT'),
							],
						],

						'pickers' => [
							[
								'title' => __( 'Background', 'blocksy' ),
								'id' => 'background',
							],

							[
								'title' => __( 'Text', 'blocksy' ),
								'id' => 'text',
							],
						],
					],

				],
			],

			'headerCartMargin' => [
				'label' => __( 'Margin', 'blocksy' ),
				'type' => 'ct-spacing',
				'divider' => 'top',
				'setting' => [ 'transport' => 'postMessage' ],
				'value' => blocksy_spacing_value([
					'linked' => true,
				]),
				'responsive' => true
			],

		],
	],

	blocksy_rand_md5() => [
		'type' => 'ct-divider',
	],

	'has_cart_dropdown' => [
		'label' => __( 'Cart Dropdown', 'blocksy' ),
		'type' => 'ct-switch',
		'value' => 'yes',
		'wrapperAttr' => [ 'data-label' => 'heading-label' ],
		'setting' => [ 'transport' => 'postMessage' ],
	],

	blocksy_rand_md5() => [
		'type' => 'ct-condition',
		'condition' => [ 'has_cart_dropdown' => 'yes' ],
		'options' => [

			blocksy_rand_md5() => [
				'title' => __( 'General', 'blocksy' ),
				'type' => 'tab',
				'options' => [

					'cartDropdownTopOffset' => [
						'label' => __( 'Dropdown Top Offset', 'blocksy' ),
						'type' => 'ct-slider',
						'value' => 15,
						'min' => 0,
						'max' => 50,
						'setting' => [ 'transport' => 'postMessage' ],
					],

				],
			],

			blocksy_rand_md5() => [
				'title' => __( 'Design', 'blocksy' ),
				'type' => 'tab',
				'options' => [

					'cartFontColor' => [
						'label' => __( 'Font Color', 'blocksy' ),
						'type'  => 'ct-color-picker',
						'design' => 'inline',
						'setting' => [ 'transport' => 'postMessage' ],
						'value' => [
							'default' => [
								'color' => '#ffffff',
							],

							'hover' => [
								'color' => Blocksy_Css_Injector::get_skip_rule_keyword('DEFAULT'),
							],
						],

						'pickers' => [
							[
								'title' => __( 'Initial', 'blocksy' ),
								'id' => 'default',
							],

							[
								'title' => __( 'Hover', 'blocksy' ),
								'id' => 'hover',
								'inherit' => 'var(--linkHoverColor)'
							],
						],
					],

					'cartDropDownBackground' => [
						'label' => __( 'Background Color', 'blocksy' ),
						'type'  => 'ct-color-picker',
						'design' => 'inline',
						'setting' => [ 'transport' => 'postMessage' ],

						'value' => [
							'default' => [
								'color' => '#29333C',
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


	blocksy_rand_md5() => [
		'type' => 'ct-condition',
		'condition' => [ 'wp_customizer_current_view' => 'mobile' ],
		'options' => [

			blocksy_rand_md5() => [
				'type' => 'ct-divider',
			],

			'header_cart_visibility' => [
				'label' => __( 'Item Visibility', 'blocksy' ),
				'type' => 'ct-visibility',
				'design' => 'block',
				'setting' => [ 'transport' => 'postMessage' ],
				'allow_empty' => true,
				'value' => [
					'tablet' => true,
					'mobile' => true,
				],

				'choices' => blocksy_ordered_keys([
					'tablet' => __( 'Tablet', 'blocksy' ),
					'mobile' => __( 'Mobile', 'blocksy' ),
				]),
			],

		],
	],

];
