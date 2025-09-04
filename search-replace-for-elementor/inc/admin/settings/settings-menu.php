<?php
/**
 * [Short description]
 *
 * @package    DEVRY\ELEMSNR
 * @copyright  Copyright (c) 2025, Developry Ltd.
 * @license    https://www.gnu.org/licenses/gpl-3.0.html GNU Public License
 * @since      1.1
 */

namespace DEVRY\ELEMSNR;

! defined( ABSPATH ) || exit; // Exit if accessed directly.

function elemsnr_add_settings_menu() {
	$elemsnr = new Elementor_Search_Replace();

	if ( '' === $elemsnr->compact_mode ) {
		add_submenu_page(
			'elemsnr_bulk_search',
			esc_html__( 'Options', 'search-replace-for-elementor' ),
			null,
			'manage_options',
			ELEMSNR_SETTINGS_SLUG,
			__NAMESPACE__ . '\elemsnr_display_settings_page'
		);
	} else {
		add_submenu_page(
			'elementor',
			esc_html__( 'Options', 'search-replace-for-elementor' ),
			null,
			'manage_options',
			ELEMSNR_SETTINGS_SLUG,
			__NAMESPACE__ . '\elemsnr_display_settings_page'
		);
	}
}

add_action( 'admin_menu', __NAMESPACE__ . '\elemsnr_add_settings_menu', 1000 );
