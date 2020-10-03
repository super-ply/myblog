<?php

if (! function_exists('blocksy_assemble_selector')) {
	return;
}

// Items spacing
blocksy_output_responsive([
	'css' => $css,
	'tablet_css' => $tablet_css,
	'mobile_css' => $mobile_css,
	'selector' => blocksy_assemble_selector($root_selector),
	'variableName' => 'menuItemsSpacing',
	'value' => blocksy_akg('footerMenuItemsSpacing', $atts, [
		'mobile' => 20,
		'tablet' => 25,
		'desktop' => 25,
	])
]);

// Alignment
blocksy_output_responsive([
	'css' => $css,
	'tablet_css' => $tablet_css,
	'mobile_css' => $mobile_css,
	'selector' => blocksy_assemble_selector(blocksy_mutate_selector([
		'selector' => $root_selector,
		'operation' => 'replace-last',
		'to_add' => '[data-column="menu"]'
	])),
	'variableName' => 'alignment',
	'unit' => '',
	'value' => blocksy_akg('footerMenuAlignment', $atts, [
		'desktop' => 'flex-start',
		'tablet' => 'flex-start',
		'mobile' => 'center'
	])
]);

blocksy_output_responsive([
	'css' => $css,
	'tablet_css' => $tablet_css,
	'mobile_css' => $mobile_css,
	'selector' => blocksy_assemble_selector(blocksy_mutate_selector([
		'selector' => $root_selector,
		'operation' => 'replace-last',
		'to_add' => '[data-column="menu"]'
	])),
	'variableName' => 'vertical-alignment',
	'unit' => '',
	'value' => blocksy_akg('footerMenuVerticalAlignment', $atts, [
		'desktop' => 'flex-start',
		'tablet' => 'flex-start',
		'mobile' => 'flex-start'
	])
]);

// Top level font
blocksy_output_font_css([
	'font_value' => blocksy_akg( 'footerMenuFont', $atts,
		blocksy_typography_default_values([
			'size' => '12px',
			'variation' => 'n7',
			'line-height' => '1.3',
			'text-transform' => 'uppercase',
		])
	),
	'css' => $css,
	'tablet_css' => $tablet_css,
	'mobile_css' => $mobile_css,
	'selector' => blocksy_assemble_selector(blocksy_mutate_selector([
		'selector' => $root_selector,
		'operation' => 'suffix',
		'to_add' => 'ul'
	])),
]);


// Font color
blocksy_output_colors([
	'value' => blocksy_akg('footerMenuFontColor', $atts),
	'default' => [
		'default' => [ 'color' => 'var(--color)' ],
		'hover' => [ 'color' => Blocksy_Css_Injector::get_skip_rule_keyword('DEFAULT') ],
	],
	'css' => $css,
	'variables' => [
		'default' => [
			'selector' => blocksy_assemble_selector(blocksy_mutate_selector([
				'selector' => $root_selector,
				'operation' => 'suffix',
				'to_add' => '> ul > li > a'
			])),
			'variable' => 'linkInitialColor'
		],

		'hover' => [
			'selector' => blocksy_assemble_selector(blocksy_mutate_selector([
				'selector' => $root_selector,
				'operation' => 'suffix',
				'to_add' => '> ul > li > a'
			])),
			'variable' => 'linkHoverColor'
		],
	],
]);

// Top level margin
blocksy_output_spacing([
	'css' => $css,
	'tablet_css' => $tablet_css,
	'mobile_css' => $mobile_css,
	'selector' => blocksy_assemble_selector($root_selector),
	'important' => true,
	'value' => blocksy_default_akg(
		'footerMenuMargin', $atts,
		blocksy_spacing_value([
			'linked' => true,
		])
	)
]);
