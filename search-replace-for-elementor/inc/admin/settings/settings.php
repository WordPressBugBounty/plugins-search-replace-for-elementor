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

// The slug for plugin main page.
define( __NAMESPACE__ . '\ELEMSNR_SETTINGS_SLUG', 'elemsnr_settings' );

require_once ELEMSNR_PLUGIN_DIR_PATH . 'inc/admin/settings/settings-menu.php';
require_once ELEMSNR_PLUGIN_DIR_PATH . 'inc/admin/settings/settings-page.php';
require_once ELEMSNR_PLUGIN_DIR_PATH . 'inc/admin/settings/settings-actions.php';
require_once ELEMSNR_PLUGIN_DIR_PATH . 'inc/admin/settings/settings-register.php';

require_once ELEMSNR_PLUGIN_DIR_PATH . 'inc/admin/settings/dry-run.php';
require_once ELEMSNR_PLUGIN_DIR_PATH . 'inc/admin/settings/unfiltered-text.php';
require_once ELEMSNR_PLUGIN_DIR_PATH . 'inc/admin/settings/unfiltered-urls.php';
require_once ELEMSNR_PLUGIN_DIR_PATH . 'inc/admin/settings/disable-minimum-chars.php';
require_once ELEMSNR_PLUGIN_DIR_PATH . 'inc/admin/settings/highlight-links-images.php';
require_once ELEMSNR_PLUGIN_DIR_PATH . 'inc/admin/settings/data-size-limit.php';
require_once ELEMSNR_PLUGIN_DIR_PATH . 'inc/admin/settings/show-posts-per-page.php';
require_once ELEMSNR_PLUGIN_DIR_PATH . 'inc/admin/settings/third-party-addons.php';
require_once ELEMSNR_PLUGIN_DIR_PATH . 'inc/admin/settings/data-field-keys-required.php';
require_once ELEMSNR_PLUGIN_DIR_PATH . 'inc/admin/settings/data-field-keys.php';
require_once ELEMSNR_PLUGIN_DIR_PATH . 'inc/admin/settings/widget-types.php';
require_once ELEMSNR_PLUGIN_DIR_PATH . 'inc/admin/settings/compact-mode.php';
