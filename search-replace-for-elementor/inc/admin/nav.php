<?php
/**
 * Admin navigation/settings partial.
 *
 * @package    DEVRY\ELEMSNR
 * @copyright  Copyright (c) 2025, Developry Ltd.
 * @license    https://www.gnu.org/licenses/gpl-3.0.html GNU Public License
 * @since      1.5
 */

namespace DEVRY\ELEMSNR;

! defined( ABSPATH ) || exit; // Exit if accessed directly.

$elemsnr_admin = new ELEMSNR_Admin();

$page = ( isset( $_REQUEST['page'] ) ) ? sanitize_text_field( wp_unslash( $_REQUEST['page'] ) ) : '';

?>
<div class="notice notice-info elemsnr-admin">
		<?php
		printf(
			wp_kses(
			/* translators: %1$s is replaced with "Link to the website" */
			/* translators: %2$s is replaced with "Get PRO Version" */
				__( '<a href="%1$s" target="_blank">%2$s</a>! Use the full-featured bulk/mass search and replace with extened options.', 'search-replace-for-elementor' ),
				json_decode( ELEMSNR_PLUGIN_ALLOWED_HTML_ARR )
			),
			esc_url( 'https://searchreplaceplugin.com/?utm_source=elemsnr&utm_medium=free_plugin&utm_campaign=pro_badge' ),
			'<strong>' . esc_html__( 'Get the PRO Version today', 'search-replace-for-elementor' ) . '</strong>'
		);
		?>
</div>
<div class="elemsnr-admin">
	<h2>
		<?php echo esc_html__( 'Search & Replace for Elementor', 'search-replace-for-elementor' ); ?>
	</h2>
	<p>
		<?php
		printf(
			wp_kses(
				__( 'Quickly search and replace any text, links, or images in Elementor using Search & Replace for Elementor.', 'search-replace-for-elementor' ),
				json_decode( ELEMSNR_PLUGIN_ALLOWED_HTML_ARR )
			),
		);
		?>
	</p>
	<nav class="elemsnr-page-nav">
		<a 
			href="<?php echo esc_url( admin_url( $elemsnr_admin->admin_page . ELEMSNR_BULK_SEARCH_SLUG ) ); ?>" 
			class="elemsnr-bulk-search-tab <?php echo ( ELEMSNR_BULK_SEARCH_SLUG === $page ) ? 'current' : ''; ?>"
		>
			<?php echo esc_html__( 'Bulk Search', 'search-replace-for-elementor' ); ?>
		</a>
		<a href="https://searchreplaceplugin.com/?utm_source=elemsnr&utm_medium=free_plugin&utm_campaign=pro_badge" class="elemsnr-backup-tab" target="_blank">
			<?php echo esc_html__( 'Backup', 'search-replace-for-elementor' ); ?>
			<span class="elemsnr-status-badge elemsnr-status-upgrade">
				<?php echo esc_html__( 'Pro', 'search-replace-for-elementor' ); ?>
			</span>
		</a>
		<a href="https://searchreplaceplugin.com/?utm_source=elemsnr&utm_medium=free_plugin&utm_campaign=pro_badge" class="elemsnr-license-tab" target="_blank">
			<?php echo esc_html__( 'License', 'search-replace-for-elementor' ); ?>
			<span class="elemsnr-status-badge elemsnr-status-upgrade">
				<?php echo esc_html__( 'Pro', 'search-replace-for-elementor' ); ?>
			</span>
		</a>
		<a 
			href="<?php echo esc_url( admin_url( $elemsnr_admin->admin_page . ELEMSNR_SETTINGS_SLUG ) ); ?>" 
			class="elemsnr-settings-tab <?php echo ( ELEMSNR_SETTINGS_SLUG === $page ) ? 'current' : ''; ?>"
		>
			<?php echo esc_html__( 'Options', 'search-replace-for-elementor' ); ?>
		</a>
		<a href="https://searchreplaceplugin.com/?utm_source=elemsnr&utm_medium=free_plugin&utm_campaign=pro_badge" class="elemsnr-help-tab" target="_blank">
			<?php echo esc_html__( 'Help', 'search-replace-for-elementor' ); ?>
			<span class="elemsnr-status-badge elemsnr-status-upgrade">
				<?php echo esc_html__( 'Pro', 'search-replace-for-elementor' ); ?>
			</span>
		</a>
	</nav>
</div>
