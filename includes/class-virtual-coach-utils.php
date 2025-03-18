<?php

/**
 *
 * @link       https://labgenz.com/
 * @since      1.0.0
 *
 * @package    Virtual_Coach
 * @subpackage Virtual_Coach/includes
 */

/**
 *
 * This class defines all utility functions .
 *
 * @since      1.0.0
 * @package    Virtual_Coach
 * @subpackage Virtual_Coach/includes
 * @author     yassine <yassine@labgenz.com>
 */
class Virtual_Coach_Utils {

	/**
	 * Load a template part from the plugin partials directory.
	 *
	 * @param string $template_name The name of the template file (without the .php extension).
	 * @param array $args Associative array of arguments to pass to the template.
	 * @return string The output of the template, or an error message if the file is not found.
	 */
	public static function get_vc_template_part($template_name, $args = [], $context = 'admin', $directory = '/partials', $render = false) {		
		$base_path = VIRTUAL_COACH_PLUGIN_DIR . $context . $directory;
		$template_file = $base_path . '/' . $template_name . '.php';

		if (file_exists($template_file)) {
			if (!empty($args) && is_array($args)) {
				extract($args, EXTR_SKIP);
			}

			ob_start();
			include $template_file;
			$output = ob_get_clean();

			//error_log("Template file found: " . $template_file);

			if ($render) {
				echo $output;
				return;
			}

			return $output;
		} else {
			//error_log("Template file not found: " . $template_file);
			return "<!-- Template file {$template_name}.php not found in {$context} directory -->";
		}
	}

	/**
	 * Retrieve all published virtual coach posts.
	 *
	 * This function queries the database for all posts of the 'virtual_coach' post type
	 * that have a status of 'publish'. It returns an array of post objects.
	 *
	 * @since 1.0.0
	 * 
	 * @return array An array of WP_Post objects representing the published virtual coaches.
	 */
	public static function get_registered_virtual_coaches() {
		$args = [
			'post_type' => 'virtual_coach',
			'post_status' => 'publish',
			'numberposts' => -1
		];
		return get_posts($args);
	}

	/**
	 * Retrieve details of all published virtual coaches.
	 *
	 * This function retrieves all published posts of the 'virtual_coach' post type
	 * and returns an array containing the post name, featured image URL, and the
	 * value of the 'virtual_coach_video' meta key for each post.
	 *
	 * @since 1.0.0
	 * 
	 * @return array An array of associative arrays containing virtual coach details:
	 *               - 'name': The post title.
	 *               - 'featured_image': The URL of the featured image.
	 *               - 'video_meta': The value of the 'virtual_coach_video' meta key.
	 */
	public static function get_virtual_coaches_details() {
		$coaches = self::get_registered_virtual_coaches();
		$details = [];

		foreach ($coaches as $coach) {
			$details[] = [
				'ID' => $coach->ID,
				'name' => $coach->post_title,
				'featured_image' => get_the_post_thumbnail_url($coach->ID, 'full'),
				'video_meta' => get_post_meta($coach->ID, 'virtual_coach_video', true),
			];
		}

		return $details;
	}

	/**
	 * Checks if the coach with the given ID is female.
	 *
	 * @param int $coach_id The ID of the coach post.
	 * @return bool True if the coach is female, false otherwise.
	 */
	public static function is_female_coach($coach_id) {
		return self::check_coach_gender_by_id($coach_id, 'female');
	}

	/**
	 * Checks if the coach with the given ID is male.
	 *
	 * @param int $coach_id The ID of the coach post.
	 * @return bool True if the coach is male, false otherwise.
	 */
	public static function is_male_coach($coach_id) {
		return self::check_coach_gender_by_id($coach_id, 'male');
	}

	/**
	 * Checks the gender of the coach by their post ID.
	 *
	 * @param int    $coach_id The ID of the coach post.
	 * @param string $gender   The gender to check for ('male' or 'female').
	 * @return bool True if the coach's gender matches the provided value, false otherwise.
	 */
	private static function check_coach_gender_by_id($coach_id, $gender) {
		// Retrieve the gender meta value for the given coach ID
		$coach_gender = get_post_meta($coach_id, 'virtual_coach_gender', true);

		// Return true if the gender matches the provided value
		return strtolower($coach_gender) === strtolower($gender);
	}

	/**
	 * Checks the gender of the coach by their post ID.
	 *
	 * @param int    $coach_id The ID of the coach post.	
	 * @return string True if the coach's gender matches the provided value, false otherwise.
	 */
	public static function get_coach_gender($coach_id) {
		// Retrieve the gender meta value for the given coach ID
		$coach_gender = get_post_meta($coach_id, 'virtual_coach_gender', true);

		// Return true if the gender matches the provided value
		return strtolower($coach_gender);
	}

	/**
	 * Retrieves the virtual coach ID assigned to a user.
	 *
	 * @param int $user_id The ID of the user.
	 * @return int|null The coach ID if assigned, null otherwise.
	 */
	private static function get_user_virtual_coach($user_id) {
		// Retrieve the coach ID from user meta
		$coach_id = get_user_meta($user_id, 'user_coach', true);

		// Return the coach ID or null if not found
		return !empty($coach_id) ? (int) $coach_id : null;
	}

	/**
	 * Retrieves the virtual coach ID assigned to the current user.
	 *
	 * @return int|null The coach ID for the current user if assigned, null otherwise.
	 */
	public static function get_current_user_virtual_coach() {
		// Get the current user ID
		$current_user_id = get_current_user_id();

		// Return the coach ID for the current user
		return self::get_user_virtual_coach($current_user_id);
	}

	/**
	 * Retrieves the name of the virtual coach by their post ID.
	 *
	 * @param int $coach_id The ID of the coach post.
	 * @return string|null The name of the virtual coach or null if not found.
	 */
	public static function get_virtual_coach_name($coach_id) {
		$post = get_post($coach_id);
		return $post && $post->post_type === 'virtual_coach' ? $post->post_title : null;
	}

	/**
	 * Retrieves the featured image URL of the virtual coach by their post ID.
	 *
	 * @param int $coach_id The ID of the coach post.
	 * @return string|null The URL of the featured image or null if not available.
	 */
	public static function get_virtual_coach_featured_image($coach_id) {
		return get_the_post_thumbnail_url($coach_id, 'full') ?: null;
	}

	/**
	 * Retrieves the video meta value of the virtual coach by their post ID.
	 *
	 * @param int $coach_id The ID of the coach post.
	 * @return string|null The value of the 'virtual_coach_video' meta key or null if not available.
	 */
	public static function get_virtual_coach_video($coach_id) {
		return get_post_meta($coach_id, 'virtual_coach_video', true) ?: null;
	}


}