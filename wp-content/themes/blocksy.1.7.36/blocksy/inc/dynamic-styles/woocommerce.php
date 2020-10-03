<?php

if (! function_exists('is_woocommerce')) {
	return;
}

blocksy_output_responsive([
	'css' => $css,
	'tablet_css' => $tablet_css,
	'mobile_css' => $mobile_css,
	'selector' => '[data-products]',
	'variableName' => 'cardsGap',
	'value' => get_theme_mod('shopCardsGap', [
		'mobile' => 30,
		'tablet' => 30,
		'desktop' => 30,
	])
]);

$shopColumns = get_theme_mod('blocksy_woo_columns', [
	'mobile' => 1,
	'tablet' => 3,
	'desktop' => 4,
]);

$shopColumns['desktop'] = get_option('woocommerce_catalog_columns', 4);

$shopColumns['desktop'] = 'CT_CSS_SKIP_RULE';
$shopColumns['tablet'] = 'repeat(' . $shopColumns['tablet'] . ', 1fr)';
$shopColumns['mobile'] = 'repeat(' . $shopColumns['mobile'] . ', 1fr)';

blocksy_output_responsive([
	'css' => $css,
	'tablet_css' => $tablet_css,
	'mobile_css' => $mobile_css,
	'selector' => '[data-products]',
	'variableName' => 'shopColumns',
	'value' => $shopColumns,
	'unit' => ''
]);

blocksy_output_colors([
	'value' => get_theme_mod('cardProductTitleColor'),
	'default' => [
		'default' => [ 'color' => Blocksy_Css_Injector::get_skip_rule_keyword('DEFAULT') ],
		'hover' => [ 'color' => Blocksy_Css_Injector::get_skip_rule_keyword('DEFAULT') ],
	],
	'css' => $css,
	'variables' => [
		'default' => [
			'selector' => '[data-products] .woocommerce-loop-product__title, [data-products] .woocommerce-loop-category__title',
			'variable' => 'headingColor'
		],

		'hover' => [
			'selector' => '[data-products] .woocommerce-loop-product__title, [data-products] .woocommerce-loop-category__title',
			'variable' => 'linkHoverColor'
		],
	],
]);

blocksy_output_colors([
	'value' => get_theme_mod('cardProductPriceColor'),
	'default' => [
		'default' => ['color' => Blocksy_Css_Injector::get_skip_rule_keyword('DEFAULT') ]
	],
	'css' => $css,
	'variables' => [
		'default' => [
			'selector' => '[data-products] .price',
			'variable' => 'color'
		],
	],
]);

blocksy_output_colors([
	'value' => get_theme_mod('starRatingColor'),
	'default' => [
		'default' => [ 'color' => '#FDA256' ],
		'inactive' => [ 'color' => '#F9DFCC' ],
	],
	'css' => $css,
	'variables' => [
		'default' => [
			'selector' => ':root',
			'variable' => 'starRatingInitialColor'
		],

		'inactive' => [
			'selector' => ':root',
			'variable' => 'starRatingInactiveColor'
		],
	],
]);

blocksy_output_colors([
	'value' => get_theme_mod('saleBadgeColor'),
	'default' => [
		'text' => [ 'color' => '#ffffff' ],
		'background' => [ 'color' => 'var(--paletteColor1)' ],
	],
	'css' => $css,
	'variables' => [
		'text' => [
			'selector' => ':root',
			'variable' => 'saleBadgeTextColor'
		],

		'background' => [
			'selector' => ':root',
			'variable' => 'saleBadgeBackgroundColor'
		],
	],
]);

blocksy_output_colors([
	'value' => get_theme_mod('cardProductCategoriesColor'),
	'default' => [
		'default' => [ 'color' => 'var(--color)' ],
		'hover' => [ 'color' => Blocksy_Css_Injector::get_skip_rule_keyword('DEFAULT') ],
	],
	'css' => $css,
	'variables' => [
		'default' => [
			'selector' => '[data-products] .entry-meta a',
			'variable' => 'linkInitialColor'
		],

		'hover' => [
			'selector' => '[data-products] .entry-meta a',
			'variable' => 'linkHoverColor'
		],
	],
]);

if (get_theme_mod('shop_cards_type', 'type-1') === 'type-1') {
	blocksy_output_colors([
		'value' => get_theme_mod('cardProductButton1Text'),
		'default' => [
			'default' => ['color' => Blocksy_Css_Injector::get_skip_rule_keyword('DEFAULT')],
			'hover' => ['color' => Blocksy_Css_Injector::get_skip_rule_keyword('DEFAULT')],
		],
		'css' => $css,
		'variables' => [
			'default' => [
				'selector' => '[data-products="type-1"]',
				'variable' => 'buttonTextInitialColor'
			],

			'hover' => [
				'selector' => '[data-products="type-1"]',
				'variable' => 'buttonTextHoverColor'
			],
		],
	]);
}

if (get_theme_mod('shop_cards_type', 'type-1') === 'type-2') {
	blocksy_output_colors([
		'value' => get_theme_mod('cardProductButton2Text'),
		'default' => [
			'default' => ['color' => 'var(--color)'],
			'hover' => ['color' => 'var(--linkHoverColor)'],
		],
		'css' => $css,
		'variables' => [
			'default' => [
				'selector' => '[data-products="type-2"]',
				'variable' => 'buttonTextInitialColor'
			],

			'hover' => [
				'selector' => '[data-products="type-2"]',
				'variable' => 'buttonTextHoverColor'
			],
		],
	]);
}

