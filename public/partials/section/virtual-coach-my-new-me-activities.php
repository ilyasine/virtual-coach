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

<div class="vc-my-new-me-actvities">
 
  <div class="vc-section-content-header">
  <div class="vc-sch-text">
   <div class="vc-sch-text-top"><?php _e('My New-Me Activities', $plugin_name) ?></div>
   <div class="vc-sch-text-bottom"><?php _e('Tap Add a SOLO New-Me Activity to upload an image or choose a picture from the New-Me Activity library. Tap on the Add PARTNERSHP New-Me Activity to upload or choose an image of a New-Me Activity you will do with other people. Tap the trash can to remove the New-Me Activity.', $plugin_name) ?><i data-gender="<?php echo esc_attr($coach_gender); ?>" class="vc-icon-volume-up speak"></i></div>
  </div>
  <div class="vc-sch-button" data-src="#add-snma" id="add-snma-btn">
    <i class="vc-icon-plus"></i>
    <?php _e('Add a SOLO New-Me Activity', $plugin_name); ?>
  </div>
   <div class="vc-sch-button" data-src="#add-pnma" id="add-pnma-btn">
    <i class="vc-icon-plus"></i>
    <?php _e('Add a Partnership New-Me Activity', $plugin_name); ?>
  </div>
 </div>
 
 <div class="vc-section-content-body">
  
  <table class="vc-table-bloc">
   <thead>
    <tr>
     <th></th>
     <th><?php _e('My SOLO New-Me Activities',  $plugin_name) ?></th>
     <th><?php _e('My PARTNERSHIP New-Me Activities',  $plugin_name) ?></th>
     <th></th>
    </tr>
   </thead>
   <tbody>
    
    <tr>
     <td class="vc-bloc-icon"><i class="vc-icon-grip-h"></i></td>
     <td class="vc-bloc-circles">
        <a href="<?php echo wp_get_attachment_url(455); ?>" class="gallery-item">
            <img src="<?php echo wp_get_attachment_url(455); ?>">
        </a>
        <a href="<?php echo wp_get_attachment_url(455); ?>" class="gallery-item">
            <img src="<?php echo wp_get_attachment_url(455); ?>">
        </a>
        <a href="<?php echo wp_get_attachment_url(455); ?>" class="gallery-item">
            <img src="<?php echo wp_get_attachment_url(455); ?>">
        </a>
        <span class="vc-bc-numbers">+12</span>
     </td>
     <td class="vc-bloc-circles">
        <a href="<?php echo wp_get_attachment_url(455); ?>" class="gallery-item">
            <img src="<?php echo wp_get_attachment_url(455); ?>">
        </a>
        <a href="<?php echo wp_get_attachment_url(455); ?>" class="gallery-item">
            <img src="<?php echo wp_get_attachment_url(455); ?>">
        </a>
        <a href="<?php echo wp_get_attachment_url(455); ?>" class="gallery-item">
            <img src="<?php echo wp_get_attachment_url(455); ?>">
        </a>
        <span class="vc-bc-numbers">+12</span>
     </td>
     <td class="vc-bloc-options">
      <i class="vc-icon-eye"></i>
      <i class="vc-icon-pencil"></i>
      <i class="vc-icon-trash"></i>
     </td>
    </tr>
    
        <tr>
     <td class="vc-bloc-icon"><i class="vc-icon-grip-h"></i></td>
     <td class="vc-bloc-circles">
        <a href="<?php echo wp_get_attachment_url(455); ?>" class="gallery-item">
            <img src="<?php echo wp_get_attachment_url(455); ?>">
        </a>
        <a href="<?php echo wp_get_attachment_url(455); ?>" class="gallery-item">
            <img src="<?php echo wp_get_attachment_url(455); ?>">
        </a>
        <a href="<?php echo wp_get_attachment_url(455); ?>" class="gallery-item">
            <img src="<?php echo wp_get_attachment_url(455); ?>">
        </a>
     </td>
     <td class="vc-bloc-circles">
        <a href="<?php echo wp_get_attachment_url(455); ?>" class="gallery-item">
            <img src="<?php echo wp_get_attachment_url(455); ?>">
        </a>
        <a href="<?php echo wp_get_attachment_url(455); ?>" class="gallery-item">
            <img src="<?php echo wp_get_attachment_url(455); ?>">
        </a>
        <a href="<?php echo wp_get_attachment_url(455); ?>" class="gallery-item">
            <img src="<?php echo wp_get_attachment_url(455); ?>">
        </a>
     </td>
     <td class="vc-bloc-options">
      <i class="vc-icon-eye"></i>
      <i class="vc-icon-pencil"></i>
      <i class="vc-icon-trash"></i>
     </td>
    </tr>
    
        <tr>
     <td class="vc-bloc-icon"><i class="vc-icon-grip-h"></i></td>
     <td class="vc-bloc-circles">
        <a href="<?php echo wp_get_attachment_url(455); ?>" class="gallery-item">
            <img src="<?php echo wp_get_attachment_url(455); ?>">
        </a>
        <a href="<?php echo wp_get_attachment_url(455); ?>" class="gallery-item">
            <img src="<?php echo wp_get_attachment_url(455); ?>">
        </a>
     </td>
     <td class="vc-bloc-circles">
        <a href="<?php echo wp_get_attachment_url(455); ?>" class="gallery-item">
            <img src="<?php echo wp_get_attachment_url(455); ?>">
        </a>
        <a href="<?php echo wp_get_attachment_url(455); ?>" class="gallery-item">
            <img src="<?php echo wp_get_attachment_url(455); ?>">
        </a>
     </td>
     <td class="vc-bloc-options">
      <i class="vc-icon-eye"></i>
      <i class="vc-icon-pencil"></i>
      <i class="vc-icon-trash"></i>
     </td>
    </tr>
    
        <tr>
     <td class="vc-bloc-icon"><i class="vc-icon-grip-h"></i></td>
     <td class="vc-bloc-circles">
        <a href="<?php echo wp_get_attachment_url(455); ?>" class="gallery-item">
            <img src="<?php echo wp_get_attachment_url(455); ?>">
        </a>
     </td>
     <td class="vc-bloc-circles">
        <a href="<?php echo wp_get_attachment_url(455); ?>" class="gallery-item">
            <img src="<?php echo wp_get_attachment_url(455); ?>">
        </a>
     </td>
     <td class="vc-bloc-options">
      <i class="vc-icon-eye"></i>
      <i class="vc-icon-pencil"></i>
      <i class="vc-icon-trash"></i>
     </td>
    </tr>
    
   </tbody>
  </table>
  
 </div>
 
</div>