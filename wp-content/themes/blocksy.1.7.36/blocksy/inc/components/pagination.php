<?php
/**
 * Pagination helpers
 *
 * @copyright 2019-present Creative Themes
 * @license   http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @package   Blocksy
 */

if (! function_exists('blocksy_get_pagination_source')) {
	function blocksy_get_pagination_source() {
		static $result = null;

		if (! is_null($result)) {
			if (! is_customize_preview()) {
				return $result;
			}
		}

		$post_type = blocksy_manager()->post_types->is_supported_post_type();

		if ($post_type) {
			$result = [
				'strategy' => 'customizer',
				'prefix' => $post_type
			];

			return $result;
		}

		if (function_exists('is_woocommerce')) {
			if (is_woocommerce()) {
				$result = [
					'strategy' => 'customizer',
					'prefix' => 'woo'
				];

				return $result;
			}
		}

		$result = [
			'strategy' => 'customizer',
			'prefix' => 'blog'
		];

		return $result;
	}
}

/**
 * Dispaly post pagination.
 *
 * @param array $args Pagination config.
 */
if (! function_exists('blocksy_display_posts_pagination')) {
	function blocksy_display_posts_pagination( $args = [] ) {
		$prefix = blocksy_manager()->screen->get_prefix([
			'allowed_prefixes' => [
				'blog',
				'woo_categories'
			],
			'default_prefix' => 'blog'
		]);

		// Don't print empty markup if there's only one page.

		$args = wp_parse_args(
			$args,
			[
				'has_pagination' => get_theme_mod(
					$prefix . '_has_pagination',
					'yes'
				) === 'yes',
				'pagination_type' => get_theme_mod(
					$prefix . '_pagination_global_type',
					'simple'
				),
				'last_page_text' => __('No more posts to load', 'blocksy'),
				'total_pages' => null,
				'current_page' => null,
				'format' => null,
				'base' => null
			]
		);

		if ($prefix === 'woo_categories') {
			$args['last_page_text'] = __('No more products to load', 'blocksy');
		}

		if (! $args['has_pagination']) {
			return '';
		}

		if (! $args['total_pages'] || !$args['current_page']) {
			global $wp_query, $wp_rewrite;

			$args['current_page'] = $wp_query->get('paged');
			$args['total_pages'] = $wp_query->max_num_pages;

			if (! $args['current_page']) {
				$args['current_page'] = 1;
			}
		}

		if ($args['total_pages'] <= 1 ) {
			return '';
		}

		$button_output = '';

		if (
			$args['pagination_type'] === 'load_more'
			&&
			intval($args['current_page']) !== intval($args['total_pages'])
		) {
			$label_button = get_theme_mod(
				$prefix . '_load_more_label',
				__('Load More', 'blocksy')
			);

			$button_output = '<a class="ct-button ct-load-more">' . $label_button . '</a>';
		}

		if (
			$args['pagination_type'] !== 'simple'
			&&
			$args['pagination_type'] !== 'next_prev'
		) {
			if (intval($args['current_page']) === intval($args['total_pages'])) {
				return '';
			}

			$button_output = '<div class="ct-load-more-helper">' . $button_output;
			$button_output .= '<span data-loader="circles"><span></span><span></span><span></span></span>';
			$button_output .= '<div class="ct-last-page-text">' . $args['last_page_text'] . '</div>';
			$button_output .= '</div>';
		}

		$pagination_class = 'ct-pagination';
		$divider_output = '';

		$divider = get_theme_mod(
			$prefix . '_paginationDivider',
			[
				'width' => 1,
				'style' => 'none',
				'color' => [
					'color' => 'rgba(224, 229, 235, 0.5)',
				]
			]
		);

		if (
			$divider['style'] !== 'none'
			&&
			$args['pagination_type'] !== 'infinite_scroll'
		) {
			$divider_output = 'data-divider';
		}

		$template = '
		<div class="' . $pagination_class . '" role="navigation" data-type="' . $args['pagination_type'] . '" ' . $divider_output . '>
			<nav>%1$s</nav>
			%2$s
		</div>';

		$paginate_links_args = [
			'mid_size' => 3,
			'end_size' => 0,
			'type' => 'array',
			'total' => $args['total_pages'],
			'current' => $args['current_page'],
			'prev_text' => '<svg width="9px" height="9px" viewBox="0 0 15 15"><path class="st0" d="M10.9,15c-0.2,0-0.4-0.1-0.6-0.2L3.6,8c-0.3-0.3-0.3-0.8,0-1.1l6.6-6.6c0.3-0.3,0.8-0.3,1.1,0c0.3,0.3,0.3,0.8,0,1.1L5.2,7.4l6.2,6.2c0.3,0.3,0.3,0.8,0,1.1C11.3,14.9,11.1,15,10.9,15z"/></svg>' . __('Prev', 'blocksy'),

			'next_text' => __('Next', 'blocksy') . ' <svg width="9px" height="9px" viewBox="0 0 15 15"><path class="st0" d="M4.1,15c0.2,0,0.4-0.1,0.6-0.2L11.4,8c0.3-0.3,0.3-0.8,0-1.1L4.8,0.2C4.5-0.1,4-0.1,3.7,0.2C3.4,0.5,3.4,1,3.7,1.3l6.1,6.1l-6.2,6.2c-0.3,0.3-0.3,0.8,0,1.1C3.7,14.9,3.9,15,4.1,15z"/></svg>',
		];

		if ($args['format']) {
			$paginate_links_args['format'] = $args['format'];
		}

		if ($args['base']) {
			$paginate_links_args['base'] = $args['base'];
		}

		$links = paginate_links($paginate_links_args);

		$proper_links = $links;

		if ($args['pagination_type'] === 'next_prev') {
			$proper_links = [];

			foreach ($links as $link) {
				preg_match('/class="[^"]+"/', $link, $matches);

				if (count($matches) > 0) {
					if (
						strpos($matches[0], 'next') !== false
						||
						strpos($matches[0], 'prev') !== false
					) {
						$proper_links[] = $link;
					}
				}
			}
		}

		return sprintf(
			$template,
			join("\n", $proper_links),
			$button_output
		);
	}
}

