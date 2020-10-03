<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Blocksy
 */

if (
	blocksy_default_akg(
		'page_structure_type',
		blocksy_get_post_options(),
		'default'
	) !== 'default'
	&&
	is_customize_preview()
) {
	blocksy_add_customizer_preview_cache(
		function () {
			return blocksy_html_tag(
				'div',
				[
					'data-structure-custom' => blocksy_default_akg(
						'page_structure_type',
						blocksy_get_post_options(),
						'default'
					)
				],
				''
			);
		}
	);
}

if (have_posts()) {
	the_post();
}

/**
 * Note to code reviewers: This line doesn't need to be escaped.
 * Function blocksy_output_hero_section() used here escapes the value properly.
 */
echo blocksy_output_hero_section('type-2');

$container_class = 'ct-container';

if (blocksy_get_page_structure() === 'narrow') {
	$container_class = 'ct-container-narrow';
}

$content_area_class = 'content-area';

$post_content = get_the_content();
$content_style = blocksy_get_content_style();

if (
	(
		strpos($post_content, 'alignwide') !== false
		||
		strpos($post_content, 'alignfull') !== false
	)
	&&
	blocksy_sidebar_position() === 'none'
	&&
	blocksy_get_content_style() !== 'boxed'
) {
	$content_area_class .= ' content-area-wide';
}

?>

	<div id="primary" class="<?php echo $content_area_class ?>" <?php echo blocksy_get_v_spacing() ?>>
		<div class="<?php echo $container_class ?>" <?php echo wp_kses_post(blocksy_sidebar_position_attr()); ?>>

			<section>
				<?php
					/**
					 * Note to code reviewers: This line doesn't need to be escaped.
					 * Function blocksy_single_content() used here escapes the value properly.
					 */
					echo blocksy_single_content();
				?>
			</section>

			<?php get_sidebar(); ?>

		</div>

	</div>

<?php

blocksy_display_page_elements('separated');

have_posts();
wp_reset_query();

