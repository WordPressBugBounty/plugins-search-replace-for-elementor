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
function elemsnr_display_highlight_links_images() {
	?>
		<select id="elemsnr-pro-highlight-links-images" name="elemsnr_highlight_links_images" disabled>
			<option value="">No</option>
			<option value="yes">Yes</option>
		</select>
		<p class="description">
			<small>
				<?php
				printf(
					wp_kses(
						/* translators: %1$s is replaced with "Available only for Elementor Pro" */
						__( 'Add a class to the parent element and highlight links and images: %1$s.', 'search-replace-for-elementor' ),
						json_decode( ELEMSNR_PLUGIN_ALLOWED_HTML_ARR )
					),
					'<strong>' . esc_html__( 'Available only for Elementor Pro', 'search-replace-for-elementor' ) . '</strong>',
				);
				?>
			</small>
		</p>
	<?php
}
