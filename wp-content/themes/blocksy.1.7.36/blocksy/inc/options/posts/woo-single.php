<?php

$options = [
	'woo_single_section_options' => [
		'type' => 'ct-options',
		'setting' => [ 'transport' => 'postMessage' ],
		'inner-options' => [

			[
				blocksy_rand_md5() => [
					'type'  => 'ct-title',
					'label' => __( 'Page Structure', 'blocksy' ),
				],

				blocksy_rand_md5() => [
					'title' => __( 'General', 'blocksy' ),
					'type' => 'tab',
					'options' => [

						blocksy_get_options('single-elements/structure', [
							'prefix' => 'product',
							'default_structure' => 'type-4',
							'has_v_spacing' => false
						]),

						blocksy_rand_md5() => [
							'type'  => 'ct-title',
							'label' => __( 'Product Image/Gallery', 'blocksy' ),
						],

						'gallery_style' => [
							'label' => false,
							'type' => 'ct-image-picker',
							'value' => 'horizontal',
							'setting' => [ 'transport' => 'postMessage' ],
							'choices' => [

								'horizontal' => [
									'src'   => blocksy_image_picker_url( 'woo-gallery-type-1.svg' ),
									'title' => __( 'Horizontal', 'blocksy' ),
								],

								'vertical' => [
									'src'   => blocksy_image_picker_url( 'woo-gallery-type-2.svg' ),
									'title' => __( 'Vertical', 'blocksy' ),
								],

							],
						],

						'productGalleryWidth' => [
							'label' => __( 'Gallery Width', 'blocksy' ),
							'type' => 'ct-slider',
							'defaultUnit' => '%',
							'value' => 48,
							'min' => 20,
							'max' => 70,
							'setting' => [ 'transport' => 'postMessage' ],
						],

						'product_gallery_ratio' => [
							'label' => __( 'Image', 'blocksy' ),
							'type' => 'ct-ratio',
							'value' => '3/4',
							'design' => 'inline',
							'attr' => [ 'data-type' => 'compact' ],
							'setting' => [ 'transport' => 'postMessage' ],
							'preview_width_key' => 'woocommerce_single_image_width',
							'inner-options' => [

								'woocommerce_single_image_width' => [
									'type' => 'text',
									'label' => __('Image Width', 'blocksy'),
									'desc' => __('Image height will be automatically calculated based on the image ratio.', 'blocksy'),
									'value' => 600,
									'design' => 'inline',
									'setting' => [
										'type' => 'option',
										'capability' => 'manage_woocommerce',
									]
								],

							],
						],

						'has_product_single_lightbox' => [
							'label' => __( 'Image Lightbox', 'blocksy' ),
							'type' => 'ct-switch',
							'value' => 'no',
							'sync' => blocksy_sync_whole_page([
								'prefix' => 'product',
								'loader_selector' => '#primary.content-area .ct-product-view'
							]),
						],

						'has_product_single_zoom' => [
							'label' => __( 'Image Zoom', 'blocksy' ),
							'type' => 'ct-switch',
							'value' => 'yes',
							'sync' => blocksy_sync_whole_page([
								'prefix' => 'product',
								'loader_selector' => '#primary.content-area .ct-product-view'
							]),
						],
					],
				],

				blocksy_rand_md5() => [
					'title' => __( 'Design', 'blocksy' ),
					'type' => 'tab',
					'options' => [

						[
							'singleProductTitleFont' => [
								'type' => 'ct-typography',
								'label' => __( 'Product Title Font', 'blocksy' ),
								'value' => blocksy_typography_default_values([
									'size' => [
										'desktop' => '30px',
										'tablet'  => '30px',
										'mobile'  => '23px'
									],
								]),
								'setting' => [ 'transport' => 'postMessage' ],
							],

							'singleProductTitleColor' => [
								'label' => __( 'Product Title Color', 'blocksy' ),
								'type'  => 'ct-color-picker',
								'design' => 'inline',
								'divider' => 'bottom',
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
										'inherit' => 'var(--headingColor)'
									],
								],
							],

							'singleProductPriceColor' => [
								'label' => __( 'Price Color', 'blocksy' ),
								'type'  => 'ct-color-picker',
								'design' => 'inline',
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

							blocksy_rand_md5() => [
								'type' => 'ct-divider',
							],
						],

						blocksy_get_options('single-elements/structure-design', [
							'prefix' => 'product',
						]),
					],
				],

				blocksy_rand_md5() => [
					'type'  => 'ct-title',
					'label' => __( 'Product Elements', 'blocksy' ),
				],

				'has_product_single_onsale' => [
					'label' => __( 'Sale Badge', 'blocksy' ),
					'type' => 'ct-switch',
					'value' => 'yes',
					'setting' => [ 'transport' => 'postMessage' ],
				],

				'has_product_single_rating' => [
					'label' => __( 'Star Rating', 'blocksy' ),
					'type' => 'ct-switch',
					'value' => 'yes',
					'setting' => [ 'transport' => 'postMessage' ],
				],

				'has_product_single_meta' => [
					'label' => __( 'Product Meta', 'blocksy' ),
					'type' => 'ct-switch',
					'value' => 'yes',
					'setting' => [ 'transport' => 'postMessage' ],
				],

				blocksy_rand_md5() => [
					'type'  => 'ct-title',
					'label' => __( 'Page Elements', 'blocksy' ),
				],

				'has_product_breadcrumbs' => [
					'label' => __( 'Breadcrumbs', 'blocksy' ),
					'type' => 'ct-switch',
					'value' => 'yes',
					'setting' => [ 'transport' => 'postMessage' ],
				],

				blocksy_rand_md5() => [
					'label' => __( 'Related & Upsells', 'blocksy' ),
					'type' => 'ct-panel',
					'inner-options' => [

						'upsell_products_visibility' => [
							'label' => __('Upsell Visibility', 'blocksy'),
							'type' => 'ct-visibility',
							'design' => 'block',
							'setting' => ['transport' => 'postMessage'],
							'allow_empty' => true,

							'value' => [
								'desktop' => true,
								'tablet' => false,
								'mobile' => false,
							],

							'choices' => blocksy_ordered_keys([
								'desktop' => __( 'Desktop', 'blocksy' ),
								'tablet' => __( 'Tablet', 'blocksy' ),
								'mobile' => __( 'Mobile', 'blocksy' ),
							]),
						],

						blocksy_rand_md5() => [
							'type' => 'ct-divider',
						],

						'related_products_visibility' => [
							'label' => __('Related Visibility', 'blocksy'),
							'type' => 'ct-visibility',
							'design' => 'block',
							'setting' => ['transport' => 'postMessage'],
							'allow_empty' => true,

							'value' => [
								'desktop' => true,
								'tablet' => false,
								'mobile' => false,
							],

							'choices' => blocksy_ordered_keys([
								'desktop' => __( 'Desktop', 'blocksy' ),
								'tablet' => __( 'Tablet', 'blocksy' ),
								'mobile' => __( 'Mobile', 'blocksy' ),
							]),
						],

					],
				],
			],

			apply_filters(
				'blocksy_single_product_elements_end_customizer_options',
				[]
			),

			blocksy_rand_md5() => [
				'type'  => 'ct-title',
				'label' => __( 'Functionality Options', 'blocksy' ),
			],

			'has_product_sticky_summary' => [
				'label' => __( 'Sticky Summary', 'blocksy' ),
				'type' => 'ct-switch',
				'value' => 'no',
				'setting' => [ 'transport' => 'postMessage' ],
			],

			'has_ajax_add_to_cart' => [
				'label' => __( 'AJAX add to cart', 'blocksy' ),
				'type' => 'ct-switch',
				'value' => 'no',
			],


		],
	],
];
