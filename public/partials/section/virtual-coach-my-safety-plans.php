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

<div class="vc-my-safety-plan">
 
 <div class="vc-section-content-header">
  <div class="vc-sch-text">
   <div class="vc-sch-text-top"><?php _e('My Safety Plans', $plugin_name) ?></div>
   <div class="vc-sch-text-bottom"><?php _e('Tap on the Add a New Safety Plan to add a Safety Plan to your Safety Plan List. Tap on the Safety Plan to see the details of that plan. You can move your Safety Plans up and down the list by grabbing the dots on the left of the goal and dragging it to a higher or lower priority. You can edit your goal by tapping on the pencil button, and delete it by tapping the trash button.', $plugin_name) ?><i data-gender="<?php echo esc_attr($coach_gender); ?>" class="vc-icon-volume-up speak"></i></div>
  </div>
  <div class="vc-sch-button" data-src="#create-new-safety-plan" id="create-new-safety-plan-btn">
    <i class="vc-icon-plus"></i>
    <?php _e('Create New Safety Plan', $plugin_name); ?>
  </div>
 </div>

 <div class="virtual-coach-popup mfp-with-anim mfp-hide create-new-safety-plan" id="create-new-safety-plan">
  <div class="vc-popup-container">
   
   <div class="vc-popup-head">
    <div class="vc-popup-title"><?php _e('Creating a New Safety Plan',  $plugin_name) ?></div>
    <div class="vc-popup-desc"><span><?php echo sprintf( __('<b>Instructions:</b> Create a name for your Safety Plan. The name may be a location, person who is risky for you, or a situation. Tap Type My Safety Plan to type what you will do to manage the risks. Tap on Record My Safety Plan to record what you will do to manage the risks. Tap Add Images of My Safe Place to add pictures of you Safe Places where you will go to be safe. Tap on Add Images of New-Me Activities to upload New-Me Activities you will do as part of your Safety Plan.', $plugin_name) ); ?><i data-gender="<?php echo esc_attr($coach_gender); ?>" class="vc-icon-volume-up speak"></i></span></div>
   </div>
   
   <div class="vc-popup-content new-safety-plan-popup-content">
  
    <ul>
     <li><a href="#write-name-sp"><span>1</span><?php _e('Name', $plugin_name) ?></a></li>
     <li><a href="#write-sp"><span>2</span><?php _e('Safety Plan', $plugin_name) ?></a></li>
     <li><a href="#record-audio-sp"><span>3</span><?php _e('Record',  $plugin_name) ?></a></li>
     <li><a href="#upload-images-sp"><span>4</span><?php _e('Images', $plugin_name) ?></a></li>
    </ul>
    
    <form id="newsafetyplanrecording">
     
    <div id="write-name-sp">
     
     <div class="write-text-bloc">
      <label for="writename-sp"><?php _e('Name of My Safety Plan:', $plugin_name) ?></label>
      <input type="text" id="writename-sp" name="writename-sp" value="" placeholder="<?php _e('Type Name of My Safety Plan', $plugin_name) ?>">
     </div>
     
     <div class="vc-record-audio-foot">
       <div class="vc-foot-back"><i class="vc-icon-arrow-left"></i></div>
       <div class="vc-foot-forward"><span id="next" value="1"><?php _e('Next', $plugin_name) ?></span><i class="vc-icon-arrow-right"></i></div>
      </div>
     
    </div>
     
    <div id="write-sp">
     
     <div class="write-text-bloc">
      <label for="write--sp"><?php _e('My Safety Plan:', $plugin_name) ?></label>
      <input type="text" id="write--sp" name="write--sp" value="" placeholder="<?php _e('Type My Safety Plan', $plugin_name) ?>">
     </div>
     
     <div class="vc-record-audio-foot">
       <div class="vc-foot-back"><i class="vc-icon-arrow-left"></i></div>
       <div class="vc-foot-forward"><span id="next" value="1"><?php _e('Next', $plugin_name) ?></span><i class="vc-icon-arrow-right"></i></div>
      </div>
    </div>
     
    <div id="record-audio-sp">
     
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
         <span><?php _e('Record My Safety Plan', $plugin_name) ?></span>
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
     
    <div id="upload-images-sp">
     
     <div class="upload-images-bloc">
      
      <label for="uploadimages-sp">
       <span class="upload-images-text"><?php _e('Add Images of My Safe Places:', $plugin_name) ?></span>
       <span class="upload-images-drag">
        <i class="vc-icon-cloud-upload"></i>
        <span id="fileLabelSP" class="upload-images-drag-text"><?php echo sprintf( __('Drag and Drop or <span>Browse</span>', $plugin_name) ); ?></span>
        <input type="file" id="uploadimages-sp" name="uploadimages-sp" onchange="pressedsp()">
       </span>
      </label>
      
      <label for="uploadimages-nma">
       <span class="upload-images-text"><?php _e('Add Images of New-Me Activities:', $plugin_name) ?></span>
       <span class="upload-images-drag">
        <i class="vc-icon-cloud-upload"></i>
        <span id="fileLabelNMA" class="upload-images-drag-text"><?php echo sprintf( __('Drag and Drop or <span>Browse</span>', $plugin_name) ); ?></span>
        <input type="file" id="uploadimages-nma" name="uploadimages-nma" onchange="pressednma()">
       </span>
      </label>
      
     </div>
     
     <div class="vc-record-audio-foot">
      <div class="vc-foot-back"><i class="vc-icon-arrow-left"></i></div>
      <label for="newsafetyplanrecordingsubmit" class="vc-foot-forward">
       <span><?php _e('Submit', $plugin_name) ?></span>
       <i class="vc-icon-arrow-right"></i>
       <input type="submit" id="newsafetyplanrecordingsubmit">
      </label>
     </div>
     
    </div>
     
   </form>
    
   </div>
   
  </div>
 </div>
 
 <div class="virtual-coach-popup mfp-with-anim mfp-hide edit-safety-plan" id="edit-safety-plan">
  <div class="vc-popup-container">
   
   <div class="vc-popup-head">
    <div class="vc-popup-title"><?php _e('Edit Safety Plan',  $plugin_name) ?></div>
   </div>
   
   <div class="vc-popup-content edit-safety-plan-popup-content">
  
    <ul>
     <li><a href="#edit-write-name-sp"><span>1</span><?php _e('Name', $plugin_name) ?></a></li>
     <li><a href="#edit-write-sp"><span>2</span><?php _e('Safety Plan', $plugin_name) ?></a></li>
     <li><a href="#edit-record-audio-sp"><span>3</span><?php _e('Record',  $plugin_name) ?></a></li>
     <li><a href="#edit-upload-images-sp"><span>4</span><?php _e('Image', $plugin_name) ?></a></li>
    </ul>
    
    <form id="edit-safetyplanrecording">
     
    <div id="edit-write-name-sp">
     
     <div class="write-text-bloc">
      <label for="editwritename-sp"><?php _e('Name of My Safety Plan:', $plugin_name) ?></label>
      <input type="text" id="editwritename-sp" name="editwritename-sp" value="<?php _e('After Work', $plugin_name) ?>" placeholder="<?php _e('Name of My Safety Plan', $plugin_name) ?>">
     </div>
     
     <div class="vc-record-audio-foot">
       <div class="vc-foot-back"><i class="vc-icon-arrow-left"></i></div>
       <div class="vc-foot-forward"><span id="next" value="1"><?php _e('Next', $plugin_name) ?></span><i class="vc-icon-arrow-right"></i></div>
      </div>
     
    </div>
     
    <div id="edit-write-sp">
     
     <div class="write-text-bloc">
      <label for="editwritesp"><?php _e('My Safety Plan:', $plugin_name) ?></label>
      <input type="text" id="editwritesp" name="editwritesp" value="<?php _e('I want to get a Tesla Car', $plugin_name) ?>" placeholder="<?php _e('Type My Safety Plan', $plugin_name) ?>">
     </div>
     
     <div class="vc-record-audio-foot">
       <div class="vc-foot-back"><i class="vc-icon-arrow-left"></i></div>
       <div class="vc-foot-forward"><span id="next" value="1"><?php _e('Next', $plugin_name) ?></span><i class="vc-icon-arrow-right"></i></div>
      </div>
     
    </div>
     
    <div id="edit-record-audio-sp">
     
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
         <span><?php _e('Record My Safety Plan', $plugin_name) ?></span>
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
     
    <div id="edit-upload-images-sp">
     
     <div class="upload-images-bloc">
      
      <label for="edituploadimages-sp">
       <span class="upload-images-text"><?php _e('Add Images of My Safe Places:', $plugin_name) ?></span>
       <span class="upload-images-drag">
        <i class="vc-icon-cloud-upload"></i>
        <span id="fileLabelEditSP" class="upload-images-drag-text"><?php echo sprintf( __('Drag and Drop or <span>Browse</span>', $plugin_name) ); ?></span>
        <input type="file" id="edituploadimages-sp" name="edituploadimages-sp" onchange="pressedspedit()">
       </span>
      </label>
      
      <label for="edituploadimages-nma">
       <span class="upload-images-text"><?php _e('Add Images of New-Me Activities:', $plugin_name) ?></span>
       <span class="upload-images-drag">
        <i class="vc-icon-cloud-upload"></i>
        <span id="fileLabelEditNMA" class="upload-images-drag-text"><?php echo sprintf( __('Drag and Drop or <span>Browse</span>', $plugin_name) ); ?></span>
        <input type="file" id="edituploadimages-nma" name="edituploadimages-nma" onchange="pressednmaedit()">
       </span>
      </label>
      
     </div>
     
     <div class="vc-record-audio-foot">
      <div class="vc-foot-back"><i class="vc-icon-arrow-left"></i></div>
      <label for="edit-safetyplanrecordingsubmit" class="vc-foot-forward">
       <span><?php _e('Submit', $plugin_name) ?></span>
       <i class="vc-icon-arrow-right"></i>
       <input type="submit" id="edit-safetyplanrecordingsubmit">
      </label>
     </div>
     
    </div>
     
   </form>
    
   </div>
   
  </div>
 </div>
 
 <div class="virtual-coach-popup mfp-with-anim mfp-hide delete-safety-plan" id="delete-safety-plan">
  <div class="vc-popup-container">
   
   <div class="vc-popup-head">
    <div class="vc-popup-title"><?php _e('Delete Safety Plan',  $plugin_name) ?></div>
   </div>
   
   <div class="vc-popup-content">
    <div class="delete-bloc">
     <i class="vc-icon-exclamation-triangle"></i>
     <span><?php _e('Do you really want to delete this Safety Plan?',  $plugin_name) ?></span>
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
     <th><?php _e('Name of My Safety Plan',  $plugin_name) ?></th>
     <th><?php _e('My Safety Plan',  $plugin_name) ?></th>
     <th><?php _e('Images of My Safe Places',  $plugin_name) ?></th>
     <th><?php _e('Images of New-Me Activities',  $plugin_name) ?></th>
     <th><?php _e('Record My Safety Plan',  $plugin_name) ?></th>
     <th></th>
    </tr>
   </thead>
   <tbody>
    
    <tr>
     <td class="vc-bloc-icon"><i class="vc-icon-grip-h"></i></td>
     <td class="vc-bloc-title"><span>After Work</span></td>
     <td class="vc-bloc-text"><span>I want to take a walk 3 times per week<i data-gender="<?php echo esc_attr($coach_gender); ?>" class="vc-icon-volume-up speak"></i></span></td>
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
     <td class="vc-bloc-options">
      <i data-src="#view-safety-plan" id="view-safety-plan-btn" class="vc-icon-eye"></i>
      <i data-src="#edit-safety-plan" id="edit-safety-plan-btn" class="vc-icon-pencil"></i>
      <i data-src="#delete-safety-plan" id="delete-safety-plan-btn" class="vc-icon-trash"></i>
     </td>
    </tr>
    
    <tr>
     <td class="vc-bloc-icon"><i class="vc-icon-grip-h"></i></td>
     <td class="vc-bloc-title"><span>After Work</span></td>
     <td class="vc-bloc-text"><span>I want to take a walk 3 times per week<i data-gender="<?php echo esc_attr($coach_gender); ?>" class="vc-icon-volume-up speak"></i></span></td>
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
     <td class="vc-bloc-options">
      <i class="vc-icon-eye"></i>
      <i class="vc-icon-pencil"></i>
      <i class="vc-icon-trash"></i>
     </td>
    </tr>
    
    <tr class="active">
     <td class="vc-bloc-icon"><i class="vc-icon-grip-h"></i></td>
     <td class="vc-bloc-title"><span>After Work</span></td>
     <td class="vc-bloc-text"><span>I want to take a walk 3 times per week<i data-gender="<?php echo esc_attr($coach_gender); ?>" class="vc-icon-volume-up speak"></i></span></td>
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
     <td class="vc-bloc-options">
      <i class="vc-icon-eye"></i>
      <i class="vc-icon-pencil"></i>
      <i class="vc-icon-trash"></i>
     </td>
    </tr>
    
    <tr>
     <td class="vc-bloc-icon"><i class="vc-icon-grip-h"></i></td>
     <td class="vc-bloc-title"><span>After Work</span></td>
     <td class="vc-bloc-text"><span>I want to take a walk 3 times per week<i data-gender="<?php echo esc_attr($coach_gender); ?>" class="vc-icon-volume-up speak"></i></span></td>
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
     <td class="vc-bloc-options">
      <i class="vc-icon-eye"></i>
      <i class="vc-icon-pencil"></i>
      <i class="vc-icon-trash"></i>
     </td>
    </tr>
    
    <tr>
     <td class="vc-bloc-icon"><i class="vc-icon-grip-h"></i></td>
     <td class="vc-bloc-title"><span>After Work</span></td>
     <td class="vc-bloc-text"><span>I want to take a walk 3 times per week<i data-gender="<?php echo esc_attr($coach_gender); ?>" class="vc-icon-volume-up speak"></i></span></td>
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
     <td class="vc-bloc-options">
      <i class="vc-icon-eye"></i>
      <i class="vc-icon-pencil"></i>
      <i class="vc-icon-trash"></i>
     </td>
    </tr>
    
    <tr>
     <td class="vc-bloc-icon"><i class="vc-icon-grip-h"></i></td>
     <td class="vc-bloc-title"><span>After Work</span></td>
     <td class="vc-bloc-text"><span>I want to take a walk 3 times per week<i data-gender="<?php echo esc_attr($coach_gender); ?>" class="vc-icon-volume-up speak"></i></span></td>
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
     <td class="vc-bloc-options">
      <i class="vc-icon-eye"></i>
      <i class="vc-icon-pencil"></i>
      <i class="vc-icon-trash"></i>
     </td>
    </tr>
    
    <tr>
     <td class="vc-bloc-icon"><i class="vc-icon-grip-h"></i></td>
     <td class="vc-bloc-title"><span>After Work</span></td>
     <td class="vc-bloc-text"><span>I want to take a walk 3 times per week<i data-gender="<?php echo esc_attr($coach_gender); ?>" class="vc-icon-volume-up speak"></i></span></td>
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