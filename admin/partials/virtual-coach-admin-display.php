<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       https://labgenz.com/
 * @since      1.0.0
 *
 * @package    Virtual_Coach
 * @subpackage Virtual_Coach/admin/partials
 */
?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->
<p> <?php _e('Upload or select a video for this virtual coach.', $plugin_name); ?> </p>
<input type="text" id="virtual_coach_video" name="virtual_coach_video" value="<?php echo esc_url($video_url) ?>" style="width: 100%;" />
<button type="button" class="button" id="virtual_coach_video_button"><?php _e('Select Video', $plugin_name) ?></button>