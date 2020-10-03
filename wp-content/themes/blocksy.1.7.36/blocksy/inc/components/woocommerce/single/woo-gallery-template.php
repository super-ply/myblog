<?php

// Note: `wc_get_gallery_image_html` was added in WC 3.3.2 and did not exist prior. This check protects against theme overrides being used on older versions of WC.
if ( ! function_exists( 'wc_get_gallery_image_html' ) ) {
	return;
}

global $product;

$columns           = apply_filters( 'woocommerce_product_thumbnails_columns', 4 );
$post_thumbnail_id = $product->get_image_id();
$wrapper_classes   = apply_filters( 'woocommerce_single_product_image_gallery_classes', array(
	'woocommerce-product-gallery',
	'woocommerce-product-gallery--' . ( $product->get_image_id() ? 'with-images' : 'without-images' ),
	'woocommerce-product-gallery--columns-' . absint( $columns ),
	'images',
) );


$thumb_id = get_post_thumbnail_id();

$gallery_images = $product->get_gallery_image_ids();

if ($thumb_id) {
	array_unshift($gallery_images, intval($thumb_id));
} else {
	$gallery_images = [null];
}

$ratio = '3/4';
$single_ratio = get_theme_mod('product_gallery_ratio', '3/4');

echo '<div class="ct-product-view">';

do_action('blocksy:woocommerce:product-view:start');

global $blocksy_is_quick_view;

if (
	get_theme_mod('has_product_single_lightbox', 'no') === 'yes'
	&&
	get_theme_mod('has_product_single_zoom', 'yes') === 'yes'
	&&
	! isset($blocksy_is_quick_view)
	&&
	! $blocksy_is_quick_view
	&&
	isset($gallery_images[0])
	&&
	$gallery_images[0]
) {
	echo '<div class="ct-lightbox-trigger">
			<svg width="15" height="15" viewBox="0 0 10 10">
				<path d="M9.7,9.7c-0.4,0.4-1,0.4-1.3,0L6.7,8.1C6.1,8.5,5.3,8.8,4.4,8.8C2,8.8,0,6.8,0,4.4S2,0,4.4,0s4.4,2,4.4,4.4c0,0.9-0.3,1.7-0.7,2.4l1.7,1.7C10.1,8.8,10.1,9.4,9.7,9.7zM4.4,1.3c-1.7,0-3.1,1.4-3.1,3.1s1.4,3.1,3.1,3.1c1.7,0,3.1-1.4,3.1-3.1S6.1,1.3,4.4,1.3z"></path>
			</svg>
		</div>
	';
}

$default_ratio = apply_filters('blocksy:woocommerce:default_product_ratio', '3/4');

if (count($gallery_images) === 1) {
	$attachment_id = $gallery_images[0];

	$image_href = wp_get_attachment_image_src(
		$attachment_id,
		'full'
	);

	$width = null;
	$height = null;

	if ($image_href) {
		$width = $image_href[1];
		$height = $image_href[2];

		$image_href = $image_href[0];
	}

	echo blocksy_image([
		'no_image_type' => 'woo',
		'attachment_id' => $gallery_images[0],
		'size' => 'woocommerce_single',
		'ratio' => is_single() ? $single_ratio : $default_ratio,
		'tag_name' => 'a',
		'size' => 'woocommerce_single',
		'html_atts' => array_merge([
			'href' => $image_href
		], $width ? [
			'data-width' => $width,
			'data-height' => $height
		] : []),
	]);
}

if (count($gallery_images) > 1) {
	echo blocksy_flexy([
		'images' => $gallery_images,
		'size' => 'woocommerce_single',
		'pills_images' => is_single() ? $gallery_images : null,
		'images_ratio' => is_single() ? $single_ratio : $default_ratio
	]);
}

do_action('blocksy:woocommerce:product-view:end');

echo '</div>';


