<?php

/**
 * The ajax callback functions of the plugin.
 *
 * @link       https://labgenz.com/
 * @since      1.0.0
 *
 * @package    Virtual_Coach
 * @subpackage Virtual_Coach/ajax
 */

/**
 * The ajax callback functions of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the ajax-facing stylesheet and JavaScript.
 *
 * @package    Virtual_Coach
 * @subpackage Virtual_Coach/ajax
 * @author     yassine <yassine@labgenz.com>
 */
class Virtual_Coach_Ajax {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
     * This function handles the tab click event.
     *
     * Based on the tab ID passed, the appropriate function is called to load the corresponding section
     * content dynamically via AJAX.
     *
     * @since 1.0.0
     */

	public function load_section_content_view_callback() {
		if (isset($_POST['payload']) && $_POST['payload'] == 'load_section_content_view' && isset($_POST['tab_id'])) {
			// Verify the nonce
			check_ajax_referer($this->plugin_name . '-nonce', 'security');
	
			// Sanitize the tab ID
			$tab_id = sanitize_text_field($_POST['tab_id']);

			//error_log('$tab_id : ' . $tab_id);
			//$schools = Financial_Dashboard_Utils::get_all_schools();
			$args = array(
				//'schools' => $schools,
				'plugin-name' => $this->plugin_name
			);
			// Generate the content dynamically based on the tab
			$response = Virtual_Coach_Utils::get_vc_template_part($this->plugin_name . '-' . $tab_id, $args, 'public', '/partials/section', false);
			error_log('$response : ' . $response);
			// Check if the response is valid (if it's a string, this should be fine)
			if ($response) {
				wp_send_json_success($response);
			} else {
				wp_send_json_error('Error loading content for tab: ' . $tab_id);
			}
		} else {
			wp_send_json_error('Invalid request parameters.');
		}
	}

	/**
     * The callback function for save_coach_avatar Action
     *
     * Save the user coach id to user_coach meta
     *
     * @since 1.0.0
     */
	function save_coach_avatar_callback() {
		if (isset($_POST['payload']) && $_POST['payload'] == 'save_coach_avatar_payload' && isset($_POST['coach_id'])) {
		  $coach_id = intval($_POST['coach_id']);
		  $user_id = get_current_user_id();
		  update_user_meta($user_id, 'user_coach', $coach_id);
		  $success_message = __('The virtual Coach has been saved successfully', $this->plugin_name);
		  wp_send_json_success($success_message);
		}
		wp_die();
	}

	/**
     * This function load the content of the coaching session popup dynamically via AJAX.
     *
     * @since 1.0.0
     */

	 public function load_coaching_session_popup_callback() {
		if (isset($_POST['payload']) && $_POST['payload'] == 'load_coaching_session_popup_payload' ) {
			// Verify the nonce
			check_ajax_referer($this->plugin_name . '-nonce', 'security');

			$coach_id = Virtual_Coach_Utils::get_current_user_virtual_coach();
			$coach_video = Virtual_Coach_Utils::get_virtual_coach_video($coach_id);

			$args = array(
				'plugin-name' => $this->plugin_name,
				'coach_video' => $coach_video,
			);
			// Generate the content dynamically based on the tab
			$response = Virtual_Coach_Utils::get_vc_template_part($this->plugin_name . '-coaching-session-popup', $args, 'public', '/partials', false);
			error_log('$response : ' . $response);
			// Check if the response is valid (if it's a string, this should be fine)
			if ($response) {
				wp_send_json_success($response);
			} else {
				wp_send_json_error('Error loading popup content ');
			}
		} else {
			wp_send_json_error('Invalid request parameters.');
		}
	}

}
