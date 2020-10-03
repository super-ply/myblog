<?php

$should_output = false;

if (blocksy_sidebar_position() === 'none') {
	if (is_single() || blocksy_is_page()) {
		$should_output = true;
		$content_editor = blocksy_get_entry_content_editor();

		if (strpos($content_editor, 'default') !== false) {
			$should_output = false;
		}
	}
}

if (function_exists('is_woocommerce')) {
	if (is_product()) {
		$should_output = false;
	}
}

if ($should_output) {
	$css->put(
		'.content-area',
		'overflow: hidden'
	);
}

