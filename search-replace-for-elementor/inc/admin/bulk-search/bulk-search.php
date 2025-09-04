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

define( __NAMESPACE__ . '\ELEMSNR_BULK_SEARCH_SLUG', 'elemsnr_bulk_search' );

require_once ELEMSNR_PLUGIN_DIR_PATH . 'inc/admin/bulk-search/bulk-search-menu.php';
require_once ELEMSNR_PLUGIN_DIR_PATH . 'inc/admin/bulk-search/bulk-search-page.php';
require_once ELEMSNR_PLUGIN_DIR_PATH . 'inc/admin/bulk-search/bulk-search-actions.php';
