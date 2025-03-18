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

<div class="vc-my-on-track-thinking">
 
 <div class="vc-section-content-header">
  <div class="vc-sch-text">
   <div class="vc-sch-text-top"><?php _e('My On-Track Thinking: Cheering Myself On!', $plugin_name) ?></div>
   <div class="vc-sch-text-bottom"><?php _e('Tap the Add New Cheer button to add On-Track Thinking that encourages you and helps you be on-track. You can move My Cheers up and down the list by grabbing the dots on the left of the goal and dragging it to a higher or lower priority. You can edit My Cheers by tapping on the pencil button, and delete it by tapping the trash button.', $plugin_name) ?><i data-gender="<?php echo esc_attr($coach_gender); ?>" class="vc-icon-volume-up speak"></i></div>
  </div>
  <div class="vc-sch-button" data-src="#add-new-cheer" id="add-new-cheer-btn">
    <i class="vc-icon-plus"></i>
    <?php _e('Add a New Cheer', $plugin_name); ?>
  </div>
 </div>
 
 <div class="virtual-coach-popup mfp-with-anim mfp-hide add-new-cheer" id="add-new-cheer">
  <div class="vc-popup-container">
   
   <div class="vc-popup-head">
    <div class="vc-popup-title"><?php _e('Adding a New Cheer',  $plugin_name) ?></div>
    <div class="vc-popup-desc"><span><?php echo sprintf( __('<b>Instructions:</b> Tap on Type My Cheer to type in encouraging statements. Tap Record My Cheer to record On-Track Thinking that will help you reach your goals. Upload or choose a picture that helps you be on-track.', $plugin_name) ); ?><i data-gender="<?php echo esc_attr($coach_gender); ?>" class="vc-icon-volume-up speak"></i></span></div>
   </div>
   
   <div class="vc-popup-content add-new-cheer-popup-content">
  
    <ul>
     <li><a href="#write-cheer"><span>1</span><?php _e('Cheer', $plugin_name) ?></a></li>
     <li><a href="#record-audio-cheer"><span>2</span><?php _e('Record',  $plugin_name) ?></a></li>
     <li><a href="#upload-images-cheer"><span>3</span><?php _e('Image', $plugin_name) ?></a></li>
    </ul>
    
    <form id="addnewcheerrecording">
     
    <div id="write-cheer">
     
     <div class="write-text-bloc">
      <label for="write--cheer"><?php _e('My Cheer:', $plugin_name) ?></label>
      <input type="text" id="write--cheer" name="write--cheer" value="" placeholder="<?php _e('Type My Cheer', $plugin_name) ?>">
     </div>
     
     <div class="vc-record-audio-foot">
       <div class="vc-foot-back"><i class="vc-icon-arrow-left"></i></div>
       <div class="vc-foot-forward"><span id="next" value="1"><?php _e('Next', $plugin_name) ?></span><i class="vc-icon-arrow-right"></i></div>
      </div>
    </div>
     
    <div id="record-audio-cheer">
     
     <div class="vc-record-audio">
      <div class="vc-record-audio-tap">
       <div class="vc-rat-vibes">
        <div class="vc-vibes active">
         <div class="vc-vibe-obj"></div>
         <div class="vc-vibe-obj"></div>
         <div class="vc-vibe-obj"></div>
         <div class="vc-vibe-obj"></div>
         <div class="vc-vibe-obj"></div>
         <div class="vc-vibe-obj"></div>
         <div class="vc-vibe-obj"></div>
        </div>
       </div>
       <div class="vc-rat-buttons">
        <div class="vc-rat-buttons-close"><i class="vc-icon-times"></i></div>
        <div class="vc-rat-buttons-mic">
         <i class="vc-icon-microphone"></i>
         <span><?php _e('Record My Cheer', $plugin_name) ?></span>
        </div>
        <div class="vc-rat-buttons-check"><i class="vc-icon-check"></i></div>
       </div>
      </div>
     </div>
     
     <div class="vc-record-audio-foot">
      <div class="vc-foot-back"><i class="vc-icon-arrow-left"></i></div>
      <div class="vc-foot-forward"><span id="next" value="1"><?php _e('Next', $plugin_name) ?></span><i class="vc-icon-arrow-right"></i></div>
     </div>
     
    </div>
     
    <div id="upload-images-cheer">
     
     <div class="upload-images-bloc">
      
      <label for="uploadimages-ott">
       <span class="upload-images-text"><?php _e('Add an My Cheer Image:', $plugin_name) ?></span>
       <span class="upload-images-drag">
        <i class="vc-icon-cloud-upload"></i>
        <span id="fileLabelOTT" class="upload-images-drag-text"><?php echo sprintf( __('Drag and Drop or <span>Browse</span>', $plugin_name) ); ?></span>
        <input type="file" id="uploadimages-ott" name="uploadimages-ott" onchange="pressedott()">
       </span>
      </label>
      
     </div>
     
     <div class="vc-record-audio-foot">
      <div class="vc-foot-back"><i class="vc-icon-arrow-left"></i></div>
      <label for="addnewcheerrecordingsubmit" class="vc-foot-forward">
       <span><?php _e('Submit', $plugin_name) ?></span>
       <i class="vc-icon-arrow-right"></i>
       <input type="submit" id="addnewcheerrecordingsubmit">
      </label>
     </div>
     
    </div>
     
   </form>
    
   </div>
   
  </div>
 </div>
 
 <div class="virtual-coach-popup mfp-with-anim mfp-hide edit-cheer" id="edit-cheer">
  <div class="vc-popup-container">
   
   <div class="vc-popup-head">
    <div class="vc-popup-title"><?php _e('Edit Cheer',  $plugin_name) ?></div>
   </div>
   
   <div class="vc-popup-content edit-cheer-popup-content">
  
    <ul>
     <li><a href="#edit-write-cheer"><span>1</span><?php _e('Cheer', $plugin_name) ?></a></li>
     <li><a href="#edit-record-audio-cheer"><span>2</span><?php _e('Record',  $plugin_name) ?></a></li>
     <li><a href="#edit-upload-images-cheer"><span>3</span><?php _e('Image', $plugin_name) ?></a></li>
    </ul>
    
    <form id="editcheerrecording">
     
    <div id="edit-write-cheer">
     
     <div class="write-text-bloc">
      <label for="edit-write--cheer"><?php _e('My Cheer:', $plugin_name) ?></label>
      <input type="text" id="edit-write--cheer" name="edit-write--cheer" value="I am a great coder!" placeholder="<?php _e('Type My Cheer', $plugin_name) ?>">
     </div>
     
     <div class="vc-record-audio-foot">
       <div class="vc-foot-back"><i class="vc-icon-arrow-left"></i></div>
       <div class="vc-foot-forward"><span id="next" value="1"><?php _e('Next', $plugin_name) ?></span><i class="vc-icon-arrow-right"></i></div>
      </div>
    </div>
     
    <div id="edit-record-audio-cheer">
     
     <div class="vc-record-audio">
      <div class="vc-record-audio-tap">
       <div class="vc-rat-vibes">
        <div class="vc-vibes active">
         <div class="vc-vibe-obj"></div>
         <div class="vc-vibe-obj"></div>
         <div class="vc-vibe-obj"></div>
         <div class="vc-vibe-obj"></div>
         <div class="vc-vibe-obj"></div>
         <div class="vc-vibe-obj"></div>
         <div class="vc-vibe-obj"></div>
        </div>
       </div>
       <div class="vc-rat-buttons">
        <div class="vc-rat-buttons-close"><i class="vc-icon-times"></i></div>
        <div class="vc-rat-buttons-mic">
         <i class="vc-icon-microphone"></i>
         <span><?php _e('Record My Cheer', $plugin_name) ?></span>
        </div>
        <div class="vc-rat-buttons-check"><i class="vc-icon-check"></i></div>
       </div>
      </div>
     </div>
     
     <div class="vc-record-audio-foot">
      <div class="vc-foot-back"><i class="vc-icon-arrow-left"></i></div>
      <div class="vc-foot-forward"><span id="next" value="1"><?php _e('Next', $plugin_name) ?></span><i class="vc-icon-arrow-right"></i></div>
     </div>
     
    </div>
     
    <div id="edit-upload-images-cheer">
     
     <div class="upload-images-bloc">
      
      <label for="edit-uploadimages-ott">
       <span class="upload-images-text"><?php _e('Add an My Cheer Image:', $plugin_name) ?></span>
       <span class="upload-images-drag">
        <i class="vc-icon-cloud-upload"></i>
        <span id="fileLabelEditOTT" class="upload-images-drag-text"><?php echo sprintf( __('Drag and Drop or <span>Browse</span>', $plugin_name) ); ?></span>
        <input type="file" id="edit-uploadimages-ott" name="edit-uploadimages-ott" onchange="pressedottedit()">
       </span>
      </label>
      
     </div>
     
     <div class="vc-record-audio-foot">
      <div class="vc-foot-back"><i class="vc-icon-arrow-left"></i></div>
      <label for="editcheerrecordingsubmit" class="vc-foot-forward">
       <span><?php _e('Submit', $plugin_name) ?></span>
       <i class="vc-icon-arrow-right"></i>
       <input type="submit" id="editcheerrecordingsubmit">
      </label>
     </div>
     
    </div>
     
   </form>
    
   </div>
   
  </div>
 </div>
 
 <div class="virtual-coach-popup mfp-with-anim mfp-hide delete-cheer" id="delete-cheer">
  <div class="vc-popup-container">
   
   <div class="vc-popup-head">
    <div class="vc-popup-title"><?php _e('Delete Cheer',  $plugin_name) ?></div>
   </div>
   
   <div class="vc-popup-content">
    <div class="delete-bloc">
     <i class="vc-icon-exclamation-triangle"></i>
     <span><?php _e('Do you really want to delete this Cheer?',  $plugin_name) ?></span>
     <div class="delete-bloc-btn">
      <div class="delete-bbtn"><i class="vc-icon-arrow-left"></i><span><?php _e('No',  $plugin_name) ?></span></div>
      <div class="back-bbtn"><span><?php _e('Yes',  $plugin_name) ?></span><i class="vc-icon-trash"></i></div>
     </div>
    </div>
    
   </div>
   
  </div>
 </div>
 
 <div class="vc-section-content-body">
  
  <table class="vc-table-bloc">
   <thead>
    <tr>
     <th></th>
     <th><?php _e('My Recorded Cheer',  $plugin_name) ?></th>
     <th><?php _e('My Cheer',  $plugin_name) ?></th>
     <th><?php _e('My Cheer Image',  $plugin_name) ?></th>
     <th></th>
    </tr>
   </thead>
   <tbody>
    
    <tr>
     <td class="vc-bloc-icon"><i class="vc-icon-grip-h"></i></td>
     <td class="vc-bloc-player">
      <?php
      $args = [
       "src" => esc_url(home_url("/wp-content/uploads/2019/12/Regulators.mp3")),
       "loop" => false,
       "autoplay" => false,
       "preload" => "none",
      ];
      echo wp_audio_shortcode($args);
      ?>
     </td>
     <td class="vc-bloc-text"><span>I am a great coder!<i data-gender="<?php echo esc_attr($coach_gender); ?>" class="vc-icon-volume-up speak"></i></span></td>
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
      <i data-src="#view-cheer" id="view-cheer-btn" class="vc-icon-eye"></i>
      <i data-src="#edit-cheer" id="edit-cheer-btn" class="vc-icon-pencil"></i>
      <i data-src="#delete-cheer" id="delete-cheer-btn" class="vc-icon-trash"></i>
     </td>
    </tr>
    
    <tr>
     <td class="vc-bloc-icon"><i class="vc-icon-grip-h"></i></td>
     <td class="vc-bloc-player">
      <?php
      $args = [
       "src" => esc_url(home_url("/wp-content/uploads/2019/12/Regulators.mp3")),
       "loop" => false,
       "autoplay" => false,
       "preload" => "none",
      ];
      echo wp_audio_shortcode($args);
      ?>
     </td>
     <td class="vc-bloc-text"><span>I am a great coder!<i data-gender="<?php echo esc_attr($coach_gender); ?>" class="vc-icon-volume-up speak"></i></span></td>
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
     <td class="vc-bloc-player">
      <?php
      $args = [
       "src" => esc_url(home_url("/wp-content/uploads/2019/12/Regulators.mp3")),
       "loop" => false,
       "autoplay" => false,
       "preload" => "none",
      ];
      echo wp_audio_shortcode($args);
      ?>
     </td>
     <td class="vc-bloc-text"><span>I am a great coder!<i data-gender="<?php echo esc_attr($coach_gender); ?>" class="vc-icon-volume-up speak"></i></span></td>
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
     <td class="vc-bloc-player">
      <?php
      $args = [
       "src" => esc_url(home_url("/wp-content/uploads/2019/12/Regulators.mp3")),
       "loop" => false,
       "autoplay" => false,
       "preload" => "none",
      ];
      echo wp_audio_shortcode($args);
      ?>
     </td>
     <td class="vc-bloc-text"><span>I am a great coder!<i data-gender="<?php echo esc_attr($coach_gender); ?>" class="vc-icon-volume-up speak"></i></span></td>
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
    
    <tr>
     <td class="vc-bloc-icon"><i class="vc-icon-grip-h"></i></td>
     <td class="vc-bloc-player">
      <?php
      $args = [
       "src" => esc_url(home_url("/wp-content/uploads/2019/12/Regulators.mp3")),
       "loop" => false,
       "autoplay" => false,
       "preload" => "none",
      ];
      echo wp_audio_shortcode($args);
      ?>
     </td>
     <td class="vc-bloc-text"><span>I am a great coder!<i data-gender="<?php echo esc_attr($coach_gender); ?>" class="vc-icon-volume-up speak"></i></span></td>
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
    
   </tbody>
  </table>
  
 </div>

</div>