<?php
/**
 * [Short description]
 *
 * @package    DEVRY\ELEMSNR
 * @copyright  Copyright (c) 2025, Developry Ltd.
 * @license    https://www.gnu.org/licenses/gpl-3.0.html GNU Public License
 * @since      1.5
 */

namespace DEVRY\ELEMSNR;

! defined( ABSPATH ) || exit; // Exit if accessed directly.

function elemsnr_add_bulk_search_menu() {
	$elemsnr = new Elementor_Search_Replace();

	if ( '' === $elemsnr->compact_mode ) {
		add_menu_page(
			esc_html__( 'Search & Replace for Elementor', 'search-replace-for-elementor-pro' ),
			esc_html__( 'Elementor S/R', 'search-replace-for-elementor-pro' ),
			'manage_options',
			ELEMSNR_BULK_SEARCH_SLUG,
			__NAMESPACE__ . '\elemsnr_display_bulk_search_page',
			'dashicons-search',
			25.5555
		);
	} else {
		add_submenu_page(
			'elementor',
			esc_html__( 'Search & Replace for Elementor', 'search-replace-for-elementor-pro' ),
			esc_html__( 'Search & Replace', 'search-replace-for-elementor-pro' ),
			'manage_options',
			ELEMSNR_BULK_SEARCH_SLUG,
			__NAMESPACE__ . '\elemsnr_display_bulk_search_page'
		);
	}
}

add_action( 'admin_menu', __NAMESPACE__ . '\elemsnr_add_bulk_search_menu', 1000 );
