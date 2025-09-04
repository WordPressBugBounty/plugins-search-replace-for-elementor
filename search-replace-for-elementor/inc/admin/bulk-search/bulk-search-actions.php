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
 * [AJAX] Use this pagination both for ajax call and on first load.
 * $post_type can be eithe passed directly or with ajax call.
 */
function elemsnr_show_posts_per_page( $post_type ) {
	ob_start();

	$elemsnr       = new Elementor_Search_Replace();
	$elemsnr_admin = new ELEMSNR_Admin();

	// Executed only for the ajax call.
	if ( ( ! empty( $_REQUEST['post_type'] ) ) ) {
		$elemsnr_admin->get_invalid_nonce_token();
	}

	$posts_per_page = get_option( 'elemsnr_show_posts_per_page', 10 );
	$page_number    = isset( $_REQUEST['page'] ) ? intval( max( 1, sanitize_text_field( wp_unslash( $_REQUEST['page'] ) ) ) ) : 1;
	$post_type      = isset( $_REQUEST['post_type'] ) ? trim( sanitize_text_field( wp_unslash( $_REQUEST['post_type'] ) ) ) : $post_type;

	// Get the posts using the modified elemsnr_get_all_posts function
	$result = $elemsnr->get_all_posts_paged( $post_type, $page_number, $posts_per_page );

	if ( false === $result ) {
		?>
			<em>
				<?php echo esc_html__( 'No published Elementor posts were found.', 'search-replace-for-elementor-pro' ); ?>
			</em>
		<?php
		return;
	}

	$posts       = $result['posts'];
	$total_pages = $result['total_pages'];

	// Display pagination
	?>
		<select id="elemsnr-change-posts-pages" name="elemsnr-change-posts-pages" class="elemsnr-change-posts-pages">
			<?php for ( $i = 1; $i <= $total_pages; $i++ ) : ?>
				<option value="<?php echo esc_attr( $i ); ?>" <?php echo ( $i === $page_number ) ? 'selected' : ''; ?>>
					Page <?php echo esc_attr( $i ); ?>
				</option>
			<?php endfor; ?>
		</select>
	<?php

	// Display the posts
	foreach ( $posts as $post ) {
		// Check if post/page is actually using Elementor.
		// if ( ! get_post_meta( $post->ID, '_elementor_edit_mode', true ) ) {
		// 	continue;
		// }
		?>
			<p>
				<input
					type="checkbox"
					id="elemsnr-post-<?php echo esc_attr( $post->ID ); ?>"
					name="elemsnr-post[<?php echo esc_attr( $post_type ); ?>][]"
					value="<?php echo esc_attr( $post->ID ); ?>"
				/>
				<label for="elemsnr-post-<?php echo esc_attr( $post->ID ); ?>">
					<?php echo esc_html( $post->post_title ); ?>
				</label>
			</p>
		<?php
	}

	$contents = ob_get_contents();
	ob_end_clean();

	// We can either print the content in HTML or send it back as JSON object into the message.
	if ( isset( $_REQUEST['post_type'] ) ) {
		echo wp_json_encode(
			array(
				array(
					'status'  => 1,
					'message' => $contents,
				),
			)
		);
		exit;
	} else {
		// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		echo $contents;
	}
}

add_action( 'wp_ajax_elemsnr_show_posts_per_page', __NAMESPACE__ . '\elemsnr_show_posts_per_page' );

/**
 * [AJAX] Bulk search and replace.
 */
