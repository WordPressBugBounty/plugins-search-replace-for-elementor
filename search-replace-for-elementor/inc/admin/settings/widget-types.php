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
function elemsnr_display_widget_types() {
	printf(
		wp_kses(
			/* translators: %1$s is replaced with "Default (ALL) available widget types are used" */
			__( '%1$s.', 'search-replace-for-elementor' ),
			json_decode( ELEMSNR_PLUGIN_ALLOWED_HTML_ARR )
		),
		'<em>' . esc_html__( 'Default (ALL) available widget types are used', 'search-replace-for-elementor' ) . '</em>'
	);
	?>
		<p class="submit button-group">
			<button
				type="button"
				class="button button-primary"
				id="elemsnr-scan-widget-types"
				name="elemsnr-scan-widget-types"
				disabled
			>
				<?php echo esc_html__( 'Scan', 'search-replace-for-elementor' ); ?>
			</button>
			<button
				type="button"
				class="button"
				id="elemsnr-reset-widget-types"
				name="elemsnr-reset-widget-types"
				disabled
			>
				<?php echo esc_html__( 'Reset', 'search-replace-for-elementor' ); ?>
			</button>
		</p>
		<p class="description">
			<small>
				<?php echo esc_html__( 'Scan and update the Elementor widget types.', 'search-replace-for-elementor' ); ?>
			</small>
		</p>
	<?php
}
