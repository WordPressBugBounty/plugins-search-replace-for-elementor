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
function elemsnr_display_data_size_limit() {
	?>
		<input
			type="number"
			class="regular-text"
			id="elemsnr-pro-data-size-limit"
			name="elemsnr_data_size_limit"
			value="300"
			placeholder="Enter your data size limit (in kb)..."
			minlength="3"
			maxlength="5"
			min="300"
			max="10240"
			step="10"
			disabled
		/> kb
		<p class="description">
			<small>
				<?php echo esc_html__( 'Overwrite the default Elementor raw size limit of 300kb.', 'search-replace-for-elementor' ); ?>
			</small>
		</p>
	<?php
}
