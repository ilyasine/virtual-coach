<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://labgenz.com/
 * @since      1.0.0
 *
 * @package    Virtual_Coach
 * @subpackage Virtual_Coach/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Virtual_Coach
 * @subpackage Virtual_Coach/public
 * @author     yassine <yassine@labgenz.com>
 */
class Virtual_Coach_Public {

	/**
	 * The unique identifier of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The string used to uniquely identify this plugin.
	 */
	private $plugin_name;

	/**
	 * The unique identifier of this plugin.
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
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {
		// Virtual coach public css	 
		wp_enqueue_style( $this->plugin_name . '-public', plugin_dir_url( __FILE__ ) . 'css/virtual-coach-public.css', array(), $this->version, 'all' );
		// magnific-popup css
		wp_enqueue_style( $this->plugin_name . '-magnific-popup', plugin_dir_url( __FILE__ ) . 'css/magnific-popup.css', array(), $this->version, 'all' );
		// icons css
		wp_enqueue_style( $this->plugin_name . '-icons', plugin_dir_url( __FILE__ ) . 'css/vc-icons.min.css', array(), $this->version, 'all' );
		// global css
		wp_enqueue_style( $this->plugin_name . '-global', plugin_dir_url( __FILE__ ) . 'css/global.css', array(), $this->version, 'all' );

		//For preformance resaons we include dashboard styles and scripts only on virtual coach page
		if(is_page('virtual-coach')){
			wp_enqueue_style( $this->plugin_name . '-dashboard', plugin_dir_url( __FILE__ ) . 'css/dashboard.css', array(), $this->version, 'all' );
		}
	}

	/**
	 * Enqueues a JavaScript file dynamically.
	 *
	 * This function handles the repetitive logic of enqueuing scripts,
	 * ensuring that script handles are dynamically generated and consistent.
	 *
	 * @param string $handle_suffix A unique suffix for the script handle, appended to the plugin name.
	 * @param string $file_path     The relative path to the script file within the plugin directory.
	 * @param array  $dependencies  (Optional) An array of script handles that this script depends on. Default is ['jquery'].
	 * @param bool   $in_footer     (Optional) Whether to load the script in the footer. Default is false.
	 * @return string The generated script handle.
	 */
	private function enqueue_script($handle_suffix, $file_path, $dependencies = array('jquery'), $in_footer = false) {
		wp_enqueue_script('jquery-effects-core');
		wp_enqueue_script('jquery-ui-tabs');
		$handle = $this->plugin_name . '-' . $handle_suffix;
		wp_enqueue_script($handle, plugin_dir_url(__FILE__) . $file_path, $dependencies, $this->version, $in_footer);
		return $handle;
	}

	/**
	 * Loads and enqueues all necessary JavaScript files for the plugin.
	 *
	 * This method is responsible for enqueuing external libraries and internal scripts,
	 * as well as localizing script data for dynamic use in JavaScript.
	 *
	 * @return void
	 */
	public function load_scripts() {
		// Vendors and external libraries js files
		$this->enqueue_script('magnific-popup', 'js/vendors/magnific-popup.min.js');
		$this->enqueue_script('toast', 'js/vendors/toast-message.js');
		$this->enqueue_script('select2', 'js/vendors/select2.full.min.js');

		$sections = array(
			'my-stuff','my-clear-picture', 'my-goals', 
			'my-mountain-pose', 'my-new-me-activities', 
			'my-on-track-action-plan', 'my-on-track-thinking',
			'my-people', 'my-safety-plans', 'my-skills-posters'
		);

		// Internal js files
		$handle_public = $this->enqueue_script( 'public', 'js/virtual-coach-public.js', array('jquery', $this->plugin_name . '-magnific-popup'));
		$this->enqueue_script('choose-virtual-coach', 'js/choose-virtual-coach.js');

		//For preformance resaons we include dashboard styles and scripts only on virtual coach page
		if(is_page('virtual-coach')){
			$handle_dashboard = $this->enqueue_script('dashboard', 'js/'. $this->plugin_name . '-dashboard' . '.js');
			$handle_coaching_session = $this->enqueue_script('coaching-session', 'js/'. $this->plugin_name . '-coaching-session' . '.js');
			foreach ($sections as $section) {
				$this->enqueue_script($this->plugin_name . '-' . $section , 'js/section/' . $this->plugin_name . '-' . $section . '.js', array('jquery', 'jquery-ui-tabs', $this->plugin_name . '-public')								);
			}
		}

		// Localize the script with virtual_coach_data
		$virtual_coach_data = array(
			'nonce'    => wp_create_nonce($this->plugin_name . '-nonce'),
			'ajaxurl'  => admin_url('admin-ajax.php'),
			'option'  => VIRTUAL_COACH_OPTION,
			'img'  => VIRTUAL_COACH_IMG,
		);
		wp_localize_script($handle_public, 'virtual_coach_data', $virtual_coach_data);
		wp_localize_script($handle_dashboard, 'virtual_coach_data', $virtual_coach_data);
		wp_localize_script($handle_coaching_session, 'virtual_coach_data', $virtual_coach_data);
	}


	/**
	 * Shortcode callback function that will generate the content
	 *
	 * @since    1.0.0
	 */
	public function virtual_coach_shortcode() {
		$args = array(
			'plugin_name' => $this->plugin_name
		);
		// Load the public display template file
		$output = Virtual_Coach_Utils::get_vc_template_part( $this->plugin_name . '-public-display', $args, 'public', '/partials', true );

        return $output;
    }

	/**
	 * Render the popup display
	 *
	 * @since    1.0.0
	 */
	public function virtual_coach_global_popup(){
		$coaches = Virtual_Coach_Utils::get_virtual_coaches_details();
		$args = array(
			'coaches' => $coaches,
			'plugin-name' => $this->plugin_name
		);
		Virtual_Coach_Utils::get_vc_template_part( 'popup-avatar-display', $args, 'public', '/partials', true );
	}

	/**
     * Restrict the virtual coach page to only logged in users
	 * 
	 * @since    1.0.0 
     */
    public function handle_virtual_coach_redirect() {
        // Check if the current page is 'virtual-coach'
		if (is_page('virtual-coach') && !is_user_logged_in()) {
            // Get the current page URL
            $current_url = home_url($_SERVER['REQUEST_URI']);
            
            // Redirect to the login page with a 'redirect_to' parameter
            wp_redirect(wp_login_url($current_url));
            exit;
        }
    }

}