function elemsnr_bulk_search_replace() {
	$elemsnr       = new Elementor_Search_Replace();
	$elemsnr_admin = new ELEMSNR_Admin();

	$elemsnr_admin->get_invalid_nonce_token();
	$elemsnr_admin->get_invalid_user_cap();

	// Total counter for all posts/pages search and replace.
	$search_occurrences_counter = 0;
	$post_counter               = 0;
	$elementor_post_results     = array();

	$search_phrase       = isset( $_REQUEST['search_phrase'] ) ? trim( sanitize_text_field( wp_unslash( $_REQUEST['search_phrase'] ) ) ) : '';
	$replace_with_phrase = isset( $_REQUEST['replace_with_phrase'] ) ? trim( sanitize_text_field( wp_unslash( $_REQUEST['replace_with_phrase'] ) ) ) : '';
	$is_text_only        = isset( $_REQUEST['is_text_only'] ) ? filter_var( sanitize_text_field( wp_unslash( $_REQUEST['is_text_only'] ) ), FILTER_VALIDATE_BOOLEAN ) : '';
	$elementor_post_ids  = isset( $_REQUEST['elementor_post_ids'] ) ? $_REQUEST['elementor_post_ids'] : ''; // phpcs:ignore WordPress.Security.ValidatedSanitizedInput.InputNotSanitized	

	// If unfiltered Text option is selected then skip sanitization.
	$search_phrase       = isset( $_REQUEST['search_phrase'] ) ? trim( wp_unslash( $_REQUEST['search_phrase'] ) ) : ''; // phpcs:ignore WordPress.Security.ValidatedSanitizedInput.InputNotSanitized
	$replace_with_phrase = isset( $_REQUEST['replace_with_phrase'] ) ? trim( wp_unslash( $_REQUEST['replace_with_phrase'] ) ) : ''; // phpcs:ignore WordPress.Security.ValidatedSanitizedInput.InputNotSanitized

	if ( strlen( $search_phrase ) < 3 ) {
		$elemsnr_admin->print_json_message(
			0,
			__( 'Enter at least 3 characters for the "search" value.', 'search-replace-for-elementor-pro' )
		);
	}

	if ( strlen( $replace_with_phrase ) < 3 ) {
		$elemsnr_admin->print_json_message(
			0,
			__( 'Enter at least 3 characters for the "replace with" value.', 'search-replace-for-elementor-pro' )
		);
	}

	if ( empty( $elementor_post_ids ) ) {
		$elemsnr_admin->print_json_message(
			0,
			__( 'You must select at least one page or post to execute the search and replace.', 'search-replace-for-elementor-pro' )
		);
	}

	$settings = array(
		'search_phrase'       => $search_phrase,
		'replace_with_phrase' => $replace_with_phrase,
		'highlight'           => false,
		'is_text_only'        => $is_text_only,
		'is_case_sensitive'   => false,
		'is_links'            => false,
		'is_images'           => false,
		'count'               => false,
		'regex'               => false,
	);

	foreach ( $elementor_post_ids as $post_type => $post_types ) {
		foreach ( $post_types as $current_post_id ) {
			$current_post_data   = get_post_meta( $current_post_id, '_elementor_data', true );
			$elementor_data      = json_decode( $current_post_data, true );
			$elementor_data_size = round( mb_strlen( $current_post_data, '8bit' ) / 1024, 2 );

			$elemsnr_admin->get_invalid_data_size_limit( $elementor_data_size );

			// Clean up all the custom tags from _elementor_data.
			$elementor_data_cleared = $elemsnr->remove_custom_tags( $elementor_data, $settings );
			$elemsnr->update_postmeta( $current_post_id, $elementor_data_cleared );

			// Highlight all the searched/found terms.
			$elementor_data_highlight = $elemsnr->add_custom_tags( $elementor_data_cleared, $settings, false, false );
			$elemsnr->update_postmeta( $current_post_id, $elementor_data_highlight );

			// Count search phrase occurrences.
			$search_occurrences = $elemsnr->count_search_occurrences(
				$elementor_data_highlight,
				array_merge( $settings, array( 'count' => true ) ),
			);

			if ( $search_occurrences > 0 ) {
				$post_counter++;
				$search_occurrences_counter += $search_occurrences;

				$elementor_post_results[ $post_type ][ $current_post_id ] = array(
					'search_occurrences' => $search_occurrences,
					'preview_link'       => esc_url( get_permalink( $current_post_id ) ),
				);

				// Replace the searched and found terms.
				$elementor_data_new = $elemsnr->do_search_and_replace( $elementor_data_highlight, $settings, false, false );

				// Clean up all the custom tags from _elementor_data.
				$elementor_data_cleared = $elemsnr->remove_custom_tags( $elementor_data_new, $settings );
				$elemsnr->update_postmeta( $current_post_id, $elementor_data_cleared );
			} else {
				// Clean up all the custom tags from _elementor_data.
				$elementor_data_cleared = $elemsnr->remove_custom_tags( $elementor_data_highlight, $settings );
				$elemsnr->update_postmeta( $current_post_id, $elementor_data_cleared );
			}
		}
	}

	if ( 0 === $search_occurrences_counter ) {
		$search_phrase = stripslashes( $search_phrase );

		$elemsnr_admin->print_json_message(
			0,
			/* translators: %1$s is replaced with "search phrase" */
			__( 'No results found for %1$s!', 'search-replace-for-elementor-pro' ),
			array( '<strong>' . $search_phrase . '</strong>' )
		);
	}

	if ( $post_counter && $search_occurrences_counter ) {
		$search_phrase       = stripslashes( $search_phrase );
		$replace_with_phrase = stripslashes( $replace_with_phrase );

		echo wp_json_encode(
			array(
				array(
					'status'  => 1,
					'message' => "<strong id=\"elemsnr-undo-search-phrase\">{$search_phrase}</strong> as replaced with <strong id=\"elemsnr-undo-replace-with-phrase\">{$replace_with_phrase}</strong> in total of <strong>{$search_occurrences_counter}</strong> time(s) within <strong>{$post_counter}</strong> post(s).",
					'output'  => wp_json_encode( $elementor_post_results ),
				),
			),
		);

		exit;

		// $elemsnr_admin->print_json_message(
		// 	1,
		// 	/* translators: %1$s is replaced with "search phrase" */
		// 	/* translators: %2$s is replaced with "replace phrase" */
		// 	/* translators: %3$s is replaced with "search_occurrences_counter" */
		// 	/* translators: %4$s is replaced with "post counter" */
		// 	__( '%1$s was replaced with %2$s %3$s time(s) in %4$s post(s).', 'search-replace-for-elementor-pro' ),
		// 	array(
		// 		"<strong id=\"elemsnr-undo-search-phrase\">{$search_phrase}</strong>",
		// 		"<strong id=\"elemsnr-undo-replace-with-phrase\">{$replace_with_phrase}</strong>",
		// 		'<strong>' . $search_occurrences_counter . '</strong>',
		// 		'<strong>' . $post_counter . '</strong>',
		// 	)
		// );
	}
}

