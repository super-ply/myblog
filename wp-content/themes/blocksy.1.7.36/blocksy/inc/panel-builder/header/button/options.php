<?php

$options = [
	blocksy_rand_md5() => [
		'title' => __( 'General', 'blocksy' ),
		'type' => 'tab',
		'options' => [

			'header_button_type' => [
				'label' => false,
				'type' => 'ct-image-picker',
				'value' => 'type-1',
				'choices' => [

					'type-1' => [
						'src'   => blocksy_image_picker_file( 'button-1' ),
						'title' => __( 'Default', 'blocksy' ),
					],

					'type-2' => [
						'src'   => blocksy_image_picker_file( 'button-2' ),
						'title' => __( 'Ghost', 'blocksy' ),
					],

				],
			],

			'header_button_size' => [
				'label' => __('Size', 'blocksy'),
				'type' => 'ct-radio',
				'value' => 'small',
				'view' => 'text',
				'design' => 'block',
				'divider' => 'bottom',
				'choices' => [
					'small' => __( 'Small', 'blocksy' ),
					'medium' => __( 'Medium', 'blocksy' ),
					'large' => __( 'Large', 'blocksy' ),
				],
			],

			'header_button_text' => [
				'label' => __( 'Label', 'blocksy' ),
				'type' => 'text',
				'design' => 'inline',
				'value' => __( 'Download', 'blocksy' ),
			],

			'header_button_link' => [
				'label' => __( 'URL', 'blocksy' ),
				'type' => 'text',
				'design' => 'inline',
				'value' => '',
			],

			'header_button_target' => [
				'label' => __( 'Open in new tab', 'blocksy' ),
				'type'  => 'ct-switch',
				'value' => 'no',
				'divider' => 'top',
			],

			blocksy_rand_md5() => [
				'type' => 'ct-condition',
				'condition' => [ 'wp_customizer_current_view' => 'mobile' ],
				'options' => [

					blocksy_rand_md5() => [
						'type' => 'ct-divider',
					],

					'visibility' => [
						'label' => __( 'Visibility', 'blocksy' ),
						'type' => 'ct-visibility',
						'design' => 'block',
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

		],
	],

	blocksy_rand_md5() => [
		'title' => __( 'Design', 'blocksy' ),
		'type' => 'tab',
		'options' => [

			blocksy_rand_md5() => [
				'type' => 'ct-labeled-group',
				'label' => __( 'Font Color', 'blocksy' ),
				'divider' => 'bottom',
				'responsive' => true,
				'choices' => [
					[
						'id' => 'headerButtonFontColor',
						'label' => __('Default State', 'blocksy')
					],

					[
						'id' => 'transparentHeaderButtonFontColor',
						'label' => __('Transparent State', 'blocksy'),
						'condition' => [
							'builderSettings/has_transparent_header' => 'yes',
						],
					],

					[
						'id' => 'stickyHeaderButtonFontColor',
						'label' => __('Sticky State', 'blocksy'),
						'condition' => [
							'builderSettings/has_sticky_header' => 'yes',
						],
					],
				],
				'options' => [

					'headerButtonFontColor' => [
						'label' => __( 'Font Color', 'blocksy' ),
						'type'  => 'ct-color-picker',
						'design' => 'block:right',
						'responsive' => true,
						'value' => [
							'default' => [
								'color' => Blocksy_Css_Injector::get_skip_rule_keyword('DEFAULT'),
							],

							'hover' => [
								'color' => Blocksy_Css_Injector::get_skip_rule_keyword('DEFAULT'),
							],

							'default_2' => [
								'color' => 'var(--buttonInitialColor)',
							],

							'hover_2' => [
								'color' => '#ffffff',
							],
						],

						'pickers' => [
							[
								'title' => __( 'Initial', 'blocksy' ),
								'id' => 'default',
								'inherit' => 'var(--buttonTextInitialColor)',
								'condition' => [ 'header_button_type' => 'type-1' ]
							],

							[
								'title' => __( 'Hover', 'blocksy' ),
								'id' => 'hover',
								'inherit' => 'var(--buttonTextHoverColor)',
								'condition' => [ 'header_button_type' => 'type-1' ]
							],

							[
								'title' => __( 'Initial', 'blocksy' ),
								'id' => 'default_2',
								'condition' => [ 'header_button_type' => 'type-2' ]
							],

							[
								'title' => __( 'Hover', 'blocksy' ),
								'id' => 'hover_2',
								'condition' => [ 'header_button_type' => 'type-2' ]
							],
						],
					],

					'transparentHeaderButtonFontColor' => [
						'label' => __( 'Font Color', 'blocksy' ),
						'type'  => 'ct-color-picker',
						'design' => 'block:right',
						'responsive' => true,
						'value' => [
							'default' => [
								'color' => Blocksy_Css_Injector::get_skip_rule_keyword('DEFAULT'),
							],

							'hover' => [
								'color' => Blocksy_Css_Injector::get_skip_rule_keyword('DEFAULT'),
							],

							'default_2' => [
								'color' => Blocksy_Css_Injector::get_skip_rule_keyword('DEFAULT'),
							],

							'hover_2' => [
								'color' => Blocksy_Css_Injector::get_skip_rule_keyword('DEFAULT'),
							],
						],

						'pickers' => [
							[
								'title' => __( 'Initial', 'blocksy' ),
								'id' => 'default',
								'condition' => [ 'header_button_type' => 'type-1' ]
							],

							[
								'title' => __( 'Hover', 'blocksy' ),
								'id' => 'hover',
								'condition' => [ 'header_button_type' => 'type-1' ]
							],

							[
								'title' => __( 'Initial', 'blocksy' ),
								'id' => 'default_2',
								'condition' => [ 'header_button_type' => 'type-2' ]
							],

							[
								'title' => __( 'Hover', 'blocksy' ),
								'id' => 'hover_2',
								'condition' => [ 'header_button_type' => 'type-2' ]
							],
						],
					],

					'stickyHeaderButtonFontColor' => [
						'label' => __( 'Font Color', 'blocksy' ),
						'type'  => 'ct-color-picker',
						'design' => 'block:right',
						'responsive' => true,
						'value' => [
							'default' => [
								'color' => Blocksy_Css_Injector::get_skip_rule_keyword('DEFAULT'),
							],

							'hover' => [
								'color' => Blocksy_Css_Injector::get_skip_rule_keyword('DEFAULT'),
							],

							'default_2' => [
								'color' => Blocksy_Css_Injector::get_skip_rule_keyword('DEFAULT'),
							],

							'hover_2' => [
								'color' => Blocksy_Css_Injector::get_skip_rule_keyword('DEFAULT'),
							],
						],

						'pickers' => [
							[
								'title' => __( 'Initial', 'blocksy' ),
								'id' => 'default',
								'condition' => [ 'header_button_type' => 'type-1' ]
							],

							[
								'title' => __( 'Hover', 'blocksy' ),
								'id' => 'hover',
								'condition' => [ 'header_button_type' => 'type-1' ]
							],

							[
								'title' => __( 'Initial', 'blocksy' ),
								'id' => 'default_2',
								'condition' => [ 'header_button_type' => 'type-2' ]
							],

							[
								'title' => __( 'Hover', 'blocksy' ),
								'id' => 'hover_2',
								'condition' => [ 'header_button_type' => 'type-2' ]
							],
						],
					],
				],
			],


			blocksy_rand_md5() => [
				'type' => 'ct-labeled-group',
				'label' => __( 'Button Color', 'blocksy' ),
				'responsive' => true,
				'choices' => [
					[
						'id' => 'headerButtonForeground',
						'label' => __('Default State', 'blocksy')
					],

					[
						'id' => 'transparentHeaderButtonForeground',
						'label' => __('Transparent State', 'blocksy'),
						'condition' => [
							'builderSettings/has_transparent_header' => 'yes',
						],
					],

					[
						'id' => 'stickyHeaderButtonForeground',
						'label' => __('Sticky State', 'blocksy'),
						'condition' => [
							'builderSettings/has_sticky_header' => 'yes',
						],
					],
				],
				'options' => [

					'headerButtonForeground' => [
						'label' => __( 'Button Color', 'blocksy' ),
						'type'  => 'ct-color-picker',
						'design' => 'block:right',
						'responsive' => true,
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
								'inherit' => 'var(--buttonInitialColor)'
							],

							[
								'title' => __( 'Hover', 'blocksy' ),
								'id' => 'hover',
								'inherit' => 'var(--buttonHoverColor)'
							],
						],
					],

					'transparentHeaderButtonForeground' => [
						'label' => __( 'Button Color', 'blocksy' ),
						'type'  => 'ct-color-picker',
						'design' => 'block:right',
						'responsive' => true,
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

					'stickyHeaderButtonForeground' => [
						'label' => __( 'Button Color', 'blocksy' ),
						'type'  => 'ct-color-picker',
						'design' => 'block:right',
						'responsive' => true,
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
				'type' => 'ct-divider',
			],

			'headerCtaRadius' => [
				'label' => __( 'Border Radius', 'blocksy' ),
				'type' => 'ct-spacing',
				'value' => blocksy_spacing_value([
					'linked' => true,
				]),
				'responsive' => true
			],

			'headerCtaMargin' => [
				'label' => __( 'Margin', 'blocksy' ),
				'type' => 'ct-spacing',
				'divider' => 'top',
				'value' => blocksy_spacing_value([
					'linked' => true,
				]),
				'responsive' => true,
			],

		],
	],
];
