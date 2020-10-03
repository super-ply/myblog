<?php
/**
 * Admin
 *
 * @copyright 2019-present Creative Themes
 * @license   http://www.gnu.org/copyleft/gpl.html GNU General Public License
 */

require_once get_template_directory() . '/admin/dashboard/plugins/ct-plugin-manager.php';

if (is_admin() && defined('DOING_AJAX') && DOING_AJAX) {
	require_once get_template_directory() . '/admin/dashboard/api.php';
	require_once get_template_directory() . '/admin/dashboard/plugins/ct-plugin-manager.php';
	require_once get_template_directory() . '/admin/dashboard/plugins/plugins-api.php';
}

require get_template_directory() . '/admin/dashboard/core.php';

add_filter(
	'admin_body_class',
	function ($classes) {
		global $post;

		$current_screen = get_current_screen();

		if (! $current_screen->is_block_editor()) {
			return $classes;
		}

		$default_page_structure = blocksy_default_akg(
			'page_structure_type',
			blocksy_get_post_options($post->ID),
			'default'
		);

		if ($default_page_structure === 'default') {
			$default_page_structure = get_post_type($post) === 'page' ? get_theme_mod(
				'single_page_structure', 'type-4'
			) : get_theme_mod(
				'single_blog_post_structure', 'type-3'
			);

			$maybe_cpt = blocksy_manager()->post_types->is_supported_post_type();

			if ($maybe_cpt) {
				$default_page_structure = get_theme_mod(
					$maybe_cpt . '_single_structure',
					'type-4'
				);
			}
		}

		$class = 'narrow';

		if ($default_page_structure === 'type-4') {
			$class = 'normal';
		}

		$classes .= ' ' . 'ct-structure-' . $class;

		return $classes;
	}
);

if (! function_exists('blocksy_get_jed_locale_data')) {
	function blocksy_get_jed_locale_data($domain) {
		$translations = get_translations_for_domain($domain);

		$locale = [
			'' => [
				'domain' => $domain,
				'lang' => is_admin() ? get_user_locale() : get_locale(),
			],
		];

		if (! empty($translations->headers['Plural-Forms'])) {
			$locale['']['plural_forms'] = $translations->headers['Plural-Forms'];
		}

		foreach ($translations->entries as $msgid => $entry) {
			$locale[$msgid] = $entry->translations;
		}

		return $locale;
	}
}

add_action(
	'admin_enqueue_scripts',
	function () {
		$theme = blocksy_get_wp_parent_theme();

		$current_screen = get_current_screen();

		if (
			$current_screen->id
			&&
			strpos($current_screen->id, 'forminator') !== false
		) {
			return;
		}

		wp_enqueue_media();

		wp_register_script(
			'ct-events',
			get_template_directory_uri() . '/static/bundle/events.js',
			[],
			$theme->get('Version'),
			true
		);

		$deps = apply_filters('blocksy-options-scripts-dependencies', [
			'underscore',
			'react',
			'react-dom',
			'wp-element',
			'wp-components',
			'wp-date',
			'wp-i18n',
			'ct-events'
			// 'wp-polyfill'
		]);

		global $wp_customize;

		if (! isset($wp_customize)) {
			wp_enqueue_editor();

			wp_enqueue_script(
				'ct-options-scripts',
				get_template_directory_uri() . '/static/bundle/options.js',
				$deps,
				$theme->get('Version')
			);
		}

		$locale_data_ct = blocksy_get_jed_locale_data('blocksy');

		wp_add_inline_script(
			'wp-i18n',
			'wp.i18n.setLocaleData( ' . wp_json_encode($locale_data_ct) . ', "blocksy" );'
		);

		wp_enqueue_style(
			'ct-options-styles',
			get_template_directory_uri() . '/static/bundle/options.css',
			[],
			$theme->get('Version')
		);

		if (is_rtl()) {
			wp_enqueue_style(
				'ct-options-rtl-styles',
				get_template_directory_uri() . '/static/bundle/options-rtl.css',
				['ct-options-styles'],
				$theme->get('Version')
			);
		}

		wp_localize_script(
			'ct-options-scripts',
			'ct_localizations',
			[
				'is_dev_mode' => !!(defined('BLOCKSY_DEVELOPMENT_MODE') && BLOCKSY_DEVELOPMENT_MODE),
				'nonce' => wp_create_nonce( 'ct-ajax-nonce' ),
				'public_url' => get_template_directory_uri() . '/static/bundle/',
				'static_public_url' => get_template_directory_uri() . '/static/',
				'ajax_url' => admin_url('admin-ajax.php'),
				'rest_url' => get_rest_url(),
				'customizer_url' => admin_url('/customize.php?autofocus'),
			]
		);
	},
	50
);

add_action('admin_notices', function () {
	blocksy_output_companion_notice();
	blocksy_output_woo_deprecation_notice();
});