add_action( 'wp_ajax_elemsnr_bulk_search_replace', __NAMESPACE__ . '\elemsnr_bulk_search_replace' );

/**
 * [AJAX] Bulk search clear highlight tags.
 */
function elemsnr_bulk_remove_custom_tags() {
	$elemsnr       = new Elementor_Search_Replace();
	$elemsnr_admin = new ELEMSNR_Admin();

	$elemsnr_admin->get_invalid_nonce_token();
	$elemsnr_admin->get_invalid_user_cap();

	$elementor_post_ids = isset( $_REQUEST['elementor_post_ids'] ) ? $_REQUEST['elementor_post_ids'] : ''; // phpcs:ignore WordPress.Security.ValidatedSanitizedInput.MissingUnslash, WordPress.Security.ValidatedSanitizedInput.InputNotSanitized	

	$settings = array(
		'search_phrase'       => false,
		'replace_with_phrase' => false,
		'highlight'           => false,
		'is_text_only'        => false,
		'is_case_sensitive'   => false,
		'is_links'            => false,
		'is_images'           => false,
		'count'               => false,
	);

	if ( empty( $elementor_post_ids ) ) {
		$elemsnr_admin->print_json_message(
			0,
			__( 'You must select at least one page or post to execute the search and replace.', 'search-replace-for-elementor-pro' )
		);
	}

	foreach ( $elementor_post_ids as $post_type => $post_types ) {
		foreach ( $post_types as $current_post_id ) {

			$current_post_data = get_post_meta( $current_post_id, '_elementor_data', true );
			$elementor_data    = json_decode( $current_post_data, true );

			$elementor_data_cleared = $elemsnr->remove_custom_tags( $elementor_data, $settings );
			$elemsnr->update_postmeta( $current_post_id, $elementor_data_cleared );
		}
	}

	$elemsnr_admin->print_json_message(
		1,
		__( 'All custom HTML tags have been removed successfully!', 'search-replace-for-elementor-pro' )
	);
}

add_action( 'wp_ajax_elemsnr_bulk_remove_custom_tags', __NAMESPACE__ . '\elemsnr_bulk_remove_custom_tags' );
