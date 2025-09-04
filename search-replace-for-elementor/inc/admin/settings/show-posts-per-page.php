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
function elemsnr_display_show_posts_per_page() {
	?>
		<input
			type="number"
			class="regular-text"
			id="elemsnr-pro-show-posts-per-page"
			name="elemsnr_show_posts_per_page"
			value="10"
			placeholder="Enter posts per page..."
			minlength="1"
			maxlength="3"
			min="1"
			max="100"
			disabled
		/>
		<p class="description">
			<small>
				<?php echo esc_html__( 'Display the number of posts per page for the selected post types.', 'search-replace-for-elementor' ); ?>
			</small>
		</p>
	<?php
}
