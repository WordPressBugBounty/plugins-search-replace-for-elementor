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
function elemsnr_display_third_party_addons() {
	?>
		<select id="elemsnr-pro-third-party-addons" name="elemsnr_third_party_addons" disabled>
			<option value="">None</option>
			<option value="ekit_">ElementsKit</option>
			<option value="eael_">Essential Addons</option>
			<option value="premium_,pa_">Premium Addons</option>
		</select>
		<p class="description">
			<small>
				<?php echo esc_html__( 'Quick integration with third-party addons.', 'search-replace-for-elementor' ); ?>
			</small>
		</p>
	<?php
}
