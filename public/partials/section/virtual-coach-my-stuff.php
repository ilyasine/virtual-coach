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
 * @subpackage Virtual_Coach/public/partials/sections/
 */

 $coach_id = Virtual_Coach_Utils::get_current_user_virtual_coach();
 $coach_gender = Virtual_Coach_Utils::get_coach_gender($coach_id);
 $stuff_items = array(
    'my-clear-picture' => __('My Clear Picture', $plugin_name),
    'my-goals' => __('My Goals', $plugin_name),
    'my-people' => __('My People', $plugin_name),
    'my-on-track-thinking' => __('My On-Track Thinking', $plugin_name),
    'my-on-track-action-plan' => __('My On-Track Action Plan', $plugin_name),
    'my-safety-plans' => __('My Safety Plans', $plugin_name),
    'my-new-me-actvities' => __('My New-Me Activities', $plugin_name),
    'my-skills-posters' => __('My Skills Posters', $plugin_name),
    'my-mountain-pose' => __('My Mountain', $plugin_name),
 )
?>

<div class="vc-my-stuff">
 
 <div class="vc-section-content-header">
  <div class="vc-sch-text">
   <div class="vc-sch-text-top"><?php _e('My Stuff',  $plugin_name) ?></div>
   <div class="vc-sch-text-bottom">
    <?php _e('Add items to your My Stuff pages by tapping the buttons below. Do a Check -In with your coach by tapping the Start Check-In button. Change your coach by tapping the Change Coach button.', $plugin_name) ?>
    <i data-gender="<?php echo esc_attr($coach_gender); ?>" class="vc-icon-volume-up speak"></i>
    </div>
  </div>  
 </div>
 
 <div class="vc-section-content-body">
   <?php foreach ($stuff_items as $key => $value) { ?>
    <div class="vc-mcp-bloc" data-id="<?php echo esc_attr($key) ?>">
        <div class="vc-mcp-bloc-image"><img src="<?php echo esc_attr (VIRTUAL_COACH_IMG . $key . '.webp') ?>"></div>
        <div class="vc-mcp-bloc-title"><?php _e($value,  $plugin_name) ?></div>
    </div>
   <?php } ?> 
 </div>
 
</div>