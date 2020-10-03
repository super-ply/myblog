<?php

if (! isset($location)) {
	$location = 'menu_1';
}

if (empty($class)) {
	$class = 'header-menu-1';
}

$responsive_output = 'data-responsive';

$stretch_output = '';

if (blocksy_default_akg('stretch_menu', $atts, 'no') === 'yes') {
	$stretch_output = 'data-stretch';
}

$menu_type = blocksy_default_akg('header_menu_type', $atts, 'type-1');
$dropdown_animation = blocksy_default_akg('dropdown_animation', $atts, 'type-1');
$dropdown_items_type = blocksy_default_akg('dropdown_items_type', $atts, 'simple');

$dropdown_output = 'data-dropdown="' . $dropdown_animation . ':' . $dropdown_items_type . '"';

$menu_args = [
	'container'      => false,
	'menu_class'     => 'menu',
	'fallback_cb'    => 'blocksy_main_menu_fallback',
];

if (
	blocksy_default_akg('menu_source', $atts, 'menu') === 'menu'
	||
	!blocksy_has_i18n_plugin()
) {
	$menu_args['menu'] = blocksy_default_akg(
		'menu',
		$atts,
		blocksy_get_default_menu('main')
	);
}

if (blocksy_default_akg('menu_source', $atts, 'menu') === 'location') {
	if (blocksy_has_i18n_plugin()) {
		$menu_args['theme_location'] = $location;
	}
}

?>

<nav
	id="<?php echo esc_attr($class) ?>"
	class="<?php echo esc_attr($class) ?>"
	<?php echo blocksy_attr_to_html($attr) ?>
	data-type="<?php echo esc_attr($menu_type) ?>"
	<?php echo $dropdown_output ?>
	<?php echo $stretch_output ?>
	<?php echo wp_kses_post($responsive_output) ?>
	<?php echo blocksy_schema_org_definitions('navigation') ?>>

	<?php
		add_filter(
			'nav_menu_item_title',
			'blocksy_handle_nav_menu_item_title',
			10, 4
		);

		wp_nav_menu($menu_args);

		remove_filter(
			'nav_menu_item_title',
			'blocksy_handle_nav_menu_item_title',
			10, 4
		);
	?>

</nav>

<?php