function blocksy_output_companion_notice() {
	if (! current_user_can('activate_plugins') ) return;
	if (get_option('dismissed-blocksy_plugin_notice', false)) return;

	$manager = new Blocksy_Plugin_Manager();
	$status = $manager->get_companion_status()['status'];

	if ($status === 'active') return;

	$url = admin_url('themes.php?page=ct-dashboard');
	$plugin_url = admin_url('admin.php?page=ct-dashboard');
	$plugin_link = 'https://creativethemes.com/blocksy/companion/';

	echo '<div class="notice notice-blocksy-plugin">';
	echo '<div class="notice-blocksy-plugin-root" data-url="' . esc_attr($url) . '" data-plugin-url="' . esc_attr($plugin_url) . '" data-plugin-status="' . esc_attr($status) . '" data-link="' . esc_attr($plugin_link) . '">';

	?>

	<div class="ct-blocksy-plugin-inner">
		<span class="ct-notification-icon">
			<svg width="70" viewBox="0 0 20 17">
				<rect x="3" width="5" height="5.15" rx="1.5" fill="#0085ba" opacity="0.6"/>
				<rect x="12" width="5" height="5.15" rx="1.5" fill="#0085ba" opacity="0.6"/>
				<rect y="2.58" width="20" height="14.42" rx="2.5" fill="#0085ba"/>
			</svg>
		</span>

		<div class="ct-notification-content">
			<h2><?php esc_html_e( 'Thanks for installing Blocksy, you rock!', 'blocksy' ); ?></h2>
			<p>
				<?php esc_html_e( 'We strongly recommend you to activate the', 'blocksy' ); ?>
				<b><?php esc_html_e( 'Blocksy Companion', 'blocksy' ); ?></b> plugin.
				<br>
				<?php esc_html_e( 'This way you will have access to custom extensions, demo templates and many other awesome features', 'blocksy' ); ?>.
			</p>
		</div>
	</div>
	<?php

	echo '</div>';
	echo '</div>';
}

function blocksy_output_woo_deprecation_notice() {
	if (! class_exists('\Blocksy\Plugin')) {
		return;
	}

	if (! method_exists(\Blocksy\Plugin::instance()->extensions, 'get')) {
		return;
	}

	if (! \Blocksy\Plugin::instance()->extensions->get('woocommerce-extra')) {
		return;
	}

	if (get_option('dismissed-blocksy_woo_deprecation_notice', false)) return;

	echo '<div class="notice notice-blocksy-woo-deprecation">';
	echo '<div class="notice-woo-deprecation-root">';

	?>

	<div class="ct-blocksy-woo-deprecation-inner">
		<div class="ct-notification-content">
			<h2><?php esc_html_e( 'Heads up, a better WooCommerce Extra extension is coming soon!', 'blocksy' ); ?></h2>

			<p class="notice-subheading">
				We are in the process of building a better WooCommerce Extra extension, with a lot more new
				features than what it now has to offer.
				<br>
				Unfortunately, because these features will only be available to our premium users, we have to gradually deprecate this extension from the free version of the Blocksy Companion plugin.
			<p>

			<p>
				To provide more details, as soon as this extension will be removed from the free version, <b>only</b> products <b>Quick View</b> and <b>Floating Cart</b> will be gone.
				<br>
				<b>Every other part of the WooCommerce integration of Blocksy will remain free forever.</b>
			</p>

			<p>
				The WooCommerce Extra (free extension) won't get excluded until the official release of the Blocksy PRO.
			</p>

			<div class="notice-actions">
				<a href="https://creativethemes.com/blocksy/support/?subject_prefix=WooCommerce Deprecation" class="button button-primary" target="_blank">I have a question or idea</a>
				<a href="#" class="button" data-dismiss="woo-deprecation">Dismiss notification</a>
			</div>

			<span class="notice-dismiss" title="Dismiss this notice" data-dismiss="woo-deprecation">
			</span>
		</div>
	</div>

	<?php

	echo '</div>';
	echo '</div>';
}

add_action('wp_ajax_blocksy_dismissed_notice_woo_deprecation', function () {
	update_option('dismissed-blocksy_woo_deprecation_notice', true);
	wp_die();
});

add_action( 'wp_ajax_blocksy_dismissed_notice_handler', function () {
	update_option('dismissed-blocksy_plugin_notice', true);
	wp_die();
});

add_action( 'wp_ajax_blocksy_notice_button_click', function () {
	if (! current_user_can('activate_plugins') ) return;

	$manager = new Blocksy_Plugin_Manager();
	$status_descriptor = $manager->get_companion_status();

	if ($status_descriptor['status'] === 'active') {
		wp_send_json_success([
			'status' => 'active'
		]);
	}

	if ($status_descriptor['status'] === 'uninstalled') {
		$manager->download_and_install($status_descriptor['slug']);
		$manager->plugin_activation($status_descriptor['slug']);

		wp_send_json_success([
			'status' => 'active'
		]);
	}

	if ($status_descriptor['status'] === 'installed') {
		$manager->plugin_activation($status_descriptor['slug']);

		wp_send_json_success([
			'status' => 'active'
		]);
	}

	wp_die();
});

