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


 $coach_name = Virtual_Coach_Utils::get_virtual_coach_name($coach_id);
 $coach_avatar = Virtual_Coach_Utils::get_virtual_coach_featured_image($coach_id);
 $coach_video = Virtual_Coach_Utils::get_virtual_coach_video($coach_id);
 $coach_gender = Virtual_Coach_Utils::get_coach_gender($coach_id);
 
?>


<div class="vc-coaching-session-hero">
 <div class="vc-hero">
  <img src="<?php echo esc_attr($coach_avatar); ?>" alt="<?php echo esc_attr($coach_name); ?>">
 </div>
 <div class="vc-hero-desc">
  <div class="vc-hero-name"><?php echo esc_html($coach_name); ?></div>
  <div class="vc-hero-text"><?php _e('Would you like to do a skills check-in ?', $plugin_name); ?></div>
  <div data-src="#coaching-sessions-popup" id="start-coaching-sessions" class="vc-hero-button"><?php _e('Start Coaching Sessions', $plugin_name); ?></div>
 </div>
 <div class="vc-hero-buttons-container">
   <!-- <button data-speak="
      <?php _e('Add items to your My Stuff pages by tapping the buttons below. Do a Check -In with your coach by tapping the Start Check-In button. Change your coach by tapping the Change Coach button.', $plugin_name);
      ?>" 
      data-gender="<?php echo esc_attr($coach_gender); ?>"
      class="info-btn vc-button speak-btn">
      <?php _e('Info', $plugin_name); ?>
   </button> -->
   <button id="help" class="vc-button"><?php _e('Help', $plugin_name); ?></button>
   <button data-src="#vc-avatar-popup" id="customize-avatar" class="vc-costum-avatar-button vc-button button"><?php _e('Change Coach', $plugin_name); ?></button>
 </div>
 

</div>