<?php

if (! isset($prefix)) {
	$prefix = '';
} else {
	$prefix = $prefix . '_';
}

$options = [
	$prefix . 'has_featured_image' => [
		'label' => __( 'Featured Image', 'blocksy' ),
		'type' => 'ct-panel',
		'switch' => true,
		'value' => 'no',
		'sync' => blocksy_sync_single_post_container([
			'prefix' => $prefix
		]),
		'inner-options' => [
			blocksy_rand_md5() => [
				'type' => 'ct-condition',
				'condition' => [
					$prefix . 'hero_enabled' => 'yes',
					$prefix . 'hero_section' => '!type-2'
				],
				'options' => [
					$prefix . 'featured_image_location' => [
						'label' => __( 'Image Location', 'blocksy' ),
						'type' => 'ct-radio',
						'value' => 'above',
						'view' => 'text',
						'design' => 'block',
						'divider' => 'bottom',
						'choices' => [
							'above' => __( 'Above Title', 'blocksy' ),
							'below' => __( 'Below Title', 'blocksy' ),
						],
						'sync' => blocksy_sync_single_post_container([
							'prefix' => $prefix
						]),
					],
				],
			],

			$prefix . 'featured_image_ratio' => [
				'label' => __( 'Image Ratio', 'blocksy' ),
				'type' => 'ct-ratio',
				'value' => 'original',
				'design' => 'inline',
				'sync' => 'live',
			],

			blocksy_rand_md5() => [
				'type' => 'ct-condition',
				'condition' => [ $prefix . 'content_style' => 'boxed' ],
				'options' => [

					$prefix . 'featured_image_boundless' => [
						'label' => __( 'Boundless Image', 'blocksy' ),
						'type' => 'ct-switch',
						'value' => 'no',
						'divider' => 'top',
						'sync' => 'live',
					],

				],
			],

			blocksy_rand_md5() => [
				'type' => 'ct-condition',
				'condition' => [
					$prefix . 'structure' => 'type-3 | type-4',
					$prefix . 'content_style' => 'wide',
				],
				'options' => [
					$prefix . 'featured_image_width' => [
						'label' => __( 'Image Width', 'blocksy' ),
						'type' => 'ct-radio',
						'value' => 'default',
						'view' => 'text',
						'design' => 'block',
						'divider' => 'top',
						'choices' => [
							'default' => __( 'Default Width', 'blocksy' ),
							'wide' => __( 'Wide Width', 'blocksy' ),
						],
						'sync' => 'live'
					],
				],
			],

			blocksy_rand_md5() => [
				'type' => 'ct-divider',
			],

			$prefix . 'featured_image_visibility' => [
				'label' => __( 'Visibility', 'blocksy' ),
				'type' => 'ct-visibility',
				'design' => 'block',

				'value' => [
					'desktop' => true,
					'tablet' => true,
					'mobile' => false,
				],

				'choices' => blocksy_ordered_keys([
					'desktop' => __( 'Desktop', 'blocksy' ),
					'tablet' => __( 'Tablet', 'blocksy' ),
					'mobile' => __( 'Mobile', 'blocksy' ),
				]),

				'sync' => 'live'
			],

		],
	],

];
