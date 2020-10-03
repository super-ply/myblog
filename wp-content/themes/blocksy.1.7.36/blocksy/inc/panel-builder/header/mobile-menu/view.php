<?php

$attr['data-type'] = blocksy_default_akg('mobile_menu_type', $atts, 'type-1');

ob_start();

$menu_args = [
	'container' => false,
	'menu_class' => false,
	'fallback_cb' => 'blocksy_main_menu_fallback',
];

if (blocksy_default_akg('menu_source', $atts, 'menu') === 'location') {
	if (blocksy_has_i18n_plugin()) {
		$menu_args['theme_location'] = 'menu_mobile';
	}
}

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

$menu_output = ob_get_clean();

$class = 'mobile-menu';

if ( strpos( $menu_output, 'sub-menu' ) ) {
	$class .= ' has-submenu';
}

?>

<nav class="<?php echo $class ?>" <?php echo blocksy_attr_to_html($attr) ?>>
	<?php echo $menu_output ?>
</nav>
