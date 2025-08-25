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

function elemsnr_register_setting_fields() {
	register_setting( ELEMSNR_SETTINGS_SLUG, 'elemsnr_compact_mode', array( 'sanitize_callback' => __NAMESPACE__ . '\elemsnr_sanitize_compact_mode' ) );
}

add_action( 'admin_init', __NAMESPACE__ . '\elemsnr_register_setting_fields' );
