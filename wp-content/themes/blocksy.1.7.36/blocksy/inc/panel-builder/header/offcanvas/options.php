<?php

$options = [
	blocksy_rand_md5() => [
		'title' => __( 'General', 'blocksy' ),
		'type' => 'tab',
		'options' => [

			'offcanvas_behavior' => [
				'label' => __('Reaveal as', 'blocksy'),
				'type' => 'ct-radio',
				'value' => 'panel',
				'view' => 'text',
				'design' => 'block',
				'setting' => [ 'transport' => 'postMessage' ],
				'choices' => [
					'modal' => __( 'Modal', 'blocksy' ),
					'panel' => __( 'Side Panel', 'blocksy' ),
				],
			],

			blocksy_rand_md5() => [
				'type' => 'ct-condition',
				'condition' => [ 'offcanvas_behavior' => 'panel' ],
				'options' => [

					'side_panel_position' => [
						'label' => __('Reveal From', 'blocksy'),
						'type' => 'ct-radio',
						'value' => 'right',
						'view' => 'text',
						'design' => 'block',
						'setting' => [ 'transport' => 'postMessage' ],
						'choices' => [
							'left' => __( 'Left Side', 'blocksy' ),
							'right' => __( 'Right Side', 'blocksy' ),
						],
					],

				],
			],

			'offcanvasContentAlignment' => [
				'type' => 'ct-radio',
				'label' => __( 'Content Horizontal Alignment', 'blocksy' ),
				'value' => 'left',
				'view' => 'text',
				'design' => 'block',
				'divider' => 'top',
				'disableRevertButton' => true,
				'attr' => [ 'data-type' => 'alignment' ],
				'setting' => [ 'transport' => 'postMessage' ],
				'choices' => [
					'left' => '',
					'center' => '',
					'right' => '',
				],
			],

		],
	],

	blocksy_rand_md5() => [
		'title' => __( 'Design', 'blocksy' ),
		'type' => 'tab',
		'options' => [

			'offcanvasBackground' => [
				'label' => __( 'Background', 'blocksy' ),
				'type'  => 'ct-background',
				'design' => 'inline',
				'setting' => [ 'transport' => 'postMessage' ],
				'value' => blocksy_background_default_value([
					'backgroundColor' => [
						'default' => [
							'color' => 'rgba(18, 21, 25, 0.98)'
						],
					],
				])
			],

			blocksy_rand_md5() => [
				'type' => 'ct-condition',
				'condition' => [ 'offcanvas_behavior' => 'panel' ],
				'options' => [

					'headerPanelShadow' => [
						'label' => __( 'Shadow', 'blocksy' ),
						'type' => 'ct-box-shadow',
						'design' => 'inline',
						// 'responsive' => true,
						'divider' => 'top',
						'value' => blocksy_box_shadow_value([
							'enable' => true,
							'h_offset' => 0,
							'v_offset' => 0,
							'blur' => 70,
							'spread' => 0,
							'inset' => false,
							'color' => [
								'color' => 'rgba(0, 0, 0, 0.35)',
							],
						])
					],

				],
			],

			blocksy_rand_md5() => [
				'type' => 'ct-divider',
			],

			'menu_close_button_color' => [
				'label' => __( 'Close Icon Color', 'blocksy' ),
				'type'  => 'ct-color-picker',
				'design' => 'inline',
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
						'inherit' => 'rgba(255, 255, 255, 0.7)'
					],

					[
						'title' => __( 'Hover', 'blocksy' ),
						'id' => 'hover',
						'inherit' => '#ffffff'
					],
				],
			],

			'menu_close_button_shape_color' => [
				'label' => __( 'Close Icon Background', 'blocksy' ),
				'type'  => 'ct-color-picker',
				'design' => 'inline',
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
						'inherit' => 'rgba(0, 0, 0, 0.5)'
					],

					[
						'title' => __( 'Hover', 'blocksy' ),
						'id' => 'hover',
						'inherit' => 'rgba(0, 0, 0, 0.5)'
					],
				],
			],

		],
	],

];
