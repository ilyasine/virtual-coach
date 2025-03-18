<?php

/**
 * The file that defines the core plugin class
 *
 * A class definition that includes attributes and functions used across both the
 * public-facing side of the site and the admin area.
 *
 * @link       https://labgenz.com/
 * @since      1.0.0
 *
 * @package    Virtual_Coach
 * @subpackage Virtual_Coach/includes
 */

/**
 * The core plugin class.
 *
 * This is used to define internationalization, admin-specific hooks, and
 * public-facing site hooks.
 *
 * Also maintains the unique identifier of this plugin as well as the current
 * version of the plugin.
 *
 * @since      1.0.0
 * @package    Virtual_Coach
 * @subpackage Virtual_Coach/includes
 * @author     yassine <yassine@labgenz.com>
 */
class Virtual_Coach {

	/**
	 * The loader that's responsible for maintaining and registering all hooks that power
	 * the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      Virtual_Coach_Loader    $loader    Maintains and registers all hooks for the plugin.
	 */
	protected $loader;

	/**
	 * The unique identifier of this plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string    $plugin_name    The string used to uniquely identify this plugin.
	 */
	protected $plugin_name;

	/**
	 * The current version of the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string    $version    The current version of the plugin.
	 */
	protected $version;

	/**
	 * Define the core functionality of the plugin.
	 *
	 * Set the plugin name and the plugin version that can be used throughout the plugin.
	 * Load the dependencies, define the locale, and set the hooks for the admin area and
	 * the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function __construct() {
		if ( defined( 'VIRTUAL_COACH_VERSION' ) ) {
			$this->version = VIRTUAL_COACH_VERSION;
		} else {
			$this->version = '1.0.0';
		}
		$this->plugin_name = 'virtual-coach';

		$this->load_dependencies();
		$this->set_locale();
		$this->define_admin_hooks();
		$this->define_public_hooks();
		$this->define_ajax_hooks();
		$this->define_constants();

	}

	/**
	 * Define constants for the plugin
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function define_constants() {

		// Plugin url
		if ( ! defined( 'VIRTUAL_COACH_PLUGIN_URL' ) ) {
			define( 'VIRTUAL_COACH_PLUGIN_URL', plugins_url( $this->plugin_name . '/', ) );
		}

		// Plugin directory path
		if ( ! defined( 'VIRTUAL_COACH_PLUGIN_DIR' ) ) {
			define( 'VIRTUAL_COACH_PLUGIN_DIR', plugin_dir_path( dirname( __FILE__ ) ) );
		}

		// Icons Path 
		if ( ! defined( 'VIRTUAL_COACH_ICON' ) ) {
			define( 'VIRTUAL_COACH_ICON', VIRTUAL_COACH_PLUGIN_URL . 'public/icons/' );
		}
		
		// Image Path 
		if ( ! defined( 'VIRTUAL_COACH_IMG' ) ) {
			define( 'VIRTUAL_COACH_IMG', VIRTUAL_COACH_PLUGIN_URL . 'public/img/' );
		}

		// Template Path 
		if ( ! defined( 'VIRTUAL_COACH_TEMPLATE' ) ) {
			define( 'VIRTUAL_COACH_TEMPLATE', VIRTUAL_COACH_PLUGIN_DIR . 'public/partials/' );
		}

		// Avatars Path 
		if ( ! defined( 'VIRTUAL_COACH_AVATAR' ) ) {
			define( 'VIRTUAL_COACH_AVATAR', VIRTUAL_COACH_PLUGIN_URL . 'avatars/' );
		}

		// Options Path 
		if ( ! defined( 'VIRTUAL_COACH_OPTION' ) ) {
			define( 'VIRTUAL_COACH_OPTION', VIRTUAL_COACH_PLUGIN_URL . 'public/options/' );
		}

	}

	/**
	 * Load the required dependencies for this plugin.
	 *
	 * Include the following files that make up the plugin:
	 *
	 * - Virtual_Coach_Loader. Orchestrates the hooks of the plugin.
	 * - Virtual_Coach_i18n. Defines internationalization functionality.
	 * - Virtual_Coach_Admin. Defines all hooks for the admin area.
	 * - Virtual_Coach_Public. Defines all hooks for the public side of the site.
	 *
	 * Create an instance of the loader which will be used to register the hooks
	 * with WordPress.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function load_dependencies() {

		/**
		 * The class responsible for orchestrating the actions and filters of the
		 * core plugin.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-virtual-coach-loader.php';

		/**
		 * The class responsible for defining all utility functions used within the plugin
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-virtual-coach-utils.php';

		/**
		 * The class responsible for defining all ajax callback functions used within the plugin
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-virtual-coach-ajax.php';

		/**
		 * The class responsible for defining internationalization functionality
		 * of the plugin.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-virtual-coach-i18n.php';

		/**
		 * The class responsible for defining all actions that occur in the admin area.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-virtual-coach-admin.php';

		/**
		 * The class responsible for defining all actions that occur in the public-facing
		 * side of the site.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'public/class-virtual-coach-public.php';

		$this->loader = new Virtual_Coach_Loader();

	}

	/**
	 * Define the locale for this plugin for internationalization.
	 *
	 * Uses the Virtual_Coach_i18n class in order to set the domain and to register the hook
	 * with WordPress.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function set_locale() {

		$plugin_i18n = new Virtual_Coach_i18n();

		$this->loader->add_action( 'plugins_loaded', $plugin_i18n, 'load_plugin_textdomain' );

	}

	/**
	 * Register all of the hooks related to the admin area functionality
	 * of the plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function define_admin_hooks() {

		$plugin_admin = new Virtual_Coach_Admin( $this->get_plugin_name(), $this->get_version() );

		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_styles' );
		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_scripts' );
		$this->loader->add_action( 'init', $plugin_admin, 'register_virtual_coach_post_type' );
		$this->loader->add_action( 'add_meta_boxes', $plugin_admin, 'register_meta_box' );
		$this->loader->add_action( 'save_post_virtual_coach', $plugin_admin, 'save_virtual_coach_meta' );
		$this->loader->add_filter( 'post_thumbnail_meta_box_title', $plugin_admin, 'modify_featured_image_title', 99999 );

	}

	/**
	 * Register all of the hooks related to the public-facing functionality
	 * of the plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function define_public_hooks() {

		$plugin_public = new Virtual_Coach_Public( $this->get_plugin_name(), $this->get_version() );

		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_styles' );
		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'load_scripts' );
		$this->loader->add_shortcode( 'virtual_coach', $plugin_public, 'virtual_coach_shortcode' );
		$this->loader->add_action( 'wp_footer', $plugin_public, 'virtual_coach_global_popup' ); //global popup
		$this->loader->add_action( 'template_redirect', $plugin_public, 'handle_virtual_coach_redirect' );
	}

	/**
	 * Register all AJAX callback functions of the plugin dynamically.
	 *
	 * @since 1.0.0
	 * @access private
	 */
	private function define_ajax_hooks() {
		$plugin_ajax = new Virtual_Coach_Ajax($this->get_plugin_name(), $this->get_version());

		// List of AJAX actions (action name => method name)
		$ajax_actions = [
			'load_section_content_view',
			'save_coach_avatar',
			'load_coaching_session_popup'

		];

		// Register each AJAX action dynamically
		foreach ($ajax_actions as $action_name) {
			$this->register_ajax_action($action_name, $plugin_ajax);
		}
	}