blocksy_output_colors([
	'value' => get_theme_mod('cardProductButtonBackground'),
	'default' => [
		'default' => ['color' => Blocksy_Css_Injector::get_skip_rule_keyword('DEFAULT')],
		'hover' => ['color' => Blocksy_Css_Injector::get_skip_rule_keyword('DEFAULT')],
	],
	'css' => $css,
	'variables' => [
		'default' => [
			'selector' => '[data-products]',
			'variable' => 'buttonInitialColor'
		],

		'hover' => [
			'selector' => '[data-products]',
			'variable' => 'buttonHoverColor'
		],
	],
]);

blocksy_output_colors([
	'value' => get_theme_mod('cardProductBackground'),
	'default' => [
		'default' => [ 'color' => '#ffffff' ],
	],
	'css' => $css,
	'variables' => [
		'default' => [
			'selector' => '[data-products="type-2"]',
			'variable' => 'backgroundColor'
		],
	],
]);

// Border radius
blocksy_output_spacing([
	'css' => $css,
	'tablet_css' => $tablet_css,
	'mobile_css' => $mobile_css,
	'selector' => '[data-products] .product',
	'property' => 'borderRadius',
	'value' => get_theme_mod( 'cardProductRadius',
		blocksy_spacing_value([
			'linked' => true,
			'top' => '3px',
			'left' => '3px',
			'right' => '3px',
			'bottom' => '3px',

		])
	)
]);

// Box shadow
blocksy_output_box_shadow([
	'css' => $css,
	'tablet_css' => $tablet_css,
	'mobile_css' => $mobile_css,
	'selector' => '[data-products="type-2"]',
	'value' => get_theme_mod('cardProductShadow', blocksy_box_shadow_value([
		'enable' => true,
		'h_offset' => 0,
		'v_offset' => 12,
		'blur' => 18,
		'spread' => -6,
		'inset' => false,
		'color' => [
			'color' => 'rgba(34, 56, 101, 0.03)',
		],
	])),
	'responsive' => true
]);

// woo single product
$productGalleryWidth = get_theme_mod( 'productGalleryWidth', 50 );
$css->put(
	'.product-entry-wrapper',
	'--productGalleryWidth: ' . $productGalleryWidth . '%'
);

blocksy_output_colors([
	'value' => get_theme_mod('singleProductTitleColor'),
	'default' => [
		'default' => [ 'color' => Blocksy_Css_Injector::get_skip_rule_keyword('DEFAULT') ],
	],
	'css' => $css,
	'variables' => [
		'default' => [
			'selector' => '.entry-summary .product_title',
			'variable' => 'headingColor'
		],
	],
]);

blocksy_output_colors([
	'value' => get_theme_mod('singleProductPriceColor'),
	'default' => [
		'default' => [ 'color' => Blocksy_Css_Injector::get_skip_rule_keyword('DEFAULT') ],
	],
	'css' => $css,
	'variables' => [
		'default' => [
			'selector' => '.entry-summary .price',
			'variable' => 'color'
		],
	],
]);

blocksy_output_font_css([
	'font_value' => get_theme_mod(
		'cardProductTitleFont',
		blocksy_typography_default_values([
			'size' => '17px',
			'variation' => 'n6',
		])
	),
	'css' => $css,
	'tablet_css' => $tablet_css,
	'mobile_css' => $mobile_css,
	'selector' => '[data-products] .woocommerce-loop-product__title, [data-products] .woocommerce-loop-category__title'
]);

blocksy_output_responsive_switch([
	'css' => $css,
	'tablet_css' => $tablet_css,
	'mobile_css' => $mobile_css,
	'selector' => '.single-product .up-sells',
	'value' => get_theme_mod('upsell_products_visibility', [
		'desktop' => true,
		'tablet' => false,
		'mobile' => false,
	])
]);

blocksy_output_responsive_switch([
	'css' => $css,
	'tablet_css' => $tablet_css,
	'mobile_css' => $mobile_css,
	'selector' => '.single-product .related',
	'value' => get_theme_mod('related_products_visibility', [
		'desktop' => true,
		'tablet' => false,
		'mobile' => false,
	])
]);

// Store notice
blocksy_output_colors([
	'value' => get_theme_mod('wooNoticeContent'),
	'default' => [
		'default' => ['color' => '#ffffff']
	],
	'css' => $css,
	'variables' => [
		'default' => [
			'selector' => '.demo_store',
			'variable' => 'color'
		],
	],
]);

blocksy_output_colors([
	'value' => get_theme_mod('wooNoticeBackground'),
	'default' => [
		'default' => ['color' => 'var(--paletteColor1)']
	],
	'css' => $css,
	'variables' => [
		'default' => [
			'selector' => '.demo_store',
			'variable' => 'backgroundColor'
		],
	],
]);

// messages
blocksy_output_colors([
	'value' => get_theme_mod('infoMessageColor'),
	'default' => [
		'text' => ['color' => Blocksy_Css_Injector::get_skip_rule_keyword('DEFAULT')],
		'background' => ['color' => '#F0F1F3'],
	],
	'css' => $css,
	'variables' => [
		'text' => [
			'selector' => '.woocommerce-info, .woocommerce-message',
			'variable' => 'color'
		],

		'background' => [
			'selector' => '.woocommerce-info, .woocommerce-message',
			'variable' => 'backgroundColor'
		],
	],
]);

blocksy_output_colors([
	'value' => get_theme_mod('errorMessageColor'),
	'default' => [
		'text' => ['color' => '#ffffff'],
		'background' => ['color' => 'rgba(218, 0, 28, 0.7)'],
	],
	'css' => $css,
	'variables' => [
		'text' => [
			'selector' => '.woocommerce-error',
			'variable' => 'color'
		],

		'background' => [
			'selector' => '.woocommerce-error',
			'variable' => 'backgroundColor'
		],
	],
]);

