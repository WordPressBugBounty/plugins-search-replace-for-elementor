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
function elemsnr_display_data_field_keys() {
	printf(
		wp_kses(
			/* translators: %1$s is replaced with "Default available data field keys in use." */
			__( '%1$s!', 'search-replace-for-elementor' ),
			json_decode( ELEMSNR_PLUGIN_ALLOWED_HTML_ARR )
		),
		'<em>' . esc_html__( 'Default available data field keys in use.', 'search-replace-for-elementor' ) . '</em>'
	);
	?>
		<p class="submit button-group">
			<button
				type="button"
				class="button button-primary"
				id="elemsnr-scan-field-keys"
				name="elemsnr-scan-field-keys"
				disabled
			>
				<?php echo esc_html__( 'Scan', 'search-replace-for-elementor' ); ?>
			</button>
			<button
				type="button"
				class="button"
				id="elemsnr-reset-field-keys"
				name="elemsnr-reset-field-keys"
				disabled
			>
				<?php echo esc_html__( 'Reset', 'search-replace-for-elementor' ); ?>
			</button>
		</p>
		<p class="description">
			<small>
				<?php echo esc_html__( 'Scan and update Elementor data field keys.', 'search-replace-for-elementor' ); ?>
			</small>
		</p>
	<?php
}
