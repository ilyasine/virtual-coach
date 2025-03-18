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

<?php
    $virtual_coach_content_parts = array(
        'sidebar', 
        'main-content'
    );

$coach_id = Virtual_Coach_Utils::get_current_user_virtual_coach();
?>

<div class="virtual-coach-content">
    <?php foreach ($virtual_coach_content_parts as $virtual_coach_content_part) { 
        $template_name = $plugin_name . '-' . $virtual_coach_content_part;

        // Prepare specific handling for 'main-content'
        if ($virtual_coach_content_part === 'main-content') { ?>
            <div class="<?php echo esc_attr($template_name); ?>">
                <?php 
                // Include both 'coaching-session' and 'section-content' inside main content
                $main_content_parts = array('coaching-session-hero', 'section-content');
                foreach ($main_content_parts as $main_content_part) {
                    $main_template_name = $plugin_name . '-' . $main_content_part;
                    $args = array(
                        'plugin_name' => $plugin_name,
                        'coach_id' => $coach_id,
                    );
                    ?>
                    <div class="<?php echo esc_attr($main_template_name); ?>">
                        <?php Virtual_Coach_Utils::get_vc_template_part($main_template_name, $args, 'public', '/partials', true); ?>
                    </div>
                <?php } ?>
            </div>
        <?php } else { 
            // Default handling for other parts like 'sidebar'
            $args = array(
                'plugin_name' => $plugin_name
            );
            ?>
            <div class="<?php echo esc_attr($template_name); ?>">
                <?php Virtual_Coach_Utils::get_vc_template_part($template_name, $args, 'public', '/partials', true); ?>
            </div>
        <?php } ?>
    <?php } ?>
</div>