	/**
	 * Utility function to register an AJAX action.
	 *
	 * @param string $action_name The name of the AJAX action.
	 * @param object $handler_instance The instance containing the callback method.
	 */
	private function register_ajax_action($action_name, $handler_instance) {
		$callback_method = $action_name . '_callback';

		// Register for logged-in users
		$this->loader->add_action('wp_ajax_' . $action_name, $handler_instance, $callback_method);

		// Register for logged-out users (optional, if applicable)
		//$this->loader->add_action('wp_ajax_nopriv_' . $action_name, $handler_instance, $callback_method);
	}

	/**
	 * Run the loader to execute all of the hooks with WordPress.
	 *
	 * @since    1.0.0
	 */
	public function run() {
		$this->loader->run();
	}

	/**
	 * The name of the plugin used to uniquely identify it within the context of
	 * WordPress and to define internationalization functionality.
	 *
	 * @since     1.0.0
	 * @return    string    The name of the plugin.
	 */
	public function get_plugin_name() {
		return $this->plugin_name;
	}

	/**
	 * The reference to the class that orchestrates the hooks with the plugin.
	 *
	 * @since     1.0.0
	 * @return    Virtual_Coach_Loader    Orchestrates the hooks of the plugin.
	 */
	public function get_loader() {
		return $this->loader;
	}

	/**
	 * Retrieve the version number of the plugin.
	 *
	 * @since     1.0.0
	 * @return    string    The version number of the plugin.
	 */
	public function get_version() {
		return $this->version;
	}

}
