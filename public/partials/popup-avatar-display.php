<?php

/**
 *
 * This file is used to markup the popup.
 *
 * @link       https://labgenz.com/
 * @since      1.0.0
 *
 * @package    Virtual_Coach
 * @subpackage Virtual_Coach/public/partials
 */
?>

<!-- Floating Button -->


<?php 

/* echo '<pre>';
var_dump( $coaches );
echo '</pre>'; */

$vc_coaches_post = Virtual_Coach_Utils::get_registered_virtual_coaches();
$coach_id = Virtual_Coach_Utils::get_current_user_virtual_coach();

/* echo '<pre>';
var_dump( $vc_coaches_post );
echo '</pre>'; */

/* echo '<pre>';
var_dump( $coaches );
echo '</pre>'; */

/* if(is_page('virtual-coach')){ ?>
    <div class="vc-element" id="stop-speaker">
        <i class="vc-icon-volume-slash"></i>
    </div>
<?php } */

?>

<div data-src="#vc-avatar-popup" class="vc-chat-icon vc-element" id="vc-chat-icon">
    <i class="vc-icon-comment-dots"></i>
</div>
<div class="vc-popup vc-element mfp-with-anim mfp-hide" id="vc-avatar-popup">
    <div class="vc-popup-outer-content-container">
        <div class="vc-popup-background">
            <svg width="500" height="709" viewBox="0 0 500 709" fill="none" xmlns="http://www.w3.org/2000/svg">
                <mask id="mask0_15_176" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="0" y="0" width="500" height="709">
                <rect width="500" height="709" fill="white"/>
                </mask>
                <g mask="url(#mask0_15_176)">
                <g filter="url(#filter0_f_15_176)">
                <rect x="395" y="583" width="196" height="197" rx="98" fill="#FACA12"/>
                </g>
                <g filter="url(#filter1_f_15_176)">
                <rect x="393" y="-67" width="190" height="191" rx="95" fill="#B5D334"/>
                </g>
                <g filter="url(#filter2_f_15_176)">
                <rect x="-101" y="549" width="173" height="172" rx="86" fill="#05A7DD"/>
                </g>
                <g filter="url(#filter3_f_15_176)">
                <rect x="-122" y="33" width="173" height="172" rx="86" fill="#FACA12"/>
                </g>
                </g>
                <defs>
                <filter id="filter0_f_15_176" x="145" y="333" width="696" height="697" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                <feFlood flood-opacity="0" result="BackgroundImageFix"/>
                <feBlend mode="normal" in="SourceGraphic" in2="BackgroundImageFix" result="shape"/>
                <feGaussianBlur stdDeviation="125" result="effect1_foregroundBlur_15_176"/>
                </filter>
                <filter id="filter1_f_15_176" x="143" y="-317" width="690" height="691" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                <feFlood flood-opacity="0" result="BackgroundImageFix"/>
                <feBlend mode="normal" in="SourceGraphic" in2="BackgroundImageFix" result="shape"/>
                <feGaussianBlur stdDeviation="125" result="effect1_foregroundBlur_15_176"/>
                </filter>
                <filter id="filter2_f_15_176" x="-351" y="299" width="673" height="672" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                <feFlood flood-opacity="0" result="BackgroundImageFix"/>
                <feBlend mode="normal" in="SourceGraphic" in2="BackgroundImageFix" result="shape"/>
                <feGaussianBlur stdDeviation="125" result="effect1_foregroundBlur_15_176"/>
                </filter>
                <filter id="filter3_f_15_176" x="-372" y="-217" width="673" height="672" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                <feFlood flood-opacity="0" result="BackgroundImageFix"/>
                <feBlend mode="normal" in="SourceGraphic" in2="BackgroundImageFix" result="shape"/>
                <feGaussianBlur stdDeviation="125" result="effect1_foregroundBlur_15_176"/>
                </filter>
                </defs>
            </svg>
        </div>   
        <div class="vc-popup-content-container">      
            <div class="choose-avatar" id="vc-step2-header">
                <span class="choose-avatar-label"><?php _e('Avatar', $plugin_name); ?></span>
                <span class="choose-avatar-text"><?php _e('Please choose an avatar', $plugin_name); ?></span>             
            </div>
            <div class="vc-avatar-container vc-element">
                <?php if (!empty($coaches)): ?>
                    <?php foreach ($coaches as $coach): ?>
                        <?php 
                        $gender = Virtual_Coach_Utils::is_female_coach($coach['ID']) ? 'female' : (Virtual_Coach_Utils::is_male_coach($coach['ID']) ? 'male' : 'unknown');
                        ?>
                        <div class="vc-avatar vc-element <?php echo $coach['ID'] === $coach_id ? 'selected-avatar' : ''; ?>">
                            <img src="<?php echo esc_url($coach['featured_image']); ?>" 
                                data-coach-id="<?php echo esc_attr($coach['ID']); ?>" 
                                alt="<?php echo esc_attr($coach['name']); ?>" 
                                data-gender="<?php echo esc_attr($gender); ?>"
                                class="vc-avatar-img">
                            <?php if (!empty($coach['video_meta'])): ?>
                                <audio id="<?php echo esc_attr($coach['name']); ?>-audio" src="<?php echo esc_url($coach['video_meta']); ?>"></audio>
                            <?php endif; ?>
                            <span class="avatar-text"><?php echo esc_html($coach['name']); ?></span>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p><?php _e('No avatars available at the moment.', $plugin_name); ?></p>
                <?php endif; ?>
            </div>
            
            <div id="selected-avatar" class="vc-popup-header vc-element" style="display: none;">
                <!-- This will be updated dynamically via JavaScript -->
            </div>
            <div id="confirm-avatar" style="display: none;">
                <?php _e('Confirm Virtual Coach', $plugin_name); ?>
            </div>
        </div>
    </div>
</div>