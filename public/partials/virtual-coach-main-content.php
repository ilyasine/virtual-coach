<?php

/**
 * Provide a public-facing view for the plugin
 *
 * This file is used to markup the public-facing aspects of the plugin.
 *
 * @link       https://labgenz.com/
 * @since      1.0.0
 *
 * @package    Virtual_Coach
 * @subpackage Virtual_Coach/public/partials
 */

    //Default Template
    $args = array();

    Virtual_Coach_Utils::get_vc_template_part( $plugin_name . '-my-clear-picture', $args, 'public', '/partials/section', true );

?>