<?php

$location = 'Mobile Menu';

$menu_options = [
	'label' => __('Select Menu', 'blocksy'),
	'type' => 'ct-select',
	'value' => blocksy_get_default_menu('main'),
	'view' => 'text',
	'design' => 'inline',
	'setting' => [ 'transport' => 'postMessage' ],
	'placeholder' => __('Select menu...', 'blocksy'),
	'choices' => blocksy_ordered_keys(blocksy_get_menus_items()),
	'desc' => sprintf(
		// translators: placeholder here means the actual URL.
		__( 'Manage your menus in the %sMenus screen%s.', 'blocksy' ),
		sprintf(
			'<a href="%s" target="_blank">',
			admin_url('/nav-menus.php')
		),
		'</a>'
	),
];

$options = [
	(
		blocksy_has_i18n_plugin() ? [

			'menu_source' => [
				'label' => __('Menu Source', 'blocksy'),
				'type' => 'ct-radio',
				'value' => 'menu',
				'view' => 'text',
				'design' => 'block',
				'setting' => [ 'transport' => 'postMessage' ],
				'choices' => [
					'menu' => __( 'Select Menu', 'blocksy' ),
					'location' => __( 'Use Location', 'blocksy' ),
				],
			],

			blocksy_rand_md5() => [
				'type' => 'ct-condition',
				'condition' => [ 'menu_source' => 'menu' ],
				'options' => [
					'menu' => $menu_options
				],
			],

			blocksy_rand_md5() => [
				'type' => 'ct-condition',
				'condition' => [ 'menu_source' => 'location' ],
				'options' => [

					blocksy_rand_md5() => [
						'type' => 'ct-title',
						'variation' => 'menu-location',
						'label' => sprintf(
							// translators: placeholders is menu location
							__( 'Location Name: %s', 'blocksy' ),
							$location
						),
						'desc' => sprintf(
							// translators: placeholder here means the actual URL.
							__( 'Chose this option only if you use a multilingual plugin in order to assign different menus to the same location. Go to %sMenus screen%s and assign a menu to this location.', 'blocksy' ),
							sprintf(
								'<a href="%s" target="_blank">',
								admin_url('/nav-menus.php')
							),
							'</a>'
						),
					],

				],
			],

		] : [
			'menu' => $menu_options
		]
	),

	blocksy_rand_md5() => [
		'title' => __( 'General', 'blocksy' ),
		'type' => 'tab',
		'options' => [

			'mobile_menu_type' => [
				'label' => __('Menu Type', 'blocksy'),
				'type' => 'ct-radio',
				'value' => 'type-1',
				'view' => 'text',
				'design' => 'block',
				'setting' => [ 'transport' => 'postMessage' ],
				'choices' => [
					'type-1' => __( 'Default', 'blocksy' ),
					'type-2' => __( 'Bordered', 'blocksy' ),
				],
			],

		],
	],

	blocksy_rand_md5() => [
		'title' => __( 'Design', 'blocksy' ),
		'type' => 'tab',
		'options' => [

			'mobileMenuFont' => [
				'type' => 'ct-typography',
				'label' => __( 'Font', 'blocksy' ),
				'value' => blocksy_typography_default_values([
					'size' => [
						'desktop' => '30px',
						'tablet'  => '30px',
						'mobile'  => '20px'
					],
					'variation' => 'n7',
				]),
				'typography_responsive' => [
					'desktop' => false,
					'tablet' => true,
					'mobile' => true,
				],
				'setting' => [ 'transport' => 'postMessage' ],
			],

			'mobileMenuColor' => [
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

			'mobile_menu_child_size' => [
				'label' => __( 'Dropdown Font Size', 'blocksy' ),
				'type' => 'ct-slider',
				'value' => '20px',
				'divider' => 'top',
				'units' => [
					[ 'unit' => 'px', 'min' => 0, 'max' => 100 ],
					[ 'unit' => 'pt', 'min' => 0, 'max' => 500 ],
					[ 'unit' => 'em', 'min' => 0, 'max' => 100 ],
					[ 'unit' => 'rem', 'min' => 0, 'max' => 100 ],
					[ 'unit' => 'vw', 'min' => 0, 'max' => 50 ],
				],
				'setting' => [ 'transport' => 'postMessage' ],
			],

			blocksy_rand_md5() => [
				'type' => 'ct-condition',
				'condition' => [ 'mobile_menu_type' => 'type-2' ],
				'options' => [

					'mobile_menu_divider' => [
						'label' => __( 'Items Divider', 'blocksy' ),
						'type' => 'ct-border',
						'design' => 'inline',
						'divider' => 'top',
						'setting' => [ 'transport' => 'postMessage' ],
						'value' => [
							'width' => 1,
							'style' => 'solid',
							'color' => [
								'color' => 'rgba(255, 255, 255, 0.2)',
							],
						]
					],

				],
			],

			blocksy_rand_md5() => [
				'type' => 'ct-divider',
			],

			'mobileMenuMargin' => [
				'label' => __( 'Margin', 'blocksy' ),
				'type' => 'ct-spacing',
				'setting' => [ 'transport' => 'postMessage' ],
				'value' => blocksy_spacing_value([
					'left' => 'auto',
					'right' => 'auto',
					'linked' => true,
				]),
				'responsive' => true
			],

		],
	],
];
