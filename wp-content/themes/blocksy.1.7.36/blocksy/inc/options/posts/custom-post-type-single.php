<?php

if (! isset($is_general_cpt)) {
	$is_general_cpt = false;
}

if (! isset($is_bbpress)) {
	$is_bbpress = false;
}

$options = [
	$post_type->name . '_single_section_options' => [
		'type' => 'ct-options',
		'inner-options' => array_merge([
			array_merge([
				blocksy_get_options('general/page-title', [
					'prefix' => $post_type->name . '_single',
					'is_single' => true,
					'is_bbpress' => $is_bbpress,
					'is_cpt' => true,
					'enabled_label' => sprintf(
						__('%s Title', 'blocksy'),
						$post_type->labels->singular_name
					),
				]),

				blocksy_rand_md5() => [
					'type' => 'ct-title',
					'label' => sprintf(
						__('%s Structure', 'blocksy'),
						$post_type->labels->singular_name
					),
				],

				blocksy_rand_md5() => [
					'title' => __( 'General', 'blocksy' ),
					'type' => 'tab',
					'options' => array_merge([
						blocksy_get_options('single-elements/structure', [
							'prefix' => $post_type->name . '_single',
							'default_structure' => 'type-4',
							'default_content_style' => $is_bbpress ? 'boxed' : 'wide'
						])
					]),
				],

				blocksy_rand_md5() => [
					'title' => __( 'Design', 'blocksy' ),
					'type' => 'tab',
					'options' => [
						blocksy_get_options('single-elements/structure-design', [
							'prefix' => $post_type->name . '_single',
						])
					],
				],

			], $is_general_cpt ? [
				blocksy_rand_md5() => [
					'type' => 'ct-title',
					'label' => sprintf(
						__('%s Elements', 'blocksy'),
						$post_type->labels->singular_name
					),
				],
			] : []),
		], $is_general_cpt ? [
			blocksy_get_options('single-elements/featured-image', [
				'prefix' => $post_type->name . '_single',
			]),

			blocksy_get_options('single-elements/post-share-box', [
				'prefix' => $post_type->name . '_single',
				'has_share_box' => 'no',
			]),

			blocksy_get_options('single-elements/author-box', [
				'prefix' => $post_type->name . '_single',
			]),

			blocksy_get_options('single-elements/post-nav', [
				'prefix' => $post_type->name . '_single',
				'enabled' => 'no'
			]),

			[
				blocksy_rand_md5() => [
					'type' => 'ct-title',
					'label' => __( 'Page Elements', 'blocksy' ),
				],
			],

			blocksy_get_options('single-elements/related-posts', [
				'prefix' => $post_type->name . '_single',
			]),

			blocksy_get_options('general/comments-single', [
				'prefix' => $post_type->name . '_single',
			]),
		] : [])
	],
];
