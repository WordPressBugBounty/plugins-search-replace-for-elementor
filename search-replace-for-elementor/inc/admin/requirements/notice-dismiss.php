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
 * Dismiss the rating notice, if the user chooses to do so.
 */
function elemsnr_dismiss_admin_notice() {
	// Only run in admin
	if ( ! is_admin() ) {
		return;
	}

	// Bail early if no action
	if ( empty( $_REQUEST['action'] ) ) {
		return;
	}

	$action = sanitize_text_field( wp_unslash( $_REQUEST['action'] ) );

	if ( 'elemsnr_dismiss_rating_notice' === $action ) {
		// Verify nonce (this checks $_REQUEST['_wpnonce'] automatically)
		check_admin_referer( 'elemsnr_rating_notice_nonce' );

		// Make sure only users with the right capability can dismiss
		if ( current_user_can( 'manage_options' ) ) {
			add_option( 'elemsnr_rating_notice', true );
		}
	}
}

add_action( 'admin_init', __NAMESPACE__ . '\elemsnr_dismiss_admin_notice' );

/**
 * Dismiss the upgrade notice, if the user chooses to do so.
 */
function elemsnr_dismiss_upgrade_notice() {
	// Only run in admin area
	if ( ! is_admin() ) {
		return;
	}

	// Bail if no action is present
	if ( empty( $_REQUEST['action'] ) ) {
		return;
	}

	$action = sanitize_text_field( wp_unslash( $_REQUEST['action'] ) );

	if ( 'elemsnr_dismiss_upgrade_notice' === $action ) {
		// Verify nonce (will exit if invalid)
		check_admin_referer( 'elemsnr_upgrade_notice_nonce' );

		// Ensure only users with the right capability can dismiss
		if ( current_user_can( 'manage_options' ) ) {
			add_option( 'elemsnr_upgrade_notice', true );
		}
	}
}

add_action( 'admin_init', __NAMESPACE__ . '\elemsnr_dismiss_upgrade_notice' );
