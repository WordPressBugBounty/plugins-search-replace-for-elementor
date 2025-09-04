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
function elemsnr_display_data_field_keys_required() {
	?>
		<select id="elemsnr-pro-data-field-keys-required" name="elemsnr_data_field_keys_required" disabled>
			<option value="">No</option>
			<option value="yes">Yes</option>
		</select>
		<p class="description">
			<small>
				<?php
				printf(
					wp_kses(
						/* translators: %1$s is replaced with "Disable the use of Text & Editor field keys by default" */
						__( 'Disable required field keys. %1$s.', 'search-replace-for-elementor' ),
						json_decode( ELEMSNR_PLUGIN_ALLOWED_HTML_ARR )
					),
					'<strong>' . esc_html__( 'Disable the use of Text & Editor field keys by default', 'search-replace-for-elementor' ) . '</strong>',
				);
				?>
			</small>
		</p>
	<?php
}
