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

<div class="vc-my-mountain-pose">
 
 <div class="vc-section-content-header">
  <div class="vc-sch-text">
   <div class="vc-sch-text-top"><?php _e('My Mountain Pose',  $plugin_name) ?></div>
   <div class="vc-sch-text-bottom"><?php _e('My Mountain Pose', $plugin_name) ?><i data-gender="<?php echo esc_attr($coach_gender); ?>" class="vc-icon-volume-up speak"></i></div>
  </div>
 </div>
 
 <div class="vc-section-content-body">
  
  <div class="vc-video-bloc">
   <iframe width="1080" height="610" src="https://www.youtube.com/embed/UZ1Lq89B3SA?si=e3bDa-y0Ev9UDigX" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
  </div>
  
 </div>
 
</div>