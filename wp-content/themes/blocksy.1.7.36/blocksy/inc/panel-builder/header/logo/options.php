<?php

$options = [
	blocksy_rand_md5() => [
		'title' => __( 'General', 'blocksy' ),
		'type' => 'tab',
		'options' => [

			'custom_logo' => [
				'label' => __( 'Logo', 'blocksy' ),
				'type' => 'ct-image-uploader',
				'value' => '',
				'inline_value' => true,
				'responsive' => [
					'tablet' => 'skip'
				],
				'attr' => [ 'data-type' => 'small' ],
			],

			blocksy_rand_md5() => [
				'type' => 'ct-condition',
				'condition' => [
					'builderSettings/has_transparent_header' => 'yes',
				],
				'options' => [
					'transparent_logo' => [
						'label' => __( 'Transparent State Logo', 'blocksy' ),
						'type' => 'ct-image-uploader',
						'value' => '',
						'inline_value' => true,
						'responsive' => [
							'tablet' => 'skip'
						],
						'divider' => 'top',
						'attr' => [ 'data-type' => 'small' ],
					],
				],
			],

			blocksy_rand_md5() => [
				'type' => 'ct-condition',
				'condition' => [
					'builderSettings/has_sticky_header' => 'yes',
				],
				'options' => [
					'sticky_logo' => [
						'label' => __( 'Sticky State Logo', 'blocksy' ),
						'type' => 'ct-image-uploader',
						'value' => '',
						'inline_value' => true,
						'responsive' => [
							'tablet' => 'skip'
						],
						'divider' => 'top',
						'attr' => [ 'data-type' => 'small' ],
					],
				],
			],

			blocksy_rand_md5() => [
				'type' => 'ct-divider',
			],

			'logoMaxHeight' => [
				'label' => __( 'Logo Height', 'blocksy' ),
				'type' => 'ct-slider',
				'min' => 0,
				'max' => 300,
				'value' => 50,
				'responsive' => true,
			],

			blocksy_rand_md5() => [
				'type' => 'ct-divider',
			],

			'has_site_title' => [
				'label' => __( 'Site Title', 'blocksy' ),
				'type' => 'ct-switch',
				'value' => 'yes',
				'setting' => [ 'transport' => 'postMessage' ],
			],

			blocksy_rand_md5() => [
				'type' => 'ct-condition',
				'condition' => [ 'has_site_title' => 'yes' ],
				'options' => [

					'blogname' => [
						'label' => false,
						'type' => 'text',
						'design' => 'block',
						'disableRevertButton' => true,
						'value' => get_option('blogname'),
						'disableRevertButton' => true,
					],

					'blogname_visibility' => [
						'label' => __( 'Site Title Visibility', 'blocksy' ),
						'type' => 'ct-visibility',
						'design' => 'block',
						'allow_empty' => true,
						'sync' => 'live',
						// 'view' => 'modal',

						'value' => [
							'desktop' => true,
							'tablet' => true,
							'mobile' => true,
						],

						'choices' => blocksy_ordered_keys([
							'desktop' => __( 'Desktop', 'blocksy' ),
							'tablet' => __( 'Tablet', 'blocksy' ),
							'mobile' => __( 'Mobile', 'blocksy' ),
						]),
					],

				],
			],

			blocksy_rand_md5() => [
				'type' => 'ct-divider',
			],

			'has_tagline' => [
				'label' => __( 'Site Tagline', 'blocksy' ),
				'type' => 'ct-switch',
				'value' => 'no',
				'setting' => [ 'transport' => 'postMessage' ],
			],

			blocksy_rand_md5() => [
				'type' => 'ct-condition',
				'condition' => [ 'has_tagline' => 'yes' ],
				'options' => [

					'blogdescription' => [
						'label' => false,
						'type' => 'text',
						'design' => 'block',
						'disableRevertButton' => true,
						'value' => get_option( 'blogdescription' ),
					],

					'blogdescription_visibility' => [
						'label' => __( 'Site Tagline Visibility', 'blocksy' ),
						'type' => 'ct-visibility',
						'design' => 'block',
						'allow_empty' => true,
						'sync' => 'live',

						'value' => [
							'desktop' => true,
							'tablet' => true,
							'mobile' => true,
						],

						'choices' => blocksy_ordered_keys([
							'desktop' => __( 'Desktop', 'blocksy' ),
							'tablet' => __( 'Tablet', 'blocksy' ),
							'mobile' => __( 'Mobile', 'blocksy' ),
						]),
					],

				],
			],

			blocksy_rand_md5() => [
				'type' => 'ct-condition',
				'condition' => [ 'custom_logo:visibility' => 'yes' ],
				'options' => [

					blocksy_rand_md5() => [
						'type' => 'ct-condition',
						'condition' => [
							'any' => [
								'has_site_title' => 'yes',
								'has_tagline' => 'yes',

							]
						],
						'options' => [

							blocksy_rand_md5() => [
								'type' => 'ct-divider',
							],

							'logo_position' => [
								'label' => __( 'Logo Image Position', 'blocksy' ),
								'type' => 'ct-radio',
								'value' => 'left',
								'view' => 'text',
								'design' => 'block',
								'choices' => [
									'left' => __( 'Left', 'blocksy' ),
									'right' => __( 'Right', 'blocksy' ),
									'top' => __( 'Top', 'blocksy' ),
								],
							],

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

			blocksy_rand_md5() => [
				'type' => 'ct-condition',
				'condition' => [ 'has_site_title' => 'yes' ],
				'options' => [

					'siteTitle' => [
						'type' => 'ct-typography',
						'label' => __( 'Site Title', 'blocksy' ),
						'value' => blocksy_typography_default_values([
							'size' => '25px',
							'variation' => 'n7',
							// 'line-height' => '1.5'
						]),
						'setting' => [ 'transport' => 'postMessage' ],
					],

					blocksy_rand_md5() => [
						'type' => 'ct-labeled-group',
						'label' => __( 'Site Title Color', 'blocksy' ),
						'responsive' => true,
						'choices' => [
							[
								'id' => 'siteTitleColor',
								'label' => __('Default State', 'blocksy')
							],

							[
								'id' => 'transparentSiteTitleColor',
								'label' => __('Transparent State', 'blocksy'),
								'condition' => [
									'builderSettings/has_transparent_header' => 'yes',
								],
							],

							[
								'id' => 'stickySiteTitleColor',
								'label' => __('Sticky State', 'blocksy'),
								'condition' => [
									'builderSettings/has_sticky_header' => 'yes',
								],
							],
						],
						'options' => [

							'siteTitleColor' => [
								'label' => __( 'Site Title Color', 'blocksy' ),
								'type'  => 'ct-color-picker',
								'design' => 'block:right',
								'responsive' => true,
								'setting' => [ 'transport' => 'postMessage' ],

								'value' => [
									'default' => [
										'color' => 'var(--paletteColor4)',
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

							'transparentSiteTitleColor' => [
								'label' => __( 'Site Title Color', 'blocksy' ),
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

							'stickySiteTitleColor' => [
								'label' => __( 'Site Title Color', 'blocksy' ),
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

				],
			],

			blocksy_rand_md5() => [
				'type' => 'ct-condition',
				'condition' => [ 'has_tagline' => 'yes' ],
				'options' => [

					blocksy_rand_md5() => [
						'type' => 'ct-divider',
					],

					'siteTagline' => [
						'type' => 'ct-typography',
						'label' => __( 'Site Tagline Font', 'blocksy' ),
						'value' => blocksy_typography_default_values([
							'size' => '13px',
							'variation' => 'n5',
						]),
						'setting' => [ 'transport' => 'postMessage' ],
					],

					blocksy_rand_md5() => [
						'type' => 'ct-labeled-group',
						'label' => __( 'Site Tagline Color', 'blocksy' ),
						'responsive' => true,
						'choices' => [
							[
								'id' => 'siteTaglineColor',
								'label' => __('Default State', 'blocksy')
							],

							[
								'id' => 'transparentSiteTaglineColor',
								'label' => __('Transparent State', 'blocksy'),
								'condition' => [
									'builderSettings/has_transparent_header' => 'yes',
								],
							],

							[
								'id' => 'stickySiteTaglineColor',
								'label' => __('Sticky State', 'blocksy'),
								'condition' => [
									'builderSettings/has_sticky_header' => 'yes',
								],
							],
						],
						'options' => [

							'siteTaglineColor' => [
								'label' => __( 'Site Tagline Color', 'blocksy' ),
								'type'  => 'ct-color-picker',
								'design' => 'block:right',
								'responsive' => true,
								'setting' => [ 'transport' => 'postMessage' ],

								'value' => [
									'default' => [
										'color' => Blocksy_Css_Injector::get_skip_rule_keyword('DEFAULT'),
									],
								],

								'pickers' => [
									[
										'title' => __( 'Initial', 'blocksy' ),
										'id' => 'default',
										'inherit' => 'var(--color)'
									],
								],
							],

							'transparentSiteTaglineColor' => [
								'label' => __( 'Site Tagline Color', 'blocksy' ),
								'type'  => 'ct-color-picker',
								'design' => 'block:right',
								'responsive' => true,
								'setting' => [ 'transport' => 'postMessage' ],

								'value' => [
									'default' => [
										'color' => Blocksy_Css_Injector::get_skip_rule_keyword('DEFAULT'),
									],
								],

								'pickers' => [
									[
										'title' => __( 'Initial', 'blocksy' ),
										'id' => 'default',
									],
								],
							],

							'stickySiteTaglineColor' => [
								'label' => __( 'Site Tagline Color', 'blocksy' ),
								'type'  => 'ct-color-picker',
								'design' => 'block:right',
								'responsive' => true,
								'setting' => [ 'transport' => 'postMessage' ],

								'value' => [
									'default' => [
										'color' => Blocksy_Css_Injector::get_skip_rule_keyword('DEFAULT'),
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
				'type' => 'ct-divider',
			],

			'headerLogoMargin' => [
				'label' => __( 'Margin', 'blocksy' ),
				'type' => 'ct-spacing',
				'setting' => [ 'transport' => 'postMessage' ],
				'value' => blocksy_spacing_value([
					'linked' => true,
				]),
				'responsive' => true
			],

		],
	],
];
