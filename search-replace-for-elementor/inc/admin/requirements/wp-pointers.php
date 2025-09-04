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
 * Enqueue pointer only if not dismissed
 */
function elemsnr_enqueue_wp_pointer( $hook_suffix ) {
	// Only load on your plugin settings page (optional).
	// if ( 'toplevel_page_elemsnr_bulk_search' !== $hook_suffix ) {
	// 	return;
	// }

	// Check if dismissed.
	$dismissed = get_user_meta( get_current_user_id(), 'elemsnr_pointer', true );

	if ( $dismissed ) {
		return;
	}

	// Load WP Pointer styles and scripts.
	wp_enqueue_style( 'wp-pointer' );
	wp_enqueue_script( 'wp-pointer' );

	wp_localize_script(
		'wp-pointer',
		'elemsnr_pointer',
		array(
			'ajaxurl' => admin_url( 'admin-ajax.php' ),
		)
	);

	// Add inline JS in footer.
	add_action( 'admin_print_footer_scripts', __NAMESPACE__ . '\elemsnr_wp_pointer_script' );
}

add_action( 'admin_enqueue_scripts', __NAMESPACE__ . '\elemsnr_enqueue_wp_pointer' );

/**
 * The actual pointer
 */
function elemsnr_wp_pointer_script() {
	$pointer_content = sprintf(
		'<h3>%s</h3><p>%s</p>',
		esc_html__( 'Search & Replace for Elementor', 'search-replace-elementor' ),
		sprintf(
			/* translators: %1$s is replaced with "New!" */
			/* translators: %2$s is replaced with "Elementor" */
			esc_html__( '%1$s Now you can use the text-only bulk/mass search and replace for %2$s posts and pages.', 'search-replace-elementor' ),
			'<strong>' . esc_html__( 'New!', 'search-replace-elementor' ) . '</strong>',
			'<strong>' . esc_html__( 'Elementor', 'search-replace-elementor' ) . '</strong>'
		)
	);
	?>
	<script type="text/javascript">
		jQuery(function($) {
			var $target = $('#toplevel_page_elemsnr_bulk_search');

			if ($target.length) {
				$target.pointer({
					content: '<?php echo wp_kses_post( addslashes( $pointer_content ) ); ?>',
					position: {
						edge: 'left',
						align: 'center'
					},
					close: function() {
						$.post(elemsnr_pointer.ajaxurl, {
							action: 'dismiss_wp_pointer',
							pointer: 'elemsnr_pointer'
						});
					}
				}).pointer('open');
			}
		});
	</script>
	<?php
}

/**
 * Register dismissal action
 */
function elemsnr_dismiss_wp_pointer() {
	if ( isset( $_POST['pointer'] ) ) {
		update_user_meta(
			get_current_user_id(),
			sanitize_text_field( $_POST['pointer'] ),
			true
		);
	}

	// Properly terminate the AJAX request.
	wp_send_json_success( 'Pointer dismissed successfully!' );
}

add_action( 'wp_ajax_dismiss_wp_pointer', __NAMESPACE__ . '\elemsnr_dismiss_wp_pointer' );

/**
 * Reset WP Pointer dismissal on plugin deactivation
 */
function elemsnr_reset_pointer_on_deactivation() {
	// Get all users safely
	if ( ! function_exists( 'get_users' ) ) {
		require_once ABSPATH . 'wp-includes/pluggable.php';
	}

	// Delete the dismissal flag for all users.
	$users = get_users( array( 'fields' => array( 'ID' ) ) );

	if ( empty( $users ) ) {
		return;
	}

	foreach ( $users as $user ) {
		delete_user_meta( $user->ID, 'elemsnr_pointer' );
	}
}

add_action( 'deactivated_plugin', __NAMESPACE__ . '\elemsnr_reset_pointer_on_deactivation' );
