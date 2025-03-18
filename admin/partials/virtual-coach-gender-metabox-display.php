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

<label><?php _e('Select Gender', $plugin_name) ?></label><br>
<input type="radio" id="virtual_coach_gender_male" name="virtual_coach_gender" value="male"<?php echo esc_attr(checked($gender, 'male', false)) ?>>
<label for="virtual_coach_gender_male"><?php _e('Male', $plugin_name) ?></label><br>
<input type="radio" id="virtual_coach_gender_female" name="virtual_coach_gender" value="female"<?php echo esc_attr(checked($gender, 'female', false)) ?>>
<label for="virtual_coach_gender_female"><?php _e('Female', $plugin_name)?></label>