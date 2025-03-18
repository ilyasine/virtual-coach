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

 $coach_id = Virtual_Coach_Utils::get_current_user_virtual_coach();
 $coach_gender = Virtual_Coach_Utils::get_coach_gender($coach_id);

?>

<div class="coaching-sessions-popup">
    <div class="coaching-sessions-popup-container">
        <div class="top-button-container">
            <button id="help" class="vc-button"><?php _e('Help', $plugin_name); ?></button>
            <button data-src="#vc-avatar-popup" id="customize-avatar" class="vc-costum-avatar-button vc-button button"><?php _e('Change Coach', $plugin_name); ?></button>
        </div>
        <div class="vc-bloc-coach-video">
            <div class="vc-img-coach-video"><img id="vc-step-img" src="<?php echo esc_attr (VIRTUAL_COACH_IMG . 'notice-my-breath.webp') ?>"></div>  
             <div class="vc-bloc-coach-video-main">                
                <video class="coach-video">
                    <source src="<?php echo esc_attr($coach_video); ?>" type="video/mp4">
                    <?php _e('Your browser does not support the video tag.', $plugin_name); ?>
                </video>
                <div class="coach-text">
                    <div class="coaching-sessions-popup-text-script">
                        We start our check in by getting a Clear Picture. Let’s bring our attention to our breath.
                        Where do I notice it? 
                        In my nose?    Chest?    Belly?      
                        Tap the picture or the blue button to move to the next Clear Picture Do. 
                    </div>
                    <div class="vc-element" id="play-coach-video">
                        <span data-gender="<?php echo esc_attr($coach_gender); ?>" class="vc-icon-volume-up speak"></span>
                    </div>
                </div>
            </div> 
        </div>
        <div class="button-container" style="text-align: center; margin-top: 20px;">
            <button id="back-button" class="vc-hero-button"><span class="vc-icon-angle-double-left"></span><?php _e('Back', $plugin_name); ?></button>
            <button id="next-button" class="vc-hero-button"><?php _e('Next', $plugin_name); ?><span class="vc-icon-angle-double-right"></span></button>
        </div>
        <div class="options"></div>
        
    </div>
</div>