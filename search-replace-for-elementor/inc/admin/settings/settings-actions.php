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

/**
 * [AJAX] Reset plugin settings to their default values
 * and provide a success message.
 */
function elemsnr_reset_settings() {
	$elemsnr_admin = new ELEMSNR_Admin();

	$elemsnr_admin->get_invalid_user_cap();

	delete_option( 'elemsnr_compact_mode' );

	$elemsnr_admin->print_json_message(
		1,
		__( 'All options have been reset to their default values.', 'search-replace-for-elementor' )
	);
}

add_action( 'wp_ajax_elemsnr_reset_settings', __NAMESPACE__ . '\elemsnr_reset_settings' );
