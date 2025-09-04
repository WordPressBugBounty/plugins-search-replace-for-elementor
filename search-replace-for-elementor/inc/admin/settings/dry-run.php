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
 * Display the setting.
 */
function elemsnr_display_dry_run() {
	?>
	<select id="elemsnr-pro-dry-run" name="elemsnr_dry_run" disabled>
			<option value="no">No</option>
			<option value="">Yes</option>
		</select>
		<p class="description">
			<small>
				<?php echo esc_html__( 'Modify the default setting for the bulk search dry-run option.', 'search-replace-for-elementor' ); ?>
			</small>
		</p>
	<?php
}
