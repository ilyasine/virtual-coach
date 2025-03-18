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
?>

<div class="vc-my-clear-picture">
 
 <div class="vc-section-content-header">
  <div class="vc-sch-text">
   <div class="vc-sch-text-top"><?php _e('My Clear Picture',  $plugin_name) ?></div>
   <div class="vc-sch-text-bottom"><?php _e('Tap each of the Clear Picture Do’s and follow the instructions.', $plugin_name) ?><i data-gender="<?php echo esc_attr($coach_gender); ?>" class="vc-icon-volume-up speak"></i></div>
  </div>
  <div data-src="#vc-avatar-popup" id="watch-clear-picture-course" class="vc-sch-button"><i class="vc-icon-play"></i><?php _e('Watch Clear picture Course',  $plugin_name) ?></div>
 </div>
 
 <div class="vc-section-content-body">
  
  <div class="vc-mcp-row">
   
   <div class="vc-mcp-bloc">
    <div class="vc-mcp-bloc-image"><img src="<?php echo esc_attr (VIRTUAL_COACH_IMG . 'notice-my-breath.webp') ?>"></div>
    <div class="vc-mcp-bloc-content">
     <div class="vc-mcp-bloc-title"><?php _e('Notice my Breath',  $plugin_name) ?></div>
     <div class="vc-mcp-bloc-text"><?php _e('Where do I notice my breath? My nose, chest, or belly? What does it feel like? I notice my breath, as it is.',  $plugin_name) ?><i data-gender="<?php echo esc_attr($coach_gender); ?>" class="vc-icon-volume-up speak"></i></div>    
    </div>
   </div>

   <div class="vc-mcp-bloc">
    <div class="vc-mcp-bloc-image"><img src="<?php echo esc_attr (VIRTUAL_COACH_IMG . 'label-and-rate-emotions.webp') ?>"></div>
    <div class="vc-mcp-bloc-content">
     <div class="vc-mcp-bloc-title"><?php _e('Label and Rate Emotions',  $plugin_name) ?></div>
     <div class="vc-mcp-bloc-text"><?php _e('What feelings do I notice right now? How strong are my feelings? Are they a level 0 1 2 3 4 or 5?',  $plugin_name) ?><i data-gender="<?php echo esc_attr($coach_gender); ?>" class="vc-icon-volume-up speak"></i></div>
    </div>
   </div>
     
  </div>
  
  <div class="vc-mcp-row">
    <div class="vc-mcp-bloc">
        <div class="vc-mcp-bloc-image"><img src="<?php echo esc_attr (VIRTUAL_COACH_IMG . 'notice-my-surroundings.webp') ?>"></div>
        <div class="vc-mcp-bloc-content">
        <div class="vc-mcp-bloc-title"><?php _e('Notice my Surroundings',  $plugin_name) ?></div>
        <div class="vc-mcp-bloc-text"><?php _e('What do I notice around me? What do I see?  What do I hear? Smell? Taste? What am I touching?',  $plugin_name) ?><i data-gender="<?php echo esc_attr($coach_gender); ?>" class="vc-icon-volume-up speak"></i></div>     
        </div>
    </div>
    
    <div class="vc-mcp-bloc">
        <div class="vc-mcp-bloc-image"><img src="<?php echo esc_attr (VIRTUAL_COACH_IMG . 'notice-my-thoughts.webp') ?>"></div>
        <div class="vc-mcp-bloc-content">
        <div class="vc-mcp-bloc-title"><?php _e('Notice my Thoughts',  $plugin_name) ?></div>
        <div class="vc-mcp-bloc-text"><?php _e('What thoughts do I notice going through my mind right now?',  $plugin_name) ?><i data-gender="<?php echo esc_attr($coach_gender); ?>" class="vc-icon-volume-up speak"></i></div>
        </div>
    </div>  
  </div>
  
  <div class="vc-mcp-row">

   <div class="vc-mcp-bloc">
    <div class="vc-mcp-bloc-image"><img src="<?php echo esc_attr (VIRTUAL_COACH_IMG . 'do-a-body-check.webp') ?>"></div>
    <div class="vc-mcp-bloc-content">
     <div class="vc-mcp-bloc-title"><?php _e('Do a Body Check',  $plugin_name) ?></div>
     <div class="vc-mcp-bloc-text"><?php _e('What body sensation do I notice right now?',  $plugin_name) ?><i data-gender="<?php echo esc_attr($coach_gender); ?>" class="vc-icon-volume-up speak"></i></div>
    </div>
   </div>
   
   <div class="vc-mcp-bloc">
    <div class="vc-mcp-bloc-image"><img src="<?php echo esc_attr (VIRTUAL_COACH_IMG . 'notice-my-urges.webp') ?>"></div>
    <div class="vc-mcp-bloc-content">
     <div class="vc-mcp-bloc-title"><?php _e('Notice my Urges',  $plugin_name) ?></div>
     <div class="vc-mcp-bloc-text"><?php _e('What urges do I notice? What do I feel like doing?',  $plugin_name) ?><i data-gender="<?php echo esc_attr($coach_gender); ?>" class="vc-icon-volume-up speak"></i></div>
    </div>
   </div>
   
  </div>
  
 </div>
 
</div>