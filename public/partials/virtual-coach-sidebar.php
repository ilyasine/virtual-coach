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
?>


<div class="vc-sidebar-header">
 <div class="vc-sidebar-logo">
  <img src="<?php echo wp_get_attachment_url(2114); ?>" alt="Virtual Coach">
 </div>
</div>
 
<div class="vc-sidebar-menu">
 <ul>
  <li role="tab" data-id="my-stuff"><?php _e('My Stuff', $plugin_name) ?></li>
  <li role="tab" data-id="my-clear-picture"><?php _e('My Clear Picture', $plugin_name) ?></li>
  <li role="tab" data-id="my-goals"><?php _e('My Goals', $plugin_name) ?></li>
  <li role="tab" data-id="my-people"><?php _e('My People', $plugin_name) ?></li>
  <li role="tab" data-id="my-on-track-thinking"><?php _e('My On-Track Thinking', $plugin_name) ?></li>
  <li role="tab" data-id="my-on-track-action-plan"><?php _e('My On-Track Action Plan', $plugin_name) ?></li>
  <li role="tab" data-id="my-safety-plans"><?php _e('My Safety Plans', $plugin_name) ?></li>
  <li role="tab" data-id="my-new-me-activities"><?php _e('My New-Me Activities', $plugin_name) ?></li> 
  <li role="tab" data-id="my-skills-posters"><?php _e('My Skills Posters', $plugin_name) ?></li>
  <li role="tab" data-id="my-mountain-pose"><?php _e('My Mountain Pose', $plugin_name) ?></li>
 </ul>
 <ul>
  <li role="tab" id="get-help"><?php _e('Get Help', $plugin_name) ?></li>
  <li id="restart-everything"><?php _e('Restart Everything !', $plugin_name) ?></li>
 </ul>
</div>
 
