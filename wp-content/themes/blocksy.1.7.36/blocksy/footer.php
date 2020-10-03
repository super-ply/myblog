<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Blocksy
 */

if (is_customize_preview()) {
	blocksy_add_customizer_preview_cache(
		function () {
			return blocksy_html_tag(
				'div',
				['data-id' => 'socials-general-cache'],
				'<section>' . blocksy_social_icons(null, [
					'type' => 'simple-small'
				]) . '</section>'
			);
		}
	);
}

blocksy_after_current_template();

?>
	</main>

	<?php
		do_action('blocksy:footer:before');

		if (function_exists('hfe_footer_enabled') && hfe_footer_enabled()) {
			hfe_render_footer();
		} else {
			if (
				! function_exists('elementor_theme_do_location')
				||
				! elementor_theme_do_location('footer')
			) {
				echo blocksy_manager()->footer_builder->render();
			}
		}

		do_action('blocksy:footer:after');
	?>
</div>

<?php
	if (function_exists('blocksy_woo_floating_cart')) {
		echo blocksy_woo_floating_cart();
	}

	if (get_theme_mod('has_back_top', 'no') === 'yes') {
		blocksy_output_back_to_top_link();
	}

	if (is_customize_preview()) {
		blocksy_add_customizer_preview_cache(function () {
			return blocksy_html_tag(
				'div',
				['data-id' => 'back-to-top-link'],
				blocksy_collect_and_return(function () {
					blocksy_output_back_to_top_link(true);
				})
			);
		});
	}

	$elements = new Blocksy_Header_Builder_Elements();
	$elements->render_search_modal();

	echo $elements->render_offcanvas();
	wp_footer();
?>

</body>
</html>
