<?php

$custom_post_types = blocksy_manager()->post_types->get_supported_post_types();

$options = [];

if (function_exists('is_bbpress')) {
	$options[blocksy_rand_md5()] = [
		'type' => 'ct-group-title',
		'kind' => 'divider',
		'priority' => 3,
	];

	$options['post_type_single_bbpress'] = [
		'title' => __('bbPress', 'blocksy'),
		'container' => ['priority' => 3],
		'options' => blocksy_get_options('posts/custom-post-type-single', [
			'post_type' => (object) [
				'name' => 'bbpress',
				'labels' => (object) [
					'singular_name' => __('bbPress', 'blocksy')
				]
			],

			'is_bbpress' => true
		]),
	];
}

if (function_exists('is_buddypress')) {
	$options[blocksy_rand_md5()] = [
		'type' => 'ct-group-title',
		'kind' => 'divider',
		'priority' => 3,
	];

	$options['post_type_single_buddypress'] = [
		'title' => __('BuddyPress', 'blocksy'),
		'container' => ['priority' => 3],
		'options' => blocksy_get_options('posts/custom-post-type-single', [
			'post_type' => (object) [
				'name' => 'buddypress',
				'labels' => (object) [
					'singular_name' => __('BuddyPress', 'blocksy')
				]
			],

			'is_bbpress' => true
		]),
	];
}

foreach ($custom_post_types as $post_type) {
	$post_type_object = get_post_type_object($post_type);

	if (! $post_type_object) {
		continue;
	}

	$options[blocksy_rand_md5()] = [
		'type' => 'ct-group-title',
		'kind' => 'divider',
		'priority' => 3,
	];

	$options['post_type_archive_' . $post_type] = apply_filters(
		'blocksy:custom_post_types:archive-options',
		[
			'title' => $post_type_object->labels->name,
			'container' => ['priority' => 3],
			'options' => blocksy_get_options('posts/custom-post-type-archive', [
				'post_type' => $post_type_object
			]),
		],

		$post_type,
		$post_type_object
	);

	$options['post_type_single_' . $post_type] = apply_filters(
		'blocksy:custom_post_types:single-options',
		[
			'title' => sprintf(
				__('Single %s', 'blocksy'),
				$post_type_object->labels->name
			),
			'container' => ['priority' => 3, 'type' => 'child'],
			'options' => blocksy_get_options('posts/custom-post-type-single', [
				'post_type' => $post_type_object,
				'is_general_cpt' => true
			]),
		],
		$post_type,
		$post_type_object
	);
}


