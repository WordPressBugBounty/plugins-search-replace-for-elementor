<?php
/**
 * [Short Description]
 *
 * @package    DEVRY\ELEMSNR
 * @copyright  Copyright (c) 2025, Developry Ltd.
 * @license    https://www.gnu.org/licenses/gpl-3.0.html GNU Public License
 * @since      1.5
 */

namespace DEVRY\ELEMSNR;

! defined( ABSPATH ) || exit; // Exit if accessed directly.

$elemsnr       = new Elementor_Search_Replace();
$elemsnr_admin = new ELEMSNR_Admin();

$has_user_cap = $elemsnr_admin->check_user_cap();

?>
<div class="elemsnr-admin">
	<div class="elemsnr-container">
		<div class="elemsnr-loading-bar"></div>
		<div id="elemsnr-output" class="notice is-dismissible elemsnr-output"></div>
		<?php settings_errors( 'elemsnr_settings_errors' ); ?>
		<div class="elemsnr-pro">
			<h4>
				<?php echo esc_html__( 'Get the PRO version today!', 'search-replace-for-elementor' ); ?>
			</h4>
			<p>
				<?php echo esc_html__( 'The PRO version will unlock more features, better performance, and a faster search & replace process in bulk.', 'search-replace-for-elementor' ); ?>
			</p>
			<table>
				<tr>
					<th><?php echo esc_html__( 'Feature', 'search-replace-for-elementor' ); ?></th>
					<th><?php echo esc_html__( 'Free', 'search-replace-for-elementor' ); ?></th>
					<th><?php echo esc_html__( 'PRO', 'search-replace-for-elementor' ); ?></th>
				</tr>
				<tr>
					<td><?php echo esc_html__( 'Elementor editor toolbar support', 'search-replace-for-elementor' ); ?></td>
					<td><?php echo esc_html__( 'yes', 'search-replace-for-elementor' ); ?></td>
					<td><?php echo esc_html__( 'yes', 'search-replace-for-elementor' ); ?></td>
				</tr>
				<tr>
					<td><?php echo esc_html__( 'Raw data size limit', 'search-replace-for-elementor' ); ?></td>
					<td><?php echo esc_html__( '300kb', 'search-replace-for-elementor' ); ?></td>
					<td><?php echo esc_html__( '10,240kb', 'search-replace-for-elementor' ); ?></td>
				</tr>
				<tr>
					<td><?php echo esc_html__( 'Page-by-page search and replace', 'search-replace-for-elementor' ); ?></td>
					<td><?php echo esc_html__( 'yes', 'search-replace-for-elementor' ); ?></td>
					<td><?php echo esc_html__( 'yes', 'search-replace-for-elementor' ); ?></td>
				</tr>
				<tr>
					<td><?php echo esc_html__( 'Bulk/Mass search and replace', 'search-replace-for-elementor' ); ?></td>
					<td><?php echo esc_html__( 'limited', 'search-replace-for-elementor' ); ?></td>
					<td><?php echo esc_html__( 'yes', 'search-replace-for-elementor' ); ?></td>
				</tr>
				<tr>
					<td><?php echo esc_html__( 'Third-party add-ons support', 'search-replace-for-elementor' ); ?></td>
					<td><?php echo esc_html__( 'no', 'search-replace-for-elementor' ); ?></td>
					<td><?php echo esc_html__( 'yes', 'search-replace-for-elementor' ); ?></td>
				</tr>
				<tr>
					<td><?php echo esc_html__( 'Backup your uploads folder', 'search-replace-for-elementor' ); ?></td>
					<td><?php echo esc_html__( 'no', 'search-replace-for-elementor' ); ?></td>
					<td><?php echo esc_html__( 'yes', 'search-replace-for-elementor' ); ?></td>
				</tr>
				<tr>
					<td><?php echo esc_html__( 'Search by field keys or widgets', 'search-replace-for-elementor' ); ?></td>
					<td><?php echo esc_html__( 'no', 'search-replace-for-elementor' ); ?></td>
					<td><?php echo esc_html__( 'yes', 'search-replace-for-elementor' ); ?></td>
				</tr>
				<tr>
					<td><?php echo esc_html__( 'Unfiltered/Partial URLs', 'search-replace-for-elementor' ); ?></td>
					<td><?php echo esc_html__( 'no', 'search-replace-for-elementor' ); ?></td>
					<td><?php echo esc_html__( 'yes', 'search-replace-for-elementor' ); ?></td>
				</tr>
				<tr>
					<td><?php echo esc_html__( 'Database backup and import', 'search-replace-for-elementor' ); ?></td>
					<td><?php echo esc_html__( 'no', 'search-replace-for-elementor' ); ?></td>
					<td><?php echo esc_html__( 'yes', 'search-replace-for-elementor' ); ?></td>
				</tr>
				<tr>
					<td><?php echo esc_html__( 'HTML RegEx requests', 'search-replace-for-elementor' ); ?></td>
					<td><?php echo esc_html__( '10 per hour	', 'search-replace-for-elementor' ); ?></td>
					<td><?php echo esc_html__( 'unlimited', 'search-replace-for-elementor' ); ?></td>
				</tr>
				<tr>
					<td><?php echo esc_html__( 'Priority email support', 'search-replace-for-elementor' ); ?></td>
					<td><?php echo esc_html__( 'no', 'search-replace-for-elementor' ); ?></td>
					<td><?php echo esc_html__( 'yes', 'search-replace-for-elementor' ); ?></td>
				</tr>
				<tr>
					<td><?php echo esc_html__( 'Regular plugin updates', 'search-replace-for-elementor' ); ?></td>
					<td><?php echo esc_html__( 'delayed', 'search-replace-for-elementor' ); ?></td>
					<td><?php echo esc_html__( 'priority', 'search-replace-for-elementor' ); ?></td>
				</tr>
			</table>
			<p class="button-group">
				<a
					class="button button-primary button-pro"
					href="https://searchreplaceplugin.com/?utm_source=elemsnr&utm_medium=free_plugin&utm_campaign=pro_table_button"
					target="_blank"
				>
					<?php echo esc_html__( 'GET PRO VERSION', 'search-replace-for-elementor' ); ?>
				</a>
				<a
					class="button button-primary button-watch-video"
					href="https://www.youtube.com/watch?v=I6duntBqhDA"
					target="_blank"
				>
					<?php echo esc_html__( 'Watch Video', 'search-replace-for-elementor' ); ?>
				</a>
			</p>
			<p>&nbsp;</p>
			<p>
				<?php
				printf(
					/* translators: %1$s is replaced with "Need to perform bulk or mass search and replace?" */
					/* translators: %2$s is replaced with "Get the PRO version now" */
					wp_kses( '%1$s %2$s!', 'search-replace-for-elementor', json_decode( ELEMSNR_PLUGIN_ALLOWED_HTML_ARR, true ) ),
					'<em>' . esc_html__( 'Need to perform full bulk or mass search and replace?', 'search-replace-for-elementor' ) . '</em>',
					'<a href="https://searchreplaceplugin.com/?utm_source=elemsnr&utm_medium=free_plugin&utm_campaign=pro_table_button" target="_blank"><strong>' . esc_html__( 'Get the PRO version now', 'search-replace-for-elementor' ) . '</strong></a>'
				);
				?>
			</p>
			<p>
				<iframe 
					height="320" 
					src="https://www.youtube.com/embed/I6duntBqhDA" 
					title="Search & Replace for Elementor" 
					frameborder="0" 
					allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" 
					allowfullscreen>
				</iframe>
			</p>
			<div class="feature-screenshots">
				<div>
					<img src="<?php echo esc_url( ELEMSNR_PLUGIN_IMG_URL ); ?>feature-highlight.png" alt="Highlight feature" />
				</div>
				<div>
					<img src="<?php echo esc_url( ELEMSNR_PLUGIN_IMG_URL ); ?>feature-native.png" alt="Native search and replace feature" />
				</div>
			</div>
			<hr />
			<p>
				<?php
				printf(
					/* translators: %1$s is replaced with "Note" */
					wp_kses( '%1$s: Full bulk search and replace for links (URLs), images, case-sensitive filters, backups, and custom options are available only in the PRO version!', 'search-replace-for-elementor', json_decode( ELEMSNR_PLUGIN_ALLOWED_HTML_ARR, true ) ),
					'<strong>' . esc_html__( 'Note', 'search-replace-for-elementor' ) . '</strong>'
				);
				?>
			</p>
		</div>
		<div>
			<p>
				<?php
				printf(
					wp_kses(
						/* translators: %1$s is replaced with "Important" */
						/* translators: %2$s is replaced with "backup your database" */
						/* translators: %2$s is replaced with "dry-run" */
						__( '%1$s: It is strongly recommended to %2$s before performing bulk search & replace, especially without the the %3$s option enabled.', 'search-replace-for-elementor' ),
						json_decode( ELEMSNR_PLUGIN_ALLOWED_HTML_ARR )
					),
					'<strong>' . esc_html__( 'Important', 'search-replace-for-elementor' ) . '</strong>',
					'<strong>' . esc_html__( 'backup your database', 'search-replace-for-elementor' ) . '</strong>',
					'<strong>' . esc_html__( 'dry-run', 'search-replace-for-elementor' ) . '</strong>'
				);
				?>
			</p>
			<form id="elemsnr-bulk-search-form" method="post" action="#">
				<input type="hidden" name="page" value="<?php echo esc_attr( ELEMSNR_BULK_SEARCH_SLUG ); ?>" />
				<table class="form-table">
					<tbody>
						<tr>
							<th scope="row">
								<label for="elemsnr-search-phrase">
									<?php echo __( 'HTML RegEx<br />(Experts Only)', 'search-replace-for-elementor' ); ?>
								</label>
								<a href="https://searchreplaceplugin.com/?utm_source=elemsnr&utm_medium=free_plugin&utm_campaign=pro_badge" target="_blank">
									<span class="elemsnr-status-badge elemsnr-status-upgrade">
										<?php echo esc_html__( 'Pro', 'search-replace-for-elementor' ); ?>
									</span>
								</a>
							</th>
							<td>
								<p>
									<input
										type="checkbox"
										class="regular-text"
										id="elemsnr-html-regexp-toggle"
										name="elemsnr-html-regexp-toggle"
										value=""
										disabled
									/>
									<label for="elemsnr-html-regexp-toggle">
										<?php echo esc_html__( 'HTML with RegEx', 'search-replace-for-elementor' ); ?>
									</label>
								</p>
								<p class="description">
									<small>
										<?php echo esc_html__( 'Search and replace HTML in Text Editor widgets using regular expressions.', 'search-replace-for-elementor' ); ?>
									</small>
								</p>
							</td>
						</tr>
						<tr class="elemsnr-dry-run">
							<th scope="row">
								<label for="elemsnr-dry-run">
									<?php echo esc_html__( 'Dry-run', 'search-replace-for-elementor' ); ?>
								</label>
								<a href="https://searchreplaceplugin.com/?utm_source=elemsnr&utm_medium=free_plugin&utm_campaign=pro_badge" target="_blank">
									<span class="elemsnr-status-badge elemsnr-status-upgrade">
										<?php echo esc_html__( 'Pro', 'search-replace-for-elementor' ); ?>
									</span>
								</a>
							</th>
							<td>
								<p>
									<input
										type="radio"
										class="regular-text"
										id="elemsnr-dry-run-no"
										name="elemsnr-dry-run"
										value="no"
										checked
										disabled
									/>
									<label for="elemsnr-dry-run-no">
										<?php echo esc_html__( 'No', 'search-replace-for-elementor' ); ?>
									</label>
								</p>
								<p>
									<input
										type="radio"
										class="regular-text"
										id="elemsnr-dry-run-yes"
										name="elemsnr-dry-run"
										value="yes"
										disabled
									/>
									<label for="elemsnr-dry-run-yes">
										<?php echo esc_html__( 'Yes', 'search-replace-for-elementor' ); ?>
									</label>
								</p>
								<p class="description">
									<small>
										<?php
										printf(
											wp_kses(
												/* translators: %1$s is replaced with "dry-run" */
												__( 'The %1$s default setting can be changed from the %2$s page.', 'search-replace-for-elementor' ),
												json_decode( ELEMSNR_PLUGIN_ALLOWED_HTML_ARR )
											),
											'<strong>' . esc_html__( 'dry-run', 'search-replace-for-elementor' ) . '</strong>',
											'<strong>' . esc_html__( 'Options', 'search-replace-for-elementor' ) . '</strong>'
										);
										?>
									</small>
								</p>
							</td>
						</tr>
						<tr class="elemsnr-text-and-link">
							<th scope="row">
								<?php echo esc_html__( 'Search method', 'search-replace-for-elementor' ); ?>
							</th>
							<td>
								<p>
									<input
										type="radio"
										id="elemsnr-text-only"
										name="elemsnr-text-and-link"
										checked
									/>
									<label for="elemsnr-text-only">
										<?php echo esc_html__( 'Text-only', 'search-replace-for-elementor' ); ?>
									</label>
								</p>
								<p>
									<input
										type="checkbox"
										id="elemsnr-case-sensitive"
										name="elemsnr-case-sensitive"
										disabled
									/>
									<label for="elemsnr-case-sensitive">
										<?php echo esc_html__( 'Case-sensitive search and replace', 'search-replace-for-elementor' ); ?>
									</label>
									<a href="https://searchreplaceplugin.com/?utm_source=elemsnr&utm_medium=free_plugin&utm_campaign=pro_badge" target="_blank">
										<span class="elemsnr-status-badge elemsnr-status-upgrade">
											<?php echo esc_html__( 'Pro', 'search-replace-for-elementor' ); ?>
										</span>
									</a>
								</p>
								<p>
									<input
										type="radio"
										id="elemsnr-links"
										name="elemsnr-text-and-link"
										disabled
									/>
									<label for="elemsnr-links">
										<?php echo esc_html__( 'Links (URLs)', 'search-replace-for-elementor' ); ?>
									</label>
									<a href="https://searchreplaceplugin.com/?utm_source=elemsnr&utm_medium=free_plugin&utm_campaign=pro_badge" target="_blank">
										<span class="elemsnr-status-badge elemsnr-status-upgrade">
											<?php echo esc_html__( 'Pro', 'search-replace-for-elementor' ); ?>
										</span>
									</a>
								</p>
								<p>
									<input
										type="radio"
										id="elemsnr-images"
										name="elemsnr-text-and-link"
										disabled
									/>
									<label for="elemsnr-images">
										<?php echo esc_html__( 'Images', 'search-replace-for-elementor' ); ?>
									</label>
									<a href="https://searchreplaceplugin.com/?utm_source=elemsnr&utm_medium=free_plugin&utm_campaign=pro_badge" target="_blank">
										<span class="elemsnr-status-badge elemsnr-status-upgrade">
											<?php echo esc_html__( 'Pro', 'search-replace-for-elementor' ); ?>
										</span>
									</a>
								</p>
							</td>
						</tr>
						<tr class="elemsnr-post-type">
							<th scope="row">
								<?php echo esc_html__( 'Select post type', 'search-replace-for-elementor' ); ?>
								<a href="https://searchreplaceplugin.com/?utm_source=elemsnr&utm_medium=free_plugin&utm_campaign=pro_badge" target="_blank">
									<span class="elemsnr-status-badge elemsnr-status-upgrade">
										<?php echo esc_html__( 'Pro', 'search-replace-for-elementor' ); ?>
									</span>
								</a>
							</th>
							<td>
								<?php foreach ( $elemsnr->get_post_types() as $post_type ) : ?>
									<p>
										<input
											type="checkbox"
											id="elemsnr-post-type-<?php echo esc_attr( $post_type ); ?>"
											name="elemsnr-post-type[]"
											value="<?php echo esc_attr( $post_type ); ?>"
										/>
										<label for="elemsnr-post-type-<?php echo esc_attr( $post_type ); ?>">
											<?php echo esc_html( get_post_type_object( $post_type )->labels->singular_name ); ?>
										</label>
									</p>
									<div class="elemsnr-scroll-container elemsnr-scroll-container-<?php echo esc_attr( $post_type ); ?>" data-post-type="<?php echo esc_attr( $post_type ); ?>">
										<div class="elemsnr-filters-bar">
											<input
												type="text"
												name="elemsnr-search-posts"
												id="elemsnr-search-posts"
												placeholder="<?php echo esc_html__( 'Search and filter post titles...', 'search-replace-for-elementor' ); ?>"
											/>
											<label for="elemsnr-toggle-posts-<?php echo esc_attr( $post_type ); ?>">
												<input
													type="checkbox"
													name="elemsnr-toggle-posts"
													id="elemsnr-toggle-posts-<?php echo esc_attr( $post_type ); ?>"
												/>
												<?php echo esc_html__( 'Toggle All Posts', 'search-replace-for-elementor' ); ?>
											</label>
										</div>
										<div class="elemsnr-post-type-container">
											<?php elemsnr_show_posts_per_page( $post_type ); ?>
										</div>
									</div>
								<?php endforeach; ?>
								<p class="description">
									<small>
										<?php
										printf(
											/* translators: %1$s is replaced with "custom post types" */
											wp_kses( 'To search and replace %1$s you need the PRO version of the plugin.', 'search-replace-for-elementor', json_decode( ELEMSNR_PLUGIN_ALLOWED_HTML_ARR, true ) ),
											'<strong>' . esc_html__( 'custom post types', 'search-replace-for-elementor' ) . '</strong>'
										);
										?>
									</small>
								</p>
							</td>
						</tr>
						<tr class="elemsnr-search-phrase">
							<th scope="row">
								<label for="elemsnr-search-phrase">
									<?php echo esc_html__( 'Search for', 'search-replace-for-elementor' ); ?>
								</label>
							</th>
							<td>
								<p>
									<input
										type="text"
										class="regular-text"
										id="elemsnr-search-phrase"
										name="elemsnr-search-phrase"
										value=""
										placeholder="Enter your search phrase..."
										minlength="3"
										required
									/>
								</p>
								<p class="description">
									<small>
										<?php echo esc_html__( 'A search phrase is required with a minimum of 3 characters; HTML is not allowed.', 'search-replace-for-elementor' ); ?>
									</small>
								</p>
							</td>
						</tr>
						<!-- Overwrite the styles if dry-run is No (onload). -->
						<tr class="elemsnr-replace-with-phrase">
							<th scope="row">
								<label for="elemsnr-replace-with-phrase">
									<?php echo esc_html__( 'Replace with', 'search-replace-for-elementor' ); ?>
								</label>
							</th>
							<td>
								<p>
									<input
										type="text"
										class="regular-text"
										id="elemsnr-replace-with-phrase"
										name="elemsnr-replace-with-phrase"
										value=""
										placeholder="Enter your replace with phrase..."
										minlength="3"
										required
									/>
								</p>
								<p class="description">
									<small>
										<?php echo esc_html__( 'A replace with phrase is required with a minimum of 3 characters; HTML is not allowed.', 'search-replace-for-elementor' ); ?>
									</small>
								</p>
							</td>
						</tr>
					</tbody>
				</table>
				<p class="submit elemsnr-button-group">
					<button
						type="submit"
						id="elemsnr-replace-button"
						name="elemsnr-replace-button"
						class="button button-primary elemsnr-replace-button"
						<?php if ( ! $has_user_cap ) : ?>
							disabled
						<?php endif; ?>
					>
						<?php echo esc_html__( 'Search & Replace', 'search-replace-for-elementor' ); ?>
					</button>
					<a href="<?php echo esc_url( admin_url( $elemsnr_admin->admin_page . ELEMSNR_BULK_SEARCH_SLUG ) ); ?>"
						id="elemsnr-start-over-button"
						name="elemsnr-start-over-button"
						class="button button-primary elemsnr-start-over-button"
					>
						<?php echo esc_html__( 'Start Over', 'search-replace-for-elementor-pro' ); ?>
					</a>
					<button
						type="submit"
						class="button elemsnr-clear-button elemsnr-dry-run-button"
						id="elemsnr-clear-button"
						name="elemsnr-clear-button"
						<?php if ( ! $has_user_cap ) : ?>
							disabled
						<?php endif; ?>
					>
						<?php echo esc_html__( 'Clear', 'search-replace-for-elementor' ); ?>
					</button>
				</p>
			</form>
			<br clear="all" />
			<hr />
			<p>
				<?php
				printf(
					wp_kses(
						/* translators: %1$s is replaced with "Link to the website" */
						/* translators: %2$s is replaced with "Get PRO Version" */
						__( '• <a href="%1$s" target="_blank">%2$s</a> to use the full-featured bulk/mass search and replace functionality.', 'search-replace-for-elementor' ),
						json_decode( ELEMSNR_PLUGIN_ALLOWED_HTML_ARR )
					),
					esc_url( 'https://searchreplaceplugin.com/?utm_source=elemsnr&utm_medium=free_plugin&utm_campaign=pro_badge' ),
					'<strong>' . esc_html__( 'Get the PRO Version today', 'search-replace-for-elementor' ) . '</strong>'
				);
				?>
				<br />
				<?php
				printf(
					wp_kses(
						/* translators: %1$s is replaced with "Clear" */
						/* translators: %2$s is replaced with "used for highlighting" */
						__( '• The %1$s button removes all custom tags (%2$s) from the selected posts.', 'search-replace-for-elementor' ),
						json_decode( ELEMSNR_PLUGIN_ALLOWED_HTML_ARR )
					),
					'<strong>' . esc_html__( 'Clear', 'search-replace-for-elementor' ) . '</strong>',
					'<em>' . esc_html__( 'used for highlighting', 'search-replace-for-elementor' ) . '</em>'
				);
				?>
			</p>
		</div>
	</div>
</div>
