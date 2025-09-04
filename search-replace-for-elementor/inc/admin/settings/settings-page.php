<?php
/**
 * [Short description]
 *
 * @package    DEVRY\ELEMSNR
 * @copyright  Copyright (c) 2025, Developry Ltd.
 * @license    https://www.gnu.org/licenses/gpl-3.0.html GNU Public License
 * @since      1.3
 */

namespace DEVRY\ELEMSNR;

! defined( ABSPATH ) || exit; // Exit if accessed directly.

/**
 * Display the search & replace for Elementor page layout.
 */
function elemsnr_display_settings_page() {
	if ( ! current_user_can( 'manage_options' ) ) {
		wp_die( 'You do not have sufficient permissions to access this page.' );
	}

	// 1. Elementor Search & Replace.
	add_settings_section(
		ELEMSNR_SETTINGS_SLUG,
		'',
		'',
		ELEMSNR_SETTINGS_SLUG
	);

	add_settings_field(
		'elemsnr_dry_run',
		'<label for="elemsnr-pro-dry-run">'
			. __( 'Dry-run', 'search-replace-for-elementor' )
			. '</label>',
		__NAMESPACE__ . '\elemsnr_display_dry_run',
		ELEMSNR_SETTINGS_SLUG,
		ELEMSNR_SETTINGS_SLUG,
	);

	add_settings_field(
		'elemsnr_unfiltered_text',
		'<label for="elemsnr-pro-unfiltered-text">'
			. __( 'Unfiltered Text', 'search-replace-for-elementor' )
			. '</label>',
		__NAMESPACE__ . '\elemsnr_display_unfiltered_text',
		ELEMSNR_SETTINGS_SLUG,
		ELEMSNR_SETTINGS_SLUG,
	);

	add_settings_field(
		'elemsnr_unfiltered_urls',
		'<label for="elemsnr-pro-unfiltered-urls">'
			. __( 'Unfiltered URLs', 'search-replace-for-elementor' )
			. '</label>',
		__NAMESPACE__ . '\elemsnr_display_unfiltered_urls',
		ELEMSNR_SETTINGS_SLUG,
		ELEMSNR_SETTINGS_SLUG,
	);

	add_settings_field(
		'elemsnr_disable_minimum_chars',
		'<label for="elemsnr-pro-disable-minimum-chars">'
			. __( 'Disable Minimum Chars', 'search-replace-for-elementor' )
			. '</label>',
		__NAMESPACE__ . '\elemsnr_display_disable_minimum_chars',
		ELEMSNR_SETTINGS_SLUG,
		ELEMSNR_SETTINGS_SLUG,
	);

	add_settings_field(
		'elemsnr_highlight_links_images',
		'<label for="elemsnr-pro-highlight-links-images">'
			. __( 'Highlight Links & Images', 'search-replace-for-elementor' )
			. '</label>',
		__NAMESPACE__ . '\elemsnr_display_highlight_links_images',
		ELEMSNR_SETTINGS_SLUG,
		ELEMSNR_SETTINGS_SLUG,
	);

	add_settings_field(
		'elemsnr_data_size_limit',
		'<label for="elemsnr-pro-data-size-limit">'
			. __( 'Data Size Limit', 'search-replace-for-elementor' )
			. '</label>',
		__NAMESPACE__ . '\elemsnr_display_data_size_limit',
		ELEMSNR_SETTINGS_SLUG,
		ELEMSNR_SETTINGS_SLUG,
	);

	add_settings_field(
		'elemsnr_show_posts_per_page',
		'<label for="elemsnr-pro-show-posts-per-page">'
			. __( 'Show Posts per Page', 'search-replace-for-elementor' )
			. '</label>',
		__NAMESPACE__ . '\elemsnr_display_show_posts_per_page',
		ELEMSNR_SETTINGS_SLUG,
		ELEMSNR_SETTINGS_SLUG,
	);

	add_settings_field(
		'elemsnr_third_party_addons',
		'<label for="elemsnr-pro-third-party-addons">'
			. __( 'Third-party Addons', 'search-replace-for-elementor' )
			. '</label>',
		__NAMESPACE__ . '\elemsnr_display_third_party_addons',
		ELEMSNR_SETTINGS_SLUG,
		ELEMSNR_SETTINGS_SLUG,
	);

	add_settings_field(
		'elemsnr_data_field_keys_required',
		'<label for="elemsnr-pro-data-field-keys-required">'
			. __( 'Required Data Field Keys', 'search-replace-for-elementor' )
			. '</label>',
		__NAMESPACE__ . '\elemsnr_display_data_field_keys_required',
		ELEMSNR_SETTINGS_SLUG,
		ELEMSNR_SETTINGS_SLUG,
	);

	add_settings_field(
		'elemsnr_data_field_keys',
		'<label for="elemsnr-pro-data-field-keys">'
			. __( 'Data Field Keys<br />(Experts Only)', 'search-replace-for-elementor' )
			. '</label>',
		__NAMESPACE__ . '\elemsnr_display_data_field_keys',
		ELEMSNR_SETTINGS_SLUG,
		ELEMSNR_SETTINGS_SLUG,
	);

	add_settings_field(
		'elemsnr_widget_types',
		'<label for="elemsnr-pro-widget-types">'
			. __( 'Widget Types<br />(Experts Only)', 'search-replace-for-elementor' )
			. '</label>',
		__NAMESPACE__ . '\elemsnr_display_widget_types',
		ELEMSNR_SETTINGS_SLUG,
		ELEMSNR_SETTINGS_SLUG,
	);

	add_settings_field(
		'elemsnr_disable_compact_mode',
		'<label for="elemsnr-pro-compact-mode">'
			. __( 'Compact Mode', 'search-replace-for-elementor' )
			. '</label>',
		__NAMESPACE__ . '\elemsnr_display_compact_mode',
		ELEMSNR_SETTINGS_SLUG,
		ELEMSNR_SETTINGS_SLUG,
	);

	require_once ELEMSNR_PLUGIN_DIR_PATH . 'inc/admin/nav.php';
	require_once ELEMSNR_PLUGIN_DIR_PATH . 'inc/admin/settings/settings-main-page.php';
}
