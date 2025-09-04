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

function elemsnr_display_bulk_search_page() {
	if ( ! current_user_can( 'manage_options' ) ) {
		wp_die( 'You do not have sufficient permissions to access this page.' );
	}

	require_once ELEMSNR_PLUGIN_DIR_PATH . 'inc/admin/nav.php';
	require_once ELEMSNR_PLUGIN_DIR_PATH . 'inc/admin/bulk-search/bulk-search-main-page.php';
}
