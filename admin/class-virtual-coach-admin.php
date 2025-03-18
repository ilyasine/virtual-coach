<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://labgenz.com/
 * @since      1.0.0
 *
 * @package    Virtual_Coach
 * @subpackage Virtual_Coach/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Virtual_Coach
 * @subpackage Virtual_Coach/admin
 * @author     yassine <yassine@labgenz.com>
 */
class Virtual_Coach_Admin {

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
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/virtual-coach-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		
		wp_enqueue_script( $this->plugin_name . '-admin', plugin_dir_url( __FILE__ ) . 'js/virtual-coach-admin.js', array( 'jquery' ), $this->version, false );
		//localize the script
		$virtual_coach_data = array(
			'nonce' => wp_create_nonce( $this->plugin_name . '-nonce' ),
			'ajaxurl'  => admin_url( 'admin-ajax.php' ),
			'select_video'  => __('Select Video', $this->plugin_name),
			'use_video'  => __('Use Video', $this->plugin_name),
			'select_audio'  => __('Select Audio', $this->plugin_name),
			'use_audio'  => __('Use Audio', $this->plugin_name),
		  );
		// Localize the script with virtual_coach_data
		wp_localize_script( $this->plugin_name . '-admin', 'virtual_coach_data', $virtual_coach_data );
		
	}

	/**
	 * Register the virtual_coach post type.
	 *
	 * @since    1.0.0
	 */
	public function register_virtual_coach_post_type() {
        register_post_type('virtual_coach', [
            'labels' => [
                'name' => __('Virtual Coaches', $this->plugin_name),
                'singular_name' => __('Virtual Coach', $this->plugin_name),
                'add_new' => __('Add New', $this->plugin_name),
                'add_new_item' => __('Add New Virtual Coach', $this->plugin_name),
                'edit_item' => __('Edit Virtual Coach', $this->plugin_name),
                'new_item' => __('New Virtual Coach', $this->plugin_name),
                'view_item' => __('View Virtual Coach', $this->plugin_name),
                'all_items' => __('All Virtual Coaches', $this->plugin_name),
				'featured_image' => __('Virtual Coach Avatar', $this->plugin_name),
				'set_featured_image' => __('Set Virtual Coach Avatar', $this->plugin_name),
				'remove_featured_image' => __('Remove Virtual Coach Avatar', $this->plugin_name),
				'use_featured_image' => __('Use as Virtual Coach Avatar', $this->plugin_name),
            ],
            'public' => false,
            'show_ui' => true,
            'supports' => ['title', 'thumbnail'],
            'menu_position' => 1,
            'menu_icon' => 'dashicons-admin-users',
        ]);
    }

	/**
	 * Register the virtual_coach video meta box.
	 *
	 * @since    1.0.0
	 */
    public function register_meta_box() {
	 
		// Add the video meta box
		add_meta_box(
			'virtual_coach_video_meta',
			__('Virtual Coach Video', 'virtual-coach'),
			[$this, 'render_video_meta_box'],
			'virtual_coach',
			'side',
			'default'
		);

		// Add the gender meta box
		add_meta_box(
			'virtual_coach_gender_meta',
			__('Coach Gender', 'virtual-coach'),
			[$this, 'render_gender_meta_box'],
			'virtual_coach',
			'side',
			'default'
		);
	
		// Add the welcome audio meta box
		add_meta_box(
			'virtual_coach_welcome_audio_meta',
			__('Virtual Coach Welcome Audio', 'virtual-coach'),
			[$this, 'render_audio_meta_box'],
			'virtual_coach',
			'side',
			'default'
		);
    }

	/**
	 * Register the virtual_coach Avatar title.
	 *
	 * @since    1.0.0
	 */
	public function modify_featured_image_title($title) {
        $screen = get_current_screen();
        if ($screen->post_type === 'virtual_coach') {
            $title = __('Virtual Coach Avatar', 'virtual-coach');
        }
        return $title;
    }

	/**
	 * Render the virtual_coach video meta box.
	 *
	 * @since    1.0.0
	 */
    public function render_video_meta_box($post) {
        wp_nonce_field('virtual_coach_video_meta_nonce', 'virtual_coach_video_meta_nonce');
		$args = [
			'video_url' => get_post_meta($post->ID, 'virtual_coach_video', true),
			'plugin_name' => $this->plugin_name,
		];
		Virtual_Coach_Utils::get_vc_template_part( 'virtual-coach-video-metabox-display', $args	, 'admin', '/partials', true );
	
	}

	/**
	 * Render the virtual_coach audio meta box.
	 *
	 * @since    1.0.0
	 */
    public function render_audio_meta_box($post) {
        wp_nonce_field('virtual_coach_audio_meta_nonce', 'virtual_coach_audio_meta_nonce');
		$args = [
			'audio_url' => get_post_meta($post->ID, 'virtual_coach_audio', true),
			'plugin_name' => $this->plugin_name,
		];
		Virtual_Coach_Utils::get_vc_template_part( $this->plugin_name . '-audio-metabox-display', $args	, 'admin', '/partials', true );
	
	}

	/**
	 * Render the virtual_coach gender meta box.
	 *
	 * @since    1.0.0
	 */
    public function render_gender_meta_box($post) {
        wp_nonce_field('virtual_coach_gender_meta_nonce', 'virtual_coach_gender_meta_nonce');
		$args = [
			'gender' => get_post_meta($post->ID, 'virtual_coach_gender', true),
			'plugin_name' => $this->plugin_name,
		];
		Virtual_Coach_Utils::get_vc_template_part( $this->plugin_name . '-gender-metabox-display', $args, 'admin', '/partials', true );
	
	}

    public function save_virtual_coach_meta($post_id) {
        if (!isset($_POST['virtual_coach_video_meta_nonce']) || !wp_verify_nonce($_POST['virtual_coach_video_meta_nonce'], 'virtual_coach_video_meta_nonce')) {
            return;
        }

        if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
            return;
        }

        if (isset($_POST['virtual_coach_video'])) {
            update_post_meta($post_id, 'virtual_coach_video', esc_url_raw($_POST['virtual_coach_video']));
        }

        if (isset($_POST['virtual_coach_gender'])) {
            update_post_meta($post_id, 'virtual_coach_gender', sanitize_text_field($_POST['virtual_coach_gender']));
        }

        if (isset($_POST['virtual_coach_audio'])) {
            update_post_meta($post_id, 'virtual_coach_audio', esc_url_raw($_POST['virtual_coach_audio']));
        }
    }

}
