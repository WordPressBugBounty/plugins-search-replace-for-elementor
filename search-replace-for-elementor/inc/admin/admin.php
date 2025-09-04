<?php
/**
 * Load admin files.
 *
 * @package    DEVRY\ELEMSNR
 * @copyright  Copyright (c) 2025, Developry Ltd.
 * @license    https://www.gnu.org/licenses/gpl-3.0.html GNU Public License
 * @since      1.0
 */

namespace DEVRY\ELEMSNR;

! defined( ABSPATH ) || exit; // Exit if accessed directly.

require_once ELEMSNR_PLUGIN_DIR_PATH . 'inc/admin/requirements/requirements.php';
require_once ELEMSNR_PLUGIN_DIR_PATH . 'inc/admin/bulk-search/bulk-search.php';
require_once ELEMSNR_PLUGIN_DIR_PATH . 'inc/admin/elementor/elementor.php';
require_once ELEMSNR_PLUGIN_DIR_PATH . 'inc/admin/settings/settings.php';
